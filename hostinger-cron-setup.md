# Configuração de Cron Jobs para Laravel na Hostinger

Este documento explica como configurar corretamente os Cron Jobs necessários para seu aplicativo Laravel na Hostinger, especialmente para o sistema de mensagens e filas.

## Acesso ao Cron Jobs no hPanel

1. Faça login no hPanel da Hostinger
2. Navegue até a seção "Avançado"
3. Clique em "Cron Jobs"

## Cron Jobs Recomendados para Laravel

### 1. Processador de Filas (para o sistema de mensagens)

Configure um Cron Job que executa o script de processamento de filas a cada 5-15 minutos:

```
*/10 * * * * php /home/u123456/public_html/hostinger-queue-worker.php > /dev/null 2>&1
```

Ajuste o caminho `/home/u123456/public_html/` para o caminho completo do seu diretório na Hostinger.

### 2. Laravel Scheduler (opcional, mas recomendado)

Se você estiver usando o Laravel Scheduler para tarefas programadas:

```
* * * * * php /home/u123456/public_html/artisan schedule:run > /dev/null 2>&1
```

## Verificação e Solução de Problemas

### Verificar se os Cron Jobs estão funcionando:

1. Adicione logging temporário aos seus scripts para confirmar a execução:

```php
// Adicione ao seu script hostinger-queue-worker.php
$logFile = __DIR__ . '/storage/logs/cron-execution.log';
file_put_contents(
    $logFile,
    '[' . date('Y-m-d H:i:s') . '] Cron executed' . PHP_EOL,
    FILE_APPEND
);
```

2. Verifique o arquivo de log após alguns minutos para confirmar que o Cron está rodando.

### Problemas comuns e soluções:

1. **Permissões**: Certifique-se de que os scripts tenham permissão de execução:
   ```
   chmod +x /home/u123456/public_html/hostinger-queue-worker.php
   ```

2. **Caminhos absolutos**: Sempre use caminhos absolutos completos nos Cron Jobs da Hostinger.

3. **Erros de PHP**: Verifique o log de erros do PHP se os Cron Jobs não estiverem funcionando.

4. **Timeout**: Para trabalhos longos, considere aumentar o valor do parâmetro `--timeout` no script queue worker.

## Notas Importantes

- A Hostinger pode ter limites no uso de CPU por scripts. Configure seus trabalhos de fila para processar um número razoável de jobs por execução.
- Evite processar arquivos muito grandes em uma única execução de Cron Job.
- Monitore o uso de recursos para garantir que seus scripts não ultrapassem os limites da Hostinger.