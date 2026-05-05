<x-app-layout>
    <style>
        .chat-container::-webkit-scrollbar { width: 4px; }
        .chat-container::-webkit-scrollbar-thumb { background: #dc2626; border-radius: 10px; }
        /* Correção WhatsApp Style: Mensagens de baixo para cima */
        .chat-messages { display: flex; flex-direction: column; }
        [x-cloak] { display: none !important; }
    </style>

    <div class="py-20 bg-[#050505] min-h-screen text-gray-200 font-mono" x-data="{ openEdit: null, openChat: null }">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-between items-end mb-12 border-b-2 border-red-600/20 pb-6">
                <div>
                    <h1 class="text-4xl font-black tracking-tighter uppercase italic">
                        <span class="text-white">User</span> <span class="text-transparent bg-clip-text bg-gradient-to-r from-purple-500 to-red-600">COMMAND</span>
                    </h1>
                    <p class="text-[10px] text-gray-500 mt-1 uppercase tracking-[0.5em]">Auth Level: Super_User_Root</p>
                </div>
                <a href="{{ route('admin.projects.index') }}" class="text-[10px] font-bold border border-red-500/50 px-6 py-2 text-red-500 hover:bg-red-500 hover:text-white transition-all">
                    RETURN_TO_PROJECTS
                </a>
            </div>

            {{-- Formulário de Cadastro Rápido --}}
            <div class="mb-12 p-6 bg-gray-900/40 border border-white/5 rounded-lg">
                <form action="{{ route('admin.users.store') }}" method="POST" class="grid grid-cols-1 md:grid-cols-5 gap-4 items-end">
                    @csrf
                    <div>
                        <label class="block text-[9px] uppercase mb-2 text-gray-500">Agente_Name</label>
                        <input type="text" name="name" required class="w-full bg-black border-white/10 text-white text-xs focus:border-red-600 transition-colors rounded">
                    </div>
                    <div>
                        <label class="block text-[9px] uppercase mb-2 text-gray-500">Agente_Email</label>
                        <input type="email" name="email" required class="w-full bg-black border-white/10 text-white text-xs focus:border-red-600 transition-colors rounded">
                    </div>
                    <div>
                        <label class="block text-[9px] uppercase mb-2 text-gray-500">Access_Key</label>
                        <input type="password" name="password" required class="w-full bg-black border-white/10 text-white text-xs focus:border-red-600 transition-colors rounded">
                    </div>
                    <div>
                        <label class="block text-[9px] uppercase mb-2 text-gray-500">Permission_Level</label>
                        <select name="role" class="w-full bg-black border-white/10 text-white text-xs focus:border-red-600 rounded">
                            <option value="employee">Programador (Employee)</option>
                            <option value="client">Cliente (Client)</option>
                        </select>
                    </div>
                    <button type="submit" class="bg-red-600 hover:bg-red-500 text-white font-black py-2 rounded text-[10px] uppercase tracking-widest transition-all">
                        Deploy_Agente
                    </button>
                </form>
            </div>

            {{-- Listagem de Usuários --}}
            <div class="grid grid-cols-1 gap-4">
                @foreach($users as $user)
                <div class="bg-gray-900/20 border border-white/5 p-4 rounded hover:border-red-600/30 transition-colors">
                    <div class="flex justify-between items-center">
                        <div>
                            <span class="text-[10px] text-red-500 font-bold uppercase tracking-widest">ID: #{{ $user->id }}</span>
                            <h3 class="text-lg font-bold text-white uppercase tracking-tighter">{{ $user->name }}</h3>
                            <p class="text-xs text-gray-500">{{ $user->email }} | Role: <span class="text-gray-300">{{ $user->role }}</span></p>
                            
                            @if($user->role === 'employee')
                            <div class="mt-2 flex flex-wrap gap-2">
                                @foreach($user->assignedProjects as $p)
                                <span class="bg-purple-900/30 text-purple-400 text-[8px] px-2 py-1 rounded border border-purple-500/20 italic">#{{ $p->name }}</span>
                                @endforeach
                            </div>
                            @endif
                        </div>
                        <div class="flex space-x-2">
                            <button @click="openChat = {{ $user->id }}" class="border border-cyan-500/30 px-4 py-2 text-[10px] font-bold text-cyan-500 hover:bg-cyan-500 hover:text-black transition uppercase">Messages</button>
                            <button @click="openEdit = {{ $user->id }}" class="border border-white/20 px-4 py-2 text-[10px] font-bold text-white hover:bg-white hover:text-black transition uppercase">Edit_Profile</button>
                            <form action="{{ route('admin.users.destroy', $user) }}" method="POST" onsubmit="return confirm('PERMANENT DELETE?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="bg-red-600/10 border border-red-600/40 px-4 py-2 text-[10px] font-bold text-red-500 hover:bg-red-600 hover:text-white transition uppercase">Terminate</button>
                            </form>
                        </div>
                    </div>

                    {{-- Modal de Edição (Problema 1) --}}
                    <div x-show="openEdit === {{ $user->id }}" x-cloak class="fixed inset-0 z-[110] flex items-center justify-center p-4 bg-black/90 backdrop-blur-sm">
                        <div class="bg-gray-900 border-2 border-red-600 w-full max-w-2xl p-8 rounded-lg shadow-[0_0_50px_rgba(220,38,38,0.2)]">
                            <div class="flex justify-between items-center mb-6 border-b border-red-600/20 pb-4">
                                <h2 class="text-2xl font-black text-white italic uppercase">Edit_Agente: <span class="text-red-500">{{ $user->name }}</span></h2>
                                <button @click="openEdit = null" class="text-gray-500 hover:text-white">ESC_</button>
                            </div>
                            
                            <form action="{{ route('admin.users.update', $user) }}" method="POST" class="space-y-6">
                                @csrf @method('PUT')
                                <div class="grid grid-cols-2 gap-4">
                                    <div>
                                        <label class="block text-[10px] text-gray-500 uppercase mb-1">Display_Name</label>
                                        <input type="text" name="name" value="{{ $user->name }}" class="w-full bg-black border-white/10 text-white rounded focus:border-red-600">
                                    </div>
                                    <div>
                                        <label class="block text-[10px] text-gray-500 uppercase mb-1">Email_Address</label>
                                        <input type="email" name="email" value="{{ $user->email }}" class="w-full bg-black border-white/10 text-white rounded focus:border-red-600">
                                    </div>
                                    <div>
                                        <label class="block text-[10px] text-gray-500 uppercase mb-1">Access_Role</label>
                                        <select name="role" class="w-full bg-black border-white/10 text-white rounded">
                                            <option value="employee" {{ $user->role == 'employee' ? 'selected' : '' }}>Programador</option>
                                            <option value="client" {{ $user->role == 'client' ? 'selected' : '' }}>Cliente</option>
                                        </select>
                                    </div>
                                    <div>
                                        <label class="block text-[10px] text-gray-500 uppercase mb-1">New_Access_Key (Optional)</label>
                                        <input type="password" name="password" placeholder="Leave blank to keep" class="w-full bg-black border-white/10 text-white rounded focus:border-red-600">
                                    </div>
                                </div>

                                @if($user->role === 'employee')
                                <div>
                                    <label class="block text-[10px] text-red-500 uppercase mb-3 font-bold">Assign_Projects (Multi-Select)</label>
                                    <div class="grid grid-cols-2 gap-2 max-h-40 overflow-y-auto pr-2 chat-container">
                                        @foreach($projects as $project)
                                        <label class="flex items-center space-x-3 bg-black/40 p-2 rounded border border-white/5 cursor-pointer hover:border-red-600/40">
                                            <input type="checkbox" name="projects[]" value="{{ $project->id }}" 
                                                {{ $user->assignedProjects->contains($project->id) ? 'checked' : '' }}
                                                class="rounded bg-black border-white/20 text-red-600 focus:ring-red-600">
                                            <span class="text-[10px] text-gray-300 uppercase italic">{{ $project->name }}</span>
                                        </label>
                                        @endforeach
                                    </div>
                                </div>
                                @endif

                                <div class="flex space-x-3 pt-4">
                                    <button type="submit" class="flex-1 bg-red-600 hover:bg-red-500 text-white font-black py-3 rounded uppercase tracking-tighter transition-all">Execute_Update</button>
                                    <button type="button" @click="openEdit = null" class="px-8 border border-white/10 text-gray-500 hover:bg-white hover:text-black rounded uppercase text-xs transition-all">Cancel</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    {{-- MODAL DE CHAT FULLSCREEN (Problema 2) --}}
    @foreach($users as $user)
    <div x-show="openChat === {{ $user->id }}" x-cloak 
         class="fixed inset-0 z-[200] bg-black/95 flex flex-col items-center justify-center p-4">
        
        <div class="w-full max-w-4xl h-[90vh] bg-gray-900 border border-cyan-500/50 flex flex-col rounded-lg overflow-hidden shadow-[0_0_100px_rgba(6,182,212,0.1)]">
            {{-- Chat Header --}}
            <div class="p-4 border-b border-white/5 bg-black/40 flex justify-between items-center">
                <div class="flex items-center space-x-4">
                    <div class="w-3 h-3 bg-cyan-500 animate-pulse rounded-full shadow-[0_0_10px_rgba(6,182,212,0.5)]"></div>
                    <div>
                        <h2 class="text-white font-bold uppercase italic tracking-tighter">Secure_Comm: {{ $user->name }}</h2>
                        <p class="text-[8px] text-gray-500">ENCRYPTION: AES-256_ACTIVE</p>
                    </div>
                </div>
                <button @click="openChat = null" class="text-gray-500 hover:text-white px-4 py-2 text-xs border border-white/10 rounded">CLOSE_TERMINAL [ESC]</button>
            </div>

            {{-- Chat Messages (WHATSAPP STYLE: Recentes embaixo) --}}
            <div class="flex-1 overflow-y-auto p-6 space-y-4 chat-container chat-messages" id="chat-box-{{ $user->id }}">
                @php
                    // Pegamos as mensagens de todos os projetos desse usuário (se for cliente)
                    // ou mensagens onde ele é o remetente
                    $messages = \App\Models\Message::where('user_id', $user->id)
                                ->orWhereHas('project', function($q) use($user) { $q->where('user_id', $user->id); })
                                ->orderBy('created_at', 'asc') // PADRÃO WHATSAPP: MAIS ANTIGAS NO TOPO, NOVAS EMBAIXO
                                ->get();
                @endphp

                @forelse($messages as $message)
                    <div class="flex {{ $message->user_id == auth()->id() ? 'justify-end' : 'justify-start' }}">
                        <div class="max-w-[80%] {{ $message->user_id == auth()->id() ? 'bg-cyan-900/40 border-r-4 border-cyan-500 text-right' : 'bg-purple-900/40 border-l-4 border-purple-500' }} p-3 rounded shadow-lg">
                            <p class="text-[9px] text-gray-400 mb-1 uppercase font-black">{{ $message->user->name }} • {{ $message->created_at->format('H:i') }}</p>
                            <div class="text-sm text-gray-200 leading-relaxed font-mono">
                                {!! nl2br(e($message->content)) !!}
                            </div>
                            @if($message->attachment)
                                <div class="mt-3">
                                    <img src="{{ asset('storage/' . $message->attachment) }}" class="max-w-full rounded-md border border-white/10">
                                </div>
                            @endif
                        </div>
                    </div>
                @empty
                    <div class="h-full flex items-center justify-center text-gray-600 text-xs italic">
                        NO_COMMUNICATION_HISTORY_FOUND_
                    </div>
                @endforelse
            </div>

            {{-- Formulário de Envio dentro do Modal --}}
            @if($user->project || $user->role === 'employee')
            <div class="p-4 bg-black/60 border-t border-white/5">
                <form action="{{ route('messages.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="project_id" value="{{ $user->project->id ?? ($user->assignedProjects->first()->id ?? '') }}">
                    <div class="relative">
                        <textarea name="content" required placeholder="Type_message_here..." rows="2" 
                                  class="w-full bg-gray-900 border-2 border-white/5 rounded-lg text-white text-xs p-4 focus:border-cyan-500 transition-all resize-none"></textarea>
                        
                        <div class="absolute right-4 bottom-4 flex items-center space-x-4">
                            <label class="cursor-pointer text-gray-500 hover:text-cyan-400 transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                <input type="file" name="attachment" class="hidden" accept="image/*">
                            </label>
                            <button type="submit" class="bg-cyan-600 hover:bg-cyan-500 text-white px-6 py-2 rounded font-black uppercase text-xs tracking-widest transition-all">Transmit_</button>
                        </div>
                    </div>
                </form>
            </div>
            @endif
        </div>
    </div>
    @endforeach

</x-app-layout>