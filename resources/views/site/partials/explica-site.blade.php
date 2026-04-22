<section id="neural-offer" class="relative py-12 bg-slate-950 overflow-hidden" x-data="neuralSectionIsolated()">
    
    <div class="bg-gamer-layer absolute inset-0 z-0 opacity-40"></div>
    
    <canvas id="neural-canvas-isolated" class="absolute inset-0 z-10 pointer-events-none opacity-50"></canvas>

    <div class="container mx-auto px-6 relative z-20">
        
        <div class="text-center mb-8" data-aos="zoom-in">
            <h2 class="text-5xl lg:text-7xl font-black italic uppercase text-white tracking-tighter leading-none">
                Sua Presença <span class="text-transparent bg-clip-text bg-gradient-to-r from-pink-500 to-purple-500">Custa Zero</span>
            </h2>
            <p class="text-slate-400 mt-4 max-w-2xl mx-auto font-mono uppercase tracking-widest text-xs">
                Construímos sua elite digital. Você foca no negócio, nós na máquina.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-12 max-w-5xl mx-auto">
            <div class="bg-white/5 border border-pink-500/30 p-6 rounded-2xl backdrop-blur-md transition-all hover:border-pink-500/60" data-aos="fade-right">
                <div class="flex items-center mb-3">
                    <span class="text-2xl mr-3">🎁</span>
                    <h3 class="text-white font-black uppercase italic text-lg">Por que é Grátis?</h3>
                </div>
                <p class="text-slate-400 text-xs leading-relaxed">
                    Nós eliminamos o custo de desenvolvimento (Setup), que no mercado varia entre R$ 3k a R$ 7k. Criamos o design, a estrutura SEO e a copy de conversão sem cobrar um cêntimo de entrada. O nosso lucro vem do seu sucesso a longo prazo e da sua permanência no nosso ecossistema.
                </p>
            </div>

            <div class="bg-white/5 border border-blue-500/30 p-6 rounded-2xl backdrop-blur-md transition-all hover:border-blue-500/60" data-aos="fade-left">
                <div class="flex items-center mb-3">
                    <span class="text-2xl mr-3">⚙️</span>
                    <h3 class="text-white font-black uppercase italic text-lg">A Manutenção Ativa</h3>
                </div>
                <p class="text-slate-400 text-xs leading-relaxed">
                    A única exigência é a assinatura mensal da manutenção. Ela garante: <strong>Hospedagem de Ultra Performance</strong> (Hostinger Business), <strong>Certificado SSL</strong> (Segurança total), <strong>Backups Diários</strong> e suporte técnico prioritário. É o que mantém o seu site rápido, seguro e no topo do Google 24h por dia.
                </p>
            </div>
        </div>

        <div id="trigger-animation-area" class="relative flex flex-col items-center justify-center min-h-[600px]">
            
            <div class="lg:absolute lg:left-0 flex flex-col gap-6 z-40 w-full lg:w-auto">
                <div class="neural-card-iso left bg-white/5 backdrop-blur-xl p-5 border-l-4 border-pink-500 transform -skew-x-12 opacity-0 translate-x-[-50px] transition-all duration-700">
                    <h4 class="text-pink-500 font-black uppercase italic text-sm">Setup R$ 0,00</h4>
                    <p class="text-slate-400 text-[10px] mt-1">Desenvolvimento profissional sem taxa inicial.</p>
                </div>
                <div class="neural-card-iso left bg-white/5 backdrop-blur-xl p-5 border-l-4 border-purple-500 transform skew-x-6 opacity-0 translate-x-[-50px] transition-all duration-700 delay-150">
                    <h4 class="text-purple-500 font-black uppercase italic text-sm">Design Conversivo</h4>
                    <p class="text-slate-400 text-[10px] mt-1">Layouts focados em UI/UX para converter visitantes.</p>
                </div>
                <div class="neural-card-iso left bg-white/5 backdrop-blur-xl p-5 border-l-4 border-blue-500 transform -skew-x-6 opacity-0 translate-x-[-50px] transition-all duration-700 delay-300">
                    <h4 class="text-blue-500 font-black uppercase italic text-sm">SEO On-Page</h4>
                    <p class="text-slate-400 text-[10px] mt-1">Otimizado para o Google desde o primeiro dia.</p>
                </div>
                <div class="neural-card-iso left bg-white/5 backdrop-blur-xl p-5 border-l-4 border-cyan-500 transform skew-x-12 opacity-0 translate-x-[-50px] transition-all duration-700 delay-450">
                    <h4 class="text-cyan-500 font-black uppercase italic text-sm">Mobile First</h4>
                    <p class="text-slate-400 text-[10px] mt-1">Velocidade máxima em smartphones e tablets.</p>
                </div>
            </div>

            <div id="central-core-iso" class="relative z-30 group my-12 lg:my-0" data-aos="fade-up">
                <div class="absolute -inset-6 bg-gradient-to-r from-pink-600 to-purple-600 rounded-2xl blur-3xl opacity-20 group-hover:opacity-40 transition duration-1000"></div>
                <div class="relative bg-slate-900 p-2 rounded-2xl border border-white/10 shadow-[0_0_50px_rgba(139,92,246,0.3)]">
                    <img src="{{ asset('images/one-page-mockup.webp') }}" class="w-[280px] lg:w-[460px] rounded-xl shadow-2xl">
                </div>
                <div class="absolute -top-8 -left-8 bg-pink-600 text-white font-black px-4 py-2 rounded-lg -rotate-12 animate-pulse text-[10px] tracking-tighter shadow-lg">
                    DEVELOPMENT FREE
                </div>
            </div>

            <div class="lg:absolute lg:right-0 flex flex-col gap-6 z-40 w-full lg:w-auto">
                <div class="neural-card-iso right bg-white/5 backdrop-blur-xl p-5 border-r-4 border-indigo-500 transform skew-x-12 opacity-0 translate-x-[50px] transition-all duration-700 delay-200">
                    <h4 class="text-indigo-500 font-black uppercase italic text-sm">Hospedagem High</h4>
                    <p class="text-slate-400 text-[10px] mt-1">Servidores SSD NVMe com uptime de 99.9%.</p>
                </div>
                <div class="neural-card-iso right bg-white/5 backdrop-blur-xl p-5 border-r-4 border-green-500 transform -skew-x-12 opacity-0 translate-x-[50px] transition-all duration-700 delay-350">
                    <h4 class="text-green-500 font-black uppercase italic text-sm">Suporte Vitalício</h4>
                    <p class="text-slate-400 text-[10px] mt-1">Time técnico pronto para ajustes e correções.</p>
                </div>
                <div class="neural-card-iso right bg-white/5 backdrop-blur-xl p-5 border-r-4 border-yellow-500 transform skew-x-6 opacity-0 translate-x-[50px] transition-all duration-700 delay-500">
                    <h4 class="text-yellow-500 font-black uppercase italic text-sm">Segurança Ativa</h4>
                    <p class="text-slate-400 text-[10px] mt-1">Certificados SSL e proteção DDoS inclusos.</p>
                </div>
                <div class="neural-card-iso right bg-white/5 backdrop-blur-xl p-5 border-r-4 border-red-500 transform -skew-x-6 opacity-0 translate-x-[50px] transition-all duration-700 delay-650">
                    <h4 class="text-red-500 font-black uppercase italic text-sm">Evolução Contínua</h4>
                    <p class="text-slate-400 text-[10px] mt-1">Seu site recebe atualizações mensais de tecnologia.</p>
                </div>
            </div>

        </div>

        <div class="mt-8 text-center relative z-40" data-aos="zoom-in-up">
            <a href="#contato" class="inline-block bg-white text-black font-black px-16 py-5 rounded-full hover:bg-pink-600 hover:text-white transition-all transform hover:scale-110 shadow-[0_0_40px_rgba(255,255,255,0.1)] uppercase italic tracking-widest text-sm">
                Assinar e Ativar Site Grátis
            </a>
        </div>
    </div>
</section>

<style>
    /* Estilos isolados por ID */
    #neural-offer .bg-gamer-layer {
        background: linear-gradient(135deg, #0f172a, #2e1065, #4c0519, #020617);
        background-size: 400% 400%;
        animation: neural-gradient-iso 12s ease infinite;
    }

    @keyframes neural-gradient-iso {
        0% { background-position: 0% 50%; filter: hue-rotate(0deg); }
        50% { background-position: 100% 50%; filter: hue-rotate(30deg); }
        100% { background-position: 0% 50%; filter: hue-rotate(0deg); }
    }

    /* Classe ativada pelo JS quando entra no Viewport */
    #neural-offer .neural-card-iso.revealed {
        opacity: 1 !important;
        transform: translate(0, 0) skewX(var(--tw-skew-x, 0)) !important;
    }

    #neural-offer .neural-card-iso {
        width: 100%;
        max-width: 280px;
        transition: all 0.6s cubic-bezier(0.23, 1, 0.32, 1);
    }
</style>

<script>
function neuralSectionIsolated() {
    return {
        revealed: false,
        init() {
            const container = document.querySelector('#neural-offer');
            const triggerArea = document.querySelector('#trigger-animation-area');
            
            // Intersection Observer para disparar animação APENAS quando chegar na área dos cards
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting && !this.revealed) {
                        container.querySelectorAll('.neural-card-iso').forEach(card => {
                            card.classList.add('revealed');
                        });
                        this.revealed = true;
                    }
                });
            }, { threshold: 0.3 }); // 30% da área visível dispara o gatilho

            observer.observe(triggerArea);
            this.initNeuralWeb(container);
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
                ctx.clearRect(0, 0, canvas.width, canvas.height);
                const parentRect = parent.getBoundingClientRect();
                const coreRect = core.getBoundingClientRect();

                const startX = (coreRect.left + coreRect.width / 2) - parentRect.left;
                const startY = (coreRect.top + coreRect.height / 2) - parentRect.top;

                cards.forEach(card => {
                    if(card.classList.contains('revealed')) { // Só desenha a teia se o card estiver visível
                        const rect = card.getBoundingClientRect();
                        const endX = (rect.left + (card.classList.contains('left') ? rect.width : 0)) - parentRect.left;
                        const endY = (rect.top + rect.height / 2) - parentRect.top;

                        ctx.beginPath();
                        ctx.moveTo(startX, startY);
                        ctx.bezierCurveTo(startX, endY, startX, endY, endX, endY);
                        
                        const gradient = ctx.createLinearGradient(startX, startY, endX, endY);
                        gradient.addColorStop(0, 'rgba(168, 85, 247, 0.4)');
                        gradient.addColorStop(1, 'rgba(236, 72, 153, 0)');

                        ctx.strokeStyle = gradient;
                        ctx.lineWidth = 1;
                        ctx.setLineDash([5, 15]);
                        ctx.stroke();
                    }
                });
                requestAnimationFrame(animate);
            };
            animate();
        }
    }
}
</script>