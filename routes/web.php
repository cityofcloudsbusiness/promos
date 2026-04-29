<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request; // Importante para o checkout
use App\Http\Controllers\MessageController;
use App\Models\Project;
use App\Models\Message;
use App\Models\User;


// 1. A One-Page Principal (Pública e rastreável pelo Google)
Route::get('/', function () {
    return view('site.index');
})->name('home');

// 2. Página de Assinatura e Processo de Checkout
Route::middleware(['auth', 'verified'])->group(function () {

    // Página com o botão "Assinar Agora"
    Route::get('/subscribeWebM', function () {
        // O Laravel converte os pontos em barras de diretório automaticamente
        return view('site.pagamentos.inscricaoWebSiteManu');
    })->name('subscribeWebM');

    // Rota que de fato cria a sessão de pagamento no Stripe
    Route::get('/checkout-assinatura', function (Request $request) {
        // 'default' é o nome da assinatura
        // 'price_...' é o ID que você pegou no painel do Stripe
        return $request->user()
            ->newSubscription('default', env('STRIPE_PRICE_ID'))
            ->checkout([
                'success_url' => route('dashboard') . '?success=true',
                'cancel_url' => route('subscribeWebM') . '?error=cancel',
            ]);
    })->name('checkout');

    // Rota para o usuário gerenciar o cartão dele (Portal do Cliente)
    Route::get('/billing-portal', function (Request $request) {
        return $request->user()->redirectToBillingPortal(route('dashboard'));
    })->name('billing');
});

// 3. Painel do Cliente (Totalmente protegido)
Route::middleware(['auth', 'verified'])->get('/dashboard', function (Illuminate\Http\Request $request) {

    // 1. Verificação de Assinatura Stripe
    if (!$request->user()->subscribed('default')) {
        return redirect()->route('subscribeWebM');
    }

    // 2. Busca o projeto e as mensagens
    $project = auth()->user()->project;
    $messages = $project ? $project->messages()->with('user')->latest()->get() : collect();

    // 3. Retorna a view com tudo o que ela pede
    return view('dashboard', [
        'project' => $project,
        'messages' => $messages,
        'subscription' => $request->user()->subscription('default')
    ]);
})->name('dashboard');


// Rotas de Perfil do Breeze (Restauradas)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Rotas de Mensagens
Route::post('/messages', [MessageController::class, 'store'])->name('messages.store');

// Área Admin (Simples para começar)
Route::prefix('admin')->middleware(['auth'])->group(function () { // No routes/web.php dentro do prefix('admin')

    Route::post('/projects/{project}/update-progress', function (Request $request, Project $project) {
        // Agora você pode enviar 'steps' via Request
        // Exemplo de formato esperado: $request->steps = [ ['task' => 'Design', 'completed' => true], [...] ]

        $data = [
            'status' => $request->status,
        ];

        if ($request->has('steps')) {
            $data['steps'] = $request->steps;
            // Atualizamos o progress manual para manter compatibilidade
            $project->steps = $request->steps;
            $data['progress'] = $project->dynamic_progress;
        } else {
            $data['progress'] = $request->progress;
        }

        $project->update($data);

        return back()->with('success', 'Sistema atualizado!');
    })->name('admin.projects.update');
});

// As rotas do Breeze (Login, Registro, etc.)
require __DIR__ . '/auth.php';
