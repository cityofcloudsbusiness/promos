<header class="fixed top-0 left-0 w-full z-50 transition-all duration-500" x-data="{ scrolled: false }" @scroll.window="scrolled = (window.pageYOffset > 20)">
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
                        <a href="#ia">Sobre</a>
                        <span class="absolute -bottom-1 left-0 w-0 h-[1px] bg-blue-500 transition-all group-hover:w-full"></span>
                    </li>
                </ul>

                <div class="relative group">

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
        </header>