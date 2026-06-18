<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Module;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ModuleController extends Controller
{
    public function store(Request $request, Course $course): RedirectResponse
    {
        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $order = $course->modules()->max('order') + 1;
        $course->modules()->create([...$validated, 'order' => $order]);

        return back()->with('success', 'Módulo adicionado!');
    }

    public function update(Request $request, Course $course, Module $module): RedirectResponse
    {
        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $module->update($validated);

        return back()->with('success', 'Módulo atualizado!');
    }

    public function destroy(Course $course, Module $module): RedirectResponse
    {
        $module->delete();

        return back()->with('success', 'Módulo removido.');
    }
}
