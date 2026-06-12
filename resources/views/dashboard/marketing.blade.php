<x-app-layout>

<style>
    @keyframes neonFlow {
        0%   { background-position: 0% 50%; }
        50%  { background-position: 100% 50%; }
        100% { background-position: 0% 50%; }
    }
    @keyframes glowPulse {
        0%, 100% { box-shadow: 0 0 6px #d946ef, 0 0 18px #d946ef66, 0 0 35px #a855f733; }
        50%       { box-shadow: 0 0 12px #d946ef, 0 0 30px #d946efaa, 0 0 60px #a855f766; }
    }
    @keyframes scanLine {
        0%   { left: -30%; opacity: 0; }
        10%  { opacity: 1; }
        90%  { opacity: 1; }
        100% { left: 120%; opacity: 0; }
    }
    @keyframes barGrow { from { width: 0%; } }
    .cyber-bar-fill {
        background: linear-gradient(90deg, #d946ef, #a855f7, #7c3aed, #a855f7, #d946ef);
        background-size: 300% 100%;
        animation: barGrow 1.4s cubic-bezier(0.25, 1, 0.5, 1) forwards,
                   neonFlow 3s ease-in-out infinite 1.4s,
                   glowPulse 2s ease-in-out infinite 1.4s;
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
</style>

<div class="py-12 bg-black min-h-screen text-white font-mono">
<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

    {{-- HEADER --}}
    <div class="relative p-8 bg-gray-900/50 border border-fuchsia-500/30 rounded-2xl backdrop-blur-xl mb-8">
        <div class="flex items-center gap-3 mb-1">
            <span class="w-2 h-2 rounded-full bg-fuchsia-500 animate-pulse shadow-[0_0_8px_rgba(217,70,239,0.8)]"></span>
            <span class="text-fuchsia-400 text-[10px] uppercase tracking-[0.3em] font-bold">Painel de Marketing Digital</span>
        </div>
        <h2 class="text-3xl font-bold bg-gradient-to-r from-fuchsia-500 to-purple-500 bg-clip-text text-transparent uppercase">
            {{ $project->name ?? 'Inicializando...' }}
        </h2>
        <p class="text-gray-400 mt-2">
            PLANO: <span class="text-fuchsia-400 font-bold">{{ $planConf['label'] }}</span>
            &nbsp;·&nbsp;
            STATUS: <span class="status-blink text-green-400">CAMPANHA ATIVA</span>
        </p>
    </div>

    {{-- CICLO DA CAMPANHA --}}
    @php
        $dayOfMonth    = now()->day;
        $daysInMonth   = now()->daysInMonth;
        $cycleProgress = (int) round(($dayOfMonth / $daysInMonth) * 100);
    @endphp
    <div class="p-6 bg-gray-900/50 border border-fuchsia-500/20 rounded-2xl mb-8">
        <div class="flex justify-between mb-4 text-fuchsia-400 text-xs tracking-widest uppercase">
            <span>Ciclo de Campanha — {{ now()->translatedFormat('F Y') }}</span>
            <span>{{ $cycleProgress }}% concluído</span>
        </div>
        <div class="w-full bg-gray-800 rounded-full h-4 p-[2px] overflow-hidden">
            <div class="cyber-bar-fill h-full rounded-full" style="width: {{ $cycleProgress }}%">
                <div class="cyber-bar-scan"></div>
            </div>
        </div>

        {{-- Steps do projeto --}}
        @if($project && $project->steps)
        <div class="mt-8 grid grid-cols-1 md:grid-cols-2 gap-4 border-t border-white/5 pt-6">
            @foreach($project->steps as $step)
            <div class="flex items-center p-3 border border-white/5 rounded-lg {{ $step['completed'] ? 'bg-green-500/5' : 'bg-gray-800/30' }}">
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
    <div class="flex flex-wrap items-center justify-between gap-3 p-4 mb-6 bg-gray-900/40 border border-fuchsia-500/20 rounded-2xl">
        <div class="flex items-center gap-3 flex-wrap">
            <span class="w-2 h-2 rounded-full bg-green-500 animate-pulse shadow-[0_0_8px_rgba(34,197,94,0.6)]"></span>
            @if(isset($allSubs) && $allSubs->count() > 1)
                @foreach($allSubs as $sub)
                @php $sc = $sub->planConfig(); @endphp
                <a href="{{ route('dashboard.plan', ['id' => $sub->id]) }}"
                   class="px-3 py-1.5 rounded-lg border text-[10px] font-bold uppercase tracking-widest transition
                          {{ (isset($clientSub) && $clientSub->id === $sub->id)
                             ? 'border-fuchsia-500/60 bg-fuchsia-500/20 text-fuchsia-300'
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
                  bg-gradient-to-r from-fuchsia-600 to-purple-600 hover:from-fuchsia-500 hover:to-purple-500
                  rounded-xl transition-all shadow-[0_0_20px_rgba(217,70,239,0.3)]
                  hover:shadow-[0_0_30px_rgba(217,70,239,0.5)] shrink-0">
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
            @php $pMeta = $project->meta ?? []; @endphp

            {{-- ROI METRICS --}}
            <div class="p-6 bg-gray-900/50 border border-fuchsia-500/20 rounded-2xl">
                <h3 class="text-fuchsia-400 text-[10px] tracking-widest uppercase mb-5 flex items-center gap-2">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                    </svg>
                    Relatório de ROI — {{ now()->format('m/Y') }}
                </h3>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                    <div class="p-4 bg-black/40 border border-fuchsia-500/15 rounded-xl">
                        <p class="text-[9px] uppercase tracking-widest text-gray-600 mb-2">Investimento</p>
                        <p class="text-lg font-black text-fuchsia-400">
                            R$&nbsp;{{ number_format(str_replace(['.', ','], ['', '.'], $planConf['price']), 0, ',', '.') }}
                        </p>
                        <p class="text-[9px] text-gray-700 mt-1">{{ $planConf['period'] }}</p>
                    </div>
                    <div class="p-4 bg-black/40 border {{ !empty($pMeta['roi_revenue']) ? 'border-green-500/20' : 'border-white/5' }} rounded-xl">
                        <p class="text-[9px] uppercase tracking-widest text-gray-600 mb-2">Receita Atribuída</p>
                        <p class="text-lg font-black {{ !empty($pMeta['roi_revenue']) ? 'text-green-400' : 'text-gray-500' }}">
                            {{ !empty($pMeta['roi_revenue']) ? 'R$ ' . $pMeta['roi_revenue'] : '—' }}
                        </p>
                        <p class="text-[9px] text-gray-700 mt-1">
                            {{ !empty($pMeta['roi_leads']) ? $pMeta['roi_leads'] . ' leads' : 'Aguardando dados' }}
                        </p>
                    </div>
                    <div class="p-4 bg-black/40 border {{ !empty($pMeta['roi_roas']) ? 'border-fuchsia-500/20' : 'border-white/5' }} rounded-xl">
                        <p class="text-[9px] uppercase tracking-widest text-gray-600 mb-2">ROAS</p>
                        <p class="text-lg font-black {{ !empty($pMeta['roi_roas']) ? 'text-fuchsia-400' : 'text-gray-500' }}">
                            {{ $pMeta['roi_roas'] ?? '—' }}
                        </p>
                        <p class="text-[9px] text-gray-700 mt-1">Retorno por investimento</p>
                    </div>
                    <div class="p-4 bg-black/40 border {{ !empty($pMeta['roi_conversions']) ? 'border-purple-500/20' : 'border-white/5' }} rounded-xl">
                        <p class="text-[9px] uppercase tracking-widest text-gray-600 mb-2">Conversões</p>
                        <p class="text-lg font-black {{ !empty($pMeta['roi_conversions']) ? 'text-purple-400' : 'text-gray-500' }}">
                            {{ $pMeta['roi_conversions'] ?? '—' }}
                        </p>
                        <p class="text-[9px] text-gray-700 mt-1">Integrando rastreamento</p>
                    </div>
                </div>
                @if(empty($pMeta['roi_roas']) && empty($pMeta['roi_conversions']) && empty($pMeta['roi_revenue']))
                <p class="mt-4 text-[10px] text-gray-700 italic">
                    * Relatório em preparação. A equipe atualizará os dados ao final do ciclo mensal.
                </p>
                @endif
            </div>

            {{-- REUNIÕES --}}
            <div class="p-6 bg-gray-900/50 border border-purple-500/20 rounded-2xl">
                <h3 class="text-purple-400 text-[10px] tracking-widest uppercase mb-5 flex items-center gap-2">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                    @if($planConf['type'] === 'marketing-dominancia')
                        Reuniões Estratégicas — 1 por Semana
                    @else
                        Reuniões de Alinhamento — 2 por Mês
                    @endif
                </h3>

                @php
                    $meetingTitle = $pMeta['meeting_title'] ?? '';
                    $meetingDate  = $pMeta['meeting_date']  ?? '';
                    $meetingLink  = $pMeta['meeting_link']  ?? '';
                    $meetingNotes = $pMeta['meeting_notes'] ?? '';
                    $hasMeeting   = !empty($meetingTitle) || !empty($meetingDate);
                    $meetingDt    = ($hasMeeting && $meetingDate) ? \Carbon\Carbon::parse($meetingDate) : null;
                @endphp
                <div class="flex items-center justify-between p-4 bg-black/40 border {{ $hasMeeting ? 'border-purple-500/30' : 'border-white/5' }} rounded-xl mb-4">
                    <div>
                        <p class="text-[9px] uppercase tracking-widest text-gray-600 mb-1">Próxima Reunião</p>
                        @if($hasMeeting)
                            <p class="text-white font-bold text-sm">{{ $meetingTitle ?: 'Reunião Agendada' }}</p>
                            @if($meetingDt)
                                <p class="text-[10px] text-purple-400 mt-0.5">{{ $meetingDt->format('d/m/Y') }} às {{ $meetingDt->format('H:i') }}</p>
                            @endif
                            @if($meetingNotes)
                                <p class="text-[9px] text-gray-500 mt-1 italic">{{ Str::limit($meetingNotes, 80) }}</p>
                            @endif
                        @else
                            <p class="text-gray-500 font-bold text-sm">Nenhuma agendada</p>
                        @endif
                    </div>
                    <div class="flex flex-col items-end gap-2">
                        <div class="flex items-center gap-2">
                            <span class="w-1.5 h-1.5 rounded-full {{ $hasMeeting ? 'bg-green-500' : 'bg-yellow-500' }} animate-pulse"></span>
                            <span class="text-[10px] uppercase tracking-widest font-bold {{ $hasMeeting ? 'text-green-400' : 'text-yellow-500' }}">
                                {{ $hasMeeting ? 'Confirmada' : 'Aguardando' }}
                            </span>
                        </div>
                        @if(!empty($meetingLink))
                        <a href="{{ $meetingLink }}" target="_blank" rel="noopener"
                           class="text-[9px] text-purple-400 hover:text-purple-300 border border-purple-500/30 px-3 py-1 rounded-lg transition uppercase tracking-widest font-bold">
                            Acessar Link
                        </a>
                        @endif
                    </div>
                </div>

                @if($planConf['type'] === 'marketing-aceleracao')
                <div class="grid grid-cols-2 gap-3 mb-4">
                    @for($i = 1; $i <= 2; $i++)
                    <div class="p-3 bg-black/30 border border-white/5 rounded-lg flex items-center gap-3">
                        <span class="text-gray-700 font-black text-xl">{{ $i }}°</span>
                        <div>
                            <p class="text-[9px] text-gray-600 uppercase tracking-widest">Reunião {{ $i }}/mês</p>
                            <p class="text-[10px] text-gray-500">Não agendada</p>
                        </div>
                    </div>
                    @endfor
                </div>
                @endif

                <a href="{{ route('contact') }}"
                   class="block w-full text-center py-2.5 bg-purple-500/10 border border-purple-500/30 rounded-lg
                          text-[10px] font-black uppercase tracking-widest text-purple-400
                          hover:bg-purple-500/20 transition">
                    Solicitar Agendamento
                </a>
            </div>

            {{-- CANAIS (apenas Dominância Total) --}}
            @if($planConf['type'] === 'marketing-dominancia')
            <div class="p-6 bg-gray-900/50 border border-fuchsia-500/20 rounded-2xl">
                <h3 class="text-fuchsia-400 text-[10px] tracking-widest uppercase mb-5 flex items-center gap-2">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064"/>
                    </svg>
                    Canais Ativos — Tráfego Multi-Plataforma
                </h3>
                @php
                    $chMeta   = !empty($pMeta['channels_meta']);
                    $chGoogle = !empty($pMeta['channels_google']);
                    $chTiktok = !empty($pMeta['channels_tiktok']);
                    $chSeo    = !empty($pMeta['channels_seo']);
                    $chSocial = !empty($pMeta['channels_social']);
                @endphp
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-5">
                    @foreach([
                        ['name' => 'Meta Ads',   'letter' => 'M', 'text' => 'text-blue-400',  'border' => 'border-blue-500/30',  'active' => $chMeta],
                        ['name' => 'Google Ads', 'letter' => 'G', 'text' => 'text-green-400', 'border' => 'border-green-500/30', 'active' => $chGoogle],
                        ['name' => 'TikTok Ads', 'letter' => 'T', 'text' => 'text-pink-400',  'border' => 'border-pink-500/30',  'active' => $chTiktok],
                    ] as $ch)
                    <div class="p-4 bg-black/40 border {{ $ch['active'] ? $ch['border'] : 'border-white/5' }} rounded-xl flex items-center gap-3">
                        <div class="w-9 h-9 rounded border {{ $ch['active'] ? $ch['border'] : 'border-white/10' }} flex items-center justify-center font-black text-base {{ $ch['active'] ? $ch['text'] : 'text-gray-600' }} shrink-0">
                            {{ $ch['letter'] }}
                        </div>
                        <div>
                            <p class="text-[10px] uppercase tracking-widest {{ $ch['active'] ? 'text-gray-300' : 'text-gray-600' }} font-bold">{{ $ch['name'] }}</p>
                            <div class="flex items-center gap-1.5 mt-0.5">
                                <span class="w-1 h-1 rounded-full {{ $ch['active'] ? 'bg-green-400 animate-pulse' : 'bg-gray-600' }}"></span>
                                <span class="text-[9px] {{ $ch['active'] ? 'text-green-400' : 'text-gray-600' }} uppercase font-bold">{{ $ch['active'] ? 'Ativo' : 'Aguardando' }}</span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="p-4 bg-black/40 border {{ $chSeo ? 'border-cyan-500/20' : 'border-white/5' }} rounded-xl">
                        <p class="text-[9px] uppercase tracking-widest text-gray-600 mb-1.5">SEO</p>
                        <p class="{{ $chSeo ? 'text-white' : 'text-gray-600' }} text-sm font-bold">Otimização Semanal</p>
                        <div class="flex items-center gap-1.5 mt-2">
                            <span class="w-1 h-1 rounded-full {{ $chSeo ? 'bg-cyan-400 animate-pulse' : 'bg-gray-600' }}"></span>
                            <span class="text-[9px] {{ $chSeo ? 'text-cyan-400' : 'text-gray-600' }} uppercase font-bold">{{ $chSeo ? 'Em execução' : 'Aguardando' }}</span>
                        </div>
                    </div>
                    <div class="p-4 bg-black/40 border {{ $chSocial ? 'border-fuchsia-500/20' : 'border-white/5' }} rounded-xl">
                        <p class="text-[9px] uppercase tracking-widest text-gray-600 mb-1.5">Redes Sociais</p>
                        <p class="{{ $chSocial ? 'text-white' : 'text-gray-600' }} text-sm font-bold">3 Posts / Semana</p>
                        <div class="flex items-center gap-1.5 mt-2">
                            <span class="w-1 h-1 rounded-full {{ $chSocial ? 'bg-fuchsia-400 animate-pulse' : 'bg-gray-600' }}"></span>
                            <span class="text-[9px] {{ $chSocial ? 'text-fuchsia-400' : 'text-gray-600' }} uppercase font-bold">{{ $chSocial ? 'Cronograma ativo' : 'Aguardando' }}</span>
                        </div>
                    </div>
                    <div class="p-4 bg-black/40 border border-white/5 rounded-xl">
                        <p class="text-[9px] uppercase tracking-widest text-gray-600 mb-1.5">Dashboard Analítico</p>
                        <p class="text-white text-sm font-bold">Tempo Real</p>
                        <div class="flex items-center gap-1.5 mt-2">
                            <span class="w-1 h-1 rounded-full bg-purple-400 animate-pulse"></span>
                            <span class="text-[9px] text-purple-400 uppercase font-bold">Sincronizando</span>
                        </div>
                    </div>
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
                    @php $orderedMessages = $messages->sortBy('created_at'); @endphp
                    @forelse($orderedMessages as $message)
                    <div class="flex flex-col {{ $message->user_id == auth()->id() ? 'items-end' : 'items-start' }}">
                        <div class="p-3 rounded-lg border max-w-md
                            {{ $message->user_id == auth()->id()
                                ? 'bg-fuchsia-900/20 border-fuchsia-500/30'
                                : 'bg-purple-900/20 border-purple-500/30' }}">
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
                        class="w-full bg-gray-900 border border-fuchsia-500/30 rounded-xl p-4 text-white text-sm
                               focus:ring-fuchsia-500 focus:border-fuchsia-500 outline-none transition-all resize-none"
                        placeholder="Escrever mensagem para a equipe de marketing..."
                        rows="3"></textarea>
                    <div class="flex justify-between items-center mt-2">
                        <input type="file" id="chat-attachment" name="attachment" accept="image/*"
                               class="text-xs text-gray-500 file:bg-gray-800 file:text-white file:border-none
                                      file:rounded file:px-2 file:py-1 file:mr-4 file:hover:bg-gray-700 cursor-pointer">
                        <button id="send-btn" type="submit"
                            class="bg-fuchsia-600 px-6 py-2 rounded-lg font-bold text-xs
                                   hover:bg-fuchsia-500 transition shadow-lg shadow-fuchsia-500/20
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
                          bg-gradient-to-r from-fuchsia-600 to-purple-600
                          hover:from-fuchsia-500 hover:to-purple-500
                          shadow-[0_0_15px_rgba(217,70,239,0.25)] hover:shadow-[0_0_30px_rgba(217,70,239,0.5)]">
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
                      bg-gradient-to-r from-fuchsia-600 to-purple-600
                      hover:from-fuchsia-500 hover:to-purple-500
                      shadow-[0_0_20px_rgba(217,70,239,0.3)] hover:shadow-[0_0_40px_rgba(217,70,239,0.55)]">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M12 4v16m8-8H4"/>
                </svg>
                + Adicionar Plano
            </a>
            @endif

            <div class="p-4 bg-gray-900/50 border border-white/10 rounded-xl">
                <h3 class="text-white text-[10px] mb-4 tracking-widest uppercase text-center">Plano Atual</h3>
                @php
                    $u          = auth()->user();
                    $planColor  = $planConf['color'] ?? 'fuchsia';
                    $startedAt  = isset($clientSub) ? $clientSub->subscription_started_at : $u->subscription_started_at;
                    $cmSide = [
                        'cyan'    => ['text' => 'text-cyan-400',    'border' => 'border-cyan-500/20',    'glow' => 'shadow-[0_0_30px_rgba(34,211,238,0.12)]',  'dot' => 'bg-cyan-500'],
                        'violet'  => ['text' => 'text-violet-400',  'border' => 'border-violet-500/20',  'glow' => 'shadow-[0_0_30px_rgba(139,92,246,0.12)]',  'dot' => 'bg-violet-500'],
                        'fuchsia' => ['text' => 'text-fuchsia-400', 'border' => 'border-fuchsia-500/20', 'glow' => 'shadow-[0_0_30px_rgba(217,70,239,0.12)]',  'dot' => 'bg-fuchsia-500'],
                        'pink'    => ['text' => 'text-pink-400',    'border' => 'border-pink-500/20',    'glow' => 'shadow-[0_0_30px_rgba(236,72,153,0.12)]',  'dot' => 'bg-pink-500'],
                    ];
                    $cm = $cmSide[$planColor] ?? $cmSide['fuchsia'];
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

            <div class="p-4 bg-gray-900/50 border border-blue-500/20 rounded-xl">
                <h3 class="text-blue-400 text-[10px] mb-4 tracking-widest uppercase text-center">Ações do Sistema</h3>
                <a href="{{ route('billing') }}"
                   class="block w-full text-center py-2 border border-blue-500/40 rounded
                          text-[10px] font-bold text-blue-400 hover:bg-blue-500/10 transition uppercase">
                    GERENCIAR FATURAS
                </a>
                <a href="{{ route('profile.settings') }}"
                   class="block w-full text-center py-2 mt-2 bg-fuchsia-500/20 border border-fuchsia-400/30 rounded
                          text-[10px] font-bold text-fuchsia-300 hover:bg-fuchsia-500/30 transition uppercase">
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
        bubble.className = `p-3 rounded-lg border max-w-md ${isMine ? 'bg-fuchsia-900/20 border-fuchsia-500/30' : 'bg-purple-900/20 border-purple-500/30'}`;
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
