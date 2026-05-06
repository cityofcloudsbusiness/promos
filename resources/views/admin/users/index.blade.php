<x-app-layout>
    <style>
        .chat-container::-webkit-scrollbar { width: 4px; }
        .chat-container::-webkit-scrollbar-thumb { background: #dc2626; border-radius: 10px; }
        /* Garante que o container de mensagens cresça corretamente */
        .chat-messages { display: flex; flex-direction: column; }
        [x-cloak] { display: none !important; }
    </style>

    <div class="py-20 bg-[#050505] min-h-screen text-gray-200 font-mono" x-data="{ openEdit: null, openChat: null }">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{-- Header --}}
            <div class="flex justify-between items-end mb-12 border-b-2 border-red-600/20 pb-6">
                <div class="relative">
                    <div class="absolute -top-4 -left-4 w-12 h-12 bg-red-600/10 blur-xl"></div>
                    <h1 class="text-4xl font-black tracking-tighter uppercase italic">
                        <span class="text-white">User</span> <span class="text-transparent bg-clip-text bg-gradient-to-r from-purple-500 to-red-600">COMMAND</span>
                    </h1>
                    <p class="text-[10px] text-gray-500 mt-1 uppercase tracking-[0.5em]">Auth Level: Super_User_Root</p>
                </div>
                <a href="{{ route('admin.projects.index') }}" class="text-[10px] font-bold border border-red-500/50 px-6 py-2 text-red-500 hover:bg-red-500 hover:text-white transition-all shadow-[0_0_15px_rgba(220,38,38,0.1)]">
                    RETURN_TO_PROJECTS
                </a>
            </div>

            {{-- Formulário de Cadastro Rápido --}}
            <div class="mb-12 p-8 bg-gray-900/40 border border-white/5 rounded-lg backdrop-blur-md shadow-2xl">
                <form action="{{ route('admin.users.store') }}" method="POST" class="grid grid-cols-1 md:grid-cols-5 gap-6 items-end">
                    @csrf
                    <div class="md:col-span-1">
                        <label class="block text-[9px] uppercase mb-2 text-gray-500 font-bold tracking-widest">Agente_Name</label>
                        <input type="text" name="name" required class="w-full bg-black border-white/10 text-white text-xs focus:border-red-600 transition-all rounded p-3">
                    </div>
                    <div class="md:col-span-1">
                        <label class="block text-[9px] uppercase mb-2 text-gray-500 font-bold tracking-widest">Agente_Email</label>
                        <input type="email" name="email" required class="w-full bg-black border-white/10 text-white text-xs focus:border-red-600 transition-all rounded p-3">
                    </div>
                    <div class="md:col-span-1">
                        <label class="block text-[9px] uppercase mb-2 text-gray-500 font-bold tracking-widest">Access_Key</label>
                        <input type="password" name="password" required class="w-full bg-black border-white/10 text-white text-xs focus:border-red-600 transition-all rounded p-3">
                    </div>
                    <div class="md:col-span-1">
                        <label class="block text-[9px] uppercase mb-2 text-gray-500 font-bold tracking-widest">Permission_Level</label>
                        <select name="role" class="w-full bg-black border-white/10 text-white text-xs focus:border-red-600 rounded p-3">
                            <option value="employee">Programador (Employee)</option>
                            <option value="client">Cliente (Client)</option>
                        </select>
                    </div>
                    <button type="submit" class="bg-red-600 hover:bg-red-500 text-white font-black py-3 rounded text-[10px] uppercase tracking-[0.2em] transition-all shadow-lg shadow-red-600/20">
                        Deploy_Agente
                    </button>
                </form>
            </div>

            {{-- Listagem de Usuários --}}
            <div class="grid grid-cols-1 gap-4">
                @foreach($users as $user)
                <div class="bg-gray-900/30 border border-white/5 p-6 rounded-lg hover:border-red-600/40 transition-all group shadow-xl">
                    <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
                        <div class="flex items-center space-x-6">
                            <div class="w-12 h-12 bg-gradient-to-br from-gray-800 to-black border border-white/10 flex items-center justify-center rounded-full text-red-500 font-black italic">
                                {{ substr($user->name, 0, 2) }}
                            </div>
                            <div>
                                <div class="flex items-center space-x-3">
                                    <h3 class="text-xl font-bold text-white uppercase tracking-tighter">{{ $user->name }}</h3>
                                    <span class="text-[8px] bg-red-600/20 text-red-500 border border-red-500/30 px-2 py-0.5 rounded font-black tracking-widest">ROLE_{{ $user->role }}</span>
                                </div>
                                <p class="text-xs text-gray-500 mt-1 font-mono italic">{{ $user->email }}</p>
                                
                                {{-- Exibir Projetos Associados --}}
                                @if($user->role === 'employee' && $user->assignedProjects->count() > 0)
                                <div class="mt-3 flex flex-wrap gap-2">
                                    @foreach($user->assignedProjects as $p)
                                    <span class="bg-purple-900/20 text-purple-400 text-[8px] px-2 py-1 rounded border border-purple-500/20">#{{ $p->name }}</span>
                                    @endforeach
                                </div>
                                @endif
                            </div>
                        </div>

                        <div class="flex space-x-3 w-full md:w-auto">
                            <button @click="openChat = {{ $user->id }}" class="flex-1 md:flex-none border border-cyan-500/40 px-6 py-2.5 text-[10px] font-black text-cyan-500 hover:bg-cyan-500 hover:text-black transition-all uppercase tracking-widest">Messages</button>
                            <button @click="openEdit = {{ $user->id }}" class="flex-1 md:flex-none border border-white/10 px-6 py-2.5 text-[10px] font-black text-white hover:bg-white hover:text-black transition-all uppercase tracking-widest">Edit_Agente</button>
                            
                            <form action="{{ route('admin.users.destroy', $user) }}" method="POST" onsubmit="return confirm('PERMANENT DELETE?')" class="flex-1 md:flex-none">
                                @csrf @method('DELETE')
                                <button type="submit" class="w-full bg-red-600/10 border border-red-600/40 px-6 py-2.5 text-[10px] font-black text-red-500 hover:bg-red-600 hover:text-white transition-all uppercase tracking-widest">Terminate</button>
                            </form>
                        </div>
                    </div>

                    {{-- Modal de Edição Completa (Conforme Requisito) --}}
                    <div x-show="openEdit === {{ $user->id }}" x-cloak class="fixed inset-0 z-[300] flex items-center justify-center p-4 bg-black/90 backdrop-blur-md">
                        <div class="bg-[#0a0a0a] border-2 border-red-600 w-full max-w-2xl p-8 rounded-lg shadow-[0_0_100px_rgba(220,38,38,0.3)]">
                            <div class="flex justify-between items-center mb-8 border-b border-red-600/20 pb-4">
                                <h2 class="text-2xl font-black text-white italic uppercase tracking-tighter">Edit_Agente: <span class="text-red-500">{{ $user->name }}</span></h2>
                                <button @click="openEdit = null" class="text-gray-500 hover:text-white font-black">X_CLOSE</button>
                            </div>
                            
                            <form action="{{ route('admin.users.update', $user) }}" method="POST" class="space-y-6">
                                @csrf @method('PUT')
                                <div class="grid grid-cols-2 gap-6">
                                    <div>
                                        <label class="block text-[10px] text-gray-500 uppercase mb-2 font-bold tracking-widest">Display_Name</label>
                                        <input type="text" name="name" value="{{ $user->name }}" class="w-full bg-black border-white/10 text-white rounded p-3 focus:border-red-600">
                                    </div>
                                    <div>
                                        <label class="block text-[10px] text-gray-500 uppercase mb-2 font-bold tracking-widest">Email_Address</label>
                                        <input type="email" name="email" value="{{ $user->email }}" class="w-full bg-black border-white/10 text-white rounded p-3 focus:border-red-600">
                                    </div>
                                    <div>
                                        <label class="block text-[10px] text-gray-500 uppercase mb-2 font-bold tracking-widest">Access_Role</label>
                                        <select name="role" class="w-full bg-black border-white/10 text-white rounded p-3 focus:border-red-600">
                                            <option value="employee" {{ $user->role == 'employee' ? 'selected' : '' }}>Programador</option>
                                            <option value="client" {{ $user->role == 'client' ? 'selected' : '' }}>Cliente</option>
                                        </select>
                                    </div>
                                    <div>
                                        <label class="block text-[10px] text-gray-500 uppercase mb-2 font-bold tracking-widest">New_Access_Key (Optional)</label>
                                        <input type="password" name="password" placeholder="Leave blank to keep" class="w-full bg-black border-white/10 text-white rounded p-3 focus:border-red-600">
                                    </div>
                                </div>

                                {{-- Se for Programador, permite associar projetos --}}
                                @if($user->role === 'employee')
                                <div class="border-t border-white/5 pt-6">
                                    <label class="block text-[10px] text-red-500 uppercase mb-4 font-black tracking-widest">Associate_Projects (Multi-Select)</label>
                                    <div class="grid grid-cols-2 gap-3 max-h-48 overflow-y-auto pr-2 chat-container">
                                        @foreach($projects as $project)
                                        <label class="flex items-center space-x-4 bg-black/60 p-3 rounded border border-white/5 cursor-pointer hover:border-red-600/40 transition-all">
                                            <input type="checkbox" name="projects[]" value="{{ $project->id }}" 
                                                {{ $user->assignedProjects->contains($project->id) ? 'checked' : '' }}
                                                class="rounded bg-black border-white/20 text-red-600 focus:ring-red-600 w-5 h-5">
                                            <span class="text-[11px] text-gray-300 uppercase italic font-bold">{{ $project->name }}</span>
                                        </label>
                                        @endforeach
                                    </div>
                                </div>
                                @endif

                                <div class="flex space-x-4 pt-6">
                                    <button type="submit" class="flex-1 bg-red-600 hover:bg-red-500 text-white font-black py-4 rounded uppercase tracking-widest transition-all">Execute_Update</button>
                                    <button type="button" @click="openEdit = null" class="px-10 border border-white/10 text-gray-500 hover:bg-white hover:text-black rounded uppercase text-[10px] font-black transition-all">Abort</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        {{-- MODAL DE CHAT FULLSCREEN (CORREÇÃO PROBLEMA 2) --}}
        @foreach($users as $user)
        <div x-show="openChat === {{ $user->id }}" x-cloak 
             class="fixed inset-0 z-[500] bg-black/95 flex flex-col items-center justify-center p-4 md:p-12">
            
            <div class="w-full max-w-5xl h-[90vh] bg-[#080808] border border-cyan-500/30 flex flex-col rounded-xl overflow-hidden shadow-[0_0_150px_rgba(6,182,212,0.15)]">
                
                {{-- Chat Header --}}
                <div class="p-6 border-b border-white/10 bg-black/60 flex justify-between items-center">
                    <div class="flex items-center space-x-5">
                        <div class="relative">
                            <div class="w-4 h-4 bg-cyan-500 rounded-full animate-ping absolute inset-0 opacity-20"></div>
                            <div class="w-4 h-4 bg-cyan-500 rounded-full shadow-[0_0_15px_rgba(6,182,212,0.8)]"></div>
                        </div>
                        <div>
                            <h2 class="text-white text-xl font-black uppercase italic tracking-tighter">SECURE_COMM: {{ $user->name }}</h2>
                            <p class="text-[9px] text-gray-500 font-mono tracking-[0.3em]">ENCRYPTION_LEVEL: MIL-SPEC_AES256</p>
                        </div>
                    </div>
                    <button @click="openChat = null" class="text-gray-500 hover:text-white font-black text-xs border border-white/10 px-6 py-2 rounded-lg hover:bg-white/5 transition-all">TERMINATE_SESSION [ESC]</button>
                </div>

                {{-- Chat Messages (WHATSAPP STYLE: Novas embaixo) --}}
                <div class="flex-1 overflow-y-auto p-8 space-y-6 chat-container chat-messages" id="chat-box-{{ $user->id }}">
                    @php
                        // Lógica para pegar mensagens relacionadas a este usuário
                        // Ordenado por 'asc' para que as novas fiquem embaixo (Estilo Zap)
                        $messages = \App\Models\Message::where('user_id', $user->id)
                                    ->orWhereHas('project', function($q) use($user) { 
                                        $q->where('user_id', $user->id); 
                                    })
                                    ->orderBy('created_at', 'asc') 
                                    ->get();
                    @endphp

                    @forelse($messages as $message)
                        <div class="flex {{ $message->user_id == auth()->id() ? 'justify-end' : 'justify-start' }}">
                            <div class="max-w-[70%] {{ $message->user_id == auth()->id() ? 'bg-cyan-900/20 border-r-2 border-cyan-500' : 'bg-gray-800/40 border-l-2 border-red-500' }} p-5 rounded-lg shadow-2xl">
                                <div class="flex items-center justify-between space-x-8 mb-2">
                                    <span class="text-[10px] font-black text-cyan-400 uppercase tracking-widest">{{ $message->user->name }}</span>
                                    <span class="text-[9px] text-gray-500">{{ $message->created_at->format('H:i | d.m') }}</span>
                                </div>
                                <div class="text-[13px] text-gray-200 leading-relaxed font-mono">
                                    {!! nl2br(e($message->content)) !!}
                                </div>
                                @if($message->attachment)
                                    <div class="mt-4 border border-white/10 p-1 rounded bg-black/40">
                                        <img src="{{ asset('storage/' . $message->attachment) }}" class="max-w-full rounded transition-all hover:scale-[1.02] cursor-pointer">
                                    </div>
                                @endif
                            </div>
                        </div>
                    @empty
                        <div class="h-full flex flex-col items-center justify-center text-gray-700 opacity-50 space-y-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 animate-pulse" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.063 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                            </svg>
                            <span class="text-xs uppercase tracking-[0.5em] font-black">Waiting_for_data_stream_</span>
                        </div>
                    @endforelse
                </div>

                {{-- Formulário de Envio (Fixo no rodapé do modal) --}}
                <div class="p-8 bg-black border-t border-white/10">
                    <form action="{{ route('messages.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        {{-- Tenta encontrar o ID do projeto do usuário para vincular a mensagem --}}
                        <input type="hidden" name="project_id" value="{{ $user->project->id ?? ($user->assignedProjects->first()->id ?? '') }}">
                        
                        <div class="relative group">
                            <div class="absolute -inset-1 bg-gradient-to-r from-cyan-500 to-purple-600 rounded-xl blur opacity-10 group-focus-within:opacity-30 transition-all"></div>
                            <textarea name="content" required placeholder="Enter_message_payload..." rows="2" 
                                      class="relative w-full bg-[#0a0a0a] border border-white/10 rounded-xl text-white text-sm p-6 focus:border-cyan-500 transition-all resize-none shadow-inner"></textarea>
                            
                            <div class="absolute right-6 bottom-6 flex items-center space-x-6">
                                <label class="cursor-pointer text-gray-500 hover:text-cyan-400 transition-all transform hover:scale-110">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                    <input type="file" name="attachment" class="hidden" accept="image/*">
                                </label>
                                <button type="submit" class="bg-cyan-600 hover:bg-cyan-500 text-white px-10 py-3 rounded-lg font-black uppercase text-[10px] tracking-[0.3em] transition-all transform active:scale-95 shadow-lg shadow-cyan-600/20">
                                    TRANSMIT_
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</x-app-layout>