<x-guest-layout>
    <section class="relative py-24 bg-[#020205] overflow-hidden" x-data="contactPage()">
        <div class="absolute inset-0 opacity-20 pointer-events-none">
            <div class="absolute inset-0 bg-[radial-gradient(circle_at_50%_50%,#0ea5e966,transparent_70%)]"></div>
        </div>

        <div class="container mx-auto px-6 relative z-10">
            <div class="max-w-5xl mx-auto text-center mb-16">
                <p class="text-sm uppercase tracking-[0.35em] text-cyan-400 mb-4">Contato</p>
                <h1 class="text-4xl md:text-5xl font-black text-white tracking-tight">{{ $contextData['pageTitle'] ?? 'Fale Conosco' }}</h1>
                <p class="mt-4 text-gray-400 max-w-3xl mx-auto">Preencha o formulário abaixo e nossa equipe irá responder em até 24 horas com as melhores opções para você.</p>
            </div>

            @if(session('success'))
                <div class="mb-10 rounded-3xl border border-emerald-500/30 bg-emerald-500/10 p-6 text-emerald-200">
                    {{ session('success') }}
                </div>
            @endif

            @if($errors->any())
                <div class="mb-10 rounded-3xl border border-red-500/20 bg-red-500/10 p-6 text-red-100">
                    <ul class="list-disc list-inside space-y-2">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                <div class="space-y-6">
                    <div class="rounded-3xl border border-white/10 bg-white/5 p-8 shadow-[0_0_60px_rgba(15,23,42,0.35)]">
                        <h2 class="text-2xl font-bold text-white mb-4">O que você precisa?</h2>
                        <p class="text-gray-400 leading-relaxed">Conte-nos sobre o seu projeto e o seu objetivo. Quanto mais detalhes, melhor para adaptarmos nossa proposta ao seu caso.</p>
                    </div>

                    <div class="space-y-4">
                        <div class="rounded-3xl border border-white/10 bg-white/5 p-6">
                            <p class="text-sm uppercase tracking-[0.3em] text-cyan-400 mb-4">Atendimento</p>
                            <p class="text-gray-300">Email: contato@cityofclouds.com.br</p>
                            <p class="text-gray-300">Telefone: +55 (34) 99999-9999</p>
                        </div>
                        <div class="rounded-3xl border border-white/10 bg-white/5 p-6">
                            <p class="text-sm uppercase tracking-[0.3em] text-cyan-400 mb-4">Localização</p>
                            <p class="text-gray-300">Uberlândia, MG</p>
                            <p class="text-gray-300">Brasil</p>
                        </div>
                    </div>
                </div>

                <form action="{{ route('contact.send') }}" method="POST" class="space-y-6 rounded-3xl border border-white/10 bg-black/60 p-8 shadow-[0_0_80px_rgba(0,0,0,0.6)]" @submit.prevent="sendMessage()" x-ref="contactForm">
                    @csrf

                    <div>
                        <label class="block text-sm font-semibold text-gray-300 mb-2" for="name">Seu Nome</label>
                        <input id="name" name="name" type="text" value="{{ old('name') }}" placeholder="Nome completo" class="w-full rounded-3xl border border-white/10 bg-white/5 px-5 py-4 text-white placeholder:text-gray-500 focus:border-cyan-500 focus:outline-none focus:ring-2 focus:ring-cyan-500/20" required>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-300 mb-2" for="email">Seu Email</label>
                        <input id="email" name="email" type="email" value="{{ old('email') }}" placeholder="seu@email.com" class="w-full rounded-3xl border border-white/10 bg-white/5 px-5 py-4 text-white placeholder:text-gray-500 focus:border-cyan-500 focus:outline-none focus:ring-2 focus:ring-cyan-500/20" required>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-300 mb-2" for="subject">Assunto</label>
                        <input id="subject" name="subject" type="text" value="{{ old('subject', $contextData['subject'] ?? '') }}" placeholder="Assunto da mensagem" class="w-full rounded-3xl border border-white/10 bg-white/5 px-5 py-4 text-white placeholder:text-gray-500 focus:border-cyan-500 focus:outline-none focus:ring-2 focus:ring-cyan-500/20" required>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-300 mb-2" for="message">Mensagem</label>
                        <textarea id="message" name="message" rows="6" placeholder="Escreva sua mensagem" class="w-full rounded-3xl border border-white/10 bg-white/5 px-5 py-4 text-white placeholder:text-gray-500 focus:border-cyan-500 focus:outline-none focus:ring-2 focus:ring-cyan-500/20" required>{{ old('message', $contextData['message'] ?? '') }}</textarea>
                    </div>

                    <button type="submit" class="w-full rounded-3xl bg-cyan-500 px-6 py-4 text-sm font-black uppercase tracking-[0.24em] text-black transition hover:bg-cyan-400">Enviar Mensagem</button>
                </form>
            </div>
        </div>
        <template x-if="successOverlay">
            <div class="fixed inset-0 z-[200] bg-black flex items-center justify-center overflow-hidden" style="contain: layout style paint; isolation: isolate;">
                <div class="absolute inset-0 bg-cyan-500/10 animate-pulse"></div>

                <div class="relative z-10 flex flex-wrap justify-center max-w-4xl px-10">
                    <template x-for="(word, i) in finalPhrase.split(' ')">
                        <span x-text="word"
                              class="word-beam text-4xl md:text-7xl font-black text-white italic uppercase tracking-tighter mx-2"
                              :style="`animation-delay: ${i * 0.1}s`"></span>
                    </template>
                </div>
            </div>
        </template>
    </section>

    <style>
        .word-beam {
            opacity: 0;
            transform: scale(3) translateY(100px) translateZ(0);
            filter: blur(20px);
            animation: contact-beam-in 0.8s cubic-bezier(0.075, 0.82, 0.165, 1) forwards;
            text-shadow: 0 0 30px rgba(34, 211, 238, 0.8);
            will-change: transform, opacity, filter;
            backface-visibility: hidden;
        }

        @keyframes contact-beam-in {
            0%   { opacity: 0; transform: scale(3)   translateY(100px) translateZ(0); filter: blur(20px) brightness(3); }
            100% { opacity: 1; transform: scale(1)   translateY(0)     translateZ(0); filter: blur(0)    brightness(1); }
        }

        .word-beam:nth-child(even) { animation-name: contact-beam-alt; }
        @keyframes contact-beam-alt {
            0%   { opacity: 0; transform: scale(0.5) translateX(-200px) translateZ(0); filter: blur(15px); }
            100% { opacity: 1; transform: scale(1)   translateX(0)      translateZ(0); filter: blur(0);    }
        }
    </style>

    <script>
    function contactPage() {
        return {
            successOverlay: false,
            finalPhrase: "AGORA VAMOS ALAVANCAR O SEU NEGÓCIO",
            sendMessage() {
                this.successOverlay = true;
                setTimeout(() => {
                    this.$refs.contactForm.submit();
                }, 2800);
            }
        }
    }
    </script>
</x-guest-layout>
