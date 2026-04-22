<section id="ai-innovation" class="relative py-32 overflow-hidden bg-slate-950" x-data="aiNeuralSection()">
    
    <div class="absolute inset-0 z-0 overflow-hidden pointer-events-none">
        <div class="absolute inset-0 animate-rgb-shift bg-gradient-to-br from-purple-900/40 via-slate-950 to-indigo-900/40"></div>
        
        <div class="absolute top-20 left-[10%] w-4 h-4 bg-purple-500 rounded-full animate-ping opacity-20"></div>
        <div class="absolute bottom-40 left-[5%] text-purple-600/20 text-6xl font-black animate-float-slow select-none">AI</div>
        <div class="absolute top-1/2 right-[10%] w-20 h-20 border border-purple-500/10 rotate-45 animate-spin-slow"></div>
        
        <div id="lens-flare" class="absolute w-[600px] h-[600px] bg-purple-600/10 rounded-full blur-[120px] mix-blend-screen"></div>
    </div>

    <div class="container mx-auto px-6 relative z-10">
        <div class="flex flex-col lg:flex-row items-center justify-between gap-16">
            
            <div class="w-full lg:w-1/2 space-y-8 relative z-20">
                <header id="text-header" class="opacity-0 translate-x-[-30px] transition-all duration-1000">
                    <h2 class="text-5xl lg:text-7xl font-black italic uppercase leading-none tracking-tighter text-white">
                        Crie Sua <br> <span class="text-purple-500 drop-shadow-[0_0_15px_rgba(168,85,247,0.5)]">Propria I.A</span>
                    </h2>
                    <div id="text-underline" class="h-[3px] bg-purple-500 mt-4 w-0 shadow-[0_0_15px_#8b5cf6] transition-all duration-1000"></div>
                </header>

                <div class="grid gap-6">
                    <div class="ai-card opacity-0 translate-y-10 transition-all duration-700 bg-white/5 backdrop-blur-md p-6 rounded-2xl border border-white/10 hover:border-purple-500/50 group" style="transition-delay: 200ms;">
                        <div class="flex items-start gap-4">
                            <div class="p-3 bg-purple-600/20 rounded-lg animate-pulse">
                                <svg class="w-6 h-6 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path></svg>
                            </div>
                            <div>
                                <h4 class="text-white font-bold text-xl uppercase italic">Atendimento WhatsApp 4.0</h4>
                                <p class="text-slate-400 text-sm mt-2">Agentes treinados no seu banco de dados que vendem e agendam sem intervenção humana 24/7.</p>
                            </div>
                        </div>
                    </div>

                    <div class="ai-card opacity-0 translate-y-10 transition-all duration-700 bg-white/5 backdrop-blur-md p-6 rounded-2xl border border-white/10 hover:border-blue-500/50 group" style="transition-delay: 400ms;">
                        <div class="flex items-start gap-4">
                            <div class="p-3 bg-blue-600/20 rounded-lg">
                                <svg class="w-6 h-6 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0"></path></svg>
                            </div>
                            <div>
                                <h4 class="text-white font-bold text-xl uppercase italic">Otimização de Logística</h4>
                                <p class="text-slate-400 text-sm mt-2">I.A. preditiva que reduz rotas, prevê falta de estoque e automatiza a cadeia de suprimentos.</p>
                            </div>
                        </div>
                    </div>

                    <div class="ai-card opacity-0 translate-y-10 transition-all duration-700 bg-white/5 backdrop-blur-md p-6 rounded-2xl border border-white/10 hover:border-blue-500/50 group" style="transition-delay: 400ms;">
                        <div class="flex items-start gap-4">
                            <div class="p-3 bg-blue-600/20 rounded-lg">
                                <svg class="w-6 h-6 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0"></path></svg>
                            </div>
                            <div>
                                <h4 class="text-white font-bold text-xl uppercase italic">Otimização de Logística</h4>
                                <p class="text-slate-400 text-sm mt-2">I.A. preditiva que reduz rotas, prevê falta de estoque e automatiza a cadeia de suprimentos.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="w-full lg:w-1/2 flex justify-center items-center relative h-[500px]">
                <svg class="absolute w-[480px] h-[480px] z-30 pointer-events-none" viewBox="0 0 500 500">
                    <path id="hex-path" d="M125,50 L375,50 L475,250 L375,450 L125,450 L25,250 Z" fill="none" stroke="#a855f7" stroke-width="3" stroke-dasharray="1600" stroke-dashoffset="1600" class="transition-all duration-[1500ms] ease-in-out drop-shadow-[0_0_10px_#8b5cf6]" />
                    <line id="connecting-line" x1="25" y1="250" x2="25" y2="250" stroke="#a855f7" stroke-width="2" class="transition-all duration-1000" />
                </svg>

                <div id="hex-grid" class="relative w-[400px] h-[400px] z-10" style="clip-path: polygon(22% 6%, 78% 6%, 100% 50%, 78% 94%, 22% 94%, 0% 50%);" @mouseenter="expandHex()" @mouseleave="retractHex()">
                    <div class="quad absolute top-0 left-0 w-1/2 h-1/2 overflow-hidden opacity-0 scale-90 transition-all duration-1000 delay-500">
                        <img src="{{ asset('imgs/cidade.jpg') }}" class="w-full h-full object-cover grayscale brightness-50">
                        <div class="absolute inset-0 bg-gradient-to-br from-purple-600/40 to-transparent"></div>
                    </div>
                    <div class="quad absolute top-0 right-0 w-1/2 h-1/2 overflow-hidden opacity-0 scale-90 transition-all duration-1000 delay-700">
                        <img src="{{ asset('imgs/cidade.jpg') }}" class="w-full h-full object-cover grayscale brightness-50">
                        <div class="absolute inset-0 bg-gradient-to-bl from-blue-600/40 to-transparent"></div>
                    </div>
                    <div class="quad absolute bottom-0 left-0 w-1/2 h-1/2 overflow-hidden opacity-0 scale-90 transition-all duration-1000 delay-900">
                        <img src="{{ asset('imgs/cidade.jpg') }}" class="w-full h-full object-cover grayscale brightness-50">
                        <div class="absolute inset-0 bg-gradient-to-tr from-purple-600/40 to-transparent"></div>
                    </div>
                    <div class="quad absolute bottom-0 right-0 w-1/2 h-1/2 overflow-hidden opacity-0 scale-90 transition-all duration-1000 delay-1100">
                        <img src="{{ asset('imgs/cidade.jpg') }}" class="w-full h-full object-cover grayscale brightness-50">
                        <div class="absolute inset-0 bg-gradient-to-tl from-indigo-600/40 to-transparent"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<style>
    @keyframes rgb-shift {
        0%, 100% { filter: hue-rotate(0deg) contrast(1.1); }
        50% { filter: hue-rotate(30deg) contrast(1.3); }
    }
    #ai-innovation .animate-rgb-shift { animation: rgb-shift 15s ease-in-out infinite; }
    
    @keyframes float-slow {
        0%, 100% { transform: translateY(0) rotate(0); }
        50% { transform: translateY(-20px) rotate(5deg); }
    }
    #ai-innovation .animate-float-slow { animation: float-slow 8s ease-in-out infinite; }

    /* Garante que a transição de escala e opacidade funcione via JS */
    #ai-innovation .quad { transition: all 0.8s cubic-bezier(0.4, 0, 0.2, 1); opacity: 0; transform: scale(0.9); }
    #ai-innovation .quad.show { opacity: 1; transform: scale(1); }
</style>

<script>
function aiNeuralSection() {
    return {
        revealed: false,
        // Referência interna para o container principal
        container: null,

        init() {
            this.container = document.getElementById('ai-innovation');
            
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting && !this.revealed) {
                        this.triggerNeuralAnimation();
                        this.revealed = true;
                    }
                });
            }, { threshold: 0.3 }); // Threshold ajustado para disparar um pouco antes

            observer.observe(this.container);

            // Lens Flare Follow - Limitado ao movimento dentro da seção ou efeito sutil
            const flare = this.container.querySelector('#lens-flare');
            if(flare) {
                window.addEventListener('mousemove', (e) => {
                    // Verifica se o mouse está na viewport para mover o flare de forma relativa
                    const x = (e.clientX / window.innerWidth) * 40;
                    const y = (e.clientY / window.innerHeight) * 40;
                    flare.style.transform = `translate(${x}px, ${y}px)`;
                });
            }
        },

        triggerNeuralAnimation() {
            const root = this.container;

            // Desenha o hexágono (Stroke Dash)
            const hexPath = root.querySelector('#hex-path');
            if(hexPath) hexPath.style.strokeDashoffset = "0";
            
            // Aparece as imagens com fade progressivo dentro desta seção
            const quads = root.querySelectorAll('.quad');
            quads.forEach((q, i) => {
                setTimeout(() => q.classList.add('show'), i * 150);
            });

            // Desenha a linha para o texto e underline
            setTimeout(() => {
                const line = root.querySelector('#connecting-line');
                const underline = root.querySelector('#text-underline');
                if(line) line.setAttribute('x2', '-800');
                if(underline) underline.style.width = "100%";
            }, 1200);

            // Revela o cabeçalho e os cards em cascata (apenas os desta seção)
            const header = root.querySelector('#text-header');
            if(header) {
                setTimeout(() => header.classList.add('opacity-100', 'translate-x-0'), 1500);
            }

            root.querySelectorAll('.ai-card').forEach((card, i) => {
                setTimeout(() => card.classList.add('opacity-100', 'translate-y-0'), 1800 + (i * 300));
            });
        },

        expandHex() {
            const root = this.container;
            const dists = ['translate(-15px,-15px)', 'translate(15px,-15px)', 'translate(-15px,15px)', 'translate(15px,15px)'];
            
            root.querySelectorAll('.quad').forEach((q, i) => {
                q.style.transform = (dists[i] || 'translate(0,0)') + ' scale(1.05)';
                const img = q.querySelector('img');
                if(img) img.style.filter = 'grayscale(0) brightness(1.2)';
            });
        },

        retractHex() {
            const root = this.container;
            root.querySelectorAll('.quad').forEach(q => {
                q.style.transform = 'translate(0,0) scale(1)';
                const img = q.querySelector('img');
                if(img) img.style.filter = 'grayscale(1) brightness(0.5)';
            });
        }
    }
}
</script>