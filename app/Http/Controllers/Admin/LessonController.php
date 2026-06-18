<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\Module;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class LessonController extends Controller
{
    public function create(Course $course, Module $module): View
    {
        return view('admin.lessons.create', compact('course', 'module'));
    }

    public function store(Request $request, Course $course, Module $module): RedirectResponse
    {
        $validated = $request->validate([
            'title'            => 'required|string|max:255',
            'description'      => 'nullable|string',
            'video_url'        => 'nullable|string|max:500',
            'video_type'       => 'required|in:youtube,vimeo,local,external',
            'duration_seconds' => 'nullable|integer|min:0',
            'is_free_preview'  => 'boolean',
        ]);

        $order = $module->lessons()->max('order') + 1;
        $module->lessons()->create([...$validated, 'order' => $order]);

        return redirect()->route('admin.courses.show', $course)
            ->with('success', 'Aula criada com sucesso!');
    }

    public function edit(Course $course, Module $module, Lesson $lesson): View
    {
        return view('admin.lessons.edit', compact('course', 'module', 'lesson'));
    }

    public function update(Request $request, Course $course, Module $module, Lesson $lesson): RedirectResponse
    {
        $validated = $request->validate([
            'title'            => 'required|string|max:255',
            'description'      => 'nullable|string',
            'video_url'        => 'nullable|string|max:500',
            'video_type'       => 'required|in:youtube,vimeo,local,external',
            'duration_seconds' => 'nullable|integer|min:0',
            'is_free_preview'  => 'boolean',
        ]);

        $lesson->update($validated);

        return redirect()->route('admin.courses.show', $course)
            ->with('success', 'Aula atualizada!');
    }

    public function destroy(Course $course, Module $module, Lesson $lesson): RedirectResponse
    {
        $lesson->delete();

        return redirect()->route('admin.courses.show', $course)
            ->with('success', 'Aula removida.');
    }
}
