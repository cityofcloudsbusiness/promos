@extends('layouts.admin')

@section('title', 'Novo Curso')
@section('page-title', 'Criar Novo Curso')
@section('page-subtitle', 'Preencha as informações do curso')

@section('header-actions')
    <a href="{{ route('admin.courses.index') }}"
       class="text-sm text-slate-500 hover:text-slate-700 flex items-center gap-1">
        ← Voltar
    </a>
@endsection

@section('content')
    <div class="max-w-2xl">
        @include('admin.courses._form', ['method' => 'POST', 'action' => route('admin.courses.store')])
    </div>
@endsection
