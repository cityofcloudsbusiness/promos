<x-app-layout>
    <div class="flex justify-between items-center mb-8">
    <h1 class="text-3xl font-extrabold text-white tracking-tight">
        Painel <span class="text-purple-500 uppercase">Master</span>
    </h1>
    <div class="flex gap-4">
        <a href="{{ route('admin.projects.index') }}" class="text-xs font-bold text-purple-500 border-b-2 border-purple-500 pb-1">PROJETOS</a>
        <a href="{{ route('admin.users.index') }}" class="text-xs font-bold text-gray-500 hover:text-purple-400 transition">GERENCIAR EQUIPE</a>
    </div>
</div>
    <div class="py-12 bg-gray-900 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-between items-center mb-8">
                <h1 class="text-3xl font-extrabold text-white tracking-tight">
                    Painel de Controle <span class="text-purple-500">Admin</span>
                    <a href="{{ route('admin.users.index') }}" class="text-purple-500 font-bold underline">GERENCIAR EQUIPE (CRIAR PROGRAMADORES)</a>
                </h1>
                <div class="text-gray-400 text-sm">
                    Gestão Centralizada de Projetos e Colaboradores
                </div>
            </div>
            
            <div class="bg-gray-800 overflow-hidden shadow-2xl sm:rounded-xl border border-gray-700">
                <div class="p-6 overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="text-purple-400 uppercase text-xs tracking-wider border-b border-gray-700">
                                <th class="pb-4 px-4 font-semibold">Cliente / Projeto</th>
                                <th class="pb-4 px-4 font-semibold">Progresso (%)</th>
                                <th class="pb-4 px-4 font-semibold">Status</th>
                                <th class="pb-4 px-4 font-semibold">Link Preview</th>
                                <th class="pb-4 px-4 font-semibold">Colaborador</th>
                                <th class="pb-4 px-4 font-semibold text-center">Ações</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-700/50">
                            @foreach($projects as $project)
                            <tr class="hover:bg-gray-750 transition-colors duration-150">
                                <form action="{{ route('admin.projects.update', $project) }}" method="POST">
                                    @csrf
                                    <td class="py-4 px-4">
                                        <div class="text-white font-medium">{{ $project->user->name }}</div>
                                        <div class="text-gray-500 text-xs">{{ $project->name }}</div>
                                    </td>
                                    
                                    <td class="py-4 px-4">
                                        <input type="number" name="progress" value="{{ $project->progress }}" 
                                            class="w-20 bg-gray-900 border-gray-600 text-cyan-400 rounded-lg focus:ring-purple-500 focus:border-purple-500 transition shadow-inner">
                                    </td>

                                    <td class="py-4 px-4">
                                        <input type="text" name="status" value="{{ $project->status }}" 
                                            class="w-full bg-gray-900 border-gray-600 text-white text-sm rounded-lg focus:ring-purple-500 focus:border-purple-500">
                                    </td>

                                    <td class="py-4 px-4">
                                        <input type="text" name="preview_url" value="{{ $project->preview_url }}" placeholder="https://..."
                                            class="w-full bg-gray-900 border-gray-600 text-gray-300 text-xs rounded-lg focus:ring-purple-500 focus:border-purple-500">
                                    </td>

                                    <td class="py-4 px-4">
                                        <select name="employee_id" class="w-full bg-gray-900 border-gray-600 text-xs text-gray-300 rounded-lg focus:ring-purple-500 focus:border-purple-500">
                                            <option value="">Sem responsável</option>
                                            @foreach($employees as $emp)
                                                <option value="{{ $emp->id }}" {{ $project->employee_id == $emp->id ? 'selected' : '' }}>
                                                    {{ $emp->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </td>

                                    <td class="py-4 px-4 text-center">
                                        <button type="submit" class="bg-purple-600 hover:bg-purple-700 text-white font-bold py-2 px-4 rounded-lg text-xs transition duration-200 transform hover:scale-105 shadow-lg shadow-purple-900/20">
                                            SALVAR
                                        </button>
                                    </td>
                                </form>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    
                    @if($projects->isEmpty())
                        <div class="text-center py-12">
                            <p class="text-gray-500 italic">Nenhum projeto encontrado para gestão no momento.</p>
                        </div>
                    @endif
                </div>
            </div>

            <div class="mt-6 p-4 bg-purple-900/20 border border-purple-500/30 rounded-lg">
                <p class="text-purple-300 text-xs leading-relaxed">
                    <strong>Dica Admin:</strong> Se o projeto possuir tarefas detalhadas na coluna <code>steps</code> (JSON), o sistema priorizará o cálculo automático do progresso no Dashboard do cliente.
                </p>
            </div>
        </div>
    </div>
</x-app-layout>