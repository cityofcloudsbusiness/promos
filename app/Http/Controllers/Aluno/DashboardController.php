<?php

namespace App\Http\Controllers\Aluno;

use App\Http\Controllers\Controller;
use App\Models\AccessRequest;
use App\Models\Course;
use App\Models\Formacao;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(Request $request): View
    {
        $user = $request->user();

        // Formações em que o aluno está inscrito
        $formacaoEnrollments = $user->formacaoEnrollments()
            ->with(['formacao.courses', 'formacao.instructor'])
            ->latest()
            ->get();

        // Cursos avulsos (não ligados a formação)
        $formacaoCourseIds = $formacaoEnrollments
            ->flatMap(fn ($fe) => $fe->formacao->courses->pluck('id'))
            ->unique();

        $enrollments = $user->enrollments()
            ->with(['course.instructor', 'course.modules'])
            ->whereNotIn('course_id', $formacaoCourseIds)
            ->latest()
            ->get();

        // IDs de tudo que o aluno já tem acesso
        $enrolledCourseIds = $user->enrollments()->pluck('course_id');

        // Formações disponíveis que o aluno não está inscrito
        $available_formacoes = Formacao::where('status', 'published')
            ->whereNotIn('id', $formacaoEnrollments->pluck('formacao_id'))
            ->withCount('courses')
            ->take(6)
            ->get();

        // Cursos avulsos disponíveis
        $available_courses = Course::where('status', 'published')
            ->whereNotIn('id', $enrolledCourseIds)
            ->withCount('lessons')
            ->take(6)
            ->get();

        // IDs de itens com solicitação pendente
        $pendingCourseIds = AccessRequest::where('user_id', $user->id)
            ->where('status', 'pending')
            ->whereNotNull('course_id')
            ->pluck('course_id');

        $pendingFormacaoIds = AccessRequest::where('user_id', $user->id)
            ->where('status', 'pending')
            ->whereNotNull('formacao_id')
            ->pluck('formacao_id');

        return view('aluno.dashboard', compact(
            'formacaoEnrollments',
            'enrollments',
            'available_formacoes',
            'available_courses',
            'pendingCourseIds',
            'pendingFormacaoIds'
        ));
    }
}
