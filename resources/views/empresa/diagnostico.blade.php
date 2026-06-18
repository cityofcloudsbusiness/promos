@extends('layouts.empresa')

@section('title', 'Diagnóstico · ' . $empresa->nome)
@section('page-title', 'Diagnóstico de Melhorias')
@section('page-subtitle', 'Análise técnica e operacional gerada pelos agentes City of Clouds')

@section('content')

@php
    $pilaresConfig = [
        'diagnostico'   => ['label' => 'Diagnóstico do Problema', 'color' => 'indigo',  'icon' => 'M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z'],
        'planejamento'  => ['label' => 'Planejamento',            'color' => 'blue',    'icon' => 'M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01'],
        'implementacao' => ['label' => 'Implementação',           'color' => 'violet',  'icon' => 'M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z M15 12a3 3 0 11-6 0 3 3 0 016 0z'],
        'otimizacao'    => ['label' => 'Otimização',              'color' => 'cyan',    'icon' => 'M13 7h8m0 0v8m0-8l-8 8-4-4-6 6'],
    ];
@endphp

<div class="space-y-4">
    @foreach($pilaresConfig as $key => $cfg)
        @php
            $pilar = $empresa->pilares->firstWhere('pilar', $key);
            $status = $pilar?->status ?? 'pending';
            $progresso = $pilar?->progresso ?? 0;
            $observ = $pilar?->observacoes;
            $statusLabel = match($status) { 'completed' => 'Concluído', 'in_progress' => 'Em andamento', default => 'Pendente' };
            $statusColor = match($status) { 'completed' => 'emerald', 'in_progress' => 'amber', default => 'slate' };
        @endphp
        <div id="{{ $key }}" class="bg-[#0d1526] border border-[#1a2844] rounded-2xl overflow-hidden">
            <div class="px-6 py-4 flex items-center justify-between border-b border-[#1a2844]">
                <div class="flex items-center gap-3">
                    <div class="w-9 h-9 rounded-xl bg-{{ $cfg['color'] }}-500/10 border border-{{ $cfg['color'] }}-500/20 flex items-center justify-center">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" class="text-{{ $cfg['color'] }}-400">
                            <path stroke-linecap="round" stroke-linejoin="round" d="{{ $cfg['icon'] }}"/>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-sm font-bold text-white">{{ $cfg['label'] }}</h3>
                        <div class="flex items-center gap-2 mt-0.5">
                            <span class="px-1.5 py-0.5 text-[10px] font-medium rounded bg-{{ $statusColor }}-500/10 border border-{{ $statusColor }}-500/20 text-{{ $statusColor }}-400">{{ $statusLabel }}</span>
                            <span class="text-[10px] text-slate-600">{{ $progresso }}% concluído</span>
                        </div>
                    </div>
                </div>
                {{-- Progress bar --}}
                <div class="w-32">
                    <div class="h-1.5 bg-slate-800 rounded-full overflow-hidden">
                        <div class="h-full rounded-full {{ $status === 'completed' ? 'bg-emerald-500' : ($status === 'in_progress' ? 'bg-amber-500' : 'bg-slate-700') }}"
                             style="width:{{ $progresso }}%"></div>
                    </div>
                </div>
            </div>
            <div class="px-6 py-4">
                @if($observ)
                    <p class="text-sm text-slate-300 leading-relaxed">{{ $observ }}</p>
                @else
                    <div class="flex items-center gap-3 py-4 text-center justify-center">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#475569" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z"/>
                        </svg>
                        <p class="text-xs text-slate-600">Análise pendente. Os agentes City of Clouds atualizarão este painel em breve.</p>
                    </div>
                @endif
            </div>
        </div>
    @endforeach
</div>

@endsection
