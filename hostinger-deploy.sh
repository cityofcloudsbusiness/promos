#!/bin/bash

# Script de Deploy para Laravel na Hostinger
# Este script prepara seu aplicativo Laravel para produção na Hostinger
# Note: Execute este script localmente antes de fazer upload dos arquivos

echo "Laravel Hostinger Deployment Script"
echo "==================================="
echo ""

# 1. Otimizar Composer
echo "Otimizando dependências do Composer para produção..."
composer install --optimize-autoloader --no-dev

# 2. Compilar assets se estiver usando Laravel Mix ou Vite
if [ -f "package.json" ]; then
    echo "Compilando assets para produção..."
    npm ci
    npm run build
fi

# 3. Criar o arquivo .htaccess correto
echo "Criando arquivo .htaccess otimizado..."

cat > public/.htaccess << 'EOL'
<IfModule mod_rewrite.c>
    <IfModule mod_negotiation.c>
        Options -MultiViews -Indexes
    </IfModule>

    RewriteEngine On

    # Handle Authorization Header
    RewriteCond %{HTTP:Authorization} .
    RewriteRule .* - [E=HTTP_AUTHORIZATION:%{HTTP:Authorization}]
    
    # Force HTTPS
    RewriteCond %{HTTPS} off
    RewriteRule ^(.*)$ https://%{HTTP_HOST}%{REQUEST_URI} [L,R=301]

    # Redirect Trailing Slashes If Not A Folder...
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteCond %{REQUEST_URI} (.+)/$
    RewriteRule ^ %1 [L,R=301]

    # Send Requests To Front Controller...
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteRule ^ index.php [L]
    
    # Increase upload limits for larger files
    <IfModule mod_php.c>
        php_value upload_max_filesize 64M
        php_value post_max_size 64M
        php_value max_execution_time 300
        php_value max_input_time 300
    </IfModule>
</IfModule>

# Cache-Control Headers
<IfModule mod_expires.c>
    ExpiresActive On
    ExpiresByType image/jpg "access plus 1 year"
    ExpiresByType image/jpeg "access plus 1 year"
    ExpiresByType image/gif "access plus 1 year"
    ExpiresByType image/png "access plus 1 year"
    ExpiresByType image/webp "access plus 1 year"
    ExpiresByType text/css "access plus 1 month"
    ExpiresByType application/pdf "access plus 1 month"
    ExpiresByType text/javascript "access plus 1 month"
    ExpiresByType application/javascript "access plus 1 month"
    ExpiresByType application/x-javascript "access plus 1 month"
    ExpiresByType application/x-shockwave-flash "access plus 1 month"
    ExpiresByType image/x-icon "access plus 1 year"
    ExpiresDefault "access plus 2 days"
</IfModule>
EOL

echo "Arquivo .htaccess criado com sucesso!"

# 4. Criar o arquivo para verificar permissões
echo "Criando script de verificação de permissões..."

cat > check-permissions.php << 'EOL'
<?php
$directories = [
    'bootstrap/cache',
    'storage',
    'storage/app',
    'storage/app/public',
    'storage/framework',
    'storage/framework/cache',
    'storage/framework/sessions',
    'storage/framework/views',
    'storage/logs',
];

echo "Verificando permissões de diretórios para Laravel:\n\n";

$hasErrors = false;

foreach ($directories as $directory) {
    if (!file_exists($directory)) {
        echo "Erro: Diretório $directory não existe\n";
        $hasErrors = true;
        continue;
    }
    
    $isWritable = is_writable($directory);
    $perms = substr(sprintf('%o', fileperms($directory)), -4);
    
    echo "$directory: " . ($isWritable ? "Gravável ✓" : "Não gravável ✗") . " (Permissão: $perms)\n";
    
    if (!$isWritable) {
        $hasErrors = true;
    }
}

echo "\n";
if ($hasErrors) {
    echo "Foram detectados problemas de permissão. Use os seguintes comandos para corrigir:\n\n";
    echo "chmod -R 755 bootstrap/cache\n";
    echo "chmod -R 755 storage\n\n";
    echo "Após isso, os diretórios específicos dentro de storage devem ter permissão 755.\n";
} else {
    echo "Todas as permissões estão corretas! ✓\n";
}
EOL

echo "Script de verificação de permissões criado com sucesso!"

# 5. Criar arquivo robots.txt otimizado
echo "Criando robots.txt para produção..."

cat > public/robots.txt << 'EOL'
User-agent: *
Allow: /

# Desativar indexação de URLs administrativas
Disallow: /admin
Disallow: /login
Disallow: /register
Disallow: /password
Disallow: /storage

# Arquivos comuns para bloquear
Disallow: /*.json$
Disallow: /*.js$
Disallow: /*.css$
Disallow: /*.xml$

# Sitemap (ative esta linha se tiver um sitemap)
# Sitemap: https://seudominio.com/sitemap.xml
EOL

echo "Arquivo robots.txt criado com sucesso!"

# 6. Instruções finais
echo ""
echo "Preparação concluída! Siga os próximos passos:"
echo ""
echo "1. Faça upload de todos os arquivos para a Hostinger"
echo "2. Crie seu banco de dados na Hostinger"
echo "3. Configure o arquivo .env na Hostinger com as credenciais corretas"
echo "4. Execute os comandos via SSH (se disponível) ou PHP:"
echo "   - php artisan migrate --force"
echo "   - php artisan config:cache"
echo "   - php artisan route:cache"
echo "   - php artisan view:cache"
echo "5. Configure seus Cron Jobs conforme as instruções em hostinger-cron-setup.md"
echo "6. Verifique permissões usando o script check-permissions.php"
echo "7. Execute o script hostinger-env-check.php para validar seu ambiente"
echo ""
echo "Importante: Remova os scripts de verificação após a implantação bem-sucedida!"
echo ""
echo "Boa sorte com seu deploy! 🚀"