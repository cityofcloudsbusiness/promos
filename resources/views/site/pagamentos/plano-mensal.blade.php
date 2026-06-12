<x-app-layout>
<div class="min-h-screen bg-black flex items-center justify-center py-24 px-6 relative overflow-hidden antialiased">

    <div class="absolute inset-0 z-0 pointer-events-none">
        <div class="absolute top-1/4 left-1/2 -translate-x-1/2 w-[800px] h-[800px] bg-pink-900/15 rounded-full blur-[180px]"></div>
        <div class="absolute bottom-0 right-0 w-[400px] h-[400px] bg-purple-900/10 rounded-full blur-[120px]"></div>
        <div class="absolute inset-0" style="background-image: radial-gradient(circle at 50% 0%, rgba(236,72,153,0.04) 0%, transparent 60%);"></div>
    </div>

    <div class="relative z-10 w-full max-w-lg mx-auto">

        <a href="{{ route('subscribeWebM') }}"
           class="inline-flex items-center gap-2 text-gray-600 hover:text-white text-[10px] uppercase tracking-[0.35em] mb-12 transition-colors group">
            <svg class="w-3 h-3 group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
            Ver todos os planos
        </a>

        <div class="bg-[#0d0e14]/90 backdrop-blur-3xl rounded-[32px] border border-pink-500/15 p-10 shadow-[0_0_120px_rgba(236,72,153,0.08)]">

            <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full border border-pink-500/25 bg-pink-500/8 text-pink-400 text-[10px] font-bold tracking-[0.3em] uppercase mb-8">
                <span class="w-1.5 h-1.5 bg-pink-500 rounded-full animate-pulse"></span>
                Plano Mensal
            </div>

            <div class="mb-8">
                <div class="flex items-baseline gap-1">
                    <span class="text-pink-400 text-2xl font-bold mr-1">€</span>
                    <span class="text-8xl font-black text-white tracking-tighter leading-none">197</span>
                    <div class="ml-2 pb-1">
                        <p class="text-gray-400 text-sm font-medium">/mês</p>
                        <p class="text-gray-600 text-[10px] uppercase tracking-widest">renovação automática</p>
                    </div>
                </div>
                <p class="text-gray-500 text-sm mt-3">Sem fidelidade. Cancele quando quiser.</p>
            </div>

            <div class="h-px bg-gradient-to-r from-transparent via-pink-500/20 to-transparent mb-8"></div>

            <ul class="space-y-4 mb-10">
                @foreach([
                    'Site Profissional Personalizado',
                    'Hospedagem Premium Cloud 24/7',
                    'Certificado SSL + HTTPS Ativo',
                    'Suporte Técnico Mensal',
                    'Atualizações e Correções de Código',
                    'Dashboard de Acompanhamento do Projeto',
                ] as $feature)
                <li class="flex items-center gap-3 text-gray-300 text-sm">
                    <svg class="w-4 h-4 text-pink-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path>
                    </svg>
                    {{ $feature }}
                </li>
                @endforeach
            </ul>

            <a href="{{ route('checkout', ['plan' => 'monthly']) }}"
               class="group/btn relative block w-full text-center overflow-hidden rounded-2xl bg-[#ff3399] px-6 py-5 text-sm font-black uppercase italic tracking-[0.2em] text-white shadow-[0_0_40px_rgba(255,51,153,0.3)] transition-all hover:scale-[1.02] hover:shadow-[0_0_60px_rgba(255,51,153,0.5)]">
                <span class="relative z-10">Assinar Agora — €197/mês</span>
                <div class="absolute inset-0 w-[200%] h-full bg-gradient-to-r from-transparent via-white/20 to-transparent -translate-x-full group-hover/btn:animate-[mirrorShine_0.7s_ease-in-out_forwards] pointer-events-none"></div>
            </a>

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
