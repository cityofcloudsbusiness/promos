<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nova mensagem de contato</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f4f4f4; margin: 0; padding: 0; }
        .wrapper { max-width: 600px; margin: 40px auto; background: #ffffff; border-radius: 8px; overflow: hidden; }
        .header { background: #020205; padding: 32px 40px; text-align: center; }
        .header h1 { color: #22d3ee; font-size: 22px; margin: 0; letter-spacing: 0.1em; text-transform: uppercase; }
        .header p { color: #64748b; font-size: 12px; margin: 6px 0 0; letter-spacing: 0.3em; text-transform: uppercase; }
        .body { padding: 40px; }
        .field { margin-bottom: 24px; }
        .field label { display: block; font-size: 11px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.2em; color: #22d3ee; margin-bottom: 6px; }
        .field p { font-size: 15px; color: #1e293b; margin: 0; line-height: 1.6; }
        .divider { border: none; border-top: 1px solid #e2e8f0; margin: 24px 0; }
        .footer { background: #f8fafc; padding: 20px 40px; text-align: center; }
        .footer p { font-size: 12px; color: #94a3b8; margin: 0; }
        .reply-hint { background: #f0fffe; border-left: 3px solid #22d3ee; padding: 12px 16px; border-radius: 4px; margin-top: 24px; font-size: 13px; color: #475569; }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="header">
            <h1>City Of Clouds</h1>
            <p>Nova mensagem de contato</p>
        </div>

        <div class="body">
            <div class="field">
                <label>Nome</label>
                <p>{{ $senderName }}</p>
            </div>
            <hr class="divider">
            <div class="field">
                <label>Email</label>
                <p>{{ $senderEmail }}</p>
            </div>
            <hr class="divider">
            <div class="field">
                <label>Assunto</label>
                <p>{{ $emailSubject }}</p>
            </div>
            <hr class="divider">
            <div class="field">
                <label>Mensagem</label>
                <p>{{ $messageText }}</p>
            </div>

            <div class="reply-hint">
                Responda diretamente a este email para entrar em contato com <strong>{{ $senderName }}</strong>.
            </div>
        </div>

        <div class="footer">
            <p>City Of Clouds &mdash; cityofclouds.com.br</p>
        </div>
    </div>
</body>
</html>
