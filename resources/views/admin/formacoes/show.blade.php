@extends('layouts.admin')

@section('title', $formacao->title)
@section('page-title', 'Formação')
@section('page-subtitle', $formacao->title)

@section('header-actions')
    <a href="{{ route('admin.formacoes.edit', $formacao) }}"
       class="inline-flex items-center gap-2 px-4 py-2 bg-indigo-600 text-white rounded-lg text-sm font-medium hover:bg-indigo-700 transition">
        ✏️ Editar
    </a>
@endsection

@section('content')
<div class="max-w-4xl space-y-6">

    {{-- Header card --}}
    <div class="bg-white rounded-2xl border border-slate-200 overflow-hidden">
        <div class="h-40 relative overflow-hidden"
             style="background: linear-gradient(135deg, #312e81 0%, #4338ca 60%, #7c3aed 100%);">
            @if($formacao->thumbnail)
                <img src="{{ Storage::url($formacao->thumbnail) }}" class="absolute inset-0 w-full h-full object-cover opacity-60">
            @endif
            <div class="absolute inset-0" style="background-image: linear-gradient(rgba(255,255,255,0.04) 1px, transparent 1px), linear-gradient(90deg, rgba(255,255,255,0.04) 1px, transparent 1px); background-size: 24px 24px;"></div>
        </div>
        <div class="p-6">
            <div class="flex items-start justify-between gap-4">
                <div>
                    @php
                        $sc = ['draft'=>'bg-slate-100 text-slate-500','published'=>'bg-emerald-100 text-emerald-700','archived'=>'bg-amber-100 text-amber-700'];
                        $sl = ['draft'=>'Rascunho','published'=>'Publicado','archived'=>'Arquivado'];
                    @endphp
                    <div class="flex items-center gap-2 mb-2">
                        <span class="text-xs font-medium px-2 py-0.5 rounded-full {{ $sc[$formacao->status] }}">{{ $sl[$formacao->status] }}</span>
                        @if($formacao->area)
                            <span class="text-xs text-indigo-600 font-medium">{{ $formacao->area }}</span>
                        @endif
                    </div>
                    <h2 class="text-xl font-bold text-slate-900">{{ $formacao->title }}</h2>
                    @if($formacao->description)
                        <p class="text-sm text-slate-500 mt-2">{{ $formacao->description }}</p>
                    @endif
                </div>
                <div class="flex items-center gap-3 text-center shrink-0">
                    <div class="bg-slate-50 rounded-xl px-4 py-2">
                        <p class="text-lg font-bold text-slate-800">{{ $formacao->courses->count() }}</p>
                        <p class="text-xs text-slate-400">Cursos</p>
                    </div>
                    @if($formacao->duration_hours > 0)
                        <div class="bg-slate-50 rounded-xl px-4 py-2">
                            <p class="text-lg font-bold text-slate-800">{{ $formacao->duration_hours }}h</p>
                            <p class="text-xs text-slate-400">Conteúdo</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    {{-- Cursos vinculados --}}
    <div class="bg-white rounded-2xl border border-slate-200 overflow-hidden">
        <div class="px-6 py-4 border-b border-slate-100 flex items-center justify-between">
            <h3 class="font-semibold text-slate-800">Cursos da Formação</h3>
            <a href="{{ route('admin.formacoes.edit', $formacao) }}"
               class="text-xs text-indigo-600 hover:text-indigo-800 font-medium transition">
                Gerenciar cursos →
            </a>
        </div>

        @if($formacao->courses->isEmpty())
            <div class="px-6 py-8 text-center text-slate-400 text-sm">
                Nenhum curso vinculado ainda.
                <a href="{{ route('admin.formacoes.edit', $formacao) }}" class="text-indigo-600 hover:underline">Adicionar →</a>
            </div>
        @else
            <div class="divide-y divide-slate-100">
                @foreach($formacao->courses as $i => $course)
                    <div class="px-6 py-3.5 flex items-center gap-4">
                        <span class="w-6 h-6 rounded-full bg-indigo-50 text-indigo-600 text-xs font-bold flex items-center justify-center shrink-0">
                            {{ $i + 1 }}
                        </span>
                        <div class="flex-1 min-w-0">
                            <p class="text-sm font-medium text-slate-800 truncate">{{ $course->title }}</p>
                            @if($course->area)
                                <p class="text-xs text-slate-400">{{ $course->area }}</p>
                            @endif
                        </div>
                        <div class="flex items-center gap-3 text-xs text-slate-400 shrink-0">
                            <span>{{ $course->modules->count() }} módulo(s)</span>
                            @php
                                $csc = ['draft'=>'bg-slate-100 text-slate-500','published'=>'bg-emerald-100 text-emerald-700','archived'=>'bg-amber-100 text-amber-700'];
                                $csl = ['draft'=>'Rascunho','published'=>'Publicado','archived'=>'Arquivado'];
                            @endphp
                            <span class="px-2 py-0.5 rounded-full {{ $csc[$course->status] ?? 'bg-slate-100 text-slate-500' }}">{{ $csl[$course->status] ?? $course->status }}</span>
                        </div>
                        <a href="{{ route('admin.courses.show', $course) }}"
                           class="text-xs text-indigo-500 hover:text-indigo-700 transition shrink-0">Ver →</a>
                    </div>
                @endforeach
            </div>
        @endif
    </div>

</div>
@endsection
