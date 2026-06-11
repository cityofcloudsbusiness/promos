<nav x-data="{ open: false }" class="absolute top-0 left-0 w-full z-50 bg-black/10 backdrop-blur-md border-b border-purple-500/20">
    <style>
        /* Estilização da Logo igual ao Footer */
        .logo-cyber {
            filter: drop-shadow(0 0 12px rgba(168, 85, 247, 0.8));
            transition: all 0.5s ease;
        }
        .logo-cyber:hover {
            filter: drop-shadow(0 0 20px rgba(236, 72, 153, 1));
            transform: scale(1.05);
        }

        /* Animação dos Robozinhos Construindo Circuitos */
        .nav-link-cyber {
            position: relative;
            padding: 10px 20px;
            text-transform: uppercase;
            letter-spacing: 2px;
            color: #fff;
            overflow: visible;
        }

        /* O "Robozinho" (Ponto de solda laser) */
        .bot-builder {
            position: absolute;
            background: #ec4899; /* Rosa Neon */
            box-shadow: 0 0 15px #ec4899, 0 0 30px #ec4899;
            width: 4px;
            height: 4px;
            border-radius: 50%;
            opacity: 0;
            z-index: 20;
        }

        /* O Caminho do Circuito (Trilha sendo deixada) */
        .circuit-track {
            position: absolute;
            background: rgba(236, 72, 153, 0.4);
            box-shadow: 0 0 8px rgba(236, 72, 153, 0.6);
            opacity: 0;
            transition: opacity 0.1s;
        }

        /* Gatilho da Animação de Construção ao Hover */
        .nav-link-cyber:hover .bot-builder {
            opacity: 1;
            animation: buildPath 0.8s forwards linear;
        }

        .nav-link-cyber:hover .circuit-track {
            opacity: 1;
            animation: fillTrack 0.8s forwards linear;
        }

        @keyframes buildPath {
            0% { top: 0; left: 0; }
            40% { top: 0; left: 100%; }
            41% { top: 0; left: 100%; }
            100% { top: 100%; left: 100%; }
        }

        @keyframes fillTrack {
            0% { width: 0; height: 1px; top: 0; left: 0; }
            40% { width: 100%; height: 1px; top: 0; left: 0; }
            100% { width: 100%; height: 100%; top: 0; left: 0; background: rgba(236, 72, 153, 0.1); }
        }

        /* Dropdown High-Visibility */
        .cyber-dropdown-box {
            background: #0a0a0f !important;
            border: 2px solid #ec4899 !important;
            box-shadow: 0 0 25px rgba(236, 72, 153, 0.5) !important;
        }
    </style>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-20">
            <div class="flex items-center">
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <picture>
                            <source srcset="{{ Vite::asset('resources/imgs/icon_logo.webp') }}" type="image/webp">
                            <img src="{{ Vite::asset('resources/imgs/icon_logo.png') }}" class="h-12 w-auto logo-cyber" alt="Logo">
                        </picture>
                    </a>
                </div>

                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <a href="{{ route('dashboard') }}" class="nav-link-cyber group">
                        <span class="relative z-10 font-black text-xs">{{ __('Dashboard') }}</span>
                        
                        <div class="bot-builder"></div>
                        <div class="circuit-track"></div>
                    </a>
                </div>
            </div>

            <div class="hidden sm:flex sm:items-center sm:ms-6">
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
                                <x-dropdown-link :href="route('logout')" class="text-red-500 hover:bg-red-500/20 font-bold uppercase text-[10px] py-3"
                                        onclick="event.preventDefault(); this.closest('form').submit();">
                                    [ LOGOUT_SISTEMA ]
                                </x-dropdown-link>
                            </form>
                        </div>
                    </x-slot>
                </x-dropdown>
            </div>
        </div>
    </div>
</nav>