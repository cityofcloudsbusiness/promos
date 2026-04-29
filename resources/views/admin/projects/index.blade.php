<x-app-layout>
    <div class="py-12 bg-gray-900 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-between items-center mb-8">
                <h1 class="text-3xl font-extrabold text-white tracking-tight">
                    Painel de Controle <span class="text-purple-500">Admin</span>
                </h1>
                <div class="text-gray-400 text-sm">
                    Gestão Centralizada de Projetos e Colaboradores
                </div>
            </div>
            
            <div class="bg-gray-800 overflow-hidden shadow-2xl sm:rounded-xl border border-gray-700">
                <div class="p-6">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="text-purple-400 uppercase text-xs tracking-wider border-b border-gray-700">
                                <th class="pb-4 px-4 font-semibold">Cliente / Projeto</th>
                                <th class="pb-4 px-4 font-semibold">Progresso</th>
                                <th class="pb-4 px-4 font-semibold">Status & Link</th>
                                <th class="pb-4 px-4 font-semibold">Colaborador</th>
                                <th class="pb-4 px-4 font-semibold text-center">Ações</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-300 divide-y divide-gray-700">
                            @foreach($projects as $project)
                            <tr class="hover:bg-gray-750 transition-colors">
                                <td class="py-5 px-4">
                                    <div class="font-bold text-white">{{ $project->user->name }}</div>
                                    <div class="text-sm text-gray-500">{{ $project->name }}</div>
                                </td>

                                <form action="{{ route('admin.projects.update', $project) }}" method="POST">
                                    @csrf
                                    <td class="py-5 px-4">
                                        <div class="flex items-center space-x-3">
                                            <input type="number" name="progress" value="{{ $project->progress }}" 
                                                class="w-16 bg-gray-900 border-gray-600 text-purple-400 rounded-lg text-sm focus:ring-purple-500 focus:border-purple-500">
                                            <span class="text-xs font-medium text-gray-500">%</span>
                                        </div>
                                        @if($project->steps)
                                            <div class="mt-1 text-[10px] text-green-500 italic">
                                                Cálculo dinâmico ativo via Steps
                                            </div>
                                        @endif
                                    </td>

                                    <td class="py-5 px-4">
                                        <div class="space-y-2">
                                            <input type="text" name="status" value="{{ $project->status }}" 
                                                placeholder="Ex: Design em curso"
                                                class="w-full bg-gray-900 border-gray-600 text-gray-300 rounded-lg text-xs focus:ring-purple-500 focus:border-purple-500">
                                            <input type="text" name="preview_url" value="{{ $project->preview_url }}" 
                                                placeholder="URL de visualização"
                                                class="w-full bg-gray-900 border-gray-600 text-gray-400 rounded-lg text-[10px] focus:ring-purple-500 focus:border-purple-500">
                                        </div>
                                    </td>

                                    <td class="py-5 px-4">
                                        <select name="employee_id" class="w-full bg-gray-900 border-gray-600 text-gray-300 rounded-lg text-xs focus:ring-purple-500">
                                            <option value="">Sem colaborador</option>
                                            @foreach($employees as $employee)
                                                <option value="{{ $employee->id }}" {{ $project->employee_id == $employee->id ? 'selected' : '' }}>
                                                    {{ $employee->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </td>

                                    <td class="py-5 px-4 text-center">
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
                    <strong>Dica Admin:</strong> Para atualizar os <strong>Steps</strong> (tarefas específicas), utilize uma ferramenta de banco de dados para editar a coluna <code>steps</code> com formato JSON: <code class="bg-black px-1 rounded">[{"task": "Design", "completed": true}]</code>. O sistema calculará a porcentagem automaticamente[cite: 13, 14].
                </p>
            </div>
        </div>
    </div>
</x-app-layout>