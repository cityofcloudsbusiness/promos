<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request; // Importante para o checkout

// 1. A One-Page Principal (Pública e rastreável pelo Google)
Route::get('/', function () {
    return view('site.index');
})->name('home');

// 2. Página de Assinatura e Processo de Checkout
Route::middleware(['auth', 'verified'])->group(function () {
    
    // Página com o botão "Assinar Agora"
    Route::get('/subscribe', function () {
        return view('subscribe');
    })->name('subscribe');

    // Rota que de fato cria a sessão de pagamento no Stripe
    Route::get('/checkout-assinatura', function (Request $request) {
        // 'default' é o nome da assinatura
        // 'price_...' é o ID que você pegou no painel do Stripe
        return $request->user()
            ->newSubscription('default', 'price_SEU_ID_DO_STRIPE_AQUI')
            ->checkout([
                'success_url' => route('dashboard') . '?success=true',
                'cancel_url' => route('subscribe') . '?error=cancel',
            ]);
    })->name('checkout');

    // Rota para o usuário gerenciar o cartão dele (Portal do Cliente)
    Route::get('/billing-portal', function (Request $request) {
        return $request->user()->redirectToBillingPortal(route('dashboard'));
    })->name('billing');
});

// 3. Painel do Cliente (Totalmente protegido)
Route::middleware(['auth', 'verified'])->get('/dashboard', function (Request $request) {
    // Passamos a assinatura para a view para poder checar o status
    return view('dashboard', [
        'subscription' => $request->user()->subscription('default')
    ]);
})->name('dashboard');

// As rotas do Breeze (Login, Registro, etc.)
require __DIR__.'/auth.php';