<x-app-layout>

{{-- ============================================================
     ESTILOS: Animações Cyber para a Barra de Progresso
     Objetivo 3: UI/UX High-Tech/Cyber Progress Bar
     ============================================================ --}}
<style>
    /* --- Animação do gradiente neon em movimento --- */
    @keyframes neonFlow {
        0%   { background-position: 0% 50%; }
        50%  { background-position: 100% 50%; }
        100% { background-position: 0% 50%; }
    }

    /* --- Pulso luminoso (glow) na borda da barra --- */
    @keyframes glowPulse {
        0%, 100% { box-shadow: 0 0 6px #ec4899, 0 0 18px #ec489966, 0 0 35px #a855f733; }
        50%       { box-shadow: 0 0 12px #ec4899, 0 0 30px #ec4899aa, 0 0 60px #a855f766; }
    }

    /* --- Varredura de luz (scan line) sobre a barra --- */
    @keyframes scanLine {
        0%   { left: -30%; opacity: 0; }
        10%  { opacity: 1; }
        90%  { opacity: 1; }
        100% { left: 120%; opacity: 0; }
    }

    /* --- Entrada da barra (cresce do 0% ao valor real) --- */
    @keyframes barGrow {
        from { width: 0%; }
    }

    .cyber-bar-fill {
        background: linear-gradient(
            90deg,
            #ec4899, #a855f7, #6366f1, #a855f7, #ec4899
        );
        background-size: 300% 100%;

        animation:
            barGrow   1.4s cubic-bezier(0.25, 1, 0.5, 1) forwards,
            neonFlow  3s  ease-in-out infinite 1.4s,
            glowPulse 2s  ease-in-out infinite 1.4s;

        position: relative;
        overflow: hidden;
    }

    /* Scan line: elemento pseudo filho criado via JS para compatibilidade Blade */
    .cyber-bar-scan {
        position: absolute;
        top: 0;
        width: 30%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255,255,255,0.45), transparent);
        animation: scanLine 2.5s ease-in-out infinite 1.6s;
    }

    /* --- Glitch no título do status --- */
    @keyframes statusBlink {
        0%, 94%, 100% { opacity: 1; }
        95%            { opacity: 0.1; }
        97%            { opacity: 1; }
        98%            { opacity: 0.2; }
    }
    .status-blink { animation: statusBlink 4s infinite; }
</style>

<div class="py-12 bg-black min-h-screen text-white font-mono">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        {{-- ============================================================
             HEADER DO PROJETO
             ============================================================ --}}
        <div class="relative p-8 bg-gray-900/50 border border-purple-500/30 rounded-2xl backdrop-blur-xl mb-8">
            <h2 class="text-3xl font-bold bg-gradient-to-r from-pink-500 to-purple-600 bg-clip-text text-transparent uppercase">
                {{ $project->name ?? 'Aguardando Inicialização...' }}
            </h2>
            <p class="text-gray-400 mt-2">
                STATUS:
                <span class="status-blink {{ $project ? 'text-green-400' : 'text-yellow-500' }}">
                    {{ $project->status ?? 'EM PROCESSAMENTO' }}
                </span>
            </p>
        </div>

        {{-- ============================================================
             BARRA DE PROGRESSO CYBER (Objetivo 3)
             ============================================================ --}}
        <div class="p-6 bg-gray-900/50 border border-pink-500/20 rounded-2xl mb-8">
            <div class="flex justify-between mb-4 text-pink-400 text-xs tracking-widest uppercase">
                <span>Sincronização de Progresso</span>
                <span id="progress-label">{{ $project->progress ?? 0 }}%</span>
            </div>

            <div class="w-full bg-gray-800 rounded-full h-4 p-[2px] overflow-hidden">
                <div
                    id="cyber-progress-bar"
                    class="cyber-bar-fill h-full rounded-full"
                    style="width: {{ $project->progress ?? 5 }}%"
                >
                    {{-- Scan line interna --}}
                    <div class="cyber-bar-scan"></div>
                </div>
            </div>

            {{-- Steps --}}
            @if($project && $project->steps)
            <div class="mt-8 grid grid-cols-1 md:grid-cols-2 gap-4 border-t border-white/5 pt-6">
                @foreach($project->steps as $step)
                <div class="flex items-center p-3 border border-white/5 rounded-lg {{ $step['completed'] ? 'bg-green-500/5' : 'bg-gray-800/30' }}">
                    <div class="mr-3">
                        @if($step['completed'])
                            <span class="text-green-500 text-lg">●</span>
                        @else
                            <span class="text-gray-600 text-lg animate-pulse">○</span>
                        @endif
                    </div>
                    <span class="text-sm {{ $step['completed'] ? 'text-gray-400 line-through' : 'text-gray-200' }}">
                        {{ $step['task'] ?? $step['title'] ?? 'Sem título' }}
                    </span>
                </div>
                @endforeach
            </div>
            @endif
        </div>

        {{-- ============================================================
             GRID: CHAT + SIDEBAR
             ============================================================ --}}
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">

            {{-- ---- ÁREA DO CHAT (Objetivos 1 e 2) ---- --}}
            <div class="lg:col-span-3 space-y-4">

                {{-- Container de mensagens: ordem correta (antigas no topo, novas embaixo) --}}
                <div
                    id="chat-messages"
                    class="h-96 overflow-y-auto p-4 bg-black/40 rounded-xl border border-gray-800 space-y-4 flex flex-col"
                >
                    @php
                       
                        $orderedMessages = $messages->sortBy('created_at');
                    @endphp

                    @forelse($orderedMessages as $message)
                        <div class="flex flex-col {{ $message->user_id == auth()->id() ? 'items-end' : 'items-start' }}">
                            <div class="p-3 rounded-lg border
                                {{ $message->user_id == auth()->id()
                                    ? 'bg-pink-900/20 border-pink-500/30'
                                    : 'bg-purple-900/20 border-purple-500/30' }}
                                max-w-md">
                                <p class="text-[10px] uppercase text-gray-500 mb-1">{{ $message->user->name }}:</p>
                                <p class="text-sm">{{ $message->content }}</p>
                                @if($message->attachment)
                                    @php $ext = strtolower(pathinfo($message->attachment, PATHINFO_EXTENSION)); @endphp
                                    @if(in_array($ext, ['mp4', 'webm', 'mov', 'ogg']))
                                        <video src="{{ asset('uploads/' . $message->attachment) }}"
                                               controls
                                               class="mt-2 rounded border border-gray-700 max-w-xs max-h-48"></video>
                                    @else
                                        <img src="{{ asset('uploads/' . $message->attachment) }}"
                                             class="mt-2 rounded border border-gray-700 max-w-xs">
                                    @endif
                                @endif
                            </div>
                        </div>
                    @empty
                        <div class="flex items-center justify-center flex-1 opacity-30 italic">
                            <p class="text-center text-gray-600 text-xs uppercase tracking-widest">
                                Nenhuma transmissão encontrada no histórico.
                            </p>
                        </div>
                    @endforelse
                </div>

                {{-- Formulário de envio (Objetivo 1: AJAX via Fetch API) --}}
                @if($project)
                <form
                    id="chat-form"
                    data-url="{{ route('messages.store') }}"
                    class="relative"
                    enctype="multipart/form-data"
                >
                    @csrf
                    <input type="hidden" name="project_id" value="{{ $project->id }}">

                    <textarea
                        id="chat-input"
                        name="content"
                        class="w-full bg-gray-900 border border-pink-500/30 rounded-xl p-4 text-white text-sm
                               focus:ring-pink-500 focus:border-pink-500 outline-none transition-all resize-none"
                        placeholder="Escrever comentário para a equipe..."
                        rows="3"
                    ></textarea>

                    <div class="flex justify-between items-center mt-2">
                        <input
                            type="file"
                            id="chat-attachment"
                            name="attachment"
                            accept="image/*"
                            class="text-xs text-gray-500
                                   file:bg-gray-800 file:text-white file:border-none
                                   file:rounded file:px-2 file:py-1 file:mr-4
                                   file:hover:bg-gray-700 cursor-pointer"
                        >
                        <button
                            id="send-btn"
                            type="submit"
                            class="bg-pink-600 px-6 py-2 rounded-lg font-bold text-xs
                                   hover:bg-pink-500 transition shadow-lg shadow-pink-500/20
                                   uppercase tracking-widest text-white disabled:opacity-50
                                   disabled:cursor-not-allowed flex items-center gap-2"
                        >
                            <span id="send-label">TRANSMITIR</span>
                            <span id="send-spinner" class="hidden animate-spin">⟳</span>
                        </button>
                    </div>

                    {{-- Área de feedback de erro --}}
                    <p id="chat-error" class="hidden text-red-400 text-xs mt-2"></p>
                </form>
                @else
                <div class="p-4 bg-yellow-900/20 border border-yellow-500/30 rounded-xl text-center text-xs text-yellow-500">
                    Aguarde a inicialização do projeto para habilitar o terminal de chat.
                </div>
                @endif

            </div>

            {{-- ---- SIDEBAR ---- --}}
            <div class="space-y-4">
                <div class="p-4 bg-gray-900/50 border border-blue-500/20 rounded-xl">
                    <h3 class="text-blue-400 text-[10px] mb-4 tracking-widest uppercase text-center">Ações do Sistema</h3>
                    <a href="{{ route('billing') }}"
                       class="block w-full text-center py-2 border border-blue-500/40 rounded
                              text-[10px] font-bold text-blue-400 hover:bg-blue-500/10 transition uppercase">
                        GERENCIAR FATURAS
                    </a>

                    @if($project && $project->preview_url)
                    <a href="{{ $project->preview_url }}" target="_blank"
                       class="block w-full text-center py-2 mt-2 bg-blue-600/20 border border-blue-500/40 rounded
                              text-[10px] font-bold text-blue-400 hover:bg-blue-500/30 transition uppercase">
                        VER SITE PREVIEW
                    </a>
                    @endif
                </div>

                <div class="p-4 border border-white/5 rounded-xl text-[10px] text-gray-500 leading-relaxed text-center italic">
                    Criptografia de ponta a ponta ativa. Transmissão segura via WebM Protocol.
                </div>
            </div>

        </div>{{-- /grid --}}
    </div>
</div>

{{-- ============================================================
     SCRIPT: AJAX Chat com Fetch API
     Objetivo 1: Sem refresh de página
     Objetivo 2: Scroll automático para o final
     ============================================================ --}}
<script>
(function () {
    'use strict';

    /* ---- Referências DOM ---- */
    const form        = document.getElementById('chat-form');
    const chatBox     = document.getElementById('chat-messages');
    const input       = document.getElementById('chat-input');
    const attachment  = document.getElementById('chat-attachment');
    const sendBtn     = document.getElementById('send-btn');
    const sendLabel   = document.getElementById('send-label');
    const sendSpinner = document.getElementById('send-spinner');
    const chatError   = document.getElementById('chat-error');

    if (!form) return; // Guard: formulário não existe (projeto não inicializado)

    /* ---- Objetivo 2: Scroll para o final na carga inicial ---- */
    function scrollToBottom(smooth = false) {
        chatBox.scrollTo({
            top: chatBox.scrollHeight,
            behavior: smooth ? 'smooth' : 'instant'
        });
    }
    scrollToBottom(false); // Sem animação no load (mais rápido)

    /* ---- Cria o elemento HTML de uma nova mensagem ---- */
    function buildMessageEl(msg, isMine) {
        const wrapper = document.createElement('div');
        wrapper.className = `flex flex-col ${isMine ? 'items-end' : 'items-start'} animate-fade-in`;

        const bubble = document.createElement('div');
        bubble.className = `p-3 rounded-lg border max-w-md ${
            isMine
                ? 'bg-pink-900/20 border-pink-500/30'
                : 'bg-purple-900/20 border-purple-500/30'
        }`;

        const mediaHtml = msg.attachment
            ? (msg.attachment_type === 'video'
                ? `<video src="${msg.attachment}" controls class="mt-2 rounded border border-gray-700 max-w-xs max-h-48"></video>`
                : `<img src="${msg.attachment}" class="mt-2 rounded border border-gray-700 max-w-xs">`)
            : '';

        bubble.innerHTML = `
            <p class="text-[10px] uppercase text-gray-500 mb-1">${escapeHtml(msg.user_name)}:</p>
            <p class="text-sm">${escapeHtml(msg.content ?? '')}</p>
            ${mediaHtml}
        `;

        wrapper.appendChild(bubble);
        return wrapper;
    }

    /* ---- Escapa HTML para evitar XSS ---- */
    function escapeHtml(str) {
        const div = document.createElement('div');
        div.appendChild(document.createTextNode(str));
        return div.innerHTML;
    }

    /* ---- Remove placeholder "nenhuma mensagem" se existir ---- */
    function removePlaceholder() {
        const placeholder = chatBox.querySelector('.italic');
        if (placeholder) placeholder.closest('.flex')?.remove();
    }

    /* ---- Estado de loading do botão ---- */
    function setLoading(loading) {
        sendBtn.disabled = loading;
        sendLabel.textContent = loading ? 'ENVIANDO...' : 'TRANSMITIR';
        sendSpinner.classList.toggle('hidden', !loading);
    }

    /* ---- Envio via Fetch API (sem refresh) ---- */
    form.addEventListener('submit', async function (e) {
        e.preventDefault(); // <<< Previne o refresh da página

        const content = input.value.trim();
        const file    = attachment?.files[0];

        if (!content && !file) {
            chatError.textContent = 'Digite uma mensagem ou selecione um arquivo.';
            chatError.classList.remove('hidden');
            return;
        }
        chatError.classList.add('hidden');

        /* Monta FormData (suporta texto + arquivo) */
        const formData = new FormData(form);

        setLoading(true);

        try {
            const response = await fetch(form.dataset.url, {
                method: 'POST',
                headers: {
                    'Accept': 'application/json',
                    // O CSRF já está no FormData via @csrf; mas o header é necessário para Laravel
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content
                        || document.querySelector('input[name="_token"]').value,
                },
                body: formData,
            });

            if (!response.ok) {
                const data = await response.json().catch(() => ({}));
                throw new Error(data.message || `Erro ${response.status}`);
            }

            const data = await response.json();

            if (data.success) {
                /* Insere a nova mensagem no DOM */
                removePlaceholder();
                const isMine = true; // Quem envia é sempre o usuário atual
                const msgEl  = buildMessageEl(data.message, isMine);
                chatBox.appendChild(msgEl);

                /* Objetivo 2: Scroll automático para a mensagem nova */
                scrollToBottom(true);

                /* Limpa o formulário */
                input.value = '';
                if (attachment) attachment.value = '';
            }

        } catch (err) {
            chatError.textContent = `Falha na transmissão: ${err.message}`;
            chatError.classList.remove('hidden');
        } finally {
            setLoading(false);
            input.focus();
        }
    });

    /* ---- Atalho: Ctrl+Enter envia a mensagem ---- */
    input.addEventListener('keydown', function (e) {
        if (e.ctrlKey && e.key === 'Enter') {
            form.dispatchEvent(new Event('submit', { cancelable: true, bubbles: true }));
        }
    });

})();
</script>

</x-app-layout>