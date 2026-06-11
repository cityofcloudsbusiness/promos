<section id="neural-offer" class="relative py-16 bg-slate-950 overflow-hidden" x-data="neuralSectionIsolated()">

    <div class="bg-gamer-layer absolute inset-0 z-0 opacity-40"></div>

    <canvas id="neural-canvas-isolated" class="absolute inset-0 z-10 pointer-events-none opacity-50"></canvas>

    <div class="container mx-auto px-6 relative z-20">

        <div class="text-center mb-8" data-aos="zoom-in">
            <h2 class="text-5xl lg:text-7xl font-black italic uppercase text-white tracking-tighter leading-none">
                Sua Presença <span class="text-transparent bg-clip-text bg-gradient-to-r from-pink-500 to-purple-500">Custa Zero</span>
            </h2>
            <p class="text-slate-400 mt-2 max-w-2xl mx-auto font-mono uppercase tracking-widest text-[10px]">
                Construímos sua elite digital. Você foca no negócio, nós na máquina.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-8 max-w-5xl mx-auto">
            <div class="bg-white/5 border border-pink-500/30 p-5 rounded-2xl backdrop-blur-md transition-all hover:border-pink-500 hover:bg-white/10" data-aos="fade-right">
                <div class="flex items-center mb-2">
                    <span class="text-xl mr-3">🎁</span>
                    <h3 class="text-white font-black uppercase italic text-md">Por que é Grátis?</h3>
                </div>
                <p class="text-slate-400 text-[11px] leading-relaxed">
                    Eliminamos o custo de setup. O nosso lucro vem da sua permanência e sucesso no ecossistema.
                </p>
            </div>

            <div class="bg-white/5 border border-blue-500/30 p-5 rounded-2xl backdrop-blur-md transition-all hover:border-blue-500 hover:bg-white/10" data-aos="fade-left">
                <div class="flex items-center mb-2">
                    <span class="text-xl mr-3">⚙️</span>
                    <h3 class="text-white font-black uppercase italic text-md">A Manutenção</h3>
                </div>
                <p class="text-slate-400 text-[11px] leading-relaxed">
                    Garante hospedagem Business, SSL e suporte prioritário 24h.
                </p>
            </div>
        </div>

        <div id="trigger-animation-area" class="relative flex flex-col items-center justify-center min-h-[550px]">

            <div class="lg:absolute lg:left-0 flex flex-col gap-4 z-40 w-full lg:w-auto">
                <div class="neural-card-iso left bg-white/5 backdrop-blur-xl p-4 border-l-4 border-pink-500 transform -skew-x-12 group/card cursor-help">
                    <h4 class="text-pink-500 font-black uppercase italic text-sm group-hover/card:text-white transition-colors">Setup R$ 0,00</h4>
                    <p class="text-slate-400 text-[10px] mt-1">Desenvolvimento sem taxa inicial.</p>
                </div>
                <div class="neural-card-iso left bg-white/5 backdrop-blur-xl p-4 border-l-4 border-purple-500 transform skew-x-6 group/card cursor-help">
                    <h4 class="text-purple-500 font-black uppercase italic text-sm group-hover/card:text-white transition-colors">Design Conversivo</h4>
                    <p class="text-slate-400 text-[10px] mt-1">Focado em UI/UX de alta conversão.</p>
                </div>
                <div class="neural-card-iso left bg-white/5 backdrop-blur-xl p-4 border-l-4 border-blue-500 transform -skew-x-6 group/card cursor-help">
                    <h4 class="text-blue-500 font-black uppercase italic text-sm group-hover/card:text-white transition-colors">SEO On-Page</h4>
                    <p class="text-slate-400 text-[10px] mt-1">Otimizado para o Google desde o dia 1.</p>
                </div>
                <div class="neural-card-iso left bg-white/5 backdrop-blur-xl p-4 border-l-4 border-cyan-500 transform skew-x-12 group/card cursor-help">
                    <h4 class="text-cyan-500 font-black uppercase italic text-sm group-hover/card:text-white transition-colors">Mobile First</h4>
                    <p class="text-slate-400 text-[10px] mt-1">Velocidade máxima em smartphones.</p>
                </div>
            </div>

            <div id="central-core-iso" class="relative z-30 group my-8 lg:my-0" data-aos="fade-up">
                <div class="absolute -inset-6 bg-gradient-to-r from-pink-600 to-purple-600 rounded-2xl blur-3xl opacity-20 group-hover:opacity-60 transition duration-1000"></div>
                <div class="relative bg-slate-900 p-1.5 rounded-2xl border border-white/10 shadow-[0_0_50px_rgba(139,92,246,0.3)]">
                    <picture>
                        <source srcset="{{ Vite::asset('resources/imgs/sec3.webp') }}" type="image/webp">
                        <img src="{{ Vite::asset('resources/imgs/sec3.jpg') }}" alt="Visual de site moderno com destaque para design e tecnologia" loading="lazy" decoding="async" class="w-[260px] lg:w-[400px] rounded-xl shadow-2xl">
                    </picture>
                </div>
            </div>

            <div class="lg:absolute lg:right-0 flex flex-col gap-4 z-40 w-full lg:w-auto">
                <div class="neural-card-iso right bg-white/5 backdrop-blur-xl p-4 border-r-4 border-indigo-500 transform skew-x-12 group/card cursor-help">
                    <h4 class="text-indigo-500 font-black uppercase italic text-sm group-hover/card:text-white transition-colors">Hospedagem High</h4>
                    <p class="text-slate-400 text-[10px] mt-1">Servidores SSD NVMe ultra velozes.</p>
                </div>
                <div class="neural-card-iso right bg-white/5 backdrop-blur-xl p-4 border-r-4 border-green-500 transform -skew-x-12 group/card cursor-help">
                    <h4 class="text-green-500 font-black uppercase italic text-sm group-hover/card:text-white transition-colors">Suporte Vitalício</h4>
                    <p class="text-slate-400 text-[10px] mt-1">Time pronto para ajustes e correções.</p>
                </div>
                <div class="neural-card-iso right bg-white/5 backdrop-blur-xl p-4 border-r-4 border-yellow-500 transform skew-x-6 group/card cursor-help">
                    <h4 class="text-yellow-500 font-black uppercase italic text-sm group-hover/card:text-white transition-colors">Segurança Ativa</h4>
                    <p class="text-slate-400 text-[10px] mt-1">SSL e proteção DDoS inclusos.</p>
                </div>
                <div class="neural-card-iso right bg-white/5 backdrop-blur-xl p-4 border-r-4 border-red-500 transform -skew-x-6 group/card cursor-help">
                    <h4 class="text-red-500 font-black uppercase italic text-sm group-hover/card:text-white transition-colors">Evolução</h4>
                    <p class="text-slate-400 text-[10px] mt-1">Atualizações mensais de tecnologia.</p>
                </div>
            </div>

        </div>

        <div class="mt-8 text-center relative z-40" data-aos="zoom-in-up">
            <a href="#contato" class="inline-block bg-white text-black font-black px-12 py-4 rounded-full hover:bg-pink-600 hover:text-white transition-all transform hover:scale-110 shadow-[0_0_40px_rgba(255,255,255,0.1)] uppercase italic tracking-widest text-xs">
                Assinar e Ativar Site Grátis
            </a>
        </div>
    </div>
</section>

<style>
    /* Fundo Animado */
    #neural-offer .bg-gamer-layer {
        background: linear-gradient(135deg, #0f172a, #2e1065, #4c0519, #020617);
        background-size: 400% 400%;
        animation: neural-gradient-iso 12s ease infinite;
    }

    /* Cards - Base */
    .neural-card-iso {
        width: 100%;
        max-width: 260px;
        opacity: 0;
        transition: all 0.5s cubic-bezier(0.23, 1, 0.32, 1);
        position: relative;
    }

    /* Efeito de Reação ao Mouse (Hover) */
    .neural-card-iso:hover {
        background: rgba(255, 255, 255, 0.12);
        box-shadow: 0 0 25px rgba(236, 72, 153, 0.2);
        border-color: #fff;
        /* Brilha a borda lateral */
        z-index: 50;
    }

    .neural-card-iso.left {
        transform: translateX(-100px) skewX(-12deg);
    }

    .neural-card-iso.right {
        transform: translateX(100px) skewX(12deg);
    }

    .neural-card-iso.revealed {
        opacity: 1 !important;
        transform: translateX(0) skewX(var(--tw-skew-x, 0)) !important;
    }

    @keyframes neural-gradient-iso {
        0% {
            background-position: 0% 50%;
        }

        50% {
            background-position: 100% 50%;
        }

        100% {
            background-position: 0% 50%;
        }
    }
</style>

<script>
    function neuralSectionIsolated() {
        return {
            init() {
                const container = document.querySelector('#neural-offer');
                const cards = container.querySelectorAll('.neural-card-iso');

                const revealObserver = new IntersectionObserver((entries, observer) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            const card = entry.target;
                            setTimeout(() => card.classList.add('revealed'), Number(card.dataset.revealDelay || 0));
                            observer.unobserve(card);
                        }
                    });
                }, { threshold: 0.2 });

                cards.forEach((card, index) => {
                    card.dataset.revealDelay = index * 30;
                    revealObserver.observe(card);
                });

                const sectionObserver = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            this.sectionVisible = true;
                            this.startCanvas();
                        } else {
                            this.sectionVisible = false;
                            this.stopCanvas();
                        }
                    });
                }, { threshold: 0.15 });

                sectionObserver.observe(container);
                window.addEventListener('revelar-site', () => setTimeout(() => cards.forEach(card => {
                    if (card.getBoundingClientRect().top < window.innerHeight * 0.9) {
                        card.classList.add('revealed');
                    }
                }), 300));

                this.initNeuralWeb(container);
            },
            startCanvas() {
                if (this.animationFrame) return;
                this.animate();
            },
            stopCanvas() {
                if (this.animationFrame) {
                    cancelAnimationFrame(this.animationFrame);
                    this.animationFrame = null;
                }
            },
            initNeuralWeb(parent) {
                const canvas = parent.querySelector('#neural-canvas-isolated');
                const ctx = canvas.getContext('2d');
                const core = parent.querySelector('#central-core-iso');
                const cards = parent.querySelectorAll('.neural-card-iso');

                const resize = () => {
                    canvas.width = parent.offsetWidth;
                    canvas.height = parent.offsetHeight;
                };
                window.addEventListener('resize', resize);
                resize();

                const animate = () => {
                    if (!this.sectionVisible) {
                        this.animationFrame = null;
                        return;
                    }
                    ctx.clearRect(0, 0, canvas.width, canvas.height);
                    const parentRect = parent.getBoundingClientRect();
                    const coreRect = core.getBoundingClientRect();

                    // Ponto Central de origem (X e Y)
                    const startX = (coreRect.left + coreRect.width / 2) - parentRect.left;
                    const startY = (coreRect.top + coreRect.height / 2) - parentRect.top;

                    cards.forEach(card => {
                        if (card.classList.contains('revealed')) {
                            const rect = card.getBoundingClientRect();
                            const isLeft = card.classList.contains('left');

                            // Ponto de destino no Card
                            const endX = (isLeft ? rect.right : rect.left) - parentRect.left;
                            const endY = (rect.top + rect.height / 2) - parentRect.top;

                            ctx.beginPath();
                            ctx.moveTo(startX, startY);

                            // EXPLICAÇÃO DO AJUSTE:
                            // O bezierCurveTo usa (CP1x, CP1y, CP2x, CP2y, endX, endY)
                            // Para "aumentar" o caminho, forçamos o ponto de controle 1 a ir mais para os lados
                            const offsetCurva = isLeft ? -150 : 150; // Aumente esse valor para a linha abrir mais

                            ctx.bezierCurveTo(
                                startX + offsetCurva, startY, // Ponto de controle 1 (sai para o lado)
                                endX - offsetCurva, endY, // Ponto de controle 2 (chega por trás)
                                endX, endY // Destino final no card
                            );

                            // Estilização das Linhas
                            const isHovered = card.matches(':hover');
                            ctx.shadowBlur = isHovered ? 20 : 5; // Aumentei o glow
                            ctx.shadowColor = isHovered ? '#ec4893' : 'rgba(168, 85, 247, 0.5)';

                            const gradient = ctx.createLinearGradient(startX, startY, endX, endY);
                            gradient.addColorStop(0, isHovered ? 'rgba(236, 72, 153, 0.9)' : 'rgba(168, 85, 247, 0.6)');
                            gradient.addColorStop(1, 'transparent'); // Morre suave no card

                            ctx.strokeStyle = gradient;
                            ctx.lineWidth = isHovered ? 3 : 1.8; // Linhas levemente mais grossas

                            // Se quiser linha contínua, remova o setLineDash. 
                            // Para teia gamer, mantive o pontilhado mas com traços maiores:
                            ctx.setLineDash(isHovered ? [] : [10, 5]);

                            ctx.stroke();
                        }
                    });
                    this.animationFrame = requestAnimationFrame(this.animate);
                };
                this.animate();
            }
        }
    }
</script>