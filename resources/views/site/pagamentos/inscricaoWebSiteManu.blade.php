<x-app-layout>
@php
    $allPlans = config('plans', []);

    // Agrupa planos por subtitle
    $groups = [];
    foreach ($allPlans as $slug => $plan) {
        $groups[$plan['subtitle']][$slug] = $plan;
    }

    $colorMap = [
        'pink'    => [
            'badge'    => 'bg-pink-500/10 border-pink-500/25 text-pink-400',
            'border'   => 'border-pink-500/20',
            'hover'    => 'hover:border-pink-500/50',
            'check'    => 'text-pink-500',
            'price'    => 'text-pink-400',
            'btn'      => 'bg-[#ff3399] hover:bg-pink-500 text-white shadow-[0_0_30px_rgba(255,51,153,0.3)]',
            'dot'      => 'bg-pink-500',
            'glow'     => 'shadow-[0_0_60px_rgba(236,72,153,0.07)]',
        ],
        'cyan'    => [
            'badge'    => 'bg-cyan-500/10 border-cyan-500/25 text-cyan-400',
            'border'   => 'border-cyan-500/20',
            'hover'    => 'hover:border-cyan-500/50',
            'check'    => 'text-cyan-500',
            'price'    => 'text-cyan-400',
            'btn'      => 'bg-[#22d3ee] hover:bg-cyan-300 text-black shadow-[0_0_30px_rgba(34,211,238,0.3)]',
            'dot'      => 'bg-cyan-500',
            'glow'     => 'shadow-[0_0_60px_rgba(34,211,238,0.07)]',
        ],
        'violet'  => [
            'badge'    => 'bg-violet-500/10 border-violet-500/25 text-violet-400',
            'border'   => 'border-violet-500/20',
            'hover'    => 'hover:border-violet-500/50',
            'check'    => 'text-violet-500',
            'price'    => 'text-violet-400',
            'btn'      => 'bg-violet-600 hover:bg-violet-500 text-white shadow-[0_0_30px_rgba(139,92,246,0.3)]',
            'dot'      => 'bg-violet-500',
            'glow'     => 'shadow-[0_0_60px_rgba(139,92,246,0.07)]',
        ],
        'fuchsia' => [
            'badge'    => 'bg-fuchsia-500/10 border-fuchsia-500/25 text-fuchsia-400',
            'border'   => 'border-fuchsia-500/20',
            'hover'    => 'hover:border-fuchsia-500/50',
            'check'    => 'text-fuchsia-500',
            'price'    => 'text-fuchsia-400',
            'btn'      => 'bg-gradient-to-r from-fuchsia-600 to-purple-600 hover:from-fuchsia-500 hover:to-purple-500 text-white shadow-[0_0_30px_rgba(217,70,239,0.3)]',
            'dot'      => 'bg-fuchsia-500',
            'glow'     => 'shadow-[0_0_60px_rgba(217,70,239,0.07)]',
        ],
    ];

    $groupIcons = [
        'Site + Manutenção'          => '⚡',
        'Site + Inteligência Artificial' => '🤖',
        'Marketing Digital'          => '📈',
        'Inteligência Artificial'    => '🧠',
    ];
@endphp

<div class="min-h-screen bg-[#020205] antialiased selection:bg-white/10">

    {{-- Orbs de fundo --}}
    <div class="fixed inset-0 z-0 pointer-events-none overflow-hidden">
        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[800px] h-[600px] bg-purple-900/10 rounded-full blur-[150px]"></div>
        <div class="absolute bottom-0 right-0 w-[600px] h-[500px] bg-cyan-900/8 rounded-full blur-[120px]"></div>
        <div class="absolute bottom-0 left-0 w-[500px] h-[400px] bg-fuchsia-900/8 rounded-full blur-[120px]"></div>
        <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/carbon-fibre.png')] opacity-[0.03]"></div>
    </div>

    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">

        {{-- Header --}}
        <div class="text-center mb-16 mt-8">
            <div class="inline-flex items-center gap-2 bg-white/5 border border-white/10 px-4 py-1 rounded-full mb-6">
                <span class="relative flex h-2 w-2">
                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-purple-400 opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-2 w-2 bg-purple-500"></span>
                </span>
                <span class="text-white font-mono text-[10px] uppercase tracking-widest">Inscrição Prioritária</span>
            </div>
            <h1 class="text-4xl sm:text-6xl font-black text-white tracking-tighter uppercase mb-4">
                ACESSO <span class="text-transparent bg-clip-text bg-gradient-to-r from-pink-500 via-violet-500 to-cyan-400">TOTAL</span>
            </h1>
            <p class="text-slate-400 max-w-xl mx-auto text-sm sm:text-base">
                Escolha o plano ideal para o seu negócio. Todos incluem suporte dedicado e dashboard de acompanhamento.
            </p>
        </div>

        {{-- Grupos de planos --}}
        @foreach($groups as $groupName => $plansInGroup)
        <div class="mb-16">

            {{-- Título do grupo --}}
            <div class="flex items-center gap-3 mb-8">
                <span class="text-2xl">{{ $groupIcons[$groupName] ?? '💎' }}</span>
                <h2 class="text-xl font-black uppercase text-white tracking-widest">{{ $groupName }}</h2>
                <div class="flex-1 h-[1px] bg-gradient-to-r from-white/10 to-transparent"></div>
            </div>

            {{-- Cards do grupo --}}
            @php
                $count = count($plansInGroup);
                $gridClass = match(true) {
                    $count === 1 => 'grid-cols-1 max-w-md mx-auto',
                    $count === 2 => 'grid-cols-1 md:grid-cols-2 max-w-3xl mx-auto',
                    default      => 'grid-cols-1 md:grid-cols-2 lg:grid-cols-3',
                };
            @endphp
            <div class="grid gap-6 {{ $gridClass }}">

                @foreach($plansInGroup as $slug => $plan)
                @php
                    $cm = $colorMap[$plan['color']] ?? $colorMap['pink'];
                    $hasBadge = !empty($plan['badge']);
                @endphp

                <div class="relative flex flex-col rounded-2xl bg-[#0c0d14] border {{ $cm['border'] }} {{ $cm['hover'] }} {{ $cm['glow'] }} transition-all duration-300 overflow-hidden group">

                    {{-- Glow line top --}}
                    <div class="absolute top-0 inset-x-0 h-[1px] bg-gradient-to-r from-transparent via-white/10 to-transparent group-hover:via-white/20 transition-all"></div>

                    @if($hasBadge)
                    <div class="absolute -top-3 right-5 z-10">
                        <span class="mt-5 inline-block px-4 py-1 rounded-full text-[9px] font-black uppercase tracking-widest border {{ $cm['badge'] }} animate-pulse">
                            {{ $plan['badge'] }}
                        </span>
                    </div>
                    @endif

                    <div class="flex flex-col flex-1 p-7">

                        {{-- Plan name + dot --}}
                        <div class="flex items-center gap-2 mb-1">
                            <span class="w-1.5 h-1.5 rounded-full {{ $cm['dot'] }} animate-pulse"></span>
                            <h3 class="text-lg font-black uppercase text-white tracking-tight">{{ $plan['label'] }}</h3>
                        </div>
                        <p class="text-slate-500 text-xs mb-5 leading-relaxed">{{ $plan['description'] }}</p>

                        {{-- Price --}}
                        <div class="mb-1">
                            <div class="flex items-end gap-1.5">
                                <span class="{{ $cm['price'] }} text-base font-bold">{{ $plan['currency'] }}</span>
                                <span class="text-4xl font-black text-white italic tracking-tighter leading-none">{{ $plan['price'] }}</span>
                                <span class="text-slate-500 text-sm mb-0.5 font-bold">{{ $plan['period'] }}</span>
                            </div>
                            @if($plan['price_note'])
                            <p class="{{ $cm['price'] }} text-xs mt-1 opacity-80">{{ $plan['price_note'] }}</p>
                            @endif
                        </div>

                        @if($plan['savings'])
                        <div class="inline-flex items-center gap-1.5 mt-2 mb-3 px-3 py-1 rounded-full text-[10px] font-bold uppercase tracking-widest border {{ $cm['badge'] }}">
                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg>
                            {{ $plan['savings'] }}
                        </div>
                        @endif

                        {{-- Divider --}}
                        <div class="h-[1px] bg-white/5 my-5"></div>

                        {{-- Features --}}
                        <ul class="space-y-3 mb-7 flex-1">
                            @foreach($plan['features'] as $feature)
                            <li class="flex items-start gap-2.5">
                                <svg class="w-4 h-4 mt-0.5 flex-shrink-0 {{ $cm['check'] }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="{{ $feature['highlight'] ? 3 : 2 }}" d="M5 13l4 4L19 7"/>
                                </svg>
                                <span class="text-xs {{ $feature['highlight'] ? 'text-white font-bold' : 'text-slate-400' }}">{{ $feature['text'] }}</span>
                            </li>
                            @endforeach
                        </ul>

                        {{-- CTA --}}
                        <a href="{{ route('assinar', ['plan' => $slug]) }}"
                           class="group/btn relative block w-full text-center font-black uppercase py-3.5 rounded-xl transition-all duration-300 transform hover:-translate-y-0.5 text-sm tracking-widest {{ $cm['btn'] }}">
                            <span class="relative z-10">Assinar Agora</span>
                            <div class="absolute inset-0 w-[200%] h-full bg-gradient-to-r from-transparent via-white/20 to-transparent -translate-x-full group-hover/btn:translate-x-full transition-transform duration-700 rounded-xl pointer-events-none"></div>
                        </a>

                        <p class="text-center text-[10px] text-slate-700 mt-3 uppercase tracking-widest">{{ $plan['billing_note'] }}</p>

                    </div>
                </div>
                @endforeach

            </div>
        </div>
        @endforeach

        {{-- Footer badges --}}
        <div class="mt-4 flex flex-wrap items-center justify-center gap-6 text-slate-700">
            <div class="flex items-center gap-1.5 text-[10px] uppercase tracking-widest font-bold">
                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                Pagamento Seguro via Stripe
            </div>
            <div class="w-[1px] h-3 bg-white/5"></div>
            <div class="flex items-center gap-1.5 text-[10px] uppercase tracking-widest font-bold">
                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                Dados Protegidos
            </div>
            <div class="w-[1px] h-3 bg-white/5"></div>
            <div class="flex items-center gap-1.5 text-[10px] uppercase tracking-widest font-bold">
                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                Cancele Quando Quiser
            </div>
        </div>

    </div>
</div>

<style>
    @keyframes blob {
        0% { transform: translate(0px, 0px) scale(1); }
        33% { transform: translate(30px, -50px) scale(1.1); }
        66% { transform: translate(-20px, 20px) scale(0.95); }
        100% { transform: translate(0px, 0px) scale(1); }
    }
    .animate-blob { animation: blob 12s infinite ease-in-out; }
</style>
</x-app-layout>
