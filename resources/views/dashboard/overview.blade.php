<x-app-layout>

<style>
    @keyframes statusBlink {
        0%, 94%, 100% { opacity: 1; }
        95% { opacity: 0.1; } 97% { opacity: 1; } 98% { opacity: 0.2; }
    }
    .status-blink { animation: statusBlink 4s infinite; }
</style>

<div class="py-12 bg-black min-h-screen text-white font-mono">
<div class="max-w-5xl mx-auto sm:px-6 lg:px-8">

    {{-- HEADER --}}
    <div class="relative p-8 bg-gray-900/50 border border-purple-500/30 rounded-2xl backdrop-blur-xl mb-10">
        <div class="flex items-center justify-between flex-wrap gap-4">
            <div>
                <div class="flex items-center gap-3 mb-1">
                    <span class="w-2 h-2 rounded-full bg-purple-400 animate-pulse shadow-[0_0_8px_rgba(168,85,247,0.8)]"></span>
                    <span class="text-purple-400 text-[10px] uppercase tracking-[0.3em] font-bold">Central de Controle</span>
                </div>
                <h1 class="text-3xl font-black bg-gradient-to-r from-pink-500 via-purple-400 to-cyan-400 bg-clip-text text-transparent uppercase">
                    Meus Planos Ativos
                </h1>
                <p class="text-gray-400 mt-1 text-sm">
                    {{ $allSubs->count() }} assinaturas ativas — selecione um painel para gerenciar
                </p>
            </div>
            <a href="{{ route('subscribeWebM') }}"
               class="flex items-center gap-2 px-5 py-2.5 bg-gradient-to-r from-pink-600 to-purple-600
                      hover:from-pink-500 hover:to-purple-500 text-white font-black uppercase text-xs
                      tracking-widest rounded-xl transition-all shadow-[0_0_20px_rgba(168,85,247,0.3)]
                      hover:shadow-[0_0_30px_rgba(168,85,247,0.5)]">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M12 4v16m8-8H4"/>
                </svg>
                Adicionar Plano
            </a>
        </div>
    </div>

    @php
        $colorMap = [
            'pink'    => ['dot' => 'bg-pink-500',    'border' => 'border-pink-500/25',    'hover' => 'hover:border-pink-500/60',    'text' => 'text-pink-400',    'btn' => 'bg-pink-600 hover:bg-pink-500 shadow-[0_0_20px_rgba(236,72,153,0.3)]',    'glow' => 'shadow-[0_0_40px_rgba(236,72,153,0.06)]'],
            'cyan'    => ['dot' => 'bg-cyan-500',    'border' => 'border-cyan-500/25',    'hover' => 'hover:border-cyan-500/60',    'text' => 'text-cyan-400',    'btn' => 'bg-cyan-600 hover:bg-cyan-500 shadow-[0_0_20px_rgba(34,211,238,0.3)]',    'glow' => 'shadow-[0_0_40px_rgba(34,211,238,0.06)]'],
            'violet'  => ['dot' => 'bg-violet-500',  'border' => 'border-violet-500/25',  'hover' => 'hover:border-violet-500/60',  'text' => 'text-violet-400',  'btn' => 'bg-violet-600 hover:bg-violet-500 shadow-[0_0_20px_rgba(139,92,246,0.3)]',  'glow' => 'shadow-[0_0_40px_rgba(139,92,246,0.06)]'],
            'fuchsia' => ['dot' => 'bg-fuchsia-500', 'border' => 'border-fuchsia-500/25', 'hover' => 'hover:border-fuchsia-500/60', 'text' => 'text-fuchsia-400', 'btn' => 'bg-fuchsia-600 hover:bg-fuchsia-500 shadow-[0_0_20px_rgba(217,70,239,0.3)]', 'glow' => 'shadow-[0_0_40px_rgba(217,70,239,0.06)]'],
        ];
    @endphp

    {{-- GRADE DE ASSINATURAS --}}
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-10">
        @foreach($allSubs as $sub)
        @php
            $conf = $sub->planConfig();
            $cm   = $colorMap[$conf['color'] ?? 'pink'] ?? $colorMap['pink'];
            $project = $sub->project;
        @endphp
        <div class="relative flex flex-col rounded-2xl bg-[#0c0d14] border {{ $cm['border'] }} {{ $cm['hover'] }} {{ $cm['glow'] }} transition-all duration-300 overflow-hidden group">

            {{-- Glow line top --}}
            <div class="absolute top-0 inset-x-0 h-[1px] bg-gradient-to-r from-transparent via-white/10 to-transparent group-hover:via-white/20 transition-all"></div>

            <div class="p-6 flex flex-col flex-1">

                {{-- Plan header --}}
                <div class="flex items-start justify-between mb-4">
                    <div>
                        <div class="flex items-center gap-2 mb-1">
                            <span class="w-1.5 h-1.5 rounded-full animate-pulse {{ $cm['dot'] }}"></span>
                            <span class="text-[9px] uppercase tracking-widest {{ $cm['text'] }} font-bold">
                                {{ $conf['subtitle'] ?? 'Plano' }}
                            </span>
                        </div>
                        <h3 class="text-xl font-black text-white uppercase tracking-tight">{{ $conf['label'] }}</h3>
                        <p class="text-gray-500 text-xs mt-0.5">{{ $conf['description'] }}</p>
                    </div>
                    <div class="flex items-center gap-1.5 shrink-0">
                        <span class="w-2 h-2 rounded-full bg-green-500 animate-pulse"></span>
                        <span class="text-[10px] uppercase tracking-widest text-green-400 font-bold">Ativo</span>
                    </div>
                </div>

                {{-- Project info --}}
                <div class="p-3 bg-black/40 border border-white/5 rounded-xl mb-4">
                    <p class="text-[9px] uppercase tracking-widest text-gray-600 mb-1">Projeto</p>
                    <p class="text-white font-black text-sm">{{ $project->name ?? 'Inicializando...' }}</p>
                    <div class="flex items-center gap-2 mt-1.5">
                        <div class="flex-1 bg-gray-800 rounded-full h-1.5 overflow-hidden">
                            <div class="h-full rounded-full bg-gradient-to-r from-pink-500 to-purple-500"
                                 style="width: {{ $project->progress ?? 0 }}%"></div>
                        </div>
                        <span class="text-[9px] text-gray-500">{{ $project->progress ?? 0 }}%</span>
                    </div>
                    <p class="text-[9px] text-gray-600 mt-1 uppercase">
                        Status: {{ $project->status ?? 'Initializing' }}
                    </p>
                </div>

                {{-- Billing info --}}
                <div class="flex items-center justify-between mb-5">
                    <div>
                        <p class="text-[9px] uppercase tracking-widest text-gray-600">Valor</p>
                        <p class="text-sm font-black {{ $cm['text'] }}">
                            {{ $conf['currency'] }}{{ $conf['price'] }}<span class="text-gray-500 text-xs font-normal">{{ $conf['period'] }}</span>
                        </p>
                    </div>
                    <div class="text-right">
                        <p class="text-[9px] uppercase tracking-widest text-gray-600">Desde</p>
                        <p class="text-xs text-gray-400 font-bold">
                            {{ $sub->subscription_started_at?->format('d/m/Y') ?? '—' }}
                        </p>
                    </div>
                </div>

                {{-- CTA --}}
                <a href="{{ route('dashboard.plan', ['id' => $sub->id]) }}"
                   class="group/btn relative block w-full text-center font-black uppercase py-3 rounded-xl
                          transition-all duration-300 transform hover:-translate-y-0.5 text-sm tracking-widest
                          text-white {{ $cm['btn'] }}">
                    <span class="relative z-10">Abrir Painel</span>
                    <div class="absolute inset-0 w-[200%] h-full bg-gradient-to-r from-transparent via-white/20 to-transparent
                                -translate-x-full group-hover/btn:translate-x-full transition-transform duration-700
                                rounded-xl pointer-events-none"></div>
                </a>

            </div>
        </div>
        @endforeach
    </div>

    {{-- ADD PLAN BANNER --}}
    <div class="relative rounded-2xl border border-dashed border-white/10 hover:border-purple-500/40 transition-all duration-300 overflow-hidden group">
        <div class="absolute inset-0 bg-gradient-to-r from-pink-900/5 via-purple-900/5 to-cyan-900/5 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
        <a href="{{ route('subscribeWebM') }}" class="relative flex flex-col md:flex-row items-center justify-between gap-6 p-8">
            <div class="text-center md:text-left">
                <p class="text-white font-black text-lg uppercase tracking-tight">Adicionar Novo Plano</p>
                <p class="text-gray-500 text-sm mt-1">
                    Gerencie múltiplos sites, campanhas de marketing ou agentes de IA simultaneamente.
                </p>
            </div>
            <div class="flex items-center gap-3 text-purple-400 font-black uppercase text-xs tracking-widest shrink-0">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M12 4v16m8-8H4"/>
                </svg>
                Ver Todos os Planos
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
            </div>
        </a>
    </div>

    {{-- Actions bottom --}}
    <div class="mt-8 flex flex-wrap items-center justify-end gap-4">
        <a href="{{ route('billing') }}"
           class="px-4 py-2 border border-blue-500/40 rounded-lg text-[10px] font-bold text-blue-400
                  hover:bg-blue-500/10 transition uppercase tracking-widest">
            Gerenciar Faturas
        </a>
        <a href="{{ route('profile.settings') }}"
           class="px-4 py-2 bg-fuchsia-500/20 border border-fuchsia-400/30 rounded-lg text-[10px] font-bold
                  text-fuchsia-300 hover:bg-fuchsia-500/30 transition uppercase tracking-widest">
            Perfil & Configurações
        </a>
    </div>

</div>
</div>

</x-app-layout>
