<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// 1. A One-Page Principal (Pública e rastreável pelo Google)
Route::get('/', function () {
    return view('welcome');
})->name('home');

// 2. Página de Assinatura (Acessível após registro, antes do painel)
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/subscribe', function () {
        return view('subscribe');
    })->name('subscribe');
});

// 3. Painel do Cliente (Totalmente protegido e não rastreável pelo Google)
Route::middleware(['auth', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

// As rotas do Breeze (Login, Registro, etc.)
require __DIR__.'/auth.php';