@extends('layouts.admin')

@section('title', 'Editar: ' . $course->title)
@section('page-title', 'Editar Curso')
@section('page-subtitle', $course->title)

@section('header-actions')
    <a href="{{ route('admin.courses.show', $course) }}"
       class="text-sm text-slate-500 hover:text-slate-700 flex items-center gap-1">
        ← Voltar
    </a>
@endsection

@section('content')
    <div class="max-w-2xl">
        @include('admin.courses._form', [
            'method' => 'POST',
            'action' => route('admin.courses.update', $course),
            'patch'  => true,
            'course' => $course,
        ])
    </div>
@endsection
