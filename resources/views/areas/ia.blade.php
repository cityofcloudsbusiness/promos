<!DOCTYPE html>
<html lang="pt-BR" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>IA Aplicada | City of Clouds</title>
    <meta name="description" content="Automatize sua operação com Inteligência Artificial. Sem time técnico, sem complexidade. Ferramentas práticas para microempreendedores e gestores.">
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
                    <a href="/ia" class="text-sm text-indigo-800 font-semibold border-b-2 border-indigo-700 pb-0.5">IA Aplicada</a>
                    <a href="/tecnologia" class="text-sm text-slate-500 hover:text-emerald-700 font-medium transition-colors">Tecnologia</a>
                    <a href="/logistica" class="text-sm text-slate-500 hover:text-amber-700 font-medium transition-colors">Logística</a>
                    <a href="/gestao" class="text-sm text-slate-500 hover:text-indigo-800 font-medium transition-colors">Gestão</a>
                </div>
                <div class="flex items-center gap-3">
                    <a href="/" class="hidden sm:inline-flex items-center gap-1.5 px-4 py-2 rounded-xl border border-slate-200 text-slate-600 text-sm font-medium hover:bg-slate-50 transition-all">← Voltar</a>
                    <a href="/#contato" class="inline-flex items-center gap-1.5 px-4 py-2.5 rounded-xl bg-indigo-900 hover:bg-indigo-800 text-white text-sm font-semibold transition-all shadow-lg shadow-indigo-900/20">Começar Agora</a>
                </div>
            </div>
        </div>
    </nav>
</header>

<!-- HERO -->
<section class="relative pt-16 min-h-screen flex flex-col items-center justify-center overflow-hidden bg-slate-900">
    <div class="absolute inset-0 bg-gradient-to-b from-indigo-900/80 via-slate-900/70 to-slate-900/95"></div>
    <div class="absolute inset-0 pointer-events-none" style="background-image:linear-gradient(rgba(99,102,241,0.07) 1px,transparent 1px),linear-gradient(90deg,rgba(99,102,241,0.07) 1px,transparent 1px);background-size:48px 48px;"></div>
    <!-- Animated code-like dots -->
    <div class="absolute top-1/4 left-1/4 w-2 h-2 rounded-full bg-indigo-400 animate-ping opacity-60"></div>
    <div class="absolute top-3/4 right-1/3 w-1.5 h-1.5 rounded-full bg-violet-400 animate-ping opacity-40" style="animation-delay:0.8s"></div>
    <div class="absolute top-1/2 right-1/4 w-1 h-1 rounded-full bg-indigo-300 animate-ping opacity-50" style="animation-delay:1.4s"></div>

    <div class="relative z-10 text-center px-4 max-w-4xl mx-auto">
        <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full border border-indigo-400/30 bg-indigo-500/10 text-indigo-300 text-[11px] font-bold tracking-widest uppercase mb-8">
            <span class="w-1.5 h-1.5 rounded-full bg-indigo-400 animate-pulse"></span>
            Área: IA Aplicada
        </div>
        <h1 class="text-4xl sm:text-5xl lg:text-6xl font-bold leading-tight text-white tracking-tight mb-6">
            Automatize sua operação<br/>
            <span class="text-indigo-400">sem contratar</span><br/>
            um cientista de dados.
        </h1>
        <p class="text-slate-300 text-lg leading-relaxed max-w-2xl mx-auto mb-10">
            Ferramentas de IA práticas e acessíveis para quem não tem time técnico. De chatbots corporativos a automação de processos — do zero ao ativo em semanas, não meses.
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="/#contato" class="inline-flex items-center justify-center gap-2 px-7 py-4 rounded-2xl bg-indigo-600 hover:bg-indigo-700 text-white font-bold text-base transition-all shadow-xl shadow-indigo-900/30">
                Começar com IA Hoje
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
            </a>
            <a href="#modulos" class="inline-flex items-center justify-center gap-2 px-7 py-4 rounded-2xl border border-white/20 hover:border-white/40 text-white font-semibold text-base transition-all">Ver os módulos</a>
        </div>
    </div>

    <div class="relative z-10 w-full max-w-4xl mx-auto px-4 mt-16">
        <div class="grid grid-cols-3 gap-4">
            <div class="text-center p-4 rounded-2xl border border-white/10 bg-white/5 backdrop-blur-sm">
                <div class="text-2xl font-bold text-white">-87%</div>
                <div class="text-xs text-slate-400 mt-1 uppercase tracking-wide">Tempo em tarefas manuais</div>
            </div>
            <div class="text-center p-4 rounded-2xl border border-white/10 bg-white/5 backdrop-blur-sm">
                <div class="text-2xl font-bold text-white">R$47</div>
                <div class="text-xs text-slate-400 mt-1 uppercase tracking-wide">Custo médio mensal / negócio</div>
            </div>
            <div class="text-center p-4 rounded-2xl border border-white/10 bg-white/5 backdrop-blur-sm">
                <div class="text-2xl font-bold text-indigo-400">7 dias</div>
                <div class="text-xs text-slate-400 mt-1 uppercase tracking-wide">Para primeiro resultado ativo</div>
            </div>
        </div>
    </div>
</section>

<!-- MÓDULOS -->
<section id="modulos" class="py-24 bg-white">
    <div class="max-w-5xl mx-auto px-6">
        <div class="text-center mb-16">
            <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full border border-indigo-200 bg-indigo-50 text-indigo-700 text-[11px] font-bold tracking-widest uppercase mb-6">// Módulos Práticos</div>
            <h2 class="text-3xl sm:text-4xl font-bold text-slate-900 tracking-tight mb-4">
                Do conceito à<br/><span class="text-indigo-800">automação real em dias</span>
            </h2>
            <p class="text-slate-500 max-w-xl mx-auto">Cada módulo entrega uma ferramenta ou processo funcionando na sua operação — não só teoria.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @php
            $modulos = [
                ['num'=>'01','title'=>'LLMs e ChatGPT para Negócios','desc'=>'Configure o ChatGPT e APIs de IA para atendimento, geração de conteúdo e suporte interno. Zero código necessário.','time'=>'3 dias','tags'=>['ChatGPT','API','Atendimento']],
                ['num'=>'02','title'=>'Automação com n8n e Zapier','desc'=>'Conecte seus sistemas, automatize fluxos de trabalho e crie pipelines que rodam sozinhos enquanto você dorme.','time'=>'5 dias','tags'=>['n8n','Zapier','Webhooks']],
                ['num'=>'03','title'=>'Machine Learning sem Código','desc'=>'Use plataformas no-code para criar modelos preditivos: demanda, churn, precificação inteligente.','time'=>'7 dias','tags'=>['ML','AutoML','Previsão']],
                ['num'=>'04','title'=>'Chatbots Corporativos','desc'=>'Monte um assistente de IA para seu WhatsApp Business, site ou Slack que resolve dúvidas e qualifica leads.','time'=>'4 dias','tags'=>['WhatsApp','Chatbot','Atendimento']],
                ['num'=>'05','title'=>'Análise de Dados com IA','desc'=>'Visualize e interprete dados do seu negócio com dashboards inteligentes. Tome decisões com base em fatos.','time'=>'5 dias','tags'=>['Dados','Dashboard','Insights']],
                ['num'=>'06','title'=>'IA para Microempreendedores','desc'=>'Pacote específico para MEI e pequenos negócios: ferramentas gratuitas ou abaixo de R$50/mês com impacto imediato.','time'=>'2 dias','tags'=>['MEI','Gratuito','Baixo custo']],
            ];
            @endphp
            @foreach($modulos as $mod)
            <div class="flex gap-4 p-6 rounded-2xl border border-slate-200 hover:border-indigo-300 hover:shadow-lg hover:shadow-indigo-50 transition-all duration-300 group">
                <div class="shrink-0">
                    <div class="w-12 h-12 rounded-2xl bg-indigo-50 border border-indigo-200 flex items-center justify-center mb-2">
                        <span class="text-xs font-mono font-bold text-indigo-700">{{ $mod['num'] }}</span>
                    </div>
                    <div class="text-center text-[9px] font-mono text-slate-400">{{ $mod['time'] }}</div>
                </div>
                <div class="flex-1 min-w-0">
                    <h3 class="font-bold text-slate-900 text-sm mb-1.5 group-hover:text-indigo-800 transition-colors">{{ $mod['title'] }}</h3>
                    <p class="text-xs text-slate-500 leading-relaxed mb-3">{{ $mod['desc'] }}</p>
                    <div class="flex flex-wrap gap-1.5">
                        @foreach($mod['tags'] as $tag)
                        <span class="px-2 py-0.5 rounded-full bg-indigo-50 border border-indigo-200 text-indigo-700 text-[10px] font-semibold">{{ $tag }}</span>
                        @endforeach
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- CASOS DE USO -->
<section class="py-24 bg-indigo-900 relative overflow-hidden">
    <div class="absolute inset-0 pointer-events-none" style="background-image:linear-gradient(rgba(255,255,255,0.03) 1px,transparent 1px),linear-gradient(90deg,rgba(255,255,255,0.03) 1px,transparent 1px);background-size:48px 48px;"></div>
    <div class="relative max-w-5xl mx-auto px-6">
        <div class="text-center mb-16">
            <h2 class="text-3xl sm:text-4xl font-bold text-white mb-4">Quem usa e<br/><span class="text-indigo-300">o que transforma</span></h2>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @php $casos = [
                ['who'=>'Microempreendedor','before'=>'Respondia WhatsApp das 7h às 23h manualmente','after'=>'Chatbot responde 80% das mensagens. Recuperou 5h/dia.','color'=>'indigo'],
                ['who'=>'Gestor de Operações','before'=>'Relatórios feitos no Excel toda segunda-feira por 3h','after'=>'Dashboard automático atualizado em tempo real. 0 horas de relatório.','color'=>'indigo'],
                ['who'=>'Loja Online','before'=>'Sem previsão de estoque, sempre com ruptura ou excesso','after'=>'IA prevê demanda com 91% de acurácia. Reduziu custo de estoque em 34%.','color'=>'indigo'],
            ]; @endphp
            @foreach($casos as $caso)
            <div class="p-6 rounded-2xl bg-white/8 border border-white/12">
                <div class="inline-flex px-2.5 py-1 rounded-lg bg-indigo-700/40 border border-indigo-400/20 text-indigo-300 text-[10px] font-bold uppercase tracking-wider mb-4">{{ $caso['who'] }}</div>
                <div class="mb-3">
                    <p class="text-[10px] font-bold text-red-400 uppercase tracking-wider mb-1">Antes</p>
                    <p class="text-sm text-slate-300">{{ $caso['before'] }}</p>
                </div>
                <div>
                    <p class="text-[10px] font-bold text-emerald-400 uppercase tracking-wider mb-1">Depois</p>
                    <p class="text-sm text-white font-medium">{{ $caso['after'] }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- CTA -->
<section class="py-20 bg-white border-t border-slate-200/60">
    <div class="max-w-2xl mx-auto px-6 text-center">
        <h2 class="text-3xl font-bold text-slate-900 mb-4">Qual processo você quer<br/><span class="text-indigo-800">automatizar primeiro?</span></h2>
        <p class="text-slate-500 mb-8">Diagnóstico gratuito de automação. Identificamos quais ferramentas de IA geram mais impacto no seu negócio específico.</p>
        <div class="flex flex-col sm:flex-row gap-3 justify-center">
            <a href="/#contato" class="inline-flex items-center justify-center gap-2 px-8 py-4 rounded-2xl bg-indigo-900 hover:bg-indigo-800 text-white font-bold text-base transition-all shadow-xl shadow-indigo-900/20">
                Diagnóstico de Automação
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
