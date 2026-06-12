<x-app-layout>
<div class="min-h-screen bg-black flex items-center justify-center py-24 px-6 relative overflow-hidden antialiased">

    <div class="absolute inset-0 z-0 pointer-events-none">
        <div class="absolute top-1/4 left-1/2 -translate-x-1/2 w-[900px] h-[900px] bg-violet-900/15 rounded-full blur-[200px]"></div>
        <div class="absolute bottom-0 right-0 w-[500px] h-[500px] bg-purple-900/10 rounded-full blur-[150px]"></div>
        <div class="absolute inset-0" style="background-image: radial-gradient(circle at 50% 0%, rgba(139,92,246,0.05) 0%, transparent 60%);"></div>
    </div>

    <div class="relative z-10 w-full max-w-lg mx-auto">

        <a href="{{ route('subscribeWebM') }}"
           class="inline-flex items-center gap-2 text-gray-600 hover:text-white text-[10px] uppercase tracking-[0.35em] mb-12 transition-colors group">
            <svg class="w-3 h-3 group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
            Ver todos os planos
        </a>

        <div class="bg-[#0d0e14]/90 backdrop-blur-3xl rounded-[32px] border border-violet-500/20 p-10 shadow-[0_0_120px_rgba(139,92,246,0.09)] relative overflow-hidden">

            <div class="absolute top-0 right-0 w-64 h-64 bg-violet-500/5 rounded-full blur-3xl pointer-events-none"></div>

            <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full border border-violet-500/30 bg-violet-500/8 text-violet-400 text-[10px] font-bold tracking-[0.3em] uppercase mb-2">
                <span class="w-1.5 h-1.5 bg-violet-500 rounded-full animate-ping absolute"></span>
                <span class="w-1.5 h-1.5 bg-violet-500 rounded-full relative"></span>
                Plano IA
            </div>

            <div class="mb-2 mt-6">
                <div class="flex items-baseline gap-1">
                    <span class="text-violet-400 text-2xl font-bold mr-1">€</span>
                    <span class="text-8xl font-black text-white tracking-tighter leading-none">497</span>
                    <div class="ml-2 pb-1">
                        <p class="text-gray-400 text-sm font-medium">/mês</p>
                        <p class="text-gray-600 text-[10px] uppercase tracking-widest">renovação automática</p>
                    </div>
                </div>
                <p class="text-gray-500 text-sm mt-3">Inteligência artificial integrada ao seu projeto.</p>
            </div>

            <div class="h-px bg-gradient-to-r from-transparent via-violet-500/25 to-transparent my-8"></div>

            <ul class="space-y-4 mb-10">
                @foreach([
                    ['text' => 'Tudo do Plano Mensal', 'highlight' => false],
                    ['text' => 'Agentes de IA Autônomos 24h', 'highlight' => true],
                    ['text' => 'Automação de Processos com IA', 'highlight' => true],
                    ['text' => 'Chatbot Personalizado', 'highlight' => false],
                    ['text' => 'Relatórios Inteligentes Automatizados', 'highlight' => false],
                    ['text' => 'Prioridade Máxima de Suporte', 'highlight' => false],
                    ['text' => 'Dashboard de Acompanhamento', 'highlight' => false],
                ] as $feature)
                <li class="flex items-center gap-3 text-sm {{ $feature['highlight'] ? 'text-violet-300 font-semibold' : 'text-gray-300' }}">
                    <svg class="w-4 h-4 text-violet-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path>
                    </svg>
                    {{ $feature['text'] }}
                </li>
                @endforeach
            </ul>

            @if(!env('STRIPE_PRICE_ID_IA'))
            <div class="mb-6 p-4 rounded-xl bg-yellow-500/5 border border-yellow-500/20 text-yellow-400 text-xs text-center">
                Este plano está em configuração. Entre em contato para garantir sua vaga.
            </div>
            <a href="{{ route('contact') }}"
               class="block w-full text-center rounded-2xl border border-violet-500/40 bg-violet-500/10 px-6 py-5 text-sm font-black uppercase italic tracking-[0.2em] text-violet-300 hover:bg-violet-500/20 transition-all">
                Falar com a Equipe
            </a>
            @else
            <a href="{{ route('checkout', ['plan' => 'ia']) }}"
               class="group/btn relative block w-full text-center overflow-hidden rounded-2xl bg-violet-600 px-6 py-5 text-sm font-black uppercase italic tracking-[0.2em] text-white shadow-[0_0_40px_rgba(139,92,246,0.35)] transition-all hover:scale-[1.02] hover:bg-violet-500 hover:shadow-[0_0_60px_rgba(139,92,246,0.6)]">
                <span class="relative z-10">Assinar Plano IA — €497/mês</span>
                <div class="absolute inset-0 w-[200%] h-full bg-gradient-to-r from-transparent via-white/20 to-transparent -translate-x-full group-hover/btn:animate-[mirrorShine_0.7s_ease-in-out_forwards] pointer-events-none"></div>
            </a>
            @endif

            <p class="text-center text-gray-700 text-[10px] mt-4 tracking-widest uppercase">
                Checkout seguro via Stripe · Cancele a qualquer momento
            </p>
        </div>
    </div>
</div>

<style>
    @keyframes mirrorShine {
        0%   { transform: translateX(-100%) skewX(-15deg); }
        100% { transform: translateX(100%)  skewX(-15deg); }
    }
</style>
</x-app-layout>
