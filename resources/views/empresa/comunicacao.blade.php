@extends('layouts.empresa')

@section('title', 'Comunicação · ' . $empresa->nome)
@section('page-title', 'Comunicação')
@section('page-subtitle', 'Canal direto com os agentes City of Clouds')

@section('content')

<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

    {{-- Chat Panel --}}
    <div class="lg:col-span-2 bg-[#0d1526] border border-[#1a2844] rounded-2xl flex flex-col" style="height: calc(100vh - 12rem); min-height: 400px;">
        {{-- Header --}}
        <div class="px-6 py-4 border-b border-[#1a2844] flex items-center gap-3 shrink-0">
            <div class="relative">
                <div class="w-9 h-9 rounded-full bg-indigo-600/20 border border-indigo-500/30 flex items-center justify-center">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#818cf8" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9.813 15.904L9 18.75l-.813-2.846a4.5 4.5 0 00-3.09-3.09L2.25 12l2.846-.813a4.5 4.5 0 003.09-3.09L9 5.25l.813 2.846a4.5 4.5 0 003.09 3.09L15.75 12l-2.846.813a4.5 4.5 0 00-3.09 3.09zM18.259 8.715L18 9.75l-.259-1.035a3.375 3.375 0 00-2.455-2.456L14.25 6l1.036-.259a3.375 3.375 0 002.455-2.456L18 2.25l.259 1.035a3.375 3.375 0 002.456 2.456L21.75 6l-1.035.259a3.375 3.375 0 00-2.456 2.456z"/>
                    </svg>
                </div>
                <div class="absolute -bottom-0.5 -right-0.5 w-2.5 h-2.5 rounded-full bg-emerald-400 border-2 border-[#0d1526]"></div>
            </div>
            <div>
                <p class="text-sm font-semibold text-white">Agente City of Clouds</p>
                <p class="text-xs text-emerald-400">Online · Resposta em até 2h</p>
            </div>
        </div>

        {{-- Messages area --}}
        <div class="flex-1 overflow-y-auto p-6 space-y-4">
            {{-- System message --}}
            <div class="flex justify-center">
                <span class="px-3 py-1 text-[10px] font-mono text-slate-600 bg-slate-800/50 rounded-full">Início da conversa</span>
            </div>

            {{-- Agent welcome --}}
            <div class="flex items-start gap-3">
                <div class="w-8 h-8 rounded-full bg-indigo-600/20 border border-indigo-500/30 flex items-center justify-center shrink-0 mt-0.5">
                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="#818cf8" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9.813 15.904L9 18.75l-.813-2.846a4.5 4.5 0 00-3.09-3.09L2.25 12l2.846-.813a4.5 4.5 0 003.09-3.09L9 5.25l.813 2.846a4.5 4.5 0 003.09 3.09L15.75 12l-2.846.813a4.5 4.5 0 00-3.09 3.09z"/>
                    </svg>
                </div>
                <div class="flex-1 max-w-lg">
                    <div class="bg-[#121d35] border border-[#1a2844] rounded-2xl rounded-tl-sm px-4 py-3">
                        <p class="text-sm text-slate-300 leading-relaxed">
                            Olá, <strong class="text-white">{{ auth()->user()->name }}</strong>! Sou seu agente dedicado na City of Clouds.
                            Estou aqui para acompanhar o desenvolvimento de <strong class="text-indigo-300">{{ $empresa->nome }}</strong>
                            e responder qualquer dúvida sobre sua jornada de transformação.
                        </p>
                    </div>
                    <p class="text-[10px] text-slate-600 mt-1 ml-1">Agente City of Clouds · Hoje</p>
                </div>
            </div>
        </div>

        {{-- Input --}}
        <div class="px-4 py-4 border-t border-[#1a2844] shrink-0">
            <div class="flex gap-3">
                <input type="text" placeholder="Escreva sua mensagem…"
                       class="flex-1 px-4 py-2.5 bg-[#070b17] border border-[#1a2844] rounded-xl text-sm text-white placeholder-slate-600 focus:outline-none focus:border-blue-500/50 transition">
                <button class="px-4 py-2.5 bg-blue-600 hover:bg-blue-500 text-white rounded-xl text-sm font-medium transition flex items-center gap-2">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 12L3.269 3.126A59.768 59.768 0 0121.485 12 59.77 59.77 0 013.27 20.876L5.999 12zm0 0h7.5"/>
                    </svg>
                </button>
            </div>
            <p class="text-[10px] text-slate-700 mt-2 ml-1">Este canal é monitorado 24/7 · SLA de resposta: 2 horas úteis</p>
        </div>
    </div>

    {{-- Sidebar: Info Cards --}}
    <div class="space-y-4">

        {{-- SLA Info --}}
        <div class="bg-[#0d1526] border border-[#1a2844] rounded-2xl p-5">
            <p class="text-xs font-semibold text-slate-400 uppercase tracking-wider mb-4">Nível de Suporte</p>
            <div class="space-y-3">
                <div class="flex items-center justify-between">
                    <span class="text-xs text-slate-500">Prioridade</span>
                    <span class="px-2 py-0.5 text-[10px] bg-amber-500/10 border border-amber-500/20 text-amber-400 rounded">Alta</span>
                </div>
                <div class="flex items-center justify-between">
                    <span class="text-xs text-slate-500">Tempo de resposta</span>
                    <span class="text-xs text-white font-medium">até 2h úteis</span>
                </div>
                <div class="flex items-center justify-between">
                    <span class="text-xs text-slate-500">Canal</span>
                    <span class="text-xs text-white font-medium">Dedicado</span>
                </div>
                <div class="flex items-center justify-between">
                    <span class="text-xs text-slate-500">Disponibilidade</span>
                    <span class="text-xs text-white font-medium">Seg–Sex 8h–18h</span>
                </div>
            </div>
        </div>

        {{-- Quick Topics --}}
        <div class="bg-[#0d1526] border border-[#1a2844] rounded-2xl p-5">
            <p class="text-xs font-semibold text-slate-400 uppercase tracking-wider mb-4">Tópicos Rápidos</p>
            <div class="space-y-2">
                @foreach(['Atualizar diagnóstico','Solicitar novo curso','Relatório de progresso','Adicionar funcionário','Ajuste de plano'] as $topic)
                    <button class="w-full text-left px-3 py-2 bg-white/[0.03] hover:bg-blue-500/10 border border-white/[0.05] hover:border-blue-500/20 rounded-xl text-xs text-slate-400 hover:text-slate-200 transition">
                        {{ $topic }}
                    </button>
                @endforeach
            </div>
        </div>
    </div>
</div>

@endsection
