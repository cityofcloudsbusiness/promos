<!DOCTYPE html>
<html lang="pt-BR" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tecnologia | City of Clouds</title>
    <meta name="description" content="Modernize a infraestrutura tecnológica do seu negócio em etapas. Da planilha ao sistema profissional sem paralisia tecnológica.">
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
                    <a href="/tecnologia" class="text-sm text-emerald-700 font-semibold border-b-2 border-emerald-600 pb-0.5">Tecnologia</a>
                    <a href="/logistica" class="text-sm text-slate-500 hover:text-amber-700 font-medium transition-colors">Logística</a>
                    <a href="/gestao" class="text-sm text-slate-500 hover:text-indigo-800 font-medium transition-colors">Gestão</a>
                </div>
                <div class="flex items-center gap-3">
                    <a href="/" class="hidden sm:inline-flex items-center gap-1.5 px-4 py-2 rounded-xl border border-slate-200 text-slate-600 text-sm font-medium hover:bg-slate-50 transition-all">← Voltar</a>
                    <a href="/#contato" class="inline-flex items-center gap-1.5 px-4 py-2.5 rounded-xl bg-emerald-700 hover:bg-emerald-800 text-white text-sm font-semibold transition-all shadow-lg shadow-emerald-700/20">Começar Agora</a>
                </div>
            </div>
        </div>
    </nav>
</header>

<!-- HERO -->
<section class="relative pt-16 min-h-screen flex flex-col items-center justify-center overflow-hidden bg-slate-900">
    <div class="absolute inset-0 bg-gradient-to-b from-emerald-900/70 via-slate-900/65 to-slate-900/95"></div>
    <div class="absolute inset-0 pointer-events-none" style="background-image:linear-gradient(rgba(16,185,129,0.06) 1px,transparent 1px),linear-gradient(90deg,rgba(16,185,129,0.06) 1px,transparent 1px);background-size:48px 48px;"></div>

    <!-- Terminal blink effect -->
    <div class="absolute top-32 left-8 font-mono text-xs text-emerald-500/30 hidden xl:block select-none">
        <div>$ npm install @city-of-clouds/corp</div>
        <div class="mt-1">✓ Installing dependencies...</div>
        <div class="mt-1">✓ Building infrastructure...</div>
        <div class="mt-1 flex items-center gap-1">→ Ready <span class="inline-block w-2 h-4 bg-emerald-500/40 animate-pulse"></span></div>
    </div>

    <div class="relative z-10 text-center px-4 max-w-4xl mx-auto">
        <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full border border-emerald-400/30 bg-emerald-500/10 text-emerald-300 text-[11px] font-bold tracking-widest uppercase mb-8">
            <span class="w-1.5 h-1.5 rounded-full bg-emerald-400 animate-pulse"></span>
            Área: Tecnologia
        </div>
        <h1 class="text-4xl sm:text-5xl lg:text-6xl font-bold leading-tight text-white tracking-tight mb-6">
            Da planilha ao sistema.<br/>
            <span class="text-emerald-400">Em etapas que</span><br/>
            sua empresa consegue dar.
        </h1>
        <p class="text-slate-300 text-lg leading-relaxed max-w-2xl mx-auto mb-10">
            Não precisa contratar uma equipe de TI nem comprar software milionário. Modernize sua infraestrutura tecnológica progressivamente — cada etapa gera resultado antes de avançar.
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="/#contato" class="inline-flex items-center justify-center gap-2 px-7 py-4 rounded-2xl bg-emerald-600 hover:bg-emerald-700 text-white font-bold text-base transition-all shadow-xl shadow-emerald-900/30">
                Diagnóstico Tecnológico
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
            </a>
            <a href="#roteiro" class="inline-flex items-center justify-center gap-2 px-7 py-4 rounded-2xl border border-white/20 hover:border-white/40 text-white font-semibold text-base transition-all">Ver roteiro de implantação</a>
        </div>
    </div>

    <div class="relative z-10 w-full max-w-4xl mx-auto px-4 mt-16">
        <div class="grid grid-cols-3 gap-4">
            <div class="text-center p-4 rounded-2xl border border-white/10 bg-white/5 backdrop-blur-sm">
                <div class="text-2xl font-bold text-white">+240</div>
                <div class="text-xs text-slate-400 mt-1 uppercase tracking-wide">Sistemas implementados</div>
            </div>
            <div class="text-center p-4 rounded-2xl border border-white/10 bg-white/5 backdrop-blur-sm">
                <div class="text-2xl font-bold text-white">6-12</div>
                <div class="text-xs text-slate-400 mt-1 uppercase tracking-wide">Semanas para ir ao ar</div>
            </div>
            <div class="text-center p-4 rounded-2xl border border-white/10 bg-white/5 backdrop-blur-sm">
                <div class="text-2xl font-bold text-emerald-400">-65%</div>
                <div class="text-xs text-slate-400 mt-1 uppercase tracking-wide">Custo operacional médio</div>
            </div>
        </div>
    </div>
</section>

<!-- ROTEIRO -->
<section id="roteiro" class="py-24 bg-white">
    <div class="max-w-5xl mx-auto px-6">
        <div class="text-center mb-16">
            <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full border border-emerald-200 bg-emerald-50 text-emerald-700 text-[11px] font-bold tracking-widest uppercase mb-6">// Roteiro de Modernização</div>
            <h2 class="text-3xl sm:text-4xl font-bold text-slate-900 tracking-tight mb-4">
                4 etapas para sair do<br/><span class="text-emerald-700">improviso para o sistema</span>
            </h2>
        </div>

        <div class="space-y-4">
            @php $etapas = [
                ['n'=>'01','title'=>'Mapeamento & Diagnóstico Tecnológico','desc'=>'Levantamos todos os sistemas, ferramentas e processos que sua empresa usa hoje. Identificamos gargalos, custos ocultos e oportunidades de automação.','result'=>'Mapa tecnológico completo + lista de prioridades','color'=>'emerald'],
                ['n'=>'02','title'=>'Substituição das Planilhas por Sistemas','desc'=>'Implementamos ferramentas profissionais (CRM, ERP leve, gestão de estoque) que substituem as planilhas sem quebrar o que já funciona.','result'=>'Processos digitalizados com histórico e rastreabilidade','color'=>'emerald'],
                ['n'=>'03','title'=>'APIs, Integrações e Fluxos Automáticos','desc'=>'Conectamos os sistemas entre si. Dados fluem automaticamente: pedido → estoque → financeiro → notificação. Sem copiar e colar.','result'=>'Integração total entre módulos com notificações em tempo real','color'=>'emerald'],
                ['n'=>'04','title'=>'Cloud, Segurança e Escalabilidade','desc'=>'Migração para cloud com backup automático, segurança de dados e infraestrutura que cresce com seu negócio sem custos exponenciais.','result'=>'Sistema em produção com 99.9% de uptime e backups diários','color'=>'emerald'],
            ]; @endphp
            @foreach($etapas as $etapa)
            <div class="flex gap-5 p-6 rounded-2xl border border-slate-200 hover:border-emerald-300 hover:shadow-lg transition-all duration-300 group">
                <div class="shrink-0 w-14 h-14 rounded-2xl bg-emerald-50 border border-emerald-200 flex items-center justify-center">
                    <span class="text-lg font-mono font-bold text-emerald-700">{{ $etapa['n'] }}</span>
                </div>
                <div class="flex-1">
                    <h3 class="font-bold text-slate-900 text-base mb-1.5 group-hover:text-emerald-800 transition-colors">{{ $etapa['title'] }}</h3>
                    <p class="text-sm text-slate-500 leading-relaxed mb-3">{{ $etapa['desc'] }}</p>
                    <div class="flex items-center gap-2">
                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 shrink-0"></span>
                        <span class="text-xs font-semibold text-emerald-700">{{ $etapa['result'] }}</span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- STACK -->
<section class="py-24 bg-slate-900 relative overflow-hidden">
    <div class="absolute inset-0 pointer-events-none" style="background-image:linear-gradient(rgba(255,255,255,0.03) 1px,transparent 1px),linear-gradient(90deg,rgba(255,255,255,0.03) 1px,transparent 1px);background-size:48px 48px;"></div>
    <div class="relative max-w-5xl mx-auto px-6">
        <div class="text-center mb-14">
            <h2 class="text-3xl sm:text-4xl font-bold text-white mb-4">Tecnologias que<br/><span class="text-emerald-400">implementamos</span></h2>
            <p class="text-slate-400 max-w-lg mx-auto">Stack moderno e acessível. Cada ferramenta escolhida por custo-benefício real para o porte do seu negócio.</p>
        </div>
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-3">
            @php $stack = [
                ['name'=>'Laravel','cat'=>'Backend'],['name'=>'React','cat'=>'Frontend'],
                ['name'=>'PostgreSQL','cat'=>'Banco de Dados'],['name'=>'Redis','cat'=>'Cache'],
                ['name'=>'AWS / GCP','cat'=>'Cloud'],['name'=>'Docker','cat'=>'Infraestrutura'],
                ['name'=>'n8n','cat'=>'Automação'],['name'=>'Supabase','cat'=>'Backend as a Service'],
                ['name'=>'Cloudflare','cat'=>'CDN / Segurança'],['name'=>'GitHub Actions','cat'=>'CI/CD'],
                ['name'=>'Stripe','cat'=>'Pagamentos'],['name'=>'SendGrid','cat'=>'E-mail'],
            ]; @endphp
            @foreach($stack as $item)
            <div class="p-3 rounded-xl bg-white/6 border border-white/10 hover:bg-emerald-900/20 hover:border-emerald-700/30 transition-all group">
                <p class="text-sm font-bold text-white group-hover:text-emerald-300 transition-colors">{{ $item['name'] }}</p>
                <p class="text-[10px] text-slate-500 mt-0.5">{{ $item['cat'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- CTA -->
<section class="py-20 bg-white border-t border-slate-200/60">
    <div class="max-w-2xl mx-auto px-6 text-center">
        <h2 class="text-3xl font-bold text-slate-900 mb-4">Qual sistema sua empresa<br/><span class="text-emerald-700">mais precisa agora?</span></h2>
        <p class="text-slate-500 mb-8">Diagnóstico tecnológico gratuito. Identificamos a próxima etapa de modernização com maior ROI para o seu contexto.</p>
        <div class="flex flex-col sm:flex-row gap-3 justify-center">
            <a href="/#contato" class="inline-flex items-center justify-center gap-2 px-8 py-4 rounded-2xl bg-emerald-700 hover:bg-emerald-800 text-white font-bold text-base transition-all shadow-xl shadow-emerald-700/20">
                Diagnóstico Tecnológico Gratuito
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
