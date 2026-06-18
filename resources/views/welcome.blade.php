<!DOCTYPE html>
<html lang="pt-BR" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>City of Clouds | Conglomerado Tecnológico · Transformação Corporativa</title>
    <meta name="description" content="Entramos na sua empresa, mapeamos, reorganizamos e implementamos. Treinamento integrado com IA, gestão e tecnologia. Do caos à estrutura de alta performance.">

    @fonts

    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>
<body class="bg-slate-50 text-slate-900 antialiased overflow-x-hidden">

<!-- ================================================================
     NAVBAR
================================================================ -->
<header id="navbar" class="fixed top-0 left-0 right-0 z-50 transition-all duration-300">
    <nav class="border-b border-slate-200/70 bg-white/92 backdrop-blur-xl">
        <div class="w-full px-4 sm:px-8 lg:px-12">
            <div class="flex items-center justify-between h-18 py-2">

                <!-- Logo -->
                <a href="/" class="flex items-center gap-3 shrink-0">
                    <img src="{{ Vite::asset('resources/imgs/logo_otimizada.png') }}"
                         alt="City of Clouds"
                         class="h-10 w-auto">
                </a>

                <!-- Nav links desktop -->
                <div class="hidden lg:flex items-center gap-7">
                    <a href="/gestao-pessoas" class="nav-link text-sm text-slate-500 hover:text-violet-700 font-medium transition-colors duration-150 relative after:absolute after:bottom-0 after:left-0 after:h-px after:w-0 after:bg-violet-600 hover:after:w-full after:transition-all">Gestão de Pessoas</a>
                    <a href="/ia" class="nav-link text-sm text-slate-500 hover:text-indigo-800 font-medium transition-colors duration-150 relative after:absolute after:bottom-0 after:left-0 after:h-px after:w-0 after:bg-indigo-700 hover:after:w-full after:transition-all">IA Aplicada</a>
                    <a href="/tecnologia" class="nav-link text-sm text-slate-500 hover:text-emerald-700 font-medium transition-colors duration-150 relative after:absolute after:bottom-0 after:left-0 after:h-px after:w-0 after:bg-emerald-600 hover:after:w-full after:transition-all">Tecnologia</a>
                    <a href="/logistica" class="nav-link text-sm text-slate-500 hover:text-amber-700 font-medium transition-colors duration-150 relative after:absolute after:bottom-0 after:left-0 after:h-px after:w-0 after:bg-amber-600 hover:after:w-full after:transition-all">Logística</a>
                    <a href="/gestao" class="nav-link text-sm text-slate-500 hover:text-indigo-800 font-medium transition-colors duration-150 relative after:absolute after:bottom-0 after:left-0 after:h-px after:w-0 after:bg-indigo-700 hover:after:w-full after:transition-all">Gestão</a>
                </div>

                <!-- CTAs -->
                <div class="flex items-center gap-3">
                    <a href="/login" class="hidden md:inline-block text-sm text-slate-500 hover:text-slate-900 font-medium transition-colors px-3 py-2">
                        Entrar
                    </a>
                    <a href="/login" class="hidden sm:inline-flex items-center gap-1.5 px-4 py-2.5 rounded-xl border border-indigo-200 text-indigo-800 text-sm font-semibold hover:bg-indigo-50 transition-all duration-150">
                        Para Profissionais
                    </a>
                    <a href="{{ route('empresa.auth.login') }}" class="inline-flex items-center gap-1.5 px-4 py-2.5 rounded-xl bg-indigo-900 hover:bg-indigo-800 text-white text-sm font-semibold transition-all duration-150 shadow-lg shadow-indigo-900/20">
                        Para Empresas
                        <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                    </a>
                    <button id="mobile-menu-btn" class="lg:hidden p-2 rounded-lg text-slate-500 hover:bg-slate-100 transition-colors">
                        <svg id="icon-open" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/></svg>
                        <svg id="icon-close" class="w-5 h-5 hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile menu -->
        <div id="mobile-menu" class="hidden lg:hidden border-t border-slate-200/60">
            <div class="px-4 py-4 space-y-1">
                <a href="/gestao-pessoas" class="block px-3 py-2.5 rounded-lg text-sm text-slate-600 hover:bg-violet-50 hover:text-violet-800 transition-colors">Gestão de Pessoas</a>
                <a href="/ia" class="block px-3 py-2.5 rounded-lg text-sm text-slate-600 hover:bg-indigo-50 hover:text-indigo-800 transition-colors">IA Aplicada</a>
                <a href="/tecnologia" class="block px-3 py-2.5 rounded-lg text-sm text-slate-600 hover:bg-emerald-50 hover:text-emerald-800 transition-colors">Tecnologia</a>
                <a href="/logistica" class="block px-3 py-2.5 rounded-lg text-sm text-slate-600 hover:bg-amber-50 hover:text-amber-800 transition-colors">Logística</a>
                <a href="/gestao" class="block px-3 py-2.5 rounded-lg text-sm text-slate-600 hover:bg-indigo-50 hover:text-indigo-800 transition-colors">Gestão</a>
            </div>
        </div>
    </nav>
</header>

<!-- ================================================================
     HERO — HEMISFÉRIOS EDGE-TO-EDGE
================================================================ -->
<section id="diagnostico" class="relative pt-16 min-h-screen bg-blueprint flex flex-col">

    <!-- Blueprint corner markers -->
    <span class="absolute top-20 left-3 text-[9px] font-mono text-indigo-800/20 select-none pointer-events-none">X:00 Y:00</span>
    <span class="absolute top-20 right-3 text-[9px] font-mono text-indigo-800/20 select-none pointer-events-none">X:FF Y:00</span>
    <span class="absolute bottom-20 left-3 text-[9px] font-mono text-indigo-800/20 select-none pointer-events-none">X:00 Y:FF</span>
    <span class="absolute bottom-20 right-3 text-[9px] font-mono text-indigo-800/20 select-none pointer-events-none">X:FF Y:FF</span>

    <!-- Hero header -->
    <div class="relative pt-10 pb-6 text-center px-4">
        <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full border border-indigo-200 bg-indigo-50 text-indigo-700 text-[11px] font-bold tracking-widest uppercase">
            <span class="w-1.5 h-1.5 rounded-full bg-indigo-600 animate-pulse"></span>
            Diagnóstico de Transformação Corporativa
        </div>
        <h1 class="mt-5 text-3xl sm:text-4xl lg:text-5xl font-bold leading-tight tracking-tight text-slate-900 max-w-3xl mx-auto">
            Sua empresa tem <span class="text-indigo-800">estrutura</span><br class="hidden sm:block"/>
            para o que está por vir?
        </h1>
        <p class="mt-3 text-slate-500 text-base max-w-xl mx-auto leading-relaxed">
            Mapeamos, reorganizamos e implementamos. Da rotina caótica ao sistema operando com precisão corporativa.
        </p>
    </div>

    <!-- HEMISFÉRIOS -->
    <div class="relative flex-1 flex items-stretch w-full max-w-[1400px] mx-auto px-3 sm:px-6 pb-6 gap-2 sm:gap-3">

        <!-- ─── LEFT: O PROBLEMA ─── -->
        <div class="flex-1 relative rounded-2xl bg-white/70 border border-red-200/70 overflow-hidden flex flex-col min-h-[460px] slide-left">
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

                <div class="flex-1 grid grid-cols-2 gap-2.5">
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

                <div class="mt-4 pt-4 border-t border-red-100 flex items-center justify-between">
                    <div class="flex items-center gap-1.5">
                        <span class="w-2 h-2 rounded-full bg-red-400"></span>
                        <span class="text-[10px] text-red-500 font-medium">6 módulos desconectados</span>
                    </div>
                    <span class="font-mono text-[9px] text-red-300 hidden sm:block">STATUS: CAOS</span>
                </div>
            </div>
        </div>

        <!-- ─── CENTER: TRANSFORMAÇÃO ─── -->
        <div class="relative flex flex-col items-center justify-center w-14 sm:w-24 shrink-0 gap-4">
            <svg class="absolute top-0 bottom-1/2 w-full" preserveAspectRatio="none" viewBox="0 0 40 200">
                <line x1="20" y1="0" x2="20" y2="200" stroke="#a5b4fc" stroke-width="1.5" stroke-dasharray="5 4" class="flow-animated"/>
            </svg>
            <svg class="absolute top-1/2 bottom-0 w-full" preserveAspectRatio="none" viewBox="0 0 40 200">
                <line x1="20" y1="0" x2="20" y2="200" stroke="#6ee7b7" stroke-width="1.5" stroke-dasharray="5 4" class="flow-animated"/>
            </svg>
            <div class="relative z-10 flex flex-col items-center gap-2">
                <svg class="w-5 h-5 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/></svg>
                <div class="w-12 h-12 sm:w-16 sm:h-16 rounded-2xl bg-indigo-900 border-4 border-white flex items-center justify-center shadow-xl shadow-indigo-900/30">
                    <img src="{{ Vite::asset('resources/imgs/icon_logo.webp') }}" alt="City of Clouds" class="w-6 h-6 sm:w-9 sm:h-9 object-contain brightness-200">
                </div>
                <div class="text-center leading-tight">
                    <p class="text-[8px] sm:text-[10px] font-bold text-indigo-800 tracking-wider uppercase">City of<br/>Clouds</p>
                </div>
                <svg class="w-5 h-5 text-emerald-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/></svg>
            </div>
        </div>

        <!-- ─── RIGHT: A SOLUÇÃO ─── -->
        <div class="flex-1 relative rounded-2xl bg-white/70 border border-indigo-200/70 overflow-hidden flex flex-col min-h-[460px] slide-right">
            <div class="flex items-center justify-between px-4 py-2.5 border-b border-indigo-100 bg-indigo-50/60">
                <div class="flex items-center gap-1.5">
                    <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                    <span class="text-[10px] font-bold text-emerald-700 tracking-widest uppercase">Com City of Clouds</span>
                </div>
                <span class="font-mono text-[9px] text-indigo-300 hidden sm:block">MODULE_SYSTEM // INTEGRADO</span>
            </div>

            <div class="p-5 sm:p-7 flex flex-col flex-1">
                <p class="text-xs font-semibold text-slate-700 mb-1">Infraestrutura corporativa integrada</p>
                <p class="text-xs text-slate-400 mb-5">Módulos conectados, equipes treinadas, processos automatizados.</p>

                <div class="flex-1 space-y-2.5">
                    <div class="border border-indigo-300 bg-indigo-900 rounded-xl p-3 flex items-center gap-3">
                        <div class="w-7 h-7 rounded-lg bg-white/20 flex items-center justify-center shrink-0">
                            <img src="{{ Vite::asset('resources/imgs/icon_logo.webp') }}" alt="" class="w-4 h-4 object-contain brightness-200">
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="text-[10px] font-bold text-white tracking-wider uppercase truncate">Hub Central de Treinamento</p>
                            <p class="text-[10px] text-indigo-300 leading-snug">Integração total entre módulos</p>
                        </div>
                        <div class="flex items-center gap-1 shrink-0">
                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-400 animate-pulse"></span>
                            <span class="text-[9px] font-mono text-emerald-300">ATIVO</span>
                        </div>
                    </div>
                    <div class="flex items-center gap-2 px-1">
                        <div class="flex-1 h-px bg-indigo-200"></div>
                        <div class="w-2 h-2 rounded-full bg-indigo-400 border border-white"></div>
                        <div class="flex-1 h-px bg-indigo-200"></div>
                    </div>
                    <div class="grid grid-cols-2 gap-2">
                        <div class="border border-indigo-200 bg-indigo-50 rounded-xl p-3 relative">
                            <div class="absolute -right-1 top-1/2 -translate-y-1/2 w-2 h-2 rounded-full bg-indigo-400 border border-white"></div>
                            <div class="flex items-center gap-1.5 mb-1">
                                <svg class="w-3.5 h-3.5 text-indigo-600 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9.813 15.904L9 18.75l-.813-2.846a4.5 4.5 0 00-3.09-3.09L2.25 12l2.846-.813a4.5 4.5 0 003.09-3.09L9 5.25l.813 2.846a4.5 4.5 0 003.09 3.09L15.75 12l-2.846.813a4.5 4.5 0 00-3.09 3.09z"/></svg>
                                <span class="text-[10px] font-bold text-indigo-700 uppercase">IA Aplicada</span>
                            </div>
                            <p class="text-[10px] text-indigo-500 leading-snug">Automação com dados reais</p>
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

                <div class="mt-4 pt-4 border-t border-indigo-100 flex items-center justify-between">
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
        <div class="max-w-[1400px] mx-auto px-3 sm:px-6">
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
                    <div class="text-xl sm:text-2xl font-bold text-indigo-800">98%</div>
                    <div class="text-[11px] text-slate-500 mt-0.5 tracking-wide">Taxa de Satisfação</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ================================================================
     DUAL AUDIENCE — PARA EMPRESAS / PARA PROFISSIONAIS
================================================================ -->
<section id="audiencia" class="py-0 border-t border-slate-200/60 overflow-hidden">

    <!-- Section header -->
    <div class="bg-white py-16 px-4 text-center border-b border-slate-100">
        <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full border border-slate-200 bg-slate-50 text-slate-600 text-[11px] font-bold tracking-widest uppercase mb-6">
            // Quem você é?
        </div>
        <h2 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-slate-900 tracking-tight max-w-3xl mx-auto">
            Dois caminhos.<br/><span class="text-indigo-800">Um mesmo sistema.</span>
        </h2>
        <p class="mt-4 text-slate-500 max-w-xl mx-auto text-base leading-relaxed">
            Nossa plataforma serve tanto quem quer reestruturar a própria empresa quanto quem quer se preparar para trabalhar em empresas de alto nível.
        </p>
    </div>

    <!-- SPLIT PANELS — full width, no container -->
    <div class="flex flex-col lg:flex-row min-h-[680px]">

        <!-- LEFT PANEL: Empresas -->
        <div class="flex-1 relative bg-indigo-900 p-8 sm:p-12 lg:p-16 flex flex-col justify-between overflow-hidden brick-container">
            <!-- Blueprint bg in dark -->
            <div class="absolute inset-0 pointer-events-none" style="background-image: linear-gradient(rgba(255,255,255,0.03) 1px, transparent 1px), linear-gradient(90deg, rgba(255,255,255,0.03) 1px, transparent 1px); background-size: 48px 48px;"></div>

            <!-- Corner label -->
            <div class="absolute top-5 right-5 font-mono text-[9px] text-white/20 hidden sm:block">TRACK_A // CORPORATIVO</div>

            <div class="relative z-10">
                <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full border border-white/20 bg-white/10 text-white text-[11px] font-bold tracking-widest uppercase mb-8 brick-card">
                    Para Empresas
                </div>
                <h3 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-white leading-tight mb-6 brick-card" style="animation-delay: 0.1s">
                    Sua empresa<br/>precisa ser<br/><span class="text-indigo-300">reorganizada.</span>
                </h3>
                <p class="text-indigo-200 text-lg leading-relaxed max-w-lg mb-8 brick-card" style="animation-delay: 0.2s">
                    Não basta contratar mais. Não basta comprar um software. A transformação real vem de reestruturar processos, capacitar pessoas e implementar tecnologia de forma integrada — e é exatamente isso que entregamos.
                </p>

                <!-- What we deliver -->
                <div class="space-y-3 mb-10">
                    @php
                    $empresaItems = [
                        ['Diagnóstico completo de processos e gaps tecnológicos', '01'],
                        ['Plano de reestruturação com KPIs e timeline definidos', '02'],
                        ['Implementação de software e automação com IA', '03'],
                        ['Capacitação contínua de equipes via trilhas integradas', '04'],
                    ];
                    @endphp
                    @foreach($empresaItems as $i => $item)
                    <div class="flex items-start gap-3 brick-card" data-delay="{{ 0.25 + ($i * 0.08) }}">
                        <div class="shrink-0 w-7 h-7 rounded-lg bg-white/10 border border-white/20 flex items-center justify-center mt-0.5">
                            <span class="text-[10px] font-mono text-white/60">{{ $item[1] }}</span>
                        </div>
                        <p class="text-indigo-100 text-sm leading-snug mt-1">{{ $item[0] }}</p>
                    </div>
                    @endforeach
                </div>
            </div>

            <div class="relative z-10 brick-card" style="animation-delay: 0.6s">
                <a href="#contato" class="inline-flex items-center gap-2 px-7 py-4 rounded-2xl bg-white text-indigo-900 font-bold text-base hover:bg-indigo-50 transition-all duration-200 shadow-xl shadow-black/20">
                    Solicitar Diagnóstico Gratuito
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </a>
                <p class="text-indigo-400 text-xs mt-3">Sem custo. Sem compromisso. Resultado em 48h.</p>
            </div>
        </div>

        <!-- Divider -->
        <div class="relative hidden lg:flex flex-col items-center justify-center w-px bg-slate-200 shrink-0">
            <div class="absolute top-1/2 -translate-y-1/2 w-10 h-10 rounded-full bg-white border-2 border-slate-200 flex items-center justify-center shadow-md z-10">
                <span class="text-xs font-bold text-slate-400">ou</span>
            </div>
        </div>

        <!-- RIGHT PANEL: Profissionais/Estudantes -->
        <div class="flex-1 relative bg-slate-50 p-8 sm:p-12 lg:p-16 flex flex-col justify-between overflow-hidden brick-container" style="background-image: linear-gradient(rgba(30,27,129,0.04) 1px, transparent 1px), linear-gradient(90deg, rgba(30,27,129,0.04) 1px, transparent 1px); background-size: 48px 48px;">

            <!-- Corner label -->
            <div class="absolute top-5 right-5 font-mono text-[9px] text-slate-300 hidden sm:block">TRACK_B // PROFISSIONAL</div>

            <div>
                <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full border border-indigo-200 bg-indigo-50 text-indigo-700 text-[11px] font-bold tracking-widest uppercase mb-8 brick-card">
                    Para Profissionais &amp; Estudantes
                </div>
                <h3 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-slate-900 leading-tight mb-6 brick-card" style="animation-delay: 0.1s">
                    Aprenda o<br/>formato das<br/><span class="text-indigo-800">empresas do futuro.</span>
                </h3>
                <p class="text-slate-600 text-lg leading-relaxed max-w-lg mb-8 brick-card" style="animation-delay: 0.2s">
                    Mesmo sem experiência, você pode se preparar para trabalhar em empresas estruturadas. Aprenda IA, gestão, tecnologia e logística no formato exato que as melhores empresas operam — e entre já preparado.
                </p>

                <!-- What they get -->
                <div class="space-y-3 mb-10">
                    @php
                    $profItems = [
                        ['Trilhas de aprendizado estruturadas por nível e área', '01'],
                        ['Certificações reconhecidas pelo mercado corporativo', '02'],
                        ['Projetos práticos simulando ambientes reais de trabalho', '03'],
                        ['Mentoria e comunidade de profissionais em transição', '04'],
                    ];
                    @endphp
                    @foreach($profItems as $i => $item)
                    <div class="flex items-start gap-3 brick-card" data-delay="{{ 0.25 + ($i * 0.08) }}">
                        <div class="shrink-0 w-7 h-7 rounded-lg bg-indigo-100 border border-indigo-200 flex items-center justify-center mt-0.5">
                            <span class="text-[10px] font-mono text-indigo-600">{{ $item[1] }}</span>
                        </div>
                        <p class="text-slate-700 text-sm leading-snug mt-1">{{ $item[0] }}</p>
                    </div>
                    @endforeach
                </div>

                <!-- Skill level indicator -->
                <div class="p-5 rounded-2xl border border-slate-200 bg-white mb-8 brick-card" style="animation-delay: 0.6s">
                    <p class="text-xs font-bold text-slate-500 uppercase tracking-wider mb-4">Qual o seu ponto de partida?</p>
                    <div class="flex gap-2">
                        <div class="flex-1 text-center px-3 py-2.5 rounded-xl bg-indigo-50 border border-indigo-200 cursor-pointer hover:bg-indigo-100 transition-colors">
                            <p class="text-xs font-bold text-indigo-700">Iniciante</p>
                            <p class="text-[10px] text-indigo-500 mt-0.5">Do zero</p>
                        </div>
                        <div class="flex-1 text-center px-3 py-2.5 rounded-xl bg-slate-50 border border-slate-200 cursor-pointer hover:bg-slate-100 transition-colors">
                            <p class="text-xs font-bold text-slate-700">Intermediário</p>
                            <p class="text-[10px] text-slate-400 mt-0.5">Quer evoluir</p>
                        </div>
                        <div class="flex-1 text-center px-3 py-2.5 rounded-xl bg-slate-50 border border-slate-200 cursor-pointer hover:bg-slate-100 transition-colors">
                            <p class="text-xs font-bold text-slate-700">Avançado</p>
                            <p class="text-[10px] text-slate-400 mt-0.5">Especializar</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="brick-card" style="animation-delay: 0.7s">
                <a href="#modulos" class="inline-flex items-center gap-2 px-7 py-4 rounded-2xl bg-indigo-900 text-white font-bold text-base hover:bg-indigo-800 transition-all duration-200 shadow-xl shadow-indigo-900/20">
                    Explorar Trilhas de Aprendizado
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </a>
                <p class="text-slate-400 text-xs mt-3">Acesso gratuito aos primeiros módulos. Sem cartão de crédito.</p>
            </div>
        </div>
    </div>
</section>

<!-- ================================================================
     METODOLOGIA — COMO ENTRAMOS NA SUA EMPRESA
================================================================ -->
<section id="metodologia" class="py-24 sm:py-32 bg-white border-t border-slate-200/60">
    <div class="w-full px-6 sm:px-10 lg:px-16 max-w-6xl mx-auto">

        <div class="flex flex-col lg:flex-row lg:items-end lg:justify-between gap-8 mb-16">
            <div>
                <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full border border-slate-200 bg-slate-50 text-slate-500 text-[11px] font-bold tracking-widest uppercase mb-6">
                    // Metodologia de Implantação
                </div>
                <h2 class="text-3xl sm:text-4xl lg:text-5xl xl:text-6xl font-bold text-slate-900 tracking-tight leading-tight">
                    Como reorganizamos<br/>sua empresa
                </h2>
            </div>
            <p class="text-slate-500 max-w-sm text-base leading-relaxed lg:text-right">
                Não vendemos cursos avulsos. Entregamos uma infraestrutura de conhecimento operando dentro da sua operação — do diagnóstico ao acompanhamento contínuo.
            </p>
        </div>

        <!-- Process steps — HORIZONTAL + LARGE -->
        <div class="relative brick-container">
            <!-- Connector line -->
            <div class="absolute top-[3.25rem] left-[8%] right-[8%] h-px bg-gradient-to-r from-slate-200 via-indigo-300 to-emerald-300 hidden sm:block"></div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 sm:gap-4">

                <div class="flex flex-col brick-card">
                    <div class="relative z-10 self-start sm:self-center mb-6">
                        <div class="w-28 h-28 rounded-3xl border-2 border-slate-200 bg-white flex items-center justify-center shadow-sm">
                            <svg class="w-12 h-12 text-slate-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 002.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 00-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 00.75-.75 2.25 2.25 0 00-.1-.664m-5.8 0A2.251 2.251 0 0113.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25z"/></svg>
                        </div>
                        <div class="absolute -top-3 -right-3 w-8 h-8 rounded-full bg-slate-900 text-white text-xs font-bold flex items-center justify-center shadow-md">01</div>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-2 sm:text-center">Diagnóstico</h3>
                    <p class="text-sm text-slate-500 leading-relaxed sm:text-center">Mapeamos processos, tecnologias, pessoas e gaps operacionais da sua empresa com profundidade cirúrgica.</p>
                </div>

                <div class="flex flex-col brick-card" style="animation-delay: 0.12s">
                    <div class="relative z-10 self-start sm:self-center mb-6">
                        <div class="w-28 h-28 rounded-3xl border-2 border-slate-200 bg-white flex items-center justify-center shadow-sm">
                            <svg class="w-12 h-12 text-slate-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 3.75v4.5m0-4.5h4.5m-4.5 0L9 9M3.75 20.25v-4.5m0 4.5h4.5m-4.5 0L9 15M20.25 3.75h-4.5m4.5 0v4.5m0-4.5L15 9m5.25 11.25h-4.5m4.5 0v-4.5m0 4.5L15 15"/></svg>
                        </div>
                        <div class="absolute -top-3 -right-3 w-8 h-8 rounded-full bg-slate-900 text-white text-xs font-bold flex items-center justify-center shadow-md">02</div>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-2 sm:text-center">Planejamento</h3>
                    <p class="text-sm text-slate-500 leading-relaxed sm:text-center">Plano de ação personalizado com trilhas, KPIs, timeline de implantação e responsáveis definidos por módulo.</p>
                </div>

                <div class="flex flex-col brick-card" style="animation-delay: 0.24s">
                    <div class="relative z-10 self-start sm:self-center mb-6">
                        <div class="w-28 h-28 rounded-3xl border-2 border-indigo-200 bg-indigo-50 flex items-center justify-center shadow-sm">
                            <svg class="w-12 h-12 text-indigo-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1"><path stroke-linecap="round" stroke-linejoin="round" d="M5.25 5.653c0-.856.917-1.398 1.667-.986l11.54 6.348a1.125 1.125 0 010 1.971l-11.54 6.347a1.125 1.125 0 01-1.667-.985V5.653z"/></svg>
                        </div>
                        <div class="absolute -top-3 -right-3 w-8 h-8 rounded-full bg-indigo-800 text-white text-xs font-bold flex items-center justify-center shadow-md">03</div>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-2 sm:text-center">Implementação</h3>
                    <p class="text-sm text-slate-500 leading-relaxed sm:text-center">Treinamentos ao vivo, implementação de software, automação de processos e reestruturação de equipes em paralelo.</p>
                </div>

                <div class="flex flex-col brick-card" style="animation-delay: 0.36s">
                    <div class="relative z-10 self-start sm:self-center mb-6">
                        <div class="w-28 h-28 rounded-3xl border-2 border-emerald-200 bg-emerald-50 flex items-center justify-center shadow-sm">
                            <svg class="w-12 h-12 text-emerald-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18L9 11.25l4.306 4.307a11.95 11.95 0 015.814-5.519l2.74-1.22m0 0l-5.94-2.28m5.94 2.28l-2.28 5.941"/></svg>
                        </div>
                        <div class="absolute -top-3 -right-3 w-8 h-8 rounded-full bg-emerald-700 text-white text-xs font-bold flex items-center justify-center shadow-md">04</div>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-2 sm:text-center">Otimização</h3>
                    <p class="text-sm text-slate-500 leading-relaxed sm:text-center">Acompanhamento contínuo, dashboards em tempo real, ajustes de processo e evolução constante do sistema.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ================================================================
     MÓDULOS — BENTO GRID ASSIMÉTRICO EXPANDIDO
================================================================ -->
<section id="modulos" class="py-24 sm:py-32 bg-blueprint-dense border-t border-slate-200/60">
    <div class="w-full px-4 sm:px-8 lg:px-12 max-w-6xl mx-auto">

        <div class="flex flex-col lg:flex-row lg:items-end lg:justify-between gap-8 mb-16">
            <div>
                <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full border border-indigo-200 bg-indigo-50 text-indigo-700 text-[11px] font-bold tracking-widest uppercase mb-6">
                    // Arquitetura do Sistema
                </div>
                <h2 class="text-3xl sm:text-4xl lg:text-5xl xl:text-6xl font-bold text-slate-900 tracking-tight leading-tight">
                    4 pilares.<br/>
                    <span class="text-indigo-800">1 sistema integrado.</span>
                </h2>
            </div>
            <div class="flex items-center gap-3">
                <div class="w-2 h-2 rounded-full bg-indigo-400"></div>
                <p class="text-slate-500 max-w-xs text-base leading-relaxed">Cada módulo opera de forma autônoma mas se conecta aos demais criando uma engrenagem corporativa completa.</p>
            </div>
        </div>

        <!-- BENTO GRID -->
        <div class="grid grid-cols-12 gap-4 brick-container">

            <!-- IA para Empresas — LARGE (7 cols, tall) -->
            <div class="col-span-12 lg:col-span-7 group relative bg-white border border-slate-200 rounded-3xl overflow-hidden hover:border-indigo-300 hover:shadow-2xl hover:shadow-indigo-100/50 transition-all duration-400 flex flex-col brick-card">
                <div class="flex items-center justify-between px-6 py-4 border-b border-slate-100 bg-slate-50/80 shrink-0">
                    <div class="flex items-center gap-3">
                        <div class="flex gap-1">
                            <div class="w-3 h-3 rounded-full bg-red-400"></div>
                            <div class="w-3 h-3 rounded-full bg-amber-400"></div>
                            <div class="w-3 h-3 rounded-full bg-emerald-400"></div>
                        </div>
                        <span class="text-[10px] font-mono text-slate-400 ml-1">module://ia-corporativa v3.2</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
                        <span class="text-[10px] font-mono text-slate-400">ONLINE</span>
                    </div>
                </div>

                <div class="p-8 sm:p-10 flex flex-col flex-1">
                    <div class="flex items-start justify-between gap-4 mb-8">
                        <div>
                            <div class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-lg bg-indigo-50 border border-indigo-200 text-indigo-700 text-[10px] font-bold tracking-wider uppercase mb-4">
                                Pilar Principal · Alta Demanda
                            </div>
                            <h3 class="text-3xl font-bold text-slate-900">IA para Empresas</h3>
                            <p class="mt-3 text-slate-500 leading-relaxed max-w-md">
                                Implementamos Inteligência Artificial diretamente nos fluxos operacionais. Automação de processos repetitivos, análise preditiva, chatbots corporativos e uso estratégico de LLMs no dia a dia — sem jargão, com resultado mensurável.
                            </p>
                        </div>
                        <div class="shrink-0 w-16 h-16 rounded-2xl bg-indigo-900 flex items-center justify-center shadow-xl shadow-indigo-900/25">
                            <svg class="w-9 h-9 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M9.813 15.904L9 18.75l-.813-2.846a4.5 4.5 0 00-3.09-3.09L2.25 12l2.846-.813a4.5 4.5 0 003.09-3.09L9 5.25l.813 2.846a4.5 4.5 0 003.09 3.09L15.75 12l-2.846.813a4.5 4.5 0 00-3.09 3.09z"/></svg>
                        </div>
                    </div>

                    <!-- Deliverables -->
                    <div class="grid grid-cols-3 gap-3 mb-8">
                        <div class="border border-slate-100 rounded-2xl p-4 bg-slate-50 hover:bg-indigo-50 hover:border-indigo-200 transition-colors group/item">
                            <div class="text-[10px] font-mono text-indigo-500 mb-1.5">ENTREGA_01</div>
                            <div class="text-sm font-bold text-slate-700">Machine Learning</div>
                            <div class="text-[11px] text-slate-400 mt-1">Modelos preditivos</div>
                        </div>
                        <div class="border border-slate-100 rounded-2xl p-4 bg-slate-50 hover:bg-indigo-50 hover:border-indigo-200 transition-colors">
                            <div class="text-[10px] font-mono text-indigo-500 mb-1.5">ENTREGA_02</div>
                            <div class="text-sm font-bold text-slate-700">LLMs &amp; GPT API</div>
                            <div class="text-[11px] text-slate-400 mt-1">Chatbots corporativos</div>
                        </div>
                        <div class="border border-slate-100 rounded-2xl p-4 bg-slate-50 hover:bg-indigo-50 hover:border-indigo-200 transition-colors">
                            <div class="text-[10px] font-mono text-indigo-500 mb-1.5">ENTREGA_03</div>
                            <div class="text-sm font-bold text-slate-700">Automação RPA</div>
                            <div class="text-[11px] text-slate-400 mt-1">Fluxos sem humano</div>
                        </div>
                    </div>

                    <div class="mt-auto flex items-center justify-between pt-6 border-t border-slate-100">
                        <a href="#" class="inline-flex items-center gap-2 text-base font-bold text-indigo-800 hover:text-indigo-900 transition-colors group/link">
                            Conhecer módulo completo
                            <svg class="w-5 h-5 transition-transform duration-150 group-hover/link:translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                        </a>
                        <div class="flex items-end gap-0.5">
                            <div class="w-1.5 h-4 rounded-full bg-indigo-200"></div>
                            <div class="w-1.5 h-6 rounded-full bg-indigo-300"></div>
                            <div class="w-1.5 h-8 rounded-full bg-indigo-500"></div>
                            <div class="w-1.5 h-6 rounded-full bg-indigo-400"></div>
                            <div class="w-1.5 h-10 rounded-full bg-indigo-700"></div>
                            <div class="w-1.5 h-5 rounded-full bg-indigo-300"></div>
                            <div class="w-1.5 h-8 rounded-full bg-indigo-600"></div>
                        </div>
                    </div>
                </div>
                <div class="absolute right-0 top-1/2 -translate-y-1/2 translate-x-1/2 w-4 h-4 rounded-full bg-indigo-500 border-2 border-white shadow-md hidden lg:block"></div>
            </div>

            <!-- Dev Web (5 cols) -->
            <div class="col-span-12 lg:col-span-5 group relative bg-white border border-slate-200 rounded-3xl overflow-hidden hover:border-emerald-300 hover:shadow-2xl hover:shadow-emerald-100/50 transition-all duration-400 flex flex-col brick-card" style="animation-delay: 0.1s">
                <div class="flex items-center justify-between px-6 py-4 border-b border-slate-100 bg-slate-50/80 shrink-0">
                    <span class="text-[10px] font-mono text-slate-400">module://dev-web v2.1</span>
                    <div class="flex items-center gap-2">
                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
                        <span class="text-[10px] font-mono text-slate-400">ONLINE</span>
                    </div>
                </div>
                <div class="p-8 flex flex-col flex-1">
                    <div class="flex items-start gap-4 mb-6">
                        <div class="shrink-0 w-14 h-14 rounded-2xl bg-emerald-600 flex items-center justify-center shadow-lg shadow-emerald-600/20">
                            <svg class="w-8 h-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M17.25 6.75L22.5 12l-5.25 5.25m-10.5 0L1.5 12l5.25-5.25m7.5-3l-4.5 16.5"/></svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-slate-900">Desenvolvimento Web</h3>
                            <p class="text-sm text-slate-500 leading-relaxed mt-2">Sistemas modernos, APIs e plataformas digitais construídas para operar em escala corporativa.</p>
                        </div>
                    </div>
                    <div class="flex flex-wrap gap-2 mb-6">
                        <span class="px-3 py-1.5 rounded-xl bg-emerald-50 border border-emerald-200 text-emerald-700 text-xs font-bold">React &amp; Node</span>
                        <span class="px-3 py-1.5 rounded-xl bg-slate-50 border border-slate-200 text-slate-600 text-xs font-bold">Cloud &amp; DevOps</span>
                        <span class="px-3 py-1.5 rounded-xl bg-slate-50 border border-slate-200 text-slate-600 text-xs font-bold">APIs REST</span>
                        <span class="px-3 py-1.5 rounded-xl bg-slate-50 border border-slate-200 text-slate-600 text-xs font-bold">Segurança</span>
                    </div>
                    <div class="mt-auto">
                        <a href="#" class="inline-flex items-center gap-2 text-base font-bold text-emerald-700 hover:text-emerald-800 transition-colors group/link">
                            Ver módulo
                            <svg class="w-4 h-4 transition-transform duration-150 group-hover/link:translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                        </a>
                    </div>
                </div>
                <div class="absolute left-0 top-1/2 -translate-y-1/2 -translate-x-1/2 w-4 h-4 rounded-full bg-emerald-500 border-2 border-white shadow-md hidden lg:block"></div>
            </div>

            <!-- Gestão de Pessoas (5 cols) -->
            <div class="col-span-12 lg:col-span-5 group relative bg-white border border-slate-200 rounded-3xl overflow-hidden hover:border-violet-300 hover:shadow-2xl hover:shadow-violet-100/50 transition-all duration-400 flex flex-col brick-card" style="animation-delay: 0.2s">
                <div class="flex items-center justify-between px-6 py-4 border-b border-slate-100 bg-slate-50/80 shrink-0">
                    <span class="text-[10px] font-mono text-slate-400">module://gestao-pessoas v1.8</span>
                    <div class="flex items-center gap-2">
                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
                        <span class="text-[10px] font-mono text-slate-400">ONLINE</span>
                    </div>
                </div>
                <div class="p-8 flex flex-col flex-1">
                    <div class="flex items-start gap-4 mb-6">
                        <div class="shrink-0 w-14 h-14 rounded-2xl bg-violet-600 flex items-center justify-center shadow-lg shadow-violet-600/20">
                            <svg class="w-8 h-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z"/></svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-slate-900">Gestão de Pessoas</h3>
                            <p class="text-sm text-slate-500 leading-relaxed mt-2">Reestruturamos equipes, cultura organizacional e liderança para alta performance corporativa sustentável.</p>
                        </div>
                    </div>
                    <div class="flex flex-wrap gap-2 mb-6">
                        <span class="px-3 py-1.5 rounded-xl bg-violet-50 border border-violet-200 text-violet-700 text-xs font-bold">Liderança Ágil</span>
                        <span class="px-3 py-1.5 rounded-xl bg-slate-50 border border-slate-200 text-slate-600 text-xs font-bold">RH Estratégico</span>
                        <span class="px-3 py-1.5 rounded-xl bg-slate-50 border border-slate-200 text-slate-600 text-xs font-bold">OKRs</span>
                        <span class="px-3 py-1.5 rounded-xl bg-slate-50 border border-slate-200 text-slate-600 text-xs font-bold">Cultura</span>
                    </div>
                    <div class="mt-auto">
                        <a href="#" class="inline-flex items-center gap-2 text-base font-bold text-violet-700 hover:text-violet-800 transition-colors group/link">
                            Ver módulo
                            <svg class="w-4 h-4 transition-transform duration-150 group-hover/link:translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                        </a>
                    </div>
                </div>
                <div class="absolute left-0 top-1/2 -translate-y-1/2 -translate-x-1/2 w-4 h-4 rounded-full bg-violet-500 border-2 border-white shadow-md hidden lg:block"></div>
            </div>

            <!-- Logística — FULL WIDTH -->
            <div class="col-span-12 group relative bg-white border border-slate-200 rounded-3xl overflow-hidden hover:border-amber-300 hover:shadow-2xl hover:shadow-amber-100/50 transition-all duration-400 brick-card" style="animation-delay: 0.3s">
                <div class="flex items-center justify-between px-6 py-4 border-b border-slate-100 bg-slate-50/80">
                    <span class="text-[10px] font-mono text-slate-400">module://logistica-supply-chain v4.0</span>
                    <div class="flex items-center gap-2">
                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
                        <span class="text-[10px] font-mono text-slate-400">ONLINE</span>
                    </div>
                </div>
                <div class="p-8 flex flex-col sm:flex-row items-start gap-6">
                    <div class="shrink-0 w-14 h-14 rounded-2xl bg-amber-500 flex items-center justify-center shadow-lg shadow-amber-500/20">
                        <svg class="w-8 h-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M8.25 18.75a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h6m-9 0H3.375a1.125 1.125 0 01-1.125-1.125V14.25m17.25 4.5a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h1.125c.621 0 1.129-.504 1.09-1.124a17.902 17.902 0 00-3.213-9.193 2.056 2.056 0 00-1.58-.86H14.25M16.5 18.75h-2.25m0-11.177v-.958c0-.568-.422-1.048-.987-1.106a48.554 48.554 0 00-10.026 0 1.106 1.106 0 00-.987 1.106v7.635m12-6.677v6.677m0 4.5v-4.5m0 0h-12"/></svg>
                    </div>
                    <div class="flex-1">
                        <h3 class="text-xl font-bold text-slate-900 mb-2">Logística &amp; Supply Chain 4.0</h3>
                        <p class="text-base text-slate-500 leading-relaxed">Otimizamos sua cadeia de suprimentos com tecnologia e processos inteligentes: roteirização com IA, gestão de estoque em tempo real, rastreabilidade completa e logística 4.0 integrada aos demais módulos do sistema corporativo.</p>
                    </div>
                    <div class="shrink-0 flex flex-row sm:flex-col gap-2">
                        <span class="px-3 py-1.5 rounded-xl bg-amber-50 border border-amber-200 text-amber-700 text-xs font-bold whitespace-nowrap">Supply Chain 4.0</span>
                        <span class="px-3 py-1.5 rounded-xl bg-slate-50 border border-slate-200 text-slate-600 text-xs font-bold whitespace-nowrap">Gestão de Estoque</span>
                        <span class="px-3 py-1.5 rounded-xl bg-slate-50 border border-slate-200 text-slate-600 text-xs font-bold whitespace-nowrap">Roteirização IA</span>
                    </div>
                    <div class="shrink-0 self-center">
                        <a href="#" class="inline-flex items-center gap-2 px-5 py-3 rounded-2xl border border-amber-200 bg-amber-50 hover:bg-amber-100 text-amber-700 text-sm font-bold transition-colors">
                            Ver módulo
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- ================================================================
     INSIGHTS — CARDS COM ANIMAÇÃO DE BLOCOS
================================================================ -->
<section id="insights" class="py-24 sm:py-32 bg-white border-t border-slate-200/60">
    <div class="w-full px-4 sm:px-8 lg:px-12 max-w-6xl mx-auto">

        <div class="flex flex-col lg:flex-row lg:items-end lg:justify-between gap-8 mb-12">
            <div>
                <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full border border-slate-200 bg-slate-50 text-slate-500 text-[11px] font-bold tracking-widest uppercase mb-6">
                    // Comportamentos &amp; Insights Corporativos
                </div>
                <h2 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-slate-900 tracking-tight">
                    O que empresas de<br/><span class="text-indigo-800">alta performance fazem diferente.</span>
                </h2>
            </div>
            <a href="#" class="inline-flex items-center gap-2 px-5 py-3 rounded-xl border border-slate-200 text-slate-600 text-sm font-semibold hover:bg-slate-50 transition-colors self-start lg:self-end">
                Ver todos os artigos
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
            </a>
        </div>

        <!-- Filter nav -->
        <div class="flex flex-wrap gap-2 mb-10" id="insights-filters">
            <button class="filter-btn is-active px-4 py-2 rounded-xl border border-slate-200 text-sm font-semibold text-slate-600 hover:border-indigo-300 transition-all" data-filter="all">Todos</button>
            <button class="filter-btn px-4 py-2 rounded-xl border border-slate-200 text-sm font-semibold text-slate-600 hover:border-indigo-300 transition-all" data-filter="gestao">Gestão</button>
            <button class="filter-btn px-4 py-2 rounded-xl border border-slate-200 text-sm font-semibold text-slate-600 hover:border-indigo-300 transition-all" data-filter="ia">IA Aplicada</button>
            <button class="filter-btn px-4 py-2 rounded-xl border border-slate-200 text-sm font-semibold text-slate-600 hover:border-indigo-300 transition-all" data-filter="tecnologia">Tecnologia</button>
            <button class="filter-btn px-4 py-2 rounded-xl border border-slate-200 text-sm font-semibold text-slate-600 hover:border-indigo-300 transition-all" data-filter="logistica">Logística</button>
            <button class="filter-btn px-4 py-2 rounded-xl border border-slate-200 text-sm font-semibold text-slate-600 hover:border-indigo-300 transition-all" data-filter="pessoas">Pessoas</button>
        </div>

        <!-- Cards grid — brick animation -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4 brick-container" id="insights-grid">

            @php
            $insights = [
                ['cat' => 'gestao', 'tag' => 'Gestão', 'color' => 'indigo', 'time' => '5 min', 'title' => 'Por que 73% das empresas não escalam: o problema não é capital, é estrutura', 'desc' => 'Empresas que crescem com saúde operam com processos replicáveis, equipes treinadas e tecnologia que suporta a operação.'],
                ['cat' => 'ia', 'tag' => 'IA Aplicada', 'color' => 'violet', 'time' => '7 min', 'title' => 'Como implementar IA na sua operação sem precisar contratar um cientista de dados', 'desc' => 'Ferramentas acessíveis e fluxos de automação que qualquer gestor pode adotar em até 30 dias com o treinamento certo.'],
                ['cat' => 'pessoas', 'tag' => 'Pessoas', 'color' => 'emerald', 'time' => '4 min', 'title' => 'O custo real de uma equipe sem capacitação contínua', 'desc' => 'Retrabalho, erros operacionais e alta rotatividade custam em média 3x mais do que um programa de treinamento estruturado.'],
                ['cat' => 'tecnologia', 'tag' => 'Tecnologia', 'color' => 'blue', 'time' => '6 min', 'title' => 'Da planilha ao sistema: como modernizar a infraestrutura tecnológica da sua empresa em etapas', 'desc' => 'Um roteiro prático para sair dos processos manuais e adotar software corporativo sem paralisia tecnológica.'],
                ['cat' => 'logistica', 'tag' => 'Logística', 'color' => 'amber', 'time' => '5 min', 'title' => 'Logística 4.0: rastreabilidade e visibilidade de ponta a ponta na cadeia de suprimentos', 'desc' => 'Empresas que adotam visibilidade total na cadeia reduzem custos operacionais em até 28% no primeiro ano.'],
                ['cat' => 'gestao', 'tag' => 'Gestão', 'color' => 'indigo', 'time' => '8 min', 'title' => 'OKRs, KPIs e Dashboards: como criar uma cultura de dados sem complexidade desnecessária', 'desc' => 'Um framework simples para que cada área da empresa tome decisões baseadas em números reais, não intuição.'],
                ['cat' => 'pessoas', 'tag' => 'Pessoas', 'color' => 'emerald', 'time' => '4 min', 'title' => 'Prepare-se para trabalhar na empresa do futuro mesmo sem experiência', 'desc' => 'Profissionais que dominam IA, gestão e logística estão sendo contratados antes de qualquer senioridade técnica.'],
                ['cat' => 'ia', 'tag' => 'IA Aplicada', 'color' => 'violet', 'time' => '6 min', 'title' => 'Chatbots corporativos que realmente funcionam: do atendimento ao back-office', 'desc' => 'Como implementar assistentes de IA que automatizam processos internos sem frustrar a equipe ou o cliente.'],
            ];
            @endphp

            @foreach($insights as $i => $item)
            @php
            $colors = [
                'indigo' => ['border' => 'border-indigo-100', 'bg' => 'bg-indigo-50', 'text' => 'text-indigo-700', 'dot' => 'bg-indigo-500'],
                'violet' => ['border' => 'border-violet-100', 'bg' => 'bg-violet-50', 'text' => 'text-violet-700', 'dot' => 'bg-violet-500'],
                'emerald' => ['border' => 'border-emerald-100', 'bg' => 'bg-emerald-50', 'text' => 'text-emerald-700', 'dot' => 'bg-emerald-500'],
                'blue' => ['border' => 'border-blue-100', 'bg' => 'bg-blue-50', 'text' => 'text-blue-700', 'dot' => 'bg-blue-500'],
                'amber' => ['border' => 'border-amber-100', 'bg' => 'bg-amber-50', 'text' => 'text-amber-700', 'dot' => 'bg-amber-500'],
            ];
            $c = $colors[$item['color']];
            @endphp
            <div class="brick-card insight-card group flex flex-col border border-slate-200 rounded-2xl bg-white overflow-hidden hover:border-slate-300 hover:shadow-lg hover:shadow-slate-100/60 transition-all duration-300 cursor-pointer"
                 data-category="{{ $item['cat'] }}"
                 data-delay="{{ $i * 0.08 }}">

                <!-- Category color bar -->
                <div class="h-1.5 w-full {{ $c['dot'] }}"></div>

                <div class="p-6 flex flex-col flex-1">
                    <!-- Tag + time -->
                    <div class="flex items-center justify-between mb-4">
                        <div class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-lg {{ $c['bg'] }} {{ $c['border'] }} border {{ $c['text'] }} text-[10px] font-bold tracking-wider uppercase">
                            <span class="w-1.5 h-1.5 rounded-full {{ $c['dot'] }}"></span>
                            {{ $item['tag'] }}
                        </div>
                        <span class="text-[11px] text-slate-400 font-medium">{{ $item['time'] }} leitura</span>
                    </div>

                    <!-- Title -->
                    <h4 class="text-sm font-bold text-slate-900 leading-snug mb-3 group-hover:text-indigo-800 transition-colors flex-1">
                        {{ $item['title'] }}
                    </h4>

                    <!-- Description -->
                    <p class="text-xs text-slate-500 leading-relaxed mb-5">{{ $item['desc'] }}</p>

                    <!-- Footer -->
                    <div class="flex items-center justify-between mt-auto pt-4 border-t border-slate-100">
                        <div class="flex items-center gap-2">
                            <div class="w-6 h-6 rounded-full bg-indigo-100 flex items-center justify-center">
                                <img src="{{ Vite::asset('resources/imgs/icon_logo.webp') }}" alt="" class="w-4 h-4 object-contain">
                            </div>
                            <span class="text-[11px] text-slate-400">City of Clouds</span>
                        </div>
                        <svg class="w-4 h-4 text-slate-300 group-hover:text-indigo-500 group-hover:translate-x-0.5 transition-all duration-150" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</section>

<!-- ================================================================
     CTA FINAL — FULL WIDTH, DRAMÁTICO
================================================================ -->
<section id="contato" class="py-24 sm:py-32 bg-indigo-900 border-t border-indigo-800 overflow-hidden relative">
    <!-- Blueprint overlay -->
    <div class="absolute inset-0 pointer-events-none" style="background-image: linear-gradient(rgba(255,255,255,0.03) 1px, transparent 1px), linear-gradient(90deg, rgba(255,255,255,0.03) 1px, transparent 1px); background-size: 48px 48px;"></div>
    <!-- Glows -->
    <div class="absolute -top-32 left-1/4 w-[600px] h-[400px] bg-indigo-700/40 rounded-full blur-3xl pointer-events-none"></div>
    <div class="absolute -bottom-32 right-1/4 w-[400px] h-[300px] bg-violet-700/20 rounded-full blur-3xl pointer-events-none"></div>
    <!-- Corner markers -->
    <span class="absolute top-4 left-4 text-[9px] font-mono text-white/10 select-none">[CTA_FINAL]</span>
    <span class="absolute top-4 right-4 text-[9px] font-mono text-white/10 select-none">[CONV_MODULE]</span>

    <div class="relative w-full px-6 sm:px-10 lg:px-16 max-w-6xl mx-auto">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">

            <!-- Left: copy -->
            <div>
                <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full border border-white/20 bg-white/10 text-white text-[11px] font-bold tracking-widest uppercase mb-8">
                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-400 animate-pulse"></span>
                    Diagnóstico Gratuito · Disponível Agora
                </div>
                <h2 class="text-4xl sm:text-5xl lg:text-6xl font-bold text-white tracking-tight leading-tight mb-6">
                    Pronto para<br/>reorganizar<br/><span class="text-indigo-300">sua empresa?</span>
                </h2>
                <p class="text-indigo-200 text-xl leading-relaxed max-w-lg mb-10">
                    Nossos especialistas analisam sua operação completa e entregam um mapa de transformação personalizado — em 48 horas, sem custo e sem compromisso.
                </p>
                <!-- Social proof -->
                <div class="flex items-center gap-4 flex-wrap">
                    <div class="flex -space-x-2">
                        <div class="w-9 h-9 rounded-full bg-indigo-700 border-2 border-indigo-900 flex items-center justify-center text-[10px] font-bold text-white">C1</div>
                        <div class="w-9 h-9 rounded-full bg-indigo-600 border-2 border-indigo-900 flex items-center justify-center text-[10px] font-bold text-white">C2</div>
                        <div class="w-9 h-9 rounded-full bg-indigo-500 border-2 border-indigo-900 flex items-center justify-center text-[10px] font-bold text-white">C3</div>
                        <div class="w-9 h-9 rounded-full bg-indigo-800 border-2 border-indigo-900 flex items-center justify-center text-[10px] font-bold text-white">+</div>
                    </div>
                    <p class="text-indigo-300 text-sm"><span class="text-white font-bold">+120 empresas</span> já transformadas. Próxima pode ser a sua.</p>
                </div>
            </div>

            <!-- Right: checklist + CTA -->
            <div class="flex flex-col gap-4">
                <div class="p-5 rounded-2xl bg-white/8 border border-white/12 flex items-center gap-4">
                    <div class="w-10 h-10 rounded-xl bg-indigo-700/60 flex items-center justify-center shrink-0">
                        <svg class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 002.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 00-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 00.75-.75 2.25 2.25 0 00-.1-.664m-5.8 0A2.251 2.251 0 0113.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25z"/></svg>
                    </div>
                    <div>
                        <p class="text-white font-semibold text-sm">Diagnóstico completo de processos</p>
                        <p class="text-indigo-300 text-xs mt-0.5">Mapeamento de todos os gargalos operacionais e tecnológicos</p>
                    </div>
                </div>
                <div class="p-5 rounded-2xl bg-white/8 border border-white/12 flex items-center gap-4">
                    <div class="w-10 h-10 rounded-xl bg-emerald-700/60 flex items-center justify-center shrink-0">
                        <svg class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18L9 11.25l4.306 4.307a11.95 11.95 0 015.814-5.519l2.74-1.22m0 0l-5.94-2.28m5.94 2.28l-2.28 5.941"/></svg>
                    </div>
                    <div>
                        <p class="text-white font-semibold text-sm">Plano de implementação com KPIs</p>
                        <p class="text-indigo-300 text-xs mt-0.5">Timeline detalhado com métricas de sucesso e responsáveis</p>
                    </div>
                </div>
                <div class="p-5 rounded-2xl bg-white/8 border border-white/12 flex items-center gap-4">
                    <div class="w-10 h-10 rounded-xl bg-violet-700/60 flex items-center justify-center shrink-0">
                        <svg class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9.813 15.904L9 18.75l-.813-2.846a4.5 4.5 0 00-3.09-3.09L2.25 12l2.846-.813a4.5 4.5 0 003.09-3.09L9 5.25l.813 2.846a4.5 4.5 0 003.09 3.09L15.75 12l-2.846.813a4.5 4.5 0 00-3.09 3.09z"/></svg>
                    </div>
                    <div>
                        <p class="text-white font-semibold text-sm">Proposta personalizada com ROI estimado</p>
                        <p class="text-indigo-300 text-xs mt-0.5">Investimento previsto e retorno projetado para sua realidade</p>
                    </div>
                </div>

                <div class="mt-4 flex flex-col sm:flex-row gap-3">
                    <a href="#" class="flex-1 inline-flex items-center justify-center gap-2 px-7 py-4 rounded-2xl bg-white text-indigo-900 font-bold text-base hover:bg-indigo-50 transition-all shadow-xl shadow-black/20">
                        Solicitar Diagnóstico Gratuito
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                    </a>
                    <a href="#" class="flex-1 inline-flex items-center justify-center gap-2 px-7 py-4 rounded-2xl border border-white/25 hover:border-white/50 hover:bg-white/8 text-white font-bold text-base transition-all">
                        Falar com Especialista
                    </a>
                </div>
                <p class="text-center text-indigo-400 text-xs">Sem custo · Sem compromisso · Resposta em 48h</p>
            </div>
        </div>
    </div>
</section>

<!-- ================================================================
     FOOTER
================================================================ -->
<footer class="bg-slate-950 pt-16 pb-8 border-t border-white/5">
    <div class="w-full px-6 sm:px-10 lg:px-16 max-w-6xl mx-auto">

        <div class="grid grid-cols-2 lg:grid-cols-6 gap-8 mb-14">
            <div class="col-span-2">
                <a href="/" class="inline-flex mb-6">
                    <img src="{{ Vite::asset('resources/imgs/logo_otimizada.png') }}"
                         alt="City of Clouds"
                         class="h-9 w-auto brightness-200 invert">
                </a>
                <p class="text-sm text-slate-500 leading-relaxed max-w-xs">
                    Reorganizamos empresas através de treinamento integrado com IA, tecnologia e gestão de pessoas. Conglomerado Tecnológico.
                </p>
                <div class="flex gap-3 mt-6">
                    <a href="#" class="w-9 h-9 rounded-lg bg-white/5 hover:bg-white/10 border border-white/10 flex items-center justify-center text-slate-400 hover:text-white transition-all">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433a2.062 2.062 0 01-2.063-2.065 2.064 2.064 0 112.063 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>
                    </a>
                    <a href="#" class="w-9 h-9 rounded-lg bg-white/5 hover:bg-white/10 border border-white/10 flex items-center justify-center text-slate-400 hover:text-white transition-all">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/></svg>
                    </a>
                    <a href="#" class="w-9 h-9 rounded-lg bg-white/5 hover:bg-white/10 border border-white/10 flex items-center justify-center text-slate-400 hover:text-white transition-all">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M23.498 6.186a3.016 3.016 0 00-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 00.502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 002.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 002.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>
                    </a>
                </div>
            </div>

            <div>
                <h4 class="text-xs font-bold text-white uppercase tracking-widest mb-5">Módulos</h4>
                <ul class="space-y-3">
                    <li><a href="#" class="text-sm text-slate-500 hover:text-white transition-colors">IA para Empresas</a></li>
                    <li><a href="#" class="text-sm text-slate-500 hover:text-white transition-colors">Desenvolvimento Web</a></li>
                    <li><a href="#" class="text-sm text-slate-500 hover:text-white transition-colors">Gestão de Pessoas</a></li>
                    <li><a href="#" class="text-sm text-slate-500 hover:text-white transition-colors">Logística 4.0</a></li>
                </ul>
            </div>

            <div>
                <h4 class="text-xs font-bold text-white uppercase tracking-widest mb-5">Para Empresas</h4>
                <ul class="space-y-3">
                    <li><a href="#" class="text-sm text-slate-500 hover:text-white transition-colors">Diagnóstico</a></li>
                    <li><a href="#" class="text-sm text-slate-500 hover:text-white transition-colors">Planos Corporativos</a></li>
                    <li><a href="#" class="text-sm text-slate-500 hover:text-white transition-colors">Cases de Sucesso</a></li>
                    <li><a href="#" class="text-sm text-slate-500 hover:text-white transition-colors">Parceiros</a></li>
                </ul>
            </div>

            <div>
                <h4 class="text-xs font-bold text-white uppercase tracking-widest mb-5">Para Profissionais</h4>
                <ul class="space-y-3">
                    <li><a href="#" class="text-sm text-slate-500 hover:text-white transition-colors">Trilhas de Aprendizado</a></li>
                    <li><a href="#" class="text-sm text-slate-500 hover:text-white transition-colors">Certificações</a></li>
                    <li><a href="#" class="text-sm text-slate-500 hover:text-white transition-colors">Comunidade</a></li>
                    <li><a href="#" class="text-sm text-slate-500 hover:text-white transition-colors">Mentoria</a></li>
                </ul>
            </div>

            <div>
                <h4 class="text-xs font-bold text-white uppercase tracking-widest mb-5">Empresa</h4>
                <ul class="space-y-3">
                    <li><a href="#" class="text-sm text-slate-500 hover:text-white transition-colors">Sobre Nós</a></li>
                    <li><a href="#" class="text-sm text-slate-500 hover:text-white transition-colors">Blog</a></li>
                    <li><a href="#" class="text-sm text-slate-500 hover:text-white transition-colors">Carreiras</a></li>
                    <li><a href="#" class="text-sm text-slate-500 hover:text-white transition-colors">Privacidade</a></li>
                </ul>
            </div>
        </div>

        <div class="pt-8 border-t border-white/8 flex flex-col sm:flex-row items-center justify-between gap-4">
            <p class="text-sm text-slate-600">&copy; {{ date('Y') }} City of Clouds · Conglomerado Tecnológico. Todos os direitos reservados.</p>
            <div class="flex items-center gap-2 text-sm text-slate-600">
                <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
                Todos os sistemas operando normalmente
            </div>
        </div>
    </div>
</footer>

<!-- ================================================================
     CORNER WIDGETS — lateral building block animations
================================================================ -->

<!-- TOP-LEFT: Gestão de Pessoas (violet) -->
<div class="corner-widget cw-left hidden xl:flex" style="top: 32vh;" id="cw-pessoas">
    <div class="cw-strip">
        <div class="cw-bk" style="width:30px;height:7px;background:#8b5cf6;border-radius:0 4px 4px 0;"></div>
        <div class="cw-bk" style="width:22px;height:7px;background:#a78bfa;border-radius:0 4px 4px 0;"></div>
        <div class="cw-bk" style="width:38px;height:7px;background:#7c3aed;border-radius:0 4px 4px 0;"></div>
        <div class="cw-bk" style="width:18px;height:7px;background:#c4b5fd;border-radius:0 4px 4px 0;"></div>
        <div class="cw-bk" style="width:34px;height:7px;background:#8b5cf6;border-radius:0 4px 4px 0;"></div>
        <div class="cw-bk" style="width:26px;height:7px;background:#a78bfa;border-radius:0 4px 4px 0;"></div>
        <svg class="cw-chevron" style="width:13px;height:13px;color:#8b5cf6;" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
    </div>
    <div class="cw-panel">
        <div class="cw-panel-inner">
            <div style="background:linear-gradient(135deg,#7c3aed,#6d28d9);padding:14px 16px;">
                <div style="display:flex;align-items:center;gap:10px;">
                    <div style="width:32px;height:32px;border-radius:10px;background:rgba(255,255,255,0.2);display:flex;align-items:center;justify-content:center;">
                        <svg style="width:18px;height:18px;color:white;" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z"/></svg>
                    </div>
                    <div>
                        <p style="font-size:10px;font-weight:800;color:white;text-transform:uppercase;letter-spacing:.08em;">Gestão de Pessoas</p>
                        <p style="font-size:10px;color:rgba(255,255,255,0.7);margin-top:1px;">Construa sua carreira de liderança</p>
                    </div>
                </div>
            </div>
            <div style="padding:14px 16px;">
                <p style="font-size:11px;font-weight:700;color:#581c87;margin-bottom:10px;">Sua jornada no ambiente corporativo:</p>
                <ul style="list-style:none;padding:0;margin:0 0 12px;display:flex;flex-direction:column;gap:7px;">
                    <li style="display:flex;align-items:flex-start;gap:7px;">
                        <span style="width:5px;height:5px;border-radius:50%;background:#8b5cf6;margin-top:4px;flex-shrink:0;"></span>
                        <span style="font-size:11px;color:#374151;line-height:1.4;">Entenda a hierarquia real que empresas modernas operam</span>
                    </li>
                    <li style="display:flex;align-items:flex-start;gap:7px;">
                        <span style="width:5px;height:5px;border-radius:50%;background:#8b5cf6;margin-top:4px;flex-shrink:0;"></span>
                        <span style="font-size:11px;color:#374151;line-height:1.4;">Aprenda a gerir equipes antes mesmo de ser contratado</span>
                    </li>
                    <li style="display:flex;align-items:flex-start;gap:7px;">
                        <span style="width:5px;height:5px;border-radius:50%;background:#8b5cf6;margin-top:4px;flex-shrink:0;"></span>
                        <span style="font-size:11px;color:#374151;line-height:1.4;">Construa autoridade progressiva em qualquer negócio</span>
                    </li>
                </ul>
                <a href="/gestao-pessoas" style="display:inline-flex;align-items:center;gap:5px;font-size:11px;font-weight:700;color:#7c3aed;text-decoration:none;">
                    Começar trilha de liderança
                    <svg style="width:11px;height:11px;" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </a>
            </div>
        </div>
    </div>
</div>

<!-- BOTTOM-LEFT: Logística (amber) -->
<div class="corner-widget cw-left hidden xl:flex" style="top: 65vh;" id="cw-logistica">
    <div class="cw-strip">
        <div class="cw-bk" style="width:34px;height:7px;background:#d97706;border-radius:0 4px 4px 0;"></div>
        <div class="cw-bk" style="width:20px;height:7px;background:#fbbf24;border-radius:0 4px 4px 0;"></div>
        <div class="cw-bk" style="width:36px;height:7px;background:#b45309;border-radius:0 4px 4px 0;"></div>
        <div class="cw-bk" style="width:24px;height:7px;background:#fde68a;border-radius:0 4px 4px 0;"></div>
        <div class="cw-bk" style="width:28px;height:7px;background:#d97706;border-radius:0 4px 4px 0;"></div>
        <div class="cw-bk" style="width:40px;height:7px;background:#f59e0b;border-radius:0 4px 4px 0;"></div>
        <svg class="cw-chevron" style="width:13px;height:13px;color:#d97706;" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
    </div>
    <div class="cw-panel">
        <div class="cw-panel-inner">
            <div style="background:linear-gradient(135deg,#b45309,#92400e);padding:14px 16px;">
                <div style="display:flex;align-items:center;gap:10px;">
                    <div style="width:32px;height:32px;border-radius:10px;background:rgba(255,255,255,0.2);display:flex;align-items:center;justify-content:center;">
                        <svg style="width:18px;height:18px;color:white;" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M8.25 18.75a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h6m-9 0H3.375a1.125 1.125 0 01-1.125-1.125V14.25m17.25 4.5a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h1.125c.621 0 1.129-.504 1.09-1.124a17.902 17.902 0 00-3.213-9.193 2.056 2.056 0 00-1.58-.86H14.25M16.5 18.75h-2.25m0-11.177v-.958c0-.568-.422-1.048-.987-1.106a48.554 48.554 0 00-10.026 0 1.106 1.106 0 00-.987 1.106v7.635m12-6.677v6.677m0 4.5v-4.5m0 0h-12"/></svg>
                    </div>
                    <div>
                        <p style="font-size:10px;font-weight:800;color:white;text-transform:uppercase;letter-spacing:.08em;">Logística 4.0</p>
                        <p style="font-size:10px;color:rgba(255,255,255,0.7);margin-top:1px;">Da confusão ao fluxo previsível</p>
                    </div>
                </div>
            </div>
            <div style="padding:14px 16px;">
                <p style="font-size:11px;font-weight:700;color:#78350f;margin-bottom:10px;">Para seu negócio ou microempresa:</p>
                <ul style="list-style:none;padding:0;margin:0 0 12px;display:flex;flex-direction:column;gap:7px;">
                    <li style="display:flex;align-items:flex-start;gap:7px;">
                        <span style="width:5px;height:5px;border-radius:50%;background:#d97706;margin-top:4px;flex-shrink:0;"></span>
                        <span style="font-size:11px;color:#374151;line-height:1.4;">Visibilidade total do estoque em tempo real</span>
                    </li>
                    <li style="display:flex;align-items:flex-start;gap:7px;">
                        <span style="width:5px;height:5px;border-radius:50%;background:#d97706;margin-top:4px;flex-shrink:0;"></span>
                        <span style="font-size:11px;color:#374151;line-height:1.4;">Roteirização inteligente para poupar tempo e combustível</span>
                    </li>
                    <li style="display:flex;align-items:flex-start;gap:7px;">
                        <span style="width:5px;height:5px;border-radius:50%;background:#d97706;margin-top:4px;flex-shrink:0;"></span>
                        <span style="font-size:11px;color:#374151;line-height:1.4;">Do pedido à entrega — rastreável e mensurável</span>
                    </li>
                </ul>
                <a href="/logistica" style="display:inline-flex;align-items:center;gap:5px;font-size:11px;font-weight:700;color:#b45309;text-decoration:none;">
                    Otimizar minha operação
                    <svg style="width:11px;height:11px;" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </a>
            </div>
        </div>
    </div>
</div>

<!-- TOP-RIGHT: IA Aplicada (indigo) -->
<div class="corner-widget cw-right hidden xl:flex" style="top: 32vh;" id="cw-ia">
    <div class="cw-strip">
        <div class="cw-bk" style="width:32px;height:7px;background:#4338ca;border-radius:4px 0 0 4px;"></div>
        <div class="cw-bk" style="width:24px;height:7px;background:#6366f1;border-radius:4px 0 0 4px;"></div>
        <div class="cw-bk" style="width:40px;height:7px;background:#3730a3;border-radius:4px 0 0 4px;"></div>
        <div class="cw-bk" style="width:18px;height:7px;background:#818cf8;border-radius:4px 0 0 4px;"></div>
        <div class="cw-bk" style="width:36px;height:7px;background:#4338ca;border-radius:4px 0 0 4px;"></div>
        <div class="cw-bk" style="width:22px;height:7px;background:#6366f1;border-radius:4px 0 0 4px;"></div>
        <svg class="cw-chevron" style="width:13px;height:13px;color:#4338ca;" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/></svg>
    </div>
    <div class="cw-panel">
        <div class="cw-panel-inner">
            <div style="background:linear-gradient(135deg,#3730a3,#312e81);padding:14px 16px;">
                <div style="display:flex;align-items:center;gap:10px;">
                    <div style="width:32px;height:32px;border-radius:10px;background:rgba(255,255,255,0.2);display:flex;align-items:center;justify-content:center;">
                        <svg style="width:18px;height:18px;color:white;" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M9.813 15.904L9 18.75l-.813-2.846a4.5 4.5 0 00-3.09-3.09L2.25 12l2.846-.813a4.5 4.5 0 003.09-3.09L9 5.25l.813 2.846a4.5 4.5 0 003.09 3.09L15.75 12l-2.846.813a4.5 4.5 0 00-3.09 3.09z"/></svg>
                    </div>
                    <div>
                        <p style="font-size:10px;font-weight:800;color:white;text-transform:uppercase;letter-spacing:.08em;">IA Aplicada</p>
                        <p style="font-size:10px;color:rgba(255,255,255,0.7);margin-top:1px;">Automatize sem time técnico</p>
                    </div>
                </div>
            </div>
            <div style="padding:14px 16px;">
                <p style="font-size:11px;font-weight:700;color:#1e1b4b;margin-bottom:10px;">Para microempreendedores e gestores:</p>
                <ul style="list-style:none;padding:0;margin:0 0 12px;display:flex;flex-direction:column;gap:7px;">
                    <li style="display:flex;align-items:flex-start;gap:7px;">
                        <span style="width:5px;height:5px;border-radius:50%;background:#4338ca;margin-top:4px;flex-shrink:0;"></span>
                        <span style="font-size:11px;color:#374151;line-height:1.4;">Ferramentas de IA que custam menos de R$50/mês</span>
                    </li>
                    <li style="display:flex;align-items:flex-start;gap:7px;">
                        <span style="width:5px;height:5px;border-radius:50%;background:#4338ca;margin-top:4px;flex-shrink:0;"></span>
                        <span style="font-size:11px;color:#374151;line-height:1.4;">Tarefas de 8h reduzidas para 10 minutos com automação</span>
                    </li>
                    <li style="display:flex;align-items:flex-start;gap:7px;">
                        <span style="width:5px;height:5px;border-radius:50%;background:#4338ca;margin-top:4px;flex-shrink:0;"></span>
                        <span style="font-size:11px;color:#374151;line-height:1.4;">Do WhatsApp ao atendimento automatizado em 1 semana</span>
                    </li>
                </ul>
                <a href="/ia" style="display:inline-flex;align-items:center;gap:5px;font-size:11px;font-weight:700;color:#3730a3;text-decoration:none;">
                    Ver módulo de IA
                    <svg style="width:11px;height:11px;" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </a>
            </div>
        </div>
    </div>
</div>

<!-- BOTTOM-RIGHT: Tecnologia (emerald) -->
<div class="corner-widget cw-right hidden xl:flex" style="top: 65vh;" id="cw-tech">
    <div class="cw-strip">
        <div class="cw-bk" style="width:28px;height:7px;background:#059669;border-radius:4px 0 0 4px;"></div>
        <div class="cw-bk" style="width:38px;height:7px;background:#10b981;border-radius:4px 0 0 4px;"></div>
        <div class="cw-bk" style="width:20px;height:7px;background:#047857;border-radius:4px 0 0 4px;"></div>
        <div class="cw-bk" style="width:34px;height:7px;background:#34d399;border-radius:4px 0 0 4px;"></div>
        <div class="cw-bk" style="width:22px;height:7px;background:#059669;border-radius:4px 0 0 4px;"></div>
        <div class="cw-bk" style="width:36px;height:7px;background:#10b981;border-radius:4px 0 0 4px;"></div>
        <svg class="cw-chevron" style="width:13px;height:13px;color:#059669;" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/></svg>
    </div>
    <div class="cw-panel">
        <div class="cw-panel-inner">
            <div style="background:linear-gradient(135deg,#047857,#065f46);padding:14px 16px;">
                <div style="display:flex;align-items:center;gap:10px;">
                    <div style="width:32px;height:32px;border-radius:10px;background:rgba(255,255,255,0.2);display:flex;align-items:center;justify-content:center;">
                        <svg style="width:18px;height:18px;color:white;" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M17.25 6.75L22.5 12l-5.25 5.25m-10.5 0L1.5 12l5.25-5.25m7.5-3l-4.5 16.5"/></svg>
                    </div>
                    <div>
                        <p style="font-size:10px;font-weight:800;color:white;text-transform:uppercase;letter-spacing:.08em;">Tecnologia</p>
                        <p style="font-size:10px;color:rgba(255,255,255,0.7);margin-top:1px;">Modernize seu negócio em etapas</p>
                    </div>
                </div>
            </div>
            <div style="padding:14px 16px;">
                <p style="font-size:11px;font-weight:700;color:#064e3b;margin-bottom:10px;">Para negócios que querem escalar:</p>
                <ul style="list-style:none;padding:0;margin:0 0 12px;display:flex;flex-direction:column;gap:7px;">
                    <li style="display:flex;align-items:flex-start;gap:7px;">
                        <span style="width:5px;height:5px;border-radius:50%;background:#059669;margin-top:4px;flex-shrink:0;"></span>
                        <span style="font-size:11px;color:#374151;line-height:1.4;">Saia do "feito no celular" para um sistema profissional</span>
                    </li>
                    <li style="display:flex;align-items:flex-start;gap:7px;">
                        <span style="width:5px;height:5px;border-radius:50%;background:#059669;margin-top:4px;flex-shrink:0;"></span>
                        <span style="font-size:11px;color:#374151;line-height:1.4;">Software, banco de dados e processos que crescem com você</span>
                    </li>
                    <li style="display:flex;align-items:flex-start;gap:7px;">
                        <span style="width:5px;height:5px;border-radius:50%;background:#059669;margin-top:4px;flex-shrink:0;"></span>
                        <span style="font-size:11px;color:#374151;line-height:1.4;">Do micro-negócio à operação estruturada em etapas claras</span>
                    </li>
                </ul>
                <a href="/tecnologia" style="display:inline-flex;align-items:center;gap:5px;font-size:11px;font-weight:700;color:#047857;text-decoration:none;">
                    Ver módulo de tecnologia
                    <svg style="width:11px;height:11px;" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </a>
            </div>
        </div>
    </div>
</div>

<!-- ================================================================
     SCRIPTS
================================================================ -->
<script>
(function () {
    // --- Mobile menu ---
    var btn = document.getElementById('mobile-menu-btn');
    var menu = document.getElementById('mobile-menu');
    var iconOpen = document.getElementById('icon-open');
    var iconClose = document.getElementById('icon-close');
    if (btn) {
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
    }

    // --- Navbar scroll behavior ---
    var navbar = document.getElementById('navbar');
    window.addEventListener('scroll', function () {
        if (window.scrollY > 40) {
            navbar.classList.add('navbar-scrolled');
        } else {
            navbar.classList.remove('navbar-scrolled');
        }
    }, { passive: true });

    // --- Brick / Block animation via IntersectionObserver ---
    var observer = new IntersectionObserver(function (entries) {
        entries.forEach(function (entry) {
            if (entry.isIntersecting) {
                var cards = entry.target.querySelectorAll('.brick-card');
                cards.forEach(function (card, i) {
                    var delay = (card.dataset.delay !== undefined && card.dataset.delay !== '')
                        ? parseFloat(card.dataset.delay)
                        : (parseFloat(card.style.animationDelay) || (i * 0.09));
                    setTimeout(function () {
                        card.classList.add('is-visible');
                    }, delay * 1000);
                });
                // Also trigger slide-left / slide-right siblings
                var slides = entry.target.querySelectorAll('.slide-left, .slide-right');
                slides.forEach(function (el, i) {
                    setTimeout(function () { el.classList.add('is-visible'); }, i * 120);
                });
                var fades = entry.target.querySelectorAll('.fade-up');
                fades.forEach(function (el, i) {
                    setTimeout(function () { el.classList.add('is-visible'); }, i * 100);
                });
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.08 });

    // Observe brick containers
    document.querySelectorAll('.brick-container').forEach(function (el) {
        observer.observe(el);
    });

    // Also observe slide-left/right and fade-up at section level
    document.querySelectorAll('.slide-left, .slide-right').forEach(function (el) {
        var sectionObserver = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (entry.isIntersecting) {
                    entry.target.classList.add('is-visible');
                    sectionObserver.unobserve(entry.target);
                }
            });
        }, { threshold: 0.1 });
        sectionObserver.observe(el);
    });

    // --- Insights filter ---
    var filterBtns = document.querySelectorAll('.filter-btn');
    var insightCards = document.querySelectorAll('.insight-card');

    filterBtns.forEach(function (btn) {
        btn.addEventListener('click', function () {
            var filter = this.dataset.filter;

            // Update active state
            filterBtns.forEach(function (b) { b.classList.remove('is-active'); });
            this.classList.add('is-active');

            // Filter and re-animate
            var visibleIndex = 0;
            insightCards.forEach(function (card) {
                if (filter === 'all' || card.dataset.category === filter) {
                    card.style.display = 'flex';
                    card.classList.remove('is-visible');
                    var delay = visibleIndex * 80;
                    visibleIndex++;
                    setTimeout(function () {
                        card.classList.add('is-visible');
                    }, delay);
                } else {
                    card.style.display = 'none';
                }
            });
        });
    });

    // Trigger initial animation for visible insights
    var insightsGrid = document.getElementById('insights-grid');
    if (insightsGrid) {
        observer.observe(insightsGrid);
    }

    // --- Corner widget block build animations ---
    var delay = 1400;
    document.querySelectorAll('.cw-left .cw-bk').forEach(function(bk) {
        setTimeout(function() { bk.classList.add('anim-l'); }, delay);
        delay += 75;
    });
    var delayR = 1600;
    document.querySelectorAll('.cw-right .cw-bk').forEach(function(bk) {
        setTimeout(function() { bk.classList.add('anim-r'); }, delayR);
        delayR += 75;
    });
})();
</script>

</body>
</html>
