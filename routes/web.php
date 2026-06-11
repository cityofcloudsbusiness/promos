<?php

use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MessageController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Project;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| 1. ÁREA PÚBLICA
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('site.index');
})->name('home');

Route::get('/manutencao', function () {
    return view('site.page2.principal');
})->name('manutencao');

Route::get('/marketing', function () {
    return view('site.page3.principal');
})->name('marketing');

Route::get('/ia', function () {
    return view('site.page4.principal');
})->name('ia');

Route::get('sobre', function () {
    return view('site.page5.principal');
})->name('sobre');
/*
|--------------------------------------------------------------------------
| 2. FLUXO DE PAGAMENTO (STRIPE) - Mantido Original com Correção de Redirecionamento
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'verified'])->group(function () {

    // 1. Página de seleção de plano
    Route::get('/subscribeWebM', function () {
        $user = auth()->user();

        // Proteção: Admins e funcionários não assinam planos
        if ($user->role === 'admin' || $user->role === 'employee') {
            return redirect()->route('admin.projects.index');
        }

        // CORREÇÃO: Se o usuário já tem uma assinatura ativa ou anual válida, redireciona para o Dashboard
        // Isso impede que ele fique preso nesta tela após o pagamento.
        if ($user->subscribed('default') || ($user->subscription_type === 'annual' && $user->subscription_expires_at && $user->subscription_expires_at->isFuture())) {
            return redirect()->route('dashboard');
        }

        return view('site.pagamentos.inscricaoWebSiteManu');
    })->name('subscribeWebM');

    // 2. Checkout Stripe (Gera o link de pagamento)
    Route::get('/checkout-assinatura/{plan?}', function (Request $request, $plan = 'monthly') {
        if ($request->user()->role === 'admin' || $request->user()->role === 'employee') {
            return redirect()->route('admin.projects.index');
        }

        if ($plan === 'annual') {
            $priceId = env('STRIPE_PRICE_ID2');

            if (!$priceId) {
                abort(500, 'Stripe annual price ID not configured.');
            }

            return $request->user()->checkout($priceId, [
                'success_url' => route('payment.success', ['plan' => 'annual']) . '?success=true&session_id={CHECKOUT_SESSION_ID}',
                'cancel_url' => route('subscribeWebM') . '?error=cancel',
            ]);
        }

        $priceId = env('STRIPE_PRICE_ID');

        if (!$priceId) {
            abort(500, 'Stripe subscription price ID not configured.');
        }

        return $request->user()
            ->newSubscription('default', $priceId)
            ->checkout([
                'success_url' => route('payment.success', ['plan' => 'monthly']) . '?success=true&session_id={CHECKOUT_SESSION_ID}',
                'cancel_url' => route('subscribeWebM') . '?error=cancel',
            ]);
    })->name('checkout');

    // 3. Portal de Gerenciamento do Cartão
    Route::get('/billing-portal', function (Request $request) {
        if ($request->user()->role === 'admin' || $request->user()->role === 'employee') {
            return redirect()->route('admin.projects.index');
        }

        return $request->user()->redirectToBillingPortal(route('dashboard'));
    })->name('billing');

    Route::get('/payment-success/{plan?}', [PaymentController::class, 'success'])
        ->name('payment.success');
});


/*
|--------------------------------------------------------------------------
| 3. ÁREA DO CLIENTE (DASHBOARD & CHAT)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'verified'])->group(function () {



    Route::get('/dashboard', function (Request $request) {
        $user = $request->user();

        if ($user->role === 'admin' || $user->role === 'employee') {
            return redirect()->route('admin.projects.index');
        }

        $hasAnnualPlan = $user->subscription_type === 'annual' && $user->subscription_expires_at && $user->subscription_expires_at->isFuture();

        if (! $user->subscribed('default') && ! $hasAnnualPlan) {
            return redirect()->route('subscribeWebM');
        }

        if (!$user->project) {
            Project::create([
                'user_id'  => $user->id,
                'name'     => 'Project_' . strtoupper(substr(md5($user->id . time()), 0, 6)),
                'status'   => 'Initializing',
                'progress' => 0,
                'steps'    => [
                    ['title' => 'Project Analysis',   'completed' => false],
                    ['title' => 'Architecture Design', 'completed' => false],
                    ['title' => 'Development Phase',   'completed' => false],
                    ['title' => 'Quality Assurance',   'completed' => false],
                    ['title' => 'Final Delivery',      'completed' => false],
                ],
            ]);
            $user->load('project');
        }

        $project = $user->project;

        // CORREÇÃO: oldest() em vez de latest()
        // Mensagens em ordem cronológica: antigas no topo, novas embaixo.
        $messages = $project
            ? $project->messages()->with('user')->oldest()->get()
            : collect();

        return view('dashboard', [
            'project'      => $project,
            'messages'     => $messages,
            'subscription' => $user->subscribed('default') ? $user->subscription('default') : null,
        ]);
    })->name('dashboard');

    Route::post('/messages', [MessageController::class, 'store'])->name('messages.store');
});


/*
|--------------------------------------------------------------------------
| 4. ÁREA ADMINISTRATIVA (ADMIN & EMPLOYEES)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {

    // Listagem de Projetos (Visão filtrada por Role)

    // Deletar Usuário

    Route::get('/projects', function () {
        $user = auth()->user();

        $projects = $user->role === 'admin'
            ? Project::with(['user', 'employee', 'developers'])->get()
            : Project::where('employee_id', $user->id)
            ->orWhereHas('developers', function ($q) use ($user) {
                $q->where('user_id', $user->id);
            })
            ->with('user')
            ->get();

        $employees = User::where('role', 'employee')->get();

        return view('admin.projects.index', compact('projects', 'employees'));
    })->name('projects.index');

    // Atualização de Projetos
    Route::post('/projects/{project}/update', function (Request $request, Project $project) {
        $data = $request->only(['status', 'preview_url', 'employee_id']);

        // Lógica de progresso dinâmico vs manual
        if ($request->has('steps')) {
            $project->steps = $request->steps;
            $data['steps'] = $request->steps;
            $data['progress'] = $project->dynamic_progress; // Usa o Accessor do Model
        } else {
            $data['progress'] = $request->progress;
        }

        $project->update($data);
        return back()->with('success', 'Protocolo atualizado com sucesso!');
    })->name('projects.update');

    // Gestão de Equipe (Apenas para Super Admin acessar se desejar, ou ambos)
    // GESTÃO DE USUÁRIOS
    Route::get('/users', function () {
        if (auth()->user()->role !== 'admin') abort(403);

        $users = User::with('assignedProjects')->whereIn('role', ['employee', 'client'])->get();
        $projects = Project::all(); // Necessário para o select de associação
        return view('admin.users.index', compact('users', 'projects'));
    })->name('users.index');

    Route::post('/users/store', function (Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|min:8',
            'role' => 'required|in:employee,client',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        return back()->with('success', 'Agente registrado com sucesso!');
    })->name('users.store');

    // NOVA ROTA: UPDATE COMPLETO (Incluso associação de projetos)
    Route::put('/users/{user}', function (Request $request, User $user) {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'role' => 'required|in:employee,client',
            'projects' => 'nullable|array',
            'projects.*' => 'exists:projects,id',
            'password' => 'nullable|min:8'
        ]);

        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->role = $data['role'];
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }
        $user->save();

        // Sincroniza os projetos na tabela pivot project_user
        if ($user->role === 'employee') {
            $user->assignedProjects()->sync($request->projects ?? []);
        }

        return back()->with('success', 'Perfil do Agente atualizado!');
    })->name('users.update');

    Route::delete('/users/{user}', function (User $user) {
        $user->delete();
        return back()->with('success', 'Usuário removido do sistema.');
    })->name('users.destroy');
});

/*
|--------------------------------------------------------------------------
| 5. ROTAS DE PERFIL (BREEZE) & AUTH
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::get('/profile/settings', [ProfileController::class, 'settings'])->name('profile.settings');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
