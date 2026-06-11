<footer id="skynet-footer" class="relative bg-[#020205] text-white py-20 overflow-hidden border-t border-blue-900/20">
    
    <canvas id="skynet-canvas" class="absolute inset-0 z-0"></canvas>

    <div class="container mx-auto px-6 relative z-10">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-16 items-start">
            
            <div class="lg:col-span-5 space-y-8" data-aos="fade-up">
                <div class="relative group inline-block">
                    <div class="absolute -inset-2 border border-blue-500/50 rounded-full animate-[spin_10s_linear_infinite] border-dashed"></div>
                    <div class="absolute -inset-4 border border-purple-500/30 rounded-full animate-[spin_15s_linear_infinite_reverse] border-dotted"></div>
                    
                    <div class="relative bg-black/40 backdrop-blur-md p-4 rounded-2xl border border-white/10 shadow-[0_0_50px_rgba(59,130,246,0.2)]">
                        <picture>
                            <source srcset="{{ Vite::asset('resources/imgs/logo_otimizada.webp') }}" type="image/webp">
                            <img src="{{ Vite::asset('resources/imgs/logo_otimizada.png') }}" alt="City Of CloudS" loading="lazy" decoding="async" class="w-56 h-auto">
                        </picture>
                    </div>
                </div>
                
                <div class="space-y-4">
                    <h2 class="text-2xl font-black italic tracking-tighter bg-clip-text text-transparent bg-gradient-to-r from-blue-400 via-purple-400 to-blue-600 uppercase">
                        City of Clouds: Engenharia de Software
                    </h2>
                    <div class="relative">
                        <div class="absolute left-0 top-0 h-full w-[2px] bg-gradient-to-b from-blue-500 to-transparent"></div>
                        <p class="pl-6 text-gray-400 text-sm leading-relaxed font-light text-justify">
                            Não somos apenas uma agência ou software house; somos um centro de alta performance técnica. 
                            Nascemos para unir o desenvolvimento de sistemas robustos — de Apps a Desktop — 
                            à estratégia do Marketing Digital e Audiovisual, tudo executado por um time de elite 
                            treinado em nossa própria plataforma para atingir o máximo potencial do seu negócio.
                        </p>
                    </div>
                </div>

                <div class="flex gap-4">
                    @foreach(['facebook', 'instagram', 'linkedin', 'youtube', 'github'] as $social)
                    <a href="#" class="group relative w-12 h-12 flex items-center justify-center bg-white/5 border border-white/10 rounded-xl hover:border-blue-500/50 transition-all duration-500">
                        <div class="absolute inset-0 bg-blue-600/20 blur-lg opacity-0 group-hover:opacity-100 transition-opacity"></div>
                        <img src="https://cdn.jsdelivr.net/npm/simple-icons@v9/icons/{{ $social }}.svg" class="w-5 h-5 invert opacity-70 group-hover:opacity-100 group-hover:scale-110 transition-all" alt="{{ $social }}">
                    </a>
                    @endforeach
                </div>
            </div>

            <div class="lg:col-span-7">
                <div class="grid grid-cols-2 md:grid-cols-4 gap-x-8 gap-y-10">
                    @php
                    $categorias = [
                        'Sistemas' => ['ERP Custom', 'SaaS Core', 'Desktop App', 'Dashboards', 'API Gateway'],
                        'Mobile' => ['iOS Nativo', 'Android SDK', 'Flutter Hub', 'React Native', 'UI/UX Pro'],
                        'Marketing' => ['SEO Global', 'Ads Strategy', 'Copywriting', 'Audiovisual', 'Growth Hacking'],
                        'Ecossistema' => ['Cloud Ops', 'Data Mining', 'Cyber Security', 'IA Neural', 'Suporte Elite']
                    ];
                    @endphp

                    @foreach($categorias as $cat => $links)
                    <div class="space-y-4">
                        <h4 class="text-xs font-bold tracking-[0.2em] text-blue-500 uppercase flex items-center gap-2">
                            <span class="w-2 h-2 bg-blue-500 rounded-full animate-pulse"></span>
                            {{ $cat }}
                        </h4>
                        <ul class="space-y-2">
                            @foreach($links as $link)
                            <li>
                                <a href="#" class="text-gray-500 hover:text-white text-xs font-medium transition-colors duration-300 flex items-center group">
                                    <span class="w-0 group-hover:w-3 h-[1px] bg-blue-500 transition-all mr-0 group-hover:mr-2"></span>
                                    {{ $link }}
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="mt-20 pt-8 border-t border-white/5 flex flex-col md:flex-row justify-between items-center gap-4">
            <span class="text-[10px] font-mono text-gray-600 tracking-[0.3em]">SKYNET PROTOCOL v2.0 - ACTIVE</span>
            <span class="text-[10px] font-mono text-gray-600">© 2026 CITY OF CLOUDS - ALL RIGHTS RESERVED</span>
        </div>
    </div>
</footer>

<script>
class SkynetPortal {
    constructor() {
        this.canvas = document.getElementById('skynet-canvas');
        this.ctx = this.canvas.getContext('2d');
        this.nodes = [];
        this.portalParticles = [];
        this.init();
    }

    init() {
        this.resize();
        window.addEventListener('resize', () => this.resize());
        
        // Criar nós para as linhas pontilhadas
        for(let i=0; i<30; i++) {
            this.nodes.push({
                x: Math.random() * this.canvas.width,
                y: Math.random() * this.canvas.height,
                vx: (Math.random() - 0.5) * 0.5,
                vy: (Math.random() - 0.5) * 0.5
            });
        }
        
        this.animate();
    }

    resize() {
        this.canvas.width = window.innerWidth;
        this.canvas.height = this.canvas.parentElement.offsetHeight;
    }

    drawLines() {
        this.ctx.setLineDash([2, 4]); // Linhas Pontilhadas
        this.ctx.strokeStyle = 'rgba(59, 130, 246, 0.15)';
        this.ctx.lineWidth = 1;

        this.nodes.forEach((node, i) => {
            node.x += node.vx;
            node.y += node.vy;

            if(node.x < 0 || node.x > this.canvas.width) node.vx *= -1;
            if(node.y < 0 || node.y > this.canvas.height) node.vy *= -1;

            this.nodes.slice(i + 1).forEach(other => {
                const dist = Math.hypot(node.x - other.x, node.y - other.y);
                if(dist < 250) {
                    this.ctx.beginPath();
                    this.ctx.moveTo(node.x, node.y);
                    this.ctx.lineTo(other.x, other.y);
                    this.ctx.stroke();
                }
            });
        });
    }

    drawPortal() {
        const time = Date.now() * 0.001;
        const centerX = this.canvas.width * 0.2; // Posição atrás da logo
        const centerY = this.canvas.height * 0.4;

        this.ctx.setLineDash([]); // Reset dash para o portal
        for(let i=0; i<3; i++) {
            const radius = 150 + (i * 40);
            const angle = time * (1 + i * 0.2);
            
            this.ctx.beginPath();
            const grad = this.ctx.createLinearGradient(
                centerX - radius, centerY - radius, 
                centerX + radius, centerY + radius
            );
            grad.addColorStop(0, 'transparent');
            grad.addColorStop(0.5, 'rgba(59, 130, 246, 0.2)');
            grad.addColorStop(1, 'transparent');

            this.ctx.strokeStyle = grad;
            this.ctx.lineWidth = 20;
            this.ctx.arc(centerX, centerY, radius, angle, angle + Math.PI * 1.5);
            this.ctx.stroke();
        }
    }

    animate() {
        this.ctx.clearRect(0, 0, this.canvas.width, this.canvas.height);
        this.drawLines();
        this.drawPortal();
        requestAnimationFrame(() => this.animate());
    }
}

// Inicializa quando o DOM estiver pronto
if(document.getElementById('skynet-canvas')) {
    new SkynetPortal();
}
</script>

<style>
/* Animação extra para a logo */
#skynet-footer .group:hover img {
    filter: drop-shadow(0 0 20px rgba(59, 130, 246, 0.8)) hue-rotate(90deg);
    transition: all 0.8s ease;
}
</style>