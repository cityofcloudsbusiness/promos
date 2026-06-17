<!DOCTYPE html>
<html lang="pt-BR" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gestão de Pessoas | City of Clouds</title>
    <meta name="description" content="Construa sua carreira de liderança. Aprenda a gerir equipes, criar cultura de alta performance e estruturar pessoas no ambiente corporativo moderno.">
    @fonts
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>
<body class="bg-slate-50 text-slate-900 antialiased overflow-x-hidden">

<!-- NAVBAR -->
<header id="navbar" class="fixed top-0 left-0 right-0 z-50 transition-all duration-300">
    <nav class="border-b border-slate-200/70 bg-white/92 backdrop-blur-xl">
        <div class="w-full px-4 sm:px-8 lg:px-12">
            <div class="flex items-center justify-between h-16 py-2">
                <a href="/" class="flex items-center gap-3 shrink-0">
                    <img src="{{ Vite::asset('resources/imgs/logo_otimizada.png') }}" alt="City of Clouds" class="h-9 w-auto">
                </a>
                <div class="hidden lg:flex items-center gap-7">
                    <a href="/gestao-pessoas" class="text-sm text-violet-700 font-semibold border-b-2 border-violet-600 pb-0.5">Gestão de Pessoas</a>
                    <a href="/ia" class="text-sm text-slate-500 hover:text-indigo-800 font-medium transition-colors">IA Aplicada</a>
                    <a href="/tecnologia" class="text-sm text-slate-500 hover:text-emerald-700 font-medium transition-colors">Tecnologia</a>
                    <a href="/logistica" class="text-sm text-slate-500 hover:text-amber-700 font-medium transition-colors">Logística</a>
                    <a href="/gestao" class="text-sm text-slate-500 hover:text-indigo-800 font-medium transition-colors">Gestão</a>
                </div>
                <div class="flex items-center gap-3">
                    <a href="/" class="hidden sm:inline-flex items-center gap-1.5 px-4 py-2 rounded-xl border border-slate-200 text-slate-600 text-sm font-medium hover:bg-slate-50 transition-all">
                        ← Voltar
                    </a>
                    <a href="/#contato" class="inline-flex items-center gap-1.5 px-4 py-2.5 rounded-xl bg-violet-700 hover:bg-violet-800 text-white text-sm font-semibold transition-all shadow-lg shadow-violet-700/20">
                        Começar Agora
                    </a>
                </div>
            </div>
        </div>
    </nav>
</header>

<!-- HERO com vídeo -->
<section class="relative pt-16 min-h-screen flex flex-col items-center justify-center overflow-hidden bg-slate-900">
    <!-- Video background -->
    <video autoplay muted loop playsinline class="absolute inset-0 w-full h-full object-cover opacity-25">
        <source src="/videos/mixkit-business-people-at-work-meeting-4809-hd-ready.mp4" type="video/mp4">
    </video>
    <!-- Gradient overlay -->
    <div class="absolute inset-0 bg-gradient-to-b from-violet-900/70 via-slate-900/60 to-slate-900/90"></div>
    <!-- Blueprint grid -->
    <div class="absolute inset-0 pointer-events-none" style="background-image:linear-gradient(rgba(167,139,250,0.06) 1px,transparent 1px),linear-gradient(90deg,rgba(167,139,250,0.06) 1px,transparent 1px);background-size:48px 48px;"></div>

    <div class="relative z-10 text-center px-4 max-w-4xl mx-auto">
        <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full border border-violet-400/30 bg-violet-500/10 text-violet-300 text-[11px] font-bold tracking-widest uppercase mb-8">
            <span class="w-1.5 h-1.5 rounded-full bg-violet-400 animate-pulse"></span>
            Área: Gestão de Pessoas
        </div>
        <h1 class="text-4xl sm:text-5xl lg:text-6xl font-bold leading-tight text-white tracking-tight mb-6">
            Construa sua posição<br/>
            <span class="text-violet-400">antes de qualquer empresa</span><br/>
            te contratar.
        </h1>
        <p class="text-slate-300 text-lg leading-relaxed max-w-2xl mx-auto mb-10">
            Aprenda a gerir pessoas, criar cultura de alta performance e estruturar equipes no formato que as melhores empresas operam — seja como gestor, empreendedor ou estudante em transição.
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="/#contato" class="inline-flex items-center justify-center gap-2 px-7 py-4 rounded-2xl bg-violet-600 hover:bg-violet-700 text-white font-bold text-base transition-all shadow-xl shadow-violet-900/30">
                Começar Trilha de Liderança
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
            </a>
            <a href="#o-que-voce-aprende" class="inline-flex items-center justify-center gap-2 px-7 py-4 rounded-2xl border border-white/20 hover:border-white/40 text-white font-semibold text-base transition-all">
                Ver o que você aprende
            </a>
        </div>
    </div>

    <!-- Stats -->
    <div class="relative z-10 w-full max-w-4xl mx-auto px-4 mt-16">
        <div class="grid grid-cols-3 gap-4">
            <div class="text-center p-4 rounded-2xl border border-white/10 bg-white/5 backdrop-blur-sm">
                <div class="text-2xl font-bold text-white">+3.200</div>
                <div class="text-xs text-slate-400 mt-1 uppercase tracking-wide">Gestores formados</div>
            </div>
            <div class="text-center p-4 rounded-2xl border border-white/10 bg-white/5 backdrop-blur-sm">
                <div class="text-2xl font-bold text-white">+180h</div>
                <div class="text-xs text-slate-400 mt-1 uppercase tracking-wide">Conteúdo de liderança</div>
            </div>
            <div class="text-center p-4 rounded-2xl border border-white/10 bg-white/5 backdrop-blur-sm">
                <div class="text-2xl font-bold text-violet-400">96%</div>
                <div class="text-xs text-slate-400 mt-1 uppercase tracking-wide">Empregabilidade</div>
            </div>
        </div>
    </div>
</section>

<!-- O QUE VOCÊ APRENDE -->
<section id="o-que-voce-aprende" class="py-24 bg-white">
    <div class="max-w-5xl mx-auto px-6">
        <div class="text-center mb-16">
            <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full border border-violet-200 bg-violet-50 text-violet-700 text-[11px] font-bold tracking-widest uppercase mb-6">// Trilha de Aprendizado</div>
            <h2 class="text-3xl sm:text-4xl font-bold text-slate-900 tracking-tight mb-4">
                Do zero ao<br/><span class="text-violet-700">gestor de alta performance</span>
            </h2>
            <p class="text-slate-500 max-w-xl mx-auto">Estrutura progressiva para quem quer liderar — sem precisar de anos de experiência para começar.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @php
            $modules = [
                ['num'=>'01','color'=>'violet','title'=>'Fundamentos de Liderança Corporativa','desc'=>'Como as empresas modernas estruturam hierarquia, papéis e responsabilidades. Entenda o mapa antes de entrar na sala.','tags'=>['Hierarquia','Papéis','Cultura']],
                ['num'=>'02','color'=>'violet','title'=>'Gestão de Pessoas com OKRs','desc'=>'Aprenda a definir metas claras, acompanhar indicadores e criar ciclos de feedback que geram performance real.','tags'=>['OKRs','KPIs','Feedback']],
                ['num'=>'03','color'=>'violet','title'=>'Cultura Organizacional & Clima','desc'=>'Como construir ambientes de trabalho onde equipes querem ficar e performar. Cultura não é poster na parede.','tags'=>['Cultura','Rh Estratégico','Retenção']],
                ['num'=>'04','color'=>'violet','title'=>'Recrutamento e Onboarding Estruturado','desc'=>'Monte processos seletivos eficientes e onboarding que reduz tempo de ramp-up em até 60%.','tags'=>['Recrutamento','Onboarding','Processos']],
                ['num'=>'05','color'=>'violet','title'=>'Liderança para Microempreendedores','desc'=>'Gerir uma equipe de 2 ou 20 pessoas exige os mesmos princípios. Aplique gestão profissional mesmo em micro-negócios.','tags'=>['MEI','Pequenos Times','Delegação']],
                ['num'=>'06','color'=>'violet','title'=>'Mentoria, Coaching e Desenvolvimento','desc'=>'Desenvolva as pessoas ao seu redor. Líderes que multiplicam líderes escalam mais rápido e com menos retrabalho.','tags'=>['Mentoria','Coaching','Desenvolvimento']],
            ];
            @endphp
            @foreach($modules as $mod)
            <div class="flex gap-4 p-6 rounded-2xl border border-slate-200 hover:border-violet-300 hover:shadow-lg hover:shadow-violet-50 transition-all duration-300 group">
                <div class="shrink-0 w-12 h-12 rounded-2xl bg-violet-100 border border-violet-200 flex items-center justify-center">
                    <span class="text-xs font-mono font-bold text-violet-700">{{ $mod['num'] }}</span>
                </div>
                <div class="flex-1 min-w-0">
                    <h3 class="font-bold text-slate-900 text-sm mb-1.5 group-hover:text-violet-800 transition-colors">{{ $mod['title'] }}</h3>
                    <p class="text-xs text-slate-500 leading-relaxed mb-3">{{ $mod['desc'] }}</p>
                    <div class="flex flex-wrap gap-1.5">
                        @foreach($mod['tags'] as $tag)
                        <span class="px-2 py-0.5 rounded-full bg-violet-50 border border-violet-200 text-violet-700 text-[10px] font-semibold">{{ $tag }}</span>
                        @endforeach
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- PARA QUEM É -->
<section class="py-24 bg-violet-900 relative overflow-hidden">
    <div class="absolute inset-0 pointer-events-none" style="background-image:linear-gradient(rgba(255,255,255,0.03) 1px,transparent 1px),linear-gradient(90deg,rgba(255,255,255,0.03) 1px,transparent 1px);background-size:48px 48px;"></div>
    <div class="relative max-w-5xl mx-auto px-6">
        <div class="text-center mb-16">
            <h2 class="text-3xl sm:text-4xl font-bold text-white tracking-tight mb-4">
                Quem se beneficia<br/><span class="text-violet-300">desta trilha</span>
            </h2>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @php
            $personas = [
                ['icon'=>'M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07','title'=>'Estudantes em Transição','desc'=>'Ainda não trabalha mas quer entrar em empresas estruturadas já com mentalidade de gestor — não de executor.','benefit'=>'Entra preparado e se diferencia de 95% dos candidatos'],
                ['icon'=>'M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z','title'=>'Microempreendedores','desc'=>'Tem um negócio pequeno mas quer gerir pessoas como as grandes empresas — com processos e não na base do improviso.','benefit'=>'Reduz turnover em até 70% com onboarding estruturado'],
                ['icon'=>'M20.25 14.15v4.25c0 1.094-.787 2.036-1.872 2.18-2.087.277-4.216.42-6.378.42s-4.291-.143-6.378-.42c-1.085-.144-1.872-1.086-1.872-2.18v-4.25m16.5 0a2.18 2.18 0 00.75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 00-3.413-.387m4.5 8.006c-.194.165-.42.295-.673.38A23.978 23.978 0 0112 15.75c-2.648 0-5.195-.429-7.577-1.22a2.016 2.016 0 01-.673-.38m0 0A2.18 2.18 0 013 12.489V8.706c0-1.081.768-2.015 1.837-2.175a48.111 48.111 0 013.413-.387m7.5 0V5.25A2.25 2.25 0 0013.5 3h-3a2.25 2.25 0 00-2.25 2.25v.894m7.5 0a48.667 48.667 0 00-7.5 0M12 12.75h.008v.008H12v-.008z','title'=>'Profissionais em Promoção','desc'=>'Já trabalha mas quer assumir posições de liderança. Precisa da linguagem e das ferramentas que gestores usam.','benefit'=>'Promovido 2x mais rápido com o vocabulário e as ferramentas certas'],
            ];
            @endphp
            @foreach($personas as $persona)
            <div class="p-6 rounded-2xl bg-white/8 border border-white/12 hover:bg-white/12 transition-all">
                <div class="w-12 h-12 rounded-2xl bg-violet-600/40 border border-violet-400/30 flex items-center justify-center mb-4">
                    <svg class="w-6 h-6 text-violet-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="{{ $persona['icon'] }}"/></svg>
                </div>
                <h3 class="font-bold text-white text-base mb-2">{{ $persona['title'] }}</h3>
                <p class="text-violet-200 text-sm leading-relaxed mb-4">{{ $persona['desc'] }}</p>
                <div class="flex items-start gap-2 p-3 rounded-xl bg-violet-600/20 border border-violet-400/20">
                    <span class="text-emerald-400 text-xs mt-0.5 shrink-0">✓</span>
                    <span class="text-emerald-300 text-xs font-medium">{{ $persona['benefit'] }}</span>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- CTA -->
<section class="py-20 bg-white border-t border-slate-200/60">
    <div class="max-w-2xl mx-auto px-6 text-center">
        <h2 class="text-3xl font-bold text-slate-900 mb-4">Pronto para liderar<br/><span class="text-violet-700">com método?</span></h2>
        <p class="text-slate-500 mb-8">Diagnóstico gratuito em 48h. Descubra exatamente qual módulo se encaixa no seu momento atual.</p>
        <div class="flex flex-col sm:flex-row gap-3 justify-center">
            <a href="/#contato" class="inline-flex items-center justify-center gap-2 px-8 py-4 rounded-2xl bg-violet-700 hover:bg-violet-800 text-white font-bold text-base transition-all shadow-xl shadow-violet-700/20">
                Solicitar Diagnóstico Gratuito
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
            </a>
            <a href="/" class="inline-flex items-center justify-center gap-2 px-8 py-4 rounded-2xl border border-slate-200 text-slate-600 font-semibold text-base hover:bg-slate-50 transition-all">
                Ver outras áreas
            </a>
        </div>
    </div>
</section>

<script>
(function(){
    var navbar = document.getElementById('navbar');
    window.addEventListener('scroll', function(){
        navbar.classList.toggle('navbar-scrolled', window.scrollY > 40);
    }, {passive:true});
})();
</script>
</body>
</html>
