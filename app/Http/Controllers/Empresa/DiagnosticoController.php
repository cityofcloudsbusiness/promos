<?php

namespace App\Http\Controllers\Empresa;

use App\Http\Controllers\Controller;
use App\Models\Empresa;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DiagnosticoController extends Controller
{
    public function index(Request $request): View
    {
        $empresa = Empresa::with('pilares')
            ->where('gestor_id', $request->user()->id)
            ->firstOrFail();

        return view('empresa.diagnostico', compact('empresa'));
    }
}
