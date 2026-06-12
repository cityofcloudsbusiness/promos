<?php

/**
 * Registro central de todos os planos de assinatura.
 *
 * Para adicionar um novo plano:
 *   1. Crie o produto no Stripe e copie o price_id
 *   2. Adicione STRIPE_PRICE_ID_XXXX no .env
 *   3. Adicione a entrada abaixo com o mesmo slug usado nos botões
 *
 * Campos:
 *   label           → Nome exibido ao usuário
 *   subtitle        → Categoria (Site, Marketing, IA...)
 *   description     → Subtítulo do card
 *   price           → Preço exibido (string formatada)
 *   currency        → Símbolo da moeda
 *   period          → "/mês" ou "/ano"
 *   price_note      → Nota extra (ex: equivalente mensal)
 *   billing_note    → Texto de renovação
 *   badge           → Badge destacada no topo do card (null = sem badge)
 *   savings         → Texto de economia (null = sem)
 *   color           → pink | cyan | violet | fuchsia
 *   features        → array de ['text' => '...', 'highlight' => bool]
 *   stripe_price_id → price_id real resolvido do .env (não chamar env() na view)
 *   type            → valor salvo em users.subscription_type
 *   is_annual       → true = salva subscription_expires_at = +1 ano
 */

return [

    /* ─────────────────────────────────────────
     |  SITE + MANUTENÇÃO
     ───────────────────────────────────────── */
    'site-mensal' => [
        'label'           => 'Plano Mensal',
        'subtitle'        => 'Site + Manutenção',
        'description'     => 'Sem fidelidade. Cancele quando quiser.',
        'price'           => '197,99',
        'currency'        => 'R$',
        'period'          => '/mês',
        'price_note'      => null,
        'billing_note'    => 'Renovação mensal automática',
        'badge'           => null,
        'savings'         => null,
        'color'           => 'pink',
        'features'        => [
            ['text' => 'Site Profissional Personalizado',   'highlight' => false],
            ['text' => 'Hospedagem Premium Cloud 24/7',     'highlight' => false],
            ['text' => 'Certificado SSL + HTTPS Ativo',     'highlight' => false],
            ['text' => 'Suporte Técnico Mensal',            'highlight' => false],
            ['text' => 'Atualizações de Código Mensais',   'highlight' => false],
            ['text' => 'Dashboard de Acompanhamento',      'highlight' => false],
        ],
        'stripe_price_id' => env('STRIPE_PRICE_ID'),
        // 'subscription' = preço recorrente no Stripe | 'payment' = cobrança única
        'checkout_mode'   => 'subscription',
        'dashboard'       => 'dashboard',
        'type'            => 'monthly',
        'is_annual'       => false,
    ],

    'site-anual' => [
        'label'           => 'Plano Anual PRO',
        'subtitle'        => 'Site + Manutenção',
        'description'     => 'Máxima economia para quem foca no longo prazo.',
        'price'           => '2.138,29',
        'currency'        => 'R$',
        'period'          => '/ano',
        'price_note'      => '(R$178,19/mês)',
        'billing_note'    => 'Cobrado anualmente — renova automaticamente',
        'badge'           => '10% de Desconto',
        'savings'         => 'Economia de R$237,59 no ano',
        'color'           => 'cyan',
        'features'        => [
            ['text' => 'Tudo do Plano Mensal',              'highlight' => false],
            ['text' => 'Prioridade Máxima de Suporte',      'highlight' => true],
            ['text' => 'Renovação Anual Automática',        'highlight' => false],
            ['text' => 'Hospedagem Premium Cloud 24/7',     'highlight' => false],
            ['text' => 'Dashboard de Acompanhamento',      'highlight' => false],
        ],
        'stripe_price_id' => env('STRIPE_PRICE_ID2'),
        // Preço cadastrado no Stripe como pagamento único (one-time) → mode: payment
        'checkout_mode'   => 'payment',
        'dashboard'       => 'dashboard',
        'type'            => 'annual',
        'is_annual'       => true,
    ],

    'site-ia' => [
        'label'           => 'Plano IA',
        'subtitle'        => 'Site + Inteligência Artificial',
        'description'     => 'Inteligência artificial integrada ao seu projeto.',
        'price'           => '497',
        'currency'        => 'R$',
        'period'          => '/mês',
        'price_note'      => null,
        'billing_note'    => 'Renovação mensal automática',
        'badge'           => null,
        'savings'         => null,
        'color'           => 'violet',
        'features'        => [
            ['text' => 'Tudo do Plano Mensal',                    'highlight' => false],
            ['text' => 'Agentes de IA Autônomos 24h',             'highlight' => true],
            ['text' => 'Automação de Processos com IA',           'highlight' => true],
            ['text' => 'Chatbot Personalizado',                   'highlight' => false],
            ['text' => 'Relatórios Inteligentes Automatizados',   'highlight' => false],
            ['text' => 'Prioridade Máxima de Suporte',            'highlight' => false],
        ],
        'stripe_price_id' => env('STRIPE_PRICE_ID_IA'),
        'checkout_mode'   => 'subscription',
        'dashboard'       => 'dashboard',
        'type'            => 'ia',
        'is_annual'       => false,
    ],

    /* ─────────────────────────────────────────
     |  MARKETING DIGITAL
     ───────────────────────────────────────── */
    'marketing-aceleracao' => [
        'label'           => 'Aceleração',
        'subtitle'        => 'Marketing Digital',
        'description'     => 'Ideal para negócios locais querendo os primeiros clientes online.',
        'price'           => '997',
        'currency'        => 'R$',
        'period'          => '/mês',
        'price_note'      => null,
        'billing_note'    => 'Renovação mensal automática',
        'badge'           => null,
        'savings'         => null,
        'color'           => 'fuchsia',
        'features'        => [
            ['text' => 'Gestão de Tráfego (1 Plataforma)',  'highlight' => false],
            ['text' => '2 Reuniões de Alinhamento/mês',     'highlight' => false],
            ['text' => 'Relatório Mensal de ROI',           'highlight' => false],
        ],
        'stripe_price_id' => env('STRIPE_PRICE_ID_MKT_ACC'),
        'checkout_mode'   => 'subscription',
        'dashboard'       => 'dashboard.marketing',
        'type'            => 'marketing-aceleracao',
        'is_annual'       => false,
    ],

    'marketing-dominancia' => [
        'label'           => 'Dominância Total',
        'subtitle'        => 'Marketing Digital',
        'description'     => 'O ecossistema completo para monopolizar seu mercado.',
        'price'           => '1.997',
        'currency'        => 'R$',
        'period'          => '/mês',
        'price_note'      => null,
        'billing_note'    => 'Renovação mensal automática',
        'badge'           => 'Recomendado',
        'savings'         => null,
        'color'           => 'fuchsia',
        'features'        => [
            ['text' => 'Tráfego Multi-Plataforma (Meta, Google, TikTok)',   'highlight' => false],
            ['text' => 'Gestão Completa de Redes Sociais (3 Posts/Semana)', 'highlight' => true],
            ['text' => 'Otimização Semanal de SEO',                         'highlight' => false],
            ['text' => 'Dashboard Analítico em Tempo Real',                 'highlight' => false],
            ['text' => 'Reunião Estratégica Semanal',                       'highlight' => true],
        ],
        'stripe_price_id' => env('STRIPE_PRICE_ID_MKT_DOM'),
        'checkout_mode'   => 'subscription',
        'dashboard'       => 'dashboard.marketing',
        'type'            => 'marketing-dominancia',
        'is_annual'       => false,
    ],

    /* ─────────────────────────────────────────
     |  INTELIGÊNCIA ARTIFICIAL
     ───────────────────────────────────────── */
    'ia-starter' => [
        'label'           => 'Agente Starter',
        'subtitle'        => 'Inteligência Artificial',
        'description'     => 'O funcionário perfeito para recepcionar e tirar dúvidas de clientes.',
        'price'           => '497',
        'currency'        => 'R$',
        'period'          => '/mês',
        'price_note'      => null,
        'billing_note'    => 'Renovação mensal automática',
        'badge'           => null,
        'savings'         => null,
        'color'           => 'cyan',
        'features'        => [
            ['text' => 'Atendimento WhatsApp Ilimitado',         'highlight' => false],
            ['text' => 'Respostas Treinadas do seu Negócio',     'highlight' => false],
            ['text' => 'Dashboard de Acompanhamento',           'highlight' => false],
        ],
        'stripe_price_id' => env('STRIPE_PRICE_ID_IA_STARTER'),
        'checkout_mode'   => 'subscription',
        'dashboard'       => 'dashboard.ia',
        'type'            => 'ia-starter',
        'is_annual'       => false,
    ],

    'ia-autonoma' => [
        'label'           => 'Operação Autônoma',
        'subtitle'        => 'Inteligência Artificial',
        'description'     => 'Sistema que gerencia agendas, qualifica leads e realiza fluxos complexos.',
        'price'           => '1.497',
        'currency'        => 'R$',
        'period'          => '/mês',
        'price_note'      => null,
        'billing_note'    => 'Renovação mensal automática',
        'badge'           => 'Revolução Neural',
        'savings'         => null,
        'color'           => 'cyan',
        'features'        => [
            ['text' => 'Tudo do pacote Starter',                 'highlight' => false],
            ['text' => 'Análise Preditiva de Dados',             'highlight' => true],
            ['text' => 'Automação de ERP & Contratos',           'highlight' => true],
            ['text' => 'Campanhas Inteligentes de Tráfego',      'highlight' => false],
        ],
        'stripe_price_id' => env('STRIPE_PRICE_ID_IA_AUTONOMA'),
        'checkout_mode'   => 'subscription',
        'dashboard'       => 'dashboard.ia',
        'type'            => 'ia-autonoma',
        'is_annual'       => false,
    ],

];
