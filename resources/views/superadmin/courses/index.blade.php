@extends('layouts.superadmin')

@section('title', 'Gestão de Cursos')
@section('page-title', 'Gestão de Cursos')
@section('page-subtitle', 'Atribua professores e defina áreas de cada curso')

@section('header-actions')
    <a href="{{ route('admin.courses.create') }}"
       class="inline-flex items-center gap-2 px-4 py-2 bg-indigo-600 text-white rounded-lg text-sm font-medium hover:bg-indigo-700 transition">
        ➕ Novo Curso
    </a>
@endsection

@section('content')

    <div class="bg-white rounded-2xl border border-slate-200 overflow-hidden">
        <div class="px-6 py-4 border-b border-slate-100">
            <h2 class="font-semibold text-slate-800">{{ $courses->total() }} curso(s) cadastrado(s)</h2>
        </div>

        @if($courses->isEmpty())
            <div class="px-6 py-12 text-center text-slate-400">
                <p class="text-4xl mb-2">📚</p>
                <p>Nenhum curso ainda. <a href="{{ route('admin.courses.create') }}" class="text-indigo-600 hover:underline">Criar primeiro curso →</a></p>
            </div>
        @else
            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead>
                        <tr class="text-xs text-slate-500 uppercase tracking-wide bg-slate-50">
                            <th class="px-6 py-3 text-left">Curso</th>
                            <th class="px-6 py-3 text-center">Status</th>
                            <th class="px-6 py-3 text-center">Matrículas</th>
                            <th class="px-6 py-3 text-left w-64">Professor Responsável</th>
                            <th class="px-6 py-3 text-left w-48">Área</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @foreach($courses as $course)
                            <tr class="hover:bg-slate-50 transition" x-data="{ editingProf: false, editingArea: false }">

                                {{-- Curso --}}
                                <td class="px-6 py-4">
                                    <a href="{{ route('admin.courses.show', $course) }}"
                                       class="font-medium text-slate-800 hover:text-indigo-600 transition">
                                        {{ $course->title }}
                                    </a>
                                </td>

                                {{-- Status --}}
                                <td class="px-6 py-4 text-center">
                                    @php
                                        $sc = ['draft'=>'bg-slate-100 text-slate-600','published'=>'bg-emerald-100 text-emerald-700','archived'=>'bg-amber-100 text-amber-700'];
                                        $sl = ['draft'=>'Rascunho','published'=>'Publicado','archived'=>'Arquivado'];
                                    @endphp
                                    <span class="px-2 py-0.5 rounded-full text-xs font-medium {{ $sc[$course->status] }}">
                                        {{ $sl[$course->status] }}
                                    </span>
                                </td>

                                {{-- Matrículas --}}
                                <td class="px-6 py-4 text-center text-slate-500">{{ $course->enrollments_count }}</td>

                                {{-- Professor --}}
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-2">
                                        @if($course->instructor)
                                            <span class="text-xs text-slate-600 font-medium">{{ $course->instructor->name }}</span>
                                        @else
                                            <span class="text-xs text-red-400 font-medium">⚠️ Sem professor</span>
                                        @endif

                                        <button type="button"
                                                onclick="toggleForm('prof-{{ $course->id }}')"
                                                class="text-xs text-indigo-500 hover:text-indigo-700 transition ml-1">✏️</button>
                                    </div>

                                    <form id="prof-{{ $course->id }}" method="POST"
                                          action="{{ route('superadmin.courses.updateInstructor', $course) }}"
                                          class="hidden mt-2 flex gap-2 items-center">
                                        @csrf @method('PATCH')
                                        <select name="instructor_id"
                                                class="flex-1 px-3 py-1.5 border border-slate-300 rounded-lg text-xs focus:outline-none focus:ring-2 focus:ring-indigo-500">
                                            @foreach($professors as $prof)
                                                <option value="{{ $prof->id }}"
                                                    {{ $course->instructor_id === $prof->id ? 'selected' : '' }}>
                                                    {{ $prof->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <button type="submit"
                                                class="px-3 py-1.5 bg-indigo-600 text-white rounded-lg text-xs hover:bg-indigo-700 transition">
                                            ✓
                                        </button>
                                        <button type="button" onclick="toggleForm('prof-{{ $course->id }}')"
                                                class="px-3 py-1.5 bg-slate-100 text-slate-600 rounded-lg text-xs hover:bg-slate-200 transition">
                                            ✕
                                        </button>
                                    </form>
                                </td>

                                {{-- Área --}}
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-2">
                                        <span class="text-xs text-slate-600">{{ $course->area ?? '—' }}</span>
                                        <button type="button"
                                                onclick="toggleForm('area-{{ $course->id }}')"
                                                class="text-xs text-indigo-500 hover:text-indigo-700 transition">✏️</button>
                                    </div>

                                    <form id="area-{{ $course->id }}" method="POST"
                                          action="{{ route('superadmin.courses.updateArea', $course) }}"
                                          class="hidden mt-2 flex gap-2 items-center">
                                        @csrf @method('PATCH')
                                        <input type="text" name="area" value="{{ $course->area }}"
                                               placeholder="Ex: Gestão de Pessoas"
                                               class="flex-1 px-3 py-1.5 border border-slate-300 rounded-lg text-xs focus:outline-none focus:ring-2 focus:ring-indigo-500">
                                        <button type="submit"
                                                class="px-3 py-1.5 bg-indigo-600 text-white rounded-lg text-xs hover:bg-indigo-700 transition">
                                            ✓
                                        </button>
                                        <button type="button" onclick="toggleForm('area-{{ $course->id }}')"
                                                class="px-3 py-1.5 bg-slate-100 text-slate-600 rounded-lg text-xs hover:bg-slate-200 transition">
                                            ✕
                                        </button>
                                    </form>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="px-6 py-4 border-t border-slate-100">
                {{ $courses->links() }}
            </div>
        @endif
    </div>

    <script>
    function toggleForm(id) {
        var el = document.getElementById(id);
        el.classList.toggle('hidden');
        el.classList.toggle('flex');
    }
    </script>

@endsection
