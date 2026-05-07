# Guia de Deploy do Laravel para Hostinger

Este guia contém instruções detalhadas para implantar com sucesso sua aplicação Laravel 13 com PHP 8.3 na Hostinger, com foco especial na funcionalidade de mensagens e filas.

## Índice

1. [Preparação Local](#1-preparação-local)
2. [Configuração do Banco de Dados](#2-configuração-do-banco-de-dados)
3. [Upload de Arquivos](#3-upload-de-arquivos)
4. [Configuração do .env](#4-configuração-do-env)
5. [Configurações para Email/SMTP](#5-configurações-para-emailsmtp)
6. [Configuração de Filas](#6-configuração-de-filas)
7. [Configuração de Permissões](#7-configuração-de-permissões)
8. [Verificação do Ambiente](#8-verificação-do-ambiente)
9. [Otimizações Finais](#9-otimizações-finais)
10. [Solução de Problemas Comuns](#10-solução-de-problemas-comuns)

## 1. Preparação Local

Antes de fazer o upload para a Hostinger, prepare seu projeto:

```bash
# Instale as dependências para produção
composer install --optimize-autoloader --no-dev

# Compile assets (se usando Laravel Mix ou Vite)
npm ci
npm run build

# Gere uma chave de aplicação se ainda não tiver
php artisan key:generate

# Execute o script de deploy incluído
bash hostinger-deploy.sh
```

## 2. Configuração do Banco de Dados

1. Acesse o hPanel da Hostinger
2. Vá para a seção MySQL Databases
3. Crie um novo banco de dados e usuário
4. Anote as credenciais para usar no arquivo .env

## 3. Upload de Arquivos

Existem duas abordagens para upload dos arquivos:

### Opção 1: Estrutura Padrão

Faça upload de todos os arquivos para o diretório `public_html` ou um subdiretório.

### Opção 2: Estrutura Segura (Recomendada)

1. Crie um diretório fora da pasta public_html, por exemplo: `laravel_app`
2. Faça upload de todos os arquivos do Laravel para este diretório
3. Copie apenas o conteúdo da pasta `public` para o diretório `public_html`
4. Edite o arquivo `public_html/index.php` para apontar para o diretório correto:

```php
// Altere estas linhas no index.php
require __DIR__.'/../laravel_app/vendor/autoload.php';
$app = require_once __DIR__.'/../laravel_app/bootstrap/app.php';
```

## 4. Configuração do .env

Crie ou edite o arquivo `.env` na raiz do seu projeto com as configurações adequadas para produção:

```
APP_NAME="Nome do Seu Sistema"
APP_ENV=production
APP_KEY=base64:SuaChaveAqui
APP_DEBUG=false
APP_URL=https://seudominio.com

# Conexão com banco de dados
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=seu_banco
DB_USERNAME=seu_usuario
DB_PASSWORD=sua_senha

# Configuração de email (detalhada na próxima seção)
MAIL_MAILER=smtp
MAIL_HOST=smtp.hostinger.com
MAIL_PORT=587
MAIL_USERNAME=email@seudominio.com
MAIL_PASSWORD=sua_senha_email
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=email@seudominio.com
MAIL_FROM_NAME="${APP_NAME}"

# Configuração de filas
QUEUE_CONNECTION=database
```

## 5. Configurações para Email/SMTP

A Hostinger tem configurações específicas para servidores SMTP:

### Detalhes da Configuração SMTP na Hostinger

| Configuração | Valor | Observações |
|-------------|-------|-------------|
| MAIL_HOST | smtp.hostinger.com | Servidor SMTP da Hostinger |
| MAIL_PORT | 587 | Porta para TLS (recomendada) |
| MAIL_PORT alternativo | 465 | Porta para SSL (alternativa) |
| MAIL_ENCRYPTION | tls | Use com porta 587 |
| MAIL_ENCRYPTION alternativo | ssl | Use com porta 465 |
| MAIL_USERNAME | email@seudominio.com | Use um email criado no cPanel da Hostinger |

### Restrições e Limites

- **Porta 25**: Geralmente bloqueada pela Hostinger por motivos de segurança
- **Limites de envio**: A Hostinger pode ter limites diários de envio de emails
- **Autenticação**: Sempre é necessária (nunca use sem autenticação)

Se você tiver problemas com o envio de emails, tente:

1. Alternar entre as portas 587 e 465
2. Verificar se o email e senha estão corretos
3. Confirmar se o email foi criado no painel da Hostinger

## 6. Configuração de Filas

Como a Hostinger não permite processos em segundo plano contínuos (como `php artisan queue:work` rodando o tempo todo), você precisa configurar uma solução alternativa:

### Passo 1: Migrar as tabelas de filas

Se você ainda não criou as tabelas necessárias:

```bash
php artisan queue:table
php artisan queue:failed-table
php artisan migrate
```

### Passo 2: Configurar o processamento periódico via Cron Job

1. Faça upload do arquivo `hostinger-queue-worker.php` para a raiz do seu site
2. Acesse o hPanel da Hostinger > Avançado > Cron Jobs
3. Configure um novo Cron Job com o comando:

```
*/10 * * * * php /home/u123456/public_html/hostinger-queue-worker.php
```

(Substitua `/home/u123456/public_html/` pelo caminho real do seu site)

Este Cron Job executará a cada 10 minutos e processará suas filas.

### Passo 3: Ajuste o tempo limite

Edite o arquivo `hostinger-queue-worker.php` se necessário para ajustar:
- O número máximo de jobs por execução
- O timeout por job
- A fila específica a ser processada

## 7. Configuração de Permissões

As permissões corretas são essenciais para o Laravel funcionar na Hostinger:

### Diretórios que precisam de permissões de escrita:

```
bootstrap/cache
storage
storage/app
storage/app/public
storage/framework
storage/framework/cache
storage/framework/sessions
storage/framework/views
storage/logs
```

### Comandos para configurar permissões:

Através do File Manager da Hostinger ou FTP, configure:

- Permissão 755 para diretórios
- Permissão 644 para arquivos

### Verificação de Permissões

Faça upload e execute o script `check-permissions.php` para verificar se as permissões estão corretas.

## 8. Verificação do Ambiente

Para garantir que tudo esteja configurado corretamente:

1. Faça upload do arquivo `hostinger-env-check.php` para sua raiz
2. Acesse `https://seudominio.com/hostinger-env-check.php` no navegador
3. Verifique os resultados e corrija quaisquer problemas identificados
4. **Importante:** Remova este arquivo após a verificação

## 9. Otimizações Finais

Uma vez que sua aplicação esteja funcionando, otimize-a para produção:

```bash
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

**Nota:** Se fizer alterações no arquivo .env ou nas configurações, execute `php artisan config:clear` antes de reconstruir o cache.

## 10. Solução de Problemas Comuns

### Problema: Erros 500 ao acessar o site

**Possíveis soluções:**
- Verifique o arquivo `.htaccess` na pasta public
- Confira os logs de erro (via cPanel ou em `storage/logs`)
- Certifique-se que o `APP_DEBUG=true` temporariamente para ver erros detalhados

### Problema: Falha no envio de emails

**Possíveis soluções:**
- Verifique se as credenciais SMTP estão corretas
- Tente porta alternativa (587 ou 465)
- Verifique se o email remetente existe na Hostinger

### Problema: Filas não estão sendo processadas

**Possíveis soluções:**
- Verifique se o Cron Job está configurado corretamente
- Adicione logging ao script `hostinger-queue-worker.php`
- Confirme que a tabela `jobs` foi criada no banco de dados

### Problema: Arquivos não são salvos (uploads falham)

**Possíveis soluções:**
- Verifique as permissões do diretório storage/app/public
- Execute `php artisan storage:link` se necessário
- Confirme os limites de upload no php.ini ou .htaccess

## Recursos Adicionais

- [Documentação oficial da Hostinger para PHP/Laravel](https://support.hostinger.com/en/articles/4455812-how-to-install-laravel-on-hostinger)
- [Documentação do Laravel sobre deployment](https://laravel.com/docs/10.x/deployment)

---

Esperamos que este guia ajude a implantar com sucesso seu projeto Laravel na Hostinger! Se encontrar problemas específicos, consulte o suporte da Hostinger ou a comunidade Laravel para assistência adicional.