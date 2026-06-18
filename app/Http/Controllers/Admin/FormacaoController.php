<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Formacao;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;

class FormacaoController extends Controller
{
    public function index(): View
    {
        $formacoes = Formacao::with('instructor')
            ->withCount('courses')
            ->where('instructor_id', auth()->id())
            ->orWhereNull('instructor_id')
            ->latest()
            ->paginate(15);

        return view('admin.formacoes.index', compact('formacoes'));
    }

    public function create(): View
    {
        $courses = Course::where('instructor_id', auth()->id())
            ->where('status', 'published')
            ->orderBy('title')
            ->get();

        return view('admin.formacoes.create', compact('courses'));
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'title'         => 'required|string|max:255',
            'description'   => 'nullable|string',
            'area'          => 'nullable|string|max:100',
            'duration_hours'=> 'nullable|integer|min:0',
            'status'        => 'required|in:draft,published,archived',
            'thumbnail'     => 'nullable|image|max:2048',
            'courses'       => 'nullable|array',
            'courses.*'     => 'exists:courses,id',
        ]);

        $data['slug']          = Str::slug($data['title']) . '-' . Str::random(5);
        $data['instructor_id'] = auth()->id();
        $data['duration_hours'] = $data['duration_hours'] ?? 0;

        if ($request->hasFile('thumbnail')) {
            $data['thumbnail'] = $request->file('thumbnail')->store('formacoes/thumbnails', 'public');
        }

        $formacao = Formacao::create($data);

        if (!empty($data['courses'])) {
            $pivotData = [];
            foreach ($data['courses'] as $i => $courseId) {
                $pivotData[$courseId] = ['order' => $i];
            }
            $formacao->courses()->sync($pivotData);
        }

        return redirect()->route('admin.formacoes.show', $formacao)
            ->with('success', "Formação \"{$formacao->title}\" criada com sucesso.");
    }

    public function show(Formacao $formacao): View
    {
        $formacao->load(['courses.modules', 'instructor']);

        return view('admin.formacoes.show', compact('formacao'));
    }

    public function edit(Formacao $formacao): View
    {
        $courses = Course::where('instructor_id', auth()->id())
            ->where('status', 'published')
            ->orderBy('title')
            ->get();

        $selectedCourses = $formacao->courses->pluck('id')->toArray();

        return view('admin.formacoes.edit', compact('formacao', 'courses', 'selectedCourses'));
    }

    public function update(Request $request, Formacao $formacao): RedirectResponse
    {
        $data = $request->validate([
            'title'         => 'required|string|max:255',
            'description'   => 'nullable|string',
            'area'          => 'nullable|string|max:100',
            'duration_hours'=> 'nullable|integer|min:0',
            'status'        => 'required|in:draft,published,archived',
            'thumbnail'     => 'nullable|image|max:2048',
            'courses'       => 'nullable|array',
            'courses.*'     => 'exists:courses,id',
        ]);

        if ($request->hasFile('thumbnail')) {
            if ($formacao->thumbnail) Storage::disk('public')->delete($formacao->thumbnail);
            $data['thumbnail'] = $request->file('thumbnail')->store('formacoes/thumbnails', 'public');
        }

        $formacao->update($data);

        $pivotData = [];
        foreach ($data['courses'] ?? [] as $i => $courseId) {
            $pivotData[$courseId] = ['order' => $i];
        }
        $formacao->courses()->sync($pivotData);

        return redirect()->route('admin.formacoes.show', $formacao)
            ->with('success', "Formação atualizada.");
    }

    public function destroy(Formacao $formacao): RedirectResponse
    {
        if ($formacao->thumbnail) Storage::disk('public')->delete($formacao->thumbnail);
        $formacao->delete();

        return redirect()->route('admin.formacoes.index')
            ->with('success', "Formação excluída.");
    }
}
