<x-app-layout>
<div class="min-h-screen bg-black flex items-center justify-center py-24 px-6 relative overflow-hidden antialiased">

    <div class="absolute inset-0 z-0 pointer-events-none">
        <div class="absolute top-1/4 left-1/2 -translate-x-1/2 w-[900px] h-[900px] bg-cyan-900/12 rounded-full blur-[200px]"></div>
        <div class="absolute bottom-0 left-0 w-[500px] h-[500px] bg-blue-900/10 rounded-full blur-[150px]"></div>
        <div class="absolute inset-0" style="background-image: radial-gradient(circle at 50% 0%, rgba(34,211,238,0.04) 0%, transparent 60%);"></div>
    </div>

    <div class="relative z-10 w-full max-w-lg mx-auto">

        <a href="{{ route('subscribeWebM') }}"
           class="inline-flex items-center gap-2 text-gray-600 hover:text-white text-[10px] uppercase tracking-[0.35em] mb-12 transition-colors group">
            <svg class="w-3 h-3 group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
            Ver todos os planos
        </a>

        <div class="bg-[#0d0e14]/90 backdrop-blur-3xl rounded-[32px] border border-cyan-500/20 p-10 shadow-[0_0_120px_rgba(34,211,238,0.07)] relative overflow-hidden">

            {{-- Badge 10% OFF --}}
            <div class="absolute -top-px left-1/2 -translate-x-1/2 bg-gradient-to-r from-cyan-500 to-blue-500 text-black text-[9px] font-black uppercase tracking-[0.4em] px-6 py-1 rounded-b-xl shadow-[0_0_20px_rgba(34,211,238,0.4)]">
                10% de Desconto · Mais Vantajoso
            </div>

            <div class="mt-6">
                <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full border border-cyan-500/25 bg-cyan-500/8 text-cyan-400 text-[10px] font-bold tracking-[0.3em] uppercase mb-8">
                    <span class="w-1.5 h-1.5 bg-cyan-500 rounded-full animate-pulse"></span>
                    Plano Anual
                </div>

                <div class="mb-2">
                    <div class="flex items-baseline gap-1">
                        <span class="text-cyan-400 text-2xl font-bold mr-1">€</span>
                        <span class="text-8xl font-black text-white tracking-tighter leading-none">178<span class="text-4xl">,19</span></span>
                        <div class="ml-2 pb-1">
                            <p class="text-gray-400 text-sm font-medium">/mês</p>
                            <p class="text-gray-600 text-[10px] uppercase tracking-widest">cobrado anualmente</p>
                        </div>
                    </div>
                </div>

                <div class="inline-flex items-center gap-2 bg-red-500/10 border border-red-500/20 rounded-full px-4 py-1 mb-3">
                    <span class="text-red-400 text-xs font-bold">*Faturado em €2.138,29/ano</span>
                </div>

                <div class="flex items-center gap-3 mb-8">
                    <div class="flex items-center gap-1.5 bg-cyan-500/10 border border-cyan-500/20 rounded-full px-3 py-1">
                        <span class="text-cyan-400 text-[10px] font-bold uppercase tracking-wider">Economia de €237,59</span>
                    </div>
                    <div class="flex items-center gap-1.5 bg-green-500/10 border border-green-500/20 rounded-full px-3 py-1">
                        <span class="text-green-400 text-[10px] font-bold uppercase tracking-wider">vs. plano mensal</span>
                    </div>
                </div>
            </div>

            <div class="h-px bg-gradient-to-r from-transparent via-cyan-500/20 to-transparent mb-8"></div>

            <ul class="space-y-4 mb-10">
                @foreach([
                    ['text' => 'Tudo do Plano Mensal', 'highlight' => false],
                    ['text' => 'Prioridade Máxima de Suporte', 'highlight' => true],
                    ['text' => 'Renovação Anual Automática', 'highlight' => false],
                    ['text' => 'Hospedagem Premium Cloud 24/7', 'highlight' => false],
                    ['text' => 'Certificado SSL + HTTPS Ativo', 'highlight' => false],
                    ['text' => 'Dashboard de Acompanhamento', 'highlight' => false],
                ] as $feature)
                <li class="flex items-center gap-3 text-sm {{ $feature['highlight'] ? 'text-cyan-300 font-semibold' : 'text-gray-300' }}">
                    <svg class="w-4 h-4 text-cyan-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path>
                    </svg>
                    {{ $feature['text'] }}
                </li>
                @endforeach
            </ul>

            <a href="{{ route('checkout', ['plan' => 'annual']) }}"
               class="group/btn relative block w-full text-center overflow-hidden rounded-2xl bg-[#22d3ee] px-6 py-5 text-sm font-black uppercase italic tracking-[0.2em] text-black shadow-[0_0_40px_rgba(34,211,238,0.3)] transition-all hover:scale-[1.02] hover:shadow-[0_0_60px_rgba(34,211,238,0.6)]">
                <span class="relative z-10">Assinar Anual — €2.138,29</span>
                <div class="absolute inset-0 w-[200%] h-full bg-gradient-to-r from-transparent via-white/30 to-transparent -translate-x-full group-hover/btn:animate-[mirrorShine_0.7s_ease-in-out_forwards] pointer-events-none"></div>
            </a>

            <p class="text-center text-gray-700 text-[10px] mt-4 tracking-widest uppercase">
                Checkout seguro via Stripe · Renova automaticamente
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
