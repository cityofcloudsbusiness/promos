<x-app-layout>

<style>
    @keyframes neonFlowCyan {
        0%   { background-position: 0% 50%; }
        50%  { background-position: 100% 50%; }
        100% { background-position: 0% 50%; }
    }
    @keyframes glowPulseCyan {
        0%, 100% { box-shadow: 0 0 6px #22d3ee, 0 0 18px #22d3ee66, 0 0 35px #0891b233; }
        50%       { box-shadow: 0 0 12px #22d3ee, 0 0 30px #22d3eeaa, 0 0 60px #0891b266; }
    }
    @keyframes scanLine {
        0%   { left: -30%; opacity: 0; }
        10%  { opacity: 1; }
        90%  { opacity: 1; }
        100% { left: 120%; opacity: 0; }
    }
    @keyframes barGrow { from { width: 0%; } }
    .cyber-bar-fill-cyan {
        background: linear-gradient(90deg, #22d3ee, #0ea5e9, #6366f1, #0ea5e9, #22d3ee);
        background-size: 300% 100%;
        animation: barGrow 1.4s cubic-bezier(0.25, 1, 0.5, 1) forwards,
                   neonFlowCyan 3s ease-in-out infinite 1.4s,
                   glowPulseCyan 2s ease-in-out infinite 1.4s;
        position: relative; overflow: hidden;
    }
    .cyber-bar-scan {
        position: absolute; top: 0; width: 30%; height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255,255,255,0.45), transparent);
        animation: scanLine 2.5s ease-in-out infinite 1.6s;
    }
    @keyframes statusBlink {
        0%, 94%, 100% { opacity: 1; }
        95% { opacity: 0.1; } 97% { opacity: 1; } 98% { opacity: 0.2; }
    }
    .status-blink { animation: statusBlink 4s infinite; }
    @keyframes onlinePulse {
        0%, 100% { box-shadow: 0 0 0 0 rgba(34, 211, 238, 0.5); }
        50%       { box-shadow: 0 0 0 8px rgba(34, 211, 238, 0); }
    }
    .online-pulse { animation: onlinePulse 2s ease-in-out infinite; }
</style>

<div class="py-12 bg-black min-h-screen text-white font-mono">
<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

    {{-- HEADER --}}
    <div class="relative p-8 bg-gray-900/50 border border-cyan-500/30 rounded-2xl backdrop-blur-xl mb-8">
        <div class="flex items-center gap-3 mb-1">
            <span class="w-2 h-2 rounded-full bg-cyan-400 animate-pulse shadow-[0_0_8px_rgba(34,211,238,0.8)]"></span>
            <span class="text-cyan-400 text-[10px] uppercase tracking-[0.3em] font-bold">
                Painel de Inteligência Artificial
            </span>
        </div>
        <h2 class="text-3xl font-bold bg-gradient-to-r from-cyan-400 to-blue-500 bg-clip-text text-transparent uppercase">
            {{ $project->name ?? 'Inicializando...' }}
        </h2>
        <p class="text-gray-400 mt-2">
            PLANO: <span class="text-cyan-400 font-bold">{{ $planConf['label'] }}</span>
            &nbsp;·&nbsp;
            STATUS: <span class="status-blink text-green-400">AGENTE ONLINE</span>
        </p>
    </div>

    {{-- PROGRESSO DO AGENTE --}}
    <div class="p-6 bg-gray-900/50 border border-cyan-500/20 rounded-2xl mb-8">
        <div class="flex justify-between mb-4 text-cyan-400 text-xs tracking-widest uppercase">
            <span>Progresso de Implantação do Agente</span>
            <span id="progress-label">{{ $project->progress ?? 0 }}%</span>
        </div>
        <div class="w-full bg-gray-800 rounded-full h-4 p-[2px] overflow-hidden">
            <div class="cyber-bar-fill-cyan h-full rounded-full"
                 style="width: {{ max($project->progress ?? 0, 5) }}%">
                <div class="cyber-bar-scan"></div>
            </div>
        </div>

        @if($project && $project->steps)
        <div class="mt-8 grid grid-cols-1 md:grid-cols-2 gap-4 border-t border-white/5 pt-6">
            @foreach($project->steps as $step)
            <div class="flex items-center p-3 border border-white/5 rounded-lg
                        {{ $step['completed'] ? 'bg-green-500/5' : 'bg-gray-800/30' }}">
                <div class="mr-3">
                    @if($step['completed'])
                        <span class="text-green-500 text-lg">●</span>
                    @else
                        <span class="text-gray-600 text-lg animate-pulse">○</span>
                    @endif
                </div>
                <span class="text-sm {{ $step['completed'] ? 'text-gray-400 line-through' : 'text-gray-200' }}">
                    {{ $step['task'] ?? $step['title'] ?? 'Sem título' }}
                </span>
            </div>
            @endforeach
        </div>
        @endif
    </div>

    {{-- BARRA DE PLANOS --}}
    <div class="flex flex-wrap items-center justify-between gap-3 p-4 mb-6 bg-gray-900/40 border border-cyan-500/20 rounded-2xl">
        <div class="flex items-center gap-3 flex-wrap">
            <span class="w-2 h-2 rounded-full bg-green-500 animate-pulse shadow-[0_0_8px_rgba(34,197,94,0.6)]"></span>
            @if(isset($allSubs) && $allSubs->count() > 1)
                @foreach($allSubs as $sub)
                @php $sc = $sub->planConfig(); @endphp
                <a href="{{ route('dashboard.plan', ['id' => $sub->id]) }}"
                   class="px-3 py-1.5 rounded-lg border text-[10px] font-bold uppercase tracking-widest transition
                          {{ (isset($clientSub) && $clientSub->id === $sub->id)
                             ? 'border-cyan-500/60 bg-cyan-500/20 text-cyan-300'
                             : 'border-white/10 text-gray-500 hover:border-white/30 hover:text-gray-200' }}">
                    {{ $sc['label'] ?? $sub->plan_slug }}
                </a>
                @endforeach
            @else
                <span class="text-[10px] uppercase tracking-widest text-gray-500 font-bold">1 serviço ativo</span>
            @endif
        </div>
        <a href="{{ route('subscribeWebM') }}"
           class="flex items-center gap-2 px-4 py-2 text-[10px] font-black uppercase tracking-widest text-white
                  bg-gradient-to-r from-cyan-600 to-blue-600 hover:from-cyan-500 hover:to-blue-500
                  rounded-xl transition-all shadow-[0_0_20px_rgba(34,211,238,0.3)]
                  hover:shadow-[0_0_30px_rgba(34,211,238,0.5)] shrink-0">
            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M12 4v16m8-8H4"/>
            </svg>
            + Adicionar Plano
        </a>
    </div>

    {{-- GRID PRINCIPAL --}}
    <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">

        {{-- CONTEÚDO PRINCIPAL --}}
        <div class="lg:col-span-3 space-y-6">

            {{-- STATUS DO AGENTE WHATSAPP --}}
            <div class="p-6 bg-gray-900/50 border border-cyan-500/20 rounded-2xl">
                <h3 class="text-cyan-400 text-[10px] tracking-widest uppercase mb-5 flex items-center gap-2">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                    </svg>
                    Agente WhatsApp — Atendimento 24h
                </h3>

                @php
                    $iaMeta      = $project->meta ?? [];
                    $agentStatus = $iaMeta['agent_status'] ?? 'offline';
                    $agentPhone  = $iaMeta['agent_phone']  ?? '';
                    $statusColor = match($agentStatus) {
                        'online'   => ['border' => 'border-cyan-500/20',   'bg' => 'bg-cyan-500/10',   'border2' => 'border-cyan-500/40',   'icon' => 'text-cyan-400',   'dot' => 'bg-green-500',  'text' => 'text-cyan-400',  'label' => '● ONLINE'],
                        'training' => ['border' => 'border-yellow-500/20', 'bg' => 'bg-yellow-500/10', 'border2' => 'border-yellow-500/40', 'icon' => 'text-yellow-400', 'dot' => 'bg-yellow-500', 'text' => 'text-yellow-400','label' => '⟳ TREINANDO'],
                        default    => ['border' => 'border-gray-500/20',   'bg' => 'bg-gray-500/10',   'border2' => 'border-gray-500/40',   'icon' => 'text-gray-500',   'dot' => 'bg-gray-500',   'text' => 'text-gray-500',  'label' => '○ OFFLINE'],
                    };
                @endphp
                <div class="flex flex-col md:flex-row gap-4">
                    {{-- Status principal --}}
                    <div class="flex-1 flex items-center gap-6 p-6 bg-black/50 border {{ $statusColor['border'] }} rounded-2xl">
                        <div class="relative shrink-0">
                            <div class="w-16 h-16 rounded-full {{ $statusColor['bg'] }} border-2 {{ $statusColor['border2'] }} flex items-center justify-center {{ $agentStatus === 'online' ? 'online-pulse' : '' }}">
                                <svg class="w-8 h-8 {{ $statusColor['icon'] }}" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                                </svg>
                            </div>
                            <span class="absolute -bottom-1 -right-1 w-5 h-5 rounded-full {{ $statusColor['dot'] }} border-2 border-black flex items-center justify-center">
                                @if($agentStatus === 'online')
                                <span class="w-2 h-2 rounded-full bg-white animate-ping absolute"></span>
                                @endif
                                <span class="w-2 h-2 rounded-full bg-white relative"></span>
                            </span>
                        </div>
                        <div>
                            <p class="text-[9px] uppercase tracking-widest text-gray-600 mb-1">Status do Agente</p>
                            <p class="text-xl font-black {{ $statusColor['text'] }}">{{ $statusColor['label'] }}</p>
                            @if(!empty($agentPhone))
                                <p class="text-[10px] text-gray-300 mt-1 font-mono tracking-wider">{{ $agentPhone }}</p>
                            @else
                                <p class="text-[10px] text-gray-400 mt-1">
                                    @if($agentStatus === 'online') Atendimento Ilimitado Ativo — 24h/7
                                    @elseif($agentStatus === 'training') Em treinamento — disponível em breve
                                    @else Agente em configuração @endif
                                </p>
                            @endif
                        </div>
                    </div>

                    {{-- Métricas do agente --}}
                    <div class="grid grid-cols-2 gap-3 flex-1">
                        <div class="p-4 bg-black/40 border border-white/5 rounded-xl">
                            <p class="text-[9px] uppercase tracking-widest text-gray-600 mb-2">Atendimentos</p>
                            <p class="text-lg font-black text-white">—</p>
                            <p class="text-[9px] text-gray-700 mt-1">Dados em coleta</p>
                        </div>
                        <div class="p-4 bg-black/40 border border-white/5 rounded-xl">
                            <p class="text-[9px] uppercase tracking-widest text-gray-600 mb-2">Tempo Médio</p>
                            <p class="text-lg font-black text-white">—</p>
                            <p class="text-[9px] text-gray-700 mt-1">Por atendimento</p>
                        </div>
                        <div class="p-4 bg-black/40 border border-white/5 rounded-xl">
                            <p class="text-[9px] uppercase tracking-widest text-gray-600 mb-2">Taxa Resolução</p>
                            <p class="text-lg font-black text-cyan-400">—</p>
                            <p class="text-[9px] text-gray-700 mt-1">Sendo calibrado</p>
                        </div>
                        <div class="p-4 bg-black/40 border border-white/5 rounded-xl">
                            <p class="text-[9px] uppercase tracking-widest text-gray-600 mb-2">Treinamento</p>
                            <div class="flex items-center gap-1.5 mt-1">
                                <span class="w-1.5 h-1.5 rounded-full bg-cyan-400 animate-pulse"></span>
                                <p class="text-sm font-black text-cyan-400">Ativo</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- BASE DE CONHECIMENTO --}}
            <div class="p-6 bg-gray-900/50 border border-blue-500/20 rounded-2xl">
                <h3 class="text-blue-400 text-[10px] tracking-widest uppercase mb-5 flex items-center gap-2">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                    </svg>
                    Base de Conhecimento — Respostas Treinadas
                </h3>

                <p class="text-[10px] text-gray-500 mb-4">
                    Envie regras, respostas e informações do seu negócio para treinar o agente.
                    Nossa equipe processa e adiciona ao modelo em até 48h.
                </p>

                @if($project)
                <form id="kb-form" data-url="{{ route('messages.store') }}"
                      class="space-y-3" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="project_id" value="{{ $project->id }}">
                    <textarea name="content"
                        class="w-full bg-black/50 border border-blue-500/30 rounded-xl p-4 text-white text-sm
                               focus:ring-blue-500 focus:border-blue-500 outline-none transition-all resize-none"
                        placeholder="Ex: Quando o cliente perguntar sobre horário de atendimento, responda: 'Funcionamos de segunda a sexta, das 8h às 18h.'"
                        rows="4" id="kb-input"></textarea>
                    <div class="flex justify-between items-center">
                        <p class="text-[9px] text-gray-700 uppercase tracking-widest">
                            Limite: 2000 caracteres por entrada
                        </p>
                        <button id="kb-send-btn" type="submit"
                            class="bg-blue-600 px-6 py-2 rounded-lg font-bold text-xs
                                   hover:bg-blue-500 transition shadow-lg shadow-blue-500/20
                                   uppercase tracking-widest text-white disabled:opacity-50
                                   disabled:cursor-not-allowed flex items-center gap-2">
                            <span id="kb-send-label">ENVIAR TREINAMENTO</span>
                            <span id="kb-send-spinner" class="hidden animate-spin">⟳</span>
                        </button>
                    </div>
                    <p id="kb-success" class="hidden text-green-400 text-xs mt-1">
                        ✓ Entrada enviada! Nossa equipe processará em até 48h.
                    </p>
                    <p id="kb-error" class="hidden text-red-400 text-xs mt-1"></p>
                </form>
                @endif

                <div class="mt-5 pt-5 border-t border-white/5">
                    <p class="text-[9px] uppercase tracking-widest text-gray-700 mb-3">Entradas recentes</p>
                    @php
                        $kbMessages = $messages->filter(fn($m) => str_starts_with($m->content ?? '', '[KB]'));
                    @endphp
                    @forelse($kbMessages->take(5) as $km)
                    <div class="p-3 bg-black/30 border border-blue-500/10 rounded-lg mb-2">
                        <p class="text-[10px] text-gray-300">{{ ltrim(substr($km->content, 4)) }}</p>
                        <p class="text-[9px] text-gray-700 mt-1">{{ $km->created_at->format('d/m/Y H:i') }}</p>
                    </div>
                    @empty
                    <p class="text-[10px] text-gray-700 italic">Nenhuma entrada de treinamento ainda.</p>
                    @endforelse
                </div>
            </div>

            {{-- MÓDULOS AVANÇADOS (apenas Operação Autônoma) --}}
            @if($planConf['type'] === 'ia-autonoma')
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                {{-- Análise Preditiva --}}
                <div class="p-6 bg-gray-900/50 border border-violet-500/20 rounded-2xl">
                    <h3 class="text-violet-400 text-[10px] tracking-widest uppercase mb-4 flex items-center gap-2">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M9 3H5a2 2 0 00-2 2v4m6-6h10a2 2 0 012 2v4M9 3v18m0 0h10a2 2 0 002-2V9M9 21H5a2 2 0 01-2-2V9m0 0h18"/>
                        </svg>
                        Análise Preditiva de Dados
                    </h3>
                    <div class="space-y-3">
                        <div class="flex items-center justify-between p-3 bg-black/40 border border-white/5 rounded-lg">
                            <span class="text-[10px] text-gray-400">Modelos treinados</span>
                            <span class="text-[10px] font-black text-gray-500">Aguardando dados</span>
                        </div>
                        <div class="flex items-center justify-between p-3 bg-black/40 border border-white/5 rounded-lg">
                            <span class="text-[10px] text-gray-400">Última análise</span>
                            <span class="text-[10px] font-black text-gray-500">—</span>
                        </div>
                        <div class="flex items-center justify-between p-3 bg-black/40 border border-white/5 rounded-lg">
                            <span class="text-[10px] text-gray-400">Precisão do modelo</span>
                            <span class="text-[10px] font-black text-gray-500">—</span>
                        </div>
                    </div>
                    <div class="mt-4 flex items-center gap-2">
                        @php $modPred = !empty($iaMeta['module_predictive']); @endphp
                        <span class="w-1.5 h-1.5 rounded-full {{ $modPred ? 'bg-violet-400 animate-pulse' : 'bg-gray-600' }}"></span>
                        <p class="text-[9px] {{ $modPred ? 'text-violet-400' : 'text-gray-600' }} uppercase tracking-widest">{{ $modPred ? 'Módulo ativado' : 'Aguardando ativação' }}</p>
                    </div>
                </div>

                {{-- Automação ERP & Contratos --}}
                <div class="p-6 bg-gray-900/50 border border-indigo-500/20 rounded-2xl">
                    <h3 class="text-indigo-400 text-[10px] tracking-widest uppercase mb-4 flex items-center gap-2">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                        Automação ERP & Contratos
                    </h3>
                    <div class="space-y-3">
                        <div class="flex items-center justify-between p-3 bg-black/40 border border-white/5 rounded-lg">
                            <span class="text-[10px] text-gray-400">Workflows ativos</span>
                            <span class="text-[10px] font-black text-gray-500">0</span>
                        </div>
                        <div class="flex items-center justify-between p-3 bg-black/40 border border-white/5 rounded-lg">
                            <span class="text-[10px] text-gray-400">Contratos processados</span>
                            <span class="text-[10px] font-black text-gray-500">—</span>
                        </div>
                        <div class="flex items-center justify-between p-3 bg-black/40 border border-white/5 rounded-lg">
                            <span class="text-[10px] text-gray-400">Última automação</span>
                            <span class="text-[10px] font-black text-gray-500">—</span>
                        </div>
                    </div>
                    <div class="mt-4">
                        @php $modErp = !empty($iaMeta['module_erp']); @endphp
                        @if($modErp)
                        <div class="flex items-center gap-2 mb-3">
                            <span class="w-1.5 h-1.5 rounded-full bg-indigo-400 animate-pulse"></span>
                            <p class="text-[9px] text-indigo-400 uppercase tracking-widest">Módulo ativado</p>
                        </div>
                        @endif
                        <a href="{{ route('contact') }}"
                           class="block w-full text-center py-2 bg-indigo-500/10 border border-indigo-500/30 rounded-lg
                                  text-[9px] font-black uppercase tracking-widest text-indigo-400
                                  hover:bg-indigo-500/20 transition">
                            Configurar Integrações
                        </a>
                    </div>
                </div>

            </div>

            {{-- Campanhas Inteligentes de Tráfego --}}
            <div class="p-6 bg-gray-900/50 border border-cyan-500/20 rounded-2xl">
                <h3 class="text-cyan-400 text-[10px] tracking-widest uppercase mb-4 flex items-center gap-2">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M13 10V3L4 14h7v7l9-11h-7z"/>
                    </svg>
                    Campanhas Inteligentes de Tráfego
                </h3>
                @php $modCamp = !empty($iaMeta['module_campaigns']); @endphp
                <div class="p-4 bg-black/40 border {{ $modCamp ? 'border-cyan-500/30' : 'border-white/5' }} rounded-xl flex items-center gap-4">
                    <div class="w-10 h-10 rounded-full {{ $modCamp ? 'bg-cyan-500/20 border-cyan-500/50' : 'bg-cyan-500/10 border-cyan-500/30' }} border flex items-center justify-center shrink-0">
                        <span class="{{ $modCamp ? 'text-cyan-300' : 'text-cyan-400' }} text-sm font-black">IA</span>
                    </div>
                    <div>
                        <p class="text-sm font-bold {{ $modCamp ? 'text-white' : 'text-gray-400' }}">
                            {{ $modCamp ? 'Campanhas Inteligentes Ativas' : 'Aguardando configuração inicial' }}
                        </p>
                        <div class="flex items-center gap-2 mt-1">
                            <span class="w-1 h-1 rounded-full {{ $modCamp ? 'bg-cyan-400 animate-pulse' : 'bg-gray-600' }}"></span>
                            <p class="text-[10px] {{ $modCamp ? 'text-cyan-400' : 'text-gray-500' }}">
                                {{ $modCamp ? 'Automação de tráfego em execução' : 'Fale com nossa equipe para configurar as campanhas.' }}
                            </p>
                        </div>
                    </div>
                    @if(!$modCamp)
                    <a href="{{ route('contact') }}"
                       class="ml-auto shrink-0 px-4 py-2 bg-cyan-500/10 border border-cyan-500/30 rounded-lg
                              text-[9px] font-black uppercase tracking-widest text-cyan-400
                              hover:bg-cyan-500/20 transition">
                        Ativar
                    </a>
                    @endif
                </div>
            </div>
            @endif

            {{-- CHAT COM A EQUIPE --}}
            <div class="space-y-4">
                <div class="flex items-center gap-2 mb-1">
                    <span class="text-gray-500 text-[10px] uppercase tracking-widest font-bold">Terminal de Comunicação</span>
                    <div class="flex-1 h-[1px] bg-white/5"></div>
                </div>
                <div id="chat-messages"
                     class="h-96 overflow-y-auto p-4 bg-black/40 rounded-xl border border-gray-800 space-y-4 flex flex-col">
                    @php
                        $orderedMessages = $messages->filter(fn($m) => !str_starts_with($m->content ?? '', '[KB]'))->sortBy('created_at');
                    @endphp
                    @forelse($orderedMessages as $message)
                    <div class="flex flex-col {{ $message->user_id == auth()->id() ? 'items-end' : 'items-start' }}">
                        <div class="p-3 rounded-lg border max-w-md
                            {{ $message->user_id == auth()->id()
                                ? 'bg-cyan-900/20 border-cyan-500/30'
                                : 'bg-blue-900/20 border-blue-500/30' }}">
                            <p class="text-[10px] uppercase text-gray-500 mb-1">{{ $message->user->name }}:</p>
                            <p class="text-sm">{{ $message->content }}</p>
                            @if($message->attachment)
                                @php $ext = strtolower(pathinfo($message->attachment, PATHINFO_EXTENSION)); @endphp
                                @if(in_array($ext, ['mp4','webm','mov','ogg']))
                                    <video src="{{ asset('uploads/' . $message->attachment) }}"
                                           controls class="mt-2 rounded border border-gray-700 max-w-xs max-h-48"></video>
                                @else
                                    <img src="{{ asset('uploads/' . $message->attachment) }}"
                                         alt="Anexo" loading="lazy" decoding="async"
                                         class="mt-2 rounded border border-gray-700 max-w-xs">
                                @endif
                            @endif
                        </div>
                    </div>
                    @empty
                    <div class="flex items-center justify-center flex-1 opacity-30 italic">
                        <p class="text-center text-gray-600 text-xs uppercase tracking-widest">
                            Nenhuma transmissão encontrada no histórico.
                        </p>
                    </div>
                    @endforelse
                </div>

                @if($project)
                <form id="chat-form" data-url="{{ route('messages.store') }}"
                      class="relative" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="project_id" value="{{ $project->id }}">
                    <textarea id="chat-input" name="content"
                        class="w-full bg-gray-900 border border-cyan-500/30 rounded-xl p-4 text-white text-sm
                               focus:ring-cyan-500 focus:border-cyan-500 outline-none transition-all resize-none"
                        placeholder="Escrever mensagem para a equipe de IA..."
                        rows="3"></textarea>
                    <div class="flex justify-between items-center mt-2">
                        <input type="file" id="chat-attachment" name="attachment" accept="image/*"
                               class="text-xs text-gray-500 file:bg-gray-800 file:text-white file:border-none
                                      file:rounded file:px-2 file:py-1 file:mr-4 file:hover:bg-gray-700 cursor-pointer">
                        <button id="send-btn" type="submit"
                            class="bg-cyan-600 px-6 py-2 rounded-lg font-bold text-xs
                                   hover:bg-cyan-500 transition shadow-lg shadow-cyan-500/20
                                   uppercase tracking-widest text-white disabled:opacity-50
                                   disabled:cursor-not-allowed flex items-center gap-2">
                            <span id="send-label">TRANSMITIR</span>
                            <span id="send-spinner" class="hidden animate-spin">⟳</span>
                        </button>
                    </div>
                    <p id="chat-error" class="hidden text-red-400 text-xs mt-2"></p>
                </form>
                @endif
            </div>

        </div>{{-- /main --}}

        {{-- SIDEBAR --}}
        <div class="space-y-4">

            {{-- ADICIONAR PLANO — primeiro bloco --}}
            @if(isset($allSubs) && $allSubs->count() > 1)
            <div class="p-4 bg-gray-900/50 border border-purple-500/20 rounded-xl">
                <div class="flex items-center justify-between mb-3">
                    <h3 class="text-purple-400 text-[10px] tracking-widest uppercase font-bold">Meus Planos</h3>
                    <a href="{{ route('dashboard') }}" class="text-[9px] text-gray-600 hover:text-gray-400 uppercase tracking-widest transition">Ver todos</a>
                </div>
                <div class="space-y-2">
                    @foreach($allSubs as $sub)
                    @php
                        $sc = $sub->planConfig();
                        $isCurrentSub = isset($clientSub) && $clientSub->id === $sub->id;
                        $dotColors = ['pink' => 'bg-pink-500', 'cyan' => 'bg-cyan-500', 'violet' => 'bg-violet-500', 'fuchsia' => 'bg-fuchsia-500'];
                        $dotC = $dotColors[$sc['color'] ?? 'pink'] ?? 'bg-pink-500';
                    @endphp
                    <a href="{{ route('dashboard.plan', ['id' => $sub->id]) }}"
                       class="flex items-center gap-2.5 p-2.5 rounded-lg border transition
                              {{ $isCurrentSub ? 'border-purple-500/30 bg-purple-500/10' : 'border-white/5 bg-black/20 hover:border-white/15' }}">
                        <span class="w-1.5 h-1.5 rounded-full {{ $dotC }} shrink-0"></span>
                        <div class="flex-1 min-w-0">
                            <p class="text-[10px] font-bold text-white truncate">{{ $sc['label'] }}</p>
                            <p class="text-[9px] text-gray-600 truncate">{{ $sub->project?->name ?? '—' }}</p>
                        </div>
                        @if($isCurrentSub)
                        <span class="text-[8px] text-purple-400 uppercase font-bold shrink-0">atual</span>
                        @endif
                    </a>
                    @endforeach
                </div>
                <a href="{{ route('subscribeWebM') }}"
                   class="flex items-center justify-center gap-2 mt-3 w-full py-2.5 rounded-xl font-black
                          uppercase text-[10px] tracking-widest text-white transition-all
                          bg-gradient-to-r from-cyan-600 to-blue-600
                          hover:from-cyan-500 hover:to-blue-500
                          shadow-[0_0_15px_rgba(34,211,238,0.25)] hover:shadow-[0_0_30px_rgba(34,211,238,0.5)]">
                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M12 4v16m8-8H4"/>
                    </svg>
                    + Adicionar Plano
                </a>
            </div>
            @else
            <a href="{{ route('subscribeWebM') }}"
               class="flex items-center justify-center gap-2 w-full py-3 rounded-xl font-black uppercase
                      text-xs tracking-widest text-white transition-all
                      bg-gradient-to-r from-cyan-600 to-blue-600
                      hover:from-cyan-500 hover:to-blue-500
                      shadow-[0_0_20px_rgba(34,211,238,0.3)] hover:shadow-[0_0_40px_rgba(34,211,238,0.55)]">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M12 4v16m8-8H4"/>
                </svg>
                + Adicionar Plano
            </a>
            @endif

            <div class="p-4 bg-gray-900/50 border border-white/10 rounded-xl">
                <h3 class="text-white text-[10px] mb-4 tracking-widest uppercase text-center">Plano Atual</h3>
                @php
                    $u         = auth()->user();
                    $planColor = $planConf['color'] ?? 'cyan';
                    $startedAt = isset($clientSub) ? $clientSub->subscription_started_at : $u->subscription_started_at;
                    $cmSide = [
                        'cyan'    => ['text' => 'text-cyan-400',    'border' => 'border-cyan-500/20',    'glow' => 'shadow-[0_0_30px_rgba(34,211,238,0.12)]',  'dot' => 'bg-cyan-500'],
                        'violet'  => ['text' => 'text-violet-400',  'border' => 'border-violet-500/20',  'glow' => 'shadow-[0_0_30px_rgba(139,92,246,0.12)]',  'dot' => 'bg-violet-500'],
                        'fuchsia' => ['text' => 'text-fuchsia-400', 'border' => 'border-fuchsia-500/20', 'glow' => 'shadow-[0_0_30px_rgba(217,70,239,0.12)]',  'dot' => 'bg-fuchsia-500'],
                        'pink'    => ['text' => 'text-pink-400',    'border' => 'border-pink-500/20',    'glow' => 'shadow-[0_0_30px_rgba(236,72,153,0.12)]',  'dot' => 'bg-pink-500'],
                    ];
                    $cm = $cmSide[$planColor] ?? $cmSide['cyan'];
                @endphp
                <div class="rounded-2xl bg-black/40 p-4 {{ $cm['border'] }} {{ $cm['glow'] }} border">
                    <div class="flex items-center gap-2 mb-1">
                        <span class="w-1.5 h-1.5 rounded-full animate-pulse {{ $cm['dot'] }}"></span>
                        <p class="text-[10px] uppercase tracking-[0.25em] {{ $cm['text'] }}">{{ $planConf['label'] }}</p>
                    </div>
                    <p class="mt-2 text-xl font-black text-white">Ativo</p>
                    <p class="mt-1 text-[10px] text-gray-500 uppercase tracking-widest">{{ $planConf['billing_note'] }}</p>
                    @if($startedAt)
                    <div class="mt-3 pt-3 border-t border-white/5">
                        <p class="text-[9px] text-gray-700 uppercase tracking-widest">
                            Ativo desde {{ $startedAt->format('d/m/Y') }}
                        </p>
                    </div>
                    @endif
                </div>
            </div>

            {{-- Capacidades ativas --}}
            <div class="p-4 bg-gray-900/50 border border-cyan-500/10 rounded-xl">
                <h3 class="text-cyan-400 text-[10px] mb-3 tracking-widest uppercase text-center">Capacidades Ativas</h3>
                <ul class="space-y-2">
                    @foreach(array_slice($planConf['features'], 0, 4) as $feat)
                    <li class="flex items-start gap-2">
                        <svg class="w-3 h-3 mt-0.5 shrink-0 text-cyan-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        <span class="text-[9px] text-gray-400 leading-relaxed">{{ $feat['text'] }}</span>
                    </li>
                    @endforeach
                </ul>
            </div>

            <div class="p-4 bg-gray-900/50 border border-blue-500/20 rounded-xl">
                <h3 class="text-blue-400 text-[10px] mb-4 tracking-widest uppercase text-center">Ações do Sistema</h3>
                <a href="{{ route('billing') }}"
                   class="block w-full text-center py-2 border border-blue-500/40 rounded
                          text-[10px] font-bold text-blue-400 hover:bg-blue-500/10 transition uppercase">
                    GERENCIAR FATURAS
                </a>
                <a href="{{ route('profile.settings') }}"
                   class="block w-full text-center py-2 mt-2 bg-cyan-500/20 border border-cyan-400/30 rounded
                          text-[10px] font-bold text-cyan-300 hover:bg-cyan-500/30 transition uppercase">
                    PERFIL & CONFIGURAÇÕES
                </a>
            </div>

            <div class="p-4 border border-white/5 rounded-xl text-[10px] text-gray-500 leading-relaxed text-center italic">
                Criptografia de ponta a ponta ativa. Transmissão segura via WebM Protocol.
            </div>

        </div>{{-- /sidebar --}}

    </div>{{-- /grid --}}
</div>
</div>

<script>
(function () {
    'use strict';

    /* ── KB form ── */
    const kbForm    = document.getElementById('kb-form');
    const kbInput   = document.getElementById('kb-input');
    const kbSendBtn = document.getElementById('kb-send-btn');
    const kbLabel   = document.getElementById('kb-send-label');
    const kbSpinner = document.getElementById('kb-send-spinner');
    const kbSuccess = document.getElementById('kb-success');
    const kbError   = document.getElementById('kb-error');

    if (kbForm) {
        kbForm.addEventListener('submit', async function (e) {
            e.preventDefault();
            const raw = kbInput.value.trim();
            if (!raw) return;
            kbSuccess.classList.add('hidden');
            kbError.classList.add('hidden');
            kbSendBtn.disabled = true;
            kbLabel.textContent = 'ENVIANDO...';
            kbSpinner.classList.remove('hidden');

            const fd = new FormData(kbForm);
            fd.set('content', '[KB] ' + raw);

            try {
                const res = await fetch(kbForm.dataset.url, {
                    method: 'POST',
                    headers: {
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content
                            || document.querySelector('input[name="_token"]').value,
                    },
                    body: fd,
                });
                if (!res.ok) throw new Error(`Erro ${res.status}`);
                const data = await res.json();
                if (data.success) {
                    kbInput.value = '';
                    kbSuccess.classList.remove('hidden');
                }
            } catch (err) {
                kbError.textContent = `Falha: ${err.message}`;
                kbError.classList.remove('hidden');
            } finally {
                kbSendBtn.disabled = false;
                kbLabel.textContent = 'ENVIAR TREINAMENTO';
                kbSpinner.classList.add('hidden');
            }
        });
    }

    /* ── Chat form ── */
    const form        = document.getElementById('chat-form');
    const chatBox     = document.getElementById('chat-messages');
    const input       = document.getElementById('chat-input');
    const attachment  = document.getElementById('chat-attachment');
    const sendBtn     = document.getElementById('send-btn');
    const sendLabel   = document.getElementById('send-label');
    const sendSpinner = document.getElementById('send-spinner');
    const chatError   = document.getElementById('chat-error');
    if (!form) return;

    function scrollToBottom(smooth = false) {
        chatBox.scrollTo({ top: chatBox.scrollHeight, behavior: smooth ? 'smooth' : 'instant' });
    }
    scrollToBottom(false);

    function buildMessageEl(msg, isMine) {
        const wrapper = document.createElement('div');
        wrapper.className = `flex flex-col ${isMine ? 'items-end' : 'items-start'}`;
        const bubble = document.createElement('div');
        bubble.className = `p-3 rounded-lg border max-w-md ${isMine ? 'bg-cyan-900/20 border-cyan-500/30' : 'bg-blue-900/20 border-blue-500/30'}`;
        const mediaHtml = msg.attachment
            ? (msg.attachment_type === 'video'
                ? `<video src="${msg.attachment}" controls class="mt-2 rounded border border-gray-700 max-w-xs max-h-48"></video>`
                : `<img src="${msg.attachment}" alt="Anexo" loading="lazy" decoding="async" class="mt-2 rounded border border-gray-700 max-w-xs">`)
            : '';
        bubble.innerHTML = `<p class="text-[10px] uppercase text-gray-500 mb-1">${escapeHtml(msg.user_name)}:</p><p class="text-sm">${escapeHtml(msg.content ?? '')}</p>${mediaHtml}`;
        wrapper.appendChild(bubble);
        return wrapper;
    }

    function escapeHtml(str) {
        const div = document.createElement('div');
        div.appendChild(document.createTextNode(str));
        return div.innerHTML;
    }

    function setLoading(loading) {
        sendBtn.disabled = loading;
        sendLabel.textContent = loading ? 'ENVIANDO...' : 'TRANSMITIR';
        sendSpinner.classList.toggle('hidden', !loading);
    }

    form.addEventListener('submit', async function (e) {
        e.preventDefault();
        const content = input.value.trim();
        const file    = attachment?.files[0];
        if (!content && !file) {
            chatError.textContent = 'Digite uma mensagem ou selecione um arquivo.';
            chatError.classList.remove('hidden');
            return;
        }
        chatError.classList.add('hidden');
        const formData = new FormData(form);
        setLoading(true);
        try {
            const response = await fetch(form.dataset.url, {
                method: 'POST',
                headers: {
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content
                        || document.querySelector('input[name="_token"]').value,
                },
                body: formData,
            });
            if (!response.ok) {
                const data = await response.json().catch(() => ({}));
                throw new Error(data.message || `Erro ${response.status}`);
            }
            const data = await response.json();
            if (data.success) {
                const placeholder = chatBox.querySelector('.italic');
                if (placeholder) placeholder.closest('.flex')?.remove();
                chatBox.appendChild(buildMessageEl(data.message, true));
                scrollToBottom(true);
                input.value = '';
                if (attachment) attachment.value = '';
            }
        } catch (err) {
            chatError.textContent = `Falha na transmissão: ${err.message}`;
            chatError.classList.remove('hidden');
        } finally {
            setLoading(false);
            input.focus();
        }
    });

    input.addEventListener('keydown', function (e) {
        if (e.ctrlKey && e.key === 'Enter') {
            form.dispatchEvent(new Event('submit', { cancelable: true, bubbles: true }));
        }
    });
})();
</script>

</x-app-layout>
