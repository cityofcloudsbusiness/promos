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
        
        <div class="w-full max-w-md bg-black/40 backdrop-blur-2xl border border-white/10 p-10 rounded-3xl shadow-[0_0_50px_rgba(0,0,0,0.5)] relative overflow-hidden">
            
            <div class="absolute inset-0 pointer-events-none">
                <div class="absolute top-0 left-0 w-16 h-16 border-t border-l border-pink-500/50 rounded-tl-3xl animate-pulse"></div>
                <div class="absolute bottom-0 right-0 w-16 h-16 border-b border-r border-purple-500/50 rounded-br-3xl animate-pulse"></div>
            </div>

            <div class="text-center mb-8">
                <h2 class="text-white font-extralight uppercase tracking-[0.6em] text-2xl">
                    CRIAR<span class="font-bold text-pink-500"> PERFIL</span>
                </h2>
                <p class="text-[10px] text-pink-400/60 tracking-[0.3em] uppercase mt-2">Pagamento Confirmado: Liberando Acesso</p>
            </div>

            <form method="POST" action="{{ route('register') }}" class="space-y-6">
                @csrf

                <div class="relative">
                    <input id="name" type="text" name="name" :value="old('name')" required autofocus 
                        class="w-full bg-transparent border-0 border-b border-white/20 text-white focus:ring-0 focus:border-pink-500 transition-all px-0 py-3 placeholder:text-white/20"
                        placeholder="NOME COMPLETO">
                    <x-input-error :messages="$errors->get('name')" class="mt-1 text-pink-500 text-[10px] uppercase" />
                </div>

                <div class="relative">
                    <input id="email" type="email" name="email" :value="old('email')" required 
                        class="w-full bg-transparent border-0 border-b border-white/20 text-white focus:ring-0 focus:border-pink-500 transition-all px-0 py-3 placeholder:text-white/20"
                        placeholder="E-MAIL (O MESMO DA COMPRA)">
                    <x-input-error :messages="$errors->get('email')" class="mt-1 text-pink-500 text-[10px] uppercase" />
                </div>

                <div class="relative">
                    <input id="password" type="password" name="password" required 
                        class="w-full bg-transparent border-0 border-b border-white/20 text-white focus:ring-0 focus:border-purple-500 transition-all px-0 py-3 placeholder:text-white/20"
                        placeholder="DEFINIR SENHA">
                    <x-input-error :messages="$errors->get('password')" class="mt-1 text-purple-500 text-[10px] uppercase" />
                </div>

                <div class="relative">
                    <input id="password_confirmation" type="password" name="password_confirmation" required 
                        class="w-full bg-transparent border-0 border-b border-white/20 text-white focus:ring-0 focus:border-purple-500 transition-all px-0 py-3 placeholder:text-white/20"
                        placeholder="CONFIRMAR SENHA">
                </div>

                <button class="w-full relative group overflow-hidden border border-pink-500/50 py-4 transition-all duration-500 hover:bg-pink-500/10 mt-4">
                    <span class="relative text-white font-light uppercase tracking-[0.4em] text-sm group-hover:text-pink-400 transition-colors">
                        Finalizar Cadastro
                    </span>
                    <div class="absolute inset-0 bg-pink-500/5 opacity-0 group-hover:opacity-100 transition-opacity"></div>
                </button>

                <div class="text-center pt-4">
                    <a href="{{ route('login') }}" class="text-[10px] text-white/30 hover:text-white uppercase tracking-widest transition-all">
                        Já possui conta? Iniciar Sessão
                    </a>
                </div>
            </form>
        </div>
    </div>

    <script> /* ... mesmo script dos nanobots ... */ </script>
</x-guest-layout>