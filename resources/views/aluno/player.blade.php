@extends('layouts.aluno')

@section('title', ($lesson?->title ?? 'Player') . ' · ' . $course->title)

@section('content')
<div class="flex h-[calc(100vh-3.5rem)] overflow-hidden">

    {{-- ───── Sidebar Lateral ───── --}}
    <aside class="w-80 shrink-0 bg-slate-900 text-white overflow-y-auto flex flex-col">
        {{-- Header sidebar --}}
        <div class="px-5 py-4 border-b border-slate-700">
            <a href="{{ route('aluno.dashboard') }}"
               class="text-xs text-slate-400 hover:text-white flex items-center gap-1 mb-3 transition">
                ← Voltar aos Cursos
            </a>
            <h2 class="font-bold text-sm leading-tight">{{ $course->title }}</h2>
            @if($course->area)
                <p class="text-xs text-indigo-400 mt-0.5">{{ $course->area }}</p>
            @endif
        </div>

        {{-- Lista de módulos e aulas --}}
        <nav class="flex-1 py-4">
            @foreach($course->modules as $module)
                <div class="mb-2">
                    {{-- Módulo header --}}
                    <button class="w-full px-5 py-3 flex items-center justify-between text-left hover:bg-slate-800 transition"
                            onclick="toggleModule({{ $module->id }})">
                        <span class="text-xs font-semibold text-slate-300 uppercase tracking-wider">
                            {{ $loop->iteration }}. {{ $module->title }}
                        </span>
                        <span class="text-slate-500 text-xs" id="arrow-{{ $module->id }}">▾</span>
                    </button>

                    {{-- Aulas do módulo --}}
                    <ul id="module-{{ $module->id }}" class="mt-1">
                        @foreach($module->lessons as $lsn)
                            @php
                                $isActive    = $lesson && $lesson->id === $lsn->id;
                                $isCompleted = in_array($lsn->id, $completed_ids);
                            @endphp
                            <li>
                                <a href="{{ route('aluno.player.lesson', [$course, $lsn]) }}"
                                   class="flex items-start gap-3 px-5 py-3 text-sm transition
                                          {{ $isActive ? 'bg-indigo-700 text-white' : 'text-slate-300 hover:bg-slate-800 hover:text-white' }}">

                                    {{-- Ícone status --}}
                                    <span class="mt-0.5 w-4 h-4 shrink-0 rounded-full flex items-center justify-center text-xs
                                                 {{ $isCompleted ? 'bg-emerald-500 text-white' : ($isActive ? 'bg-white text-indigo-700' : 'bg-slate-700 text-slate-400') }}">
                                        {{ $isCompleted ? '✓' : $loop->iteration }}
                                    </span>

                                    <div class="flex-1 min-w-0">
                                        <p class="truncate font-medium leading-snug">{{ $lsn->title }}</p>
                                        <p class="text-xs mt-0.5 {{ $isActive ? 'text-indigo-200' : 'text-slate-500' }}">
                                            @if($lsn->duration_seconds > 0)
                                                {{ gmdate('i:s', $lsn->duration_seconds) }}
                                            @else
                                                Vídeo
                                            @endif
                                            @if($lsn->is_free_preview && !$isActive)
                                                · <span class="text-emerald-400">preview</span>
                                            @endif
                                        </p>
                                    </div>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endforeach
        </nav>
    </aside>

    {{-- ───── Área Principal do Player ───── --}}
    <main class="flex-1 bg-slate-950 overflow-y-auto flex flex-col">

        @if($lesson)
            {{-- Player --}}
            <div class="w-full bg-black" id="player-container">
                @if(in_array($lesson->video_type, ['youtube', 'vimeo']))
                    <div class="relative w-full" style="padding-top: 56.25%">
                        <iframe id="video-iframe"
                                src="{{ $lesson->embed_url }}?enablejsapi=1&rel=0&modestbranding=1"
                                class="absolute inset-0 w-full h-full"
                                frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen>
                        </iframe>
                    </div>
                @elseif($lesson->video_type === 'local' || $lesson->video_type === 'external')
                    <div class="relative w-full" style="padding-top: 56.25%">
                        <video id="video-player"
                               class="absolute inset-0 w-full h-full"
                               controls
                               src="{{ $lesson->video_url }}">
                        </video>
                    </div>
                @else
                    <div class="flex items-center justify-center h-64 text-slate-500">
                        <p>Nenhum vídeo configurado para esta aula.</p>
                    </div>
                @endif
            </div>

            {{-- Info da aula --}}
            <div class="flex-1 px-8 py-6 max-w-4xl">
                <div class="flex items-start justify-between gap-4 mb-4">
                    <div>
                        <h1 class="text-xl font-bold text-white mb-1">{{ $lesson->title }}</h1>
                        <p class="text-sm text-slate-400">
                            {{ $course->title }}
                            @if($lesson->module)
                                · {{ $lesson->module->title }}
                            @endif
                        </p>
                    </div>

                    {{-- Botão Marcar Concluído --}}
                    <button id="btn-complete"
                            onclick="markComplete()"
                            class="shrink-0 px-5 py-2.5 rounded-xl text-sm font-medium transition
                                   {{ ($progress && $progress->completed) ? 'bg-emerald-600 text-white' : 'bg-slate-700 text-slate-200 hover:bg-emerald-600 hover:text-white' }}">
                        {{ ($progress && $progress->completed) ? '✅ Concluída' : '⬜ Marcar como Concluída' }}
                    </button>
                </div>

                @if($lesson->description)
                    <p class="text-slate-300 text-sm leading-relaxed mb-6">{{ $lesson->description }}</p>
                @endif

                {{-- Materiais de Apoio --}}
                @if($lesson->materials->isNotEmpty())
                    <div class="border-t border-slate-800 pt-6">
                        <h3 class="text-sm font-semibold text-slate-300 mb-3">📎 Materiais de Apoio</h3>
                        <ul class="space-y-2">
                            @foreach($lesson->materials as $material)
                                <li>
                                    <a href="{{ Storage::url($material->file_path) }}"
                                       target="_blank"
                                       class="flex items-center gap-3 px-4 py-3 bg-slate-800 rounded-xl hover:bg-slate-700 transition text-sm text-slate-200">
                                        @php
                                            $typeIcon = ['pdf' => '📄', 'doc' => '📝', 'spreadsheet' => '📊', 'link' => '🔗', 'other' => '📁'];
                                        @endphp
                                        <span>{{ $typeIcon[$material->type] ?? '📁' }}</span>
                                        <span class="flex-1 truncate">{{ $material->title }}</span>
                                        @if($material->file_size)
                                            <span class="text-xs text-slate-500">
                                                {{ round($material->file_size / 1024) }}KB
                                            </span>
                                        @endif
                                        <span class="text-xs text-slate-500">↓</span>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                {{-- Navegação entre aulas --}}
                @php
                    $allLessons = $course->modules->flatMap->lessons;
                    $currentIdx = $allLessons->search(fn($l) => $l->id === $lesson->id);
                    $prevLesson = $currentIdx > 0 ? $allLessons[$currentIdx - 1] : null;
                    $nextLesson = $currentIdx < $allLessons->count() - 1 ? $allLessons[$currentIdx + 1] : null;
                @endphp

                <div class="flex items-center justify-between border-t border-slate-800 mt-6 pt-6">
                    @if($prevLesson)
                        <a href="{{ route('aluno.player.lesson', [$course, $prevLesson]) }}"
                           class="flex items-center gap-2 px-4 py-2.5 bg-slate-800 text-slate-200 rounded-xl text-sm hover:bg-slate-700 transition">
                            ← Aula Anterior
                        </a>
                    @else
                        <div></div>
                    @endif

                    @if($nextLesson)
                        <a href="{{ route('aluno.player.lesson', [$course, $nextLesson]) }}"
                           class="flex items-center gap-2 px-4 py-2.5 bg-indigo-600 text-white rounded-xl text-sm hover:bg-indigo-700 transition">
                            Próxima Aula →
                        </a>
                    @else
                        <span class="px-4 py-2.5 bg-emerald-700 text-white rounded-xl text-sm">
                            🎉 Curso Concluído!
                        </span>
                    @endif
                </div>
            </div>

        @else
            {{-- Nenhuma aula selecionada --}}
            <div class="flex-1 flex items-center justify-center text-center px-8">
                <div>
                    <p class="text-6xl mb-4">▶️</p>
                    <h2 class="text-xl font-semibold text-white mb-2">Selecione uma aula</h2>
                    <p class="text-slate-400">Escolha uma aula na barra lateral para começar.</p>
                </div>
            </div>
        @endif

    </main>
</div>

<script>
function toggleModule(id) {
    const ul    = document.getElementById('module-' + id);
    const arrow = document.getElementById('arrow-' + id);
    ul.classList.toggle('hidden');
    arrow.textContent = ul.classList.contains('hidden') ? '▸' : '▾';
}

function markComplete() {
    const lessonId = {{ $lesson?->id ?? 'null' }};
    if (!lessonId) return;

    const btn = document.getElementById('btn-complete');
    btn.disabled = true;

    fetch('{{ route("aluno.progress", $lesson ?? 0) }}'.replace('/0', '/' + lessonId), {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
        },
        body: JSON.stringify({ watched_seconds: 0, completed: true }),
    })
    .then(r => r.json())
    .then(() => {
        btn.textContent  = '✅ Concluída';
        btn.className    = btn.className.replace('bg-slate-700 text-slate-200 hover:bg-emerald-600 hover:text-white', 'bg-emerald-600 text-white');
        btn.disabled     = false;
    })
    .catch(() => { btn.disabled = false; });
}
</script>
@endsection
