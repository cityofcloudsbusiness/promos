<style>
    @media (max-width: 1023px) { .nav-login-btn { display: none !important; } }
    @media (min-width: 1024px) { .nav-hamburger { display: none !important; } }
</style>

<header class="fixed top-0 left-0 w-full z-50 transition-all duration-500" x-data="{ scrolled: false, open: false }" @scroll.window="scrolled = (window.pageYOffset > 20)">
            <nav :class="scrolled ? 'bg-black/60 backdrop-blur-md py-3' : 'bg-transparent py-6'" class="container mx-auto px-6 flex justify-between items-center transition-all">

                <div class="relative group cursor-pointer">
                    <div class="absolute -inset-2 bg-gradient-to-r from-pink-600 to-purple-600 rounded-lg blur opacity-25 group-hover:opacity-100 transition duration-1000 group-hover:duration-200"></div>

                    <div class="relative flex items-center gap-2">
                        <div class="w-10 h-10 flex items-center justify-center rounded-tr-xl rounded-bl-xl overflow-hidden animate-pulse border border-none">
                            <span class="text-black font-black text-2xl italic">
                                <picture>
                                    <source srcset="{{ Vite::asset('resources/imgs/icon_logo.webp') }}" type="image/webp">
                                    <img src="{{Vite::asset('resources/imgs/icon_logo.png')}}" alt="Logo City Of Clouds" loading="lazy" decoding="async" class="w-full h-full object-cover" style="filter: hue-rotate(53deg);">
                                </picture>
                            </span>
                        </div>

                        <span class="text-white font-black uppercase italic tracking-tighter text-xl hidden md:block">
                            City Of Cloud<span class="text-pink-500 animate-pulse">S</span>
                        </span>
                    </div>
                </div>

                <ul class="hidden lg:flex items-center gap-8 text-[10px] font-black uppercase tracking-[0.3em] text-slate-300">
                    <li class="hover:text-pink-500 transition-colors cursor-pointer relative group">
                        <a href="{{route('home')}}">HOME</a>
                        <span class="absolute -bottom-1 left-0 w-0 h-[1px] bg-pink-500 transition-all group-hover:w-full"></span>
                    </li>
                    <li class="hover:text-purple-500 transition-colors cursor-pointer relative group">
                        <a href="{{route('manutencao')}}">Manutenção</a>
                        <span class="absolute -bottom-1 left-0 w-0 h-[1px] bg-purple-500 transition-all group-hover:w-full"></span>
                    </li>
                    <li class="hover:text-blue-500 transition-colors cursor-pointer relative group">
                        <a href="{{route('marketing')}}">Marketing Digital</a>
                        <span class="absolute -bottom-1 left-0 w-0 h-[1px] bg-blue-500 transition-all group-hover:w-full"></span>
                    </li>
                    <li class="hover:text-blue-500 transition-colors cursor-pointer relative group">
                        <a href="{{route('ia')}}">Agentes I.A</a>
                        <span class="absolute -bottom-1 left-0 w-0 h-[1px] bg-blue-500 transition-all group-hover:w-full"></span>
                    </li>
                    <li class="hover:text-blue-500 transition-colors cursor-pointer relative group">
                        <a href="{{route('sobre')}}">Sobre</a>
                        <span class="absolute -bottom-1 left-0 w-0 h-[1px] bg-blue-500 transition-all group-hover:w-full"></span>
                    </li>
                </ul>

                {{-- Hamburger button (mobile only) --}}
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

                {{-- Login/Auth button (desktop only) --}}
                <div class="nav-login-btn relative group">

                    @auth
                    <div class="absolute -inset-0.5 bg-gradient-to-r from-green-500 to-cyan-500 rounded-full blur opacity-30 group-hover:opacity-100 transition duration-500"></div>
                    <a href="{{ route('dashboard') }}" class="relative bg-black text-white px-6 py-2 rounded-full border border-white/10 text-[10px] font-black uppercase tracking-widest hover:bg-white hover:text-black transition-all flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-cyan-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                        <span class="italic">{{ Auth::user()->name }}</span>
                    </a>
                    @else
                    <div class="absolute -inset-0.5 bg-gradient-to-r from-pink-500 to-purple-500 rounded-full blur opacity-30 group-hover:opacity-100 transition duration-500"></div>
                    <a href="{{ route('login') }}" class="relative bg-black text-white px-6 py-2 rounded-full border border-white/10 text-[10px] font-black uppercase tracking-widest hover:bg-white hover:text-black transition-all flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-pink-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                        <span>Login</span>
                    </a>
                    @endauth

                </div>
            </nav>

            {{-- Mobile menu --}}
            <div x-show="open"
                 x-transition:enter="transition ease-out duration-200"
                 x-transition:enter-start="opacity-0 -translate-y-2"
                 x-transition:enter-end="opacity-100 translate-y-0"
                 x-transition:leave="transition ease-in duration-150"
                 x-transition:leave-start="opacity-100 translate-y-0"
                 x-transition:leave-end="opacity-0 -translate-y-2"
                 style="display: none;"
                 class="lg:hidden bg-black/90 backdrop-blur-md border-t border-white/10">
                <ul class="flex flex-col px-6 py-4 gap-1 text-[11px] font-black uppercase tracking-[0.3em] text-slate-300">
                    <li class="border-b border-white/10 py-3">
                        <a href="{{route('home')}}" @click="open = false" class="flex items-center gap-2 hover:text-pink-500 transition-colors">
                            <span class="text-pink-500">//</span> HOME
                        </a>
                    </li>
                    <li class="border-b border-white/10 py-3">
                        <a href="{{route('manutencao')}}" @click="open = false" class="flex items-center gap-2 hover:text-purple-500 transition-colors">
                            <span class="text-purple-500">›</span> Manutenção
                        </a>
                    </li>
                    <li class="border-b border-white/10 py-3">
                        <a href="{{route('marketing')}}" @click="open = false" class="flex items-center gap-2 hover:text-blue-500 transition-colors">
                            <span class="text-blue-500">›</span> Marketing Digital
                        </a>
                    </li>
                    <li class="border-b border-white/10 py-3">
                        <a href="{{route('ia')}}" @click="open = false" class="flex items-center gap-2 hover:text-blue-500 transition-colors">
                            <span class="text-blue-500">›</span> Agentes I.A
                        </a>
                    </li>
                    <li class="border-b border-white/10 py-3">
                        <a href="{{route('sobre')}}" @click="open = false" class="flex items-center gap-2 hover:text-blue-500 transition-colors">
                            <span class="text-blue-500">›</span> Sobre
                        </a>
                    </li>
                    <li class="pt-3 pb-1">
                        @auth
                        <a href="{{ route('dashboard') }}" @click="open = false" class="flex items-center gap-2 text-cyan-400 hover:text-white transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                            <span class="italic">{{ Auth::user()->name }}</span>
                        </a>
                        @else
                        <a href="{{ route('login') }}" @click="open = false" class="flex items-center gap-2 text-pink-500 hover:text-white transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                            LOGIN
                        </a>
                        @endauth
                    </li>
                </ul>
            </div>
        </header>
