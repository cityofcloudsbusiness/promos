@extends('layouts.admin')

@section('title', 'Editar Aula')
@section('page-title', 'Editar Aula')
@section('page-subtitle', $lesson->title)

@section('header-actions')
    <a href="{{ route('admin.courses.show', $course) }}" class="text-sm text-slate-500 hover:text-slate-700">← Voltar</a>
@endsection

@section('content')
    <div class="max-w-2xl">
        @include('admin.lessons._form', [
            'method' => 'POST',
            'action' => route('admin.courses.modules.lessons.update', [$course, $module, $lesson]),
            'patch'  => true,
            'lesson' => $lesson,
        ])
    </div>
@endsection
