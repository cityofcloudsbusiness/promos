@extends('layouts.superadmin')

@section('title', 'Gestão de Usuários')
@section('page-title', 'Gestão de Usuários')
@section('page-subtitle', 'Gerencie roles e acessos de todos os usuários')

@section('content')

    {{-- Filtros --}}
    <form method="GET" action="{{ route('superadmin.users.index') }}"
          class="bg-white rounded-2xl border border-slate-200 p-5 mb-6 flex flex-wrap gap-3 items-end">
        <div class="flex-1 min-w-48">
            <label class="block text-xs font-medium text-slate-600 mb-1">Buscar</label>
            <input type="text" name="search" value="{{ request('search') }}"
                   placeholder="Nome ou e-mail…"
                   class="w-full px-4 py-2 border border-slate-300 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
        </div>
        <div class="w-44">
            <label class="block text-xs font-medium text-slate-600 mb-1">Role</label>
            <select name="role"
                    class="w-full px-4 py-2 border border-slate-300 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
                <option value="">Todos</option>
                <option value="aluno"     {{ request('role') === 'aluno'     ? 'selected' : '' }}>Aluno</option>
                <option value="professor" {{ request('role') === 'professor' ? 'selected' : '' }}>Professor</option>
            </select>
        </div>
        <button type="submit"
                class="px-5 py-2 bg-slate-800 text-white rounded-xl text-sm font-medium hover:bg-slate-700 transition">
            Filtrar
        </button>
        @if(request('search') || request('role'))
            <a href="{{ route('superadmin.users.index') }}"
               class="px-5 py-2 bg-slate-100 text-slate-600 rounded-xl text-sm hover:bg-slate-200 transition">
                Limpar
            </a>
        @endif
    </form>

    {{-- Tabela --}}
    <div class="bg-white rounded-2xl border border-slate-200 overflow-hidden">
        <div class="px-6 py-4 border-b border-slate-100 flex items-center justify-between">
            <h2 class="font-semibold text-slate-800">
                {{ $users->total() }} usuário(s) encontrado(s)
            </h2>
        </div>

        @if($users->isEmpty())
            <div class="px-6 py-12 text-center text-slate-400">
                <p class="text-4xl mb-2">👤</p>
                <p>Nenhum usuário encontrado com esses filtros.</p>
            </div>
        @else
            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead>
                        <tr class="text-xs text-slate-500 uppercase tracking-wide bg-slate-50">
                            <th class="px-6 py-3 text-left">Usuário</th>
                            <th class="px-6 py-3 text-left">E-mail</th>
                            <th class="px-6 py-3 text-center">Role Atual</th>
                            <th class="px-6 py-3 text-center">Matrículas</th>
                            <th class="px-6 py-3 text-center">Cadastrado em</th>
                            <th class="px-6 py-3 text-center">Alterar Role</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @foreach($users as $user)
                            <tr class="hover:bg-slate-50 transition">
                                {{-- Avatar + Nome --}}
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <div class="w-8 h-8 rounded-full bg-indigo-100 flex items-center justify-center text-xs font-bold text-indigo-700 shrink-0">
                                            {{ strtoupper(substr($user->name, 0, 1)) }}
                                        </div>
                                        <span class="font-medium text-slate-700">{{ $user->name }}</span>
                                    </div>
                                </td>

                                {{-- E-mail --}}
                                <td class="px-6 py-4 text-slate-500">{{ $user->email }}</td>

                                {{-- Role badge --}}
                                <td class="px-6 py-4 text-center">
                                    @php
                                        $rc = ['aluno' => 'bg-indigo-100 text-indigo-700', 'professor' => 'bg-violet-100 text-violet-700'];
                                        $rl = ['aluno' => '🎓 Aluno', 'professor' => '👨‍🏫 Professor'];
                                    @endphp
                                    <span class="px-2.5 py-1 rounded-full text-xs font-semibold {{ $rc[$user->role] ?? 'bg-slate-100 text-slate-600' }}">
                                        {{ $rl[$user->role] ?? $user->role }}
                                    </span>
                                </td>

                                {{-- Matrículas --}}
                                <td class="px-6 py-4 text-center text-slate-500">
                                    {{ $user->enrollments_count }}
                                </td>

                                {{-- Data --}}
                                <td class="px-6 py-4 text-center text-slate-400 text-xs">
                                    {{ $user->created_at->format('d/m/Y') }}
                                </td>

                                {{-- Botões de role --}}
                                <td class="px-6 py-4 text-center">
                                    <div class="flex items-center justify-center gap-2">
                                        @if($user->role !== 'professor')
                                            <form method="POST"
                                                  action="{{ route('superadmin.users.updateRole', $user) }}"
                                                  onsubmit="return confirm('Promover {{ addslashes($user->name) }} a Professor?')">
                                                @csrf @method('PATCH')
                                                <input type="hidden" name="role" value="professor">
                                                <button type="submit"
                                                    class="px-3 py-1.5 bg-violet-600 text-white rounded-lg text-xs font-medium hover:bg-violet-700 transition whitespace-nowrap">
                                                    → Professor
                                                </button>
                                            </form>
                                        @endif
                                        @if($user->role !== 'aluno')
                                            <form method="POST"
                                                  action="{{ route('superadmin.users.updateRole', $user) }}"
                                                  onsubmit="return confirm('Rebaixar {{ addslashes($user->name) }} para Aluno?')">
                                                @csrf @method('PATCH')
                                                <input type="hidden" name="role" value="aluno">
                                                <button type="submit"
                                                    class="px-3 py-1.5 bg-slate-200 text-slate-700 rounded-lg text-xs font-medium hover:bg-slate-300 transition whitespace-nowrap">
                                                    → Aluno
                                                </button>
                                            </form>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="px-6 py-4 border-t border-slate-100">
                {{ $users->links() }}
            </div>
        @endif
    </div>

@endsection
