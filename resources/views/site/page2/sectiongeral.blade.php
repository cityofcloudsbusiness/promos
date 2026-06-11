<!-- SEÇÃO DE PREÇOS / PLANOS -->
<section id="pricing-cyber" class="relative pt-40 pb-20 bg-[#020205] overflow-hidden">
    <!-- Efeitos de Fundo Cyber -->
    <div class="absolute inset-0 z-0 pointer-events-none">
        <div class="absolute top-20 left-1/2 -translate-x-1/2 w-[800px] h-[400px] bg-green-500/10 rounded-full blur-[120px]"></div>
        <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/carbon-fibre.png')] opacity-10"></div>
    </div>

    <div class="container mx-auto px-6 relative z-10">
        <!-- Cabeçalho -->
        <div class="text-center max-w-4xl mx-auto mb-16" data-aos="fade-down">
            <span class="inline-block px-4 py-1 rounded-full text-[10px] font-black tracking-[0.3em] uppercase bg-green-500/10 text-green-400 border border-green-500/20 mb-6">
                Liberação de Sistema
            </span>
            <h2 class="text-4xl md:text-6xl font-black italic uppercase text-white tracking-tighter leading-tight">
                Escolha seu Plano de <br>
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-white via-green-400 to-green-600">Manutenção Ativa</span>
            </h2>
        </div>

        <div class="flex flex-col lg:flex-row justify-center items-center gap-10 max-w-5xl mx-auto">
            
            <!-- PLANO MENSAL -->
            <div class="w-full lg:w-5/12 bg-white/5 backdrop-blur-xl border border-white/10 p-8 rounded-3xl relative overflow-hidden group hover:border-white/30 transition-all" data-aos="fade-right">
                <h3 class="text-2xl font-black uppercase text-white italic mb-2">Mensal</h3>
                <p class="text-slate-400 text-sm mb-6">Sem fidelidade. Cancele quando quiser.</p>
                
                <div class="flex items-end gap-2 mb-6">
                    <span class="text-slate-400 text-xl font-bold">R$</span>
                    <span class="text-5xl font-black text-white italic tracking-tighter">197<span class="text-2xl">,99</span></span>
                    <span class="text-slate-500 mb-2">/mês</span>
                </div>

                <ul class="space-y-4 mb-10 text-sm text-slate-300">
                    <li class="flex items-center gap-3"><svg class="w-5 h-5 text-white/50" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> Hospedagem Premium Cloud</li>
                    <li class="flex items-center gap-3"><svg class="w-5 h-5 text-white/50" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> Certificado SSL Seguro</li>
                    <li class="flex items-center gap-3"><svg class="w-5 h-5 text-white/50" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> Suporte Técnico Ativo</li>
                </ul>

                <a href="{{ route('subscribeWebM') }}" class="block w-full text-center bg-transparent border-2 border-white/20 text-white font-black uppercase italic py-4 rounded-xl hover:bg-white hover:text-black transition-all">
                    Assinar Mensal
                </a>
            </div>

            <!-- PLANO ANUAL (DESTAQUE BRANCO / VERDE / VERMELHO) -->
            <div class="w-full lg:w-7/12 bg-white border-4 border-green-500 p-10 rounded-3xl relative shadow-[0_0_60px_rgba(34,197,94,0.2)] lg:scale-110 z-20" data-aos="fade-left">
                
                <!-- Badge 10% OFF Vermelho (Animado) -->
                <div class="absolute -top-5 right-8 bg-red-600 text-white text-sm font-black uppercase tracking-widest px-6 py-2 rounded-full shadow-[0_0_20px_rgba(220,38,38,0.6)] animate-pulse border-2 border-white">
                    10% de Desconto
                </div>

                <h3 class="text-3xl font-black uppercase text-slate-900 italic mb-2">Anual <span class="text-green-600 text-lg">PRO</span></h3>
                <p class="text-slate-500 text-sm mb-6">Máxima economia para quem foca no longo prazo.</p>
                
                <!-- Preço Pulsante -->
                <div class="flex items-end gap-2 mb-2 relative">
                    <span class="text-slate-900 text-2xl font-bold">R$</span>
                    <span class="text-7xl font-black text-green-600 italic tracking-tighter animate-[pulse_2s_ease-in-out_infinite] drop-shadow-[0_0_15px_rgba(34,197,94,0.4)]">
                        178<span class="text-4xl">,19</span>
                    </span>
                    <span class="text-slate-500 mb-3 font-bold">/mês</span>
                </div>
                
                <p class="text-xs text-red-600 font-bold mb-8 uppercase tracking-wider">
                    *Faturado anualmente por R$ 2.138,29
                </p>

                <ul class="space-y-4 mb-10 text-sm text-slate-700 font-bold">
                    <li class="flex items-center gap-3"><svg class="w-6 h-6 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg> Tudo do plano Mensal</li>
                    <li class="flex items-center gap-3"><svg class="w-6 h-6 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg> Prioridade Máxima de Suporte</li>
                    <li class="flex items-center gap-3"><svg class="w-6 h-6 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg> Economia de R$ 237,59 no ano</li>
                </ul>

                <!-- Setas Indicativas e Botão -->
                <div class="relative mt-8">
                    <div class="absolute -top-12 left-1/2 -translate-x-1/2 flex flex-col items-center animate-bounce">
                        <span class="text-red-600 text-[10px] font-black uppercase mb-1 tracking-widest bg-white px-2 rounded-full">Mais Vantajoso</span>
                        <svg class="w-6 h-6 text-red-600 drop-shadow-[0_0_5px_rgba(220,38,38,0.5)]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path></svg>
                    </div>
                    <a href="{{ route('subscribeWebM') }}" class="block w-full text-center bg-green-500 text-white font-black uppercase italic py-5 rounded-xl hover:bg-green-400 shadow-[0_0_30px_rgba(34,197,94,0.5)] hover:shadow-[0_0_40px_rgba(34,197,94,0.8)] transition-all text-xl transform hover:-translate-y-1">
                        Assinar Plano Anual
                    </a>
                </div>
            </div>

        </div>
    </div>
</section>

<section id="manutencao" class="relative py-32 bg-[#020205] overflow-hidden border-t border-white/5">
    
    <!-- Efeitos de Fundo -->
    <div class="absolute inset-0 z-0 pointer-events-none">
        <div class="absolute top-0 right-0 w-[500px] h-[500px] bg-cyan-900/10 rounded-full blur-[120px]"></div>
        <div class="absolute bottom-0 left-0 w-[600px] h-[600px] bg-purple-900/10 rounded-full blur-[150px]"></div>
        <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/carbon-fibre.png')] opacity-10"></div>
    </div>

    <div class="container mx-auto px-6 relative z-10">
        
        <!-- Cabeçalho da Seção -->
        <div class="text-center max-w-4xl mx-auto mb-20" data-aos="fade-down">
            <span class="inline-block px-4 py-1 rounded-full text-[10px] font-black tracking-[0.3em] uppercase bg-cyan-500/10 text-cyan-400 border border-cyan-500/20 mb-6">
                Transparência Técnica
            </span>
            <h2 class="text-4xl md:text-5xl lg:text-6xl font-black italic uppercase text-white tracking-tighter leading-tight">
                Mas afinal, por que um site precisa de <br>
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 to-purple-500">Manutenção Mensal?</span>
            </h2>
            
            <div class="mt-8 flex justify-center">
                <p class="text-slate-400 text-sm md:text-base lg:text-lg leading-relaxed border-l-2 border-cyan-500 pl-4 text-left md:text-center md:border-l-0 md:border-t-2 md:pt-6 md:max-w-3xl">
                    Um site na internet funciona como um ponto comercial físico: ele não tem apenas o custo de construção, ele exige uma <strong class="text-white">infraestrutura ativa rodando 24 horas por dia</strong> para receber seus clientes. Entenda exatamente para onde vai o seu investimento mensal:
                </p>
            </div>
        </div>

        <!-- Grid dos 4 Pilares -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-20 max-w-6xl mx-auto">
            
            <!-- Pilar 1 -->
            <div class="group relative bg-white/5 backdrop-blur-md p-8 rounded-2xl border border-white/10 hover:border-cyan-500/50 transition-all duration-500 hover:-translate-y-2 overflow-hidden" data-aos="fade-right" data-aos-delay="100">
                <div class="absolute top-0 right-0 w-32 h-32 bg-cyan-500/10 rounded-full blur-3xl group-hover:bg-cyan-500/30 transition-all"></div>
                <div class="mb-6 flex items-center justify-between relative z-10">
                    <div class="p-4 bg-cyan-500/10 rounded-xl border border-cyan-500/20 text-cyan-400 group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M5 12a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v4a2 2 0 01-2 2M5 12a2 2 0 00-2 2v4a2 2 0 002 2h14a2 2 0 002-2v-4a2 2 0 00-2-2m-2-4h.01M17 16h.01"></path></svg>
                    </div>
                    <span class="text-cyan-500/10 font-black text-6xl italic group-hover:text-cyan-500/30 transition-colors">01</span>
                </div>
                <h3 class="text-xl md:text-2xl font-black text-white uppercase italic tracking-tighter mb-3 relative z-10">Hospedagem em Nuvem</h3>
                <p class="text-slate-400 text-xs md:text-sm leading-relaxed relative z-10">
                    Para que o seu site fique visível para qualquer pessoa no mundo, ele precisa estar armazenado dentro de um computador ligado 24h por dia na nuvem (um servidor). A sua taxa mensal cobre esse espaço seguro, garantindo que o seu site carregue em menos de 2 segundos e aguente milhares de acessos simultâneos sem cair.
                </p>
            </div>

            <!-- Pilar 2 -->
            <div class="group relative bg-white/5 backdrop-blur-md p-8 rounded-2xl border border-white/10 hover:border-green-500/50 transition-all duration-500 hover:-translate-y-2 overflow-hidden" data-aos="fade-left" data-aos-delay="200">
                <div class="absolute top-0 right-0 w-32 h-32 bg-green-500/10 rounded-full blur-3xl group-hover:bg-green-500/30 transition-all"></div>
                <div class="mb-6 flex items-center justify-between relative z-10">
                    <div class="p-4 bg-green-500/10 rounded-xl border border-green-500/20 text-green-400 group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                    </div>
                    <span class="text-green-500/10 font-black text-6xl italic group-hover:text-green-500/30 transition-colors">02</span>
                </div>
                <h3 class="text-xl md:text-2xl font-black text-white uppercase italic tracking-tighter mb-3 relative z-10">Segurança Ativa & SSL</h3>
                <p class="text-slate-400 text-xs md:text-sm leading-relaxed relative z-10">
                    A internet exige proteção. Incluímos a renovação e o monitoramento do Certificado SSL — aquele famoso "cadeado verde" (https://) na barra de endereços. Isso garante que os dados dos seus clientes estejam criptografados, evita que o Google marque seu site como "Não Seguro" e protege a sua página contra ataques de hackers ou invasões.
                </p>
            </div>

            <!-- Pilar 3 -->
            <div class="group relative bg-white/5 backdrop-blur-md p-8 rounded-2xl border border-white/10 hover:border-purple-500/50 transition-all duration-500 hover:-translate-y-2 overflow-hidden" data-aos="fade-right" data-aos-delay="300">
                <div class="absolute top-0 right-0 w-32 h-32 bg-purple-500/10 rounded-full blur-3xl group-hover:bg-purple-500/30 transition-all"></div>
                <div class="mb-6 flex items-center justify-between relative z-10">
                    <div class="p-4 bg-purple-500/10 rounded-xl border border-purple-500/20 text-purple-400 group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path></svg>
                    </div>
                    <span class="text-purple-500/10 font-black text-6xl italic group-hover:text-purple-500/30 transition-colors">03</span>
                </div>
                <h3 class="text-xl md:text-2xl font-black text-white uppercase italic tracking-tighter mb-3 relative z-10">Atualizações de Código</h3>
                <p class="text-slate-400 text-xs md:text-sm leading-relaxed relative z-10">
                    O ecossistema digital muda todo dia. Navegadores como o Google Chrome, Safari e os sistemas de celulares (Android e iOS) atualizam constantemente. Nós revisamos e atualizamos o código do seu site mensalmente para garantir que o design nunca "quebre", mantendo o layout sempre perfeito e adaptado para qualquer tela de celular moderna.
                </p>
            </div>

            <!-- Pilar 4 -->
            <div class="group relative bg-white/5 backdrop-blur-md p-8 rounded-2xl border border-white/10 hover:border-pink-500/50 transition-all duration-500 hover:-translate-y-2 overflow-hidden" data-aos="fade-left" data-aos-delay="400">
                <div class="absolute top-0 right-0 w-32 h-32 bg-pink-500/10 rounded-full blur-3xl group-hover:bg-pink-500/30 transition-all"></div>
                <div class="mb-6 flex items-center justify-between relative z-10">
                    <div class="p-4 bg-pink-500/10 rounded-xl border border-pink-500/20 text-pink-400 group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                    </div>
                    <span class="text-pink-500/10 font-black text-6xl italic group-hover:text-pink-500/30 transition-colors">04</span>
                </div>
                <h3 class="text-xl md:text-2xl font-black text-white uppercase italic tracking-tighter mb-3 relative z-10">Suporte & Alterações</h3>
                <p class="text-slate-400 text-xs md:text-sm leading-relaxed relative z-10">
                    Mudou de telefone? Quer trocar uma foto de um produto, alterar um texto ou atualizar o preço de um serviço? Você não precisa pagar uma fortuna por hora para um programador fazer isso. A manutenção já inclui um pacote de alterações básicas mensais. É só nos acionar que nós resolvemos para você.
                </p>
            </div>
        </div>

        <!-- Conclusão Lógica / Call to Action -->
        <div class="relative bg-gradient-to-r from-cyan-900/40 via-purple-900/40 to-pink-900/40 rounded-3xl p-[2px] max-w-5xl mx-auto overflow-hidden" data-aos="zoom-in-up">
            <div class="absolute inset-0 bg-white/5 animate-[pulse_6s_ease-in-out_infinite]"></div>
            <div class="bg-[#050508] backdrop-blur-xl p-8 md:p-12 rounded-[22px] relative z-10 flex flex-col md:flex-row items-center gap-8 md:gap-12">
                <div class="w-full md:w-2/3">
                    <h3 class="text-3xl font-black italic uppercase text-white mb-4 leading-none tracking-tighter">
                        O Risco é Nosso.<br><span class="text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 to-purple-500">O Foco é Seu.</span>
                    </h3>
                    <p class="text-slate-400 text-sm md:text-base leading-relaxed">
                        No modelo tradicional, você gastaria milhares de reais para desenvolver o site e, ainda assim, teria que pagar a hospedagem e o suporte por fora. Conosco, o risco de desenvolvimento é nosso. Você foca nas vendas do seu negócio e nós cuidamos para que a sua máquina de vendas nunca pare de rodar.
                    </p>
                </div>
                <div class="w-full md:w-1/3 flex justify-center md:justify-end">
                    <a href="#contato" class="group relative inline-flex items-center justify-center bg-white text-black font-black px-8 py-4 rounded-full transition-all hover:scale-105 hover:bg-cyan-400 shadow-[0_0_30px_rgba(34,211,238,0.2)] hover:shadow-[0_0_40px_rgba(34,211,238,0.5)] uppercase italic tracking-widest text-[11px] w-full md:w-auto">
                        <span>Iniciar Projeto Agora</span>
                        <svg class="w-4 h-4 ml-2 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M13 7l5 5m0 0l-5 5m5-5H6"></path></svg>
                    </a>
                </div>
            </div>
        </div>

    </div>
</section>