<form method="{{ $method }}" action="{{ $action }}" enctype="multipart/form-data"
      class="bg-white rounded-2xl border border-slate-200 p-6 space-y-6">
    @csrf
    @isset($patch) @method('PATCH') @endisset

    @if($errors->any())
        <div class="p-4 bg-red-50 border border-red-200 rounded-xl text-sm text-red-700">
            <ul class="list-disc list-inside space-y-1">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div>
        <label class="block text-sm font-medium text-slate-700 mb-1.5">Título do Curso *</label>
        <input type="text" name="title" value="{{ old('title', $course->title ?? '') }}"
               class="w-full px-4 py-2.5 border border-slate-300 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500"
               placeholder="Ex: Liderança Corporativa Avançada" required>
    </div>

    <div>
        <label class="block text-sm font-medium text-slate-700 mb-1.5">Descrição</label>
        <textarea name="description" rows="4"
                  class="w-full px-4 py-2.5 border border-slate-300 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 resize-none"
                  placeholder="Descreva o conteúdo e objetivos do curso...">{{ old('description', $course->description ?? '') }}</textarea>
    </div>

    <div class="grid grid-cols-2 gap-4">
        <div>
            <label class="block text-sm font-medium text-slate-700 mb-1.5">Área / Categoria</label>
            <input type="text" name="area" value="{{ old('area', $course->area ?? '') }}"
                   class="w-full px-4 py-2.5 border border-slate-300 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500"
                   placeholder="Ex: Gestão de Pessoas">
        </div>
        <div>
            <label class="block text-sm font-medium text-slate-700 mb-1.5">Carga horária (h)</label>
            <input type="number" name="duration_hours" min="0"
                   value="{{ old('duration_hours', $course->duration_hours ?? 0) }}"
                   class="w-full px-4 py-2.5 border border-slate-300 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
        </div>
    </div>

    <div>
        <label class="block text-sm font-medium text-slate-700 mb-1.5">Status</label>
        <select name="status"
                class="w-full px-4 py-2.5 border border-slate-300 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
            <option value="draft"     {{ old('status', $course->status ?? '') === 'draft'     ? 'selected' : '' }}>Rascunho</option>
            <option value="published" {{ old('status', $course->status ?? '') === 'published' ? 'selected' : '' }}>Publicado</option>
            <option value="archived"  {{ old('status', $course->status ?? '') === 'archived'  ? 'selected' : '' }}>Arquivado</option>
        </select>
    </div>

    <div>
        <label class="block text-sm font-medium text-slate-700 mb-1.5">Capa do Curso</label>
        @isset($course)
            @if($course->thumbnail)
                <img src="{{ Storage::url($course->thumbnail) }}" alt="Capa atual"
                     class="w-full h-40 object-cover rounded-xl mb-3">
            @endif
        @endisset
        <input type="file" name="thumbnail" accept="image/*"
               class="w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-medium file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100">
        <p class="text-xs text-slate-400 mt-1">JPG, PNG ou WebP — máx. 2MB</p>
    </div>

    <div class="flex gap-3 pt-2">
        <button type="submit"
                class="px-6 py-2.5 bg-indigo-600 text-white rounded-xl text-sm font-medium hover:bg-indigo-700 transition">
            {{ isset($patch) ? '💾 Salvar Alterações' : '✅ Criar Curso' }}
        </button>
        <a href="{{ route('admin.courses.index') }}"
           class="px-6 py-2.5 bg-slate-100 text-slate-600 rounded-xl text-sm hover:bg-slate-200 transition">
            Cancelar
        </a>
    </div>
</form>
