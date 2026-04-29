<x-app-layout>
    <div class="py-12 bg-gray-100">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h1 class="text-2xl font-bold mb-6">Painel de Controle de Projetos</h1>
            
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <table class="w-full text-left">
                    <thead>
                        <tr class="border-b">
                            <th class="pb-3">Cliente</th>
                            <th class="pb-3">Projeto</th>
                            <th class="pb-3">Progresso (%)</th>
                            <th class="pb-3">Status Atual</th>
                            <th class="pb-3">Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($projects as $project)
                        <tr class="border-b">
                            <td class="py-4">{{ $project->user->name }}</td>
                            <td>{{ $project->name }}</td>
                            <form action="{{ route('admin.projects.update', $project) }}" method="POST">
                                @csrf
                                <td><input type="number" name="progress" value="{{ $project->progress }}" class="w-20 border-gray-300 rounded"></td>
                                <td><input type="text" name="status" value="{{ $project->status }}" class="border-gray-300 rounded text-sm"></td>
                                <td><button class="bg-blue-600 text-white px-3 py-1 rounded text-xs">SALVAR</button></td>
                            </form>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>