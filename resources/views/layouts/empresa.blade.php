<!DOCTYPE html>
<html lang="pt-BR" class="h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Portal Empresarial') · City of Clouds</title>
    @fonts
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>
<body class="h-full bg-[#070b17] text-slate-200 antialiased">
<div class="flex h-full">

    {{-- ══════════════════════════════════════════════
         SIDEBAR CORPORATIVA
         ══════════════════════════════════════════════ --}}
    <aside class="w-64 shrink-0 bg-[#060a14] border-r border-[#0f1a33] flex flex-col fixed inset-y-0 left-0 z-30">

        {{-- Logo & empresa --}}
        <div class="px-5 py-5 border-b border-[#0f1a33]">
            <div class="flex items-center gap-3">
                <div class="w-9 h-9 rounded-xl bg-blue-600/15 border border-blue-500/20 flex items-center justify-center shrink-0">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#60a5fa" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 21h16.5M4.5 3h15M5.25 3v18m13.5-18v18M9 6.75h1.5m-1.5 3h1.5m-1.5 3h1.5m3-6H15m-1.5 3H15m-1.5 3H15M9 21v-3.375c0-.621.504-1.125 1.125-1.125h3.75c.621 0 1.125.504 1.125 1.125V21"/>
                    </svg>
                </div>
                <div class="min-w-0">
                    <p class="text-xs font-bold text-white truncate">{{ auth()->user()->empresa?->nome ?? 'Empresa' }}</p>
                    <p class="text-[10px] text-blue-400/50 font-mono tracking-widest">PORTAL CORP</p>
                </div>
            </div>
        </div>

        {{-- Navigation --}}
        <nav class="flex-1 py-4 px-3 space-y-0.5 overflow-y-auto">

            @php
                $navItems = [
                    ['route' => 'empresa.dashboard',    'label' => 'Desenvolvimento',  'sub' => 'Jornada da empresa',
                     'path'  => 'M13 7h8m0 0v8m0-8l-8 8-4-4-6 6'],
                    ['route' => 'empresa.treinamentos', 'label' => 'Treinamentos',     'sub' => 'Cursos para equipe',
                     'path'  => 'M4.26 10.147a60.438 60.438 0 00-.491 6.347A48.62 48.62 0 0112 20.904a48.62 48.62 0 018.232-4.41 60.46 60.46 0 00-.491-6.347m-15.482 0a50.636 50.636 0 00-2.658-.813A59.906 59.906 0 0112 3.493a59.903 59.903 0 0110.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.717 50.717 0 0112 13.489a50.702 50.702 0 017.74-3.342M6.75 15a.75.75 0 100-1.5.75.75 0 000 1.5zm0 0v-3.675A55.378 55.378 0 0112 8.443m-7.007 11.55A5.981 5.981 0 006.75 15.75v-1.5'],
                    ['route' => 'empresa.funcionarios', 'label' => 'Funcionários',     'sub' => 'Equipe cadastrada',
                     'path'  => 'M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z'],
                    ['route' => 'empresa.diagnostico',  'label' => 'Diagnóstico',      'sub' => 'O que melhorar',
                     'path'  => 'M10.5 6a7.5 7.5 0 107.5 7.5h-7.5V6z M13.5 10.5H21A7.5 7.5 0 0013.5 3v7.5z'],
                    ['route' => 'empresa.comunicacao',  'label' => 'Comunicação',      'sub' => 'Agentes City of Clouds',
                     'path'  => 'M8.625 12a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H8.25m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H12m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0h-.375M21 12c0 4.556-4.03 8.25-9 8.25a9.764 9.764 0 01-2.555-.337A5.972 5.972 0 015.41 20.97a5.969 5.969 0 01-.474-.065 4.48 4.48 0 00.978-2.025c.09-.457-.133-.901-.467-1.226C3.93 16.178 3 14.189 3 12c0-4.556 4.03-8.25 9-8.25s9 3.694 9 8.25z'],
                ];
            @endphp

            @foreach($navItems as $item)
                @php $isActive = request()->routeIs($item['route']); @endphp
                <a href="{{ route($item['route']) }}"
                   class="flex items-center gap-3 px-3 py-2.5 rounded-xl transition-all group
                          {{ $isActive ? 'bg-blue-600/15 border border-blue-500/20' : 'hover:bg-white/[0.04]' }}">
                    <div class="w-8 h-8 rounded-lg flex items-center justify-center shrink-0 transition
                                {{ $isActive ? 'bg-blue-600/20 text-blue-400' : 'bg-white/[0.04] text-slate-500 group-hover:text-slate-300' }}">
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75">
                            <path stroke-linecap="round" stroke-linejoin="round" d="{{ $item['path'] }}"/>
                        </svg>
                    </div>
                    <div class="min-w-0">
                        <p class="text-sm font-medium truncate {{ $isActive ? 'text-white' : 'text-slate-400 group-hover:text-slate-200' }}">{{ $item['label'] }}</p>
                        <p class="text-[10px] truncate {{ $isActive ? 'text-blue-400/60' : 'text-slate-600' }}">{{ $item['sub'] }}</p>
                    </div>
                    @if($isActive)
                        <div class="w-1.5 h-1.5 rounded-full bg-blue-500 ml-auto shrink-0"></div>
                    @endif
                </a>
            @endforeach
        </nav>

        {{-- User footer --}}
        <div class="px-4 py-4 border-t border-[#0f1a33]">
            <div class="flex items-center gap-3">
                <div class="w-8 h-8 rounded-full bg-blue-600/20 border border-blue-500/30 flex items-center justify-center text-xs font-bold text-blue-300 shrink-0">
                    {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                </div>
                <div class="flex-1 min-w-0">
                    <p class="text-xs font-medium text-slate-300 truncate">{{ auth()->user()->name }}</p>
                    <p class="text-[10px] text-slate-600 truncate">Gestão Corporativa</p>
                </div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="p-1.5 rounded-lg text-slate-600 hover:text-red-400 hover:bg-red-400/10 transition">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                        </svg>
                    </button>
                </form>
            </div>
        </div>
    </aside>

    {{-- ══════════════════════════════════════════════
         CONTEÚDO PRINCIPAL
         ══════════════════════════════════════════════ --}}
    <div class="flex-1 pl-64 flex flex-col min-h-screen">

        {{-- Topbar --}}
        <header class="sticky top-0 z-20 bg-[#07091380] backdrop-blur-xl border-b border-[#0f1a33] px-6 py-3 flex items-center justify-between">
            <div>
                <h2 class="text-sm font-semibold text-white">@yield('page-title', 'Portal Empresarial')</h2>
                <p class="text-[11px] text-slate-500 font-mono">@yield('page-subtitle', '')</p>
            </div>
            <div class="flex items-center gap-3">
                @yield('header-actions')
                <div class="flex items-center gap-2 px-3 py-1.5 bg-blue-600/10 border border-blue-500/20 rounded-lg">
                    <div class="w-1.5 h-1.5 rounded-full bg-emerald-400 animate-pulse"></div>
                    <span class="text-xs text-blue-300/70 font-mono">ONLINE</span>
                </div>
            </div>
        </header>

        {{-- Flash messages --}}
        @if (session('success'))
            <div class="mx-6 mt-4 px-4 py-3 bg-emerald-500/10 border border-emerald-500/20 rounded-xl text-sm text-emerald-400 flex items-center gap-2">
                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                {{ session('success') }}
            </div>
        @endif

        {{-- Page content --}}
        <main class="flex-1 p-6">
            @yield('content')
        </main>
    </div>
</div>
</body>
</html>
