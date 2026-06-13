<x-app-layout>
@php
    $c = $plan['color'];

    $borderColor = match($c) {
        'cyan'    => 'border-cyan-500',
        'violet'  => 'border-violet-500',
        'fuchsia' => 'border-fuchsia-500',
        default   => 'border-pink-500',
    };
    $borderFaint = match($c) {
        'cyan'    => 'border-cyan-500/20',
        'violet'  => 'border-violet-500/20',
        'fuchsia' => 'border-fuchsia-500/20',
        default   => 'border-pink-500/20',
    };
    $glowBg = match($c) {
        'cyan'    => 'bg-cyan-900/15',
        'violet'  => 'bg-violet-900/15',
        'fuchsia' => 'bg-fuchsia-900/12',
        default   => 'bg-pink-900/15',
    };
    $glowShadow = match($c) {
        'cyan'    => 'shadow-[0_0_120px_rgba(34,211,238,0.07)]',
        'violet'  => 'shadow-[0_0_120px_rgba(139,92,246,0.09)]',
        'fuchsia' => 'shadow-[0_0_120px_rgba(217,70,239,0.07)]',
        default   => 'shadow-[0_0_120px_rgba(236,72,153,0.08)]',
    };
    $badgeBg = match($c) {
        'cyan'    => 'bg-cyan-500/10 border-cyan-500/25 text-cyan-400',
        'violet'  => 'bg-violet-500/10 border-violet-500/25 text-violet-400',
        'fuchsia' => 'bg-fuchsia-500/10 border-fuchsia-500/25 text-fuchsia-400',
        default   => 'bg-pink-500/10 border-pink-500/25 text-pink-400',
    };
    $dotColor = match($c) {
        'cyan'    => 'bg-cyan-500 shadow-[0_0_8px_rgba(34,211,238,0.7)]',
        'violet'  => 'bg-violet-500 shadow-[0_0_8px_rgba(139,92,246,0.7)]',
        'fuchsia' => 'bg-fuchsia-500 shadow-[0_0_8px_rgba(217,70,239,0.7)]',
        default   => 'bg-pink-500 shadow-[0_0_8px_rgba(236,72,153,0.7)]',
    };
    $accentText = match($c) {
        'cyan'    => 'text-cyan-400',
        'violet'  => 'text-violet-400',
        'fuchsia' => 'text-fuchsia-400',
        default   => 'text-pink-400',
    };
    $accentTextBright = match($c) {
        'cyan'    => 'text-cyan-300',
        'violet'  => 'text-violet-300',
        'fuchsia' => 'text-fuchsia-300',
        default   => 'text-pink-300',
    };
    $checkColor = match($c) {
        'cyan'    => 'text-cyan-500',
        'violet'  => 'text-violet-500',
        'fuchsia' => 'text-fuchsia-500',
        default   => 'text-pink-500',
    };
    $dividerVia = match($c) {
        'cyan'    => 'via-cyan-500/20',
        'violet'  => 'via-violet-500/25',
        'fuchsia' => 'via-fuchsia-500/20',
        default   => 'via-pink-500/20',
    };
    $glowLineColor = match($c) {
        'cyan'    => 'bg-gradient-to-r from-transparent via-cyan-400 to-transparent shadow-[0_0_12px_rgba(34,211,238,0.8)]',
        'violet'  => 'bg-gradient-to-r from-transparent via-violet-400 to-transparent shadow-[0_0_12px_rgba(139,92,246,0.8)]',
        'fuchsia' => 'bg-gradient-to-r from-transparent via-fuchsia-400 to-transparent shadow-[0_0_12px_rgba(217,70,239,0.8)]',
        default   => 'bg-gradient-to-r from-transparent via-pink-400 to-transparent shadow-[0_0_12px_rgba(236,72,153,0.8)]',
    };
    $btnClass = match($c) {
        'cyan'    => 'bg-[#22d3ee] hover:bg-cyan-300 text-black shadow-[0_0_40px_rgba(34,211,238,0.35)] hover:shadow-[0_0_60px_rgba(34,211,238,0.6)]',
        'violet'  => 'bg-violet-600 hover:bg-violet-500 text-white shadow-[0_0_40px_rgba(139,92,246,0.35)] hover:shadow-[0_0_60px_rgba(139,92,246,0.6)]',
        'fuchsia' => 'bg-gradient-to-r from-fuchsia-600 to-purple-600 hover:from-fuchsia-500 hover:to-purple-500 text-white shadow-[0_0_40px_rgba(217,70,239,0.3)] hover:shadow-[0_0_60px_rgba(217,70,239,0.6)]',
        default   => 'bg-[#ff3399] hover:bg-pink-500 text-white shadow-[0_0_40px_rgba(255,51,153,0.3)] hover:shadow-[0_0_60px_rgba(255,51,153,0.5)]',
    };
    $bgOrb1 = match($c) {
        'cyan'    => 'bg-cyan-900/15',
        'violet'  => 'bg-violet-900/20',
        'fuchsia' => 'bg-fuchsia-900/15',
        default   => 'bg-pink-900/15',
    };
    $bgOrb2 = match($c) {
        'cyan'    => 'bg-indigo-900/10',
        'violet'  => 'bg-indigo-900/15',
        'fuchsia' => 'bg-purple-900/10',
        default   => 'bg-purple-900/10',
    };

    $priceId = $plan['stripe_price_id'] ?? null;
    $hasStripe = !empty($priceId);
@endphp

<div class="min-h-screen bg-[#020205] antialiased selection:bg-white/10">

    {{-- Background orbs --}}
    <div class="fixed inset-0 z-0 pointer-events-none overflow-hidden">
        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[700px] h-[700px] {{ $bgOrb1 }} rounded-full blur-[150px]"></div>
        <div class="absolute bottom-0 right-0 w-[500px] h-[500px] {{ $bgOrb2 }} rounded-full blur-[120px]"></div>
        <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/carbon-fibre.png')] opacity-[0.03]"></div>
    </div>

    <div class="relative z-10 max-w-2xl mx-auto px-4 py-16">

        {{-- Back link --}}
        <div class="mb-10">
            <a href="{{ route('subscribeWebM') }}" class="inline-flex items-center gap-2 text-slate-500 hover:text-white text-xs uppercase tracking-widest font-bold transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                Ver todos os planos
            </a>
        </div>

        {{-- Subtitle chip --}}
        <div class="mb-6">
            <span class="inline-block px-4 py-1 rounded-full text-[10px] font-black tracking-[0.3em] uppercase border {{ $badgeBg }}">
                {{ $plan['subtitle'] }}
            </span>
        </div>

        {{-- Card --}}
        <div class="relative rounded-3xl bg-[#0c0d14] border {{ $borderColor }} {{ $glowShadow }} overflow-hidden">

            {{-- Top glow line --}}
            <div class="absolute top-0 left-1/4 right-1/4 h-[2px] {{ $glowLineColor }}"></div>

            {{-- Badge (Recomendado / 10% Desconto / etc) --}}
            @if($plan['badge'])
            <div class="absolute -top-4 right-8">
                <span class="mt-5 inline-block bg-[#0c0d14] border {{ $borderColor }} {{ $accentText }} text-[10px] font-black uppercase tracking-widest px-5 py-1.5 rounded-full animate-pulse {{ $glowShadow }}">
                    {{ $plan['badge'] }}
                </span>
            </div>
            @endif

            <div class="p-8 sm:p-12">

                {{-- Plan name --}}
                <div class="flex items-center gap-3 mb-2">
                    <div class="w-2 h-2 rounded-full animate-pulse {{ $dotColor }}"></div>
                    <h1 class="text-3xl sm:text-4xl font-black uppercase text-white tracking-tighter">{{ $plan['label'] }}</h1>
                </div>
                <p class="text-slate-400 text-sm mb-8">{{ $plan['description'] }}</p>

                {{-- Divider --}}
                <div class="h-[1px] bg-gradient-to-r from-transparent {{ $dividerVia }} to-transparent mb-8"></div>

                {{-- Price block --}}
                <div class="mb-2">
                    <div class="flex items-end gap-2">
                        <span class="{{ $accentText }} text-2xl font-bold">{{ $plan['currency'] }}</span>
                        <span class="text-6xl sm:text-7xl font-black text-white italic tracking-tighter leading-none">{{ $plan['price'] }}</span>
                        <span class="text-slate-500 mb-2 font-bold text-lg">{{ $plan['period'] }}</span>
                    </div>
                    @if($plan['price_note'])
                    <p class="{{ $accentText }} text-sm font-bold mt-1 opacity-80">{{ $plan['price_note'] }}</p>
                    @endif
                </div>

                @if($plan['savings'])
                <div class="inline-flex items-center gap-2 mt-3 mb-2 px-4 py-1.5 rounded-full text-xs font-black uppercase tracking-widest {{ $badgeBg }} border">
                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg>
                    {{ $plan['savings'] }}
                </div>
                @endif

                {{-- Divider --}}
                <div class="h-[1px] bg-gradient-to-r from-transparent {{ $dividerVia }} to-transparent my-8"></div>

                {{-- Features --}}
                <ul class="space-y-4 mb-10">
                    @foreach($plan['features'] as $feature)
                    <li class="flex items-start gap-3">
                        <svg class="w-5 h-5 mt-0.5 flex-shrink-0 {{ $checkColor }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="{{ $feature['highlight'] ? 3 : 2 }}" d="M5 13l4 4L19 7"/>
                        </svg>
                        <span class="text-sm {{ $feature['highlight'] ? $accentTextBright . ' font-bold' : 'text-slate-300' }}">{{ $feature['text'] }}</span>
                    </li>
                    @endforeach
                </ul>

                {{-- CTA --}}
                @if($hasStripe)
                    <a href="{{ route('checkout', ['plan' => $planSlug]) }}"
                       class="group relative block w-full text-center font-black uppercase italic py-5 rounded-2xl transition-all duration-300 transform hover:-translate-y-1 text-lg {{ $btnClass }}">
                        <span class="relative z-10">Assinar {{ $plan['label'] }}</span>
                        <div class="absolute inset-0 w-[200%] h-full bg-gradient-to-r from-transparent via-white/20 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-700 rounded-2xl pointer-events-none"></div>
                    </a>
                @else
                    <a href="{{ route('contact') }}"
                       class="group relative block w-full text-center font-black uppercase italic py-5 rounded-2xl transition-all duration-300 transform hover:-translate-y-1 text-lg {{ $btnClass }}">
                        <span class="relative z-10">Falar com a Equipe</span>
                    </a>
                    <p class="text-center text-xs text-slate-600 mt-3 tracking-widest uppercase">Plano em configuração — entre em contato</p>
                @endif

                {{-- Billing note --}}
                <p class="text-center text-[11px] text-slate-600 mt-4 uppercase tracking-widest">
                    {{ $plan['billing_note'] }}
                </p>

            </div>
        </div>

        {{-- Security badges --}}
        <div class="mt-8 flex items-center justify-center gap-6 text-slate-700">
            <div class="flex items-center gap-1.5 text-[10px] uppercase tracking-widest font-bold">
                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                Pagamento Seguro
            </div>
            <div class="w-[1px] h-3 bg-white/10"></div>
            <div class="flex items-center gap-1.5 text-[10px] uppercase tracking-widest font-bold">
                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                Stripe Protegido
            </div>
            <div class="w-[1px] h-3 bg-white/10"></div>
            <div class="flex items-center gap-1.5 text-[10px] uppercase tracking-widest font-bold">
                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                Cancele Quando Quiser
            </div>
        </div>

    </div>
</div>
</x-app-layout>
