<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class CourseController extends Controller
{
    public function index(Request $request): View
    {
        $courses = Course::where('instructor_id', $request->user()->id)
            ->withCount(['modules', 'enrollments'])
            ->latest()
            ->paginate(12);

        return view('admin.courses.index', compact('courses'));
    }

    public function create(): View
    {
        return view('admin.courses.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title'          => 'required|string|max:255',
            'description'    => 'nullable|string',
            'area'           => 'nullable|string|max:100',
            'status'         => 'required|in:draft,published,archived',
            'duration_hours' => 'nullable|integer|min:0',
            'thumbnail'      => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('thumbnail')) {
            $validated['thumbnail'] = $request->file('thumbnail')->store('thumbnails', 'public');
        }

        $validated['instructor_id'] = $request->user()->id;
        $validated['slug'] = Str::slug($validated['title']);

        $course = Course::create($validated);

        return redirect()->route('admin.courses.show', $course)
            ->with('success', 'Curso criado com sucesso!');
    }

    public function show(Course $course): View
    {
        $this->authorizeInstructor($course);
        $course->load(['modules.lessons']);

        return view('admin.courses.show', compact('course'));
    }

    public function edit(Course $course): View
    {
        $this->authorizeInstructor($course);

        return view('admin.courses.edit', compact('course'));
    }

    public function update(Request $request, Course $course): RedirectResponse
    {
        $this->authorizeInstructor($course);

        $validated = $request->validate([
            'title'          => 'required|string|max:255',
            'description'    => 'nullable|string',
            'area'           => 'nullable|string|max:100',
            'status'         => 'required|in:draft,published,archived',
            'duration_hours' => 'nullable|integer|min:0',
            'thumbnail'      => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('thumbnail')) {
            $validated['thumbnail'] = $request->file('thumbnail')->store('thumbnails', 'public');
        }

        $course->update($validated);

        return redirect()->route('admin.courses.show', $course)
            ->with('success', 'Curso atualizado!');
    }

    public function destroy(Course $course): RedirectResponse
    {
        $this->authorizeInstructor($course);
        $course->delete();

        return redirect()->route('admin.courses.index')
            ->with('success', 'Curso removido.');
    }

    private function authorizeInstructor(Course $course): void
    {
        if ($course->instructor_id !== auth()->id() && !auth()->user()->isAdmin()) {
            abort(403);
        }
    }
}
