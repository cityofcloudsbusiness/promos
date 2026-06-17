<!DOCTYPE html>
<html lang="pt-BR" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>EscolaOnline | Transformação Corporativa via Treinamento e Tecnologia</title>
    <meta name="description" content="Entramos na sua empresa, reorganizamos rotinas, implementamos tecnologia e capacitamos equipes com treinamento integrado de IA e gestão.">

    @fonts

    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>
<body class="bg-slate-50 text-slate-900 antialiased overflow-x-hidden">

<!-- ================================================================
     NAVBAR — Light, clean, sticky
================================================================ -->
<header class="fixed top-0 left-0 right-0 z-50">
    <nav class="border-b border-slate-200/80 bg-white/90 backdrop-blur-lg shadow-sm shadow-slate-100/60">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">

                <a href="/" class="flex items-center gap-2.5 shrink-0">
                    <div class="w-8 h-8 rounded-lg bg-blue-700 flex items-center justify-center shadow-md shadow-blue-700/25">
                        <svg class="w-4 h-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6A2.25 2.25 0 016 3.75h2.25A2.25 2.25 0 0110.5 6v2.25a2.25 2.25 0 01-2.25 2.25H6a2.25 2.25 0 01-2.25-2.25V6zM3.75 15.75A2.25 2.25 0 016 13.5h2.25a2.25 2.25 0 012.25 2.25V18a2.25 2.25 0 01-2.25 2.25H6A2.25 2.25 0 013.75 18v-2.25zM13.5 6a2.25 2.25 0 012.25-2.25H18A2.25 2.25 0 0120.25 6v2.25A2.25 2.25 0 0118 10.5h-2.25a2.25 2.25 0 01-2.25-2.25V6zM13.5 15.75a2.25 2.25 0 012.25-2.25H18a2.25 2.25 0 012.25 2.25V18A2.25 2.25 0 0118 20.25h-2.25A2.25 2.25 0 0113.5 18v-2.25z" />
                        </svg>
                    </div>
                    <span class="font-bold text-base tracking-tight">
                        <span class="text-slate-900">Escola</span><span class="text-blue-700">Online</span>
                    </span>
                </a>

                <div class="hidden md:flex items-center gap-7">
                    <a href="#problema" class="text-sm text-slate-500 hover:text-slate-900 font-medium transition-colors duration-150">Diagnóstico</a>
                    <a href="#processo" class="text-sm text-slate-500 hover:text-slate-900 font-medium transition-colors duration-150">Metodologia</a>
                    <a href="#pilares" class="text-sm text-slate-500 hover:text-slate-900 font-medium transition-colors duration-150">Módulos</a>
                    <a href="#contato" class="text-sm text-slate-500 hover:text-slate-900 font-medium transition-colors duration-150">Para Empresas</a>
                </div>

                <div class="flex items-center gap-3">
                    <a href="/login" class="hidden sm:inline-block text-sm text-slate-500 hover:text-slate-900 font-medium transition-colors duration-150">
                        Entrar
                    </a>
                    <a href="#contato" class="inline-flex items-center gap-1.5 px-4 py-2 rounded-lg bg-blue-700 hover:bg-blue-800 text-white text-sm font-semibold transition-colors duration-150 shadow-md shadow-blue-700/20">
                        Solicitar Diagnóstico
                        <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                        </svg>
                    </a>
                    <button id="mobile-menu-btn" class="md:hidden p-2 rounded-lg text-slate-500 hover:text-slate-900 hover:bg-slate-100 transition-colors duration-150">
                        <svg id="icon-open" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                        <svg id="icon-close" class="w-5 h-5 hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <div id="mobile-menu" class="hidden md:hidden border-t border-slate-200/60">
            <div class="max-w-7xl mx-auto px-4 py-3 space-y-0.5">
                <a href="#problema" class="block px-3 py-2.5 rounded-lg text-sm text-slate-600 hover:text-slate-900 hover:bg-slate-100 transition-colors">Diagnóstico</a>
                <a href="#processo" class="block px-3 py-2.5 rounded-lg text-sm text-slate-600 hover:text-slate-900 hover:bg-slate-100 transition-colors">Metodologia</a>
                <a href="#pilares" class="block px-3 py-2.5 rounded-lg text-sm text-slate-600 hover:text-slate-900 hover:bg-slate-100 transition-colors">Módulos</a>
                <a href="#contato" class="block px-3 py-2.5 rounded-lg text-sm text-slate-600 hover:text-slate-900 hover:bg-slate-100 transition-colors">Para Empresas</a>
            </div>
        </div>
    </nav>
</header>

<!-- ================================================================
     HERO — HEMISFÉRIOS: CAOS ↔ SOLUÇÃO
================================================================ -->
<section id="problema" class="relative pt-16 min-h-screen bg-blueprint flex flex-col">

    <!-- Blueprint corner coordinates -->
    <span class="absolute top-20 left-3 text-[9px] font-mono text-blue-800/20 pointer-events-none select-none">X:00 Y:00</span>
    <span class="absolute top-20 right-3 text-[9px] font-mono text-blue-800/20 pointer-events-none select-none">X:FF Y:00</span>
    <span class="absolute bottom-20 left-3 text-[9px] font-mono text-blue-800/20 pointer-events-none select-none">X:00 Y:FF</span>
    <span class="absolute bottom-20 right-3 text-[9px] font-mono text-blue-800/20 pointer-events-none select-none">X:FF Y:FF</span>

    <!-- Header copy -->
    <div class="relative pt-10 pb-6 text-center px-4">
        <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full border border-blue-200 bg-blue-50 text-blue-700 text-[11px] font-bold tracking-widest uppercase">
            <span class="w-1.5 h-1.5 rounded-full bg-blue-600 animate-pulse"></span>
            Diagnóstico de Transformação Corporativa
        </div>
        <h1 class="mt-5 text-3xl sm:text-4xl lg:text-5xl font-bold leading-tight tracking-tight text-slate-900 max-w-3xl mx-auto">
            Sua empresa tem estrutura<br class="hidden sm:block"/>
            <span class="text-blue-700">para escalar?</span>
        </h1>
        <p class="mt-3 text-slate-500 text-base max-w-xl mx-auto leading-relaxed">
            Mapeamos, reorganizamos e implementamos. Da rotina caótica ao sistema operando com precisão cirúrgica.
        </p>
    </div>

    <!-- HEMISFÉRIOS -->
    <div class="relative flex-1 flex items-stretch w-full max-w-[1400px] mx-auto px-3 sm:px-6 pb-6 gap-2 sm:gap-3">

        <!-- ── LEFT: O PROBLEMA ── -->
        <div class="flex-1 relative rounded-2xl bg-white/70 border border-red-200/70 overflow-hidden flex flex-col min-h-[460px]">
            <!-- Top bar -->
            <div class="flex items-center justify-between px-4 py-2.5 border-b border-red-100 bg-red-50/60">
                <div class="flex items-center gap-1.5">
                    <span class="w-2 h-2 rounded-full bg-red-400"></span>
                    <span class="text-[10px] font-bold text-red-600 tracking-widest uppercase">Estado Atual</span>
                </div>
                <span class="font-mono text-[9px] text-red-300 hidden sm:block">MODULE_CHAOS // DESALINHADO</span>
            </div>

            <div class="p-5 sm:p-7 flex flex-col flex-1">
                <p class="text-xs font-semibold text-slate-700 mb-1">A realidade da maioria das empresas</p>
                <p class="text-xs text-slate-400 mb-5">Processos isolados, sem integração e sem direção tecnológica.</p>

                <!-- Chaos nodes -->
                <div class="flex-1 relative">

                    <div class="grid grid-cols-2 gap-2.5">
                        <!-- Node -->
                        <div class="border border-red-200 bg-red-50 rounded-xl p-3">
                            <div class="flex items-center gap-1.5 mb-1.5">
                                <svg class="w-3.5 h-3.5 text-red-500 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z"/></svg>
                                <span class="text-[10px] font-bold text-red-700 uppercase">Gestão</span>
                            </div>
                            <p class="text-[10px] text-red-500 leading-snug">Decisões sem dados reais</p>
                        </div>

                        <div class="border border-orange-200 bg-orange-50 rounded-xl p-3">
                            <div class="flex items-center gap-1.5 mb-1.5">
                                <svg class="w-3.5 h-3.5 text-orange-500 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z"/></svg>
                                <span class="text-[10px] font-bold text-orange-700 uppercase">Tecnologia</span>
                            </div>
                            <p class="text-[10px] text-orange-500 leading-snug">Sistemas legados e lentos</p>
                        </div>

                        <!-- Broken connector -->
                        <div class="col-span-2 flex items-center gap-2 px-1">
                            <div class="flex-1 h-px border-t border-dashed border-red-200"></div>
                            <span class="text-red-300 text-xs">✕</span>
                            <div class="flex-1 h-px border-t border-dashed border-red-200"></div>
                        </div>

                        <div class="border border-red-200 bg-red-50 rounded-xl p-3">
                            <div class="flex items-center gap-1.5 mb-1.5">
                                <svg class="w-3.5 h-3.5 text-red-500 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z"/></svg>
                                <span class="text-[10px] font-bold text-red-700 uppercase">Pessoas</span>
                            </div>
                            <p class="text-[10px] text-red-500 leading-snug">Sem capacitação estruturada</p>
                        </div>

                        <div class="border border-orange-200 bg-orange-50 rounded-xl p-3">
                            <div class="flex items-center gap-1.5 mb-1.5">
                                <svg class="w-3.5 h-3.5 text-orange-500 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z"/></svg>
                                <span class="text-[10px] font-bold text-orange-700 uppercase">Processos</span>
                            </div>
                            <p class="text-[10px] text-orange-500 leading-snug">Fluxos manuais e repetitivos</p>
                        </div>

                        <div class="col-span-2 flex items-center gap-2 px-1">
                            <div class="flex-1 h-px border-t border-dashed border-red-200"></div>
                            <span class="text-red-300 text-xs">✕</span>
                            <div class="flex-1 h-px border-t border-dashed border-red-200"></div>
                        </div>

                        <div class="border border-red-200 bg-red-50 rounded-xl p-3">
                            <div class="flex items-center gap-1.5 mb-1.5">
                                <svg class="w-3.5 h-3.5 text-red-500 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z"/></svg>
                                <span class="text-[10px] font-bold text-red-700 uppercase">Logística</span>
                            </div>
                            <p class="text-[10px] text-red-500 leading-snug">Sem visibilidade na cadeia</p>
                        </div>

                        <div class="border border-orange-200 bg-orange-50 rounded-xl p-3">
                            <div class="flex items-center gap-1.5 mb-1.5">
                                <svg class="w-3.5 h-3.5 text-orange-500 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z"/></svg>
                                <span class="text-[10px] font-bold text-orange-700 uppercase">Recursos</span>
                            </div>
                            <p class="text-[10px] text-orange-500 leading-snug">Investimento sem retorno</p>
                        </div>
                    </div>
                </div>

                <!-- Footer status -->
                <div class="mt-4 pt-4 border-t border-red-100 flex items-center justify-between">
                    <div class="flex items-center gap-1.5">
                        <span class="w-2 h-2 rounded-full bg-red-400"></span>
                        <span class="text-[10px] text-red-500 font-medium">6 módulos desconectados</span>
                    </div>
                    <span class="font-mono text-[9px] text-red-300 hidden sm:block">STATUS: CAOS</span>
                </div>
            </div>
        </div>

        <!-- ── CENTER: TRANSFORMAÇÃO ── -->
        <div class="relative flex flex-col items-center justify-center w-14 sm:w-24 shrink-0 gap-4">
            <!-- Top dashed connector -->
            <svg class="absolute top-0 bottom-1/2 w-full" preserveAspectRatio="none" viewBox="0 0 40 200">
                <line x1="20" y1="0" x2="20" y2="200" stroke="#bfdbfe" stroke-width="1.5" stroke-dasharray="5 4" class="flow-animated"/>
            </svg>
            <!-- Bottom dashed connector -->
            <svg class="absolute top-1/2 bottom-0 w-full" preserveAspectRatio="none" viewBox="0 0 40 200">
                <line x1="20" y1="0" x2="20" y2="200" stroke="#bbf7d0" stroke-width="1.5" stroke-dasharray="5 4" class="flow-animated"/>
            </svg>

            <!-- Center brand node -->
            <div class="relative z-10 flex flex-col items-center gap-2">
                <svg class="w-6 h-6 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/>
                </svg>
                <div class="w-12 h-12 sm:w-16 sm:h-16 rounded-2xl bg-blue-700 border-4 border-white flex items-center justify-center shadow-xl shadow-blue-700/30">
                    <svg class="w-5 h-5 sm:w-7 sm:h-7 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6A2.25 2.25 0 016 3.75h2.25A2.25 2.25 0 0110.5 6v2.25a2.25 2.25 0 01-2.25 2.25H6a2.25 2.25 0 01-2.25-2.25V6zM3.75 15.75A2.25 2.25 0 016 13.5h2.25a2.25 2.25 0 012.25 2.25V18a2.25 2.25 0 01-2.25 2.25H6A2.25 2.25 0 013.75 18v-2.25zM13.5 6a2.25 2.25 0 012.25-2.25H18A2.25 2.25 0 0120.25 6v2.25A2.25 2.25 0 0118 10.5h-2.25a2.25 2.25 0 01-2.25-2.25V6zM13.5 15.75a2.25 2.25 0 012.25-2.25H18a2.25 2.25 0 012.25 2.25V18A2.25 2.25 0 0118 20.25h-2.25A2.25 2.25 0 0113.5 18v-2.25z" />
                    </svg>
                </div>
                <div class="text-center leading-tight">
                    <p class="text-[8px] sm:text-[10px] font-bold text-blue-700 tracking-wider uppercase">Escola<br/>Online</p>
                </div>
                <svg class="w-6 h-6 text-emerald-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/>
                </svg>
            </div>
        </div>

        <!-- ── RIGHT: A SOLUÇÃO ── -->
        <div class="flex-1 relative rounded-2xl bg-white/70 border border-blue-200/70 overflow-hidden flex flex-col min-h-[460px]">
            <!-- Top bar -->
            <div class="flex items-center justify-between px-4 py-2.5 border-b border-blue-100 bg-blue-50/60">
                <div class="flex items-center gap-1.5">
                    <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                    <span class="text-[10px] font-bold text-emerald-700 tracking-widest uppercase">Com EscolaOnline</span>
                </div>
                <span class="font-mono text-[9px] text-blue-300 hidden sm:block">MODULE_SYSTEM // INTEGRADO</span>
            </div>

            <div class="p-5 sm:p-7 flex flex-col flex-1">
                <p class="text-xs font-semibold text-slate-700 mb-1">Infraestrutura corporativa integrada</p>
                <p class="text-xs text-slate-400 mb-5">Módulos conectados, equipes treinadas, processos automatizados.</p>

                <div class="flex-1 space-y-2.5">

                    <!-- Hub Central -->
                    <div class="border border-blue-300 bg-blue-700 rounded-xl p-3 flex items-center gap-3">
                        <div class="w-7 h-7 rounded-lg bg-white/20 flex items-center justify-center shrink-0">
                            <svg class="w-4 h-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6A2.25 2.25 0 016 3.75h2.25A2.25 2.25 0 0110.5 6v2.25a2.25 2.25 0 01-2.25 2.25H6a2.25 2.25 0 01-2.25-2.25V6zM3.75 15.75A2.25 2.25 0 016 13.5h2.25a2.25 2.25 0 012.25 2.25V18a2.25 2.25 0 01-2.25 2.25H6A2.25 2.25 0 013.75 18v-2.25zM13.5 6a2.25 2.25 0 012.25-2.25H18A2.25 2.25 0 0120.25 6v2.25A2.25 2.25 0 0118 10.5h-2.25a2.25 2.25 0 01-2.25-2.25V6zM13.5 15.75a2.25 2.25 0 012.25-2.25H18a2.25 2.25 0 012.25 2.25V18A2.25 2.25 0 0118 20.25h-2.25A2.25 2.25 0 0113.5 18v-2.25z" />
                            </svg>
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="text-[10px] font-bold text-white tracking-wider uppercase truncate">Hub Central de Treinamento</p>
                            <p class="text-[10px] text-blue-200 leading-snug">Integração total entre módulos</p>
                        </div>
                        <div class="flex items-center gap-1 shrink-0">
                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-400 animate-pulse"></span>
                            <span class="text-[9px] font-mono text-emerald-300">ATIVO</span>
                        </div>
                    </div>

                    <!-- Solid connector -->
                    <div class="flex items-center gap-2 px-1">
                        <div class="flex-1 h-px bg-blue-200"></div>
                        <div class="w-2 h-2 rounded-full bg-blue-400 border border-white"></div>
                        <div class="flex-1 h-px bg-blue-200"></div>
                    </div>

                    <!-- Row: IA + Tecnologia -->
                    <div class="grid grid-cols-2 gap-2">
                        <div class="border border-blue-200 bg-blue-50 rounded-xl p-3 relative">
                            <div class="absolute -right-1 top-1/2 -translate-y-1/2 w-2 h-2 rounded-full bg-blue-400 border border-white"></div>
                            <div class="flex items-center gap-1.5 mb-1">
                                <svg class="w-3.5 h-3.5 text-blue-600 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9.813 15.904L9 18.75l-.813-2.846a4.5 4.5 0 00-3.09-3.09L2.25 12l2.846-.813a4.5 4.5 0 003.09-3.09L9 5.25l.813 2.846a4.5 4.5 0 003.09 3.09L15.75 12l-2.846.813a4.5 4.5 0 00-3.09 3.09z"/></svg>
                                <span class="text-[10px] font-bold text-blue-700 uppercase">IA Aplicada</span>
                            </div>
                            <p class="text-[10px] text-blue-500 leading-snug">Automação com dados reais</p>
                        </div>
                        <div class="border border-emerald-200 bg-emerald-50 rounded-xl p-3 relative">
                            <div class="absolute -left-1 top-1/2 -translate-y-1/2 w-2 h-2 rounded-full bg-emerald-400 border border-white"></div>
                            <div class="flex items-center gap-1.5 mb-1">
                                <svg class="w-3.5 h-3.5 text-emerald-600 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17.25 6.75L22.5 12l-5.25 5.25m-10.5 0L1.5 12l5.25-5.25m7.5-3l-4.5 16.5"/></svg>
                                <span class="text-[10px] font-bold text-emerald-700 uppercase">Tecnologia</span>
                            </div>
                            <p class="text-[10px] text-emerald-500 leading-snug">Sistemas modernos ativos</p>
                        </div>
                    </div>

                    <!-- Row: Pessoas + Logística -->
                    <div class="grid grid-cols-2 gap-2">
                        <div class="border border-violet-200 bg-violet-50 rounded-xl p-3">
                            <div class="flex items-center gap-1.5 mb-1">
                                <svg class="w-3.5 h-3.5 text-violet-600 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z"/></svg>
                                <span class="text-[10px] font-bold text-violet-700 uppercase">Pessoas</span>
                            </div>
                            <p class="text-[10px] text-violet-500 leading-snug">Equipes capacitadas</p>
                        </div>
                        <div class="border border-amber-200 bg-amber-50 rounded-xl p-3">
                            <div class="flex items-center gap-1.5 mb-1">
                                <svg class="w-3.5 h-3.5 text-amber-600 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M8.25 18.75a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h6m-9 0H3.375a1.125 1.125 0 01-1.125-1.125V14.25m17.25 4.5a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h1.125c.621 0 1.129-.504 1.09-1.124a17.902 17.902 0 00-3.213-9.193 2.056 2.056 0 00-1.58-.86H14.25M16.5 18.75h-2.25m0-11.177v-.958c0-.568-.422-1.048-.987-1.106a48.554 48.554 0 00-10.026 0 1.106 1.106 0 00-.987 1.106v7.635m12-6.677v6.677m0 4.5v-4.5m0 0h-12"/></svg>
                                <span class="text-[10px] font-bold text-amber-700 uppercase">Logística</span>
                            </div>
                            <p class="text-[10px] text-amber-500 leading-snug">Cadeia otimizada e rastreável</p>
                        </div>
                    </div>
                </div>

                <!-- Footer status -->
                <div class="mt-4 pt-4 border-t border-blue-100 flex items-center justify-between">
                    <div class="flex items-center gap-1.5">
                        <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                        <span class="text-[10px] text-emerald-600 font-medium">6 módulos integrados</span>
                    </div>
                    <span class="font-mono text-[9px] text-emerald-400 hidden sm:block">STATUS: OTIMIZADO</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Stats strip -->
    <div class="border-t border-slate-200/70 bg-white/80 backdrop-blur-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 sm:grid-cols-4 divide-x divide-slate-200/60">
                <div class="py-4 px-4 text-center">
                    <div class="text-xl sm:text-2xl font-bold text-slate-900">+120</div>
                    <div class="text-[11px] text-slate-500 mt-0.5 tracking-wide">Empresas Atendidas</div>
                </div>
                <div class="py-4 px-4 text-center">
                    <div class="text-xl sm:text-2xl font-bold text-slate-900">+8.000</div>
                    <div class="text-[11px] text-slate-500 mt-0.5 tracking-wide">Profissionais Formados</div>
                </div>
                <div class="py-4 px-4 text-center">
                    <div class="text-xl sm:text-2xl font-bold text-slate-900">+500h</div>
                    <div class="text-[11px] text-slate-500 mt-0.5 tracking-wide">Conteúdo Corporativo</div>
                </div>
                <div class="py-4 px-4 text-center">
                    <div class="text-xl sm:text-2xl font-bold text-blue-700">98%</div>
                    <div class="text-[11px] text-slate-500 mt-0.5 tracking-wide">Taxa de Satisfação</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ================================================================
     PROCESSO — COMO ENTRAMOS NA SUA EMPRESA
================================================================ -->
<section id="processo" class="py-20 sm:py-28 bg-white border-t border-slate-200/60">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="mb-14">
            <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full border border-slate-200 bg-slate-50 text-slate-500 text-[11px] font-bold tracking-widest uppercase mb-5">
                // Metodologia de Implantação
            </div>
            <div class="flex flex-col lg:flex-row lg:items-end lg:justify-between gap-4">
                <h2 class="text-3xl sm:text-4xl font-bold text-slate-900 tracking-tight max-w-lg">
                    Como reorganizamos<br/>sua empresa
                </h2>
                <p class="text-slate-500 max-w-xs text-sm leading-relaxed lg:text-right">
                    Não vendemos cursos avulsos. Entregamos uma infraestrutura de conhecimento operando dentro da sua operação.
                </p>
            </div>
        </div>

        <!-- Process flow horizontal -->
        <div class="relative">
            <!-- Connector line desktop -->
            <div class="absolute top-9 left-[calc(12.5%+2rem)] right-[calc(12.5%+2rem)] h-px bg-gradient-to-r from-slate-200 via-blue-300 to-emerald-300 hidden sm:block pointer-events-none"></div>

            <div class="grid grid-cols-1 sm:grid-cols-4 gap-8 sm:gap-4">

                <div class="flex sm:flex-col items-start sm:items-center sm:text-center gap-5 sm:gap-0">
                    <div class="relative z-10 shrink-0 w-[4.5rem] h-[4.5rem] rounded-2xl border-2 border-slate-200 bg-white flex items-center justify-center shadow-sm sm:mb-5">
                        <div class="absolute -top-2.5 -right-2.5 w-6 h-6 rounded-full bg-slate-800 text-white text-[10px] font-bold flex items-center justify-center">01</div>
                        <svg class="w-7 h-7 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 002.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 00-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 00.75-.75 2.25 2.25 0 00-.1-.664m-5.8 0A2.251 2.251 0 0113.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25zM6.75 12h.008v.008H6.75V12zm0 3h.008v.008H6.75V15zm0 3h.008v.008H6.75V18z"/></svg>
                    </div>
                    <div>
                        <h3 class="font-bold text-slate-900 text-sm sm:text-base mb-1">Diagnóstico</h3>
                        <p class="text-sm text-slate-500 leading-relaxed">Mapeamos processos, tecnologias e gaps de capacitação.</p>
                    </div>
                </div>

                <div class="flex sm:flex-col items-start sm:items-center sm:text-center gap-5 sm:gap-0">
                    <div class="relative z-10 shrink-0 w-[4.5rem] h-[4.5rem] rounded-2xl border-2 border-slate-200 bg-white flex items-center justify-center shadow-sm sm:mb-5">
                        <div class="absolute -top-2.5 -right-2.5 w-6 h-6 rounded-full bg-slate-800 text-white text-[10px] font-bold flex items-center justify-center">02</div>
                        <svg class="w-7 h-7 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 3.75v4.5m0-4.5h4.5m-4.5 0L9 9M3.75 20.25v-4.5m0 4.5h4.5m-4.5 0L9 15M20.25 3.75h-4.5m4.5 0v4.5m0-4.5L15 9m5.25 11.25h-4.5m4.5 0v-4.5m0 4.5L15 15"/></svg>
                    </div>
                    <div>
                        <h3 class="font-bold text-slate-900 text-sm sm:text-base mb-1">Planejamento</h3>
                        <p class="text-sm text-slate-500 leading-relaxed">Plano de ação com trilhas personalizadas e KPIs mensuráveis.</p>
                    </div>
                </div>

                <div class="flex sm:flex-col items-start sm:items-center sm:text-center gap-5 sm:gap-0">
                    <div class="relative z-10 shrink-0 w-[4.5rem] h-[4.5rem] rounded-2xl border-2 border-blue-200 bg-blue-50 flex items-center justify-center shadow-sm sm:mb-5">
                        <div class="absolute -top-2.5 -right-2.5 w-6 h-6 rounded-full bg-blue-700 text-white text-[10px] font-bold flex items-center justify-center">03</div>
                        <svg class="w-7 h-7 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M5.25 5.653c0-.856.917-1.398 1.667-.986l11.54 6.348a1.125 1.125 0 010 1.971l-11.54 6.347a1.125 1.125 0 01-1.667-.985V5.653z"/></svg>
                    </div>
                    <div>
                        <h3 class="font-bold text-slate-900 text-sm sm:text-base mb-1">Implementação</h3>
                        <p class="text-sm text-slate-500 leading-relaxed">Treinamentos ao vivo, software e reestruturação de processos.</p>
                    </div>
                </div>

                <div class="flex sm:flex-col items-start sm:items-center sm:text-center gap-5 sm:gap-0">
                    <div class="relative z-10 shrink-0 w-[4.5rem] h-[4.5rem] rounded-2xl border-2 border-emerald-200 bg-emerald-50 flex items-center justify-center shadow-sm sm:mb-5">
                        <div class="absolute -top-2.5 -right-2.5 w-6 h-6 rounded-full bg-emerald-600 text-white text-[10px] font-bold flex items-center justify-center">04</div>
                        <svg class="w-7 h-7 text-emerald-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18L9 11.25l4.306 4.307a11.95 11.95 0 015.814-5.519l2.74-1.22m0 0l-5.94-2.28m5.94 2.28l-2.28 5.941"/></svg>
                    </div>
                    <div>
                        <h3 class="font-bold text-slate-900 text-sm sm:text-base mb-1">Otimização</h3>
                        <p class="text-sm text-slate-500 leading-relaxed">Acompanhamento contínuo, métricas e evolução dos processos.</p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

<!-- ================================================================
     BENTO GRID — PILARES / MÓDULOS DO SISTEMA
================================================================ -->
<section id="pilares" class="py-20 sm:py-28 bg-blueprint-dense border-t border-slate-200/60">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="mb-14">
            <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full border border-blue-200 bg-blue-50 text-blue-700 text-[11px] font-bold tracking-widest uppercase mb-5">
                // Arquitetura do Sistema
            </div>
            <div class="flex flex-col lg:flex-row lg:items-end lg:justify-between gap-4">
                <h2 class="text-3xl sm:text-4xl font-bold text-slate-900 tracking-tight">
                    4 pilares.<br/>
                    <span class="text-blue-700">1 sistema integrado.</span>
                </h2>
                <p class="text-slate-500 max-w-xs text-sm leading-relaxed">
                    Cada módulo opera de forma autônoma mas se conecta aos demais para criar uma engrenagem corporativa completa.
                </p>
            </div>
        </div>

        <!-- BENTO GRID ASSIMÉTRICO -->
        <div class="grid grid-cols-12 gap-4">

            <!-- CARD 1: IA — LARGE (7/12 cols, 2 rows visually via padding) -->
            <div class="col-span-12 lg:col-span-7 group relative bg-white border border-slate-200 rounded-2xl overflow-hidden hover:border-blue-300 hover:shadow-xl hover:shadow-blue-100/50 transition-all duration-300 flex flex-col">
                <div class="flex items-center justify-between px-5 py-3 border-b border-slate-100 bg-slate-50/80 shrink-0">
                    <div class="flex items-center gap-2">
                        <div class="flex gap-1">
                            <div class="w-2.5 h-2.5 rounded-full bg-red-400"></div>
                            <div class="w-2.5 h-2.5 rounded-full bg-amber-400"></div>
                            <div class="w-2.5 h-2.5 rounded-full bg-emerald-400"></div>
                        </div>
                        <span class="text-[10px] font-mono text-slate-400 ml-2">module://ia-corporativa</span>
                    </div>
                    <div class="flex items-center gap-1.5">
                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
                        <span class="text-[10px] font-mono text-slate-400">ONLINE</span>
                    </div>
                </div>

                <div class="p-7 sm:p-8 flex flex-col flex-1">
                    <div class="flex items-start justify-between gap-4 mb-7">
                        <div>
                            <div class="inline-flex items-center gap-1.5 px-2 py-1 rounded-md bg-blue-50 border border-blue-200 text-blue-700 text-[10px] font-bold tracking-wider uppercase mb-3">
                                Pilar Principal
                            </div>
                            <h3 class="text-2xl font-bold text-slate-900">IA para Empresas</h3>
                            <p class="mt-2 text-slate-500 text-sm leading-relaxed max-w-sm">
                                Implementamos Inteligência Artificial nos fluxos da sua empresa: automação de processos, análise preditiva, chatbots corporativos e uso estratégico de LLMs no dia a dia operacional.
                            </p>
                        </div>
                        <div class="shrink-0 w-14 h-14 rounded-2xl bg-blue-700 flex items-center justify-center shadow-lg shadow-blue-700/25">
                            <svg class="w-7 h-7 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M9.813 15.904L9 18.75l-.813-2.846a4.5 4.5 0 00-3.09-3.09L2.25 12l2.846-.813a4.5 4.5 0 003.09-3.09L9 5.25l.813 2.846a4.5 4.5 0 003.09 3.09L15.75 12l-2.846.813a4.5 4.5 0 00-3.09 3.09z"/></svg>
                        </div>
                    </div>

                    <div class="mt-auto grid grid-cols-3 gap-3 mb-6">
                        <div class="border border-slate-100 rounded-xl p-3 bg-slate-50">
                            <div class="text-[10px] font-mono text-blue-600 mb-1">ENTREGA_01</div>
                            <div class="text-xs font-semibold text-slate-700">Machine Learning</div>
                        </div>
                        <div class="border border-slate-100 rounded-xl p-3 bg-slate-50">
                            <div class="text-[10px] font-mono text-blue-600 mb-1">ENTREGA_02</div>
                            <div class="text-xs font-semibold text-slate-700">LLMs &amp; GPT API</div>
                        </div>
                        <div class="border border-slate-100 rounded-xl p-3 bg-slate-50">
                            <div class="text-[10px] font-mono text-blue-600 mb-1">ENTREGA_03</div>
                            <div class="text-xs font-semibold text-slate-700">Automação RPA</div>
                        </div>
                    </div>

                    <div class="flex items-center justify-between">
                        <a href="#" class="inline-flex items-center gap-2 text-sm font-semibold text-blue-700 hover:text-blue-800 transition-colors group/link">
                            Conhecer módulo
                            <svg class="w-4 h-4 transition-transform duration-150 group-hover/link:translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                        </a>
                        <!-- Visual activity bars -->
                        <div class="flex items-end gap-0.5">
                            <div class="w-1 h-3 rounded-full bg-blue-200"></div>
                            <div class="w-1 h-5 rounded-full bg-blue-300"></div>
                            <div class="w-1 h-7 rounded-full bg-blue-500"></div>
                            <div class="w-1 h-5 rounded-full bg-blue-400"></div>
                            <div class="w-1 h-8 rounded-full bg-blue-700"></div>
                            <div class="w-1 h-4 rounded-full bg-blue-300"></div>
                        </div>
                    </div>
                </div>

                <!-- Right connection node -->
                <div class="absolute right-0 top-1/2 -translate-y-1/2 translate-x-1/2 w-3 h-3 rounded-full bg-blue-500 border-2 border-white shadow hidden lg:block"></div>
            </div>

            <!-- CARD 2: Dev Web -->
            <div class="col-span-12 lg:col-span-5 group relative bg-white border border-slate-200 rounded-2xl overflow-hidden hover:border-emerald-300 hover:shadow-xl hover:shadow-emerald-100/50 transition-all duration-300 flex flex-col">
                <div class="flex items-center justify-between px-5 py-3 border-b border-slate-100 bg-slate-50/80 shrink-0">
                    <span class="text-[10px] font-mono text-slate-400">module://dev-web</span>
                    <div class="flex items-center gap-1.5">
                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
                        <span class="text-[10px] font-mono text-slate-400">ONLINE</span>
                    </div>
                </div>
                <div class="p-6 flex flex-col flex-1">
                    <div class="flex items-start gap-4 mb-5">
                        <div class="shrink-0 w-12 h-12 rounded-xl bg-emerald-600 flex items-center justify-center shadow-md shadow-emerald-600/20">
                            <svg class="w-6 h-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M17.25 6.75L22.5 12l-5.25 5.25m-10.5 0L1.5 12l5.25-5.25m7.5-3l-4.5 16.5"/></svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-bold text-slate-900">Desenvolvimento Web</h3>
                            <p class="text-sm text-slate-500 leading-relaxed mt-1">Sistemas modernos, APIs e plataformas digitais construídas para operar em escala corporativa.</p>
                        </div>
                    </div>
                    <div class="flex flex-wrap gap-2 mb-5">
                        <span class="px-2 py-1 rounded-lg bg-emerald-50 border border-emerald-200 text-emerald-700 text-[10px] font-bold">React &amp; Node</span>
                        <span class="px-2 py-1 rounded-lg bg-slate-50 border border-slate-200 text-slate-600 text-[10px] font-bold">Cloud &amp; DevOps</span>
                        <span class="px-2 py-1 rounded-lg bg-slate-50 border border-slate-200 text-slate-600 text-[10px] font-bold">APIs REST</span>
                    </div>
                    <div class="mt-auto">
                        <a href="#" class="inline-flex items-center gap-1.5 text-sm font-semibold text-emerald-700 hover:text-emerald-800 transition-colors group/link">
                            Ver módulo
                            <svg class="w-3.5 h-3.5 transition-transform duration-150 group-hover/link:translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                        </a>
                    </div>
                </div>
                <div class="absolute left-0 top-1/2 -translate-y-1/2 -translate-x-1/2 w-3 h-3 rounded-full bg-emerald-500 border-2 border-white shadow hidden lg:block"></div>
            </div>

            <!-- CARD 3: Gestão de Pessoas -->
            <div class="col-span-12 lg:col-span-5 group relative bg-white border border-slate-200 rounded-2xl overflow-hidden hover:border-violet-300 hover:shadow-xl hover:shadow-violet-100/50 transition-all duration-300 flex flex-col">
                <div class="flex items-center justify-between px-5 py-3 border-b border-slate-100 bg-slate-50/80 shrink-0">
                    <span class="text-[10px] font-mono text-slate-400">module://gestao-pessoas</span>
                    <div class="flex items-center gap-1.5">
                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
                        <span class="text-[10px] font-mono text-slate-400">ONLINE</span>
                    </div>
                </div>
                <div class="p-6 flex flex-col flex-1">
                    <div class="flex items-start gap-4 mb-5">
                        <div class="shrink-0 w-12 h-12 rounded-xl bg-violet-600 flex items-center justify-center shadow-md shadow-violet-600/20">
                            <svg class="w-6 h-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z"/></svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-bold text-slate-900">Gestão de Pessoas</h3>
                            <p class="text-sm text-slate-500 leading-relaxed mt-1">Reestruturamos equipes, cultura e liderança para alta performance corporativa.</p>
                        </div>
                    </div>
                    <div class="flex flex-wrap gap-2 mb-5">
                        <span class="px-2 py-1 rounded-lg bg-violet-50 border border-violet-200 text-violet-700 text-[10px] font-bold">Liderança Ágil</span>
                        <span class="px-2 py-1 rounded-lg bg-slate-50 border border-slate-200 text-slate-600 text-[10px] font-bold">RH Estratégico</span>
                        <span class="px-2 py-1 rounded-lg bg-slate-50 border border-slate-200 text-slate-600 text-[10px] font-bold">Performance</span>
                    </div>
                    <div class="mt-auto">
                        <a href="#" class="inline-flex items-center gap-1.5 text-sm font-semibold text-violet-700 hover:text-violet-800 transition-colors group/link">
                            Ver módulo
                            <svg class="w-3.5 h-3.5 transition-transform duration-150 group-hover/link:translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                        </a>
                    </div>
                </div>
                <div class="absolute left-0 top-1/2 -translate-y-1/2 -translate-x-1/2 w-3 h-3 rounded-full bg-violet-500 border-2 border-white shadow hidden lg:block"></div>
            </div>

            <!-- CARD 4: Logística — FULL WIDTH -->
            <div class="col-span-12 group relative bg-white border border-slate-200 rounded-2xl overflow-hidden hover:border-amber-300 hover:shadow-xl hover:shadow-amber-100/50 transition-all duration-300">
                <div class="flex items-center justify-between px-5 py-3 border-b border-slate-100 bg-slate-50/80">
                    <span class="text-[10px] font-mono text-slate-400">module://logistica-supply-chain</span>
                    <div class="flex items-center gap-1.5">
                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
                        <span class="text-[10px] font-mono text-slate-400">ONLINE</span>
                    </div>
                </div>
                <div class="p-6 flex flex-col sm:flex-row items-start gap-5">
                    <div class="shrink-0 w-12 h-12 rounded-xl bg-amber-500 flex items-center justify-center shadow-md shadow-amber-500/20">
                        <svg class="w-6 h-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M8.25 18.75a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h6m-9 0H3.375a1.125 1.125 0 01-1.125-1.125V14.25m17.25 4.5a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h1.125c.621 0 1.129-.504 1.09-1.124a17.902 17.902 0 00-3.213-9.193 2.056 2.056 0 00-1.58-.86H14.25M16.5 18.75h-2.25m0-11.177v-.958c0-.568-.422-1.048-.987-1.106a48.554 48.554 0 00-10.026 0 1.106 1.106 0 00-.987 1.106v7.635m12-6.677v6.677m0 4.5v-4.5m0 0h-12"/></svg>
                    </div>
                    <div class="flex-1">
                        <h3 class="text-lg font-bold text-slate-900 mb-1">Logística &amp; Supply Chain</h3>
                        <p class="text-sm text-slate-500 leading-relaxed">Otimizamos sua cadeia de suprimentos com tecnologia e processos inteligentes: roteirização, gestão de estoque, rastreabilidade e logística 4.0 integrada aos demais módulos do sistema.</p>
                    </div>
                    <div class="shrink-0 flex flex-wrap sm:flex-col gap-2">
                        <span class="px-2.5 py-1.5 rounded-lg bg-amber-50 border border-amber-200 text-amber-700 text-[10px] font-bold">Supply Chain 4.0</span>
                        <span class="px-2.5 py-1.5 rounded-lg bg-slate-50 border border-slate-200 text-slate-600 text-[10px] font-bold">Gestão de Estoque</span>
                        <span class="px-2.5 py-1.5 rounded-lg bg-slate-50 border border-slate-200 text-slate-600 text-[10px] font-bold">Roteirização IA</span>
                    </div>
                    <div class="shrink-0 self-center">
                        <a href="#" class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl border border-amber-200 bg-amber-50 hover:bg-amber-100 text-amber-700 text-sm font-semibold transition-colors">
                            Ver módulo
                            <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- ================================================================
     CTA FINAL
================================================================ -->
<section id="contato" class="py-20 sm:py-28 bg-white border-t border-slate-200/60">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="relative overflow-hidden rounded-3xl bg-slate-900 border border-slate-800">
            <!-- Blueprint grid overlay -->
            <div class="absolute inset-0 pointer-events-none" style="background-image: linear-gradient(rgba(255,255,255,0.04) 1px, transparent 1px), linear-gradient(90deg, rgba(255,255,255,0.04) 1px, transparent 1px); background-size: 48px 48px;"></div>
            <!-- Glows -->
            <div class="absolute top-0 left-1/4 w-96 h-64 bg-blue-600/10 rounded-full blur-3xl pointer-events-none"></div>
            <div class="absolute bottom-0 right-1/4 w-64 h-48 bg-emerald-600/8 rounded-full blur-3xl pointer-events-none"></div>

            <div class="relative grid grid-cols-1 lg:grid-cols-2 gap-10 p-10 sm:p-14 items-center">
                <div>
                    <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full border border-blue-500/30 bg-blue-500/10 text-blue-400 text-[11px] font-bold tracking-widest uppercase mb-6">
                        <span class="w-1.5 h-1.5 rounded-full bg-blue-400 animate-pulse"></span>
                        Diagnóstico Gratuito
                    </div>
                    <h2 class="text-3xl sm:text-4xl font-bold text-white tracking-tight mb-4">
                        Pronto para reorganizar<br/>sua empresa?
                    </h2>
                    <p class="text-slate-400 leading-relaxed max-w-md">
                        Nossos especialistas analisam sua operação e entregam um mapa de transformação personalizado — sem custo, sem compromisso.
                    </p>
                </div>
                <div class="flex flex-col gap-3">
                    <div class="flex items-center gap-3 p-4 rounded-xl bg-white/5 border border-white/8">
                        <div class="w-8 h-8 rounded-lg bg-blue-600/20 flex items-center justify-center shrink-0">
                            <svg class="w-4 h-4 text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                        </div>
                        <span class="text-sm text-slate-300">Diagnóstico completo de processos e infraestrutura</span>
                    </div>
                    <div class="flex items-center gap-3 p-4 rounded-xl bg-white/5 border border-white/8">
                        <div class="w-8 h-8 rounded-lg bg-emerald-600/20 flex items-center justify-center shrink-0">
                            <svg class="w-4 h-4 text-emerald-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                        </div>
                        <span class="text-sm text-slate-300">Plano de implementação com KPIs e timeline</span>
                    </div>
                    <div class="flex items-center gap-3 p-4 rounded-xl bg-white/5 border border-white/8">
                        <div class="w-8 h-8 rounded-lg bg-violet-600/20 flex items-center justify-center shrink-0">
                            <svg class="w-4 h-4 text-violet-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                        </div>
                        <span class="text-sm text-slate-300">Proposta personalizada para sua realidade</span>
                    </div>
                    <div class="mt-2 flex flex-col sm:flex-row gap-3">
                        <a href="#" class="flex-1 inline-flex items-center justify-center gap-2 px-6 py-3.5 rounded-xl bg-blue-600 hover:bg-blue-500 text-white font-semibold text-sm transition-all duration-200 shadow-lg shadow-blue-600/25">
                            Solicitar Diagnóstico Grátis
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                        </a>
                        <a href="#" class="flex-1 inline-flex items-center justify-center gap-2 px-6 py-3.5 rounded-xl border border-white/15 hover:border-white/30 hover:bg-white/5 text-white font-semibold text-sm transition-all duration-200">
                            Falar com especialista
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ================================================================
     FOOTER
================================================================ -->
<footer class="bg-white border-t border-slate-200/60 pt-14 pb-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-2 lg:grid-cols-5 gap-8 mb-12">

            <div class="col-span-2">
                <a href="/" class="flex items-center gap-2.5 mb-4">
                    <div class="w-8 h-8 rounded-lg bg-blue-700 flex items-center justify-center shadow-md shadow-blue-700/20">
                        <svg class="w-4 h-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6A2.25 2.25 0 016 3.75h2.25A2.25 2.25 0 0110.5 6v2.25a2.25 2.25 0 01-2.25 2.25H6a2.25 2.25 0 01-2.25-2.25V6zM3.75 15.75A2.25 2.25 0 016 13.5h2.25a2.25 2.25 0 012.25 2.25V18a2.25 2.25 0 01-2.25 2.25H6A2.25 2.25 0 013.75 18v-2.25zM13.5 6a2.25 2.25 0 012.25-2.25H18A2.25 2.25 0 0120.25 6v2.25A2.25 2.25 0 0118 10.5h-2.25a2.25 2.25 0 01-2.25-2.25V6zM13.5 15.75a2.25 2.25 0 012.25-2.25H18a2.25 2.25 0 012.25 2.25V18A2.25 2.25 0 0118 20.25h-2.25A2.25 2.25 0 0113.5 18v-2.25z"/></svg>
                    </div>
                    <span class="font-bold text-base">
                        <span class="text-slate-900">Escola</span><span class="text-blue-700">Online</span>
                    </span>
                </a>
                <p class="text-sm text-slate-500 leading-relaxed max-w-xs">
                    Reorganizamos empresas através de treinamento integrado com IA, tecnologia e gestão de pessoas.
                </p>
            </div>

            <div>
                <h4 class="text-xs font-bold text-slate-800 uppercase tracking-widest mb-4">Módulos</h4>
                <ul class="space-y-3">
                    <li><a href="#" class="text-sm text-slate-500 hover:text-slate-800 transition-colors">IA para Empresas</a></li>
                    <li><a href="#" class="text-sm text-slate-500 hover:text-slate-800 transition-colors">Desenvolvimento Web</a></li>
                    <li><a href="#" class="text-sm text-slate-500 hover:text-slate-800 transition-colors">Gestão de Pessoas</a></li>
                    <li><a href="#" class="text-sm text-slate-500 hover:text-slate-800 transition-colors">Logística</a></li>
                </ul>
            </div>

            <div>
                <h4 class="text-xs font-bold text-slate-800 uppercase tracking-widest mb-4">Empresa</h4>
                <ul class="space-y-3">
                    <li><a href="#" class="text-sm text-slate-500 hover:text-slate-800 transition-colors">Sobre Nós</a></li>
                    <li><a href="#" class="text-sm text-slate-500 hover:text-slate-800 transition-colors">Cases</a></li>
                    <li><a href="#" class="text-sm text-slate-500 hover:text-slate-800 transition-colors">Blog</a></li>
                    <li><a href="#" class="text-sm text-slate-500 hover:text-slate-800 transition-colors">Contato</a></li>
                </ul>
            </div>

            <div>
                <h4 class="text-xs font-bold text-slate-800 uppercase tracking-widest mb-4">Legal</h4>
                <ul class="space-y-3">
                    <li><a href="#" class="text-sm text-slate-500 hover:text-slate-800 transition-colors">Privacidade</a></li>
                    <li><a href="#" class="text-sm text-slate-500 hover:text-slate-800 transition-colors">Termos de Uso</a></li>
                    <li><a href="#" class="text-sm text-slate-500 hover:text-slate-800 transition-colors">LGPD</a></li>
                </ul>
            </div>
        </div>

        <div class="pt-8 border-t border-slate-200/60 flex flex-col sm:flex-row items-center justify-between gap-4">
            <p class="text-sm text-slate-400">&copy; {{ date('Y') }} EscolaOnline. Todos os direitos reservados.</p>
            <div class="flex items-center gap-4">
                <a href="#" aria-label="LinkedIn" class="text-slate-400 hover:text-slate-700 transition-colors">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433a2.062 2.062 0 01-2.063-2.065 2.064 2.064 0 112.063 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>
                </a>
                <a href="#" aria-label="Instagram" class="text-slate-400 hover:text-slate-700 transition-colors">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/></svg>
                </a>
                <a href="#" aria-label="YouTube" class="text-slate-400 hover:text-slate-700 transition-colors">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M23.498 6.186a3.016 3.016 0 00-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 00.502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 002.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 002.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>
                </a>
            </div>
        </div>
    </div>
</footer>

<script>
    (function () {
        var btn = document.getElementById('mobile-menu-btn');
        var menu = document.getElementById('mobile-menu');
        var iconOpen = document.getElementById('icon-open');
        var iconClose = document.getElementById('icon-close');
        if (!btn) return;
        btn.addEventListener('click', function () {
            var isOpen = !menu.classList.contains('hidden');
            menu.classList.toggle('hidden', isOpen);
            iconOpen.classList.toggle('hidden', !isOpen);
            iconClose.classList.toggle('hidden', isOpen);
        });
        menu.querySelectorAll('a').forEach(function (link) {
            link.addEventListener('click', function () {
                menu.classList.add('hidden');
                iconOpen.classList.remove('hidden');
                iconClose.classList.add('hidden');
            });
        });
    })();
</script>

</body>
</html>
