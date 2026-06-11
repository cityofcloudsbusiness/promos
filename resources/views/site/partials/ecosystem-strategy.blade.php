<section id="estrategia-tesseract" class="relative bg-black py-32 overflow-hidden">
    
    <div class="container mx-auto px-6 relative z-10">
        <div class="flex flex-col lg:flex-row items-center gap-16">
            
            <div class="w-full lg:w-1/2 relative min-h-[550px] flex items-center justify-center perspective-1000">
                <div id="tesseract-core" class="relative w-80 h-[450px] transform-style-3d">
                    
                    <canvas id="neon-lines" class="absolute inset-[-100px] z-0 pointer-events-none"></canvas>

                    <div class="absolute inset-0 z-10 overflow-hidden rounded-xl border transition-all duration-100"
                         id="target-image-wrapper"
                         style="opacity: 0; transform: scale(1.3) translateZ(-150px); filter: brightness(0.2) blur(5px);">
                        
                        <picture>
                            <source srcset="{{ Vite::asset('resources/imgs/sec2.webp') }}" type="image/webp">
                            <img src="{{ Vite::asset('resources/imgs/sec2.jpg') }}" alt="Mosaico de telas e programação" loading="lazy" decoding="async" class="w-full h-full object-cover">
                        </picture>
                        
                        <div class="absolute inset-0 bg-cyan-500/20 mix-blend-overlay opacity-0" id="image-glitch"></div>
                    </div>

                    <div class="absolute -right-10 top-1/2 -translate-y-1/2 z-20 space-y-2 opacity-0 transform translate-x-10 transition-all duration-700" id="hud-stats">
                        <div class="bg-black/80 backdrop-blur-md border-l-2 border-cyan-500 p-3 shadow-2xl">
                            <p class="text-[8px] text-cyan-400 font-mono uppercase">Layout</p>
                            <p class="text-white font-bold text-xs tracking-tighter italic">COMPLETO UI/UX</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="w-full lg:w-1/2 text-white">
                <div id="tesseract-text-content">
                    <header class="reveal-item" style="transition-delay: 100ms">
                        <span class="inline-block px-4 py-1 rounded-full text-[10px] font-black tracking-[0.3em] uppercase bg-cyan-500/10 text-cyan-400 border border-cyan-500/20 mb-6">
                            One Page Gratuita agora
                        </span>
                        <h2 class="text-5xl lg:text-6xl font-black mb-8 leading-none italic uppercase tracking-tighter">
                            Sua Presença Digital de Elite <br>
                            <span class="text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 via-blue-500 to-purple-600">
                                Sem o Custo de Desenvolvimento.
                            </span>
                        </h2>
                    </header>

                    <p class="text-slate-400 text-lg mb-10 font-light leading-relaxed max-w-lg reveal-item" style="transition-delay: 300ms">
                        Nós construímos sua One-Page profissional totalmente de graça. Você só assume a manutenção e hospedagem para manter seu negócio no topo.
                    </p>

                    <ul class="space-y-6">
                        <li class="flex items-start gap-4 group reveal-item" style="transition-delay: 500ms">
                            <div class="p-3 bg-white/5 rounded-lg border border-white/10 group-hover:border-cyan-500/50 transition-colors shadow-lg">
                                <svg class="w-6 h-6 text-cyan-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                            </div>
                            <div>
                                <h3 class="text-xl font-bold text-white uppercase italic">SEO de Performance</h3>
                                <p class="text-slate-500 text-xs mt-1">Código estruturado para dominar as buscas do Google.</p>
                            </div>
                        </li>
                        <li class="flex items-start gap-4 group reveal-item" style="transition-delay: 700ms">
                            <div class="p-3 bg-white/5 rounded-lg border border-white/10 group-hover:border-purple-500/50 transition-colors shadow-lg">
                                <svg class="w-6 h-6 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
                            </div>
                            <div>
                                <h3 class="text-xl font-bold text-white uppercase italic">Design de Elite: A Estética que Converte.</h3>
                                <p class="text-slate-500 text-xs mt-1">Unimos UI/UX de alta fidelidade com performance extrema para criar uma experiência digital que coloca sua marca anos-luz à frente da concorrência.</p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    .perspective-1000 { perspective: 1500px; }
    .transform-style-3d { transform-style: preserve-3d; }
    
    /* Animação dos textos da direita */
    .reveal-item {
        opacity: 0;
        transform: translateY(30px);
        transition: all 0.8s cubic-bezier(0.23, 1, 0.32, 1);
    }
    .reveal-item.active {
        opacity: 1;
        transform: translateY(0);
    }
</style>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const section = document.querySelector('#estrategia-tesseract');
    const canvas = document.getElementById('neon-lines');
    const ctx = canvas.getContext('2d');
    const imgWrapper = document.getElementById('target-image-wrapper');
    const reveals = section.querySelectorAll('.reveal-item');
    const hud = document.getElementById('hud-stats');

    function resize() {
        canvas.width = canvas.parentElement.offsetWidth + 200;
        canvas.height = canvas.parentElement.offsetHeight + 200;
    }
    window.addEventListener('resize', resize);
    resize();

    function animate() {
        const rect = section.getBoundingClientRect();
        const windowHeight = window.innerHeight;
        
        // CÁLCULO DE PROGRESSO AJUSTADO:
        // Começa quando a sessão entra na tela (rect.top < windowHeight)
        // Termina quando o centro da sessão chega no centro da tela
        let progress = (windowHeight - rect.top) / (windowHeight * 0.8);
        progress = Math.min(Math.max(progress, 0), 1);

        // 1. MATERIALIZAÇÃO DA IMAGEM (Muito mais rápida)
        // Agora ela atinge 100% de visibilidade muito antes da sessão sumir
        imgWrapper.style.opacity = progress * 1.2; // Chega em 100% mais rápido
        imgWrapper.style.filter = `brightness(${0.2 + progress * 0.8}) blur(${(1 - progress) * 5}px)`;
        imgWrapper.style.transform = `scale(${1.3 - (progress * 0.3)}) translateZ(${(1 - progress) * -150}px) rotateY(${(1 - progress) * 25}deg)`;
        
        if(progress > 0.9) {
            imgWrapper.style.border = "1px solid rgba(34, 211, 238, 0.5)";
            hud.style.opacity = "1";
            hud.style.transform = "translateX(0)";
        }

        // 2. DISPARO DOS TEXTOS (Acontece quando 20% da materialização está pronta)
        if (progress > 0.2) {
            reveals.forEach(el => el.classList.add('active'));
        }

        // 3. DESENHO DO TESSERACT NEON
        ctx.clearRect(0, 0, canvas.width, canvas.height);
        const centerX = canvas.width / 2;
        const centerY = canvas.height / 2;
        const sizeW = 320; 
        const sizeH = 450;
        const depth = (1 - progress) * 150;

        ctx.strokeStyle = `rgba(34, 211, 238, ${0.7 - progress * 0.7})`;
        ctx.lineWidth = 1.5;
        
        const points = [
            [-sizeW/2 - depth, -sizeH/2 - depth], [sizeW/2 + depth, -sizeH/2 - depth],
            [sizeW/2 + depth, sizeH/2 + depth], [-sizeW/2 - depth, sizeH/2 + depth],
            [-sizeW/2, -sizeH/2], [sizeW/2, -sizeH/2],
            [sizeW/2, sizeH/2], [-sizeW/2, sizeH/2]
        ];

        ctx.beginPath();
        for(let i = 0; i < 4; i++) {
            // Linhas de profundidade
            ctx.moveTo(centerX + points[i][0], centerY + points[i][1]);
            ctx.lineTo(centerX + points[i+4][0], centerY + points[i+4][1]);
            // Quadrados Traseiro e Frontal
            ctx.rect(centerX + points[i+4][0] - 1, centerY + points[i+4][1] - 1, 2, 2);
        }
        ctx.stroke();

        requestAnimationFrame(animate);
    }

    animate();
});
</script>