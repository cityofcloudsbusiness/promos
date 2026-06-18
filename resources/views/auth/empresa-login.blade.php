<!DOCTYPE html>
<html lang="pt-BR" class="h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Portal Empresarial · City of Clouds</title>
    @fonts
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
    <style>
        .bg-blueprint-corp {
            background-color: #04080f;
            background-image:
                linear-gradient(rgba(15,30,70,0.4) 1px, transparent 1px),
                linear-gradient(90deg, rgba(15,30,70,0.4) 1px, transparent 1px),
                radial-gradient(ellipse 80% 60% at 70% 30%, rgba(6,30,100,0.35) 0%, transparent 70%),
                radial-gradient(ellipse 60% 50% at 20% 80%, rgba(0,50,80,0.2) 0%, transparent 60%);
            background-size: 40px 40px, 40px 40px, 100% 100%, 100% 100%;
        }
        @keyframes corp-glow {
            0%,100% { opacity: 0.4; }
            50% { opacity: 1; }
        }
        .glow-dot { animation: corp-glow 2.5s ease-in-out infinite; }
    </style>
</head>
<body class="h-full bg-blueprint-corp flex items-center justify-center px-4 py-12 relative overflow-hidden">

    <!-- Corner tag -->
    <div class="absolute top-5 left-5 flex items-center gap-2">
        <img src="{{ Vite::asset('resources/imgs/icon_logo.webp') }}" alt="City of Clouds" class="w-7 h-7 opacity-80">
        <span class="text-[10px] font-mono text-blue-300/40 tracking-widest uppercase">City of Clouds · Corp</span>
    </div>

    <!-- Corner coordinate markers -->
    <span class="absolute top-5 right-5 text-[9px] font-mono text-blue-400/20 select-none">CORP.SYS v2.1</span>
    <span class="absolute bottom-5 left-5 text-[9px] font-mono text-blue-400/20 select-none">ACESSO RESTRITO</span>
    <span class="absolute bottom-5 right-5 text-[9px] font-mono text-blue-400/20 select-none">PORTAL B2B</span>

    <!-- Decorative lines -->
    <div class="absolute top-0 left-0 right-0 h-px bg-gradient-to-r from-transparent via-blue-500/30 to-transparent"></div>
    <div class="absolute bottom-0 left-0 right-0 h-px bg-gradient-to-r from-transparent via-blue-500/20 to-transparent"></div>

    <div class="w-full max-w-[420px] relative">

        <!-- Header -->
        <div class="text-center mb-8">
            <div class="inline-flex items-center justify-center w-14 h-14 rounded-2xl bg-blue-600/10 border border-blue-500/20 mb-4">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#60a5fa" stroke-width="1.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 21h16.5M4.5 3h15M5.25 3v18m13.5-18v18M9 6.75h1.5m-1.5 3h1.5m-1.5 3h1.5m3-6H15m-1.5 3H15m-1.5 3H15M9 21v-3.375c0-.621.504-1.125 1.125-1.125h3.75c.621 0 1.125.504 1.125 1.125V21"/>
                </svg>
            </div>
            <h1 class="text-xl font-bold text-white">Portal Empresarial</h1>
            <p class="text-xs text-blue-300/50 font-mono mt-1 tracking-wider">ACESSO CORPORATIVO · CITY OF CLOUDS</p>
        </div>

        <!-- Card -->
        <div class="bg-white/[0.04] backdrop-blur-xl border border-white/[0.08] rounded-3xl p-8 shadow-2xl shadow-black/50">

            @if (session('status'))
                <div class="mb-5 text-sm text-emerald-400 bg-emerald-500/10 border border-emerald-500/20 rounded-xl px-4 py-3">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}" class="space-y-5">
                @csrf

                <div>
                    <label for="email" class="block text-xs font-semibold text-blue-300/70 uppercase tracking-widest mb-2">
                        E-mail corporativo
                    </label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                           class="w-full px-4 py-3 bg-white/[0.06] border border-white/10 rounded-xl text-sm text-white placeholder-slate-500
                                  focus:outline-none focus:border-blue-500/50 focus:bg-white/[0.08] transition-all"
                           placeholder="gestao@empresa.com">
                    @error('email')
                        <p class="mt-1.5 text-xs text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="password" class="block text-xs font-semibold text-blue-300/70 uppercase tracking-widest mb-2">
                        Senha
                    </label>
                    <input id="password" type="password" name="password" required
                           class="w-full px-4 py-3 bg-white/[0.06] border border-white/10 rounded-xl text-sm text-white placeholder-slate-500
                                  focus:outline-none focus:border-blue-500/50 focus:bg-white/[0.08] transition-all"
                           placeholder="••••••••">
                    @error('password')
                        <p class="mt-1.5 text-xs text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center justify-between">
                    <label class="flex items-center gap-2 cursor-pointer">
                        <input type="checkbox" name="remember" class="w-3.5 h-3.5 rounded accent-blue-500">
                        <span class="text-xs text-slate-400">Manter conectado</span>
                    </label>
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="text-xs text-blue-400/70 hover:text-blue-400 transition">Esqueceu a senha?</a>
                    @endif
                </div>

                <button type="submit"
                        class="w-full flex items-center justify-center gap-2 px-6 py-3.5 bg-blue-600 hover:bg-blue-500 text-white rounded-xl text-sm font-semibold transition-all shadow-lg shadow-blue-900/40">
                    Acessar Portal
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </button>
            </form>
        </div>

        <!-- Footer links -->
        <div class="text-center mt-6 space-y-2">
            <p class="text-sm text-slate-500">
                Ainda não tem conta?
                <a href="{{ route('empresa.auth.register') }}" class="text-blue-400 hover:text-blue-300 font-medium transition">Cadastrar empresa →</a>
            </p>
            <a href="{{ route('login') }}" class="text-xs text-slate-600 hover:text-slate-400 transition">← Acesso para Profissionais</a>
        </div>
    </div>
</body>
</html>
