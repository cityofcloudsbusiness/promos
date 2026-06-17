<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/gestao-pessoas', function () {
    return view('areas.gestao-pessoas');
});

Route::get('/ia', function () {
    return view('areas.ia');
});

Route::get('/tecnologia', function () {
    return view('areas.tecnologia');
});

Route::get('/logistica', function () {
    return view('areas.logistica');
});

Route::get('/gestao', function () {
    return view('areas.gestao');
});
