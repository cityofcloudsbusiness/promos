<?php

namespace App\Http\Controllers\Aluno;

use App\Http\Controllers\Controller;
use App\Models\AccessRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AccessRequestController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'course_id'   => 'nullable|exists:courses,id',
            'formacao_id' => 'nullable|exists:formacoes,id',
            'message'     => 'nullable|string|max:500',
        ]);

        $user = $request->user();

        if ($request->course_id) {
            if ($user->enrollments()->where('course_id', $request->course_id)->exists()) {
                return back()->with('info', 'Você já está matriculado neste curso.');
            }
        }

        if ($request->formacao_id) {
            if ($user->formacaoEnrollments()->where('formacao_id', $request->formacao_id)->exists()) {
                return back()->with('info', 'Você já está inscrito nesta formação.');
            }
        }

        $existing = AccessRequest::where('user_id', $user->id)
            ->where('course_id', $request->course_id)
            ->where('formacao_id', $request->formacao_id)
            ->where('status', 'pending')
            ->exists();

        if ($existing) {
            return back()->with('info', 'Você já tem uma solicitação pendente para este item.');
        }

        AccessRequest::create([
            'user_id'     => $user->id,
            'course_id'   => $request->course_id,
            'formacao_id' => $request->formacao_id,
            'message'     => $request->message,
            'status'      => 'pending',
        ]);

        return back()->with('success', 'Solicitação enviada! O professor será notificado em breve.');
    }
}
