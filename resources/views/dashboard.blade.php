<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Painel de Controle') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">Status da sua Assinatura</h3>

                    @subscribed('default')
                        <div class="flex items-center p-4 mb-4 text-sm text-green-800 border border-green-300 rounded-lg bg-green-50" role="alert">
                            <span class="font-bold">ATIVO:</span> &nbsp; Sua conta está liberada e o pagamento foi confirmado. ✅
                        </div>
                        
                        <p class="mt-1 text-sm text-gray-600 mb-4">
                            Você pode gerenciar seus cartões, ver faturas ou cancelar no portal de pagamentos.
                        </p>

                        <a href="{{ route('billing') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                            Gerenciar Pagamentos (Stripe)
                        </a>
                    @else
                        <div class="flex items-center p-4 mb-4 text-sm text-yellow-800 border border-yellow-300 rounded-lg bg-yellow-50" role="alert">
                            <span class="font-bold">PENDENTE:</span> &nbsp; Sua assinatura ainda não foi detectada. ⏳
                        </div>

                        <p class="mt-1 text-sm text-gray-600 mb-4">
                            Para liberar o acesso às ferramentas, conclua o processo de assinatura clicando no botão abaixo.
                        </p>

                        <a href="{{ route('subscribe') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                            Ir para Página de Assinatura
                        </a>
                    @endsubscribed
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl text-gray-500">
                    Aqui você pode colocar as ferramentas que o cliente só usa se estiver logado.
                </div>
            </div>

        </div>
    </div>
</x-app-layout>