<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required|string',
            'attachment' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        $path = null;
        if ($request->hasFile('attachment')) {
            $path = $request->file('attachment')->store('attachments', 'public');
        }

        \App\Models\Message::create([
            'project_id' => $request->project_id,
            'user_id' => auth()->id(),
            'content' => $request->content,
            'attachment' => $path,
        ]);

        return back()->with('success', 'Transmissão enviada!');
    }
}
