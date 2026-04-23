<section id="city-of-clouds" class="relative py-32 bg-black overflow-hidden select-none">
    
    <div class="absolute inset-0 z-0 pointer-events-none">
        <div class="absolute top-10 left-10 w-96 h-96 border-[1px] border-blue-500/10 rounded-full animate-spin-slow"></div>
        <div class="absolute bottom-20 right-20 w-[600px] h-[600px] border-[1px] border-purple-500/5 rounded-full animate-spin-reverse"></div>
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-full h-full bg-[url('https://www.transparenttextures.com/patterns/carbon-fibre.png')] opacity-20"></div>
    </div>

    <div id="cursor-trail" class="fixed top-0 left-0 w-full h-full pointer-events-none z-50"></div>

    <div class="container mx-auto px-6 relative z-10">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-16 items-center">
            
            <div class="lg:col-span-6 relative h-[600px] flex items-center justify-center">
                <div class="absolute transform -skew-x-12 -translate-x-16 -translate-y-20 z-10 animate-float-slow" data-aos="zoom-in-right">
                    <div class="relative group">
                        <div class="absolute -inset-1 bg-blue-500/30 blur opacity-40 group-hover:opacity-100 transition"></div>
                        <img src="{{ asset('imgs/cidade.jpg') }}" class="w-64 h-80 object-cover rounded-lg border border-white/10 shadow-2xl grayscale group-hover:grayscale-0 transition duration-700">
                    </div>
                </div>

                <div class="absolute transform -skew-x-12 z-30 animate-float-medium" data-aos="zoom-in" data-aos-delay="200">
                    <div class="relative group">
                        <div class="absolute -inset-2 bg-gradient-to-br from-blue-600 to-purple-600 rounded-xl blur opacity-30 group-hover:opacity-70 transition"></div>
                        <img src="{{ asset('imgs/cidade.jpg') }}" class="w-72 h-96 object-cover rounded-xl border-2 border-white/20 shadow-[0_0_50px_rgba(0,0,0,0.8)]">
                        <div class="absolute inset-0 bg-blue-500/10 group-hover:bg-transparent transition"></div>
                    </div>
                </div>

                <div class="absolute transform skew-x-6 translate-x-24 translate-y-24 z-40 animate-float-reverse" data-aos="zoom-in-left" data-aos-delay="400">
                    <div class="relative group">
                        <img src="{{ asset('imgs/cidade.jpg') }}" class="w-56 h-64 object-cover rounded-lg border border-white/10 shadow-2xl brightness-75 group-hover:brightness-110 transition">
                        <div class="absolute -top-4 -left-4 bg-blue-600 px-4 py-2 font-black text-xs italic">CITY_CLOUD_INFRA</div>
                    </div>
                </div>
            </div>

            <div class="lg:col-span-6 text-white">
                <header class="mb-12" data-aos="fade-left">
                    <h2 class="text-6xl font-black italic uppercase leading-[0.8] tracking-tighter">
                        Infraestrutura <br><span class="text-blue-500 italic">De Gigante.</span>
                    </h2>
                    <p class="text-blue-400 font-mono mt-4 tracking-[0.3em] text-sm uppercase">Sua ideia com o poder de uma multinacional</p>
                </header>

                <div class="space-y-6 mb-12">
                    <p class="text-gray-400 text-lg leading-relaxed border-l-4 border-blue-600 pl-6" data-aos="fade-up">
                        Ao se tornar um **Shark Associado**, você não ganha apenas um software; você herda nossa **máquina de guerra**. Mobilizamos especialistas em Mobile, Backend, APIs e Marketing para que seu projeto nasça pronto para dominar o mercado mundial.
                    </p>
                    
                    <div class="flex gap-8" data-aos="fade-up" data-aos-delay="200">
                        <div class="border-l-2 border-blue-600 pl-4">
                            <span class="block text-4xl font-black text-blue-500">FULL</span>
                            <span class="text-xs uppercase text-gray-500">Stack Development</span>
                        </div>
                        <div class="border-l-2 border-purple-600 pl-4">
                            <span class="block text-4xl font-black text-purple-500">24/7</span>
                            <span class="text-xs uppercase text-gray-500">Support & R&D</span>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 h-[550px] overflow-y-auto pr-4 scrollbar-thin scrollbar-thumb-blue-600" data-aos="fade-up" data-aos-delay="400">
                    @php
                        $armada = [
                            '🚀 Mobile iOS/Android' => 'Desenvolvimento nativo e híbrido para dominar as App Stores.',
                            '🧠 Inteligência Artificial' => 'Integração com LLMs e modelos preditivos para automação inteligente.',
                            '🛡️ Conexões Governamentais' => 'APIs de alta segurança para integração com sistemas do Governo e Autarquias.',
                            '⚡ Laravel & Magnetum' => 'Arquitetura de Backend ultra veloz com Silienx para processamento massivo.',
                            '📈 Agência de Marketing' => 'Nosso time de especialistas cuidando da sua tração e aquisição de leads.',
                            '📡 Google Cloud APIs' => 'Conexão profunda com ecossistema Google para mapas, buscas e dados.',
                            '💻 Desktop & Softwares' => 'Criação de executáveis complexos para Windows, macOS e sistemas internos.',
                            '🔍 Pesquisa & Inovação' => 'Turma dedicada a caçar novas tecnologias antes da sua concorrência.',
                            '📊 Big Data & Scraping' => 'Robôs mineradores que transformam a web no seu maior banco de dados.',
                            '🔥 Stress Test & Sec' => 'Simulações de milhões de acessos para garantir que você nunca caia.'
                        ];
                    @endphp

                    @foreach($armada as $titulo => $desc)
                        <div class="p-5 bg-white/5 border border-white/10 hover:bg-blue-600/20 hover:border-blue-500 transition-all group cursor-pointer relative overflow-hidden">
                            <div class="absolute top-0 right-0 w-1 h-full bg-blue-600 transform scale-y-0 group-hover:scale-y-100 transition-transform origin-top"></div>
                            <h4 class="text-blue-500 font-bold text-sm uppercase group-hover:text-white mb-2">{{ $titulo }}</h4>
                            <p class="text-gray-500 text-[11px] leading-tight group-hover:text-gray-300">{{ $desc }}</p>
                        </div>
                    @endforeach
                </div>

                <div class="mt-10" data-aos="fade-up" data-aos-delay="600">
                    <a href="#contato" class="group relative inline-flex items-center justify-center bg-blue-600 hover:bg-blue-500 text-white font-black px-12 py-5 rounded-full transition-all hover:scale-110 shadow-[0_0_30px_rgba(37,99,235,0.4)] uppercase italic tracking-widest">
                        <span class="mr-3">Ativar Parceria Shark</span>
                        <svg class="w-5 h-5 transform group-hover:translate-x-2 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M13 7l5 5m0 0l-5 5m5-5H6"></path></svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    @keyframes spin-slow { from { transform: rotate(0deg); } to { transform: rotate(360deg); } }
    @keyframes spin-reverse { from { transform: rotate(360deg); } to { transform: rotate(0deg); } }
    @keyframes float-slow { 0%, 100% { transform: translate(-64px, -80px) rotate(-12deg); } 50% { transform: translate(-64px, -100px) rotate(-10deg); } }
    @keyframes float-medium { 0%, 100% { transform: translate(0, 0) rotate(-12deg); } 50% { transform: translate(10px, -20px) rotate(-14deg); } }
    @keyframes float-reverse { 0%, 100% { transform: translate(96px, 96px) rotate(6deg); } 50% { transform: translate(96px, 110px) rotate(8deg); } }

    .animate-spin-slow { animation: spin-slow 20s linear infinite; }
    .animate-spin-reverse { animation: spin-reverse 25s linear infinite; }
    .animate-float-slow { animation: float-slow 6s ease-in-out infinite; }
    .animate-float-medium { animation: float-medium 4s ease-in-out infinite; }
    .animate-float-reverse { animation: float-reverse 5s ease-in-out infinite; }

    .scrollbar-thin::-webkit-scrollbar { width: 4px; }
    .scrollbar-thin::-webkit-scrollbar-track { background: rgba(255,255,255,0.05); }
    .scrollbar-thin::-webkit-scrollbar-thumb { background: #3b82f6; border-radius: 10px; }

    /* SONAR WAVE */
    .sonar-wave {
        position: fixed;
        width: 10px;
        height: 10px;
        background: none;
        border: 2px solid #3b82f6;
        border-radius: 50%;
        pointer-events: none;
        z-index: 9999;
        transform: translate(-50%, -50%);
        animation: sonar-expand 0.8s ease-out forwards;
    }
    @keyframes sonar-expand {
        0% { width: 5px; height: 5px; opacity: 0.8; border-width: 3px; }
        100% { width: 100px; height: 100px; opacity: 0; border-width: 1px; }
    }
</style>

<script>
    let lastTime = 0;
    window.addEventListener('mousemove', (e) => {
        const now = Date.now();
        if (now - lastTime < 50) return;
        lastTime = now;
        const wave = document.createElement('div');
        wave.className = 'sonar-wave';
        wave.style.left = e.clientX + 'px';
        wave.style.top = e.clientY + 'px';
        document.body.appendChild(wave);
        setTimeout(() => { wave.remove(); }, 800);
    });
</script>