<x-guest-layout>
    <div class="fixed inset-0 z-0 bg-black overflow-hidden">
        <video autoplay muted loop playsinline class="absolute inset-0 w-full h-full object-cover opacity-50">
            <source src="{{ asset('imgs/cidade.jpg') }}" type="video/mp4">
        </video>

        <canvas id="nanobots" class="absolute inset-0 z-10 opacity-60"></canvas>

        <div class="absolute inset-0 z-20 bg-[linear-gradient(rgba(18,16,16,0)_50%,rgba(0,0,0,0.4)_50%),linear-gradient(90deg,rgba(255,0,255,0.05),rgba(0,255,255,0.02),rgba(128,0,255,0.05))] bg-[length:100%_4px,3px_100%] pointer-events-none"></div>
        <div class="absolute inset-0 z-20 bg-gradient-to-br from-purple-900/40 via-black to-pink-900/40 opacity-80"></div>
    </div>

    <div class="relative z-30 min-h-screen flex flex-col items-center justify-center p-4">
        
        <div class="w-full max-w-md bg-black/40 backdrop-blur-2xl border border-white/10 p-10 rounded-3xl shadow-[0_0_50px_rgba(0,0,0,0.5)] relative overflow-hidden group">
            
            <div class="absolute inset-0 pointer-events-none">
                <div class="absolute top-0 left-0 w-16 h-16 border-t border-l border-pink-500/50 rounded-tl-3xl animate-pulse"></div>
                <div class="absolute bottom-0 right-0 w-16 h-16 border-b border-r border-purple-500/50 rounded-br-3xl animate-pulse"></div>
            </div>

            <div class="text-center mb-6">
                <h2 class="text-white font-extralight uppercase tracking-[0.6em] text-2xl">
                    RECOVERY<span class="font-bold text-pink-500"> LINK</span>
                </h2>
                <div class="text-[10px] text-white/40 uppercase tracking-widest mt-4 leading-relaxed bg-white/5 p-4 rounded-xl border border-white/5">
                    {{ __('Esqueceu sua chave de acesso? Informe seu e-mail e enviaremos um link de restauração de protocolo.') }}
                </div>
            </div>

            <x-auth-session-status class="mb-4 text-pink-400 text-[10px] uppercase font-bold text-center tracking-widest" :status="session('status')" />

            <form method="POST" action="{{ route('password.email') }}" class="space-y-8">
                @csrf

                <div class="relative">
                    <input id="email" type="email" name="email" :value="old('email')" required autofocus 
                        class="w-full bg-transparent border-0 border-b border-white/20 text-white focus:ring-0 focus:border-pink-500 transition-all px-0 py-3 placeholder:text-white/20 uppercase text-xs tracking-widest"
                        placeholder="E-MAIL DE RECUPERAÇÃO">
                    <x-input-error :messages="$errors->get('email')" class="mt-1 text-pink-500 text-[10px] uppercase" />
                </div>

                <button class="w-full relative group overflow-hidden border border-pink-500/50 py-4 transition-all duration-500 hover:bg-pink-500/10 mt-4">
                    <span class="relative text-white font-light uppercase tracking-[0.4em] text-sm group-hover:text-pink-400 transition-colors">
                        Enviar Protocolo
                    </span>
                    <div class="absolute inset-0 bg-pink-500/5 opacity-0 group-hover:opacity-100 transition-opacity"></div>
                </button>

                <div class="text-center pt-4 border-t border-white/5">
                    <a href="{{ route('login') }}" class="text-[10px] text-white/30 hover:text-white uppercase tracking-widest transition-all">
                        Lembrou a senha? Voltar ao Login
                    </a>
                </div>
            </form>
        </div>

        <a href="/" class="mt-12 text-pink-500/40 hover:text-pink-400 font-black uppercase italic text-xs tracking-[0.3em] transition-all">
            << Voltar para a Cidade
        </a>
    </div>

    <script>
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
            particles = [];
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
    </script>
</x-guest-layout>