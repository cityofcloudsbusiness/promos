@extends('layouts.superadmin')

@section('title', 'Dashboard Admin')
@section('page-title', 'Painel do Administrador Geral')
@section('page-subtitle', 'Visão geral de toda a plataforma')

@section('header-actions')
    <div class="flex gap-3">
        <a href="{{ route('superadmin.users.index') }}"
           class="inline-flex items-center gap-2 px-4 py-2 bg-slate-800 text-white rounded-lg text-sm font-medium hover:bg-slate-700 transition">
            👥 Gerenciar Usuários
        </a>
        <a href="{{ route('superadmin.courses.index') }}"
           class="inline-flex items-center gap-2 px-4 py-2 bg-indigo-600 text-white rounded-lg text-sm font-medium hover:bg-indigo-700 transition">
            📚 Gerenciar Cursos
        </a>
    </div>
@endsection

@section('content')

    {{-- Stats Grid --}}
    <div class="grid grid-cols-2 lg:grid-cols-3 xl:grid-cols-6 gap-4 mb-8">
        @php
            $cards = [
                ['label' => 'Total Usuários',    'value' => $stats['total_users'],       'icon' => '👤', 'bg' => 'bg-slate-100',   'text' => 'text-slate-700'],
                ['label' => 'Alunos',            'value' => $stats['total_alunos'],      'icon' => '🎓', 'bg' => 'bg-indigo-50',   'text' => 'text-indigo-700'],
                ['label' => 'Professores',       'value' => $stats['total_professores'], 'icon' => '👨‍🏫', 'bg' => 'bg-violet-50',   'text' => 'text-violet-700'],
                ['label' => 'Cursos',            'value' => $stats['total_cursos'],      'icon' => '📚', 'bg' => 'bg-amber-50',    'text' => 'text-amber-700'],
                ['label' => 'Publicados',        'value' => $stats['cursos_publicados'], 'icon' => '✅', 'bg' => 'bg-emerald-50',  'text' => 'text-emerald-700'],
                ['label' => 'Matrículas',        'value' => $stats['total_matriculas'],  'icon' => '📋', 'bg' => 'bg-sky-50',      'text' => 'text-sky-700'],
            ];
        @endphp

        @foreach($cards as $card)
            <div class="bg-white rounded-2xl border border-slate-200 p-5">
                <div class="flex items-center justify-between mb-3">
                    <span class="text-xl">{{ $card['icon'] }}</span>
                    <span class="text-[10px] font-bold uppercase tracking-wider text-slate-400">{{ $card['label'] }}</span>
                </div>
                <p class="text-3xl font-bold {{ $card['text'] }}">{{ $card['value'] }}</p>
            </div>
        @endforeach
    </div>

    @if($courses_without_instructor > 0)
        <div class="mb-6 px-4 py-3 bg-amber-50 border border-amber-200 text-amber-700 rounded-xl text-sm flex items-center justify-between">
            <div class="flex items-center gap-2">
                <span>⚠️</span>
                <span>{{ $courses_without_instructor }} curso(s) sem professor atribuído.</span>
            </div>
            <a href="{{ route('superadmin.courses.index') }}" class="font-semibold underline hover:no-underline">Atribuir agora →</a>
        </div>
    @endif

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

        {{-- Usuários Recentes --}}
        <div class="bg-white rounded-2xl border border-slate-200 overflow-hidden">
            <div class="px-6 py-4 border-b border-slate-100 flex items-center justify-between">
                <h2 class="font-semibold text-slate-800">👥 Usuários Recentes</h2>
                <a href="{{ route('superadmin.users.index') }}" class="text-sm text-indigo-600 hover:underline">Ver todos →</a>
            </div>
            @if($recent_users->isEmpty())
                <p class="px-6 py-8 text-center text-slate-400">Nenhum usuário cadastrado.</p>
            @else
                <ul class="divide-y divide-slate-100">
                    @foreach($recent_users as $user)
                        <li class="px-6 py-3 flex items-center justify-between">
                            <div class="flex items-center gap-3">
                                <div class="w-8 h-8 rounded-full bg-indigo-100 flex items-center justify-center text-xs font-bold text-indigo-700">
                                    {{ strtoupper(substr($user->name, 0, 1)) }}
                                </div>
                                <div>
                                    <p class="text-sm font-medium text-slate-700">{{ $user->name }}</p>
                                    <p class="text-xs text-slate-400">{{ $user->email }}</p>
                                </div>
                            </div>
                            @php
                                $roleColors = ['aluno' => 'bg-indigo-100 text-indigo-700', 'professor' => 'bg-violet-100 text-violet-700'];
                                $roleLabels = ['aluno' => 'Aluno', 'professor' => 'Professor'];
                            @endphp
                            <span class="px-2 py-0.5 rounded-full text-xs font-medium {{ $roleColors[$user->role] ?? 'bg-slate-100 text-slate-600' }}">
                                {{ $roleLabels[$user->role] ?? $user->role }}
                            </span>
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>

        {{-- Atalhos rápidos --}}
        <div class="space-y-4">
            <div class="bg-white rounded-2xl border border-slate-200 p-6">
                <h2 class="font-semibold text-slate-800 mb-4">⚡ Ações Rápidas</h2>
                <div class="space-y-3">
                    <a href="{{ route('superadmin.users.index') }}?role=aluno"
                       class="flex items-center gap-3 px-4 py-3 rounded-xl bg-indigo-50 hover:bg-indigo-100 transition text-sm font-medium text-indigo-800">
                        <span>🎓</span> Ver todos os Alunos
                    </a>
                    <a href="{{ route('superadmin.users.index') }}?role=professor"
                       class="flex items-center gap-3 px-4 py-3 rounded-xl bg-violet-50 hover:bg-violet-100 transition text-sm font-medium text-violet-800">
                        <span>👨‍🏫</span> Ver todos os Professores
                    </a>
                    <a href="{{ route('superadmin.courses.index') }}"
                       class="flex items-center gap-3 px-4 py-3 rounded-xl bg-amber-50 hover:bg-amber-100 transition text-sm font-medium text-amber-800">
                        <span>📚</span> Atribuir Professores a Cursos
                    </a>
                    <a href="{{ route('admin.courses.create') }}"
                       class="flex items-center gap-3 px-4 py-3 rounded-xl bg-emerald-50 hover:bg-emerald-100 transition text-sm font-medium text-emerald-800">
                        <span>➕</span> Criar Novo Curso
                    </a>
                </div>
            </div>
        </div>

    </div>

@endsection
