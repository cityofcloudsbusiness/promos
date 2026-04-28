<x-app-layout>
    <div class="py-12 min-h-screen bg-black flex items-center justify-center relative overflow-hidden">
        <div class="absolute inset-0 z-0 opacity-30">
            <div class="absolute top-0 -left-4 w-72 h-72 bg-purple-600 rounded-full mix-blend-multiply filter blur-3xl animate-blob"></div>
            <div class="absolute top-0 -right-4 w-72 h-72 bg-pink-600 rounded-full mix-blend-multiply filter blur-3xl animate-blob animation-delay-2000"></div>
            <div class="absolute -bottom-8 left-20 w-72 h-72 bg-blue-600 rounded-full mix-blend-multiply filter blur-3xl animate-blob animation-delay-4000"></div>
        </div>

        <div class="max-w-xl mx-auto sm:px-6 lg:px-8 z-10 relative w-full">
            <div class="bg-black/60 backdrop-blur-2xl border border-white/10 overflow-hidden shadow-[0_0_50px_rgba(219,39,119,0.2)] rounded-3xl p-10 text-center">
                
                <div class="mb-8">
                    <div class="inline-block px-4 py-1 rounded-full border border-pink-500/50 text-pink-500 font-mono text-xs tracking-[0.2em] uppercase mb-4 shadow-[0_0_10px_rgba(219,39,119,0.3)]">
                        Inscrição Prioritária
                    </div>
                    <h2 class="text-5xl font-black text-white tracking-tighter italic">
                        FULL <span class="text-transparent bg-clip-text bg-gradient-to-r from-pink-500 to-purple-600">ACCESS</span>
                    </h2>
                    <p class="text-gray-400 mt-4 font-light tracking-wide">Desbloqueie a infraestrutura completa e as ferramentas neurais.</p>
                </div>

                <div class="py-8 border-y border-white/5 my-8">
                    <div class="flex items-center justify-center gap-1">
                        <span class="text-gray-500 text-xl font-light">R$</span>
                        <span class="text-6xl font-black text-white tracking-tighter">197</span>
                        <span class="text-pink-500 text-xl font-mono">/mês</span>
                    </div>
                </div>

                <a href="{{ route('checkout') }}" 
                   class="group relative inline-flex w-full items-center justify-center overflow-hidden rounded-xl bg-gradient-to-br from-pink-600 to-purple-700 p-4 font-bold text-white shadow-2xl transition-all duration-300 hover:scale-[1.02] active:scale-95">
                    <span class="relative uppercase tracking-widest">Iniciar Assinatura</span>
                    <div class="absolute inset-0 flex h-full w-full justify-center [transform:skew(-12deg)_translateX(-100%)] group-hover:duration-1000 group-hover:[transform:skew(-12deg)_translateX(100%)]">
                        <div class="relative h-full w-8 bg-white/20"></div>
                    </div>
                </a>

                <div class="mt-8 flex flex-col gap-2">
                    <div class="flex items-center justify-center gap-2 text-xs text-gray-500 uppercase tracking-widest font-mono">
                        <span class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></span>
                        Criptografia de Ponta a Ponta via Stripe
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        @keyframes blob {
            0% { transform: translate(0px, 0px) scale(1); }
            33% { transform: translate(30px, -50px) scale(1.1); }
            66% { transform: translate(-20px, 20px) scale(0.9); }
            100% { transform: translate(0px, 0px) scale(1); }
        }
        .animate-blob { animation: blob 7s infinite; }
        .animation-delay-2000 { animation-delay: 2s; }
        .animation-delay-4000 { animation-delay: 4s; }
    </style>
</x-app-layout>