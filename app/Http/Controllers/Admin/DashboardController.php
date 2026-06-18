<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Enrollment;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $stats = [
            'total_courses'     => Course::where('instructor_id', $request->user()->id)->count(),
            'published_courses' => Course::where('instructor_id', $request->user()->id)->where('status', 'published')->count(),
            'total_students'    => Enrollment::whereHas('course', fn($q) => $q->where('instructor_id', $request->user()->id))->distinct('user_id')->count(),
            'total_alunos'      => User::where('role', 'aluno')->count(),
        ];

        $recent_courses = Course::where('instructor_id', $request->user()->id)
            ->withCount('enrollments')
            ->latest()
            ->take(5)
            ->get();

        return view('admin.dashboard', compact('stats', 'recent_courses'));
    }
}
