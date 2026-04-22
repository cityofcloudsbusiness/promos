<section id="marketing-elite" class="relative py-32 bg-white overflow-hidden">
    <div class="absolute top-0 right-0 w-1/3 h-full bg-purple-50/50 -skew-x-12 translate-x-1/2"></div>

    <div class="container mx-auto px-6 relative z-10">
        <div class="flex flex-col lg:flex-row gap-16 items-start">
            
            <div class="w-full lg:w-1/2 grid grid-cols-12 gap-3 h-[600px] relative" id="mosaico-marketing">
                <div class="col-span-8 h-64 rounded-2xl overflow-hidden shadow-xl transform transition-all duration-700 hover:scale-105 hover:z-20 cursor-none" data-aos="fade-right">
                    <img src="{{ asset('imgs/mkt-1.jpg') }}" class="w-full h-full object-cover grayscale hover:grayscale-0 transition-all">
                </div>
                <div class="col-span-4 h-64 rounded-2xl overflow-hidden shadow-xl mt-12 transform transition-all duration-700 hover:scale-105 hover:z-20 cursor-none" data-aos="fade-down" data-aos-delay="200">
                    <img src="{{ asset('imgs/mkt-2.jpg') }}" class="w-full h-full object-cover grayscale hover:grayscale-0 transition-all">
                </div>
                <div class="col-span-5 h-72 -mt-10 rounded-2xl overflow-hidden shadow-xl transform transition-all duration-700 hover:scale-105 hover:z-20 cursor-none" data-aos="fade-up" data-aos-delay="400">
                    <img src="{{ asset('imgs/mkt-3.jpg') }}" class="w-full h-full object-cover grayscale hover:grayscale-0 transition-all">
                </div>
                <div class="col-span-7 h-72 -mt-4 rounded-2xl overflow-hidden shadow-xl transform transition-all duration-700 hover:scale-105 hover:z-20 cursor-none" data-aos="fade-left" data-aos-delay="600">
                    <img src="{{ asset('imgs/mkt-4.jpg') }}" class="w-full h-full object-cover grayscale hover:grayscale-0 transition-all">
                </div>
            </div>

            <div class="w-full lg:w-1/2 space-y-10">
                <div data-aos="fade-left">
                    <h2 class="text-5xl font-black italic uppercase text-slate-900 leading-none">
                        Turbine sua <br><span class="text-purple-600">Presença Digital</span>
                    </h2>
                    <p class="text-slate-500 mt-6 text-lg">
                        O seu site é a vitrine, mas o Marketing é o que traz os clientes. Oferecemos planos estratégicos para quem deseja **escala real**. 
                        <span class="block mt-2 font-bold text-purple-600 italic">*Serviço adicional sob consulta.</span>
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    
                    <div class="mkt-card group relative p-8 bg-white shadow-sm overflow-hidden" data-aos="zoom-in" data-aos-delay="100">
                        <div class="relative z-10">
                            <h4 class="font-black uppercase text-purple-600 mb-2">Tráfego Pago</h4>
                            <p class="text-sm text-slate-500">Google Ads e Meta Ads focados em conversão imediata e ROI positivo.</p>
                        </div>
                    </div>

                    <div class="mkt-card group relative p-8 bg-white shadow-sm overflow-hidden" data-aos="zoom-in" data-aos-delay="200">
                        <div class="relative z-10">
                            <h4 class="font-black uppercase text-purple-600 mb-2">Social Media</h4>
                            <p class="text-sm text-slate-500">Gestão de conteúdo e autoridade. Nós cuidamos de tudo para você brilhar.</p>
                        </div>
                    </div>

                    <div class="mkt-card group relative p-8 bg-white shadow-sm overflow-hidden" data-aos="zoom-in" data-aos-delay="300">
                        <div class="relative z-10">
                            <h4 class="font-black uppercase text-purple-600 mb-2">SEO Avançado</h4>
                            <p class="text-sm text-slate-500">Apareça na primeira página do Google sem pagar por clique. Estratégia de longo prazo.</p>
                        </div>
                    </div>

                    <div class="mkt-card group relative p-8 bg-white shadow-sm overflow-hidden" data-aos="zoom-in" data-aos-delay="400">
                        <div class="relative z-10">
                            <h4 class="font-black uppercase text-purple-600 mb-2">Audiovisual</h4>
                            <p class="text-sm text-slate-500">Criação de vídeos e criativos que param o scroll e geram desejo imediato.</p>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</section>

<style>
    /* ISOLAMENTO PELO ID #marketing-elite */
    #marketing-elite .mkt-card {
        border-radius: 4px;
        transition: all 0.5s ease;
    }

    /* EFEITO BORDAS PITÁGORAS (BEFORE/AFTER ANIMADOS) */
    #marketing-elite .mkt-card::before,
    #marketing-elite .mkt-card::after {
        content: '';
        position: absolute;
        width: 150%;
        height: 150%;
        top: -25%;
        left: -25%;
        background: conic-gradient(from 0deg, transparent 70%, #8b5cf6 100%);
        animation: rotate-border 4s linear infinite;
        z-index: 1;
        opacity: 0;
        transition: opacity 0.3s;
    }

    #marketing-elite .mkt-card::after {
        animation-delay: -2s;
        background: conic-gradient(from 0deg, transparent 70%, #d8b4fe 100%);
    }

    #marketing-elite .mkt-card:hover::before,
    #marketing-elite .mkt-card:hover::after {
        opacity: 1;
    }

    /* Overlay interno para esconder o centro do gradiente e criar a borda */
    #marketing-elite .mkt-card::before {
        inset: 0px; /* Borda fina */
    }

    /* Fundo interno do card para cobrir o centro da animação */
    #marketing-elite .mkt-card .relative.z-10 {
        background: white;
        padding: 2rem;
        height: 100%;
        width: 100%;
        display: block;
        position: relative;
        z-index: 5;
    }

    @keyframes rotate-border {
        from { transform: rotate(0deg); }
        to { transform: rotate(360deg); }
    }

    /* ANIMAÇÃO DAS IMAGENS (FLUTUAÇÃO) */
    #marketing-elite #mosaico-marketing > div {
        animation: float-mkt 6s ease-in-out infinite;
    }
    #marketing-elite #mosaico-marketing > div:nth-child(2n) {
        animation-delay: -3s;
    }

    @keyframes float-mkt {
        0%, 100% { transform: translateY(0) rotate(0deg); }
        50% { transform: translateY(-15px) rotate(1deg); }
    }
</style>

<script>
    (function() {
        const section = document.querySelector('#marketing-elite');
        if (!section) return;

        // Efeito de Parallax sutil ao rolar o mouse no mosaico
        window.addEventListener('scroll', () => {
            const scrolled = window.pageYOffset;
            const images = section.querySelectorAll('#mosaico-marketing > div');
            
            images.forEach((img, index) => {
                const speed = (index + 1) * 0.05;
                img.style.transform = `translateY(${scrolled * speed * -1}px)`;
            });
        });
    })();
</script>