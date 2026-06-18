@extends('layouts.admin')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')
@section('page-subtitle', 'Bem-vindo(a) de volta, ' . auth()->user()->name)

@section('header-actions')
    <a href="{{ route('admin.courses.create') }}"
       class="inline-flex items-center gap-2 px-4 py-2 bg-indigo-600 text-white rounded-lg text-sm font-medium hover:bg-indigo-700 transition">
        ➕ Novo Curso
    </a>
@endsection

@section('content')

    {{-- Stats --}}
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
        @php
            $cards = [
                ['label' => 'Cursos Criados',    'value' => $stats['total_courses'],     'icon' => '📚', 'color' => 'indigo'],
                ['label' => 'Publicados',         'value' => $stats['published_courses'], 'icon' => '✅', 'color' => 'emerald'],
                ['label' => 'Alunos Matriculados','value' => $stats['total_students'],    'icon' => '🎓', 'color' => 'violet'],
                ['label' => 'Total de Alunos',   'value' => $stats['total_alunos'],      'icon' => '👥', 'color' => 'amber'],
            ];
        @endphp
        @foreach($cards as $card)
            <div class="bg-white rounded-2xl border border-slate-200 p-6">
                <div class="flex items-center justify-between mb-3">
                    <span class="text-2xl">{{ $card['icon'] }}</span>
                    <span class="text-xs font-medium text-slate-400 uppercase tracking-wide">{{ $card['label'] }}</span>
                </div>
                <p class="text-3xl font-bold text-slate-800">{{ $card['value'] }}</p>
            </div>
        @endforeach
    </div>

    {{-- Recent Courses --}}
    <div class="bg-white rounded-2xl border border-slate-200 overflow-hidden">
        <div class="px-6 py-4 border-b border-slate-100 flex items-center justify-between">
            <h2 class="font-semibold text-slate-800">Cursos Recentes</h2>
            <a href="{{ route('admin.courses.index') }}" class="text-sm text-indigo-600 hover:underline">Ver todos →</a>
        </div>
        @if($recent_courses->isEmpty())
            <div class="px-6 py-12 text-center text-slate-400">
                <p class="text-4xl mb-2">📭</p>
                <p>Nenhum curso ainda. <a href="{{ route('admin.courses.create') }}" class="text-indigo-600 hover:underline">Crie o primeiro!</a></p>
            </div>
        @else
            <table class="w-full text-sm">
                <thead>
                    <tr class="text-xs text-slate-500 uppercase tracking-wide bg-slate-50">
                        <th class="px-6 py-3 text-left">Curso</th>
                        <th class="px-6 py-3 text-left">Área</th>
                        <th class="px-6 py-3 text-center">Status</th>
                        <th class="px-6 py-3 text-center">Matriculados</th>
                        <th class="px-6 py-3"></th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @foreach($recent_courses as $course)
                        <tr class="hover:bg-slate-50 transition">
                            <td class="px-6 py-4 font-medium text-slate-800">{{ $course->title }}</td>
                            <td class="px-6 py-4 text-slate-500">{{ $course->area ?? '—' }}</td>
                            <td class="px-6 py-4 text-center">
                                @php
                                    $statusClasses = [
                                        'draft'     => 'bg-slate-100 text-slate-600',
                                        'published' => 'bg-emerald-100 text-emerald-700',
                                        'archived'  => 'bg-amber-100 text-amber-700',
                                    ];
                                    $statusLabels = ['draft' => 'Rascunho', 'published' => 'Publicado', 'archived' => 'Arquivado'];
                                @endphp
                                <span class="px-2 py-1 rounded-full text-xs font-medium {{ $statusClasses[$course->status] }}">
                                    {{ $statusLabels[$course->status] }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-center text-slate-600">{{ $course->enrollments_count }}</td>
                            <td class="px-6 py-4 text-right">
                                <a href="{{ route('admin.courses.show', $course) }}"
                                   class="text-indigo-600 hover:underline text-xs">Gerenciar →</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>

@endsection
