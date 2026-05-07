<x-app-layout>
    {{-- Adiciona o meta tag CSRF para requisições AJAX --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    {{-- Script para processamento assíncrono de mensagens (carregado no head) --}}
    <script src="{{ asset('js/async-message.js') }}"></script>
    <style>
        .chat-container::-webkit-scrollbar { width: 4px; }
        .chat-container::-webkit-scrollbar-thumb { background: #4c1d95; border-radius: 10px; }
        .chat-messages { display: flex; flex-direction: column; }
        [x-cloak] { display: none !important; }
    </style>

    {{-- 
        CORREÇÃO: x-data movido para o elemento raiz da página (igual ao users/index.blade.php).
        openChat agora guarda o ID do projeto (ou null), em vez de um boolean por card.
        Isso garante que os modais de chat sejam renderizados no nível do body,
        sem herdar restrições de tamanho do card pai.
    --}}
    <div class="py-20 bg-[#050505] min-h-screen text-gray-200 font-mono" x-data="{ openChat: null }">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{-- Header --}}
            <div class="flex justify-between items-center mb-12 border-b-2 border-purple-600/20 pb-6">
                <div>
                    <h1 class="text-4xl font-black tracking-tighter uppercase italic text-white">
                        Project <span class="text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 to-purple-600">COMMAND_CENTER</span>
                    </h1>
                </div>
                @if(auth()->user()->role === 'admin')
                    <a href="{{ route('admin.users.index') }}" class="text-[10px] font-bold border border-purple-500/50 px-6 py-2 text-purple-400 hover:bg-purple-500 hover:text-white transition-all shadow-[0_0_15px_rgba(168,85,247,0.1)]">
                        MANAGE_AGENTS >
                    </a>
                @endif
            </div>

            {{-- Listagem de Projetos --}}
            <div class="space-y-6">
                @foreach($projects as $project)
                    {{-- 
                        x-data removido daqui. O botão agora seta openChat = project ID,
                        e o modal correspondente (fora do loop) reage a isso.
                    --}}
                    <div class="bg-gray-900/50 border border-white/5 rounded-2xl overflow-hidden backdrop-blur-md p-6">
                        <div class="flex flex-col lg:flex-row justify-between gap-6">

                            {{-- Info do Projeto --}}
                            <div class="flex-1">
                                <div class="flex items-center space-x-3 mb-2">
                                    <span class="text-[10px] bg-purple-500/20 text-purple-400 px-2 py-0.5 rounded border border-purple-500/30 uppercase font-black">ID: {{ 1000 + $project->id }}</span>
                                    <h2 class="text-xl font-bold text-white uppercase tracking-tight">{{ $project->name }}</h2>
                                </div>
                                <p class="text-xs text-gray-500 mb-4 uppercase tracking-widest">Client: <span class="text-gray-300">{{ $project->user->name }}</span></p>

                                {{-- Barra de Progresso --}}
                                <div class="w-full bg-black h-1.5 rounded-full overflow-hidden mb-2 border border-white/5">
                                    <div class="bg-gradient-to-r from-purple-600 to-cyan-400 h-full shadow-[0_0_10px_rgba(168,85,247,0.5)] transition-all duration-1000" style="width: {{ $project->progress }}%"></div>
                                </div>
                                <div class="flex justify-between text-[10px] font-black uppercase">
                                    <span class="text-purple-500">Progress_Level</span>
                                    <span class="text-cyan-400">{{ $project->progress }}%</span>
                                </div>
                            </div>

                            {{-- Formulário de Edição --}}
                            <form action="{{ route('admin.projects.update', $project) }}" method="POST" class="flex-1 grid grid-cols-2 gap-4">
                                @csrf
                                <div>
                                    <label class="text-[9px] text-gray-500 uppercase mb-1 block font-bold">Project_Status</label>
                                    <select name="status" class="w-full bg-black border-gray-800 text-white rounded text-xs p-2 focus:ring-purple-500">
                                        <option value="Initializing"  {{ $project->status == 'Initializing'  ? 'selected' : '' }}>Initializing</option>
                                        <option value="In Development"{{ $project->status == 'In Development'? 'selected' : '' }}>In Development</option>
                                        <option value="Testing"       {{ $project->status == 'Testing'       ? 'selected' : '' }}>Testing</option>
                                        <option value="Finalizing"    {{ $project->status == 'Finalizing'    ? 'selected' : '' }}>Finalizing</option>
                                        <option value="Completed"     {{ $project->status == 'Completed'     ? 'selected' : '' }}>Completed</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="text-[9px] text-gray-500 uppercase mb-1 block font-bold">Manual_Progress (%)</label>
                                    <input type="number" name="progress" value="{{ $project->progress }}" min="0" max="100" class="w-full bg-black border-gray-800 text-white rounded text-xs p-2 focus:ring-purple-500">
                                </div>
                                <div class="col-span-2">
                                    <label class="text-[9px] text-gray-500 uppercase mb-1 block font-bold">Preview_Link</label>
                                    <input type="text" name="preview_url" value="{{ $project->preview_url }}" placeholder="https://..." class="w-full bg-black border-gray-800 text-white rounded text-xs p-2 focus:ring-purple-500">
                                </div>

                                @if(auth()->user()->role === 'admin')
                                <div class="col-span-2">
                                    <label class="text-[9px] text-gray-500 uppercase mb-1 block font-bold">Assign_Developer</label>
                                    <select name="employee_id" class="w-full bg-black border-gray-800 text-white rounded text-xs p-2 focus:ring-purple-500">
                                        <option value="">UNASSIGNED</option>
                                        @foreach($employees as $emp)
                                            <option value="{{ $emp->id }}" {{ $project->employee_id == $emp->id ? 'selected' : '' }}>{{ $emp->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @endif

                                <div class="col-span-2 flex space-x-2">
                                    <button type="submit" class="flex-1 bg-white/5 border border-white/10 hover:bg-white hover:text-black transition text-[10px] font-black uppercase py-2">
                                        Update_Project_Data
                                    </button>
                                    {{-- CORREÇÃO: @click seta o ID do projeto, não um boolean --}}
                                    <button type="button" @click="openChat = {{ $project->id }}" class="px-6 bg-purple-600 hover:bg-purple-500 text-white text-[10px] font-black uppercase py-2 transition shadow-lg shadow-purple-900/20">
                                        Communication_Terminal
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        {{-- 
            =====================================================================
            MODAIS DE CHAT — FORA DO LOOP, NO NÍVEL RAIZ (igual ao users/index)
            Cada modal ocupa a tela inteira (fixed inset-0) sem herdar
            restrições do card pai.
            =====================================================================
        --}}
        @foreach($projects as $project)
        <div
                    x-show="openChat === {{ $project->id }}"
                    x-cloak
                    x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0 scale-95"
                    x-transition:enter-end="opacity-100 scale-100"
                    x-transition:leave="transition ease-in duration-200"
                    x-transition:leave-start="opacity-100 scale-100"
                    x-transition:leave-end="opacity-0 scale-95"
                    @show.window="setTimeout(() => { window.dispatchEvent(new Event('form-loaded')); }, 100)"
                    class="fixed inset-0 z-[500] bg-black/95 flex flex-col items-center justify-center p-4 md:p-12"
        >
            <div class="w-full max-w-5xl h-[90vh] bg-[#080808] border border-purple-500/30 flex flex-col rounded-xl overflow-hidden shadow-[0_0_150px_rgba(168,85,247,0.15)]">

                {{-- Chat Header --}}
                <div class="h-16 border-b border-purple-500/30 bg-gray-900/50 flex items-center justify-between px-8 flex-shrink-0">
                    <div class="flex items-center space-x-4">
                        <div class="relative">
                            <div class="w-4 h-4 bg-green-500 rounded-full animate-ping absolute inset-0 opacity-20"></div>
                            <div class="w-4 h-4 bg-green-500 rounded-full shadow-[0_0_15px_rgba(34,197,94,0.8)]"></div>
                        </div>
                        <div>
                            <h4 class="text-purple-400 font-black uppercase tracking-[0.3em] text-sm">Encrypted_Comm_Link // {{ $project->name }}</h4>
                            <p class="text-[9px] text-gray-500 font-mono tracking-[0.3em]">Client: {{ $project->user->name }}</p>
                        </div>
                    </div>
                    <button @click="openChat = null" class="text-gray-500 hover:text-white transition-colors flex items-center space-x-2 uppercase font-black text-xs border border-white/10 px-6 py-2 rounded-lg hover:bg-white/5">
                        <span>Close_Terminal</span>
                        <span class="text-xl ml-2">×</span>
                    </button>
                </div>

                {{-- Área de Mensagens --}}
                <div
                    class="flex-1 overflow-y-auto p-8 space-y-6 chat-container chat-messages"
                    id="chat-box-{{ $project->id }}"
                >
                    @forelse($project->messages->sortBy('created_at') as $msg)
                        <div class="flex {{ $msg->user_id == auth()->id() ? 'justify-end' : 'justify-start' }}">
                            <div class="max-w-[70%] {{ $msg->user_id == auth()->id() ? 'bg-purple-600/10 border-r-4 border-purple-500' : 'bg-gray-800/30 border-l-4 border-cyan-500' }} p-6 rounded-lg shadow-2xl backdrop-blur-sm">
                                <div class="flex items-center justify-between mb-2 space-x-12">
                                    <span class="text-[10px] font-black uppercase {{ $msg->user_id == auth()->id() ? 'text-purple-400' : 'text-cyan-400' }}">
                                        {{ $msg->user->name }} // {{ $msg->user->role }}
                                    </span>
                                    <span class="text-[9px] text-gray-600">{{ $msg->created_at->format('d/m/Y H:i:s') }}</span>
                                </div>
                                <p class="text-sm text-gray-200 leading-relaxed">{!! nl2br(e($msg->content)) !!}</p>
                                @if($msg->attachment)
                                    <div class="mt-4 border border-white/5 rounded overflow-hidden">
                                        <img src="{{ asset('storage/'.$msg->attachment) }}" class="max-h-[500px] w-full object-contain bg-black/50">
                                    </div>
                                @endif
                            </div>
                        </div>
                    @empty
                        <div class="h-full flex flex-col items-center justify-center opacity-20 italic uppercase tracking-[0.5em] text-gray-500 space-y-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 animate-pulse" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.063 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                            </svg>
                            <p>No_Data_Exchange_Logged</p>
                        </div>
                    @endforelse
                </div>

                {{-- Input de Envio --}}
                <div class="p-8 bg-gray-900/50 border-t border-purple-500/30 flex-shrink-0">
                    <form action="{{ route('messages.store') }}" id="message-form-{{ $project->id }}" method="POST" enctype="multipart/form-data" class="max-w-5xl mx-auto message-form">
                            @csrf
                            <input type="hidden" name="project_id" value="{{ $project->id }}">
                        <div class="relative group">
                            <div class="absolute -inset-1 bg-gradient-to-r from-purple-600 to-cyan-500 rounded-xl blur opacity-10 group-focus-within:opacity-25 transition-all"></div>
                            <textarea
                                name="content"
                                rows="3"
                                placeholder="Input command or message..."
                                class="relative w-full bg-black border border-white/10 text-white rounded-xl p-4 text-sm focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all pr-32 resize-none"
                            ></textarea>

                            <div class="absolute right-4 bottom-4 flex items-center space-x-4">
                                <label class="cursor-pointer text-gray-500 hover:text-cyan-400 transition-colors transform hover:scale-110">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                    <input type="file" name="attachment" class="hidden" accept="image/*">
                                </label>
                                                                <button type="button" onclick="checkAsyncWorking()" class="bg-gray-700 hover:bg-gray-600 text-white px-3 py-2 rounded-lg text-xs mr-2">
                                    Test JS
                                </button>
                                <button type="button" id="send-button-{{ $project->id }}" class="bg-purple-600 hover:bg-purple-500 text-white px-6 py-2 rounded-lg font-black uppercase text-xs tracking-widest transition-all active:scale-95 shadow-lg shadow-purple-600/20">
                                    Execute_Send
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
        @endforeach

    </div>

    {{-- Scroll automático para o final ao abrir o chat --}}
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.effect(() => {
                const openId = Alpine.store ? null : null; // trigger via watch abaixo
            });
        });

        // Observa mudança no openChat e scrolla o container correto
        document.addEventListener('alpine:initialized', () => {
            const root = document.querySelector('[x-data]');
            if (!root || !root._x_dataStack) return;

            const observer = new MutationObserver(() => {
                document.querySelectorAll('[id^="chat-box-"]').forEach(box => {
                    if (box.closest('[x-show]') && box.closest('[x-show]').style.display !== 'none') {
                        setTimeout(() => {
                            box.scrollTop = box.scrollHeight;
                        }, 50);
                    }
                });
            });
            observer.observe(document.body, { attributes: true, subtree: true, attributeFilter: ['style'] });
        });
    </script>

        {{-- Script já carregado no head --}}

        {{-- Adiciona o ID do usuário atual para referência no JavaScript --}}
                <script>
                    document.body.dataset.userId = "{{ auth()->id() }}";
                </script>
        
                                <script>
                    // Configura os botões de envio para cada projeto
                    document.addEventListener('DOMContentLoaded', function() {
                        // Configurar botões para cada projeto
                        @foreach($projects as $project)
                            setupSendButton({{ $project->id }});
                        @endforeach
                    });
            
                    // Reconfigura quando o modal for aberto
                    window.addEventListener('form-loaded', function() {
                        // Reconfigura botões para todos os projetos abertos
                        @foreach($projects as $project)
                            setupSendButton({{ $project->id }});
                        @endforeach
                    });
            
                    // Função auxiliar para configurar o botão de envio
                    function setupSendButton(projectId) {
                        console.log('Configurando botão para projeto ' + projectId);
                        const sendButton = document.getElementById('send-button-' + projectId);
                        const messageForm = document.getElementById('message-form-' + projectId);
                
                        if (sendButton && messageForm) {
                            console.log('Botão e formulário encontrados para projeto ' + projectId);
                            
                            // Remover qualquer listener antigo para evitar duplicações
                            const newButton = sendButton.cloneNode(true);
                            sendButton.parentNode.replaceChild(newButton, sendButton);
                            
                            // Adiciona evento diretamente (mais simples e confiável)
                            newButton.onclick = function(e) {
                                e.preventDefault();
                                
                                // Verifica se o formulário tem conteúdo válido
                                const textarea = messageForm.querySelector('textarea');
                                const fileInput = messageForm.querySelector('input[type="file"]');
                                
                                if ((!textarea || !textarea.value.trim()) && (!fileInput || !fileInput.files.length)) {
                                    alert('Por favor, digite uma mensagem ou selecione um arquivo.');
                                    return;
                                }
                                
                                console.log('Disparando submit para o formulário ' + messageForm.id);
                                
                                // Abordagem mais direta - criar o FormData e enviar
                                const formData = new FormData(messageForm);
                                
                                // Mostra indicador de carregamento
                                const originalText = newButton.innerHTML;
                                newButton.innerHTML = 'Enviando...';
                                newButton.disabled = true;
                                
                                // Enviar diretamente via fetch
                                fetch(messageForm.action, {
                                    method: 'POST',
                                    headers: {
                                        'X-Requested-With': 'XMLHttpRequest',
                                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                                    },
                                    body: formData
                                })
                                .then(response => response.json())
                                .then(data => {
                                    if (data.success) {
                                        // Limpa o formulário
                                        textarea.value = '';
                                        if (fileInput) fileInput.value = '';
                                        
                                        // Busca o chat box
                                        const chatBox = document.getElementById('chat-box-' + projectId);
                                        
                                        // Adiciona a nova mensagem
                                        if (chatBox) {
                                            // Remove mensagem vazia se existir
                                            const emptyMessage = chatBox.querySelector('.opacity-20.italic');
                                            if (emptyMessage && emptyMessage.closest('.h-full')) {
                                                emptyMessage.closest('.h-full').remove();
                                            }
                                            
                                            // Cria o elemento de mensagem
                                            const msgEl = document.createElement('div');
                                            msgEl.className = 'flex justify-end';
                                            
                                            // Formata a mensagem
                                            msgEl.innerHTML = `
                                                <div class="max-w-[70%] bg-purple-600/10 border-r-4 border-purple-500 p-6 rounded-lg shadow-2xl backdrop-blur-sm">
                                                    <div class="flex items-center justify-between mb-2 space-x-12">
                                                        <span class="text-[10px] font-black uppercase text-purple-400">
                                                            ${data.message.user_name} // You
                                                        </span>
                                                        <span class="text-[9px] text-gray-600">${data.message.created_at}</span>
                                                    </div>
                                                    <p class="text-sm text-gray-200 leading-relaxed">${data.message.content ? data.message.content.replace(/\n/g, '<br>') : ''}</p>
                                                    ${data.message.attachment ? 
                                                        `<div class="mt-4 border border-white/5 rounded overflow-hidden">
                                                            <img src="${data.message.attachment}" class="max-h-[500px] w-full object-contain bg-black/50">
                                                        </div>` : 
                                                        ''}
                                                </div>
                                            `;
                                            
                                            // Adiciona ao chat
                                            chatBox.appendChild(msgEl);
                                            
                                            // Scroll para o final
                                            chatBox.scrollTop = chatBox.scrollHeight;
                                        }
                                        
                                        // Mostra feedback
                                        showToast('Mensagem enviada com sucesso!', 'success');
                                    } else {
                                        showToast(data.error || 'Erro ao enviar mensagem', 'error');
                                    }
                                })
                                .catch(error => {
                                    console.error('Erro:', error);
                                    showToast('Erro de conexão. Tente novamente.', 'error');
                                })
                                .finally(() => {
                                    // Restaura o botão
                                    newButton.innerHTML = originalText;
                                    newButton.disabled = false;
                                });
                            };
                        } else {
                            console.error('Botão ou formulário não encontrado para o projeto ' + projectId);
                            if (!sendButton) console.error('Botão não encontrado: send-button-' + projectId);
                            if (!messageForm) console.error('Formulário não encontrado: message-form-' + projectId);
                        }
                    }
                    
                    // Função para mostrar toast de feedback
                    function showToast(message, type) {
                        // Remove toast existente
                        const existingToast = document.getElementById('toast-notification');
                        if (existingToast) {
                            existingToast.remove();
                        }
                        
                        // Cria o toast
                        const toast = document.createElement('div');
                        toast.id = 'toast-notification';
                        toast.className = `fixed bottom-4 right-4 p-4 rounded-lg shadow-lg z-[1000] max-w-md animate-slideInUp ${
                            type === 'success' ? 'bg-green-900/90 text-green-100 border-l-4 border-green-500' : 
                            'bg-red-900/90 text-red-100 border-l-4 border-red-500'
                        }`;
                        
                        toast.innerHTML = `
                            <div class="flex items-center">
                                <div class="flex-shrink-0">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        ${type === 'success' 
                                            ? '<path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>'
                                            : '<path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>'}
                                    </svg>
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm font-medium">${message}</p>
                                </div>
                                <button type="button" class="ml-auto -mx-1.5 -my-1.5 text-white/50 hover:text-white inline-flex h-6 w-6 items-center justify-center rounded-md" onclick="this.parentElement.parentElement.remove()">
                                    <span class="sr-only">Fechar</span>
                                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>
                                </button>
                            </div>
                        `;
                        
                        document.body.appendChild(toast);
                        
                        // Remove após alguns segundos
                        setTimeout(() => {
                            toast.classList.add('animate-fadeOut');
                            setTimeout(() => toast.remove(), 300);
                        }, 5000);
                    }
                </script>
                
                <style>
                    @keyframes slideInUp {
                        from { transform: translateY(100%); opacity: 0; }
                        to { transform: translateY(0); opacity: 1; }
                    }
                    @keyframes fadeOut {
                        from { opacity: 1; }
                        to { opacity: 0; }
                    }
                    .animate-slideInUp { animation: slideInUp 0.3s ease forwards; }
                    .animate-fadeOut { animation: fadeOut 0.3s ease forwards; }
                </style>
    </x-app-layout>