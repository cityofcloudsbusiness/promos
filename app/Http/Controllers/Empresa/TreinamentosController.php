<?php

namespace App\Http\Controllers\Empresa;

use App\Http\Controllers\Controller;
use App\Models\Empresa;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TreinamentosController extends Controller
{
    public function index(Request $request): View
    {
        $empresa = Empresa::with(['cursoAcessos.course'])
            ->where('gestor_id', $request->user()->id)
            ->firstOrFail();

        return view('empresa.treinamentos.index', compact('empresa'));
    }
}
