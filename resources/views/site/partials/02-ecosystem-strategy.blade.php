<section id="estrategia" class="relative bg-black py-24 overflow-hidden">
    
    <div class="absolute inset-0 z-0 pointer-events-none">
        <div class="shape-blob absolute top-1/4 -left-20 w-80 h-80 bg-purple-900/20 rounded-full blur-[120px] animate-pulse"></div>
        <div class="shape-blob absolute bottom-1/4 -right-20 w-80 h-80 bg-blue-900/20 rounded-full blur-[120px] animate-pulse-slow"></div>
    </div>

    <div class="container mx-auto px-6 relative z-10">
        <div class="flex flex-col lg:flex-row items-center gap-16">
            
            <div class="w-full lg:w-1/2" data-aos="fade-right" data-aos-duration="1000">
                <div class="relative group">
                    <div class="absolute -inset-1 bg-gradient-to-r from-purple-600 via-blue-500 to-cyan-400 rounded-2xl blur opacity-30 group-hover:opacity-60 transition duration-1000"></div>
                    
                    <div class="relative bg-gray-900 rounded-2xl overflow-hidden border border-white/10">
                        <img src="{{ asset('images/estrategia-digital.webp') }}" 
                             alt="Análise de Ecossistema Digital e Marketing de Performance" 
                             title="Estratégia de Ecossistema Digital"
                             class="w-full h-auto transform transition duration-700 group-hover:scale-105"
                             loading="lazy"
                             width="600" height="400">
                        
                        <div class="absolute bottom-4 right-4 bg-black/80 backdrop-blur-md p-4 rounded-xl border border-white/10" data-aos="zoom-in" data-aos-delay="500">
                            <p class="text-xs text-blue-400 font-mono uppercase tracking-widest">Status do Sistema</p>
                            <p class="text-white font-bold">Ecossistema Ativo</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="w-full lg:w-1/2 text-white">
                <header data-aos="fade-up">
                    <span class="inline-block px-3 py-1 rounded-full text-xs font-semibold tracking-widest uppercase bg-purple-500/10 text-purple-400 border border-purple-500/20 mb-4">
                        Marketing de Ecossistema
                    </span>
                    <h2 class="text-4xl lg:text-5xl font-extrabold mb-6 leading-tight">
                        Um site isolado é apenas um cartão de visitas. <br>
                        <span class="text-transparent bg-clip-text bg-gradient-to-r from-purple-400 to-blue-400">
                            Nós criamos uma Máquina de Vendas.
                        </span>
                    </h2>
                </header>

                <p class="text-gray-400 text-lg mb-8 leading-relaxed" data-aos="fade-up" data-aos-delay="200">
                    Não adianta ganhar um design premium se ele não conversa com o Google ou com suas redes sociais. Nossa estratégia de <strong>sites gratuitos</strong> foca no que importa: tráfego qualificado e conversão em tempo real.
                </p>

                <ul class="space-y-6" data-aos="fade-up" data-aos-delay="400">
                    <li class="flex items-start gap-4 group">
                        <div class="p-3 bg-white/5 rounded-lg border border-white/10 group-hover:border-purple-500/50 transition-colors">
                            <svg class="w-6 h-6 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold">SEO de Performance Nativo</h3>
                            <p class="text-gray-500 text-sm">O código é estruturado para que o Google te encontre antes dos seus concorrentes.</p>
                        </div>
                    </li>
                    <li class="flex items-start gap-4 group">
                        <div class="p-3 bg-white/5 rounded-lg border border-white/10 group-hover:border-blue-500/50 transition-colors">
                            <svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold">Analytics & Conversão</h3>
                            <p class="text-gray-500 text-sm">Medimos cada clique. Você saberá exatamente de onde vem o lucro.</p>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>

<style>
    /* Animações leves de pulso para o fundo */
    @keyframes pulse-slow {
        0%, 100% { opacity: 0.2; transform: scale(1); }
        50% { opacity: 0.4; transform: scale(1.1); }
    }
    .animate-pulse-slow { animation: pulse-slow 8s ease-in-out infinite; }
</style>