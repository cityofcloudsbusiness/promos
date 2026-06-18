<!DOCTYPE html>
<html lang="pt-BR" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Conta · City of Clouds EscolaOnline</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-full bg-indigo-950 antialiased py-12">

    {{-- Blueprint grid overlay --}}
    <div class="fixed inset-0 pointer-events-none"
         style="background-image: linear-gradient(rgba(99,102,241,0.08) 1px, transparent 1px), linear-gradient(90deg, rgba(99,102,241,0.08) 1px, transparent 1px); background-size: 48px 48px;"></div>

    {{-- Glow top-right --}}
    <div class="fixed -top-40 -right-40 w-[600px] h-[600px] rounded-full pointer-events-none"
         style="background: radial-gradient(circle, rgba(99,102,241,0.18) 0%, transparent 70%);"></div>

    {{-- Glow bottom-left --}}
    <div class="fixed -bottom-40 -left-40 w-[500px] h-[500px] rounded-full pointer-events-none"
         style="background: radial-gradient(circle, rgba(139,92,246,0.12) 0%, transparent 70%);"></div>

    {{-- Corner tag --}}
    <div class="fixed top-6 left-6 flex items-center gap-2.5 z-10">
        <a href="{{ route('home') }}" class="flex items-center gap-2.5 group">
            <img src="{{ Vite::asset('resources/imgs/icon_logo.webp') }}" alt="City of Clouds" class="w-7 h-7 object-contain opacity-80 group-hover:opacity-100 transition">
            <div>
                <p class="text-[10px] font-bold text-indigo-400 uppercase tracking-widest leading-none">City of Clouds</p>
                <p class="text-xs text-indigo-300 leading-tight">EscolaOnline</p>
            </div>
        </a>
    </div>

    {{-- Blueprint corner markers --}}
    <span class="fixed top-6 right-6 font-mono text-[9px] text-indigo-700 select-none">X:FF Y:00</span>
    <span class="fixed bottom-6 right-6 font-mono text-[9px] text-indigo-700 select-none">X:FF Y:FF</span>

    {{-- Main centered layout --}}
    <div class="relative flex items-center justify-center px-4">
        <div class="w-full max-w-md">

            {{-- Logo / Header --}}
            <div class="text-center mb-8">
                <div class="inline-flex items-center justify-center w-16 h-16 rounded-2xl bg-indigo-900 border border-indigo-700 shadow-2xl shadow-indigo-900/50 mb-5">
                    <img src="{{ Vite::asset('resources/imgs/icon_logo.webp') }}" alt="Logo" class="w-9 h-9 object-contain">
                </div>
                <h1 class="text-2xl font-bold text-white tracking-tight">Criar sua conta</h1>
                <p class="text-indigo-300 text-sm mt-1.5">Junte-se à EscolaOnline · City of Clouds</p>
            </div>

            {{-- Card --}}
            <div class="bg-white/[0.04] backdrop-blur-xl border border-white/10 rounded-3xl p-8 shadow-2xl shadow-black/30">

                <form method="POST" action="{{ route('register') }}" class="space-y-5">
                    @csrf

                    {{-- Nome --}}
                    <div>
                        <label for="name" class="block text-sm font-medium text-indigo-200 mb-2">
                            Nome completo
                        </label>
                        <input id="name" type="text" name="name" value="{{ old('name') }}"
                               required autofocus autocomplete="name"
                               class="w-full px-4 py-3 bg-white/[0.06] border
                                      {{ $errors->has('name') ? 'border-red-500/60' : 'border-white/10' }}
                                      rounded-xl text-white placeholder-indigo-400/60 text-sm
                                      focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent
                                      transition"
                               placeholder="Seu nome">
                        @error('name')
                            <p class="mt-1.5 text-xs text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- E-mail --}}
                    <div>
                        <label for="email" class="block text-sm font-medium text-indigo-200 mb-2">
                            E-mail
                        </label>
                        <input id="email" type="email" name="email" value="{{ old('email') }}"
                               required autocomplete="username"
                               class="w-full px-4 py-3 bg-white/[0.06] border
                                      {{ $errors->has('email') ? 'border-red-500/60' : 'border-white/10' }}
                                      rounded-xl text-white placeholder-indigo-400/60 text-sm
                                      focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent
                                      transition"
                               placeholder="seu@email.com">
                        @error('email')
                            <p class="mt-1.5 text-xs text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Senha --}}
                    <div>
                        <label for="password" class="block text-sm font-medium text-indigo-200 mb-2">
                            Senha
                        </label>
                        <input id="password" type="password" name="password"
                               required autocomplete="new-password"
                               class="w-full px-4 py-3 bg-white/[0.06] border
                                      {{ $errors->has('password') ? 'border-red-500/60' : 'border-white/10' }}
                                      rounded-xl text-white placeholder-indigo-400/60 text-sm
                                      focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent
                                      transition"
                               placeholder="Mínimo 8 caracteres">
                        @error('password')
                            <p class="mt-1.5 text-xs text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Confirmar senha --}}
                    <div>
                        <label for="password_confirmation" class="block text-sm font-medium text-indigo-200 mb-2">
                            Confirmar senha
                        </label>
                        <input id="password_confirmation" type="password" name="password_confirmation"
                               required autocomplete="new-password"
                               class="w-full px-4 py-3 bg-white/[0.06] border
                                      {{ $errors->has('password_confirmation') ? 'border-red-500/60' : 'border-white/10' }}
                                      rounded-xl text-white placeholder-indigo-400/60 text-sm
                                      focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent
                                      transition"
                               placeholder="Repita a senha">
                        @error('password_confirmation')
                            <p class="mt-1.5 text-xs text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Info role --}}
                    <div class="flex items-start gap-3 px-4 py-3 bg-indigo-900/30 border border-indigo-700/30 rounded-xl">
                        <span class="text-indigo-400 text-base mt-0.5">🎓</span>
                        <p class="text-xs text-indigo-300 leading-relaxed">
                            Sua conta será criada como <strong class="text-indigo-200">Aluno</strong>. Para acesso de Professor, solicite ao administrador após o cadastro.
                        </p>
                    </div>

                    {{-- Botão criar conta --}}
                    <button type="submit"
                            class="w-full py-3 px-6 bg-indigo-600 hover:bg-indigo-500 text-white font-semibold rounded-xl
                                   shadow-lg shadow-indigo-600/30 hover:shadow-indigo-500/40
                                   transition-all duration-200 text-sm tracking-wide">
                        Criar conta →
                    </button>
                </form>

                {{-- Divisor --}}
                <div class="flex items-center gap-4 my-6">
                    <div class="flex-1 h-px bg-white/10"></div>
                    <span class="text-xs text-indigo-500">ou</span>
                    <div class="flex-1 h-px bg-white/10"></div>
                </div>

                {{-- Link login --}}
                <a href="{{ route('login') }}"
                   class="flex items-center justify-center gap-2 w-full py-3 px-6
                          bg-white/[0.04] hover:bg-white/[0.08] border border-white/10
                          text-indigo-200 hover:text-white font-medium rounded-xl
                          transition-all duration-200 text-sm">
                    Já tem conta? <span class="font-semibold text-indigo-300">Entrar agora</span>
                </a>
            </div>

            {{-- Rodapé --}}
            <p class="text-center text-xs text-indigo-600 mt-6">
                © {{ date('Y') }} City of Clouds · Conglomerado Tecnológico
            </p>
        </div>
    </div>

</body>
</html>
