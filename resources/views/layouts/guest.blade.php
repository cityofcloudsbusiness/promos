<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} - Seu Título Otimizado para SEO com Palavras-Chave</title>

    <meta name="description" content="A descrição clara e concisa dos serviços, otimizada com palavras-chave principais para os rastreadores do Google.">

    <meta property="og:title" content="Seu Título Otimizado para Redes Sociais">
    <meta property="og:description" content="Descrição chamativa para compartilhamento.">
    <meta property="og:image" content="{{ asset('images/og-image.jpg') }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">

    <link rel="canonical" href="{{ url()->current() }}">
    <link rel="icon" href="{{ asset('favicon.ico') }}">

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="font-sans text-gray-900 antialiased dark:bg-dark-950 dark:text-gray-100 overflow-x-hidden">

    @include('site.partials.nav')

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