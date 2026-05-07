<?php
/**
 * Modelo de configuração de filas para Laravel na Hostinger
 * 
 * Este arquivo serve apenas como referência para configurar
 * corretamente o sistema de filas do Laravel na Hostinger.
 * Não altere sua estrutura de arquivos existente.
 */

return [
    /*
    |--------------------------------------------------------------------------
    | Recomendações para Fila Padrão
    |--------------------------------------------------------------------------
    |
    | Na Hostinger, a conexão de fila mais confiável é 'database'
    | já que você não tem acesso a Redis ou serviços externos.
    |
    */
    
    'default' => env('QUEUE_CONNECTION', 'database'),

    /*
    |--------------------------------------------------------------------------
    | Configurações das Conexões de Filas
    |--------------------------------------------------------------------------
    |
    | Aqui você define as configurações para a conexão de fila database,
    | que é a mais adequada para o ambiente Hostinger.
    |
    */

    'connections' => [
        'database' => [
            'driver' => 'database',
            'table' => 'jobs',
            'queue' => 'default',
            'retry_after' => 90, // Aumentado para compensar possíveis limitações
            'after_commit' => false,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Configurações de Trabalhos Falhados
    |--------------------------------------------------------------------------
    |
    | Importante definir um timeout adequado para a Hostinger que
    | geralmente possui limites de execução mais restritivos.
    |
    */

    'failed' => [
        'driver' => env('QUEUE_FAILED_DRIVER', 'database-uuids'),
        'database' => env('DB_CONNECTION', 'mysql'),
        'table' => 'failed_jobs',
    ],
];