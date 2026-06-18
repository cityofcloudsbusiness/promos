<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Enrollment;
use App\Models\User;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $stats = [
            'total_users'      => User::count(),
            'total_alunos'     => User::where('role', 'aluno')->count(),
            'total_professores'=> User::where('role', 'professor')->count(),
            'total_cursos'     => Course::count(),
            'cursos_publicados'=> Course::where('status', 'published')->count(),
            'total_matriculas' => Enrollment::count(),
        ];

        $recent_users = User::where('role', '!=', 'admin')
            ->latest()
            ->take(8)
            ->get();

        $courses_without_instructor = Course::whereDoesntHave('instructor', fn($q) => $q->where('role', 'professor'))
            ->orWhere(fn($q) => $q->whereNull('instructor_id'))
            ->count();

        return view('superadmin.dashboard', compact('stats', 'recent_users', 'courses_without_instructor'));
    }
}
