<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MessageController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
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

    // Listagem de Projetos (Visão filtrada se for Employee)
    Route::get('/projects', function () {
        // No bloco de rotas admin
        $projects = auth()->user()->role === 'admin'
            ? Project::with(['user', 'employee', 'developers'])->get()
            : Project::where('employee_id', auth()->id())
            ->orWhereHas('developers', function ($q) {
                $q->where('user_id', auth()->id());
            })
            ->with('user')
            ->get();

        $employees = User::where('role', 'employee')->get();

        return view('admin.projects.index', compact('projects', 'employees'));
    })->name('projects.index');

    // Atualização de Projetos (Progresso, Status e Colaborador)
    Route::post('/projects/{project}/update', function (Request $request, Project $project) {
        $data = $request->only(['status', 'preview_url', 'employee_id']);

        if ($request->has('steps')) {
            $project->steps = $request->steps;
            $data['steps'] = $request->steps;
            $data['progress'] = $project->dynamic_progress;
        } else {
            $data['progress'] = $request->progress;
        }

        $project->update($data);
        return back()->with('success', 'Projeto atualizado com sucesso!');
    })->name('projects.update');
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



