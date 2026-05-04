<x-app-layout>
    <div class="py-12 bg-gray-900 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 text-white font-mono">

            <div class="flex justify-between items-center mb-8 border-b border-purple-500/30 pb-4">
                <h1 class="text-3xl font-extrabold tracking-tighter">
                    COMANDO DE <span class="text-purple-500 underline">USUÁRIOS</span>
                </h1>
                <a href="{{ route('admin.projects.index') }}" class="text-xs bg-gray-800 border border-purple-500 px-4 py-2 hover:bg-purple-500 transition">VOLTAR PARA PROJETOS</a>
            </div>

            <div class="bg-black/50 border border-purple-500/20 p-6 rounded-xl mb-8">
                <h3 class="text-purple-400 text-xs mb-4 uppercase tracking-widest font-bold">Cadastrar Novo Agente</h3>
                <form action="{{ route('admin.users.store') }}" method="POST" class="grid grid-cols-1 md:grid-cols-5 gap-4">
                    @csrf
                    <input type="text" name="name" placeholder="NOME" class="bg-gray-900 border-gray-700 text-white rounded text-xs focus:border-purple-500">
                    <input type="email" name="email" placeholder="EMAIL" class="bg-gray-900 border-gray-700 text-white rounded text-xs focus:border-purple-500">
                    <input type="password" name="password" placeholder="SENHA" class="bg-gray-900 border-gray-700 text-white rounded text-xs focus:border-purple-500">
                    <select name="role" class="bg-gray-900 border-gray-700 text-white rounded text-xs focus:border-purple-500 uppercase">
                        <option value="employee">PROGRAMADOR (Staff)</option>
                        <option value="client">CLIENTE</option>
                    </select>
                    <button type="submit" class="bg-purple-600 hover:bg-purple-700 font-bold py-2 rounded text-xs transition shadow-lg shadow-purple-500/20">CADASTRAR</button>
                </form>
            </div>

            <div class="bg-gray-800 border border-gray-700 rounded-xl overflow-hidden shadow-2xl">
                <table class="w-full text-left">
                    <thead class="bg-gray-900/80 text-purple-400 text-[10px] uppercase">
                        <tr>
                            <th class="p-4">Identificação</th>
                            <th class="p-4">Acesso / E-mail</th>
                            <th class="p-4">Nível de Role</th>
                            <th class="p-4 text-center">Protocolo</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-700 text-xs">
                        @foreach($users as $user)
                        <tr class="hover:bg-purple-500/5 transition">
                            <td class="p-4 font-bold text-gray-200">{{ $user->name }}</td>
                            <td class="p-4 text-gray-400">{{ $user->email }}</td>
                            <td class="p-4">
                                <span class="px-2 py-1 rounded {{ $user->role === 'employee' ? 'bg-cyan-900 text-cyan-400 border border-cyan-500/50' : 'bg-green-900 text-green-400 border border-green-500/50' }}">
                                    {{ strtoupper($user->role) }}
                                </span>
                            </td>
                            <td class="p-4 text-center">
                            <td class="p-4 text-center">
                                <form action="{{ route('admin.users.destroy', $user) }}" method="POST" onsubmit="return confirm('Confirmar exclusão permanente deste agente?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-400 uppercase font-bold text-[10px] bg-red-900/20 px-3 py-1 border border-red-500/50 rounded hover:bg-red-500 hover:text-white transition">
                                        EXCLUIR
                                    </button>
                                </form>
                            </td>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>