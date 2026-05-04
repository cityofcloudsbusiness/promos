<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MessageController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'project_id' => 'required|exists:projects,id',
            'content'    => 'required_without:attachment|nullable|string',
            'attachment' => 'nullable|image|max:5120', // Limite de 5MB
        ]);

        $path = null;
        if ($request->hasFile('attachment')) {
            // Salva na pasta public/attachments para fácil acesso
            $path = $request->file('attachment')->store('attachments', 'public');
        }

        Message::create([
            'project_id' => $request->project_id,
            'user_id'    => auth()->id(),
            'content'    => $request->content,
            'attachment' => $path,
        ]);

        return back()->with('success', 'Mensagem transmitida com sucesso!');
    }
}