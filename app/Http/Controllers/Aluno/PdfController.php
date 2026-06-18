<?php

namespace App\Http\Controllers\Aluno;

use App\Http\Controllers\Controller;
use App\Models\Lesson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\StreamedResponse;

class PdfController extends Controller
{
    public function serve(Request $request, Lesson $lesson): StreamedResponse
    {
        $user = $request->user();

        if (!$lesson->isPdf() || !$lesson->pdf_path) {
            abort(404, 'Apostila não encontrada.');
        }

        // Admins and professors can always preview
        if ($user->isAdmin() || $user->isProfessor()) {
            return $this->streamPdf($lesson);
        }

        // Aluno must be enrolled in the course that owns this lesson
        $courseId = $lesson->module?->course_id;
        if (!$courseId) abort(404);

        $enrolled = $user->enrollments()->where('course_id', $courseId)->exists();
        if (!$enrolled) {
            abort(403, 'Você não está matriculado neste curso.');
        }

        return $this->streamPdf($lesson);
    }

    private function streamPdf(Lesson $lesson): StreamedResponse
    {
        if (Storage::disk('local')->exists($lesson->pdf_path)) {
            $disk = Storage::disk('local');
        } elseif (Storage::disk('public')->exists($lesson->pdf_path)) {
            $disk = Storage::disk('public');
        } else {
            abort(404, 'Arquivo não encontrado.');
        }

        $size = $disk->size($lesson->pdf_path);

        return response()->stream(
            function () use ($disk, $lesson) {
                echo $disk->get($lesson->pdf_path);
            },
            200,
            [
                'Content-Type'        => 'application/pdf',
                'Content-Disposition' => 'inline; filename="apostila.pdf"',
                'Content-Length'      => $size,
                'Cache-Control'       => 'no-store, no-cache, must-revalidate',
                'Pragma'              => 'no-cache',
            ]
        );
    }
}
