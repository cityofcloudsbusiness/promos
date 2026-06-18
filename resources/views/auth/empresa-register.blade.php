<!DOCTYPE html>
<html lang="pt-BR" class="h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cadastro Corporativo · City of Clouds</title>
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
    </style>
</head>
<body class="bg-blueprint-corp min-h-full flex items-center justify-center px-4 py-12 relative">

    <!-- Corner tag -->
    <div class="absolute top-5 left-5 flex items-center gap-2">
        <img src="{{ Vite::asset('resources/imgs/icon_logo.webp') }}" alt="City of Clouds" class="w-7 h-7 opacity-80">
        <span class="text-[10px] font-mono text-blue-300/40 tracking-widest uppercase">City of Clouds · Corp</span>
    </div>
    <span class="absolute top-5 right-5 text-[9px] font-mono text-blue-400/20 select-none">CADASTRO CORPORATIVO</span>

    <div class="w-full max-w-[500px] relative">

        <!-- Header -->
        <div class="text-center mb-8">
            <div class="inline-flex items-center justify-center w-14 h-14 rounded-2xl bg-blue-600/10 border border-blue-500/20 mb-4">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#60a5fa" stroke-width="1.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 21h16.5M4.5 3h15M5.25 3v18m13.5-18v18M9 6.75h1.5m-1.5 3h1.5m-1.5 3h1.5m3-6H15m-1.5 3H15m-1.5 3H15M9 21v-3.375c0-.621.504-1.125 1.125-1.125h3.75c.621 0 1.125.504 1.125 1.125V21"/>
                </svg>
            </div>
            <h1 class="text-xl font-bold text-white">Cadastro Corporativo</h1>
            <p class="text-xs text-blue-300/50 font-mono mt-1 tracking-wider">NOVA EMPRESA · CITY OF CLOUDS</p>
        </div>

        <!-- Card -->
        <div class="bg-white/[0.04] backdrop-blur-xl border border-white/[0.08] rounded-3xl p-8 shadow-2xl shadow-black/50">

            @if($errors->any())
                <div class="mb-5 p-4 bg-red-500/10 border border-red-500/20 rounded-xl">
                    <ul class="text-xs text-red-400 space-y-1 list-disc list-inside">
                        @foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('empresa.auth.register') }}" class="space-y-5">
                @csrf

                {{-- ── Dados do Responsável ──────────────────── --}}
                <div>
                    <p class="text-[10px] font-mono text-blue-400/50 uppercase tracking-widest mb-3">01 · Responsável pela conta</p>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-xs font-semibold text-slate-400 mb-1.5">Nome completo *</label>
                            <input type="text" name="nome" value="{{ old('nome') }}" required
                                   class="w-full px-4 py-2.5 bg-white/[0.06] border border-white/10 rounded-xl text-sm text-white placeholder-slate-600 focus:outline-none focus:border-blue-500/50 transition"
                                   placeholder="João da Silva">
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-400 mb-1.5">E-mail corporativo *</label>
                            <input type="email" name="email" value="{{ old('email') }}" required
                                   class="w-full px-4 py-2.5 bg-white/[0.06] border border-white/10 rounded-xl text-sm text-white placeholder-slate-600 focus:outline-none focus:border-blue-500/50 transition"
                                   placeholder="joao@empresa.com">
                        </div>
                        <div class="grid grid-cols-2 gap-3">
                            <div>
                                <label class="block text-xs font-semibold text-slate-400 mb-1.5">Senha *</label>
                                <input type="password" name="password" required
                                       class="w-full px-4 py-2.5 bg-white/[0.06] border border-white/10 rounded-xl text-sm text-white placeholder-slate-600 focus:outline-none focus:border-blue-500/50 transition"
                                       placeholder="••••••••">
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-slate-400 mb-1.5">Confirmar *</label>
                                <input type="password" name="password_confirmation" required
                                       class="w-full px-4 py-2.5 bg-white/[0.06] border border-white/10 rounded-xl text-sm text-white placeholder-slate-600 focus:outline-none focus:border-blue-500/50 transition"
                                       placeholder="••••••••">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Divider -->
                <div class="border-t border-white/[0.06]"></div>

                {{-- ── Dados da Empresa ──────────────────────── --}}
                <div>
                    <p class="text-[10px] font-mono text-blue-400/50 uppercase tracking-widest mb-3">02 · Dados da empresa</p>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-xs font-semibold text-slate-400 mb-1.5">Razão Social / Nome da Empresa *</label>
                            <input type="text" name="empresa_nome" value="{{ old('empresa_nome') }}" required
                                   class="w-full px-4 py-2.5 bg-white/[0.06] border border-white/10 rounded-xl text-sm text-white placeholder-slate-600 focus:outline-none focus:border-blue-500/50 transition"
                                   placeholder="Empresa LTDA">
                        </div>
                        <div class="grid grid-cols-2 gap-3">
                            <div>
                                <label class="block text-xs font-semibold text-slate-400 mb-1.5">CNPJ *</label>
                                <input type="text" name="empresa_cnpj" id="cnpj" value="{{ old('empresa_cnpj') }}" required
                                       maxlength="18"
                                       class="w-full px-4 py-2.5 bg-white/[0.06] border border-white/10 rounded-xl text-sm text-white placeholder-slate-600 focus:outline-none focus:border-blue-500/50 transition font-mono"
                                       placeholder="00.000.000/0000-00">
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-slate-400 mb-1.5">Segmento *</label>
                                <select name="empresa_segmento" required
                                        class="w-full px-4 py-2.5 bg-[#0d1527] border border-white/10 rounded-xl text-sm text-white focus:outline-none focus:border-blue-500/50 transition">
                                    <option value="" disabled {{ old('empresa_segmento') ? '' : 'selected' }}>Selecionar</option>
                                    <option value="tecnologia"  {{ old('empresa_segmento') === 'tecnologia'  ? 'selected' : '' }}>Tecnologia</option>
                                    <option value="logistica"   {{ old('empresa_segmento') === 'logistica'   ? 'selected' : '' }}>Logística</option>
                                    <option value="saude"       {{ old('empresa_segmento') === 'saude'       ? 'selected' : '' }}>Saúde</option>
                                    <option value="educacao"    {{ old('empresa_segmento') === 'educacao'    ? 'selected' : '' }}>Educação</option>
                                    <option value="varejo"      {{ old('empresa_segmento') === 'varejo'      ? 'selected' : '' }}>Varejo</option>
                                    <option value="industria"   {{ old('empresa_segmento') === 'industria'   ? 'selected' : '' }}>Indústria</option>
                                    <option value="financeiro"  {{ old('empresa_segmento') === 'financeiro'  ? 'selected' : '' }}>Financeiro</option>
                                    <option value="construcao"  {{ old('empresa_segmento') === 'construcao'  ? 'selected' : '' }}>Construção Civil</option>
                                    <option value="outro"       {{ old('empresa_segmento') === 'outro'       ? 'selected' : '' }}>Outro</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <button type="submit"
                        class="w-full flex items-center justify-center gap-2 px-6 py-3.5 bg-blue-600 hover:bg-blue-500 text-white rounded-xl text-sm font-semibold transition-all shadow-lg shadow-blue-900/40 mt-2">
                    Criar Conta Corporativa
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </button>
            </form>
        </div>

        <div class="text-center mt-6">
            <p class="text-sm text-slate-500">
                Já tem conta?
                <a href="{{ route('empresa.auth.login') }}" class="text-blue-400 hover:text-blue-300 font-medium transition">Acessar portal →</a>
            </p>
        </div>
    </div>
</body>
</html>

<script>
document.getElementById('cnpj')?.addEventListener('input', function(e) {
    let v = e.target.value.replace(/\D/g,'').slice(0,14);
    if (v.length > 12) v = v.replace(/^(\d{2})(\d{3})(\d{3})(\d{4})(\d{0,2})$/,'$1.$2.$3/$4-$5');
    else if (v.length > 8) v = v.replace(/^(\d{2})(\d{3})(\d{3})(\d{0,4})$/,'$1.$2.$3/$4');
    else if (v.length > 5) v = v.replace(/^(\d{2})(\d{3})(\d{0,3})$/,'$1.$2.$3');
    else if (v.length > 2) v = v.replace(/^(\d{2})(\d{0,3})$/,'$1.$2');
    e.target.value = v;
});
</script>
