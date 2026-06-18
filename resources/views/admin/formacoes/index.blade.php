@extends('layouts.admin')

@section('title', 'Minhas Formações')
@section('page-title', 'Formações')
@section('page-subtitle', 'Trilhas completas que agrupam múltiplos cursos')

@section('header-actions')
    <a href="{{ route('admin.formacoes.create') }}"
       class="inline-flex items-center gap-2 px-4 py-2 bg-indigo-600 text-white rounded-lg text-sm font-medium hover:bg-indigo-700 transition">
        ➕ Nova Formação
    </a>
@endsection

@section('content')

    @if($formacoes->isEmpty())
        <div class="bg-white rounded-2xl border border-slate-200 px-6 py-16 text-center">
            <p class="text-5xl mb-4">🎓</p>
            <h3 class="text-lg font-semibold text-slate-700 mb-2">Nenhuma formação criada ainda</h3>
            <p class="text-slate-500 text-sm mb-6">Crie trilhas de aprendizagem agrupando seus cursos.</p>
            <a href="{{ route('admin.formacoes.create') }}"
               class="inline-flex items-center gap-2 px-5 py-2.5 bg-indigo-600 text-white rounded-xl text-sm font-medium hover:bg-indigo-700 transition">
                Criar primeira formação →
            </a>
        </div>
    @else
        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-5">
            @foreach($formacoes as $formacao)
                <div class="bg-white rounded-2xl border border-slate-200 overflow-hidden hover:shadow-md transition flex flex-col">
                    @if($formacao->thumbnail)
                        <img src="{{ Storage::url($formacao->thumbnail) }}" alt="{{ $formacao->title }}"
                             class="w-full h-36 object-cover">
                    @else
                        <div class="w-full h-36 relative overflow-hidden"
                             style="background: linear-gradient(135deg, #312e81 0%, #4c1d95 100%);">
                            <div class="absolute inset-0 flex items-center justify-center opacity-30 text-5xl">🎓</div>
                        </div>
                    @endif

                    <div class="p-5 flex-1 flex flex-col">
                        <div class="flex items-center gap-2 mb-2">
                            @php
                                $sc = ['draft'=>'bg-slate-100 text-slate-500','published'=>'bg-emerald-100 text-emerald-700','archived'=>'bg-amber-100 text-amber-700'];
                                $sl = ['draft'=>'Rascunho','published'=>'Publicado','archived'=>'Arquivado'];
                            @endphp
                            <span class="text-xs font-medium px-2 py-0.5 rounded-full {{ $sc[$formacao->status] }}">{{ $sl[$formacao->status] }}</span>
                            @if($formacao->area)
                                <span class="text-xs text-indigo-600 font-medium">{{ $formacao->area }}</span>
                            @endif
                        </div>
                        <h3 class="font-semibold text-slate-900 mb-1 leading-snug">{{ $formacao->title }}</h3>
                        <p class="text-xs text-slate-400 mb-3 flex-1 line-clamp-2">{{ $formacao->description }}</p>
                        <p class="text-xs text-slate-400 mb-4">{{ $formacao->courses_count }} curso(s) vinculado(s)</p>

                        <div class="flex items-center gap-2">
                            <a href="{{ route('admin.formacoes.show', $formacao) }}"
                               class="flex-1 text-center py-2 px-3 bg-slate-50 hover:bg-slate-100 text-slate-700 rounded-xl text-xs font-medium transition">
                                Ver
                            </a>
                            <a href="{{ route('admin.formacoes.edit', $formacao) }}"
                               class="flex-1 text-center py-2 px-3 bg-indigo-50 hover:bg-indigo-100 text-indigo-700 rounded-xl text-xs font-medium transition">
                                Editar
                            </a>
                            <form method="POST" action="{{ route('admin.formacoes.destroy', $formacao) }}"
                                  onsubmit="return confirm('Excluir a formação \'{{ addslashes($formacao->title) }}\'?')">
                                @csrf @method('DELETE')
                                <button type="submit"
                                        class="py-2 px-3 bg-red-50 hover:bg-red-100 text-red-600 rounded-xl text-xs font-medium transition">
                                    🗑
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        @if($formacoes->hasPages())
            <div class="mt-6">{{ $formacoes->links() }}</div>
        @endif
    @endif

@endsection
