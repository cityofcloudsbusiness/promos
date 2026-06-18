@php $currentType = old('content_type', $lesson->content_type ?? 'video'); @endphp

<form method="{{ $method }}" action="{{ $action }}"
      enctype="multipart/form-data"
      class="bg-white rounded-2xl border border-slate-200 p-6 space-y-6"
      id="lesson-form">
    @csrf
    @isset($patch) @method('PATCH') @endisset

    @if($errors->any())
        <div class="p-4 bg-red-50 border border-red-200 rounded-xl text-sm text-red-700">
            <ul class="list-disc list-inside space-y-1">
                @foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach
            </ul>
        </div>
    @endif

    {{-- ── Tipo de Conteúdo ──────────────────────────── --}}
    <div>
        <p class="block text-sm font-medium text-slate-700 mb-3">Tipo de Conteúdo *</p>
        <div class="grid grid-cols-2 gap-3">
            <label class="content-type-option flex items-center gap-3 px-4 py-3 rounded-xl border-2 cursor-pointer transition
                          {{ $currentType === 'video' ? 'border-indigo-500 bg-indigo-50' : 'border-slate-200 hover:border-slate-300' }}"
                   for="type_video">
                <input type="radio" name="content_type" id="type_video" value="video"
                       class="sr-only" {{ $currentType === 'video' ? 'checked' : '' }}>
                <span class="text-2xl">▶️</span>
                <div>
                    <p class="text-sm font-semibold text-slate-800">Vídeo</p>
                    <p class="text-xs text-slate-400">YouTube, Vimeo ou local</p>
                </div>
            </label>

            <label class="content-type-option flex items-center gap-3 px-4 py-3 rounded-xl border-2 cursor-pointer transition
                          {{ $currentType === 'apostila' ? 'border-indigo-500 bg-indigo-50' : 'border-slate-200 hover:border-slate-300' }}"
                   for="type_apostila">
                <input type="radio" name="content_type" id="type_apostila" value="apostila"
                       class="sr-only" {{ $currentType === 'apostila' ? 'checked' : '' }}>
                <span class="text-2xl">📄</span>
                <div>
                    <p class="text-sm font-semibold text-slate-800">Apostila PDF</p>
                    <p class="text-xs text-slate-400">Upload de arquivo .pdf</p>
                </div>
            </label>
        </div>
    </div>

    {{-- ── Título ────────────────────────────────────── --}}
    <div>
        <label class="block text-sm font-medium text-slate-700 mb-1.5">Título *</label>
        <input type="text" name="title" value="{{ old('title', $lesson->title ?? '') }}"
               class="w-full px-4 py-2.5 border border-slate-300 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500"
               placeholder="Ex: Apostila Completa do Módulo 1" required>
    </div>

    {{-- ── Descrição ─────────────────────────────────── --}}
    <div>
        <label class="block text-sm font-medium text-slate-700 mb-1.5">Descrição / Objetivo</label>
        <textarea name="description" rows="2"
                  class="w-full px-4 py-2.5 border border-slate-300 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 resize-none"
                  placeholder="O que o aluno encontrará neste conteúdo...">{{ old('description', $lesson->description ?? '') }}</textarea>
    </div>

    {{-- ── Campos de Vídeo ───────────────────────────── --}}
    <div id="fields-video" class="{{ $currentType !== 'video' ? 'hidden' : '' }} space-y-5">
        <div>
            <label class="block text-sm font-medium text-slate-700 mb-1.5">Plataforma de Vídeo</label>
            <select name="video_type" id="video_type"
                    class="w-full px-4 py-2.5 border border-slate-300 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
                <option value="youtube"  {{ old('video_type', $lesson->video_type ?? 'youtube') === 'youtube'  ? 'selected' : '' }}>▶️ YouTube (recomendado)</option>
                <option value="vimeo"    {{ old('video_type', $lesson->video_type ?? '') === 'vimeo'    ? 'selected' : '' }}>🎬 Vimeo</option>
                <option value="local"    {{ old('video_type', $lesson->video_type ?? '') === 'local'    ? 'selected' : '' }}>📁 Armazenamento Local</option>
                <option value="external" {{ old('video_type', $lesson->video_type ?? '') === 'external' ? 'selected' : '' }}>🔗 URL Externa</option>
            </select>
            <p class="text-xs text-slate-400 mt-1" id="video_hint">
                Cole a URL completa ou o ID do vídeo.
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
            <p class="text-xs text-slate-400 mt-1">60 = 1 min · 3600 = 1h · deixe 0 se não souber</p>
        </div>
    </div>

    {{-- ── Campos de Apostila PDF ────────────────────── --}}
    <div id="fields-apostila" class="{{ $currentType !== 'apostila' ? 'hidden' : '' }} space-y-5">

        {{-- Arquivo atual (edit mode) --}}
        @if(isset($lesson) && $lesson->isPdf() && $lesson->pdf_path)
            <div class="flex items-center gap-3 px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl">
                <span class="text-2xl">📄</span>
                <div class="flex-1 min-w-0">
                    <p class="text-sm font-medium text-slate-700 truncate">{{ basename($lesson->pdf_path) }}</p>
                    <p class="text-xs text-slate-400">Arquivo atual — envie um novo para substituir</p>
                </div>
                <a href="{{ route('apostila.serve', $lesson) }}" target="_blank"
                   class="text-xs text-indigo-600 hover:underline shrink-0">Abrir →</a>
            </div>
        @endif

        <div>
            <label class="block text-sm font-medium text-slate-700 mb-1.5">
                {{ (isset($lesson) && $lesson->isPdf()) ? 'Substituir PDF' : 'Arquivo PDF *' }}
            </label>
            <div class="relative">
                <input type="file" name="pdf_file" id="pdf_file" accept=".pdf,application/pdf"
                       class="absolute inset-0 opacity-0 cursor-pointer z-10 w-full h-full"
                       onchange="updatePdfLabel(this)">
                <div id="pdf-drop-zone"
                     class="flex flex-col items-center justify-center gap-2 px-6 py-8 border-2 border-dashed border-slate-300 rounded-xl
                            hover:border-indigo-400 hover:bg-indigo-50/30 transition cursor-pointer">
                    <span class="text-3xl">📤</span>
                    <p class="text-sm font-medium text-slate-700" id="pdf-label">Clique para selecionar o PDF</p>
                    <p class="text-xs text-slate-400">Somente arquivos .pdf · máximo 20 MB</p>
                </div>
            </div>
            @error('pdf_file')
                <p class="mt-1.5 text-xs text-red-500">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex items-start gap-3 px-4 py-3 bg-blue-50 border border-blue-100 rounded-xl">
            <span class="text-blue-500 text-lg mt-0.5">ℹ️</span>
            <p class="text-xs text-blue-700 leading-relaxed">
                O PDF será exibido <strong>diretamente na tela do aluno</strong> sem precisar baixar. Recomendamos PDFs gerados do Word ou Google Docs para melhor compatibilidade.
            </p>
        </div>
    </div>

    {{-- ── Preview gratuito ──────────────────────────── --}}
    <div class="flex items-center gap-3">
        <input type="hidden" name="is_free_preview" value="0">
        <input type="checkbox" name="is_free_preview" id="is_free_preview" value="1"
               {{ old('is_free_preview', $lesson->is_free_preview ?? false) ? 'checked' : '' }}
               class="w-4 h-4 text-indigo-600 rounded">
        <label for="is_free_preview" class="text-sm text-slate-700">
            Disponível como preview gratuito (visível sem matrícula)
        </label>
    </div>

    {{-- ── Botões ────────────────────────────────────── --}}
    <div class="flex gap-3 pt-2">
        <button type="submit"
                class="px-6 py-2.5 bg-indigo-600 text-white rounded-xl text-sm font-medium hover:bg-indigo-700 transition">
            {{ isset($patch) ? '💾 Salvar Alterações' : '✅ Criar Conteúdo' }}
        </button>
        <a href="javascript:history.back()"
           class="px-6 py-2.5 bg-slate-100 text-slate-600 rounded-xl text-sm hover:bg-slate-200 transition">
            Cancelar
        </a>
    </div>
</form>

<script>
// ── Toggle video / apostila ──────────────────────
(function() {
    const radios    = document.querySelectorAll('input[name="content_type"]');
    const vidFields = document.getElementById('fields-video');
    const pdfFields = document.getElementById('fields-apostila');
    const labels    = document.querySelectorAll('.content-type-option');

    function applyType(val) {
        vidFields.classList.toggle('hidden', val !== 'video');
        pdfFields.classList.toggle('hidden', val !== 'apostila');

        labels.forEach(l => {
            const input = l.querySelector('input[type=radio]');
            const active = input.value === val;
            l.classList.toggle('border-indigo-500', active);
            l.classList.toggle('bg-indigo-50', active);
            l.classList.toggle('border-slate-200', !active);
        });
    }

    radios.forEach(r => r.addEventListener('change', () => applyType(r.value)));

    // Make entire label card clickable
    labels.forEach(l => {
        l.addEventListener('click', () => {
            const radio = l.querySelector('input[type=radio]');
            radio.checked = true;
            applyType(radio.value);
        });
    });
})();

// ── PDF label update ──────────────────────────────
function updatePdfLabel(input) {
    const label = document.getElementById('pdf-label');
    const zone  = document.getElementById('pdf-drop-zone');
    if (input.files && input.files[0]) {
        const name = input.files[0].name;
        const size = (input.files[0].size / 1024 / 1024).toFixed(1);
        label.textContent = name;
        label.className = 'text-sm font-semibold text-indigo-700';
        zone.querySelector('span').textContent = '✅';
    }
}

// ── Video type hints ──────────────────────────────
const hints = {
    youtube:  'Cole a URL completa (ex: https://www.youtube.com/watch?v=ID) ou apenas o ID.',
    vimeo:    'Cole a URL do Vimeo (ex: https://vimeo.com/123456789).',
    local:    'Caminho relativo do arquivo em /storage/videos/.',
    external: 'URL direta do arquivo de vídeo (.mp4, .webm...).',
};
const vtSel = document.getElementById('video_type');
if (vtSel) {
    vtSel.addEventListener('change', function() {
        document.getElementById('video_hint').textContent = hints[this.value] ?? '';
    });
}
</script>
