<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CourseAssignmentController extends Controller
{
    public function index(Request $request): View
    {
        $courses = Course::with('instructor')
            ->withCount('enrollments')
            ->latest()
            ->paginate(20);

        $professors = User::whereIn('role', ['professor', 'admin'])
            ->orderBy('name')
            ->get();

        return view('superadmin.courses.index', compact('courses', 'professors'));
    }

    public function updateInstructor(Request $request, Course $course): RedirectResponse
    {
        $request->validate([
            'instructor_id' => 'required|exists:users,id',
        ]);

        $instructor = User::findOrFail($request->instructor_id);

        if (!$instructor->isProfessor()) {
            return back()->with('error', 'O usuário selecionado não tem permissão de Professor.');
        }

        $course->update(['instructor_id' => $request->instructor_id]);

        return back()->with('success', "Curso \"{$course->title}\" atribuído a {$instructor->name}.");
    }

    public function updateArea(Request $request, Course $course): RedirectResponse
    {
        $request->validate([
            'area' => 'nullable|string|max:100',
        ]);

        $course->update(['area' => $request->area]);

        return back()->with('success', "Area do curso \"{$course->title}\" atualizada.");
    }
}
