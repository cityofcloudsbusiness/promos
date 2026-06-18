<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Empresa;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\View\View;

class EmpresaRegisterController extends Controller
{
    public function create(): View
    {
        return view('auth.empresa-register');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'nome'             => 'required|string|max:255',
            'email'            => 'required|email|max:255|unique:users',
            'password'         => ['required', 'confirmed', Password::defaults()],
            'empresa_nome'     => 'required|string|max:255',
            'empresa_cnpj'     => 'required|string|min:14|max:18|unique:empresas,cnpj',
            'empresa_segmento' => 'required|string|max:100',
        ]);

        $user = User::create([
            'name'     => $request->nome,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'role'     => 'empresa',
        ]);

        Empresa::create([
            'gestor_id'         => $user->id,
            'nome'              => $request->empresa_nome,
            'cnpj'              => preg_replace('/\D/', '', $request->empresa_cnpj),
            'segmento'          => $request->empresa_segmento,
            'email_corporativo' => $request->email,
        ]);

        event(new Registered($user));
        Auth::login($user);

        return redirect()->route('empresa.dashboard');
    }
}
