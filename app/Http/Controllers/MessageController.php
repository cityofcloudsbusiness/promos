<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\Project;
use Illuminate\Http\Request;
class MessageController extends Controller
{
    /**
     * Armazena uma nova mensagem e retorna JSON para o AJAX do frontend.
     * Se a requisição NÃO for AJAX (fallback), redireciona normalmente.
     */
    public function store(Request $request)
    {
        $request->validate([
            'project_id' => 'required|exists:projects,id',
            'content'    => 'required_without:attachment|nullable|string|max:5000',
            'attachment' => 'nullable|file|mimetypes:image/jpeg,image/png,image/gif,image/webp,image/jpg,video/mp4,video/webm,video/quicktime,video/ogg|max:51200',
        ]);

        // Segurança: garante que o projeto pertence ao usuário autenticado
        // (ou é um admin/employee com acesso)
        $project = Project::findOrFail($request->project_id);
        $user = auth()->user();

        $isAuthorized = $user->role === 'admin'
            || $user->role === 'employee'
            || $project->user_id === $user->id;

        if (!$isAuthorized) {
            if ($request->expectsJson()) {
                return response()->json(['error' => 'Não autorizado.'], 403);
            }
            abort(403);
        }

        $path = null;
        $attachmentType = null;
        if ($request->hasFile('attachment')) {
            $file = $request->file('attachment');
            $path = $file->store('attachments', 'uploads');
            $attachmentType = str_starts_with($file->getMimeType(), 'video/') ? 'video' : 'image';
        }

        $message = Message::create([
            'project_id' => $request->project_id,
            'user_id'    => $user->id,
            'content'    => $request->content,
            'attachment' => $path,
        ]);

        $message->load('user');

        if ($request->expectsJson()) {
            return response()->json([
                'success' => true,
                'message' => [
                    'id'              => $message->id,
                    'content'         => $message->content,
                    'user_id'         => $message->user_id,
                    'user_name'       => $message->user->name,
                    'attachment'      => $message->attachment
                        ? asset('uploads/' . $message->attachment)
                        : null,
                    'attachment_type' => $attachmentType,
                    'created_at'      => $message->created_at->format('H:i'),
                ],
            ]);
        }

        // --- Fallback tradicional (caso JS esteja desabilitado) ---
        return back()->with('success', 'Mensagem transmitida com sucesso!');
    }
}