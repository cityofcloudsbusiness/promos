<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Configurações de Perfil') }}
                </h2>
                <p class="text-sm text-gray-500">Gerencie seus dados e veja o status da sua assinatura.</p>
            </div>
        </div>
    </x-slot>

    <div class="py-12 bg-slate-50 min-h-screen">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-black/80 border border-white/10 rounded-3xl p-8 text-white shadow-xl">
                <div class="grid gap-6 md:grid-cols-3">
                    <div class="space-y-2">
                        <p class="text-xs uppercase tracking-[0.35em] text-cyan-400">Plano Atual</p>
                        <p class="text-3xl font-black">{{ $subscription_type }}</p>
                    </div>
                    <div class="space-y-2">
                        <p class="text-xs uppercase tracking-[0.35em] text-pink-400">Início</p>
                        <p>{{ optional($user->subscription_started_at)->format('d/m/Y H:i') ?? 'Ainda não iniciado' }}</p>
                    </div>
                    <div class="space-y-2">
                        <p class="text-xs uppercase tracking-[0.35em] text-violet-400">Expira em</p>
                        <p>{{ optional($user->subscription_expires_at)->format('d/m/Y H:i') ?? 'Não aplicável' }}</p>
                    </div>
                </div>

                @if($annual_days_left !== null)
                    <div class="mt-8 rounded-3xl bg-slate-950/70 border border-cyan-500/20 p-5">
                        <p class="text-xs uppercase tracking-[0.35em] text-cyan-300">Tempo restante do ano</p>
                        <p class="text-4xl font-black">{{ $annual_days_left }} dias</p>
                    </div>
                @endif
            </div>

            <div class="bg-white rounded-3xl shadow-xl overflow-hidden">
                <div class="border-b border-slate-200 px-8 py-6 bg-slate-950 text-white">
                    <h3 class="text-lg font-bold">Dados do Usuário</h3>
                    <p class="text-sm text-slate-400">Edite seu nome e e-mail no perfil.</p>
                </div>
                <div class="p-8">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="bg-white rounded-3xl shadow-xl overflow-hidden">
                <div class="border-b border-slate-200 px-8 py-6 bg-slate-950 text-white">
                    <h3 class="text-lg font-bold">Segurança</h3>
                    <p class="text-sm text-slate-400">Atualize sua senha e sessão.</p>
                </div>
                <div class="p-8">
                    @include('profile.partials.update-password-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
