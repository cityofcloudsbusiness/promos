@extends('layouts.empresa')

@section('title', 'Treinamentos · ' . $empresa->nome)
@section('page-title', 'Treinamentos')
@section('page-subtitle', 'Cursos liberados para os colaboradores')

@section('content')

@if($empresa->cursoAcessos->isEmpty())
    <div class="bg-[#0d1526] border border-[#1a2844] rounded-2xl px-6 py-16 text-center">
        <div class="w-12 h-12 rounded-full bg-slate-800 flex items-center justify-center mx-auto mb-4">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#475569" stroke-width="1.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147a60.438 60.438 0 00-.491 6.347A48.62 48.62 0 0112 20.904a48.62 48.62 0 018.232-4.41 60.46 60.46 0 00-.491-6.347m-15.482 0a50.636 50.636 0 00-2.658-.813A59.906 59.906 0 0112 3.493a59.903 59.903 0 0110.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.717 50.717 0 0112 13.489a50.702 50.702 0 017.74-3.342M6.75 15a.75.75 0 100-1.5.75.75 0 000 1.5zm0 0v-3.675A55.378 55.378 0 0112 8.443m-7.007 11.55A5.981 5.981 0 006.75 15.75v-1.5"/>
            </svg>
        </div>
        <p class="text-slate-400 text-sm font-medium">Nenhum curso liberado</p>
        <p class="text-slate-600 text-xs mt-1">Entre em contato com a equipe City of Clouds para liberar cursos para sua empresa.</p>
        <a href="{{ route('empresa.comunicacao') }}" class="inline-flex items-center gap-1.5 mt-4 px-4 py-2 bg-blue-600/20 border border-blue-500/30 text-blue-400 rounded-xl text-xs font-medium hover:bg-blue-600/30 transition">
            Falar com agente →
        </a>
    </div>
@else
    <div class="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 gap-4">
        @foreach($empresa->cursoAcessos as $acesso)
            <div class="bg-[#0d1526] border border-[#1a2844] rounded-2xl overflow-hidden hover:border-violet-500/30 transition-all group">
                @if($acesso->course?->thumbnail)
                    <img src="{{ Storage::url($acesso->course->thumbnail) }}" alt="{{ $acesso->course->title }}" class="w-full h-36 object-cover">
                @else
                    <div class="w-full h-36 bg-gradient-to-br from-violet-900/30 to-indigo-900/30 flex items-center justify-center">
                        <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="#6d28d9" stroke-width="1.25">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147a60.438 60.438 0 00-.491 6.347A48.62 48.62 0 0112 20.904a48.62 48.62 0 018.232-4.41 60.46 60.46 0 00-.491-6.347m-15.482 0a50.636 50.636 0 00-2.658-.813A59.906 59.906 0 0112 3.493a59.903 59.903 0 0110.399 5.84c-.896.248-1.783.52-2.658.814"/>
                        </svg>
                    </div>
                @endif
                <div class="p-4">
                    <h3 class="text-sm font-semibold text-white group-hover:text-violet-300 transition truncate">
                        {{ $acesso->course?->title ?? 'Curso sem título' }}
                    </h3>
                    @if($acesso->course?->area)
                        <p class="text-xs text-slate-500 mt-0.5">{{ $acesso->course->area }}</p>
                    @endif
                    <div class="flex items-center justify-between mt-3">
                        <div class="flex items-center gap-1.5">
                            @if($acesso->slots_total > 0)
                                <span class="text-[10px] text-slate-500">{{ $acesso->slots_total }} vagas</span>
                            @else
                                <span class="text-[10px] text-slate-500">Vagas ilimitadas</span>
                            @endif
                        </div>
                        @if($acesso->expires_at)
                            <span class="text-[10px] {{ $acesso->isAtivo() ? 'text-emerald-500' : 'text-red-500' }}">
                                {{ $acesso->isAtivo() ? 'Válido até ' . $acesso->expires_at->format('d/m/Y') : 'Expirado' }}
                            </span>
                        @else
                            <span class="text-[10px] text-emerald-500">Sem expiração</span>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endif

@endsection
