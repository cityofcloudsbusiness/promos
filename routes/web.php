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
| 2. FLUXO DE PAGAMENTO (STRIPE) - Mantido Original
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'verified'])->group(function () {
    
    // Página de seleção de plano
    Route::get('/subscribeWebM', function () {
        return view('site.pagamentos.inscricaoWebSiteManu');
    })->name('subscribeWebM');

    // Checkout Stripe (Gera o link de pagamento)
    Route::get('/checkout-assinatura', function (Request $request) {
        return $request->user()
            ->newSubscription('default', env('STRIPE_PRICE_ID'))
            ->checkout([
                'success_url' => route('dashboard') . '?success=true',
                'cancel_url' => route('subscribeWebM') . '?error=cancel',
            ]);
    })->name('checkout');

    // Portal de Gerenciamento do Cartão
    Route::get('/billing-portal', function (Request $request) {
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
        // SEGURANÇA: Se não tiver assinatura ativa, manda pagar
        if (!$request->user()->subscribed('default')) {
            return redirect()->route('subscribeWebM');
        }

        $project = auth()->user()->project;
        
        // Busca mensagens se o projeto existir
        $messages = $project 
            ? $project->messages()->with('user')->latest()->get() 
            : collect();
        
        return view('dashboard', [
            'project' => $project,
            'messages' => $messages,
            'subscription' => $request->user()->subscription('default')
        ]);
    })->name('dashboard');

    // Salvar mensagens do chat
    Route::post('/messages', [MessageController::class, 'store'])->name('messages.store');
});


/*
|--------------------------------------------------------------------------
| 4. ÁREA ADMINISTRATIVA (NOVO: ADMIN & EMPLOYEES)
|--------------------------------------------------------------------------
*/
// Atenção: Use o middleware 'admin' que você criou/configurou
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    
    // Listagem de Projetos (Visão filtrada se for Employee)
    Route::get('/projects', function () {
        $projects = auth()->user()->role === 'admin' 
            ? Project::with('user', 'employee')->get()
            : Project::where('employee_id', auth()->id())->with('user')->get();
            
        $employees = User::where('role', 'employee')->get();
        
        return view('admin.projects.index', compact('projects', 'employees'));
    })->name('projects.index');

    // Atualização de Progresso, Status e Colaborador Atribuído
    Route::post('/projects/{project}/update', function (Request $request, Project $project) {
        $data = $request->only(['status', 'preview_url', 'employee_id']);
        
        // Mantém a lógica de Progresso Dinâmico via Steps (JSON)
        if ($request->has('steps')) {
            $project->steps = $request->steps;
            $data['steps'] = $request->steps;
            $data['progress'] = $project->dynamic_progress; 
        } else {
            // Se não enviar steps, aceita o progresso manual (0-100)
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