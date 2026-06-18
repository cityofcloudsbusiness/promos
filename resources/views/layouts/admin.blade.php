<!DOCTYPE html>
<html lang="pt-BR" class="h-full bg-slate-50">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin') · City of Clouds</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="h-full flex">

    {{-- Sidebar --}}
    <aside class="w-64 min-h-screen bg-indigo-950 text-white flex flex-col shrink-0">
        <div class="px-6 py-5 border-b border-indigo-800">
            <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3">
                <img src="{{ Vite::asset('resources/imgs/icon_logo.webp') }}" alt="Logo" class="w-8 h-8 object-contain">
                <div>
                    <p class="text-xs text-indigo-300 leading-none">City of Clouds</p>
                    <p class="text-sm font-semibold leading-tight">Painel Admin</p>
                </div>
            </a>
        </div>

        <nav class="flex-1 px-4 py-6 space-y-1">
            @php
                $navItem = fn(string $route, string $icon, string $label) =>
                    '<a href="' . route($route) . '"
                        class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm transition ' .
                        (request()->routeIs($route . '*') ? 'bg-indigo-700 text-white' : 'text-indigo-200 hover:bg-indigo-800 hover:text-white') .
                    '">' .
                    '<span class="text-base">' . $icon . '</span>' . $label . '</a>';
            @endphp

            {!! $navItem('admin.dashboard',              '🏠', 'Dashboard') !!}
            {!! $navItem('admin.courses.index',          '📚', 'Meus Cursos') !!}
            {!! $navItem('admin.courses.create',         '➕', 'Novo Curso') !!}
            {!! $navItem('admin.formacoes.index',        '🎓', 'Formações') !!}
            {!! $navItem('admin.access-requests.index',  '📬', 'Solicitações') !!}
        </nav>

        <div class="px-4 py-4 border-t border-indigo-800">
            <div class="flex items-center gap-3 px-3 py-2 text-sm text-indigo-200">
                <div class="w-8 h-8 rounded-full bg-indigo-600 flex items-center justify-center text-xs font-bold">
                    {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                </div>
                <div class="flex-1 min-w-0">
                    <p class="font-medium text-white truncate">{{ auth()->user()->name }}</p>
                    <p class="text-xs text-indigo-400 truncate">{{ auth()->user()->role }}</p>
                </div>
            </div>
            <form method="POST" action="{{ route('logout') }}" class="mt-2">
                @csrf
                <button type="submit"
                    class="w-full text-left flex items-center gap-3 px-3 py-2 rounded-lg text-sm text-indigo-300 hover:bg-indigo-800 hover:text-white transition">
                    <span>🚪</span> Sair
                </button>
            </form>
        </div>
    </aside>

    {{-- Main content --}}
    <div class="flex-1 flex flex-col min-w-0">
        <header class="bg-white border-b border-slate-200 px-8 py-4 flex items-center justify-between">
            <div>
                <h1 class="text-xl font-bold text-slate-800">@yield('page-title', 'Dashboard')</h1>
                @hasSection('page-subtitle')
                    <p class="text-sm text-slate-500">@yield('page-subtitle')</p>
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
