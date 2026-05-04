<?php

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

        // CORREÇÃO: Se o usuário já tem uma assinatura ativa, redireciona para o Dashboard
        // Isso impede que ele fique preso nesta tela após o pagamento.
        if ($user->subscribed('default')) {
            return redirect()->route('dashboard');
        }

        return view('site.pagamentos.inscricaoWebSiteManu');
    })->name('subscribeWebM');

    // 2. Checkout Stripe (Gera o link de pagamento)
    Route::get('/checkout-assinatura', function (Request $request) {
        if ($request->user()->role === 'admin' || $request->user()->role === 'employee') {
            return redirect()->route('admin.projects.index');
        }

        return $request->user()
            ->newSubscription('default', env('STRIPE_PRICE_ID'))
            ->checkout([
                'success_url' => route('dashboard') . '?success=true',
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
});


/*
|--------------------------------------------------------------------------
| 3. ÁREA DO CLIENTE (DASHBOARD & CHAT)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/dashboard', function (Request $request) {
        $user = $request->user();

        // 1. SEGURANÇA: Se for Admin ou Colaborador, manda para gestão
        if ($user->role === 'admin' || $user->role === 'employee') {
            return redirect()->route('admin.projects.index');
        }

        // 2. SEGURANÇA CLIENTE: Se não tiver assinatura ativa, manda pagar
        if (!$user->subscribed('default')) {
            return redirect()->route('subscribeWebM');
        }

        // 3. FLUXO CLIENTE ASSINANTE
        $project = $user->project;

        $messages = $project
            ? $project->messages()->with('user')->latest()->get()
            : collect();

        return view('dashboard', [
            'project' => $project,
            'messages' => $messages,
            'subscription' => $user->subscription('default')
        ]);
    })->name('dashboard');

    // Salvar mensagens do chat
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
    Route::delete('/users/{user}', function (User $user) {
        // Impede que você delete a si mesmo
        if ($user->id === auth()->id()) {
            return back()->with('error', 'Você não pode auto-eliminar seu acesso!');
        }
        $user->delete();
        return back()->with('success', 'Usuário removido do banco de dados.');
    })->name('users.destroy');
    
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
    Route::get('/users', function () {
        // Segurança extra: talvez só o 'admin' real deva criar usuários
        if (auth()->user()->role !== 'admin') {
            abort(403);
        }

        $users = User::whereIn('role', ['employee', 'client'])->get();
        return view('admin.users.index', compact('users'));
    })->name('users.index');

    Route::post('/users/store', function (Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|min:8',
            'role' => 'required|in:employee,client', // Valida se é um dos dois
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role, // Aqui ele salvará 'employee' ou 'client'
        ]);

        return back()->with('success', 'Agente registrado no sistema!');
    })->name('users.store');
});

/*
|--------------------------------------------------------------------------
| 5. ROTAS DE PERFIL (BREEZE) & AUTH
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
