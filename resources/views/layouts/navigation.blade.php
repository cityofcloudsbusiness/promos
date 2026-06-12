<nav x-data="{ open: false }" class="absolute top-0 left-0 w-full z-50 bg-black/20 backdrop-blur-xl border-b border-purple-500/20">
    <style>
        [x-cloak] { display: none !important; }

        .logo-cyber {
            filter: drop-shadow(0 0 12px rgba(168, 85, 247, 0.8));
            transition: all 0.5s ease;
        }
        .logo-cyber:hover {
            filter: drop-shadow(0 0 20px rgba(236, 72, 153, 1));
            transform: scale(1.05);
        }

        .nav-link-cyber {
            position: relative;
            padding: 10px 18px;
            text-transform: uppercase;
            letter-spacing: 2px;
            color: #fff;
            overflow: visible;
        }
        .bot-builder {
            position: absolute;
            background: #ec4899;
            box-shadow: 0 0 15px #ec4899, 0 0 30px #ec4899;
            width: 4px;
            height: 4px;
            border-radius: 50%;
            opacity: 0;
            z-index: 20;
        }
        .circuit-track {
            position: absolute;
            background: rgba(236, 72, 153, 0.4);
            box-shadow: 0 0 8px rgba(236, 72, 153, 0.6);
            opacity: 0;
            transition: opacity 0.1s;
        }
        .nav-link-cyber:hover .bot-builder {
            opacity: 1;
            animation: buildPath 0.8s forwards linear;
        }
        .nav-link-cyber:hover .circuit-track {
            opacity: 1;
            animation: fillTrack 0.8s forwards linear;
        }
        @keyframes buildPath {
            0%   { top: 0; left: 0; }
            40%  { top: 0; left: 100%; }
            41%  { top: 0; left: 100%; }
            100% { top: 100%; left: 100%; }
        }
        @keyframes fillTrack {
            0%   { width: 0;    height: 1px;  top: 0; left: 0; }
            40%  { width: 100%; height: 1px;  top: 0; left: 0; }
            100% { width: 100%; height: 100%; top: 0; left: 0; background: rgba(236, 72, 153, 0.1); }
        }

        .cyber-dropdown-box {
            background: #0a0a0f !important;
            border: 2px solid #ec4899 !important;
            box-shadow: 0 0 25px rgba(236, 72, 153, 0.5) !important;
        }

        /* Services mega-dropdown */
        .svc-menu {
            background: #07070d;
            border: 1px solid rgba(168, 85, 247, 0.4);
            box-shadow:
                0 20px 60px rgba(0,0,0,0.9),
                0 0 0 1px rgba(168, 85, 247, 0.05),
                0 0 40px rgba(168, 85, 247, 0.08);
        }
        .svc-menu a { transition: background 0.15s ease; }
        .svc-menu a:hover { background: rgba(168, 85, 247, 0.09); }

        /* Mobile menu links */
        .mob-link {
            display: flex;
            align-items: center;
            padding: 11px 16px;
            font-size: 10px;
            font-weight: 900;
            letter-spacing: 0.15em;
            text-transform: uppercase;
            color: #9ca3af;
            border-bottom: 1px solid rgba(255,255,255,0.04);
            transition: color 0.15s, background 0.15s;
        }
        .mob-link:hover { color: #fff; background: rgba(168, 85, 247, 0.06); }
        .mob-section-label {
            padding: 14px 16px 4px;
            font-size: 8px;
            font-weight: 900;
            letter-spacing: 0.25em;
            text-transform: uppercase;
            color: #374151;
        }
    </style>

    {{-- Pré-computa a URL do dashboard para uso no HOME e no menu mobile --}}
    @php $navDashUrl = route('dashboard'); @endphp
    @auth
    @php
        $_nu = Auth::user();
        if (in_array($_nu->role ?? '', ['admin', 'employee'])) {
            $navDashUrl = route('admin.projects.index');
        } else {
            $_ns = $_nu->activeClientSubscriptions()->latest()->first();
            if ($_ns) { $navDashUrl = route('dashboard.plan', ['id' => $_ns->id]); }
        }
    @endphp
    @endauth

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-20">

            {{-- ─────────────────────────────────────
                 LEFT: Logo + Desktop navigation links
            ───────────────────────────────────────── --}}
            <div class="flex items-center">

                {{-- Logo --}}
                <a href="{{ route('home') }}" class="shrink-0 mr-3 lg:mr-6">
                    <picture>
                        <source srcset="{{ Vite::asset('resources/imgs/icon_logo.webp') }}" type="image/webp">
                        <img src="{{ Vite::asset('resources/imgs/icon_logo.png') }}" class="h-12 w-auto logo-cyber" alt="Logo">
                    </picture>
                </a>

                {{-- Desktop links (only lg and above) --}}
                <div class="hidden lg:flex items-center">

                    {{-- SITE PRINCIPAL --}}
                    <a href="{{ route('home') }}" class="nav-link-cyber group">
                        <span class="relative z-10 font-black text-xs text-gray-400 hover:text-white transition-colors">SITE</span>
                        <div class="bot-builder"></div>
                        <div class="circuit-track"></div>
                    </a>

                    {{-- HOME → Dashboard do usuário --}}
                    <a href="{{ $navDashUrl }}" class="nav-link-cyber group">
                        <span class="relative z-10 font-black text-xs">HOME</span>
                        <div class="bot-builder"></div>
                        <div class="circuit-track"></div>
                    </a>

                    {{-- SERVIÇOS — Alpine sub-scope dropdown --}}
                    <div x-data="{ svcOpen: false }" class="relative" @click.outside="svcOpen = false">
                        <button @click="svcOpen = !svcOpen"
                                type="button"
                                class="nav-link-cyber group flex items-center gap-1.5 bg-transparent border-none cursor-pointer">
                            <span class="relative z-10 font-black text-xs">SERVIÇOS</span>
                            <svg class="w-3 h-3 text-purple-400 relative z-10 transition-transform duration-200"
                                 :class="svcOpen ? 'rotate-180' : ''"
                                 fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M19 9l-7 7-7-7"/>
                            </svg>
                            <div class="bot-builder"></div>
                            <div class="circuit-track"></div>
                        </button>

                        <div x-show="svcOpen" x-cloak
                             x-transition:enter="transition ease-out duration-150"
                             x-transition:enter-start="opacity-0 scale-95 -translate-y-1"
                             x-transition:enter-end="opacity-100 scale-100 translate-y-0"
                             x-transition:leave="transition ease-in duration-100"
                             x-transition:leave-start="opacity-100 scale-100 translate-y-0"
                             x-transition:leave-end="opacity-0 scale-95 -translate-y-1"
                             class="absolute top-full left-0 mt-2 w-64 svc-menu rounded-xl overflow-hidden z-[200]">

                            <a href="{{ route('ia') }}"
                               class="flex items-center gap-4 px-5 py-4 border-b border-white/5">
                                <div class="w-9 h-9 rounded-lg bg-cyan-500/10 border border-cyan-500/30 flex items-center justify-center shrink-0">
                                    <span class="text-cyan-400 font-black text-xs tracking-widest">IA</span>
                                </div>
                                <div>
                                    <p class="text-[11px] font-black uppercase tracking-wider text-white leading-tight">Inteligência Artificial</p>
                                    <p class="text-[9px] text-gray-600 mt-0.5 normal-case tracking-normal">Agente de atendimento 24h</p>
                                </div>
                            </a>

                            <a href="{{ route('marketing') }}"
                               class="flex items-center gap-4 px-5 py-4 border-b border-white/5">
                                <div class="w-9 h-9 rounded-lg bg-fuchsia-500/10 border border-fuchsia-500/30 flex items-center justify-center shrink-0">
                                    <span class="text-fuchsia-400 font-black text-xs tracking-widest">MK</span>
                                </div>
                                <div>
                                    <p class="text-[11px] font-black uppercase tracking-wider text-white leading-tight">Marketing Digital</p>
                                    <p class="text-[9px] text-gray-600 mt-0.5 normal-case tracking-normal">Campanhas e tráfego pago</p>
                                </div>
                            </a>

                            <a href="{{ route('manutencao') }}"
                               class="flex items-center gap-4 px-5 py-4">
                                <div class="w-9 h-9 rounded-lg bg-purple-500/10 border border-purple-500/30 flex items-center justify-center shrink-0">
                                    <span class="text-purple-400 font-black text-xs tracking-widest">MT</span>
                                </div>
                                <div>
                                    <p class="text-[11px] font-black uppercase tracking-wider text-white leading-tight">Manutenção Web</p>
                                    <p class="text-[9px] text-gray-600 mt-0.5 normal-case tracking-normal">Suporte e otimização contínua</p>
                                </div>
                            </a>

                        </div>
                    </div>

                    @auth
                    @php $navUser = Auth::user(); @endphp

                    @if(in_array($navUser->role ?? '', ['admin', 'employee']))
                    {{-- Admin / Employee: projects panel --}}
                    <a href="{{ route('admin.projects.index') }}" class="nav-link-cyber group">
                        <span class="relative z-10 font-black text-xs">PROJETOS</span>
                        <div class="bot-builder"></div>
                        <div class="circuit-track"></div>
                    </a>
                    @else
                    {{-- Client: + Planos gradient CTA --}}
                    <a href="{{ route('subscribeWebM') }}"
                       class="ml-2 inline-flex items-center gap-1.5 px-4 py-2 rounded-lg
                              text-[10px] font-black uppercase tracking-widest text-white
                              bg-gradient-to-r from-pink-600/80 to-purple-600/80
                              border border-pink-500/40
                              hover:from-pink-500 hover:to-purple-500
                              hover:border-pink-400/70
                              hover:shadow-[0_0_20px_rgba(236,72,153,0.35)]
                              transition-all duration-300">
                        <span class="text-pink-300 font-black text-base leading-none">+</span> PLANOS
                    </a>
                    @endif
                    @endauth

                </div>
            </div>

            {{-- ─────────────────────────────────────
                 RIGHT: User area + Mobile hamburger
            ───────────────────────────────────────── --}}
            <div class="flex items-center gap-3">

                @guest
                <a href="{{ route('login') }}"
                   class="hidden sm:inline-flex items-center px-3 py-2
                          text-[10px] font-black uppercase tracking-widest
                          text-gray-400 border border-white/10 rounded-lg
                          hover:border-purple-500/40 hover:text-white transition-all">
                    LOGIN
                </a>
                <a href="{{ route('register') }}"
                   class="hidden sm:inline-flex items-center px-3 py-2
                          text-[10px] font-black uppercase tracking-widest text-white
                          bg-purple-500/20 border border-purple-500/40 rounded-lg
                          hover:bg-purple-500/30 hover:shadow-[0_0_14px_rgba(168,85,247,0.25)]
                          transition-all">
                    REGISTRAR
                </a>
                @endguest

                @auth
                <div class="hidden sm:flex sm:items-center">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="flex items-center px-4 py-2 border-2 border-purple-500/50 bg-black text-white hover:border-pink-500 transition-all shadow-[0_0_15px_rgba(168,85,247,0.3)]">
                                <div class="text-xs font-black tracking-tighter uppercase mr-2">
                                    <span class="text-pink-500">ID_</span>{{ Auth::user()->name }}
                                </div>
                                <svg class="h-4 w-4 text-pink-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>
                        </x-slot>
                        <x-slot name="content">
                            <div class="cyber-dropdown-box">
                                <x-dropdown-link :href="route('profile.edit')" class="text-white hover:bg-pink-500/30 font-bold uppercase text-[10px] py-3">
                                    [ ACESSAR_TERMINAL ]
                                </x-dropdown-link>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <x-dropdown-link :href="route('logout')"
                                            class="text-red-500 hover:bg-red-500/20 font-bold uppercase text-[10px] py-3"
                                            onclick="event.preventDefault(); this.closest('form').submit();">
                                        [ LOGOUT_SISTEMA ]
                                    </x-dropdown-link>
                                </form>
                            </div>
                        </x-slot>
                    </x-dropdown>
                </div>
                @endauth

                {{-- Mobile hamburger (shown below lg) --}}
                <button @click="open = !open"
                        type="button"
                        class="lg:hidden flex flex-col justify-center gap-1.5 p-2.5
                               border border-purple-500/30 rounded-lg
                               hover:border-purple-400/60 transition-all">
                    <span class="w-5 h-0.5 bg-purple-400 block transition-all duration-300 origin-center"
                          :class="open ? 'rotate-45 translate-y-2' : ''"></span>
                    <span class="w-5 h-0.5 bg-purple-400 block transition-all duration-300"
                          :class="open ? 'opacity-0 scale-x-0' : ''"></span>
                    <span class="w-5 h-0.5 bg-purple-400 block transition-all duration-300 origin-center"
                          :class="open ? '-rotate-45 -translate-y-2' : ''"></span>
                </button>
            </div>
        </div>

        {{-- ─────────────────────────────────────
             MOBILE MENU (shown below lg)
        ───────────────────────────────────────── --}}
        <div x-show="open" x-cloak
             x-transition:enter="transition ease-out duration-200"
             x-transition:enter-start="opacity-0 -translate-y-2"
             x-transition:enter-end="opacity-100 translate-y-0"
             x-transition:leave="transition ease-in duration-150"
             x-transition:leave-start="opacity-100 translate-y-0"
             x-transition:leave-end="opacity-0 -translate-y-2"
             class="lg:hidden pb-3 border-t border-purple-500/20">

            <a href="{{ route('home') }}" class="mob-link !text-gray-600 hover:!text-gray-400">
                <span class="text-gray-700 mr-3 font-mono text-xs">//</span>SITE PRINCIPAL
            </a>

            <a href="{{ $navDashUrl }}" class="mob-link">
                <span class="text-purple-400 mr-3 font-mono text-xs">//</span>HOME
            </a>

            <p class="mob-section-label">SERVIÇOS</p>

            <a href="{{ route('ia') }}" class="mob-link pl-8">
                <span class="text-cyan-400 mr-2.5 text-sm">›</span>Inteligência Artificial
            </a>
            <a href="{{ route('marketing') }}" class="mob-link pl-8">
                <span class="text-fuchsia-400 mr-2.5 text-sm">›</span>Marketing Digital
            </a>
            <a href="{{ route('manutencao') }}" class="mob-link pl-8">
                <span class="text-purple-400 mr-2.5 text-sm">›</span>Manutenção Web
            </a>

            @auth
            @php $mobUser = Auth::user(); @endphp

            <p class="mob-section-label">ÁREA DO CLIENTE</p>

            @if(in_array($mobUser->role ?? '', ['admin', 'employee']))
            <a href="{{ route('admin.projects.index') }}" class="mob-link pl-8">
                <span class="text-yellow-400 mr-2.5 text-sm">›</span>Projetos Admin
            </a>
            @else
            <a href="{{ route('subscribeWebM') }}" class="mob-link pl-8 !text-pink-400">
                <span class="mr-2.5 font-bold">+</span>Adicionar Plano
            </a>
            @endif

            <p class="mob-section-label">CONTA</p>

            <a href="{{ route('profile.edit') }}" class="mob-link pl-8">
                <span class="text-gray-600 mr-2.5 text-sm">›</span>Terminal de Perfil
            </a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="mob-link w-full text-left pl-8 !text-red-400">
                    <span class="mr-2.5">×</span>Logout do Sistema
                </button>
            </form>
            @endauth

            @guest
            <div class="flex gap-3 px-4 pt-4 pb-2">
                <a href="{{ route('login') }}"
                   class="flex-1 text-center py-2.5 text-[10px] font-black uppercase tracking-widest
                          text-gray-400 border border-white/10 rounded-lg
                          hover:border-purple-500/40 hover:text-white transition">
                    LOGIN
                </a>
                <a href="{{ route('register') }}"
                   class="flex-1 text-center py-2.5 text-[10px] font-black uppercase tracking-widest
                          text-white bg-purple-500/20 border border-purple-500/40 rounded-lg
                          hover:bg-purple-500/30 transition">
                    REGISTRAR
                </a>
            </div>
            @endguest

        </div>
    </div>
</nav>
