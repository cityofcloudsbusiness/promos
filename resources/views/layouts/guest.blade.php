<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>City Agency | Agência Digital — Sites, Marketing e IA em Uberlândia</title>

    <meta name="description" content="City Agency: agência digital em Uberlândia especializada em criação de sites profissionais, manutenção, marketing digital, tráfego pago e agentes de inteligência artificial para empresas que querem crescer online.">
    <meta name="keywords" content="agência digital Uberlândia, criação de sites, manutenção de sites, marketing digital, tráfego pago, agentes de IA, inteligência artificial, automação, Google Ads, Meta Ads, Instagram, SEO, City Agency">
    <meta name="robots" content="index, follow">
    <meta name="author" content="City Agency">

    <meta property="og:title" content="City Agency | Agência Digital — Sites, Marketing e IA">
    <meta property="og:description" content="Criação de sites, marketing digital e agentes de IA para alavancar o seu negócio. Atendemos empresas em Uberlândia e em todo o Brasil.">
    <meta property="og:image" content="{{ asset('favicon.png') }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">
    <meta property="og:locale" content="pt_BR">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="City Agency | Agência Digital">
    <meta name="twitter:description" content="Sites, marketing digital e IA para empresas que querem crescer online.">

    <link rel="canonical" href="{{ url()->current() }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon.png') }}?v=2">
    <link rel="shortcut icon" href="{{ asset('favicon.png') }}?v=2">
    <link rel="apple-touch-icon" href="{{ asset('favicon.png') }}?v=2">

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="font-sans text-gray-900 antialiased dark:bg-dark-950 dark:text-gray-100 overflow-x-hidden">


    <main class="overflow-x-hidden">
        {{ $slot }}
    </main>

    
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 800,
            once: true,
        });
    </script>

</body>

</html>