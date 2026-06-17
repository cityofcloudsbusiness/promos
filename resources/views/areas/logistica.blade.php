<!DOCTYPE html>
<html lang="pt-BR" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Logística 4.0 | City of Clouds</title>
    <meta name="description" content="Visibilidade total da sua cadeia de suprimentos. Roteirização com IA, gestão de estoque e logística inteligente para empresas de qualquer porte.">
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
                    <a href="/logistica" class="text-sm text-amber-700 font-semibold border-b-2 border-amber-600 pb-0.5">Logística</a>
                    <a href="/gestao" class="text-sm text-slate-500 hover:text-indigo-800 font-medium transition-colors">Gestão</a>
                </div>
                <div class="flex items-center gap-3">
                    <a href="/" class="hidden sm:inline-flex items-center gap-1.5 px-4 py-2 rounded-xl border border-slate-200 text-slate-600 text-sm font-medium hover:bg-slate-50 transition-all">← Voltar</a>
                    <a href="/#contato" class="inline-flex items-center gap-1.5 px-4 py-2.5 rounded-xl bg-amber-600 hover:bg-amber-700 text-white text-sm font-semibold transition-all shadow-lg shadow-amber-600/20">Otimizar Agora</a>
                </div>
            </div>
        </div>
    </nav>
</header>

<!-- HERO -->
<section class="relative pt-16 min-h-screen flex flex-col items-center justify-center overflow-hidden bg-slate-900">
    <div class="absolute inset-0 bg-gradient-to-b from-amber-900/70 via-slate-900/65 to-slate-900/95"></div>
    <div class="absolute inset-0 pointer-events-none" style="background-image:linear-gradient(rgba(245,158,11,0.06) 1px,transparent 1px),linear-gradient(90deg,rgba(245,158,11,0.06) 1px,transparent 1px);background-size:48px 48px;"></div>

    <div class="relative z-10 text-center px-4 max-w-4xl mx-auto">
        <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full border border-amber-400/30 bg-amber-500/10 text-amber-300 text-[11px] font-bold tracking-widest uppercase mb-8">
            <span class="w-1.5 h-1.5 rounded-full bg-amber-400 animate-pulse"></span>
            Área: Logística 4.0
        </div>
        <h1 class="text-4xl sm:text-5xl lg:text-6xl font-bold leading-tight text-white tracking-tight mb-6">
            Do pedido à entrega.<br/>
            <span class="text-amber-400">Visível, rastreável</span><br/>
            e sem surpresas.
        </h1>
        <p class="text-slate-300 text-lg leading-relaxed max-w-2xl mx-auto mb-10">
            Cadeia de suprimentos opaca é dinheiro indo embora. Implementamos visibilidade total, roteirização inteligente e gestão de estoque em tempo real — para qualquer porte de operação.
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="/#contato" class="inline-flex items-center justify-center gap-2 px-7 py-4 rounded-2xl bg-amber-600 hover:bg-amber-700 text-white font-bold text-base transition-all shadow-xl shadow-amber-900/30">
                Otimizar Minha Cadeia
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
            </a>
            <a href="#o-que-entregamos" class="inline-flex items-center justify-center gap-2 px-7 py-4 rounded-2xl border border-white/20 hover:border-white/40 text-white font-semibold text-base transition-all">O que entregamos</a>
        </div>
    </div>

    <div class="relative z-10 w-full max-w-4xl mx-auto px-4 mt-16">
        <div class="grid grid-cols-3 gap-4">
            <div class="text-center p-4 rounded-2xl border border-white/10 bg-white/5 backdrop-blur-sm">
                <div class="text-2xl font-bold text-white">-28%</div>
                <div class="text-xs text-slate-400 mt-1 uppercase tracking-wide">Custo operacional médio</div>
            </div>
            <div class="text-center p-4 rounded-2xl border border-white/10 bg-white/5 backdrop-blur-sm">
                <div class="text-2xl font-bold text-white">+94%</div>
                <div class="text-xs text-slate-400 mt-1 uppercase tracking-wide">Precisão de estoque</div>
            </div>
            <div class="text-center p-4 rounded-2xl border border-white/10 bg-white/5 backdrop-blur-sm">
                <div class="text-2xl font-bold text-amber-400">-40%</div>
                <div class="text-xs text-slate-400 mt-1 uppercase tracking-wide">Atrasos de entrega</div>
            </div>
        </div>
    </div>
</section>

<!-- O QUE ENTREGAMOS -->
<section id="o-que-entregamos" class="py-24 bg-white">
    <div class="max-w-5xl mx-auto px-6">
        <div class="text-center mb-16">
            <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full border border-amber-200 bg-amber-50 text-amber-700 text-[11px] font-bold tracking-widest uppercase mb-6">// O que implementamos</div>
            <h2 class="text-3xl sm:text-4xl font-bold text-slate-900 tracking-tight mb-4">
                Controle total da<br/><span class="text-amber-700">cadeia do início ao fim</span>
            </h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @php $entregas = [
                ['icon'=>'M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 002.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 00-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 00.75-.75 2.25 2.25 0 00-.1-.664m-5.8 0A2.251 2.251 0 0113.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25z','title'=>'Gestão de Estoque em Tempo Real','desc'=>'Dashboard com níveis de estoque atualizados automaticamente. Alertas de ruptura e excesso antes que virem problema. Previsão de demanda com IA.'],
                ['icon'=>'M8.25 18.75a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h6m-9 0H3.375a1.125 1.125 0 01-1.125-1.125V14.25m17.25 4.5a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h1.125c.621 0 1.129-.504 1.09-1.124a17.902 17.902 0 00-3.213-9.193 2.056 2.056 0 00-1.58-.86H14.25M16.5 18.75h-2.25m0-11.177v-.958c0-.568-.422-1.048-.987-1.106a48.554 48.554 0 00-10.026 0 1.106 1.106 0 00-.987 1.106v7.635m12-6.677v6.677m0 4.5v-4.5m0 0h-12','title'=>'Roteirização Inteligente com IA','desc'=>'Algoritmo que calcula a rota mais eficiente considerando tráfego, capacidade e janelas de entrega. Reduz combustível e tempo simultaneamente.'],
                ['icon'=>'M3.75 4.875c0-.621.504-1.125 1.125-1.125h4.5c.621 0 1.125.504 1.125 1.125v4.5c0 .621-.504 1.125-1.125 1.125h-4.5A1.125 1.125 0 013.75 9.375v-4.5zM3.75 14.625c0-.621.504-1.125 1.125-1.125h4.5c.621 0 1.125.504 1.125 1.125v4.5c0 .621-.504 1.125-1.125 1.125h-4.5a1.125 1.125 0 01-1.125-1.125v-4.5zM13.5 4.875c0-.621.504-1.125 1.125-1.125h4.5c.621 0 1.125.504 1.125 1.125v4.5c0 .621-.504 1.125-1.125 1.125h-4.5A1.125 1.125 0 0113.5 9.375v-4.5z','title'=>'Rastreabilidade Ponta a Ponta','desc'=>'Código de rastreio, geolocalização em tempo real e histórico completo de cada produto desde o fornecedor até o cliente final.'],
                ['icon'=>'M2.25 18L9 11.25l4.306 4.307a11.95 11.95 0 015.814-5.519l2.74-1.22m0 0l-5.94-2.28m5.94 2.28l-2.28 5.941','title'=>'Dashboards de Performance','desc'=>'Indicadores de SLA, custo por entrega, giro de estoque e desempenho por fornecedor. Dados que mostram onde está o dinheiro — e onde está vazando.'],
            ]; @endphp
            @foreach($entregas as $ent)
            <div class="p-6 rounded-2xl border border-slate-200 hover:border-amber-300 hover:shadow-lg hover:shadow-amber-50 transition-all duration-300 group">
                <div class="w-11 h-11 rounded-2xl bg-amber-50 border border-amber-200 flex items-center justify-center mb-4">
                    <svg class="w-6 h-6 text-amber-700" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="{{ $ent['icon'] }}"/></svg>
                </div>
                <h3 class="font-bold text-slate-900 mb-2 group-hover:text-amber-800 transition-colors">{{ $ent['title'] }}</h3>
                <p class="text-sm text-slate-500 leading-relaxed">{{ $ent['desc'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- PARA MEI E PEQUENAS EMPRESAS -->
<section class="py-24 bg-amber-900 relative overflow-hidden">
    <div class="absolute inset-0 pointer-events-none" style="background-image:linear-gradient(rgba(255,255,255,0.03) 1px,transparent 1px),linear-gradient(90deg,rgba(255,255,255,0.03) 1px,transparent 1px);background-size:48px 48px;"></div>
    <div class="relative max-w-5xl mx-auto px-6">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div>
                <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full border border-amber-400/30 bg-amber-400/10 text-amber-300 text-[11px] font-bold tracking-widest uppercase mb-6">Para Micro e Pequenas Empresas</div>
                <h2 class="text-3xl sm:text-4xl font-bold text-white mb-6">Logística profissional<br/><span class="text-amber-300">no tamanho certo</span> para você</h2>
                <p class="text-amber-100 text-lg leading-relaxed mb-8">
                    Não precisa ser uma multinacional para ter controle de estoque, rastreamento de entrega e dashboards de performance. Adaptamos cada solução ao porte e orçamento do seu negócio.
                </p>
                <ul class="space-y-3">
                    @foreach(['Controle de estoque para e-commerce (mesmo com 50 produtos)','Rastreamento de entregas via WhatsApp para clientes','Planilha inteligente que vira sistema em 2 semanas','ROI mensurável desde o primeiro mês de implantação'] as $item)
                    <li class="flex items-start gap-3">
                        <span class="w-5 h-5 rounded-full bg-amber-400/20 border border-amber-400/40 flex items-center justify-center shrink-0 mt-0.5">
                            <svg class="w-3 h-3 text-amber-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"/></svg>
                        </span>
                        <span class="text-amber-100 text-sm">{{ $item }}</span>
                    </li>
                    @endforeach
                </ul>
            </div>
            <div class="grid grid-cols-2 gap-3">
                @php $numeros = [['v'=>'2-4','l'=>'Semanas para primeiro sistema ativo'],['v'=>'R$0','l'=>'Custo de ferramentas open-source disponíveis'],['v'=>'+94%','l'=>'Precisão de inventário após implementação'],['v'=>'-40%','l'=>'Redução de atrasos de entrega no 1º trimestre']]; @endphp
                @foreach($numeros as $num)
                <div class="p-5 rounded-2xl bg-white/8 border border-white/12 text-center">
                    <div class="text-3xl font-bold text-amber-300 mb-1">{{ $num['v'] }}</div>
                    <div class="text-xs text-amber-200 leading-snug">{{ $num['l'] }}</div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<!-- CTA -->
<section class="py-20 bg-white border-t border-slate-200/60">
    <div class="max-w-2xl mx-auto px-6 text-center">
        <h2 class="text-3xl font-bold text-slate-900 mb-4">Qual é o maior problema<br/><span class="text-amber-700">da sua operação hoje?</span></h2>
        <p class="text-slate-500 mb-8">Diagnóstico logístico gratuito. Mapeamos sua cadeia e identificamos onde está o maior vazamento de custo e tempo.</p>
        <div class="flex flex-col sm:flex-row gap-3 justify-center">
            <a href="/#contato" class="inline-flex items-center justify-center gap-2 px-8 py-4 rounded-2xl bg-amber-600 hover:bg-amber-700 text-white font-bold text-base transition-all shadow-xl shadow-amber-600/20">
                Diagnóstico Logístico Gratuito
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
