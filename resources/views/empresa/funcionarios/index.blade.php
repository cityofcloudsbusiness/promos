@extends('layouts.empresa')

@section('title', 'Funcionários · ' . $empresa->nome)
@section('page-title', 'Funcionários')
@section('page-subtitle', 'Equipe cadastrada sob o plano corporativo')

@section('content')

<div class="bg-[#0d1526] border border-[#1a2844] rounded-2xl overflow-hidden">
    <div class="px-6 py-4 border-b border-[#1a2844] flex items-center justify-between">
        <div class="flex items-center gap-3">
            <div class="w-2 h-2 rounded-full bg-blue-500"></div>
            <span class="text-sm font-semibold text-white">{{ $empresa->funcionarios->count() }} colaborador{{ $empresa->funcionarios->count() !== 1 ? 'es' : '' }}</span>
        </div>
        <button class="px-3 py-1.5 bg-blue-600/20 border border-blue-500/30 text-blue-400 rounded-lg text-xs font-medium hover:bg-blue-600/30 transition">
            + Adicionar Funcionário
        </button>
    </div>

    @if($empresa->funcionarios->isEmpty())
        <div class="px-6 py-16 text-center">
            <div class="w-12 h-12 rounded-full bg-slate-800 flex items-center justify-center mx-auto mb-4">
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#475569" stroke-width="1.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z"/>
                </svg>
            </div>
            <p class="text-slate-400 text-sm font-medium">Nenhum funcionário cadastrado</p>
            <p class="text-slate-600 text-xs mt-1">Adicione membros da equipe para acompanhar o progresso individual.</p>
        </div>
    @else
        <table class="w-full">
            <thead>
                <tr class="border-b border-[#1a2844]">
                    <th class="px-6 py-3 text-left text-[10px] font-semibold text-slate-500 uppercase tracking-wider">Nome</th>
                    <th class="px-6 py-3 text-left text-[10px] font-semibold text-slate-500 uppercase tracking-wider">Cargo</th>
                    <th class="px-6 py-3 text-left text-[10px] font-semibold text-slate-500 uppercase tracking-wider">Departamento</th>
                    <th class="px-6 py-3 text-left text-[10px] font-semibold text-slate-500 uppercase tracking-wider">Status</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-[#0f1a33]">
                @foreach($empresa->funcionarios as $func)
                    <tr class="hover:bg-white/[0.02] transition">
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <div class="w-8 h-8 rounded-full bg-blue-600/15 border border-blue-500/20 flex items-center justify-center text-xs font-bold text-blue-300">
                                    {{ strtoupper(substr($func->nome, 0, 1)) }}
                                </div>
                                <div>
                                    <p class="text-sm font-medium text-white">{{ $func->nome }}</p>
                                    <p class="text-xs text-slate-500">{{ $func->email }}</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-sm text-slate-400">{{ $func->cargo ?? '—' }}</td>
                        <td class="px-6 py-4 text-sm text-slate-400">{{ $func->departamento ?? '—' }}</td>
                        <td class="px-6 py-4">
                            @if($func->ativo)
                                <span class="px-2 py-0.5 text-xs bg-emerald-500/10 border border-emerald-500/20 text-emerald-400 rounded-full">Ativo</span>
                            @else
                                <span class="px-2 py-0.5 text-xs bg-slate-700/50 border border-slate-600/30 text-slate-500 rounded-full">Inativo</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>

@endsection
