<form method="{{ $method }}" action="{{ $action }}"
      class="bg-white rounded-2xl border border-slate-200 p-6 space-y-6">
    @csrf
    @isset($patch) @method('PATCH') @endisset

    @if($errors->any())
        <div class="p-4 bg-red-50 border border-red-200 rounded-xl text-sm text-red-700">
            <ul class="list-disc list-inside space-y-1">
                @foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach
            </ul>
        </div>
    @endif

    <div>
        <label class="block text-sm font-medium text-slate-700 mb-1.5">Título da Aula *</label>
        <input type="text" name="title" value="{{ old('title', $lesson->title ?? '') }}"
               class="w-full px-4 py-2.5 border border-slate-300 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500"
               placeholder="Ex: Introdução aos Fundamentos de Liderança" required>
    </div>

    <div>
        <label class="block text-sm font-medium text-slate-700 mb-1.5">Descrição / Objetivo</label>
        <textarea name="description" rows="3"
                  class="w-full px-4 py-2.5 border border-slate-300 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 resize-none"
                  placeholder="O que o aluno aprenderá nesta aula...">{{ old('description', $lesson->description ?? '') }}</textarea>
    </div>

    <div>
        <label class="block text-sm font-medium text-slate-700 mb-1.5">Tipo de Vídeo</label>
        <select name="video_type" id="video_type"
                class="w-full px-4 py-2.5 border border-slate-300 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
            <option value="youtube"  {{ old('video_type', $lesson->video_type ?? '') === 'youtube'  ? 'selected' : '' }}>▶️ YouTube (recomendado)</option>
            <option value="vimeo"    {{ old('video_type', $lesson->video_type ?? '') === 'vimeo'    ? 'selected' : '' }}>🎬 Vimeo</option>
            <option value="local"    {{ old('video_type', $lesson->video_type ?? '') === 'local'    ? 'selected' : '' }}>📁 Armazenamento Local</option>
            <option value="external" {{ old('video_type', $lesson->video_type ?? '') === 'external' ? 'selected' : '' }}>🔗 URL Externa</option>
        </select>
        <p class="text-xs text-slate-400 mt-1" id="video_hint">
            Para YouTube: cole a URL completa (ex: https://www.youtube.com/watch?v=XXXXXXXXX) ou somente o ID.
        </p>
    </div>

    <div>
        <label class="block text-sm font-medium text-slate-700 mb-1.5">URL / ID do Vídeo</label>
        <input type="text" name="video_url" value="{{ old('video_url', $lesson->video_url ?? '') }}"
               class="w-full px-4 py-2.5 border border-slate-300 rounded-xl text-sm font-mono focus:outline-none focus:ring-2 focus:ring-indigo-500"
               placeholder="https://www.youtube.com/watch?v=...">
    </div>

    <div>
        <label class="block text-sm font-medium text-slate-700 mb-1.5">Duração (segundos)</label>
        <input type="number" name="duration_seconds" min="0"
               value="{{ old('duration_seconds', $lesson->duration_seconds ?? 0) }}"
               class="w-full px-4 py-2.5 border border-slate-300 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500"
               placeholder="Ex: 3600 = 1 hora">
    </div>

    <div class="flex items-center gap-3">
        <input type="hidden" name="is_free_preview" value="0">
        <input type="checkbox" name="is_free_preview" id="is_free_preview" value="1"
               {{ old('is_free_preview', $lesson->is_free_preview ?? false) ? 'checked' : '' }}
               class="w-4 h-4 text-indigo-600 rounded">
        <label for="is_free_preview" class="text-sm text-slate-700">
            Disponível como preview gratuito (visível sem matrícula)
        </label>
    </div>

    <div class="flex gap-3 pt-2">
        <button type="submit"
                class="px-6 py-2.5 bg-indigo-600 text-white rounded-xl text-sm font-medium hover:bg-indigo-700 transition">
            {{ isset($patch) ? '💾 Salvar Alterações' : '✅ Criar Aula' }}
        </button>
        <a href="javascript:history.back()"
           class="px-6 py-2.5 bg-slate-100 text-slate-600 rounded-xl text-sm hover:bg-slate-200 transition">
            Cancelar
        </a>
    </div>
</form>

<script>
const hints = {
    youtube:  'Cole a URL completa (ex: https://www.youtube.com/watch?v=ID) ou apenas o ID do vídeo.',
    vimeo:    'Cole a URL do Vimeo (ex: https://vimeo.com/123456789) ou apenas o ID numérico.',
    local:    'Digite o caminho relativo do arquivo em /storage/videos/.',
    external: 'Cole a URL direta do arquivo de vídeo (.mp4, .webm...).',
};
document.getElementById('video_type').addEventListener('change', function() {
    document.getElementById('video_hint').textContent = hints[this.value] ?? '';
});
</script>
