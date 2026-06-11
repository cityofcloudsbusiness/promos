<x-app-layout>
    <div class="py-12 min-h-screen bg-[#0a0a0e] flex items-center justify-center relative overflow-hidden antialiased selection:bg-pink-500 selection:text-white">
        
        <div class="absolute inset-0 z-0 opacity-40 pointer-events-none">
            <div class="absolute top-1/4 left-10 w-[500px] h-[500px] bg-purple-900/30 rounded-full filter blur-[120px] animate-blob"></div>
            <div class="absolute bottom-1/4 right-10 w-[500px] h-[500px] bg-cyan-900/20 rounded-full filter blur-[120px] animate-blob animation-delay-4000"></div>
        </div>

        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 z-10 relative w-full">
            <div class="relative bg-[#12131a]/70 backdrop-blur-3xl border border-white/5 overflow-hidden shadow-[0_0_80px_rgba(0,0,0,0.8)] rounded-[32px] p-8 sm:p-14 text-center">
                
                <div class="absolute inset-0 z-0 opacity-10 pointer-events-none" 
                     style="background-size: 40px 40px; background-image: linear-gradient(to right, #ffffff 1px, transparent 1px), linear-gradient(to bottom, #ffffff 1px, transparent 1px); mask-image: radial-gradient(ellipse at center, black, transparent 80%); -webkit-mask-image: radial-gradient(ellipse at center, black, transparent 80%);">
                </div>

                <div class="relative z-10">
                    <div class="mb-6">
                        <div class="inline-block px-5 py-1.5 rounded-xl border border-purple-500/30 text-purple-300 font-mono text-[11px] tracking-[0.2em] uppercase shadow-[0_0_15px_rgba(168,85,247,0.15)] bg-purple-950/30">
                            Inscrição Prioritária
                        </div>
                    </div>

                    <h2 class="text-5xl sm:text-6xl font-black text-white tracking-wider uppercase mb-3">
                        ACESSO <span class="text-transparent bg-clip-text bg-gradient-to-r from-pink-500 to-purple-500 drop-shadow-[0_0_30px_rgba(236,72,153,0.3)]">TOTAL</span>
                    </h2>
                    
                    <p class="text-gray-400 font-normal tracking-wide text-sm sm:text-base max-w-xl mx-auto mb-10">
                        Desbloqueie a infraestrutura completa e as ferramentas neurais.
                    </p>

                    <div class="grid gap-8 md:grid-cols-2 text-left">
                        
                        <div class="flex flex-col justify-between rounded-[24px] border border-white/5 bg-[#161722]/80 p-8 shadow-[inset_0_1px_1px_rgba(255,255,255,0.05)] hover:border-pink-500/20 transition-all duration-500 relative group/card">
                            <div>
                                <div class="inline-block text-[11px] font-medium tracking-wide text-pink-400 bg-pink-500/10 px-3 py-1 rounded-full mb-6">
                                    Assinatura Recorrente
                                </div>
                                <div class="flex items-start justify-between">
                                    <div class="flex items-baseline gap-1">
                                        <span class="text-5xl font-bold text-white tracking-tight">197</span>
                                    </div>
                                    <div class="flex items-center gap-1.5 bg-pink-500/10 border border-pink-500/20 rounded-full px-2.5 py-1 text-pink-400 text-xs font-semibold">
                                        <span class="w-3 h-3 rounded-full bg-pink-500 flex items-center justify-center text-[8px] text-black font-black">€</span>
                                        /mês
                                    </div>
                                </div>
                                <p class="mt-4 text-gray-400 text-sm leading-relaxed">
                                    Desbloqueie a infraestrutura completa e as ferramentas neurais com manutenção completa e atualizações.
                                </p>
                            </div>
                            
                            <a href="{{ route('checkout') }}" 
                               class="group/btn relative mt-8 inline-flex w-full items-center justify-center overflow-hidden rounded-xl bg-[#ff3399] px-5 py-4 text-sm font-bold uppercase tracking-widest text-white shadow-[0_0_30px_rgba(255,51,153,0.3)] transition-transform duration-300 hover:scale-[1.01] active:scale-95">
                                <span class="relative z-10">Assinar Agora</span>
                                <div class="absolute inset-0 w-[200%] h-full bg-gradient-to-r from-transparent via-white/40 to-transparent -translate-x-full group-hover/btn:animate-mirror-shine pointer-events-none"></div>
                            </a>
                        </div>

                        <div class="flex flex-col justify-between rounded-[24px] border border-white/5 bg-[#161722]/80 p-8 shadow-[inset_0_1px_1px_rgba(255,255,255,0.05)] hover:border-cyan-500/20 transition-all duration-500 relative group/card">
                            <div>
                                <div class="inline-block text-[11px] font-medium tracking-wide text-cyan-400 bg-cyan-500/10 px-3 py-1 rounded-full mb-6">
                                    Assinatura Anual
                                </div>
                                <div class="flex items-start justify-between">
                                    <div class="flex items-baseline gap-1">
                                        <span class="text-5xl font-bold text-white tracking-tight">2.138,29</span>
                                    </div>
                                    <div class="flex items-center gap-1.5 bg-cyan-500/10 border border-cyan-500/20 rounded-full px-2.5 py-1 text-cyan-400 text-xs font-semibold">
                                        <span class="w-3 h-3 rounded-full bg-cyan-400 flex items-center justify-center text-[8px] text-black font-black">€</span>
                                        /ano
                                    </div>
                                </div>
                                <p class="mt-4 text-gray-400 text-sm leading-relaxed">
                                    Desbloqueie a infraestrutura completa e as ferramentas neurais com manutenção completa e atualizações.
                                </p>
                            </div>
                            
                            <a href="{{ route('checkout', ['plan' => 'annual']) }}" 
                               class="group/btn relative mt-8 inline-flex w-full items-center justify-center overflow-hidden rounded-xl bg-[#33ccff] px-5 py-4 text-sm font-bold uppercase tracking-widest text-black shadow-[0_0_30px_rgba(51,204,255,0.25)] transition-transform duration-300 hover:scale-[1.01] active:scale-95">
                                <span class="relative z-10">Assinar Agora</span>
                                <div class="absolute inset-0 w-[200%] h-full bg-gradient-to-r from-transparent via-white/50 to-transparent -translate-x-full group-hover/btn:animate-mirror-shine pointer-events-none"></div>
                            </a>
                        </div>
                    </div>

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
        
        /* Nova animação corrigida para o efeito de espelho passando na luz */
        @keyframes mirrorShine {
            0% { transform: translateX(-100%) skewX(-15deg); }
            100% { transform: translateX(100%) skewX(-15deg); }
        }

        .animate-blob { animation: blob 12s infinite ease-in-out; }
        .animation-delay-4000 { animation-delay: 4s; }
        
        /* Classe utilitária que roda a animação apenas 1 vez por gatilho de hover */
        .animate-mirror-shine {
            animation: mirrorShine 0.75s ease-in-out forwards;
        }
    </style>
</x-app-layout>