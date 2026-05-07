<?php
/**
 * Script de verificação de ambiente para Laravel na Hostinger
 * 
 * Este script verifica se seu ambiente na Hostinger está configurado
 * corretamente para executar o Laravel e as funcionalidades de mensageiro/filas.
 * 
 * Instruções:
 * 1. Faça upload deste arquivo para a raiz do seu projeto
 * 2. Acesse https://seudominio.com/hostinger-env-check.php
 * 3. Revise os resultados e corrija quaisquer problemas antes de lançar
 * 4. Remova este arquivo após a verificação por segurança
 */

echo '<html><head><title>Laravel Hostinger Environment Check</title>';
echo '<style>
    body { font-family: Arial, sans-serif; max-width: 1000px; margin: 20px auto; padding: 20px; line-height: 1.6; }
    h1, h2 { color: #333; }
    .success { color: green; }
    .warning { color: orange; }
    .error { color: red; }
    .section { background: #f5f5f5; padding: 15px; margin-bottom: 20px; border-radius: 5px; }
    table { width: 100%; border-collapse: collapse; }
    th, td { text-align: left; padding: 8px; border-bottom: 1px solid #ddd; }
    th { background-color: #f2f2f2; }
    .code { font-family: monospace; background: #eee; padding: 2px 4px; }
</style>';
echo '</head><body>';

echo '<h1>Laravel Hostinger Environment Check</h1>';

// Verifica PHP versão
echo '<div class="section">';
echo '<h2>PHP Environment</h2>';
echo '<table>';
echo '<tr><th>Requirement</th><th>Status</th><th>Details</th></tr>';

// PHP Version
echo '<tr><td>PHP Version</td><td>';
if (version_compare(PHP_VERSION, '8.1.0', '>=')) {
    echo '<span class="success">✓ Good</span>';
} else {
    echo '<span class="error">✗ Error</span>';
}
echo '</td><td>Current: ' . PHP_VERSION . ' (Laravel 13 requires PHP 8.1+)</td></tr>';

// Extensions required for Laravel
$requiredExtensions = [
    'BCMath', 'Ctype', 'Fileinfo', 'JSON', 'Mbstring', 'OpenSSL', 'PDO', 
    'PDO_MySQL', 'Tokenizer', 'XML', 'cURL', 'GD', 'zip'
];

foreach ($requiredExtensions as $ext) {
    $extName = strtolower($ext);
    if ($ext == 'PDO_MySQL') $extName = 'pdo_mysql';
    
    echo '<tr><td>Extension: ' . $ext . '</td><td>';
    if (extension_loaded($extName)) {
        echo '<span class="success">✓ Loaded</span>';
    } else {
        echo '<span class="error">✗ Not Loaded</span>';
    }
    echo '</td><td>';
    if (!extension_loaded($extName)) {
        echo 'Add <span class="code">extension=' . $extName . '</span> to your php.ini';
    }
    echo '</td></tr>';
}

// Verificações específicas para Email
echo '<tr><td>Email Functions</td><td>';
if (function_exists('mail')) {
    echo '<span class="success">✓ Available</span>';
} else {
    echo '<span class="error">✗ Not Available</span>';
}
echo '</td><td>PHP mail() function is ' . (function_exists('mail') ? 'available' : 'not available') . '</td></tr>';

// Verificações de função para sockets (SMTP)
echo '<tr><td>Socket Functions (SMTP)</td><td>';
if (function_exists('fsockopen')) {
    echo '<span class="success">✓ Available</span>';
} else {
    echo '<span class="warning">⚠ Limited</span>';
}
echo '</td><td>fsockopen function is ' . (function_exists('fsockopen') ? 'available' : 'not available') . '</td></tr>';

echo '</table>';
echo '</div>';

// Verificações de Permissão de Diretório
echo '<div class="section">';
echo '<h2>Directory Permissions</h2>';
echo '<table>';
echo '<tr><th>Directory</th><th>Status</th><th>Details</th></tr>';

$directoriesToCheck = [
    'storage/app' => 0755,
    'storage/framework' => 0755,
    'storage/framework/cache' => 0755,
    'storage/framework/sessions' => 0755,
    'storage/framework/views' => 0755,
    'storage/logs' => 0755,
    'bootstrap/cache' => 0755
];

$projectRoot = __DIR__;

foreach ($directoriesToCheck as $dir => $requiredPermission) {
    $fullPath = $projectRoot . '/' . $dir;
    echo '<tr><td>' . $dir . '</td><td>';
    
    if (file_exists($fullPath)) {
        $perms = fileperms($fullPath);
        $permsOctal = substr(sprintf('%o', $perms), -4);
        $isWritable = is_writable($fullPath);
        
        if ($isWritable) {
            echo '<span class="success">✓ Writable</span>';
        } else {
            echo '<span class="error">✗ Not Writable</span>';
        }
    } else {
        echo '<span class="error">✗ Not Found</span>';
    }
    
    echo '</td><td>';
    if (file_exists($fullPath)) {
        echo 'Current permissions: ' . $permsOctal . ' | Writable: ' . ($isWritable ? 'Yes' : 'No');
        if (!$isWritable) {
            echo ' | Fix: <span class="code">chmod -R 755 ' . $dir . '</span>';
        }
    } else {
        echo 'Directory not found. Make sure it exists.';
    }
    echo '</td></tr>';
}

echo '</table>';
echo '</div>';

// Verificações de Conectividade do Email
echo '<div class="section">';
echo '<h2>Email Connectivity</h2>';

echo '<p>To test SMTP connectivity, you\'ll need to configure your .env file with valid SMTP settings.</p>';

$mailConfig = [
    'host' => getenv('MAIL_HOST') ?: 'Not configured',
    'port' => getenv('MAIL_PORT') ?: 'Not configured',
    'username' => getenv('MAIL_USERNAME') ?: 'Not configured',
    'password' => getenv('MAIL_PASSWORD') ? '********' : 'Not configured',
    'encryption' => getenv('MAIL_ENCRYPTION') ?: 'Not configured'
];

echo '<table>';
echo '<tr><th>Setting</th><th>Value</th><th>Recommendation</th></tr>';

foreach ($mailConfig as $key => $value) {
    echo '<tr><td>MAIL_' . strtoupper($key) . '</td><td>' . $value . '</td><td>';
    
    switch ($key) {
        case 'host':
            echo 'Use <span class="code">smtp.hostinger.com</span> for Hostinger';
            break;
        case 'port':
            echo 'Use <span class="code">587</span> (TLS) or <span class="code">465</span> (SSL)';
            break;
        case 'encryption':
            echo 'Use <span class="code">tls</span> with port 587 or <span class="code">ssl</span> with port 465';
            break;
        default:
            echo 'Configure according to your Hostinger email settings';
    }
    
    echo '</td></tr>';
}

echo '</table>';

// SMTP Test
echo '<h3>SMTP Connection Test</h3>';

if (!empty($mailConfig['host']) && $mailConfig['host'] !== 'Not configured' && 
    !empty($mailConfig['port']) && $mailConfig['port'] !== 'Not configured') {
    
    if (function_exists('fsockopen')) {
        $host = $mailConfig['host'];
        $port = $mailConfig['port'];
        
        $errno = 0;
        $errstr = '';
        $timeout = 5; // 5 seconds timeout
        
        echo '<p>Attempting to connect to ' . $host . ':' . $port . '...</p>';
        
        $socket = @fsockopen($host, $port, $errno, $errstr, $timeout);
        
        if ($socket) {
            echo '<p class="success">✓ Connection successful! SMTP server is accessible.</p>';
            fclose($socket);
        } else {
            echo '<p class="error">✗ Connection failed: ' . $errstr . ' (Error code: ' . $errno . ')</p>';
            echo '<p>Possible solutions:<br>';
            echo '- Make sure your SMTP host and port are correct.<br>';
            echo '- Check if outgoing connections to this port are allowed by Hostinger.<br>';
            echo '- Try alternate ports: 587 (TLS) or 465 (SSL).<br>';
            echo '- Contact Hostinger support to make sure SMTP connections are allowed.</p>';
        }
    } else {
        echo '<p class="warning">⚠ Cannot test SMTP connection: fsockopen function is not available.</p>';
    }
} else {
    echo '<p class="warning">⚠ SMTP settings not configured. Complete your .env file first.</p>';
}

echo '</div>';

// Verificação de Sistema de Filas
echo '<div class="section">';
echo '<h2>Queue System</h2>';

$queueConnection = getenv('QUEUE_CONNECTION') ?: 'Not configured';
$queueDriver = getenv('QUEUE_DRIVER') ?: 'Not configured';

echo '<table>';
echo '<tr><th>Setting</th><th>Value</th><th>Recommendation</th></tr>';
echo '<tr><td>QUEUE_CONNECTION</td><td>' . $queueConnection . '</td><td>Use <span class="code">database</span> for Hostinger</td></tr>';
echo '<tr><td>QUEUE_DRIVER</td><td>' . $queueDriver . '</td><td>Use <span class="code">database</span> for Hostinger</td></tr>';
echo '</table>';

echo '<h3>Queue Configuration Advice</h3>';
echo '<p>Since Hostinger doesn\'t allow persistent background processes, you should:</p>';
echo '<ol>';
echo '<li>Use database driver for queues</li>';
echo '<li>Set up a Cron Job in Hostinger\'s hPanel to run <span class="code">php /home/username/public_html/hostinger-queue-worker.php</span> every 5-15 minutes</li>';
echo '<li>Alternatively, use the Laravel scheduler with <span class="code">php artisan schedule:run</span> if you have batch processing needs</li>';
echo '</ol>';

echo '</div>';

// Recomendações finais
echo '<div class="section">';
echo '<h2>Final Deployment Recommendations</h2>';
echo '<ol>';
echo '<li>Set <span class="code">APP_ENV=production</span> and <span class="code">APP_DEBUG=false</span> in your .env file</li>';
echo '<li>Run <span class="code">php artisan config:cache</span> and <span class="code">php artisan route:cache</span> after deployment</li>';
echo '<li>Ensure proper HTTPS configuration with <span class="code">ASSET_URL=https://yourdomain.com</span></li>';
echo '<li>Set up Cron Jobs for your queue processing script and Laravel scheduler</li>';
echo '<li>Remove this verification file after checking your environment</li>';
echo '</ol>';
echo '</div>';

echo '</body></html>';