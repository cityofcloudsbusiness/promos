@extends('layouts.admin')

@section('title', $course->title)
@section('page-title', $course->title)
@section('page-subtitle', 'Gerencie módulos e aulas deste curso')

@section('header-actions')
    <div class="flex gap-3">
        <a href="{{ route('admin.courses.edit', $course) }}"
           class="inline-flex items-center gap-2 px-4 py-2 bg-slate-100 text-slate-700 rounded-lg text-sm hover:bg-slate-200 transition">
            ✏️ Editar Curso
        </a>
        <a href="{{ route('admin.courses.index') }}"
           class="text-sm text-slate-500 hover:text-slate-700 flex items-center gap-1 ml-2">
            ← Voltar
        </a>
    </div>
@endsection

@section('content')

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

        {{-- Coluna Módulos/Aulas --}}
        <div class="lg:col-span-2 space-y-4">

            {{-- Módulos existentes --}}
            @forelse($course->modules as $module)
                <div class="bg-white rounded-2xl border border-slate-200 overflow-hidden">
                    <div class="px-5 py-4 bg-slate-50 border-b border-slate-200 flex items-center justify-between">
                        <div class="flex items-center gap-2">
                            <span class="w-6 h-6 rounded-full bg-indigo-100 text-indigo-700 text-xs font-bold flex items-center justify-center">
                                {{ $loop->iteration }}
                            </span>
                            <h3 class="font-semibold text-slate-800">{{ $module->title }}</h3>
                        </div>
                        <div class="flex gap-2">
                            <a href="{{ route('admin.courses.modules.lessons.create', [$course, $module]) }}"
                               class="px-3 py-1.5 bg-indigo-600 text-white rounded-lg text-xs font-medium hover:bg-indigo-700 transition">
                                + Aula
                            </a>
                            <form method="POST" action="{{ route('admin.courses.modules.destroy', [$course, $module]) }}"
                                  onsubmit="return confirm('Remover módulo e todas as aulas?')">
                                @csrf @method('DELETE')
                                <button type="submit"
                                    class="px-3 py-1.5 bg-red-50 text-red-500 rounded-lg text-xs hover:bg-red-100 transition">
                                    🗑️
                                </button>
                            </form>
                        </div>
                    </div>

                    @if($module->lessons->isEmpty())
                        <p class="px-5 py-4 text-sm text-slate-400">Nenhuma aula ainda.</p>
                    @else
                        <ul class="divide-y divide-slate-100">
                            @foreach($module->lessons->sortBy('order') as $lesson)
                                <li class="px-4 py-3 flex items-center justify-between hover:bg-slate-50 transition group">
                                    {{-- Reorder buttons --}}
                                    <div class="flex flex-col gap-0.5 mr-2 shrink-0 opacity-0 group-hover:opacity-100 transition">
                                        <form method="POST"
                                              action="{{ route('admin.courses.modules.lessons.reorder', [$course, $module, $lesson]) }}">
                                            @csrf @method('PATCH')
                                            <input type="hidden" name="direction" value="up">
                                            <button type="submit" class="w-5 h-5 flex items-center justify-center text-slate-400 hover:text-indigo-600 rounded hover:bg-slate-100 transition text-xs leading-none">↑</button>
                                        </form>
                                        <form method="POST"
                                              action="{{ route('admin.courses.modules.lessons.reorder', [$course, $module, $lesson]) }}">
                                            @csrf @method('PATCH')
                                            <input type="hidden" name="direction" value="down">
                                            <button type="submit" class="w-5 h-5 flex items-center justify-center text-slate-400 hover:text-indigo-600 rounded hover:bg-slate-100 transition text-xs leading-none">↓</button>
                                        </form>
                                    </div>

                                    <div class="flex items-center gap-3 flex-1 min-w-0">
                                        <span class="text-slate-300 text-xs font-mono w-4 shrink-0">{{ $loop->iteration }}</span>

                                        {{-- Content type badge --}}
                                        @if($lesson->isPdf())
                                            <span class="shrink-0 flex items-center gap-1 px-2 py-0.5 bg-rose-50 text-rose-600 border border-rose-100 rounded-lg text-xs font-medium">
                                                <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                                                PDF
                                            </span>
                                        @else
                                            <span class="shrink-0 flex items-center gap-1 px-2 py-0.5 bg-indigo-50 text-indigo-600 border border-indigo-100 rounded-lg text-xs font-medium">
                                                <svg width="11" height="11" viewBox="0 0 24 24" fill="currentColor"><polygon points="5 3 19 12 5 21 5 3"/></svg>
                                                Vídeo
                                            </span>
                                        @endif

                                        <div class="min-w-0">
                                            <p class="text-sm font-medium text-slate-700 truncate">{{ $lesson->title }}</p>
                                            <p class="text-xs text-slate-400">
                                                @if($lesson->isPdf())
                                                    {{ $lesson->pdf_path ? basename($lesson->pdf_path) : 'PDF não enviado' }}
                                                @elseif($lesson->duration_seconds > 0)
                                                    {{ gmdate('H:i:s', $lesson->duration_seconds) }}
                                                @else
                                                    {{ $lesson->contentTypeLabel() }}
                                                @endif
                                            </p>
                                        </div>

                                        @if($lesson->is_free_preview)
                                            <span class="px-1.5 py-0.5 bg-emerald-100 text-emerald-600 text-xs rounded shrink-0">preview</span>
                                        @endif
                                    </div>

                                    <div class="flex gap-2 shrink-0 ml-2">
                                        <a href="{{ route('admin.courses.modules.lessons.edit', [$course, $module, $lesson]) }}"
                                           class="text-xs text-slate-400 hover:text-indigo-600 transition">✏️</a>
                                        <form method="POST"
                                              action="{{ route('admin.courses.modules.lessons.destroy', [$course, $module, $lesson]) }}"
                                              onsubmit="return confirm('Remover este conteúdo?')">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="text-xs text-slate-400 hover:text-red-500 transition">🗑️</button>
                                        </form>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            @empty
                <div class="bg-white rounded-2xl border border-slate-200 px-6 py-10 text-center text-slate-400">
                    <p class="text-3xl mb-2">📦</p>
                    <p>Nenhum módulo criado. Adicione o primeiro abaixo.</p>
                </div>
            @endforelse

            {{-- Formulário: Adicionar Módulo --}}
            <div class="bg-white rounded-2xl border border-indigo-200 p-5">
                <h4 class="font-semibold text-slate-700 mb-4">➕ Adicionar Módulo</h4>
                <form method="POST" action="{{ route('admin.courses.modules.store', $course) }}" class="flex gap-3">
                    @csrf
                    <input type="text" name="title" placeholder="Título do módulo"
                           class="flex-1 px-4 py-2 border border-slate-300 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500"
                           required>
                    <button type="submit"
                            class="px-4 py-2 bg-indigo-600 text-white rounded-xl text-sm font-medium hover:bg-indigo-700 transition">
                        Adicionar
                    </button>
                </form>
            </div>
        </div>

        {{-- Coluna Lateral: Info do Curso --}}
        <div class="space-y-4">
            <div class="bg-white rounded-2xl border border-slate-200 overflow-hidden">
                @if($course->thumbnail)
                    <img src="{{ Storage::url($course->thumbnail) }}" alt="{{ $course->title }}"
                         class="w-full h-40 object-cover">
                @else
                    <div class="w-full h-40 bg-gradient-to-br from-indigo-100 to-indigo-200 flex items-center justify-center">
                        <span class="text-5xl">📖</span>
                    </div>
                @endif
                <div class="p-5 space-y-3 text-sm">
                    @php $sc = ['draft'=>'bg-slate-100 text-slate-600','published'=>'bg-emerald-100 text-emerald-700','archived'=>'bg-amber-100 text-amber-700']; $sl = ['draft'=>'Rascunho','published'=>'Publicado','archived'=>'Arquivado']; @endphp
                    <div class="flex items-center justify-between">
                        <span class="text-slate-500">Status</span>
                        <span class="px-2 py-0.5 rounded-full text-xs font-medium {{ $sc[$course->status] }}">
                            {{ $sl[$course->status] }}
                        </span>
                    </div>
                    @if($course->area)
                        <div class="flex items-center justify-between">
                            <span class="text-slate-500">Área</span>
                            <span class="text-slate-700 font-medium">{{ $course->area }}</span>
                        </div>
                    @endif
                    <div class="flex items-center justify-between">
                        <span class="text-slate-500">Módulos</span>
                        <span class="text-slate-700 font-medium">{{ $course->modules->count() }}</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <span class="text-slate-500">Aulas</span>
                        <span class="text-slate-700 font-medium">{{ $course->modules->sum(fn($m) => $m->lessons->count()) }}</span>
                    </div>
                    @if($course->duration_hours > 0)
                        <div class="flex items-center justify-between">
                            <span class="text-slate-500">Carga Horária</span>
                            <span class="text-slate-700 font-medium">{{ $course->duration_hours }}h</span>
                        </div>
                    @endif
                </div>
            </div>
        </div>

    </div>

@endsection
