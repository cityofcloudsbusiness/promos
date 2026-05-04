<x-app-layout>
    <style>
        .chat-container::-webkit-scrollbar { width: 4px; }
        .chat-container::-webkit-scrollbar-thumb { background: #dc2626; border-radius: 10px; }
    </style>

    <div class="py-20 bg-[#050505] min-h-screen text-gray-200 font-mono">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-between items-end mb-12 border-b-2 border-red-600/20 pb-6">
                <div class="relative">
                    <div class="absolute -top-4 -left-4 w-12 h-12 bg-red-600/10 blur-xl"></div>
                    <h1 class="text-4xl font-black tracking-tighter uppercase italic">
                        <span class="text-white">User</span> <span class="text-transparent bg-clip-text bg-gradient-to-r from-purple-500 to-red-600">COMMAND</span>
                    </h1>
                    <p class="text-[10px] text-gray-500 mt-1 uppercase tracking-[0.5em]">Auth Level: Super_User_Root</p>
                </div>
                <a href="{{ route('admin.projects.index') }}" class="text-[10px] font-bold border border-red-500/50 px-6 py-2 text-red-500 hover:bg-red-500 hover:text-white transition-all shadow-[0_0_15px_rgba(239,68,68,0.1)]">
                    <span class="mr-2"> < </span> RETURN_TO_SYSTEM
                </a>
            </div>

            <div class="grid grid-cols-1 xl:grid-cols-4 gap-8">
                <div class="xl:col-span-1 border-l-2 border-purple-500 bg-gray-900/30 p-6 rounded-r-2xl">
                    <h3 class="text-purple-500 text-xs mb-6 uppercase tracking-widest font-black flex items-center">
                        <span class="w-4 h-[1px] bg-purple-500 mr-2"></span> Deploy New Agent
                    </h3>
                    <form action="{{ route('admin.users.store') }}" method="POST" class="space-y-4">
                        @csrf
                        <div>
                            <label class="text-[9px] text-gray-500 mb-1 block">IDENTIFICATION_NAME</label>
                            <input type="text" name="name" class="w-full bg-black border-gray-800 text-white rounded-md text-xs focus:ring-red-500 p-3">
                        </div>
                        <div>
                            <label class="text-[9px] text-gray-500 mb-1 block">EMAIL_ADDRESS</label>
                            <input type="email" name="email" class="w-full bg-black border-gray-800 text-white rounded-md text-xs focus:ring-red-500 p-3">
                        </div>
                        <div>
                            <label class="text-[9px] text-gray-500 mb-1 block">ACCESS_KEY</label>
                            <input type="password" name="password" class="w-full bg-black border-gray-800 text-white rounded-md text-xs focus:ring-red-500 p-3">
                        </div>
                        <div>
                            <label class="text-[9px] text-gray-500 mb-1 block">SECURITY_ROLE</label>
                            <select name="role" class="w-full bg-black border-gray-800 text-white rounded-md text-xs focus:ring-purple-500 p-3 uppercase">
                                <option value="employee">PROGRAMADOR (Staff)</option>
                                <option value="client">CLIENTE (User)</option>
                            </select>
                        </div>
                        <button type="submit" class="w-full bg-gradient-to-r from-purple-600 to-red-600 hover:from-purple-500 hover:to-red-500 text-white font-black py-4 rounded-md text-[10px] uppercase tracking-widest transition">
                            CONFIRM_DEPLOYMENT
                        </button>
                    </form>
                </div>

                <div class="xl:col-span-3">
                    <div class="bg-gray-900/50 border border-white/5 rounded-2xl overflow-hidden backdrop-blur-md">
                        <table class="w-full text-left">
                            <thead class="bg-black/50 text-gray-500 text-[10px] uppercase font-bold tracking-[0.2em]">
                                <tr>
                                    <th class="p-5">Agent_ID</th>
                                    <th class="p-5">Network_Access</th>
                                    <th class="p-5">Permission_Level</th>
                                    <th class="p-5 text-right">Action</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-white/5">
                                @foreach($users as $user)
                                <tr class="hover:bg-purple-600/[0.03] transition">
                                    <td class="p-5">
                                        <div class="text-white font-bold">{{ $user->name }}</div>
                                        <div class="text-[9px] text-red-500/50">UUID: {{ 1000 + $user->id }}</div>
                                    </td>
                                    <td class="p-5 text-gray-400 text-xs">{{ $user->email }}</td>
                                    <td class="p-5">
                                        <span class="px-3 py-1 rounded-full text-[9px] font-black border {{ $user->role === 'employee' ? 'border-purple-500/50 text-purple-400 bg-purple-500/10' : 'border-green-500/50 text-green-400 bg-green-500/10' }}">
                                            // {{ strtoupper($user->role) }}
                                        </span>
                                    </td>
                                    <td class="p-5 text-right flex justify-end space-x-2" x-data="{ openUserChat: false }">
                                        @if($user->role === 'client' && $user->project)
                                            <button @click="openUserChat = true" class="border border-green-500/50 px-3 py-1 text-[9px] font-black text-green-400 hover:bg-green-500 hover:text-white transition uppercase">
                                                CLIENT_CHAT
                                            </button>

                                            <div x-show="openUserChat" class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/80 backdrop-blur-sm text-left" x-cloak x-transition>
                                                <div @click.away="openUserChat = false" class="bg-[#050505] border border-green-500/30 w-full max-w-lg rounded-xl overflow-hidden shadow-[0_0_50px_rgba(34,197,94,0.1)]">
                                                    <div class="bg-green-900/20 p-4 border-b border-green-500/30 flex justify-between items-center font-black">
                                                        <h4 class="text-green-400 text-[10px] uppercase tracking-widest">Direct_Comms: {{ $user->name }}</h4>
                                                        <button @click="openUserChat = false" class="text-gray-500 hover:text-white text-xl">✕</button>
                                                    </div>
                                                    <div class="h-80 overflow-y-auto p-4 space-y-4 chat-container bg-black/40">
                                                        @forelse($user->project->messages as $msg)
                                                            <div class="flex {{ $msg->user_id == auth()->id() ? 'justify-end' : 'justify-start' }}">
                                                                <div class="max-w-[85%] {{ $msg->user_id == auth()->id() ? 'bg-green-600/20 border-r-2 border-green-500' : 'bg-gray-800/40 border-l-2 border-purple-500' }} p-3 rounded">
                                                                    <p class="text-[7px] uppercase font-bold mb-1 {{ $msg->user_id == auth()->id() ? 'text-green-400' : 'text-purple-400' }}">
                                                                        {{ $msg->user->name }} • {{ $msg->created_at->format('H:i') }}
                                                                    </p>
                                                                    <p class="text-xs text-gray-200">{{ $msg->content }}</p>
                                                                </div>
                                                            </div>
                                                        @empty
                                                            <p class="text-center text-[9px] text-gray-600 uppercase mt-20 italic">Awaiting_contact...</p>
                                                        @endforelse
                                                    </div>
                                                    <form action="{{ route('messages.store') }}" method="POST" enctype="multipart/form-data" class="p-4 border-t border-green-500/30">
                                                        @csrf
                                                        <input type="hidden" name="project_id" value="{{ $user->project->id }}">
                                                        <textarea name="content" placeholder="Transmit_message..." class="w-full bg-gray-900 border-gray-800 text-white rounded text-xs p-2 mb-2 focus:ring-green-500 resize-none"></textarea>
                                                        <div class="flex justify-between items-center">
                                                            <input type="file" name="attachment" class="text-[9px] text-gray-500">
                                                            <button type="submit" class="bg-green-600 text-white text-[9px] font-black px-4 py-2 rounded hover:bg-green-500 uppercase tracking-widest">Transmit</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        @endif

                                        <form action="{{ route('admin.users.destroy', $user) }}" method="POST" onsubmit="return confirm('PERMANENT DELETE?')">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="bg-black border border-red-500/50 px-3 py-1 text-[9px] font-black text-red-500 hover:bg-red-500 hover:text-white transition uppercase">
                                                TERMINATE
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>