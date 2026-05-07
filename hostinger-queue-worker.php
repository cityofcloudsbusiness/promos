<?php
/**
 * Script para processamento de filas Laravel na Hostinger
 * 
 * Como você não tem acesso SSH como root para manter um worker contínuo,
 * este script será executado via Cron Job para processar as filas periodicamente.
 */

// Defina o número máximo de jobs que serão processados em cada execução
$maxJobs = 50;

// Defina o timeout para cada job (em segundos)
$timeout = 60;

// Defina a conexão de fila que você está usando (matches QUEUE_CONNECTION in .env)
$connection = 'database';

// Defina a fila padrão (ou substitua por sua fila específica)
$queue = 'default';

// Caminho para o Artisan do Laravel
$artisan = __DIR__ . '/artisan';

// Comando que será executado
$command = "php $artisan queue:work $connection --queue=$queue --stop-when-empty --max-jobs=$maxJobs --timeout=$timeout";

// Executa o comando
exec($command, $output, $returnVar);

// Registra a saída para depuração (opcional)
$logFile = __DIR__ . '/storage/logs/queue-worker.log';
file_put_contents(
    $logFile,
    '[' . date('Y-m-d H:i:s') . '] ' . 
    "Return code: $returnVar, Output: " . implode(PHP_EOL, $output) . PHP_EOL,
    FILE_APPEND
);

echo "Queue worker executed. Processed jobs: " . count($output) . "\n";