@extends('layouts.admin')

@section('title', 'Meus Cursos')
@section('page-title', 'Meus Cursos')
@section('page-subtitle', $courses->total() . ' cursos no total')

@section('header-actions')
    <a href="{{ route('admin.courses.create') }}"
       class="inline-flex items-center gap-2 px-4 py-2 bg-indigo-600 text-white rounded-lg text-sm font-medium hover:bg-indigo-700 transition">
        ➕ Novo Curso
    </a>
@endsection

@section('content')
    @if($courses->isEmpty())
        <div class="bg-white rounded-2xl border border-slate-200 px-6 py-16 text-center">
            <p class="text-5xl mb-4">📚</p>
            <h3 class="text-lg font-semibold text-slate-700 mb-2">Nenhum curso criado</h3>
            <p class="text-slate-500 mb-6">Comece criando seu primeiro curso para os alunos.</p>
            <a href="{{ route('admin.courses.create') }}"
               class="inline-flex items-center gap-2 px-5 py-2.5 bg-indigo-600 text-white rounded-xl text-sm font-medium hover:bg-indigo-700 transition">
                ➕ Criar Primeiro Curso
            </a>
        </div>
    @else
        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">
            @foreach($courses as $course)
                <div class="bg-white rounded-2xl border border-slate-200 overflow-hidden flex flex-col hover:shadow-md transition">
                    @if($course->thumbnail)
                        <img src="{{ Storage::url($course->thumbnail) }}" alt="{{ $course->title }}"
                             class="w-full h-44 object-cover">
                    @else
                        <div class="w-full h-44 bg-gradient-to-br from-indigo-100 to-indigo-200 flex items-center justify-center">
                            <span class="text-5xl">📖</span>
                        </div>
                    @endif

                    <div class="p-5 flex-1 flex flex-col">
                        <div class="flex items-start justify-between gap-2 mb-2">
                            <h3 class="font-semibold text-slate-800 leading-tight">{{ $course->title }}</h3>
                            @php
                                $sc = ['draft' => 'bg-slate-100 text-slate-600', 'published' => 'bg-emerald-100 text-emerald-700', 'archived' => 'bg-amber-100 text-amber-700'];
                                $sl = ['draft' => 'Rascunho', 'published' => 'Publicado', 'archived' => 'Arquivado'];
                            @endphp
                            <span class="shrink-0 px-2 py-0.5 rounded-full text-xs font-medium {{ $sc[$course->status] }}">
                                {{ $sl[$course->status] }}
                            </span>
                        </div>

                        @if($course->area)
                            <p class="text-xs text-indigo-600 font-medium mb-2">{{ $course->area }}</p>
                        @endif

                        <p class="text-sm text-slate-500 line-clamp-2 mb-4 flex-1">
                            {{ $course->description ?? 'Sem descrição.' }}
                        </p>

                        <div class="flex items-center gap-4 text-xs text-slate-400 mb-4">
                            <span>📦 {{ $course->modules_count }} módulo(s)</span>
                            <span>🎓 {{ $course->enrollments_count }} aluno(s)</span>
                        </div>

                        <div class="flex gap-2">
                            <a href="{{ route('admin.courses.show', $course) }}"
                               class="flex-1 text-center px-3 py-2 bg-indigo-600 text-white rounded-lg text-xs font-medium hover:bg-indigo-700 transition">
                                Gerenciar
                            </a>
                            <a href="{{ route('admin.courses.edit', $course) }}"
                               class="px-3 py-2 bg-slate-100 text-slate-600 rounded-lg text-xs hover:bg-slate-200 transition">
                                ✏️
                            </a>
                            <form method="POST" action="{{ route('admin.courses.destroy', $course) }}"
                                  onsubmit="return confirm('Remover este curso?')">
                                @csrf @method('DELETE')
                                <button type="submit"
                                    class="px-3 py-2 bg-red-50 text-red-500 rounded-lg text-xs hover:bg-red-100 transition">
                                    🗑️
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-8">
            {{ $courses->links() }}
        </div>
    @endif
@endsection
