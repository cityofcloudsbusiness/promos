<x-app-layout>
    <div class="py-12 bg-black min-h-screen text-white font-mono">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="relative p-8 bg-gray-900/50 border border-purple-500/30 rounded-2xl backdrop-blur-xl mb-8">
                <h2 class="text-3xl font-bold bg-gradient-to-r from-pink-500 to-purple-600 bg-clip-text text-transparent uppercase">
                    {{ $project->name ?? 'Aguardando Inicialização...' }}
                </h2>
                <p class="text-gray-400 mt-2">STATUS: 
                    <span class="{{ $project ? 'text-green-400 animate-pulse' : 'text-yellow-500' }}">
                        {{ $project->status ?? 'EM PROCESSAMENTO' }}
                    </span>
                </p>
            </div>

            <div class="p-6 bg-gray-900/50 border border-pink-500/20 rounded-2xl mb-8">
                <div class="flex justify-between mb-4 text-pink-400 text-xs tracking-widest uppercase">
                    <span>Sincronização de Progresso</span>
                    <span>{{ $project->dynamic_progress ?? 0 }}%</span>
                </div>
                <div class="w-full bg-gray-800 rounded-full h-4 p-1">
                    <div class="bg-gradient-to-r from-pink-500 to-purple-600 h-2 rounded-full shadow-[0_0_10px_#ec4899] transition-all duration-1000" 
                         style="width: {{ $project->dynamic_progress ?? 5 }}%"></div>
                </div>

                @if($project && $project->steps)
                <div class="mt-8 grid grid-cols-1 md:grid-cols-2 gap-4 border-t border-white/5 pt-6">
                    @foreach($project->steps as $step)
                    <div class="flex items-center p-3 border border-white/5 rounded-lg {{ $step['completed'] ? 'bg-green-500/5' : 'bg-gray-800/30' }}">
                        <div class="mr-3">
                            @if($step['completed'])
                                <span class="text-green-500 text-lg">●</span>
                            @else
                                <span class="text-gray-600 text-lg animate-pulse">○</span>
                            @endif
                        </div>
                        <span class="text-sm {{ $step['completed'] ? 'text-gray-400 line-through' : 'text-gray-200' }}">
                            {{ $step['task'] }}
                        </span>
                    </div>
                    @endforeach
                </div>
                @endif
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
                <div class="lg:col-span-3 space-y-4">
                    <div class="h-96 overflow-y-auto p-4 bg-black/40 rounded-xl border border-gray-800 space-y-4">
                        @forelse($messages ?? [] as $message)
                            <div class="flex flex-col {{ $message->user_id == auth()->id() ? 'items-end' : 'items-start' }}">
                                <div class="p-3 rounded-lg border {{ $message->user_id == auth()->id() ? 'bg-pink-900/20 border-pink-500/30' : 'bg-purple-900/20 border-purple-500/30' }} max-w-md">
                                    <p class="text-[10px] uppercase text-gray-500 mb-1">{{ $message->user->name }}:</p>
                                    <p class="text-sm">{{ $message->content }}</p>
                                    @if($message->attachment)
                                        <img src="{{ asset('storage/' . $message->attachment) }}" class="mt-2 rounded border border-gray-700">
                                    @endif
                                </div>
                            </div>
                        @empty
                            <div class="flex items-center justify-center h-full opacity-30 italic">
                                <p class="text-center text-gray-600 text-xs uppercase tracking-widest">Nenhuma transmissão encontrada no histórico.</p>
                            </div>
                        @endforelse
                    </div>

                    @if($project)
                    <form action="{{ route('messages.store') }}" method="POST" enctype="multipart/form-data" class="relative">
                        @csrf
                        <input type="hidden" name="project_id" value="{{ $project->id }}">
                        <textarea name="content" required 
                                  class="w-full bg-gray-900 border border-pink-500/30 rounded-xl p-4 text-white text-sm focus:ring-pink-500 focus:border-pink-500 outline-none transition-all" 
                                  placeholder="Escrever comentário para a equipe..."></textarea>
                        <div class="flex justify-between mt-2">
                            <input type="file" name="attachment" class="text-xs text-gray-500 file:bg-gray-800 file:text-white file:border-none file:rounded file:px-2 file:py-1 file:mr-4 file:hover:bg-gray-700 cursor-pointer">
                            <button class="bg-pink-600 px-6 py-2 rounded-lg font-bold text-xs hover:bg-pink-500 transition shadow-lg shadow-pink-500/20 uppercase tracking-widest text-white">
                                TRANSMITIR
                            </button>
                        </div>
                    </form>
                    @else
                    <div class="p-4 bg-yellow-900/20 border border-yellow-500/30 rounded-xl text-center text-xs text-yellow-500">
                        Aguarde a inicialização do projeto para habilitar o terminal de chat.
                    </div>
                    @endif
                </div>

                <div class="space-y-4">
                    <div class="p-4 bg-gray-900/50 border border-blue-500/20 rounded-xl">
                        <h3 class="text-blue-400 text-[10px] mb-4 tracking-widest uppercase text-center">Ações do Sistema</h3>
                        <a href="{{ route('billing') }}" class="block w-full text-center py-2 border border-blue-500/40 rounded text-[10px] font-bold text-blue-400 hover:bg-blue-500/10 transition uppercase">
                            GERENCIAR FATURAS
                        </a>
                        
                        @if($project && $project->preview_url)
                        <a href="{{ $project->preview_url }}" target="_blank" class="block w-full text-center py-2 mt-2 bg-blue-600/20 border border-blue-500/40 rounded text-[10px] font-bold text-blue-400 hover:bg-blue-500/30 transition uppercase">
                            VER SITE PREVIEW
                        </a>
                        @endif
                    </div>
                    
                    <div class="p-4 border border-white/5 rounded-xl text-[10px] text-gray-500 leading-relaxed text-center italic">
                        Criptografia de ponta a ponta ativa. Transmissão segura via WebM Protocol.
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>