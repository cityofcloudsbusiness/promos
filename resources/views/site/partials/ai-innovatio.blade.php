<section id="ai-innovation" class="relative py-32 overflow-hidden bg-slate-950" x-data="aiNeuralSection()">
    
    <div class="absolute inset-0 z-0 overflow-hidden pointer-events-none">
        <div class="absolute inset-0 animate-rgb-shift bg-gradient-to-br from-purple-900/40 via-slate-950 to-indigo-900/40"></div>
        <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/carbon-fibre.png')] opacity-10"></div>
        <div id="lens-flare" class="absolute w-[600px] h-[600px] bg-purple-600/10 rounded-full blur-[120px] mix-blend-screen"></div>
    </div>

    <div class="container mx-auto px-6 relative z-10">
        <div class="flex flex-col lg:flex-row items-center justify-between gap-16">
            
            <div class="w-full lg:w-1/2 space-y-8 relative z-20">
                <header id="text-header" class="opacity-0 translate-x-[-30px] transition-all duration-1000">
                    <h2 class="text-5xl lg:text-8xl font-black italic uppercase leading-none tracking-tighter text-white">
                        Sua Empresa <br> <span class="text-purple-500 drop-shadow-[0_0_15px_rgba(168,85,247,0.5)]">com i.a</span>
                    </h2>
                    
                    <div class="mt-6 inline-block bg-black/40 border border-purple-500/30 p-4 rounded-lg backdrop-blur-xl">
                        <p class="text-purple-400 font-mono text-sm uppercase tracking-widest flex items-center gap-2">
                            <span class="w-2 h-2 bg-purple-500 rounded-full animate-ping"></span>
                            Status: Sistema Operacional Ativo
                        </p>
                        <div class="text-slate-100 font-mono text-lg mt-2 h-20 md:h-14" id="ai-subtext">
                        </div>
                    </div>
                    <div id="text-underline" class="h-[2px] bg-purple-500 mt-4 w-0 shadow-[0_0_15px_#8b5cf6] transition-all duration-1000"></div>
                </header>

                <div class="grid gap-6">
                    <div class="ai-card opacity-0 translate-y-10 transition-all duration-700 bg-white/5 backdrop-blur-md p-6 rounded-2xl border border-white/10 hover:border-green-500/50 group" style="transition-delay: 100ms;">
                        <div class="flex items-start gap-4">
                            <div class="p-3 bg-green-600/20 rounded-lg group-hover:scale-110 transition-transform">
                                <svg class="w-8 h-8 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z"></path></svg>
                            </div>
                            <div>
                                <h4 class="text-white font-black text-xl uppercase italic">Agentes Autônomos</h4>
                                <p class="text-slate-400 text-sm mt-2">IAs que vendem e agendam reuniões 24h. <span class="text-green-400">Produtividade de 1.000 funcionários com o custo de zero.</span></p>
                            </div>
                        </div>
                    </div>

                    <div class="ai-card opacity-0 translate-y-10 transition-all duration-700 bg-white/5 backdrop-blur-md p-6 rounded-2xl border border-white/10 hover:border-blue-500/50 group" style="transition-delay: 200ms;">
                        <div class="flex items-start gap-4">
                            <div class="p-3 bg-blue-600/20 rounded-lg group-hover:scale-110 transition-transform">
                                <svg class="w-8 h-8 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                            </div>
                            <div>
                                <h4 class="text-white font-black text-xl uppercase italic">Cérebro de Operação</h4>
                                <p class="text-slate-400 text-sm mt-2">Processamento de dados e relatórios sem intervenção humana. <span class="text-blue-400">Elimine o erro humano e custos operacionais.</span></p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-8 ai-card opacity-0 translate-y-10 transition-all duration-700" style="transition-delay: 500ms;">
                    <a href="{{ route('contact', 'arquiteto-ia') }}" class="group relative inline-flex items-center justify-center bg-purple-600 hover:bg-purple-500 text-white font-black px-10 py-5 rounded-full transition-all hover:scale-110 shadow-[0_0_30px_rgba(168,85,247,0.5)] uppercase italic tracking-widest">
                        <span>Falar com um Arquiteto de IA</span>
                        <svg class="w-6 h-6 ml-3 transform group-hover:translate-x-2 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M13 7l5 5m0 0l-5 5m5-5H6"></path></svg>
                    </a>
                </div>
            </div>

            <div class="w-full lg:w-1/2 flex justify-center items-center relative h-[500px]">
                <svg class="absolute w-[480px] h-[480px] z-30 pointer-events-none" viewBox="0 0 500 500">
                    <path id="hex-path" d="M125,50 L375,50 L475,250 L375,450 L125,450 L25,250 Z" fill="none" stroke="#a855f7" stroke-width="3" stroke-dasharray="1600" stroke-dashoffset="1600" class="transition-all duration-[1500ms] ease-in-out drop-shadow-[0_0_10px_#8b5cf6]" />
                </svg>

                <div id="hex-grid" class="relative w-[400px] h-[400px] z-10" style="clip-path: polygon(22% 6%, 78% 6%, 100% 50%, 78% 94%, 22% 94%, 0% 50%);" @mouseenter="expandHex()" @mouseleave="retractHex()">
                    <div class="quad absolute top-0 left-0 w-1/2 h-1/2 overflow-hidden opacity-0 scale-90 transition-all duration-1000">
                        <picture>
                        <source srcset="{{ Vite::asset('resources/imgs/sec9/sec91.webp') }}" type="image/webp">
                        <img src="{{ Vite::asset('resources/imgs/sec9/sec91.jpg') }}" alt="Ilustração de inteligência artificial em rede" loading="lazy" decoding="async" class="w-full h-full object-cover grayscale brightness-50 transition-all duration-700">
                    </picture>
                        <div class="absolute inset-0 bg-gradient-to-br from-purple-600/40 to-transparent"></div>
                    </div>
                    <div class="quad absolute top-0 right-0 w-1/2 h-1/2 overflow-hidden opacity-0 scale-90 transition-all duration-1000">
                        <picture>
                        <source srcset="{{ Vite::asset('resources/imgs/sec9/sec94.webp') }}" type="image/webp">
                        <img src="{{ Vite::asset('resources/imgs/sec9/sec94.png') }}" alt="Imagem abstrata de tecnologia e inovação" loading="lazy" decoding="async" class="w-full h-full object-cover grayscale brightness-50 transition-all duration-700">
                    </picture>
                        <div class="absolute inset-0 bg-gradient-to-bl from-blue-600/40 to-transparent"></div>
                    </div>
                    <div class="quad absolute bottom-0 left-0 w-1/2 h-1/2 overflow-hidden opacity-0 scale-90 transition-all duration-1000">
                        <picture>
                        <source srcset="{{ Vite::asset('resources/imgs/sec9/sec93.webp') }}" type="image/webp">
                        <img src="{{ Vite::asset('resources/imgs/sec9/sec93.png') }}" alt="Visual de nuvem digital e gráficos" loading="lazy" decoding="async" class="w-full h-full object-cover grayscale brightness-50 transition-all duration-700">
                    </picture>
                        <div class="absolute inset-0 bg-gradient-to-tr from-purple-600/40 to-transparent"></div>
                    </div>
                    <div class="quad absolute bottom-0 right-0 w-1/2 h-1/2 overflow-hidden opacity-0 scale-90 transition-all duration-1000">
                        <picture>
                        <source srcset="{{ Vite::asset('resources/imgs/sec9/sec92.webp') }}" type="image/webp">
                        <img src="{{ Vite::asset('resources/imgs/sec9/sec92.jpg') }}" alt="Painel digital de análise e dados" loading="lazy" decoding="async" class="w-full h-full object-cover grayscale brightness-50 transition-all duration-700">
                    </picture>
                        <div class="absolute inset-0 bg-gradient-to-tl from-indigo-600/40 to-transparent"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    /* Classes de auxílio para o JS disparar */
    .quad.show { opacity: 1 !important; scale: 1 !important; }
    @keyframes rgb-shift {
        0% { filter: hue-rotate(0deg); }
        100% { filter: hue-rotate(360deg); }
    }
    .animate-rgb-shift { animation: rgb-shift 15s linear infinite; }
</style>

<script>
function aiNeuralSection() {
    return {
        revealed: false,
        container: null,
        // TEXTOS ATUALIZADOS: Mais agressivos e focados em automação/lucro
        subtextLines: [
            "Integrando Inteligência Artificial na sua empresa...",
            "Automatizando processos para reduzir sua folha de pagamento...",
            "Substituindo tarefas repetitivas por algoritmos neurais...",
            "Menos custos com funcionários, mais escala no seu negócio.",
            "Treinando sua IA personalizada em tempo real..."
        ],

        init() {
            this.container = document.getElementById('ai-innovation');
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting && !this.revealed) {
                        this.triggerNeuralAnimation();
                        this.startTypewriter();
                        this.revealed = true;
                    }
                });
            }, { threshold: 0.2 }); 

            observer.observe(this.container);
        },

        startTypewriter() {
            const el = this.container.querySelector('#ai-subtext');
            let lineIndex = 0;
            let charIndex = 0;
            let isDeleting = false;

            const type = () => {
                const currentLine = this.subtextLines[lineIndex];
                
                if (!isDeleting) {
                    el.innerHTML = currentLine.substring(0, charIndex + 1) + '<span class="animate-pulse text-purple-500">|</span>';
                    charIndex++;
                    
                    if (charIndex === currentLine.length) {
                        isDeleting = true;
                        setTimeout(type, 2500); // Pausa no final da frase
                    } else {
                        setTimeout(type, 50);
                    }
                } else {
                    el.innerHTML = currentLine.substring(0, charIndex - 1) + '<span class="animate-pulse text-purple-500">|</span>';
                    charIndex--;
                    
                    if (charIndex === 0) {
                        isDeleting = false;
                        lineIndex = (lineIndex + 1) % this.subtextLines.length;
                        setTimeout(type, 500);
                    } else {
                        setTimeout(type, 30);
                    }
                }
            };
            type();
        },

        triggerNeuralAnimation() {
            const root = this.container;
            
            // Desenha o hexágono
            const hexPath = root.querySelector('#hex-path');
            if(hexPath) hexPath.style.strokeDashoffset = "0";
            
            // Revela Título
            const header = root.querySelector('#text-header');
            if(header) header.classList.add('opacity-100', 'translate-x-0');

            // Linha sublinhada
            const underline = root.querySelector('#text-underline');
            if(underline) underline.style.width = "100%";

            // Revela Quads (Imagens) com delay individual
            root.querySelectorAll('.quad').forEach((q, i) => {
                setTimeout(() => q.classList.add('show'), 500 + (i * 200));
            });

            // Revela Cards
            root.querySelectorAll('.ai-card').forEach((card, i) => {
                setTimeout(() => card.classList.add('opacity-100', 'translate-y-0'), 800 + (i * 200)); 
            });
        },
        
        expandHex() {
            const dists = ['translate(-20px,-20px)', 'translate(20px,-20px)', 'translate(-20px,20px)', 'translate(20px,20px)'];
            this.container.querySelectorAll('.quad').forEach((q, i) => {
                q.style.transform = (dists[i] || '') + ' scale(1.1)';
                q.style.zIndex = "40";
                const img = q.querySelector('img');
                if(img) {
                    img.style.filter = 'grayscale(0) brightness(1.1)';
                }
            });
        },

        retractHex() {
            this.container.querySelectorAll('.quad').forEach(q => {
                q.style.transform = 'translate(0,0) scale(1)';
                q.style.zIndex = "10";
                const img = q.querySelector('img');
                if(img) {
                    img.style.filter = 'grayscale(1) brightness(0.5)';
                }
            });
        }
    }
}
</script>