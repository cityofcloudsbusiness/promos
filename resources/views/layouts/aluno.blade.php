<!DOCTYPE html>
<html lang="pt-BR" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Minha Área') · EscolaOnline</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="h-full bg-slate-50 antialiased" x-data="{ sidebarOpen: false }">

{{-- ════════════════════════════════════════════
     SIDEBAR
     ════════════════════════════════════════════ --}}
<aside
    class="fixed inset-y-0 left-0 z-50 w-60 bg-slate-900 flex flex-col
           transition-transform duration-300 ease-in-out
           -translate-x-full lg:translate-x-0"
    :class="sidebarOpen ? 'translate-x-0' : ''">

    {{-- Logo --}}
    <div class="px-5 py-5 flex items-center gap-3 border-b border-slate-800">
        <div class="w-8 h-8 rounded-xl bg-indigo-600 flex items-center justify-center shrink-0">
            <img src="{{ Vite::asset('resources/imgs/icon_logo.webp') }}" alt="" class="w-5 h-5 object-contain">
        </div>
        <div class="min-w-0">
            <p class="text-[11px] font-bold text-indigo-400 uppercase tracking-widest leading-none truncate">City of Clouds</p>
            <p class="text-xs text-slate-400 leading-tight truncate">EscolaOnline</p>
        </div>
    </div>

    {{-- Nav --}}
    <nav class="flex-1 px-3 py-4 space-y-0.5 overflow-y-auto">

        @php
            $navItem = fn(string $route, string $icon, string $label, string $match = '') =>
                view('components.aluno-nav-item', compact('route','icon','label','match'));
        @endphp

        <p class="px-3 pt-2 pb-1 text-[10px] font-semibold text-slate-600 uppercase tracking-widest">Principal</p>

        <a href="{{ route('aluno.dashboard') }}"
           class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium transition-all
                  {{ request()->routeIs('aluno.dashboard') ? 'bg-indigo-600 text-white shadow-lg shadow-indigo-900/40' : 'text-slate-400 hover:text-white hover:bg-slate-800' }}">
            <svg width="18" height="18" class="shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
            </svg>
            <span>Início</span>
        </a>

        <a href="{{ route('aluno.dashboard') }}"
           class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium transition-all
                  text-slate-400 hover:text-white hover:bg-slate-800">
            <svg width="18" height="18" class="shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
            </svg>
            <span>Formações</span>
        </a>

        <a href="{{ route('aluno.dashboard') }}"
           class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium transition-all
                  text-slate-400 hover:text-white hover:bg-slate-800">
            <svg width="18" height="18" class="shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
            </svg>
            <span>Cursos</span>
        </a>

        <p class="px-3 pt-4 pb-1 text-[10px] font-semibold text-slate-600 uppercase tracking-widest">Desenvolvimento</p>

        <a href="#"
           class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium transition-all
                  text-slate-500 cursor-not-allowed opacity-60">
            <svg width="18" height="18" class="shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
            </svg>
            <span>Projetos</span>
            <span class="ml-auto text-[10px] bg-slate-700 text-slate-400 px-1.5 py-0.5 rounded-full">Em breve</span>
        </a>

        <a href="#"
           class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium transition-all
                  text-slate-500 cursor-not-allowed opacity-60">
            <svg width="18" height="18" class="shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
            </svg>
            <span>Suporte</span>
            <span class="ml-auto text-[10px] bg-slate-700 text-slate-400 px-1.5 py-0.5 rounded-full">Em breve</span>
        </a>

        <p class="px-3 pt-4 pb-1 text-[10px] font-semibold text-slate-600 uppercase tracking-widest">Conta</p>

        <a href="#"
           class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium transition-all
                  text-slate-400 hover:text-white hover:bg-slate-800">
            <svg width="18" height="18" class="shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/>
            </svg>
            <span>Certificados</span>
        </a>

        <a href="#"
           class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium transition-all
                  text-slate-400 hover:text-white hover:bg-slate-800">
            <svg width="18" height="18" class="shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/>
            </svg>
            <span>Meu Plano</span>
        </a>

        <a href="{{ route('profile.edit') }}"
           class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium transition-all
                  {{ request()->routeIs('profile.*') ? 'bg-indigo-600 text-white' : 'text-slate-400 hover:text-white hover:bg-slate-800' }}">
            <svg width="18" height="18" class="shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
            </svg>
            <span>Configurações</span>
        </a>

    </nav>

    {{-- User footer --}}
    <div class="px-4 py-4 border-t border-slate-800">
        <div class="flex items-center gap-3">
            <div class="w-8 h-8 rounded-full bg-indigo-600 flex items-center justify-center text-xs font-bold text-white shrink-0">
                {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
            </div>
            <div class="min-w-0 flex-1">
                <p class="text-sm font-medium text-slate-200 truncate">{{ auth()->user()->name }}</p>
                <p class="text-[11px] text-slate-500 truncate">Aluno</p>
            </div>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" title="Sair"
                        class="text-slate-500 hover:text-slate-300 transition">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                    </svg>
                </button>
            </form>
        </div>
    </div>
</aside>

{{-- Mobile overlay --}}
<div class="fixed inset-0 z-40 bg-black/50 lg:hidden"
     x-show="sidebarOpen"
     @click="sidebarOpen = false"
     x-transition:enter="transition-opacity duration-200"
     x-transition:enter-start="opacity-0"
     x-transition:enter-end="opacity-100"
     x-transition:leave="transition-opacity duration-200"
     x-transition:leave-start="opacity-100"
     x-transition:leave-end="opacity-0"
     style="display: none;">
</div>

{{-- ════════════════════════════════════════════
     MAIN WRAPPER
     ════════════════════════════════════════════ --}}
<div class="lg:pl-60 flex flex-col min-h-full">

    {{-- Topbar --}}
    <header class="sticky top-0 z-30 bg-white border-b border-slate-200 px-6 py-3.5 flex items-center gap-4">
        {{-- Mobile burger --}}
        <button @click="sidebarOpen = true"
                class="lg:hidden text-slate-500 hover:text-slate-900 transition">
            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/>
            </svg>
        </button>

        {{-- Page title slot --}}
        <h1 class="text-sm font-semibold text-slate-800 hidden sm:block">
            @yield('page-title', 'Minha Área')
        </h1>

        <div class="flex-1"></div>

        {{-- Notifications placeholder --}}
        <button class="relative text-slate-400 hover:text-slate-700 transition">
            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
            </svg>
        </button>

        {{-- Avatar + name --}}
        <div class="flex items-center gap-2.5">
            <div class="w-8 h-8 rounded-full bg-indigo-600 flex items-center justify-center text-xs font-bold text-white">
                {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
            </div>
            <span class="text-sm text-slate-700 font-medium hidden sm:block">
                {{ explode(' ', auth()->user()->name)[0] }}
            </span>
        </div>
    </header>

    {{-- Flash messages --}}
    @if(session('success'))
        <div class="bg-emerald-50 border-b border-emerald-200 px-6 py-3 text-sm text-emerald-700 flex items-center gap-2">
            <svg class="w-4 h-4 text-emerald-500 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
            {{ session('success') }}
        </div>
    @endif
    @if(session('info'))
        <div class="bg-blue-50 border-b border-blue-200 px-6 py-3 text-sm text-blue-700 flex items-center gap-2">
            <svg class="w-4 h-4 text-blue-500 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
            {{ session('info') }}
        </div>
    @endif
    @if(session('error'))
        <div class="bg-red-50 border-b border-red-200 px-6 py-3 text-sm text-red-700 flex items-center gap-2">
            <svg class="w-4 h-4 text-red-500 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
            {{ session('error') }}
        </div>
    @endif

    {{-- Page content --}}
    <main class="flex-1">
        @yield('content')
    </main>
</div>

{{-- Alpine.js (Breeze já inclui, mas garantindo) --}}
@stack('scripts')
</body>
</html>
