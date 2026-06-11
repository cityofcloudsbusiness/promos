<x-guest-layout>
    <div class="fixed inset-0 z-0 bg-black overflow-hidden">
        <video autoplay muted loop playsinline class="absolute inset-0 w-full h-full object-cover opacity-50">
            <source src="{{ asset('imgs/cidade.jpg') }}" type="video/mp4">
        </video>

        <canvas id="nanobots" class="absolute inset-0 z-10 opacity-60"></canvas>

        <div class="absolute inset-0 z-20 bg-[linear-gradient(rgba(18,16,16,0)_50%,rgba(0,0,0,0.4)_50%),linear-gradient(90deg,rgba(255,0,255,0.05),rgba(0,255,255,0.02),rgba(128,0,255,0.05))] bg-[length:100%_4px,3px_100%] pointer-events-none"></div>
        <div class="absolute inset-0 z-20 bg-gradient-to-br from-purple-900/40 via-black to-pink-900/40 opacity-80"></div>
    </div>

    <div id="cubinho-global-wrapper" class="fixed bottom-6 right-6 z-50 flex flex-col items-end gap-3 pointer-events-none md:max-w-xs max-w-[240px] transition-all duration-[1200ms] ease-in-out">
        
        <div id="habbo-balloon" class="opacity-0 translate-y-4 transition-all duration-500 bg-black/95 border-2 border-pink-500 text-white p-3 rounded-xl shadow-[0_0_20px_rgba(219,39,119,0.4)] pointer-events-auto">
            <div class="font-mono text-[11px] leading-relaxed tracking-wide text-gray-200" id="cubinho-text">
                ...
            </div>
            <div id="balloon-arrow" class="absolute bottom-[-8px] right-8 w-0 h-0 border-l-[8px] border-l-transparent border-r-[8px] border-r-transparent border-t-[8px] border-t-pink-500 transition-all duration-500"></div>
        </div>

        <div class="pointer-events-auto cursor-pointer mr-4 relative" id="cubinho-container" style="perspective: 400px;">
            
            <div id="cubinho-shadow" class="absolute top-12 left-2 w-8 h-2 bg-black/60 blur-md rounded-full transition-all duration-[1200ms] cubic-bezier(0.4, 0, 0.2, 1) opacity-40"></div>

            <div id="cubinho-3d" class="w-12 h-12 relative transition-all duration-500 custom-cube-bounce" style="transform-style: preserve-3d; transform: rotateX(-20deg) rotateY(25deg);">
                
                <div class="absolute inset-0 bg-pink-600 border border-pink-400 flex items-center justify-center gap-1.5 shadow-[inset_0_0_10px_rgba(255,255,255,0.3)]" style="transform: translateZ(24px);">
                    <div class="w-2 h-2 bg-cyan-400 rounded-full animate-ping absolute"></div>
                    <div class="w-2 h-2 bg-cyan-300 rounded-full z-10"></div>
                    <div class="w-2 h-2 bg-cyan-300 rounded-full z-10"></div>
                </div>
                
                <div class="absolute inset-0 bg-pink-700 border border-pink-500 opacity-90" style="transform: rotateY(180deg) translateZ(24px);"></div>
                <div class="absolute inset-0 bg-pink-800 border border-pink-600 opacity-90" style="transform: rotateY(90deg) translateZ(24px);"></div>
                <div class="absolute inset-0 bg-pink-500 border border-pink-300 opacity-90" style="transform: rotateY(-90deg) translateZ(24px);"></div>
                <div class="absolute inset-0 bg-pink-400 border border-pink-200 opacity-90" style="transform: rotateX(90deg) translateZ(24px);"></div>
                <div class="absolute inset-0 bg-pink-900 border border-pink-700 opacity-90" style="transform: rotateX(-90deg) translateZ(24px);"></div>
            </div>
        </div>

    </div>

    <div class="relative z-30 min-h-screen flex flex-col items-center justify-center p-4">
        
        <div class="w-full max-w-md bg-black/40 backdrop-blur-2xl border border-white/10 p-10 rounded-3xl shadow-[0_0_50px_rgba(0,0,0,0.5)] relative overflow-hidden group">
            
            <div class="absolute inset-0 pointer-events-none">
                <div class="absolute top-0 left-0 w-16 h-16 border-t border-l border-pink-500/50 rounded-tl-3xl animate-pulse"></div>
                <div class="absolute bottom-0 right-0 w-16 h-16 border-b border-r border-purple-500/50 rounded-br-3xl animate-pulse"></div>
            </div>

            <div class="text-center mb-10">
                <h2 class="text-white font-extralight uppercase tracking-[0.6em] text-2xl">
                    LOGIN
                </h2>
                <p class="text-[10px] text-purple-400/60 tracking-[0.3em] uppercase mt-2">ÁREA DE MANUTENÇÃO ASSINANTES</p>
            </div>

            <form method="POST" action="{{ route('login') }}" class="space-y-8">
                @csrf

                <div class="relative">
                    <input id="email" type="email" name="email" :value="old('email')" required autofocus 
                        class="w-full bg-transparent border-0 border-b border-white/20 text-white focus:ring-0 focus:border-pink-500 transition-all duration-500 placeholder:text-white/20 px-0 py-3"
                        placeholder="IDENTIFICAÇÃO (E-MAIL)">
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-pink-500 text-[10px] uppercase italic" />
                </div>

                <div class="relative">
                    <input id="password" type="password" name="password" required 
                        class="w-full bg-transparent border-0 border-b border-white/20 text-white focus:ring-0 focus:border-purple-500 transition-all duration-500 placeholder:text-white/20 px-0 py-3"
                        placeholder="CÓDIGO DE ACESSO">
                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-purple-500 text-[10px] uppercase italic" />
                </div>

                <button class="w-full relative group overflow-hidden border border-pink-500/50 py-4 transition-all duration-500 hover:bg-pink-500/10">
                    <span class="relative text-white font-light uppercase tracking-[0.4em] text-sm group-hover:text-pink-400 transition-colors">
                        Iniciar Conexão
                    </span>
                    <div class="absolute inset-0 bg-pink-500/5 opacity-0 group-hover:opacity-100 transition-opacity"></div>
                </button>

                <div id="cadastro-container-links" class="pt-6 border-t border-white/5 flex flex-col items-center gap-4 transition-transform duration-300">
                    <a href="{{ route('register') }}" class="text-[10px] text-pink-400/80 hover:text-pink-300 font-bold uppercase tracking-widest transition-all">
                       Assinar e criar acesso
                    </a>
                    
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="text-[9px] text-white/30 hover:text-white uppercase tracking-tighter">
                            Esqueceu suas credenciais?
                        </a>
                    @endif
                </div>
            </form>
        </div>

        <a href="/" class="mt-12 text-white/20 hover:text-pink-500/60 font-light uppercase text-[10px] tracking-[0.5em] transition-all">
            << Retornar ao Terminal
        </a>
    </div>

    <style>
        @keyframes cubeBounce {
            0%, 100% { transform: translateY(0) rotateX(-20deg) rotateY(25deg); }
            50% { transform: translateY(-15deg) rotateX(-10deg) rotateY(40deg); }
        }
        .custom-cube-bounce {
            animation: cubeBounce 2.5s ease-in-out infinite;
        }
    </style>

    <script>
        // --- CÓDIGO ORIGINAL DOS NANOBOTS (INALTERADO) ---
        const canvas = document.getElementById('nanobots');
        const ctx = canvas.getContext('2d');
        let particles = [];
        function resize() {
            canvas.width = window.innerWidth;
            canvas.height = window.innerHeight;
        }
        class Nanobot {
            constructor() {
                this.x = Math.random() * canvas.width;
                this.y = Math.random() * canvas.height;
                this.vx = (Math.random() - 0.5) * 1.5;
                this.vy = (Math.random() - 0.5) * 1.5;
            }
            draw() {
                ctx.fillStyle = '#db2777';
                ctx.fillRect(this.x, this.y, 2, 2);
            }
            update() {
                this.x += this.vx;
                this.y += this.vy;
                if (this.x < 0 || this.x > canvas.width) this.vx *= -1;
                if (this.y < 0 || this.y > canvas.height) this.vy *= -1;
            }
        }
        function init() {
            resize();
            for (let i = 0; i < 100; i++) particles.push(new Nanobot());
            animate();
        }
        function animate() {
            ctx.clearRect(0, 0, canvas.width, canvas.height);
            particles.forEach(p => {
                p.update();
                p.draw();
                particles.forEach(p2 => {
                    let dist = Math.hypot(p.x - p2.x, p.y - p2.y);
                    if (dist < 100) {
                        ctx.strokeStyle = `rgba(168, 85, 247, ${1 - dist/100})`;
                        ctx.lineWidth = 0.5;
                        ctx.beginPath();
                        ctx.moveTo(p.x, p.y);
                        ctx.lineTo(p2.x, p2.y);
                        ctx.stroke();
                    }
                });
            });
            requestAnimationFrame(animate);
        }
        window.addEventListener('resize', resize);
        init();

        // --- SISTEMA CONSCIENTE E DINÂMICO DO CUBINHO (PROJETADO PARA CAMINHADA) ---
        const globalWrapper = document.getElementById('cubinho-global-wrapper');
        const balloon = document.getElementById('habbo-balloon');
        const arrow = document.getElementById('balloon-arrow');
        const textTarget = document.getElementById('cubinho-text');
        const cube3d = document.getElementById('cubinho-3d');
        const cubeShadow = document.getElementById('cubinho-shadow');
        const linksArea = document.getElementById('cadastro-container-links');

        const falas = [
            "Bip bop... Olá, operador! Se você quer assinar o pacote e não tem uma conta...",
            "Você obrigatoriamente precisa criar o seu login primeiro para acessar o painel!",
            "Espera aí, deixa eu te mostrar onde é... Indo até aí em 3, 2, 1..."
        ];

        let falaIndex = 0;

        function typeWriter(text, i = 0) {
            if (i === 0) textTarget.innerHTML = '';
            textTarget.innerHTML += text[i];
            if (i < text.length - 1) {
                setTimeout(() => typeWriter(text, i + 1), 30);
            }
        }

        function gerenciarFalas() {
            if (falaIndex < falas.length) {
                balloon.classList.remove('opacity-0', 'translate-y-4');
                typeWriter(falas[falaIndex]);

                // Dispara a animação de caminhada e quebra da quarta parede no último estágio
                if (falaIndex === 2) {
                    setTimeout(executarCaminhadaAteCadastro, 3500);
                } else {
                    falaIndex++;
                    setTimeout(gerenciarFalas, 6500);
                }
            }
        }

        function executarCaminhadaAteCadastro() {
            // 1. Faz o cubinho pular "para fora" da tela aumentando sua escala e a distância da sombra
            cube3d.style.animation = "none";
            cube3d.style.transform = "scale(2.2) rotateX(-15deg) rotateY(45deg)";
            cubeShadow.style.transform = "translateY(40px) scale(0.5)"; // Afasta a sombra dando efeito de altura
            cubeShadow.style.opacity = "0.7";

            // Modifica o balão para se ajustar na viagem
            arrow.style.right = "50%";

            setTimeout(() => {
                // 2. Calcula as coordenadas do link de cadastro dinamicamente sem alterar o DOM original
                const rect = linksArea.getBoundingClientRect();
                const windowWidth = window.innerWidth;
                const windowHeight = window.innerHeight;

                // Move o contêiner flutuante inteiro de forma precisa sobre o botão
                const targetX = windowWidth - rect.right + (rect.width / 2) - 24;
                const targetY = windowHeight - rect.bottom - 40;

                globalWrapper.style.transform = `translate(-${targetX}px, -${targetY}px)`;
                
                // Muda o texto no meio do pulo!
                typeWriter("AQUI Ó! É só clicar bem aqui para criar o seu acesso e assinar! 👇✨");

                setTimeout(() => {
                    // 3. Chega no local, reduz um pouco a escala simulando o pouso e circula a área
                    cube3d.style.transform = "scale(1.4) rotateX(-20deg) rotateY(-45deg)";
                    cubeShadow.style.transform = "translateY(15px) scale(0.9)";
                    cubeShadow.style.opacity = "0.5";
                    
                    linksArea.classList.add('scale-110', 'bg-pink-500/10', 'rounded-xl', 'p-2', 'shadow-[0_0_25px_rgba(219,39,119,0.2)]');

                    // 4. Aguarda alguns segundos apontando no local e retorna ao canto inicial
                    setTimeout(() => {
                        typeWriter(" Prontinho! Sistema explicado. Voltando para o meu posto de monitoramento... 🚀");
                        
                        // Retorno físico
                        globalWrapper.style.transform = "translate(0, 0)";
                        cube3d.style.transform = "scale(2.0) rotateX(-15deg) rotateY(180deg)"; // Dá uma pirueta no ar voltando
                        cubeShadow.style.transform = "translateY(35px) scale(0.6)";

                        setTimeout(() => {
                            // Reset completo para o estado estável original
                            balloon.classList.add('opacity-0', 'translate-y-4');
                            cube3d.style.transform = "";
                            cubeShadow.style.transform = "";
                            cubeShadow.style.opacity = "0.4";
                            arrow.style.right = "";
                            cube3d.style.animation = "cubeBounce 2.5s ease-in-out infinite";
                            linksArea.classList.remove('scale-110', 'bg-pink-500/10', 'rounded-xl', 'p-2', 'shadow-[0_0_25px_rgba(219,39,119,0.2)]');
                            
                            // Permite reiniciar o ciclo futuramente reiniciando o índice
                            falaIndex = 0;
                            setTimeout(gerenciarFalas, 12000);
                        }, 1200);

                    }, 7000);

                }, 1200); // Tempo do deslocamento físico pela tela
            }, 800);
        }

        // Inicializa o script inteligente do Cubinho
        setTimeout(gerenciarFalas, 1200);

        // Interação Extra ao clicar: Giro furioso de 720 graus
        document.getElementById('cubinho-container').addEventListener('click', () => {
            cube3d.style.transition = "transform 0.6s cubic-bezier(0.175, 0.885, 0.32, 1.275)";
            cube3d.style.transform = "rotateX(720deg) rotateY(720deg) scale(1.3)";
            
            balloon.classList.remove('opacity-0', 'translate-y-4');
            typeWriter("Ei! Meus circuitos são sensíveis! Siga as minhas instruções para não se perder! ⚡");

            setTimeout(() => {
                cube3d.style.transition = "all 0.5s ease";
                if(globalWrapper.style.transform === "" || globalWrapper.style.transform === "translate(0px, 0px)") {
                    cube3d.style.transform = "";
                    cube3d.style.animation = "cubeBounce 2.5s ease-in-out infinite";
                }
            }, 800);
        });
    </script>
</x-guest-layout>