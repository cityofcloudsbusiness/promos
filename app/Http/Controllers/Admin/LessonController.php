<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\Module;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class LessonController extends Controller
{
    public function create(Course $course, Module $module): View
    {
        return view('admin.lessons.create', compact('course', 'module'));
    }

    public function store(Request $request, Course $course, Module $module): RedirectResponse
    {
        $contentType = $request->input('content_type', 'video');

        $validated = $request->validate([
            'title'            => 'required|string|max:255',
            'description'      => 'nullable|string',
            'content_type'     => 'required|in:video,apostila',
            'video_url'        => 'nullable|string|max:500',
            'video_type'       => 'required_if:content_type,video|in:youtube,vimeo,local,external',
            'pdf_file'         => 'required_if:content_type,apostila|nullable|file|mimes:pdf|max:20480',
            'duration_seconds' => 'nullable|integer|min:0',
            'is_free_preview'  => 'boolean',
        ]);

        $pdfPath = null;
        if ($contentType === 'apostila' && $request->hasFile('pdf_file')) {
            $pdfPath = $request->file('pdf_file')->store('apostilas');
        }

        $order = $module->lessons()->max('order') + 1;

        $module->lessons()->create([
            'title'            => $validated['title'],
            'description'      => $validated['description'] ?? null,
            'content_type'     => $contentType,
            'video_url'        => $contentType === 'video' ? ($validated['video_url'] ?? null) : null,
            'video_type'       => $contentType === 'video' ? ($validated['video_type'] ?? 'youtube') : 'youtube',
            'pdf_path'         => $pdfPath,
            'duration_seconds' => $validated['duration_seconds'] ?? 0,
            'is_free_preview'  => $validated['is_free_preview'] ?? false,
            'order'            => $order,
        ]);

        return redirect()->route('admin.courses.show', $course)
            ->with('success', $contentType === 'apostila' ? 'Apostila criada com sucesso!' : 'Aula criada com sucesso!');
    }

    public function edit(Course $course, Module $module, Lesson $lesson): View
    {
        return view('admin.lessons.edit', compact('course', 'module', 'lesson'));
    }

    public function update(Request $request, Course $course, Module $module, Lesson $lesson): RedirectResponse
    {
        abort_if($module->course_id !== $course->id || $lesson->module_id !== $module->id, 404);

        $contentType = $request->input('content_type', 'video');

        $validated = $request->validate([
            'title'            => 'required|string|max:255',
            'description'      => 'nullable|string',
            'content_type'     => 'required|in:video,apostila',
            'video_url'        => 'nullable|string|max:500',
            'video_type'       => 'required_if:content_type,video|in:youtube,vimeo,local,external',
            'pdf_file'         => 'nullable|file|mimes:pdf|max:20480',
            'duration_seconds' => 'nullable|integer|min:0',
            'is_free_preview'  => 'boolean',
        ]);

        $pdfPath = $lesson->pdf_path;

        if ($contentType === 'apostila' && $request->hasFile('pdf_file')) {
            if ($lesson->pdf_path) Storage::disk('local')->delete($lesson->pdf_path);
            $pdfPath = $request->file('pdf_file')->store('apostilas');
        }

        if ($contentType === 'video' && $lesson->isPdf() && $lesson->pdf_path) {
            Storage::disk('local')->delete($lesson->pdf_path);
            $pdfPath = null;
        }

        $lesson->update([
            'title'            => $validated['title'],
            'description'      => $validated['description'] ?? null,
            'content_type'     => $contentType,
            'video_url'        => $contentType === 'video' ? ($validated['video_url'] ?? null) : null,
            'video_type'       => $contentType === 'video' ? ($validated['video_type'] ?? 'youtube') : $lesson->video_type,
            'pdf_path'         => $pdfPath,
            'duration_seconds' => $validated['duration_seconds'] ?? 0,
            'is_free_preview'  => $validated['is_free_preview'] ?? false,
        ]);

        return redirect()->route('admin.courses.show', $course)
            ->with('success', 'Conteúdo atualizado!');
    }

    public function reorder(Request $request, Course $course, Module $module, Lesson $lesson): RedirectResponse
    {
        abort_if($module->course_id !== $course->id || $lesson->module_id !== $module->id, 404);

        $request->validate(['direction' => 'required|in:up,down']);

        $direction = $request->direction;
        $currentOrder = $lesson->order;

        $swap = $module->lessons()
            ->when($direction === 'up',   fn ($q) => $q->where('order', '<', $currentOrder)->orderBy('order', 'desc'))
            ->when($direction === 'down', fn ($q) => $q->where('order', '>', $currentOrder)->orderBy('order', 'asc'))
            ->first();

        if ($swap) {
            [$lesson->order, $swap->order] = [$swap->order, $lesson->order];
            $lesson->save();
            $swap->save();
        }

        return back()->with('success', 'Ordem atualizada.');
    }

    public function destroy(Course $course, Module $module, Lesson $lesson): RedirectResponse
    {
        abort_if($lesson->module_id !== $module->id, 404);

        if ($lesson->pdf_path) Storage::disk('local')->delete($lesson->pdf_path);
        $lesson->delete();

        return redirect()->route('admin.courses.show', $course)
            ->with('success', 'Conteúdo removido.');
    }
}
