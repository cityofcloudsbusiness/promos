@extends('layouts.admin')

@section('title', 'Solicitações de Acesso')
@section('page-title', 'Solicitações de Acesso')
@section('page-subtitle', 'Aprove ou rejeite pedidos de alunos')

@section('header-actions')
    @if($pendingCount > 0)
        <span class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-amber-100 text-amber-700 rounded-lg text-sm font-medium">
            <span class="w-2 h-2 bg-amber-500 rounded-full animate-pulse"></span>
            {{ $pendingCount }} pendente(s)
        </span>
    @endif
@endsection

@section('content')

    {{-- Pendentes --}}
    <div class="bg-white rounded-2xl border border-slate-200 overflow-hidden mb-8">
        <div class="px-6 py-4 border-b border-slate-100 flex items-center justify-between">
            <h2 class="font-semibold text-slate-800">Aguardando aprovação</h2>
            <span class="text-sm text-slate-400">{{ $pending->total() }} solicitação(ões)</span>
        </div>

        @if($pending->isEmpty())
            <div class="px-6 py-12 text-center text-slate-400">
                <p class="text-4xl mb-3">✅</p>
                <p class="font-medium text-slate-600">Nenhuma solicitação pendente</p>
                <p class="text-sm mt-1">Todas as solicitações foram processadas.</p>
            </div>
        @else
            <div class="divide-y divide-slate-100">
                @foreach($pending as $req)
                    <div class="px-6 py-4 flex items-center gap-4 hover:bg-slate-50 transition">

                        {{-- Avatar --}}
                        <div class="w-10 h-10 rounded-full bg-indigo-100 flex items-center justify-center text-sm font-bold text-indigo-700 shrink-0">
                            {{ strtoupper(substr($req->user->name, 0, 1)) }}
                        </div>

                        {{-- Info --}}
                        <div class="flex-1 min-w-0">
                            <p class="font-medium text-slate-800 text-sm">{{ $req->user->name }}</p>
                            <p class="text-xs text-slate-400">{{ $req->user->email }}</p>
                        </div>

                        {{-- Tipo + item --}}
                        <div class="hidden sm:block flex-1 min-w-0">
                            <span class="inline-block text-[11px] font-semibold px-2 py-0.5 rounded-full mb-1
                                {{ $req->course_id ? 'bg-indigo-100 text-indigo-700' : 'bg-violet-100 text-violet-700' }}">
                                {{ $req->subjectType() }}
                            </span>
                            <p class="text-sm text-slate-700 truncate">{{ $req->subjectName() }}</p>
                        </div>

                        {{-- Mensagem --}}
                        @if($req->message)
                            <div class="hidden md:block flex-1 min-w-0">
                                <p class="text-xs text-slate-500 italic truncate">"{{ $req->message }}"</p>
                            </div>
                        @endif

                        {{-- Data --}}
                        <p class="hidden lg:block text-xs text-slate-400 whitespace-nowrap">
                            {{ $req->created_at->diffForHumans() }}
                        </p>

                        {{-- Ações --}}
                        <div class="flex items-center gap-2 shrink-0">
                            <form method="POST" action="{{ route('admin.access-requests.approve', $req) }}">
                                @csrf @method('PATCH')
                                <button type="submit"
                                        class="px-3 py-1.5 bg-emerald-600 text-white rounded-lg text-xs font-medium hover:bg-emerald-700 transition">
                                    ✓ Aprovar
                                </button>
                            </form>
                            <form method="POST" action="{{ route('admin.access-requests.reject', $req) }}"
                                  onsubmit="return confirm('Rejeitar solicitação de {{ addslashes($req->user->name) }}?')">
                                @csrf @method('PATCH')
                                <button type="submit"
                                        class="px-3 py-1.5 bg-slate-100 text-slate-600 rounded-lg text-xs font-medium hover:bg-red-100 hover:text-red-700 transition">
                                    ✕ Rejeitar
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>

            @if($pending->hasPages())
                <div class="px-6 py-4 border-t border-slate-100">
                    {{ $pending->links() }}
                </div>
            @endif
        @endif
    </div>

    {{-- Histórico recente --}}
    @if($recent->isNotEmpty())
        <div class="bg-white rounded-2xl border border-slate-200 overflow-hidden">
            <div class="px-6 py-4 border-b border-slate-100">
                <h2 class="font-semibold text-slate-800">Histórico recente</h2>
            </div>
            <div class="divide-y divide-slate-100">
                @foreach($recent as $req)
                    <div class="px-6 py-3.5 flex items-center gap-4 opacity-80">
                        <div class="w-8 h-8 rounded-full bg-slate-100 flex items-center justify-center text-xs font-bold text-slate-500 shrink-0">
                            {{ strtoupper(substr($req->user->name, 0, 1)) }}
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="text-sm text-slate-700 truncate">
                                <span class="font-medium">{{ $req->user->name }}</span>
                                — {{ $req->subjectName() }}
                            </p>
                        </div>
                        <span class="text-xs px-2 py-0.5 rounded-full font-medium
                            {{ $req->status === 'approved' ? 'bg-emerald-100 text-emerald-700' : 'bg-red-100 text-red-700' }}">
                            {{ $req->status === 'approved' ? '✓ Aprovado' : '✕ Rejeitado' }}
                        </span>
                        <p class="text-xs text-slate-400 whitespace-nowrap hidden sm:block">
                            {{ $req->reviewed_at?->diffForHumans() }}
                        </p>
                    </div>
                @endforeach
            </div>
        </div>
    @endif

@endsection
