<x-app-layout>
    <style>
        .chat-container::-webkit-scrollbar { width: 4px; }
        .chat-container::-webkit-scrollbar-thumb { background: #4c1d95; border-radius: 10px; }
        [x-cloak] { display: none !important; }
    </style>

    <div class="py-20 bg-[#050505] min-h-screen text-gray-200 font-mono">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{-- Header --}}
            <div class="flex justify-between items-center mb-12 border-b-2 border-purple-600/20 pb-6">
                <div>
                    <h1 class="text-4xl font-black tracking-tighter uppercase italic text-white">
                        Project <span class="text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 to-purple-600">COMMAND_CENTER</span>
                    </h1>
                </div>
                @if(auth()->user()->role === 'admin')
                    <a href="{{ route('admin.users.index') }}" class="text-[10px] font-bold border border-purple-500/50 px-6 py-2 text-purple-400 hover:bg-purple-500 hover:text-white transition-all shadow-[0_0_15px_rgba(168,85,247,0.1)]">
                        MANAGE_AGENTS >
                    </a>
                @endif
            </div>

            {{-- Listagem de Projetos --}}
            <div class="space-y-6">
                @foreach($projects as $project)
                    <div class="bg-gray-900/50 border border-white/5 rounded-2xl overflow-hidden backdrop-blur-md p-6" x-data="{ openChat: false }">
                        <div class="flex flex-col lg:flex-row justify-between gap-6">
                            
                            {{-- Info do Projeto --}}
                            <div class="flex-1">
                                <div class="flex items-center space-x-3 mb-2">
                                    <span class="text-[10px] bg-purple-500/20 text-purple-400 px-2 py-0.5 rounded border border-purple-500/30 uppercase font-black">ID: {{ 1000 + $project->id }}</span>
                                    <h2 class="text-xl font-bold text-white uppercase tracking-tight">{{ $project->name }}</h2>
                                </div>
                                <p class="text-xs text-gray-500 mb-4 uppercase tracking-widest">Client: <span class="text-gray-300">{{ $project->user->name }}</span></p>
                                
                                {{-- Barra de Progresso Visual --}}
                                <div class="w-full bg-black h-1.5 rounded-full overflow-hidden mb-2 border border-white/5">
                                    <div class="bg-gradient-to-r from-purple-600 to-cyan-400 h-full shadow-[0_0_10px_rgba(168,85,247,0.5)] transition-all duration-1000" style="width: {{ $project->progress }}%"></div>
                                </div>
                                <div class="flex justify-between text-[10px] font-black uppercase">
                                    <span class="text-purple-500">Progress_Level</span>
                                    <span class="text-cyan-400">{{ $project->progress }}%</span>
                                </div>
                            </div>

                            {{-- Formulário de Edição (Acessível para Admin e Employee) --}}
                            <form action="{{ route('admin.projects.update', $project) }}" method="POST" class="flex-1 grid grid-cols-2 gap-4">
                                @csrf
                                <div>
                                    <label class="text-[9px] text-gray-500 uppercase mb-1 block font-bold">Project_Status</label>
                                    <select name="status" class="w-full bg-black border-gray-800 text-white rounded text-xs p-2 focus:ring-purple-500">
                                        <option value="Initializing" {{ $project->status == 'Initializing' ? 'selected' : '' }}>Initializing</option>
                                        <option value="In Development" {{ $project->status == 'In Development' ? 'selected' : '' }}>In Development</option>
                                        <option value="Testing" {{ $project->status == 'Testing' ? 'selected' : '' }}>Testing</option>
                                        <option value="Finalizing" {{ $project->status == 'Finalizing' ? 'selected' : '' }}>Finalizing</option>
                                        <option value="Completed" {{ $project->status == 'Completed' ? 'selected' : '' }}>Completed</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="text-[9px] text-gray-500 uppercase mb-1 block font-bold">Manual_Progress (%)</label>
                                    <input type="number" name="progress" value="{{ $project->progress }}" min="0" max="100" class="w-full bg-black border-gray-800 text-white rounded text-xs p-2 focus:ring-purple-500">
                                </div>
                                <div class="col-span-2">
                                    <label class="text-[9px] text-gray-500 uppercase mb-1 block font-bold">Preview_Link</label>
                                    <input type="text" name="preview_url" value="{{ $project->preview_url }}" placeholder="https://..." class="w-full bg-black border-gray-800 text-white rounded text-xs p-2 focus:ring-purple-500">
                                </div>
                                
                                @if(auth()->user()->role === 'admin')
                                <div class="col-span-2">
                                    <label class="text-[9px] text-gray-500 uppercase mb-1 block font-bold">Assign_Developer</label>
                                    <select name="employee_id" class="w-full bg-black border-gray-800 text-white rounded text-xs p-2 focus:ring-purple-500">
                                        <option value="">UNASSIGNED</option>
                                        @foreach($employees as $emp)
                                            <option value="{{ $emp->id }}" {{ $project->employee_id == $emp->id ? 'selected' : '' }}>{{ $emp->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @endif

                                <div class="col-span-2 flex space-x-2">
                                    <button type="submit" class="flex-1 bg-white/5 border border-white/10 hover:bg-white hover:text-black transition text-[10px] font-black uppercase py-2">
                                        Update_Project_Data
                                    </button>
                                    <button type="button" @click="openChat = true" class="px-6 bg-purple-600 hover:bg-purple-500 text-white text-[10px] font-black uppercase py-2 transition shadow-lg shadow-purple-900/20">
                                        Communication_Terminal
                                    </button>
                                </div>
                            </form>
                        </div>

                        {{-- Fullscreen Chat Modal --}}
                        <div x-show="openChat" 
                             class="fixed inset-0 z-[100] flex flex-col bg-black" 
                             x-cloak 
                             x-transition:enter="transition ease-out duration-300"
                             x-transition:enter-start="opacity-0 scale-95"
                             x-transition:enter-end="opacity-100 scale-100">
                            
                            {{-- Modal Header --}}
                            <div class="h-16 border-b border-purple-500/30 bg-gray-900/50 flex items-center justify-between px-8">
                                <div class="flex items-center space-x-4">
                                    <div class="w-3 h-3 bg-green-500 rounded-full animate-pulse shadow-[0_0_10px_#22c55e]"></div>
                                    <h4 class="text-purple-400 font-black uppercase tracking-[0.3em] text-sm">Encrypted_Comm_Link // Project: {{ $project->name }}</h4>
                                </div>
                                <button @click="openChat = false" class="text-gray-500 hover:text-white transition-colors flex items-center space-x-2 uppercase font-black text-xs">
                                    <span>Close_Terminal</span>
                                    <span class="text-2xl">×</span>
                                </button>
                            </div>

                            {{-- Message Area --}}
                            <div class="flex-1 overflow-y-auto p-8 space-y-6 chat-container bg-[url('https://www.transparenttextures.com/patterns/carbon-fibre.png')]">
                                @forelse($project->messages as $msg)
                                    <div class="flex {{ $msg->user_id == auth()->id() ? 'justify-end' : 'justify-start' }}">
                                        <div class="max-w-3xl {{ $msg->user_id == auth()->id() ? 'bg-purple-600/10 border-r-4 border-purple-500' : 'bg-gray-800/30 border-l-4 border-cyan-500' }} p-6 rounded-lg shadow-2xl backdrop-blur-sm">
                                            <div class="flex items-center justify-between mb-2 space-x-12">
                                                <span class="text-[10px] font-black uppercase {{ $msg->user_id == auth()->id() ? 'text-purple-400' : 'text-cyan-400' }}">
                                                    {{ $msg->user->name }} // {{ $msg->user->role }}
                                                </span>
                                                <span class="text-[9px] text-gray-600">{{ $msg->created_at->format('d/m/Y H:i:s') }}</span>
                                            </div>
                                            <p class="text-sm text-gray-200 leading-relaxed">{{ $msg->content }}</p>
                                            @if($msg->attachment)
                                                <div class="mt-4 border border-white/5 rounded overflow-hidden">
                                                    <img src="{{ asset('storage/'.$msg->attachment) }}" class="max-h-[500px] w-full object-contain bg-black/50">
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                @empty
                                    <div class="h-full flex flex-col items-center justify-center opacity-20 italic uppercase tracking-[0.5em] text-gray-500">
                                        <p>No_Data_Exchange_Logged</p>
                                    </div>
                                @endforelse
                            </div>

                            {{-- Input Area --}}
                            <div class="p-8 bg-gray-900/50 border-t border-purple-500/30">
                                <form action="{{ route('messages.store') }}" method="POST" enctype="multipart/form-data" class="max-w-5xl mx-auto">
                                    @csrf
                                    <input type="hidden" name="project_id" value="{{ $project->id }}">
                                    <div class="relative group">
                                        <textarea name="content" rows="3" placeholder="Input command or message..." 
                                            class="w-full bg-black border-gray-800 text-white rounded-xl p-4 text-sm focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all pr-32 resize-none"></textarea>
                                        
                                        <div class="absolute right-4 bottom-4 flex items-center space-x-4">
                                            <label class="cursor-pointer text-gray-500 hover:text-cyan-400 transition-colors">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                </svg>
                                                <input type="file" name="attachment" class="hidden" accept="image/*">
                                            </label>
                                            <button type="submit" class="bg-purple-600 hover:bg-purple-500 text-white px-6 py-2 rounded-lg font-black uppercase text-xs tracking-widest transition-all">
                                                Execute_Send
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>