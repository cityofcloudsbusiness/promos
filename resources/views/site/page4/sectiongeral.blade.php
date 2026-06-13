<style>
    /* 1. Animação de construção de texto por opacidade e deslocamento */
    @keyframes textAssemble {
        0% { opacity: 0; filter: blur(15px); transform: translateY(30px) scale(0.9); }
        100% { opacity: 1; filter: blur(0); transform: translateY(0) scale(1); }
    }
    .assemble-letter {
        display: inline-block;
        animation: textAssemble 1.4s cubic-bezier(0.16, 1, 0.3, 1) forwards;
    }

    /* 2. Ilusão de Ótica: Rotação concêntrica reversa */
    @keyframes optiRotateClockwise {
        0% { transform: translate(-50%, -50%) rotate(0deg); }
        100% { transform: translate(-50%, -50%) rotate(360deg); }
    }
    @keyframes optiRotateCounter {
        0% { transform: translate(-50%, -50%) rotate(0deg); }
        100% { transform: translate(-50%, -50%) rotate(-360deg); }
    }
    .optic-ring-1 { animation: optiRotateClockwise 50s linear infinite; }
    .optic-ring-2 { animation: optiRotateCounter 35s linear infinite; }
    .optic-ring-3 { animation: optiRotateClockwise 20s linear infinite; }

    /* 3. Efeito de Marquee contínuo para as frases de fundo */
    @keyframes marqueeHorizontal {
        0% { transform: translateX(0%); }
        100% { transform: translateX(-50%); }
    }
    .animate-marquee {
        display: flex;
        width: max-content;
        animation: marqueeHorizontal 35s linear infinite;
    }

    /* 4. Flutuação Orgânica do Mascote */
    @keyframes floatAgent {
        0%, 100% { transform: translateY(0) rotate(0deg); }
        50% { transform: translateY(-12px) rotate(4deg); }
    }
    .animate-agent { animation: floatAgent 4s ease-in-out infinite; }
</style>

<section id="primeira-pagina-surreal" class="relative min-h-screen flex items-center justify-center overflow-hidden bg-[#020205] pt-20">
    
    <div class="absolute inset-0 z-0 pointer-events-none flex items-center justify-center opacity-20">
        <div class="absolute w-[85vw] h-[85vw] max-w-[1100px] max-h-[1100px] border border-cyan-500/20 rounded-full optic-ring-1"></div>
        <div class="absolute w-[65vw] h-[65vw] max-w-[800px] max-h-[800px] border border-dashed border-indigo-500/30 rounded-full optic-ring-2"></div>
        <div class="absolute w-[45vw] h-[45vw] max-w-[550px] max-h-[550px] border border-purple-500/40 rounded-full optic-ring-3 flex items-center justify-center">
            <div class="w-full h-full border border-cyan-400/20 transform rotate-45 scale-75 transition-transform duration-1000 hover:rotate-90"></div>
            <div class="absolute w-full h-full border border-indigo-400/20 transform -rotate-12 scale-90"></div>
        </div>
        <div class="absolute w-full h-full bg-[radial-gradient(circle_at_61.8%_61.8%,_rgba(34,211,238,0.15)_0%,_transparent_60%)]"></div>
    </div>

    <div class="container mx-auto px-6 relative z-10 text-center max-w-5xl">
        
        <div class="mb-8">
            <span class="px-4 py-1.5 rounded-full text-xs font-mono tracking-[0.4em] uppercase bg-white/5 text-cyan-400 border border-white/10 backdrop-blur inline-block mb-6">
                Arquitetura de Alta Performance Operacional
            </span>
            
            <h1 class="text-4xl sm:text-6xl lg:text-8xl font-black uppercase tracking-tighter text-white leading-none">
                <span class="assemble-letter" style="animation-delay: 0.1s;">M</span>
                <span class="assemble-letter" style="animation-delay: 0.15s;">e</span>
                <span class="assemble-letter" style="animation-delay: 0.2s;">n</span>
                <span class="assemble-letter" style="animation-delay: 0.25s;">o</span>
                <span class="assemble-letter" style="animation-delay: 0.3s;">s</span>
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 via-blue-500 to-purple-500 assemble-letter" style="animation-delay: 0.4s;">&nbsp;Custo Fixo.</span><br>
                <span class="assemble-letter" style="animation-delay: 0.5s;">M</span>
                <span class="assemble-letter" style="animation-delay: 0.55s;">a</span>
                <span class="assemble-letter" style="animation-delay: 0.6s;">i</span>
                <span class="assemble-letter" style="animation-delay: 0.65s;">s</span>
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-purple-400 via-indigo-400 to-cyan-400 assemble-letter" style="animation-delay: 0.7s;">&nbsp;Escala.</span>
            </h1>
            
            <h2 class="text-xl sm:text-3xl font-light text-slate-400 tracking-wide mt-6 uppercase max-w-3xl mx-auto leading-snug">
                A Inteligência Artificial multiplica o alcance da sua empresa enquanto zera o trabalho manual de funcionários.
            </h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-left mt-16 border-t border-white/10 pt-12 bg-black/40 backdrop-blur-md p-8 rounded-3xl relative border hover:border-cyan-500/20 transition-all duration-700">
            
            <div class="space-y-3">
                <div class="text-xs font-mono text-cyan-400 font-bold uppercase tracking-widest">01 / Processamento</div>
                <h3 class="text-lg font-bold text-white uppercase">Menos Pessoas, Zero Erros</h3>
                <p class="text-xs text-slate-400 leading-relaxed">
                    Substitua tarefas manuais repetitivas por fluxos matemáticos de computação. A I.A. executa relatórios, faturamentos e análises fiscais sem cansaço, reduzindo drasticamente sua folha de pagamento.
                </p>
            </div>

            <div class="space-y-3 md:border-l md:border-white/10 md:pl-6">
                <div class="text-xs font-mono text-indigo-400 font-bold uppercase tracking-widest">02 / Alcance Absoluto</div>
                <h3 class="text-lg font-bold text-white uppercase">Escala sem Limite Geográfico</h3>
                <p class="text-xs text-slate-400 leading-relaxed">
                    Um único ecossistema inteligente consegue interagir com milhares de dados de mercado e leads simultaneamente. Sua empresa passa a operar em nível global, sem precisar inflar a estrutura física.
                </p>
            </div>

            <div class="space-y-3 md:border-l md:border-white/10 md:pl-6">
                <div class="text-xs font-mono text-purple-400 font-bold uppercase tracking-widest">03 / Hiper-Automação</div>
                <h3 class="text-lg font-bold text-white uppercase">A Empresa Autônoma</h3>
                <p class="text-xs text-slate-400 leading-relaxed">
                    Do atendimento comercial na madrugada até o fechamento de contratos, auditoria de planilhas e otimização de campanhas de tráfego. Toda a sua empresa conectada e blindada por inteligência.
                </p>
            </div>

        </div>

        <div class="mt-12">
            <a href="#bi-preditivo" class="inline-flex items-center gap-2 px-8 py-4 bg-white text-black font-bold uppercase text-xs tracking-widest rounded-full hover:bg-cyan-400 hover:text-black transition-all shadow-xl group">
                Explorar Soluções Corporativas
                <svg class="w-4 h-4 transform group-hover:translate-y-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path></svg>
            </a>
        </div>

    </div>
</section>

<section id="bi-preditivo" class="relative py-28 bg-[#05050a] border-t border-white/5 overflow-hidden">
    
    <div class="absolute inset-0 z-0 pointer-events-none opacity-5">
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[800px] h-[400px] border border-purple-500 transform rotate-12"></div>
    </div>

    <div class="container mx-auto px-6 max-w-7xl relative z-10">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
            
            <div class="space-y-6">
                <span class="text-xs font-mono text-purple-400 font-black uppercase tracking-widest">// Expansão Corporativa 01</span>
                <h2 class="text-3xl md:text-5xl font-black uppercase text-white tracking-tight leading-tight">
                    Previsibilidade de Mercado & <br><span class="text-transparent bg-clip-text bg-gradient-to-r from-purple-400 to-indigo-400">Análise Preditiva de Dados</span>
                </h2>
                <p class="text-sm text-slate-400 leading-relaxed">
                    Antes de tomar qualquer decisão ou investir capital, deixe a matemática calcular os riscos. Cruzamos os algoritmos de I.A. diretamente com o banco de dados das suas vendas, finanças e mercado.
                </p>
                
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 pt-4 font-mono text-xs text-slate-300">
                    <div class="p-4 bg-white/5 rounded-xl border border-white/5 hover:border-purple-500/30 transition-all">
                        <strong class="text-purple-400 block mb-1">➔ Tendência de Compra</strong>
                        Mapeia o comportamento do consumidor e antecipa quais produtos terão picos de demanda.
                    </div>
                    <div class="p-4 bg-white/5 rounded-xl border border-white/5 hover:border-purple-500/30 transition-all">
                        <strong class="text-purple-400 block mb-1">➔ Auditoria Antifalhas</strong>
                        Encontra vazamentos financeiros e gargalos logísticos em planilhas automaticamente.
                    </div>
                </div>
            </div>

            <div class="relative p-8 bg-slate-900/40 border border-white/10 rounded-3xl backdrop-blur group">
                <div class="h-64 flex items-end gap-3 border-b border-l border-white/10 p-4 relative overflow-hidden">
                    <div class="absolute inset-0 bg-gradient-to-t from-purple-500/5 to-transparent"></div>
                    
                    <div class="w-full bg-slate-800 h-[30%] rounded-t transition-all group-hover:h-[75%] duration-1000 bg-gradient-to-t group-hover:from-purple-600 group-hover:to-cyan-400"></div>
                    <div class="w-full bg-slate-800 h-[50%] rounded-t transition-all group-hover:h-[95%] duration-1000 bg-gradient-to-t group-hover:from-purple-600 group-hover:to-cyan-400"></div>
                    <div class="w-full bg-slate-800 h-[40%] rounded-t transition-all group-hover:h-[60%] duration-1000 bg-gradient-to-t group-hover:from-purple-600 group-hover:to-cyan-400"></div>
                    <div class="w-full bg-slate-800 h-[80%] rounded-t transition-all group-hover:h-[100%] duration-1000 bg-gradient-to-t group-hover:from-purple-600 group-hover:to-cyan-400"></div>
                    
                    <div class="absolute top-6 right-6 bg-purple-950/80 border border-purple-500/30 px-3 py-1.5 rounded text-[10px] text-purple-300 font-mono">
                        PROJEÇÃO DE MARGEM DE LUCRO
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<section id="hiper-automacao" class="relative py-28 bg-[#020205] border-t border-white/5 overflow-hidden">
    <div class="container mx-auto px-6 max-w-7xl relative z-10">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
            
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 order-2 lg:order-1 group">
                <div class="p-6 bg-white/5 border border-white/10 rounded-2xl hover:border-cyan-500/40 transition-all duration-500 hover:-translate-y-1">
                    <div class="text-xl mb-2">📄</div>
                    <h4 class="text-white font-bold text-sm uppercase mb-1">Leitura de Notas e Contratos</h4>
                    <p class="text-xs text-slate-400">Varre e interpreta PDFs, extraindo termos jurídicos e valores fiscais sem digitação manual.</p>
                </div>
                <div class="p-6 bg-white/5 border border-white/10 rounded-2xl hover:border-cyan-500/40 transition-all duration-500 hover:-translate-y-1 sm:mt-6">
                    <div class="text-xl mb-2">💻</div>
                    <h4 class="text-white font-bold text-sm uppercase mb-1">Sincronização de ERPs</h4>
                    <p class="text-xs text-slate-400">Alimenta sistemas integrados de gestão (Bling, Omie, CRMs) de forma nativa via API.</p>
                </div>
                <div class="p-6 bg-white/5 border border-white/10 rounded-2xl hover:border-cyan-500/40 transition-all duration-500 hover:-translate-y-1">
                    <div class="text-xl mb-2">📊</div>
                    <h4 class="text-white font-bold text-sm uppercase mb-1">Conciliação de Caixa</h4>
                    <p class="text-xs text-slate-400">Cruza as entradas do banco com notas emitidas para gerar relatórios contábeis na hora.</p>
                </div>
                <div class="p-6 bg-white/5 border border-white/10 rounded-2xl hover:border-cyan-500/40 transition-all duration-500 hover:-translate-y-1 sm:mt-6">
                    <div class="text-xl mb-2">✉</div>
                    <h4 class="text-white font-bold text-sm uppercase mb-1">Cobrança e Renegociação</h4>
                    <p class="text-xs text-slate-400">Detecta contas em atraso e aciona canais de atendimento para recuperação amigável de crédito.</p>
                </div>
            </div>

            <div class="space-y-6 order-1 lg:order-2">
                <span class="text-xs font-mono text-cyan-400 font-black uppercase tracking-widest">// Expansão Corporativa 02</span>
                <h2 class="text-3xl md:text-5xl font-black uppercase text-white tracking-tight leading-tight">
                    Hiper-Automação de <br><span class="text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 to-blue-400">Processos e Burocracias</span>
                </h2>
                <p class="text-sm text-slate-400 leading-relaxed">
                    Elimine gargalos operacionais e reduza custos com pessoal administrativo. Criamos rotinas inteligentes onde sistemas trabalham em segundo plano, executando tarefas corporativas burocráticas com precisão matemática absoluta.
                </p>
                <p class="text-xs text-slate-500 font-mono">
                    > Mais velocidade operacional. Menos falhas por erro humano de digitação.
                </p>
            </div>

        </div>
    </div>
</section>

<section id="ia-hero" class="relative pt-32 pb-24 overflow-hidden bg-[#040409] border-t border-white/5">
    
    <div class="absolute inset-0 z-0 pointer-events-none opacity-5 flex flex-col justify-between py-10 select-none">
        <div class="animate-marquee whitespace-nowrap text-4xl md:text-6xl font-black text-cyan-400 uppercase tracking-widest">
            AUMENTANDO SUAS VENDAS ENQUANTO VOCÊ DORME • ATENDIMENTO HUMANIZADO SEM ERROS • AGENTE VIRTUAL INTEGRADO AO SEU WHATSAPP • ZERO TAXA DE ABANDONO • 
        </div>
        <div class="animate-marquee whitespace-nowrap text-4xl md:text-6xl font-black text-indigo-400 uppercase tracking-widest" style="animation-direction: reverse;">
            INTEGRAÇÃO PERFEITA COM SEU CRM • RESPONDE ÁUDIOS EM SEGUNDOS • SEU NEGÓCIO NA ERA DA INTELIGÊNCIA ARTIFICIAL • DISPONÍVEL 24 HORAS POR DIA • 
        </div>
    </div>

    <div class="container mx-auto px-6 relative z-10">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            
            <div class="text-left">
                <div class="flex flex-wrap gap-2 mb-6">
                    <span class="px-3 py-1 rounded-full text-[10px] font-black tracking-widest uppercase bg-cyan-500/10 text-cyan-400 border border-cyan-500/20 backdrop-blur">
                        ⚡ Expansão Corporativa 03 / Comercial Ativo
                    </span>
                </div>
                
                <h2 class="text-4xl md:text-5xl lg:text-6xl font-black uppercase text-white tracking-tight leading-tight mb-6">
                    Agentes Ativos de Vendas no WhatsApp
                </h2>
                
                <p class="text-slate-300 text-base md:text-lg leading-relaxed mb-8 border-l-4 border-cyan-400 pl-4 bg-white/5 py-3 pr-3 rounded-r-xl">
                    <strong>Explicando de forma simples:</strong> Nós integramos um cérebro virtual inteligente no seu WhatsApp. Ele atende seus clientes, responde mensagens de voz, esclarece dúvidas técnicas sobre seus serviços e agenda reuniões sozinho na sua grade do Google Calendar.
                </p>

                <div class="flex flex-col sm:flex-row gap-4">
                    <a href="{{ route('contact', 'agente-comercial') }}" class="px-8 py-4 bg-gradient-to-r from-cyan-500 to-blue-600 hover:from-cyan-400 hover:to-blue-500 text-white font-bold uppercase text-sm rounded-xl shadow-[0_0_30px_rgba(8,145,178,0.3)] transition-all text-center">
                        Contratar Meu Agente Comercial
                    </a>
                </div>
            </div>

            <div class="w-full">
                <div class="bg-slate-900/80 border border-white/10 rounded-3xl p-4 shadow-[0_0_50px_rgba(8,145,178,0.15)] backdrop-blur">
                    <div id="ia-video-trigger" role="button" aria-label="Abrir vídeo IA em tempo real" class="relative aspect-video rounded-2xl overflow-hidden bg-black border border-white/5 group cursor-pointer">

                        <div class="absolute inset-0 bg-cover bg-center flex items-center justify-center" style="background-image: url('https://images.unsplash.com/photo-1618005182384-a83a8bd57fbe?q=80&w=800');">
                            <div class="absolute inset-0 bg-black/60 group-hover:bg-black/50 transition-all"></div>

                            <div class="relative z-10 w-20 h-20 bg-cyan-500 text-black rounded-full flex items-center justify-center shadow-[0_0_30px_rgba(34,211,238,0.6)] group-hover:scale-110 transition-all">
                                <svg class="w-8 h-8 fill-current ml-1" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                            </div>

                            <div class="absolute bottom-4 left-4 right-4 bg-black/80 backdrop-blur px-4 py-2 rounded-xl border border-white/10 text-center">
                                <p class="text-xs text-cyan-400 font-bold uppercase tracking-wider">▶ Veja a Inteligência Artificial agindo em Tempo Real</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>

    <div id="ia-video-modal" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/90 p-4">
        <div class="relative w-full max-w-5xl">
            <button id="ia-video-close" type="button" class="absolute top-4 right-4 z-20 text-white bg-black/50 rounded-full p-3 hover:bg-black/70 transition">
                <span class="sr-only">Fechar vídeo</span>
                <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
            </button>
            <video id="ia-video-player" class="w-full h-full rounded-3xl shadow-2xl bg-black" controls playsinline preload="metadata">
                <source src="{{ asset('videos/Projeto Shark.mp4') }}" type="video/mp4">
                Seu navegador não suporta o vídeo.
            </video>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const trigger = document.getElementById('ia-video-trigger');
            const modal = document.getElementById('ia-video-modal');
            const video = document.getElementById('ia-video-player');
            const closeButton = document.getElementById('ia-video-close');

            const openModal = () => {
                modal.classList.remove('hidden');
                modal.classList.add('flex');
                video.currentTime = 0;
                video.play().catch(() => {});
                document.body.style.overflow = 'hidden';
            };

            const closeModal = () => {
                video.pause();
                video.currentTime = 0;
                modal.classList.remove('flex');
                modal.classList.add('hidden');
                document.body.style.overflow = '';
            };

            trigger.addEventListener('click', openModal);
            closeButton.addEventListener('click', closeModal);
            modal.addEventListener('click', function (event) {
                if (event.target === modal) closeModal();
            });
            video.addEventListener('ended', closeModal);
        });
    </script>
</section>

<section class="relative py-20 bg-[#020205] border-t border-white/5">
    <div class="container mx-auto px-6 max-w-6xl">
        
        <div class="text-center max-w-3xl mx-auto mb-12">
            <span class="inline-block px-4 py-1 rounded-full text-[10px] font-black tracking-widest uppercase bg-cyan-500/10 text-cyan-400 border border-cyan-500/20 mb-4">
                Transparência Operacional
            </span>
            <h2 class="text-3xl md:text-4xl font-black uppercase text-white tracking-tight">
                Painel do Agente: Como a I.A. Monitora o seu Negócio
            </h2>
        </div>

        <div class="bg-slate-900/50 border border-white/10 rounded-3xl p-6 lg:p-8 backdrop-blur">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <div class="bg-black/40 border border-white/5 p-5 rounded-2xl flex items-center gap-4">
                    <div class="w-12 h-12 rounded-xl bg-green-500/10 border border-green-500/20 flex items-center justify-center text-green-400">●</div>
                    <div>
                        <span class="text-xs text-slate-500 block uppercase font-mono">Status da Operação</span>
                        <strong class="text-white text-sm font-bold">100% Autônoma e Ativa</strong>
                    </div>
                </div>
                <div class="bg-black/40 border border-white/5 p-5 rounded-2xl flex items-center gap-4">
                    <div class="w-12 h-12 rounded-xl bg-cyan-500/10 border border-cyan-500/20 flex items-center justify-center text-cyan-400 font-mono text-xs">99.8%</div>
                    <div>
                        <span class="text-xs text-slate-500 block uppercase font-mono">Precisão das Respostas</span>
                        <strong class="text-white text-sm font-bold">Padrão Humano</strong>
                    </div>
                </div>
                <div class="bg-black/40 border border-white/5 p-5 rounded-2xl flex items-center gap-4">
                    <div class="w-12 h-12 rounded-xl bg-indigo-500/10 border border-indigo-500/20 flex items-center justify-center text-indigo-400 font-mono text-xs">&lt; 3s</div>
                    <div>
                        <span class="text-xs text-slate-500 block uppercase font-mono">Tempo de Resposta</span>
                        <strong class="text-white text-sm font-bold">Imediato (Sem Filas)</strong>
                    </div>
                </div>
            </div>

            <div class="mt-6 bg-black border border-white/10 rounded-2xl p-5 font-mono text-xs text-slate-400">
                <div class="flex items-center justify-between border-b border-white/10 pb-3 mb-3">
                    <span class="text-cyan-400 font-bold flex items-center gap-2">● Fluxo de Processamento Global da Rede Neural</span>
                </div>
                <div class="space-y-2">
                    <div class="flex gap-2"><span class="text-slate-600">[14:22:01]</span> <span class="text-yellow-500">[DATA_ENGINE]</span> <span>Relatório contábil gerado e enviado ao setor fiscal automaticamente.</span></div>
                    <div class="flex gap-2"><span class="text-slate-600">[14:22:03]</span> <span class="text-blue-400">[WHATSAPP]</span> <span>Mensagem de áudio recebida. Transcrita e respondida em 2.1 segundos.</span></div>
                    <div class="flex gap-2"><span class="text-slate-600">[14:22:04]</span> <span class="text-purple-400">[ERP_INTEGRATION]</span> <span>Fatura emitida e dado de baixa de estoque concluída com sucesso.</span></div>
                    <div class="flex gap-2"><span class="text-slate-600">[14:22:05]</span> <span class="text-green-400">[MARKETING]</span> <span>Criativo com baixo desempenho pausado em campanhas de tráfego.</span></div>
                </div>
            </div>
        </div>

    </div>
</section>

<section id="planos-ia" class="relative py-32 border-t border-white/5 bg-gradient-to-b from-[#050508] to-[#020205] overflow-hidden">
    <div class="container mx-auto px-6 relative z-10">
        <div class="text-center max-w-4xl mx-auto mb-16">
            <span class="inline-block px-4 py-1 rounded-full text-[10px] font-black tracking-widest uppercase bg-cyan-500/10 text-cyan-400 border border-cyan-500/20 mb-6">
                Escalabilidade Ilimitada
            </span>
            <h2 class="text-4xl md:text-5xl lg:text-6xl font-black uppercase text-white tracking-tight">
                Escolha o Cérebro da sua <span class="text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 to-indigo-600">Operação</span>
            </h2>
        </div>

        <div class="flex flex-col lg:flex-row justify-center items-center gap-8 max-w-5xl mx-auto">
            <div class="w-full lg:w-5/12 bg-white/5 backdrop-blur-xl border border-white/10 p-8 rounded-3xl relative overflow-hidden group hover:border-cyan-500/30 transition-all">
                <h3 class="text-2xl font-black uppercase text-white mb-2">Agente Starter</h3>
                <p class="text-slate-400 text-xs mb-6 h-8">O funcionário perfeito para recepcionar e tirar dúvidas básicas de clientes locais.</p>
                <div class="flex items-end gap-2 mb-6 border-b border-white/10 pb-6">
                    <span class="text-slate-400 text-xl font-bold">R$</span>
                    <span class="text-5xl font-black text-white tracking-tighter">497<span class="text-2xl">,00</span></span>
                    <span class="text-slate-500 mb-2">/mês</span>
                </div>
                <ul class="space-y-4 mb-10 text-sm text-slate-300 font-medium">
                    <li class="flex items-center gap-3">✓ Atendimento WhatsApp Ilimitado</li>
                    <li class="flex items-center gap-3">✓ Respostas Treinadas do seu Negócio</li>
                    <li class="flex items-center gap-3 opacity-30 line-through">x Automações de Backoffice e BI</li>
                </ul>
                <a href="{{ route('assinar', ['plan' => 'ia-starter']) }}" class="block w-full text-center bg-transparent border-2 border-cyan-500/30 text-white font-bold uppercase py-4 rounded-xl hover:bg-cyan-500 transition-all">
                    Solicitar Agente
                </a>
            </div>

            <div class="w-full lg:w-7/12 bg-[#0a0a0f] border-2 border-cyan-500 p-10 rounded-3xl relative shadow-[0_0_50px_rgba(34,211,238,0.15)] lg:scale-105 z-20">
                <div class="absolute -top-4 right-8 bg-cyan-600 text-white text-[10px] font-black uppercase tracking-widest px-4 py-1.5 rounded-full">
                    Revolução Neural
                </div>
                <h3 class="text-3xl font-black uppercase text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 to-blue-400 mb-2">Operação Autônoma</h3>
                <p class="text-slate-400 text-sm mb-6 h-8">O sistema capaz de gerenciar agendas, qualificar leads e realizar fluxos complexos conectado aos seus softwares.</p>
                <div class="flex items-end gap-2 mb-6 border-b border-cyan-500/20 pb-6">
                    <span class="text-cyan-400 text-xl font-bold">R$</span>
                    <span class="text-6xl font-black text-white tracking-tighter">1.497<span class="text-3xl">,00</span></span>
                    <span class="text-slate-500 mb-2 font-bold">/mês</span>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-10 text-sm text-slate-300 font-bold">
                    <div>✓ Tudo do pacote Starter</div>
                    <div>✓ Análise Preditiva de Dados</div>
                    <div>✓ Automação de ERP & Contratos</div>
                    <div>✓ Campanhas Inteligentes de Tráfego</div>
                </div>
                <a href="{{ route('assinar', ['plan' => 'ia-autonoma']) }}" class="block w-full text-center bg-gradient-to-r from-cyan-600 to-blue-600 text-white font-bold uppercase py-5 rounded-xl shadow-[0_0_30px_rgba(8,145,178,0.4)] transition-all text-lg">
                    Automatizar Minha Empresa
                </a>
            </div>
        </div>
    </div>
</section>

<div class="fixed bottom-6 right-6 z-50 flex items-end gap-3 pointer-events-none">
    <div class="bg-slate-900 border border-cyan-500/40 text-white p-3 rounded-2xl shadow-2xl max-w-[180px] text-left pointer-events-auto backdrop-blur transition-all">
        <p class="text-[11px] font-medium leading-tight text-slate-200">
            👋 Reduzi custos fixos de digitação e potencializei a escala deste layout. Vamos fazer o mesmo pela sua empresa?
        </p>
        <a href="#planos-ia" class="text-[10px] text-cyan-400 font-black block mt-2 uppercase tracking-wider hover:underline">Ver Soluções ➔</a>
    </div>
    <div class="relative w-16 h-16 bg-gradient-to-tr from-cyan-500 to-blue-600 rounded-full flex items-center justify-center shadow-[0_0_20px_rgba(34,211,238,0.4)] pointer-events-auto cursor-pointer border-2 border-cyan-300 animate-agent">
        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h.01M15 9h.01M10 14h4"></path>
        </svg>
        <span class="absolute top-0 right-0 w-3.5 h-3.5 bg-green-400 border-2 border-slate-900 rounded-full"></span>
    </div>
</div>