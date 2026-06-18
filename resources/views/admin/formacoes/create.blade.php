@extends('layouts.admin')

@section('title', 'Nova Formação')
@section('page-title', 'Nova Formação')
@section('page-subtitle', 'Crie uma trilha de aprendizagem')

@section('header-actions')
    <a href="{{ route('admin.formacoes.index') }}"
       class="px-4 py-2 bg-slate-100 text-slate-700 rounded-lg text-sm font-medium hover:bg-slate-200 transition">
        ← Voltar
    </a>
@endsection

@section('content')

<div class="max-w-3xl">
    <form method="POST" action="{{ route('admin.formacoes.store') }}" enctype="multipart/form-data" class="space-y-6">
        @csrf

        {{-- Informações básicas --}}
        <div class="bg-white rounded-2xl border border-slate-200 p-6 space-y-5">
            <h3 class="font-semibold text-slate-800 text-sm border-b border-slate-100 pb-3">Informações da Formação</h3>

            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1.5">Título *</label>
                <input type="text" name="title" value="{{ old('title') }}" required
                       class="w-full px-4 py-2.5 border border-slate-300 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500"
                       placeholder="Ex: Formação em Gestão de Pessoas">
                @error('title')<p class="mt-1 text-xs text-red-500">{{ $message }}</p>@enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1.5">Descrição</label>
                <textarea name="description" rows="3"
                          class="w-full px-4 py-2.5 border border-slate-300 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500"
                          placeholder="Descreva o que o aluno irá aprender…">{{ old('description') }}</textarea>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1.5">Área</label>
                    <input type="text" name="area" value="{{ old('area') }}"
                           class="w-full px-4 py-2.5 border border-slate-300 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500"
                           placeholder="Ex: Gestão de Pessoas">
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1.5">Carga horária (h)</label>
                    <input type="number" name="duration_hours" value="{{ old('duration_hours', 0) }}" min="0"
                           class="w-full px-4 py-2.5 border border-slate-300 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
                </div>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1.5">Status</label>
                    <select name="status"
                            class="w-full px-4 py-2.5 border border-slate-300 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
                        <option value="draft"     {{ old('status','draft') === 'draft'     ? 'selected' : '' }}>Rascunho</option>
                        <option value="published" {{ old('status') === 'published' ? 'selected' : '' }}>Publicado</option>
                        <option value="archived"  {{ old('status') === 'archived'  ? 'selected' : '' }}>Arquivado</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1.5">Thumbnail</label>
                    <input type="file" name="thumbnail" accept="image/*"
                           class="w-full px-3 py-2 border border-slate-300 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
                </div>
            </div>
        </div>

        {{-- Cursos vinculados --}}
        <div class="bg-white rounded-2xl border border-slate-200 p-6">
            <h3 class="font-semibold text-slate-800 text-sm border-b border-slate-100 pb-3 mb-5">Cursos da Formação</h3>

            @if($courses->isEmpty())
                <p class="text-sm text-slate-400 text-center py-4">
                    Nenhum curso publicado disponível.
                    <a href="{{ route('admin.courses.create') }}" class="text-indigo-600 hover:underline">Criar um curso →</a>
                </p>
            @else
                <p class="text-xs text-slate-500 mb-3">Selecione os cursos que farão parte desta formação (a ordem de seleção define a sequência):</p>
                <div class="space-y-2 max-h-64 overflow-y-auto pr-1">
                    @foreach($courses as $course)
                        <label class="flex items-center gap-3 p-3 rounded-xl border border-slate-100 hover:border-indigo-200 hover:bg-indigo-50/30 cursor-pointer transition">
                            <input type="checkbox" name="courses[]" value="{{ $course->id }}"
                                   {{ in_array($course->id, old('courses', [])) ? 'checked' : '' }}
                                   class="w-4 h-4 rounded border-slate-300 text-indigo-600 focus:ring-indigo-500">
                            <span class="text-sm font-medium text-slate-700">{{ $course->title }}</span>
                            @if($course->area)
                                <span class="text-xs text-indigo-500 ml-auto">{{ $course->area }}</span>
                            @endif
                        </label>
                    @endforeach
                </div>
            @endif
        </div>

        <div class="flex items-center gap-3">
            <button type="submit"
                    class="px-6 py-2.5 bg-indigo-600 text-white rounded-xl text-sm font-semibold hover:bg-indigo-700 transition">
                Criar Formação
            </button>
            <a href="{{ route('admin.formacoes.index') }}"
               class="px-6 py-2.5 bg-slate-100 text-slate-700 rounded-xl text-sm font-medium hover:bg-slate-200 transition">
                Cancelar
            </a>
        </div>
    </form>
</div>

@endsection
