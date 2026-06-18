@extends('layouts.aluno')

@section('title', 'Minha Área')
@section('page-title', 'Minha Área')

@section('content')
<div class="px-6 py-8 max-w-7xl mx-auto space-y-10">

    {{-- ── Boas-vindas ──────────────────────────────────────────────── --}}
    <div class="flex items-start justify-between gap-6">
        <div>
            <h2 class="text-2xl font-bold text-slate-900">
                Olá, {{ explode(' ', auth()->user()->name)[0] }} 👋
            </h2>
            <p class="text-slate-500 mt-1 text-sm">Continue de onde parou ou explore novos conteúdos.</p>
        </div>

        {{-- Stats rápidos --}}
        <div class="hidden md:flex items-center gap-4">
            <div class="bg-white border border-slate-200 rounded-2xl px-5 py-3 text-center min-w-24">
                <p class="text-2xl font-bold text-indigo-600">{{ $formacaoEnrollments->count() }}</p>
                <p class="text-xs text-slate-500 mt-0.5">Formações</p>
            </div>
            <div class="bg-white border border-slate-200 rounded-2xl px-5 py-3 text-center min-w-24">
                <p class="text-2xl font-bold text-violet-600">{{ $enrollments->count() }}</p>
                <p class="text-xs text-slate-500 mt-0.5">Cursos</p>
            </div>
        </div>
    </div>

    {{-- ── Minhas Formações ─────────────────────────────────────────── --}}
    @if($formacaoEnrollments->isNotEmpty())
        <section>
            <div class="flex items-center justify-between mb-5">
                <h3 class="text-base font-bold text-slate-800 flex items-center gap-2">
                    <span class="w-1 h-5 bg-indigo-600 rounded-full inline-block"></span>
                    Minhas Formações
                </h3>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-5">
                @foreach($formacaoEnrollments as $fe)
                    @php $formacao = $fe->formacao; @endphp
                    <div class="group bg-white rounded-2xl border border-slate-200 overflow-hidden hover:shadow-lg hover:-translate-y-0.5 transition-all duration-200 flex flex-col">

                        {{-- Thumbnail --}}
                        @if($formacao->thumbnail)
                            <img src="{{ Storage::url($formacao->thumbnail) }}" alt="{{ $formacao->title }}"
                                 class="w-full h-44 object-cover group-hover:brightness-105 transition">
                        @else
                            <div class="w-full h-44 relative overflow-hidden"
                                 style="background: linear-gradient(135deg, #312e81 0%, #4338ca 50%, #7c3aed 100%);">
                                <div class="absolute inset-0" style="background-image: linear-gradient(rgba(255,255,255,0.05) 1px, transparent 1px), linear-gradient(90deg, rgba(255,255,255,0.05) 1px, transparent 1px); background-size: 20px 20px;"></div>
                                <div class="absolute inset-0 flex items-center justify-center">
                                    <span class="text-5xl opacity-80">🎓</span>
                                </div>
                            </div>
                        @endif

                        <div class="p-5 flex-1 flex flex-col">
                            {{-- Badge area + plan --}}
                            <div class="flex items-center gap-2 mb-2">
                                @if($formacao->area)
                                    <span class="text-xs font-semibold text-indigo-600 bg-indigo-50 px-2 py-0.5 rounded-full">{{ $formacao->area }}</span>
                                @endif
                                <span class="text-xs font-medium {{ $fe->planBadgeClass() }} px-2 py-0.5 rounded-full">{{ $fe->planLabel() }}</span>
                            </div>

                            <h4 class="font-semibold text-slate-900 mb-1 group-hover:text-indigo-700 transition leading-snug">{{ $formacao->title }}</h4>
                            <p class="text-xs text-slate-400 mb-3 flex-1 line-clamp-2">{{ $formacao->description }}</p>

                            {{-- Meta --}}
                            <div class="flex items-center justify-between text-xs text-slate-400 mb-4">
                                <span>{{ $formacao->courses->count() }} curso(s)</span>
                                @if($formacao->duration_hours > 0)
                                    <span>{{ $formacao->duration_hours }}h de conteúdo</span>
                                @endif
                            </div>

                            {{-- Progress bar placeholder --}}
                            <div>
                                <div class="flex items-center justify-between mb-1">
                                    <span class="text-xs text-slate-400">Progresso</span>
                                    <span class="text-xs font-semibold text-indigo-600">0%</span>
                                </div>
                                <div class="w-full h-2 bg-slate-100 rounded-full overflow-hidden">
                                    <div class="h-2 rounded-full"
                                         style="width: 0%; background: linear-gradient(90deg, #6366f1 0%, #7c3aed 100%);"></div>
                                </div>
                            </div>
                        </div>

                        {{-- Plan expiry --}}
                        @if($fe->expires_at)
                            <div class="px-5 pb-4">
                                <p class="text-[11px] text-slate-400">
                                    {{ $fe->isActive() ? 'Válido até' : '⚠️ Expirou em' }}
                                    {{ $fe->expires_at->format('d/m/Y') }}
                                </p>
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>
        </section>
    @endif

    {{-- ── Meus Cursos Avulsos ──────────────────────────────────────── --}}
    @if($enrollments->isNotEmpty())
        <section>
            <div class="flex items-center justify-between mb-5">
                <h3 class="text-base font-bold text-slate-800 flex items-center gap-2">
                    <span class="w-1 h-5 bg-violet-500 rounded-full inline-block"></span>
                    Meus Cursos
                </h3>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-5">
                @foreach($enrollments as $enrollment)
                    @php $course = $enrollment->course; @endphp
                    <a href="{{ route('aluno.player', $course) }}"
                       class="group bg-white rounded-2xl border border-slate-200 overflow-hidden hover:shadow-lg hover:-translate-y-0.5 transition-all duration-200 flex flex-col">

                        @if($course->thumbnail)
                            <img src="{{ Storage::url($course->thumbnail) }}" alt="{{ $course->title }}"
                                 class="w-full h-44 object-cover group-hover:brightness-105 transition">
                        @else
                            <div class="w-full h-44 relative overflow-hidden"
                                 style="background: linear-gradient(135deg, #0f172a 0%, #1e293b 50%, #334155 100%);">
                                <div class="absolute inset-0" style="background-image: linear-gradient(rgba(99,102,241,0.1) 1px, transparent 1px), linear-gradient(90deg, rgba(99,102,241,0.1) 1px, transparent 1px); background-size: 20px 20px;"></div>
                                <div class="absolute inset-0 flex items-center justify-center">
                                    <span class="text-5xl opacity-70">📖</span>
                                </div>
                            </div>
                        @endif

                        <div class="p-5 flex-1 flex flex-col">
                            @if($course->area)
                                <p class="text-xs font-semibold text-indigo-600 mb-1">{{ $course->area }}</p>
                            @endif
                            <h4 class="font-semibold text-slate-900 mb-1 group-hover:text-indigo-700 transition leading-snug">{{ $course->title }}</h4>
                            <p class="text-xs text-slate-400 mb-3 flex-1 line-clamp-2">{{ $course->description }}</p>

                            <div class="flex items-center justify-between text-xs text-slate-400 mb-4">
                                <span>{{ $course->modules->count() }} módulo(s)</span>
                                @if($course->duration_hours > 0)
                                    <span>{{ $course->duration_hours }}h</span>
                                @endif
                            </div>

                            <div>
                                <div class="flex items-center justify-between mb-1">
                                    <span class="text-xs text-slate-400">Progresso</span>
                                    <span class="text-xs font-semibold text-violet-600">0%</span>
                                </div>
                                <div class="w-full h-2 bg-slate-100 rounded-full overflow-hidden">
                                    <div class="h-2 rounded-full"
                                         style="width: 0%; background: linear-gradient(90deg, #8b5cf6 0%, #6366f1 100%);"></div>
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </section>
    @endif

    {{-- ── Estado vazio total --}}
    @if($formacaoEnrollments->isEmpty() && $enrollments->isEmpty())
        <div class="bg-white rounded-2xl border border-slate-200 px-6 py-14 text-center">
            <div class="w-16 h-16 rounded-2xl bg-indigo-50 flex items-center justify-center mx-auto mb-5">
                <svg class="w-8 h-8 text-indigo-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                </svg>
            </div>
            <h3 class="text-lg font-semibold text-slate-800 mb-2">Você ainda não tem nenhum curso</h3>
            <p class="text-slate-500 text-sm">Solicite acesso às formações e cursos disponíveis abaixo.</p>
        </div>
    @endif

    {{-- ── Formações Disponíveis ────────────────────────────────────── --}}
    @if($available_formacoes->isNotEmpty())
        <section>
            <div class="flex items-center justify-between mb-5">
                <h3 class="text-base font-bold text-slate-800 flex items-center gap-2">
                    <span class="w-1 h-5 bg-emerald-500 rounded-full inline-block"></span>
                    Formações Disponíveis
                </h3>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-5">
                @foreach($available_formacoes as $formacao)
                    @php $isPending = $pendingFormacaoIds->contains($formacao->id); @endphp
                    <div class="bg-white rounded-2xl border border-slate-200 overflow-hidden flex flex-col hover:shadow-md transition">

                        @if($formacao->thumbnail)
                            <img src="{{ Storage::url($formacao->thumbnail) }}" alt="{{ $formacao->title }}"
                                 class="w-full h-40 object-cover opacity-80">
                        @else
                            <div class="w-full h-40 relative overflow-hidden"
                                 style="background: linear-gradient(135deg, #14532d 0%, #166534 60%, #15803d 100%);">
                                <div class="absolute inset-0" style="background-image: linear-gradient(rgba(255,255,255,0.04) 1px, transparent 1px), linear-gradient(90deg, rgba(255,255,255,0.04) 1px, transparent 1px); background-size: 24px 24px;"></div>
                                <div class="absolute inset-0 flex items-center justify-center">
                                    <span class="text-4xl opacity-70">🎓</span>
                                </div>
                            </div>
                        @endif

                        <div class="p-5 flex-1 flex flex-col">
                            @if($formacao->area)
                                <p class="text-xs font-semibold text-indigo-600 mb-1">{{ $formacao->area }}</p>
                            @endif
                            <h4 class="font-semibold text-slate-900 mb-1 leading-snug">{{ $formacao->title }}</h4>
                            <p class="text-xs text-slate-400 mb-3 flex-1 line-clamp-2">{{ $formacao->description }}</p>
                            <div class="flex items-center gap-2 text-xs text-slate-400 mb-4">
                                <span>{{ $formacao->courses_count }} curso(s)</span>
                                @if($formacao->duration_hours > 0)
                                    <span>· {{ $formacao->duration_hours }}h</span>
                                @endif
                            </div>

                            @if($isPending)
                                <div class="flex items-center justify-center gap-1.5 w-full py-2.5 px-4 bg-amber-50 border border-amber-200 text-amber-700 rounded-xl text-xs font-medium">
                                    <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                    Solicitação pendente
                                </div>
                            @else
                                <form method="POST" action="{{ route('aluno.access-request.store') }}">
                                    @csrf
                                    <input type="hidden" name="formacao_id" value="{{ $formacao->id }}">
                                    <button type="submit"
                                            class="w-full py-2.5 px-4 border-2 border-indigo-200 text-indigo-700 font-semibold rounded-xl text-xs
                                                   hover:bg-indigo-600 hover:border-indigo-600 hover:text-white transition-all duration-200">
                                        Solicitar Acesso à Formação
                                    </button>
                                </form>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    @endif

    {{-- ── Cursos Disponíveis ───────────────────────────────────────── --}}
    @if($available_courses->isNotEmpty())
        <section>
            <div class="flex items-center justify-between mb-5">
                <h3 class="text-base font-bold text-slate-800 flex items-center gap-2">
                    <span class="w-1 h-5 bg-slate-400 rounded-full inline-block"></span>
                    Cursos Avulsos Disponíveis
                </h3>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-5">
                @foreach($available_courses as $course)
                    @php $isPending = $pendingCourseIds->contains($course->id); @endphp
                    <div class="bg-white rounded-2xl border border-slate-200 overflow-hidden flex flex-col hover:shadow-md transition">

                        @if($course->thumbnail)
                            <img src="{{ Storage::url($course->thumbnail) }}" alt="{{ $course->title }}"
                                 class="w-full h-40 object-cover opacity-80">
                        @else
                            <div class="w-full h-40 bg-gradient-to-br from-slate-100 to-slate-200 flex items-center justify-center">
                                <span class="text-4xl text-slate-300">📖</span>
                            </div>
                        @endif

                        <div class="p-5 flex-1 flex flex-col">
                            @if($course->area)
                                <p class="text-xs font-semibold text-indigo-600 mb-1">{{ $course->area }}</p>
                            @endif
                            <h4 class="font-semibold text-slate-900 mb-1 leading-snug">{{ $course->title }}</h4>
                            <p class="text-xs text-slate-400 mb-3 flex-1 line-clamp-2">{{ $course->description }}</p>
                            <div class="flex items-center gap-2 text-xs text-slate-400 mb-4">
                                <span>{{ $course->lessons_count }} aula(s)</span>
                                @if($course->duration_hours > 0)
                                    <span>· {{ $course->duration_hours }}h</span>
                                @endif
                            </div>

                            @if($isPending)
                                <div class="flex items-center justify-center gap-1.5 w-full py-2.5 px-4 bg-amber-50 border border-amber-200 text-amber-700 rounded-xl text-xs font-medium">
                                    <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                    Solicitação pendente
                                </div>
                            @else
                                <form method="POST" action="{{ route('aluno.access-request.store') }}">
                                    @csrf
                                    <input type="hidden" name="course_id" value="{{ $course->id }}">
                                    <button type="submit"
                                            class="w-full py-2.5 px-4 border-2 border-slate-200 text-slate-600 font-semibold rounded-xl text-xs
                                                   hover:border-indigo-400 hover:text-indigo-700 transition-all duration-200">
                                        Solicitar Acesso ao Curso
                                    </button>
                                </form>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    @endif

</div>
@endsection
