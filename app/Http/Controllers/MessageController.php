<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use Illuminate\Support\Facades\Storage;

class MessageController extends Controller
{
    /**
     * Armazena uma nova mensagem (Transmissão) no chat.
     * Funciona para Clientes, Admins e Colaboradores.
     */
    public function store(Request $request)
    {
        // 1. Validação rigorosa
        $request->validate([
            'project_id' => 'required|exists:projects,id', // Garante que o projeto existe
            'content'    => 'required|string|max:5000',
            'attachment' => 'nullable|image|mimes:jpg,png,jpeg|max:2048', // Limite de 2MB
        ]);

        $path = null;

        // 2. Gerenciamento de Anexo (se houver)
        if ($request->hasFile('attachment')) {
            // Salva na pasta 'attachments' dentro de storage/app/public
            $path = $request->file('attachment')->store('attachments', 'public');
        }

        // 3. Criação da Mensagem
        Message::create([
            'project_id' => $request->project_id,
            'user_id'    => auth()->id(), // Quem está logado enviando
            'content'    => $request->content,
            'attachment' => $path,
        ]);

        // 4. Retorno com feedback visual
        return back()->with('success', 'Transmissão enviada com sucesso!');
    }
}