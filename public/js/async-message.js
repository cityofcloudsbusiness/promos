/**
 * Script para gerenciar o envio assíncrono de mensagens
 * usando Fetch API
 */
// Função global para teste do JS
window.checkAsyncWorking = function() {
    alert('O JavaScript está funcionando corretamente!');
    console.log('Teste de JS OK');
    return false;
};

// Definição global para debug
window.debugAsyncMessage = true;

document.addEventListener('DOMContentLoaded', () => {
    // Console para debug inicial
    console.log('%cAsync message script loaded', 'color: green; font-weight: bold');
    
    // Captura todos os formulários de mensagem na página por vários seletores para garantir
    const messageForms = document.querySelectorAll('form[action*="messages.store"], form[action*="/messages"], form.message-form, form[id^="message-form-"]');
    
    console.log('%cEncontrados ' + messageForms.length + ' formulários de mensagem', 'color: blue');
    
        // Adiciona listener a cada formulário encontrado
    messageForms.forEach(form => {
        console.log('%cAdicionando listener para formulário:', 'color: blue', form.id || 'sem ID');
        // Remove listener existente para evitar duplicações
        form.removeEventListener('submit', handleAsyncMessageSubmit);
        form.addEventListener('submit', handleAsyncMessageSubmit);
    });
    
    // Adiciona um listener global para pegar todos os submits de formulários (abordagem mais robusta)
    document.body.addEventListener('submit', function(event) {
        const form = event.target;
        
        // Verifica se é um formulário de mensagem
        if (form.action && 
            (form.action.includes('/messages') || form.action.includes('messages.store')) && 
            form.querySelector('input[name="project_id"]')) {
            
            console.log('%cCapturado submit de formulário via listener global: ' + (form.id || 'sem ID'), 'color: orange; font-weight: bold');
            handleAsyncMessageSubmit(event);
        }
    }, true); // Use capture phase para garantir que este listener seja executado primeiro
    
    // Adiciona listener para o evento quando um modal é aberto
    window.addEventListener('form-loaded', function() {
        console.log('%cModal aberto, procurando novos formulários...', 'color: purple; font-weight: bold');
        const newForms = document.querySelectorAll('form[action*="messages.store"], form[action*="/messages"], form.message-form, form[id^="message-form-"]');
        console.log('Encontrados ' + newForms.length + ' novos formulários');
        
        newForms.forEach(form => {
            // Remove listener existente para evitar duplicações
            form.removeEventListener('submit', handleAsyncMessageSubmit);
            // Adiciona novo listener
            form.addEventListener('submit', handleAsyncMessageSubmit);
            console.log('%cListener adicionado para formulário reaberto: ' + (form.id || 'sem ID'), 'color: green');
        });
    });

    /**
     * Função para lidar com o envio assíncrono do formulário
     */
        async function handleAsyncMessageSubmit(e) {
        console.log('%cInterceptando envio de formulário: ' + (e.target.id || 'sem ID'), 'color: blue; font-weight: bold');
        
        // Previne o envio padrão do formulário
        e.preventDefault();
        e.stopPropagation();
        
        const form = e.target;
        
        // Identifica o botão corretamente - pode ser o botão submit ou o botão send-button
        let submitButton;
        const buttonId = 'send-button-' + form.querySelector('input[name="project_id"]').value;
        submitButton = document.getElementById(buttonId);
        if (!submitButton) {
            // Tenta encontrar por seletor dentro do form
            submitButton = form.querySelector('button[type="button"][id^="send-button"]');
            if (!submitButton) {
                // Última tentativa: qualquer botão no form
                submitButton = form.querySelector('button');
            }
        }
        
        const textarea = form.querySelector('textarea');
        const fileInput = form.querySelector('input[type="file"]');
        const projectId = form.querySelector('input[name="project_id"]').value;
        const chatBox = document.getElementById(`chat-box-${projectId}`);
        
        // Verifica se encontrou o botão e o chat box
        if (!chatBox) {
            console.error('Chat box não encontrado:', `chat-box-${projectId}`);
            alert('Erro: Área de chat não encontrada.');
            return;
        }
        
        // Desativa o botão durante o envio e mostra feedback (se existir)
        const originalButtonText = submitButton ? submitButton.innerHTML : null;
        if (submitButton) {
            submitButton.innerHTML = 'Sending...';
            submitButton.disabled = true;
        }
        
        try {
            // Cria FormData para enviar dados + arquivo
            const formData = new FormData(form);
            
            // Envia a requisição
            const response = await fetch('/messages', {
                method: 'POST',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                body: formData
            });
            
            // Processa a resposta
            if (response.ok) {
                const data = await response.json();
                
                if (data.success) {
                    // Limpa o formulário
                    textarea.value = '';
                    if (fileInput) fileInput.value = '';
                    
                    // Adiciona a mensagem ao chat
                    appendMessage(chatBox, data.message);
                    
                    // Rola para o final da conversa
                    chatBox.scrollTop = chatBox.scrollHeight;
                    
                    showFeedback('success', 'Mensagem enviada com sucesso!');
                } else {
                    showFeedback('error', data.error || 'Erro ao enviar mensagem');
                }
            } else {
                // Trata erros de resposta HTTP
                if (response.status === 422) {
                    // Erros de validação
                    const errors = await response.json();
                    let errorMessage = 'Erros de validação:';
                    
                    for (const field in errors.errors) {
                        errorMessage += `\n- ${errors.errors[field][0]}`;
                    }
                    
                    showFeedback('error', errorMessage);
                } else {
                    showFeedback('error', `Erro ${response.status}: ${response.statusText}`);
                }
            }
        } catch (error) {
            console.error('Erro ao enviar mensagem:', error);
            showFeedback('error', 'Erro de conexão. Tente novamente.');
                } finally {
            // Restaura o botão se ele existir
            if (submitButton && originalButtonText) {
                submitButton.innerHTML = originalButtonText;
                submitButton.disabled = false;
            }
        }
    }
    
    /**
     * Adiciona uma nova mensagem ao container de chat
     */
    function appendMessage(chatBox, message) {
        const currentUserId = parseInt(document.body.dataset.userId);
        const isMyMessage = message.user_id === currentUserId;
        
        // Formata a hora
        const messageTime = message.created_at;
        
        // Cria o elemento da mensagem
        const messageEl = document.createElement('div');
        messageEl.className = `flex ${isMyMessage ? 'justify-end' : 'justify-start'}`;
        
        // Adiciona com efeito de aparecimento suave
        messageEl.style.opacity = '0';
        messageEl.style.transform = 'translateY(20px)';
        messageEl.style.transition = 'opacity 0.3s ease, transform 0.3s ease';
        
        const messageContent = `
            <div class="max-w-[70%] ${isMyMessage ? 'bg-purple-600/10 border-r-4 border-purple-500' : 'bg-gray-800/30 border-l-4 border-cyan-500'} p-6 rounded-lg shadow-2xl backdrop-blur-sm">
                <div class="flex items-center justify-between mb-2 space-x-12">
                    <span class="text-[10px] font-black uppercase ${isMyMessage ? 'text-purple-400' : 'text-cyan-400'}">
                        ${message.user_name} // ${isMyMessage ? 'You' : 'Client'}
                    </span>
                    <span class="text-[9px] text-gray-600">${messageTime}</span>
                </div>
                <p class="text-sm text-gray-200 leading-relaxed">${message.content ? message.content.replace(/\n/g, '<br>') : ''}</p>
                ${message.attachment ? 
                    `<div class="mt-4 border border-white/5 rounded overflow-hidden">
                        <img src="${message.attachment}" class="max-h-[500px] w-full object-contain bg-black/50">
                    </div>` : 
                    ''}
            </div>
        `;
        
        messageEl.innerHTML = messageContent;
        
        // Remove a mensagem "No_Data_Exchange_Logged" se existir
        const emptyState = chatBox.querySelector('.opacity-20.italic');
        if (emptyState) {
            emptyState.remove();
        }
        
        // Adiciona a mensagem ao chat
        chatBox.appendChild(messageEl);
        
        // Trigger animation
        setTimeout(() => {
            messageEl.style.opacity = '1';
            messageEl.style.transform = 'translateY(0)';
        }, 10);
    }
    
    /**
     * Mostra uma mensagem de feedback ao usuário
     */
    function showFeedback(type, message) {
        // Verifica se já existe uma notificação e remove
        const existingNotification = document.getElementById('async-feedback');
        if (existingNotification) {
            existingNotification.remove();
        }
        
        // Cria o elemento de feedback
        const notification = document.createElement('div');
        notification.id = 'async-feedback';
        notification.className = `fixed bottom-6 right-6 px-6 py-4 rounded-lg shadow-lg z-50 transition-all duration-300 transform translate-y-20 opacity-0 max-w-md ${type === 'success' ? 'bg-green-900/90 border-l-4 border-green-500 text-green-100' : 'bg-red-900/90 border-l-4 border-red-500 text-red-100'}`;
        notification.innerHTML = `
            <div class="flex items-center space-x-3">
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="${type === 'success' ? 'M5 13l4 4L19 7' : 'M6 18L18 6M6 6l12 12'}" />
                    </svg>
                </div>
                <div>
                    <h4 class="font-bold">${type === 'success' ? 'Sucesso!' : 'Erro!'}</h4>
                    <p class="text-sm">${message}</p>
                </div>
            </div>
            <button class="absolute top-3 right-3 text-sm opacity-70 hover:opacity-100" onclick="this.parentElement.remove()">×</button>
        `;
        
        // Adiciona ao body
        document.body.appendChild(notification);
        
        // Anima a entrada
        setTimeout(() => {
            notification.style.transform = 'translate(0)';
            notification.style.opacity = '1';
        }, 10);
        
        // Remove após alguns segundos
        setTimeout(() => {
            notification.style.transform = 'translateY(20px)';
            notification.style.opacity = '0';
            setTimeout(() => notification.remove(), 300);
        }, 5000);
    }
});