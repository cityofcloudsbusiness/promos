<!DOCTYPE html>
<html lang="pt-BR" class="h-full bg-slate-900">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Super Admin') · City of Clouds</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="h-full flex">

    {{-- Sidebar --}}
    <aside class="w-64 min-h-screen bg-slate-950 text-white flex flex-col shrink-0 border-r border-slate-800">
        <div class="px-6 py-5 border-b border-slate-800">
            <a href="{{ route('superadmin.dashboard') }}" class="flex items-center gap-3">
                <img src="{{ Vite::asset('resources/imgs/icon_logo.webp') }}" alt="Logo" class="w-8 h-8 object-contain">
                <div>
                    <p class="text-[10px] text-slate-400 leading-none uppercase tracking-widest font-bold">City of Clouds</p>
                    <p class="text-sm font-bold text-white leading-tight mt-0.5">Admin Geral</p>
                </div>
            </a>
        </div>

        <nav class="flex-1 px-4 py-6 space-y-1">
            @php
                $navItem = fn(string $route, string $icon, string $label) =>
                    '<a href="' . route($route) . '"
                        class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm transition ' .
                        (request()->routeIs($route . '*') ? 'bg-slate-700 text-white' : 'text-slate-400 hover:bg-slate-800 hover:text-white') .
                    '">' .
                    '<span class="text-base">' . $icon . '</span>' . $label . '</a>';
            @endphp

            {!! $navItem('superadmin.dashboard',      '🏠', 'Dashboard') !!}
            {!! $navItem('superadmin.users.index',    '👥', 'Usuários') !!}
            {!! $navItem('superadmin.courses.index',  '📚', 'Cursos') !!}

            {{-- Divisor --}}
            <div class="border-t border-slate-800 my-2"></div>
            <p class="px-3 text-[10px] text-slate-600 uppercase tracking-widest font-bold mb-1">Professor</p>
            {!! $navItem('admin.dashboard',           '🎓', 'Painel Professor') !!}
        </nav>

        <div class="px-4 py-4 border-t border-slate-800">
            <div class="flex items-center gap-3 px-3 py-2 text-sm">
                <div class="w-8 h-8 rounded-full bg-indigo-600 flex items-center justify-center text-xs font-bold shrink-0">
                    {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                </div>
                <div class="flex-1 min-w-0">
                    <p class="font-medium text-white truncate text-xs">{{ auth()->user()->name }}</p>
                    <p class="text-[10px] text-slate-500 truncate">Admin Geral</p>
                </div>
            </div>
            <form method="POST" action="{{ route('logout') }}" class="mt-2">
                @csrf
                <button type="submit"
                    class="w-full text-left flex items-center gap-3 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-slate-800 hover:text-white transition">
                    <span>🚪</span> Sair
                </button>
            </form>
        </div>
    </aside>

    {{-- Main --}}
    <div class="flex-1 flex flex-col min-w-0 bg-slate-50">
        <header class="bg-white border-b border-slate-200 px-8 py-4 flex items-center justify-between">
            <div>
                <h1 class="text-xl font-bold text-slate-800">@yield('page-title', 'Dashboard')</h1>
                @hasSection('page-subtitle')
                    <p class="text-sm text-slate-500 mt-0.5">@yield('page-subtitle')</p>
                @endif
            </div>
            @yield('header-actions')
        </header>

        <main class="flex-1 p-8 overflow-auto">
            @if(session('success'))
                <div class="mb-6 px-4 py-3 bg-emerald-50 border border-emerald-200 text-emerald-700 rounded-xl text-sm flex items-center gap-2">
                    <span>✅</span> {{ session('success') }}
                </div>
            @endif
            @if(session('error'))
                <div class="mb-6 px-4 py-3 bg-red-50 border border-red-200 text-red-700 rounded-xl text-sm flex items-center gap-2">
                    <span>❌</span> {{ session('error') }}
                </div>
            @endif

            @yield('content')
        </main>
    </div>

</body>
</html>
