<!DOCTYPE html>
<html lang="pt-BR" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gestão Corporativa | City of Clouds</title>
    <meta name="description" content="Processos que escalam. Decisões que funcionam. OKRs, dashboards e metodologia de gestão para empresas de alto crescimento.">
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
                    <a href="/gestao-pessoas" class="text-sm text-slate-500 hover:text-violet-700 font-medium transition-colors">Gestão de Pessoas</a>
                    <a href="/ia" class="text-sm text-slate-500 hover:text-indigo-800 font-medium transition-colors">IA Aplicada</a>
                    <a href="/tecnologia" class="text-sm text-slate-500 hover:text-emerald-700 font-medium transition-colors">Tecnologia</a>
                    <a href="/logistica" class="text-sm text-slate-500 hover:text-amber-700 font-medium transition-colors">Logística</a>
                    <a href="/gestao" class="text-sm text-indigo-800 font-semibold border-b-2 border-indigo-700 pb-0.5">Gestão</a>
                </div>
                <div class="flex items-center gap-3">
                    <a href="/" class="hidden sm:inline-flex items-center gap-1.5 px-4 py-2 rounded-xl border border-slate-200 text-slate-600 text-sm font-medium hover:bg-slate-50 transition-all">← Voltar</a>
                    <a href="/#contato" class="inline-flex items-center gap-1.5 px-4 py-2.5 rounded-xl bg-indigo-900 hover:bg-indigo-800 text-white text-sm font-semibold transition-all shadow-lg shadow-indigo-900/20">Começar Diagnóstico</a>
                </div>
            </div>
        </div>
    </nav>
</header>

<!-- HERO com vídeo -->
<section class="relative pt-16 min-h-screen flex flex-col items-center justify-center overflow-hidden bg-slate-900">
    <video autoplay muted loop playsinline class="absolute inset-0 w-full h-full object-cover opacity-20">
        <source src="/videos/mixkit-hands-of-a-wrist-watch-3653-hd-ready.mp4" type="video/mp4">
    </video>
    <div class="absolute inset-0 bg-gradient-to-b from-indigo-950/80 via-slate-900/70 to-slate-900/95"></div>
    <div class="absolute inset-0 pointer-events-none" style="background-image:linear-gradient(rgba(99,102,241,0.06) 1px,transparent 1px),linear-gradient(90deg,rgba(99,102,241,0.06) 1px,transparent 1px);background-size:48px 48px;"></div>

    <div class="relative z-10 text-center px-4 max-w-4xl mx-auto">
        <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full border border-indigo-400/30 bg-indigo-500/10 text-indigo-300 text-[11px] font-bold tracking-widest uppercase mb-8">
            <span class="w-1.5 h-1.5 rounded-full bg-indigo-400 animate-pulse"></span>
            Área: Gestão Corporativa
        </div>
        <h1 class="text-4xl sm:text-5xl lg:text-6xl font-bold leading-tight text-white tracking-tight mb-6">
            Processos que escalam.<br/>
            <span class="text-indigo-400">Decisões que</span><br/>
            funcionam com dados.
        </h1>
        <p class="text-slate-300 text-lg leading-relaxed max-w-2xl mx-auto mb-10">
            A maioria das empresas não falha por falta de talento — falha por falta de estrutura de gestão. Implementamos OKRs, dashboards de performance e metodologias que tornam cada decisão mensurável e cada processo replicável.
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="/#contato" class="inline-flex items-center justify-center gap-2 px-7 py-4 rounded-2xl bg-indigo-700 hover:bg-indigo-800 text-white font-bold text-base transition-all shadow-xl shadow-indigo-900/30">
                Estruturar Minha Gestão
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
            </a>
            <a href="#metodologia" class="inline-flex items-center justify-center gap-2 px-7 py-4 rounded-2xl border border-white/20 hover:border-white/40 text-white font-semibold text-base transition-all">Ver a metodologia</a>
        </div>
    </div>

    <div class="relative z-10 w-full max-w-4xl mx-auto px-4 mt-16">
        <div class="grid grid-cols-3 gap-4">
            <div class="text-center p-4 rounded-2xl border border-white/10 bg-white/5 backdrop-blur-sm">
                <div class="text-2xl font-bold text-white">3x</div>
                <div class="text-xs text-slate-400 mt-1 uppercase tracking-wide">Mais rápido na tomada de decisão</div>
            </div>
            <div class="text-center p-4 rounded-2xl border border-white/10 bg-white/5 backdrop-blur-sm">
                <div class="text-2xl font-bold text-white">-62%</div>
                <div class="text-xs text-slate-400 mt-1 uppercase tracking-wide">Redução de retrabalho</div>
            </div>
            <div class="text-center p-4 rounded-2xl border border-white/10 bg-white/5 backdrop-blur-sm">
                <div class="text-2xl font-bold text-indigo-400">+45%</div>
                <div class="text-xs text-slate-400 mt-1 uppercase tracking-wide">Produtividade de equipe</div>
            </div>
        </div>
    </div>
</section>

<!-- METODOLOGIA -->
<section id="metodologia" class="py-24 bg-white">
    <div class="max-w-5xl mx-auto px-6">
        <div class="text-center mb-16">
            <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full border border-indigo-200 bg-indigo-50 text-indigo-700 text-[11px] font-bold tracking-widest uppercase mb-6">// Metodologia</div>
            <h2 class="text-3xl sm:text-4xl font-bold text-slate-900 tracking-tight mb-4">
                Como estruturamos<br/><span class="text-indigo-800">a gestão do seu negócio</span>
            </h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
            @php $pilares = [
                ['num'=>'01','title'=>'OKRs & Metas','desc'=>'Definimos Objectives and Key Results para cada área. Todos sabem o que fazer, por quê e como medir sucesso. Sem achismo.','icon'=>'M2.25 18L9 11.25l4.306 4.307a11.95 11.95 0 015.814-5.519l2.74-1.22m0 0l-5.94-2.28m5.94 2.28l-2.28 5.941'],
                ['num'=>'02','title'=>'Processos & SOPs','desc'=>'Mapeamos e documentamos cada processo crítico em procedimentos operacionais padrão que qualquer colaborador consegue seguir.','icon'=>'M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 002.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 00-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 00.75-.75 2.25 2.25 0 00-.1-.664m-5.8 0A2.251 2.251 0 0113.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25z'],
                ['num'=>'03','title'=>'Dashboards & KPIs','desc'=>'Dashboards em tempo real com os indicadores que realmente importam para cada área. Decisões com dados, não com intuição.','icon'=>'M7.5 14.25v2.25m3-4.5v4.5m3-6.75v6.75m3-9v9M6 20.25h12A2.25 2.25 0 0020.25 18V6A2.25 2.25 0 0018 3.75H6A2.25 2.25 0 003.75 6v12A2.25 2.25 0 006 20.25z'],
            ]; @endphp
            @foreach($pilares as $p)
            <div class="p-6 rounded-2xl border border-slate-200 hover:border-indigo-300 hover:shadow-lg hover:shadow-indigo-50 transition-all group text-center">
                <div class="w-14 h-14 rounded-2xl bg-indigo-50 border border-indigo-200 flex items-center justify-center mx-auto mb-5">
                    <svg class="w-7 h-7 text-indigo-700" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="{{ $p['icon'] }}"/></svg>
                </div>
                <div class="text-[10px] font-mono text-indigo-400 mb-2">PILAR {{ $p['num'] }}</div>
                <h3 class="font-bold text-slate-900 text-base mb-2 group-hover:text-indigo-800 transition-colors">{{ $p['title'] }}</h3>
                <p class="text-sm text-slate-500 leading-relaxed">{{ $p['desc'] }}</p>
            </div>
            @endforeach
        </div>

        <!-- Linha do tempo de implantação -->
        <div class="p-8 rounded-3xl bg-slate-50 border border-slate-200">
            <h3 class="text-lg font-bold text-slate-900 mb-6 text-center">Timeline de implantação</h3>
            <div class="grid grid-cols-1 sm:grid-cols-4 gap-4">
                @php $timeline = [
                    ['s'=>'Semana 1-2','title'=>'Diagnóstico','items'=>['Mapeamento de processos','Entrevistas com líderes','Identificação de gargalos']],
                    ['s'=>'Semana 3-4','title'=>'Planejamento','items'=>['Definição de OKRs','SOPs prioritários','Escolha de ferramentas']],
                    ['s'=>'Semana 5-8','title'=>'Implantação','items'=>['Treinamento das equipes','Ativação de dashboards','Primeiros ciclos de gestão']],
                    ['s'=>'Contínuo','title'=>'Otimização','items'=>['Revisão de indicadores','Ajuste de processos','Evolução dos OKRs']],
                ]; @endphp
                @foreach($timeline as $t)
                <div class="relative">
                    <div class="text-[10px] font-mono text-indigo-500 mb-2">{{ $t['s'] }}</div>
                    <div class="font-bold text-slate-900 text-sm mb-2">{{ $t['title'] }}</div>
                    <ul class="space-y-1.5">
                        @foreach($t['items'] as $item)
                        <li class="flex items-start gap-2 text-xs text-slate-500">
                            <span class="w-1 h-1 rounded-full bg-indigo-400 mt-1.5 shrink-0"></span>
                            {{ $item }}
                        </li>
                        @endforeach
                    </ul>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<!-- PARA EMPREENDEDORES -->
<section class="py-24 bg-indigo-900 relative overflow-hidden">
    <div class="absolute inset-0 pointer-events-none" style="background-image:linear-gradient(rgba(255,255,255,0.03) 1px,transparent 1px),linear-gradient(90deg,rgba(255,255,255,0.03) 1px,transparent 1px);background-size:48px 48px;"></div>
    <div class="relative max-w-5xl mx-auto px-6 text-center">
        <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full border border-indigo-400/30 bg-indigo-400/10 text-indigo-300 text-[11px] font-bold tracking-widest uppercase mb-8">Para quem está construindo</div>
        <h2 class="text-3xl sm:text-4xl font-bold text-white mb-6">
            Gestão não é só para<br/><span class="text-indigo-300">grandes empresas</span>
        </h2>
        <p class="text-indigo-200 text-lg max-w-2xl mx-auto mb-12">
            Um microempreendedor com processos definidos bate um profissional sênior sem método. Estruture sua operação agora — antes que o crescimento vire caos.
        </p>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach(['Microempreendedor Individual' => 'Processos básicos, controle financeiro simples e gestão de tempo estruturada. Profissionaliza sua operação sem burocracia.', 'Pequena Empresa (até 30 pessoas)' => 'OKRs por área, dashboards de vendas e operações, SOPs para atividades críticas. Escale sem perder controle.', 'Gestor em Formação' => 'Aprenda a linguagem da gestão moderna antes de assumir sua primeira posição de liderança. Saia na frente.'] as $tipo => $desc)
            <div class="p-6 rounded-2xl bg-white/8 border border-white/12 text-left hover:bg-white/12 transition-all">
                <h3 class="font-bold text-white text-base mb-3">{{ $tipo }}</h3>
                <p class="text-indigo-200 text-sm leading-relaxed">{{ $desc }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- CTA -->
<section class="py-20 bg-white border-t border-slate-200/60">
    <div class="max-w-2xl mx-auto px-6 text-center">
        <h2 class="text-3xl font-bold text-slate-900 mb-4">Sua operação precisa de<br/><span class="text-indigo-800">estrutura ou de velocidade?</span></h2>
        <p class="text-slate-500 mb-8">Diagnóstico gratuito de gestão. Identificamos exatamente o que está impedindo seu crescimento — e o que fazer primeiro.</p>
        <div class="flex flex-col sm:flex-row gap-3 justify-center">
            <a href="/#contato" class="inline-flex items-center justify-center gap-2 px-8 py-4 rounded-2xl bg-indigo-900 hover:bg-indigo-800 text-white font-bold text-base transition-all shadow-xl shadow-indigo-900/20">
                Diagnóstico de Gestão Gratuito
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
            </a>
            <a href="/" class="inline-flex items-center justify-center gap-2 px-8 py-4 rounded-2xl border border-slate-200 text-slate-600 font-semibold text-base hover:bg-slate-50 transition-all">Ver outras áreas</a>
        </div>
    </div>
</section>

<script>
(function(){
    var navbar = document.getElementById('navbar');
    window.addEventListener('scroll', function(){ navbar.classList.toggle('navbar-scrolled', window.scrollY > 40); }, {passive:true});
})();
</script>
</body>
</html>
