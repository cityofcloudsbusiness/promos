<section id="contato-ia" class="relative py-24 bg-black overflow-hidden" x-data="neuralContact()">
    <div class="absolute inset-0 opacity-20 pointer-events-none">
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_50%_50%,#22d3ee22,transparent_70%)]"></div>
    </div>

    <div class="container mx-auto px-6 relative z-10">
        <div class="flex flex-col lg:flex-row items-center gap-16">
            
            <div class="w-full lg:w-1/2" data-aos="fade-right">
                <header class="mb-10">
                    <h2 class="text-4xl lg:text-6xl font-black italic uppercase text-white tracking-tighter">
                        Iniciar <span class="text-cyan-400">Sincronia</span>
                    </h2>
                    <p class="text-slate-500 font-mono text-xs uppercase tracking-[0.3em] mt-2">Protocolo de Expansão Digital v1.0</p>
                </header>

                <form @submit.prevent="sendProtocol" class="space-y-4">
                    <div class="relative group">
                        <input type="text" placeholder="SEU NOME" class="w-full bg-white/5 border border-white/10 p-4 rounded-xl text-white font-black placeholder:text-slate-700 focus:border-cyan-500 focus:bg-white/10 transition-all outline-none italic uppercase tracking-widest text-sm">
                        <div class="absolute bottom-0 left-0 h-[2px] w-0 bg-cyan-500 group-focus-within:w-full transition-all duration-500"></div>
                    </div>
                    
                    <div class="relative group">
                        <input type="email" placeholder="EMAIL DE CONTATO" class="w-full bg-white/5 border border-white/10 p-4 rounded-xl text-white font-black placeholder:text-slate-700 focus:border-cyan-500 focus:bg-white/10 transition-all outline-none italic uppercase tracking-widest text-sm">
                        <div class="absolute bottom-0 left-0 h-[2px] w-0 bg-cyan-500 group-focus-within:w-full transition-all duration-500"></div>
                    </div>

                    <div class="relative group">
                        <textarea rows="4" placeholder="QUAL O SEU DESAFIO?" class="w-full bg-white/5 border border-white/10 p-4 rounded-xl text-white font-black placeholder:text-slate-700 focus:border-cyan-500 focus:bg-white/10 transition-all outline-none italic uppercase tracking-widest text-sm resize-none"></textarea>
                    </div>

                    <button type="submit" class="w-full bg-cyan-500 hover:bg-white text-black font-black py-5 rounded-xl transition-all transform hover:scale-[1.02] uppercase italic tracking-[0.2em] shadow-[0_0_30px_rgba(34,211,238,0.3)]">
                        Enviar Mensagem
                    </button>
                </form>
            </div>

            <div class="w-full lg:w-1/2 flex justify-center items-center relative min-h-[400px]">
                <div class="ai-orb-container relative">
                    <div class="orb-layer layer-1"></div>
                    <div class="orb-layer layer-2"></div>
                    <div class="orb-layer layer-3"></div>
                    <div class="orb-core flex items-center justify-center">
                        <div class="orb-inner"></div>
                        <svg class="w-12 h-12 text-white animate-pulse" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <template x-if="successOverlay">
        <div class="fixed inset-0 z-[200] bg-black flex items-center justify-center overflow-hidden">
            <div class="absolute inset-0 bg-cyan-500/10 animate-pulse"></div>
            
            <div class="relative z-10 flex flex-wrap justify-center max-w-4xl px-10">
                <template x-for="(word, i) in finalPhrase.split(' ')">
                    <span x-text="word" 
                          class="word-beam text-4xl md:text-7xl font-black text-white italic uppercase tracking-tighter mx-2"
                          :style="`animation-delay: ${i * 0.1}s`"></span>
                </template>
            </div>

            <button @click="successOverlay = false" class="absolute bottom-20 text-cyan-400 font-mono text-xs uppercase tracking-[0.5em] border border-cyan-400/30 px-6 py-2 hover:bg-cyan-400 hover:text-black transition-all">
                Reiniciar Terminal
            </button>
        </div>
    </template>
</section>

<style>
    /* ANIMAÇÃO DA ORB IA (CORTANA) */
    .ai-orb-container {
        width: 300px;
        height: 300px;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .orb-layer {
        position: absolute;
        border-radius: 50%;
        border: 2px solid #22d3ee;
        width: 100%;
        height: 100%;
        animation: orb-pulse 4s infinite linear;
        opacity: 0.3;
    }
    .layer-2 { width: 80%; height: 80%; animation-delay: -1s; border-color: #8b5cf6; }
    .layer-3 { width: 60%; height: 60%; animation-delay: -2s; border-color: #ec4899; }
    
    @keyframes orb-pulse {
        0% { transform: scale(1) rotate(0deg); opacity: 0.1; }
        50% { transform: scale(1.1) rotate(180deg); opacity: 0.4; }
        100% { transform: scale(1) rotate(360deg); opacity: 0.1; }
    }

    .orb-core {
        width: 120px;
        height: 120px;
        background: radial-gradient(circle, #22d3ee, #0891b2);
        border-radius: 50%;
        box-shadow: 0 0 50px #22d3ee;
        position: relative;
        z-index: 5;
    }

    /* ANIMAÇÃO DOS FEIXES DE LUZ (SUCESSO) */
    .word-beam {
        opacity: 0;
        transform: scale(3) translateY(100px);
        filter: blur(20px);
        animation: light-beam-in 0.8s cubic-bezier(0.075, 0.82, 0.165, 1) forwards;
        text-shadow: 0 0 30px rgba(34, 211, 238, 0.8);
    }

    @keyframes light-beam-in {
        0% { opacity: 0; transform: scale(5) translateY(200px); filter: blur(50px) brightness(5); }
        100% { opacity: 1; transform: scale(1) translateY(0); filter: blur(0) brightness(1); }
    }

    /* Vindo de cantos diferentes (Randomização Visual) */
    .word-beam:nth-child(even) { animation-name: light-beam-alt; }
    @keyframes light-beam-alt {
        0% { opacity: 0; transform: scale(0) translateX(-300px); filter: blur(30px); }
        100% { opacity: 1; transform: scale(1) translateX(0); filter: blur(0); }
    }
</style>

<script>
function neuralContact() {
    return {
        successOverlay: false,
        finalPhrase: "AGORA VAMOS ALAVANCAR O SEU NEGÓCIO",
        sendProtocol() {
            // Aqui você dispararia seu AJAX/Laravel Controller
            this.successOverlay = true;
            
            // Som futurista opcional (se quiser adicionar no futuro)
            // playSynthSound();
        }
    }
}
</script>