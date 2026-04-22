<section class="relative bg-white py-24 overflow-hidden">
    <div class="container mx-auto px-6 relative z-10">
        <div class="flex flex-col lg:flex-row items-center gap-12">
            
            <div class="w-full lg:w-1/2" data-aos="fade-right">
                <h2 class="text-4xl md:text-5xl font-extrabold text-slate-900 mb-6 leading-tight">
                    Um ecossistema <span class="text-purple-600">completo</span> para o seu domínio digital.
                </h2>
                <p class="text-lg text-slate-600 mb-8">
                    Não entregamos apenas um site. Entregamos a estrutura que as grandes agências usam para escalar, agora acessível para você.
                </p>
                <div class="flex gap-4">
                    <button class="bg-purple-600 hover:bg-purple-700 text-white px-8 py-4 rounded-full font-bold transition-all transform hover:scale-105 shadow-lg">
                        Começar Agora
                    </button>
                </div>
            </div>

            <div class="w-full lg:w-1/2 relative h-[500px] lg:h-[600px]" data-aos="zoom-in-up">
                <div class="absolute -top-10 -right-10 w-32 h-32 bg-purple-100 rounded-full mix-blend-multiply animate-blob"></div>
                <div class="absolute -bottom-10 -left-10 w-32 h-32 bg-indigo-100 rounded-full mix-blend-multiply animate-blob animation-delay-2000"></div>

                <div class="relative w-full h-full transform lg:rotate-[-5deg]">
                    
                    <div class="absolute top-0 left-0 w-[70%] h-64 rounded-2xl overflow-hidden shadow-2xl border-4 border-white z-20 animate-puzzle-1 transform -skew-x-6 group">
                        <img src="{{ asset('images/job1.jpg') }}" class="w-full h-full object-cover skew-x-6 scale-110 group-hover:scale-125 transition-transform duration-700" alt="Job 1">
                        <div class="absolute inset-0 bg-purple-900/20 group-hover:bg-transparent transition-colors"></div>
                    </div>

                    <div class="absolute top-10 right-0 w-[35%] h-48 rounded-2xl overflow-hidden shadow-xl border-4 border-white z-10 animate-puzzle-2 transform skew-y-3 group">
                        <img src="{{ asset('images/job2.jpg') }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700" alt="Job 2">
                    </div>

                    <div class="absolute bottom-10 left-10 w-[85%] h-56 rounded-2xl overflow-hidden shadow-2xl border-4 border-white z-30 animate-puzzle-3 transform -skew-x-12 group">
                        <img src="{{ asset('images/job3.jpg') }}" class="w-full h-full object-cover skew-x-12 scale-110 group-hover:scale-125 transition-transform duration-700" alt="Job 3">
                        <div class="absolute inset-0 bg-gradient-to-tr from-purple-600/40 to-transparent opacity-60"></div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</section>

<style>
    /* Manter sua animação blob */
    @keyframes blob {
        0%, 100% { transform: translate(0px, 0px) scale(1); }
        33% { transform: translate(30px, -50px) scale(1.1); }
        66% { transform: translate(-20px, 20px) scale(0.9); }
    }
    .animate-blob { animation: blob 7s infinite; }
    .animation-delay-2000 { animation-delay: 2s; }

    /* ANIMAÇÕES DO QUEBRA-CABEÇA (Movimentos independentes para parecer encaixe vivo) */
    @keyframes puzzle-float-1 {
        0%, 100% { transform: translate(0, 0) -skew-x-6; }
        50% { transform: translate(-10px, 15px) -skew-x-6; }
    }
    @keyframes puzzle-float-2 {
        0%, 100% { transform: translate(0, 0) skew-y-3; }
        50% { transform: translate(15px, -10px) skew-y-3; }
    }
    @keyframes puzzle-float-3 {
        0%, 100% { transform: translate(0, 0) -skew-x-12; }
        50% { transform: translate(5px, -15px) -skew-x-12; }
    }

    .animate-puzzle-1 { animation: puzzle-float-1 6s ease-in-out infinite; }
    .animate-puzzle-2 { animation: puzzle-float-2 5s ease-in-out infinite; }
    .animate-puzzle-3 { animation: puzzle-float-3 7s ease-in-out infinite; }

    /* Performance Gamer */
    .rounded-2xl { backface-visibility: hidden; will-change: transform; }
</style>