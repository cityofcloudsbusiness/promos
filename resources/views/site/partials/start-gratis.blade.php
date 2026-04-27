<div x-data="kineticStory()" class="bg-black">

    <template x-if="!finished">
        <section class="fixed inset-0 z-[100] bg-black flex items-center justify-center overflow-hidden">
            <video autoplay muted loop playsinline class="absolute inset-0 w-full h-full object-cover opacity-30">
                <source src="{{ asset('imgs/cidade.jpg') }}" type="video/mp4">
            </video>

            <div class="relative z-10 text-center px-4">
                <h2 x-text="steps[currentStep].text"
                    :class="steps[currentStep].class"
                    class="text-white font-black italic uppercase tracking-tighter leading-none transition-all duration-500"
                    x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0 scale-50 rotate-12"
                    x-transition:enter-end="opacity-100 scale-100 rotate-0"
                    x-transition:leave="transition ease-in duration-300"
                    x-transition:leave-start="opacity-100 scale-100"
                    x-transition:leave-end="opacity-0 scale-150 -rotate-12">
                </h2>
            </div>
        </section>
    </template>

    <div x-show="finished"
        x-transition:enter="transition ease-out duration-[1500ms]"
        x-transition:enter-start="opacity-0 scale-110 blur-2xl"
        x-transition:enter-end="opacity-100 scale-100 blur-0">

        <header class="fixed top-0 left-0 w-full z-50 transition-all duration-500" x-data="{ scrolled: false }" @scroll.window="scrolled = (window.pageYOffset > 20)">
            <nav :class="scrolled ? 'bg-black/60 backdrop-blur-md py-3' : 'bg-transparent py-6'" class="container mx-auto px-6 flex justify-between items-center transition-all">

                <div class="relative group cursor-pointer">
                    <div class="absolute -inset-2 bg-gradient-to-r from-pink-600 to-purple-600 rounded-lg blur opacity-25 group-hover:opacity-100 transition duration-1000 group-hover:duration-200"></div>

                    <div class="relative flex items-center gap-2">
                        <div class="w-10 h-10 flex items-center justify-center rounded-tr-xl rounded-bl-xl overflow-hidden animate-pulse border border-none">
                            <span class="text-black font-black text-2xl italic">
                                <img src="{{Vite::asset('resources/imgs/icon_logo.png')}}" alt="Logo City Of Clouds" class="w-full h-full object-cover" style="filter: hue-rotate(53deg);">
                            </span>
                        </div>

                        <span class="text-white font-black uppercase italic tracking-tighter text-xl hidden md:block">
                            City Of Cloud<span class="text-pink-500 animate-pulse">S</span>
                        </span>
                    </div>
                </div>

                <ul class="hidden lg:flex items-center gap-8 text-[10px] font-black uppercase tracking-[0.3em] text-slate-300">
                    <li class="hover:text-pink-500 transition-colors cursor-pointer relative group">
                        <a href="#neural-offer">Ecosystem</a>
                        <span class="absolute -bottom-1 left-0 w-0 h-[1px] bg-pink-500 transition-all group-hover:w-full"></span>
                    </li>
                    <li class="hover:text-purple-500 transition-colors cursor-pointer relative group">
                        <a href="#manutencao">Manutenção</a>
                        <span class="absolute -bottom-1 left-0 w-0 h-[1px] bg-purple-500 transition-all group-hover:w-full"></span>
                    </li>
                    <li class="hover:text-blue-500 transition-colors cursor-pointer relative group">
                        <a href="#ia">Inteligência</a>
                        <span class="absolute -bottom-1 left-0 w-0 h-[1px] bg-blue-500 transition-all group-hover:w-full"></span>
                    </li>
                </ul>

                <div class="relative group">

                    @auth
                    <div class="absolute -inset-0.5 bg-gradient-to-r from-green-500 to-cyan-500 rounded-full blur opacity-30 group-hover:opacity-100 transition duration-500"></div>
                    <a href="{{ route('dashboard') }}" class="relative bg-black text-white px-6 py-2 rounded-full border border-white/10 text-[10px] font-black uppercase tracking-widest hover:bg-white hover:text-black transition-all flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-cyan-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                        <span class="italic">{{ Auth::user()->name }}</span>
                    </a>
                    @else
                    <div class="absolute -inset-0.5 bg-gradient-to-r from-pink-500 to-purple-500 rounded-full blur opacity-30 group-hover:opacity-100 transition duration-500"></div>
                    <a href="{{ route('login') }}" class="relative bg-black text-white px-6 py-2 rounded-full border border-white/10 text-[10px] font-black uppercase tracking-widest hover:bg-white hover:text-black transition-all flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-pink-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                        <span>Login</span>
                    </a>
                    @endauth

                </div>
            </nav>
        </header>

        <section class="relative min-h-screen w-full flex items-center justify-center overflow-hidden bg-black">
            <div class="absolute inset-0 z-0">
                <video autoplay muted loop playsinline class="w-full h-full object-cover opacity-60">
                    <source src="{{ asset('imgs/cidade.jpg') }}" type="video/mp4">
                </video>
                <div class="absolute inset-0 bg-[linear-gradient(rgba(18,16,16,0)_50%,rgba(0,0,0,0.25)_50%),linear-gradient(90deg,rgba(255,0,0,0.06),rgba(0,255,0,0.02),rgba(0,0,255,0.06))] bg-[length:100%_4px,3px_100%] pointer-events-none"></div>
                <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-transparent to-slate-950 opacity-80"></div>
            </div>

            <div class="absolute inset-0 z-10 pointer-events-none overflow-hidden">
                <div class="absolute left-10 top-1/2 -translate-y-1/2 flex flex-col gap-4 opacity-40 animate-pulse">
                    <div class="h-[2px] w-20 bg-pink-500"></div>
                    <span class="text-pink-500 font-mono text-[8px] uppercase tracking-[0.5em] -rotate-90 origin-left mt-10">System Status: Active</span>
                    <div class="h-40 w-[1px] bg-gradient-to-b from-pink-500 to-transparent ml-2"></div>
                </div>

                <div class="absolute right-[-100px] bottom-[-100px] w-[400px] h-[400px] border border-blue-500/20 rounded-full animate-[spin_20s_linear_infinite] flex items-center justify-center">
                    <div class="w-[300px] h-[300px] border border-cyan-500/10 rounded-full animate-[spin_10s_linear_infinite_reverse]"></div>
                    <div class="absolute top-0 left-1/2 w-1 h-1 bg-cyan-400 shadow-[0_0_15px_#22d3ee]"></div>
                </div>
            </div>

            <div class="container mx-auto px-6 relative z-20 text-center mt-20">
                <div class="inline-flex items-center gap-2 bg-white/5 border border-white/10 px-4 py-1 rounded-full mb-6 backdrop-blur-md" data-aos="fade-down">
                    <span class="relative flex h-2 w-2">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-green-400 opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-2 w-2 bg-green-500"></span>
                    </span>
                    <span class="text-white font-mono text-[10px] uppercase tracking-tighter">Sinal de Rede: Conectado</span>
                </div>

                <h1 class="text-6xl md:text-8xl font-black text-white italic uppercase leading-none tracking-tighter" data-aos="zoom-out" data-aos-delay="200">
                    Web Site <br>
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 via-pink-500 to-purple-600 animate-gradient-x">Sem Custos</span>
                </h1>

                <p class="mt-8 text-slate-300 max-w-xl mx-auto font-light tracking-widest text-sm uppercase leading-relaxed" data-aos="fade-up" data-aos-delay="400">
                    A tecnologia que seu negócio precisa, entregue sem barreiras. <br>
                    <span class="text-white font-bold italic">Você escala, nós mantemos.</span>
                </p>

                <div class="mt-12 flex flex-col md:flex-row items-center justify-center gap-6" data-aos="fade-up" data-aos-delay="600">
                    <a href="#neural-offer" class="bg-white text-black font-black px-12 py-4 rounded-tl-3xl rounded-br-3xl hover:bg-pink-600 hover:text-white transition-all transform hover:-translate-y-1 uppercase italic text-sm tracking-widest">
                        Começar agora
                    </a>
                    <button class="flex items-center gap-3 group">
                        <div class="w-12 h-12 rounded-full border border-white/20 flex items-center justify-center group-hover:border-pink-500 transition-all">
                            <div class="w-0 h-0 border-y-[6px] border-y-transparent border-l-[10px] border-l-white ml-1 group-hover:border-l-pink-500"></div>
                        </div>
                        <span class="text-white font-black uppercase text-[10px] tracking-widest group-hover:text-pink-500">Entenda Melhor</span>
                    </button>
                </div>
            </div>

            <div class="absolute bottom-10 left-1/2 -translate-x-1/2 z-20 flex flex-col items-center gap-2">
                <span class="text-white/30 font-mono text-[8px] uppercase tracking-widest">Scroll to Explore</span>
                <div class="w-[1px] h-12 bg-gradient-to-b from-white/40 to-transparent"></div>
            </div>
        </section>
    </div>
</div>

<style>
    .animate-gradient-x {
        background-size: 200% 200%;
        animation: gradient-move 5s linear infinite;
    }

    @keyframes gradient-move {
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

    @keyframes float {

        0%,
        100% {
            transform: translateY(0px);
        }

        50% {
            transform: translateY(-20px);
        }
    }
</style>

<script>
    function kineticStory() {
        return {
            currentStep: 0,
            finished: false,
            steps: [{
                    text: 'Atenção',
                    class: 'text-5xl md:text-7xl'
                },
                {
                    text: 'O mercado mudou',
                    class: 'text-4xl md:text-6xl text-pink-500'
                },
                {
                    text: 'E nós também',
                    class: 'text-5xl md:text-8xl underline'
                },
                {
                    text: 'Seu Site Profissional',
                    class: 'text-6xl md:text-8xl'
                },
                {
                    text: 'Custo Zero',
                    class: 'text-8xl md:text-[10rem] text-cyan-400 rotate-[-3deg]'
                },
                {
                    text: 'Sem pegadinhas',
                    class: 'text-4xl md:text-6xl'
                },
                {
                    text: 'Design de Elite',
                    class: 'text-5xl md:text-7xl text-purple-500'
                },
                {
                    text: 'Apenas a Manutenção',
                    class: 'text-4xl md:text-6xl border-y border-white py-2'
                },
                {
                    text: 'O lucro é seu',
                    class: 'text-5xl md:text-7xl font-light tracking-widest'
                },
                {
                    text: 'Conectando...',
                    class: 'text-6xl md:text-8xl animate-pulse'
                }
            ],
            init() {
                let interval = setInterval(() => {
                    if (this.currentStep < this.steps.length - 1) {
                        this.currentStep++;
                    } else {
                        this.finished = true;
                        clearInterval(interval);

                        this.$nextTick(() => {
                            if (typeof AOS !== 'undefined') {
                                // O SEGREDO: refreshHard força o AOS a mapear as sessões novas
                                AOS.init({
                                    duration: 1000,
                                    once: true,
                                    offset: 50 // Um valor pequeno para disparar logo na entrada
                                });
                                // RefreshHard é mais potente que o refresh comum
                                AOS.refreshHard();
                            }

                            // Simula um scroll para "acordar" os observadores das sessões de baixo
                            window.scrollTo(window.scrollX, window.scrollY + 1);
                            window.dispatchEvent(new Event('resize'));
                        });
                    }
                }, 50);

            }
        }
    }
</script>