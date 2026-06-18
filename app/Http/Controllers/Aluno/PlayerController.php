<?php

namespace App\Http\Controllers\Aluno;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\LessonProgress;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PlayerController extends Controller
{
    public function show(Request $request, Course $course, ?Lesson $lesson = null): View
    {
        $enrolled = $request->user()
            ->enrollments()
            ->where('course_id', $course->id)
            ->exists();

        if (!$enrolled) {
            abort(403, 'Você não está matriculado neste curso.');
        }

        $course->load(['modules.lessons.materials']);

        // If no lesson specified, load the first one
        if (!$lesson) {
            $lesson = $course->modules->first()?->lessons->first();
        }

        $progress = $lesson
            ? LessonProgress::where('user_id', $request->user()->id)
                ->where('lesson_id', $lesson->id)
                ->first()
            : null;

        $completed_ids = LessonProgress::where('user_id', $request->user()->id)
            ->where('completed', true)
            ->pluck('lesson_id')
            ->toArray();

        return view('aluno.player', compact('course', 'lesson', 'progress', 'completed_ids'));
    }

    public function markProgress(Request $request, Lesson $lesson): JsonResponse
    {
        $validated = $request->validate([
            'watched_seconds' => 'required|integer|min:0',
            'completed'       => 'boolean',
        ]);

        $progress = LessonProgress::updateOrCreate(
            ['user_id' => $request->user()->id, 'lesson_id' => $lesson->id],
            [
                'watched_seconds' => $validated['watched_seconds'],
                'completed'       => $validated['completed'] ?? false,
                'completed_at'    => ($validated['completed'] ?? false) ? now() : null,
            ]
        );

        return response()->json(['status' => 'ok', 'progress' => $progress]);
    }
}
