<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @if(app()->getLocale() == 'pt-br')
        <title>Davi Oliveira - Desenvolvedor Fullstack Laravel</title>
        <meta name="description" content="Davi Oliveira, Desenvolvedor Fullstack Sênior especializado em Laravel. Conheça meus projetos, experiência e habilidades.">
        <meta name="keywords" content="Desenvolvedor Fullstack, Laravel, PHP, Desenvolvedor Web, Portfólio, Davi Oliveira">
    @else
        <title>Davi Oliveira - Fullstack Laravel Developer</title>
        <meta name="description" content="Davi Oliveira, a Senior Fullstack Developer specializing in Laravel. Discover my projects, experience, and skills.">
        <meta name="keywords" content="Fullstack Developer, Laravel, PHP, Web Developer, Portfolio, Davi Oliveira">
    @endif
    
    {{-- Substitua pela URL real do seu site quando fizer o deploy --}}
    <meta property="og:url" content="https://opaozinh0.live">
    <meta property="twitter:url" content="https://opaozinh0.live">
    {{-- Substitua pela URL de uma imagem de preview --}}
    <meta property="og:image" content="https://i.imgur.com/fvIQp4q.png">
    <meta property="twitter:image" content="https://i.imgur.com/fvIQp4q.png">

    {{-- Open Graph & Twitter Cards --}}
    @if(app()->getLocale() == 'pt-br')
        <meta property="og:title" content="Davi Oliveira - Desenvolvedor Fullstack Laravel">
        <meta property="og:description" content="Portfólio de Davi Oliveira, Desenvolvedor Fullstack Sênior.">
        <meta property="twitter:title" content="Davi Oliveira - Desenvolvedor Fullstack Laravel">
        <meta property="twitter:description" content="Portfólio de Davi Oliveira, Desenvolvedor Fullstack Sênior.">
    @else
        <meta property="og:title" content="Davi Oliveira - Fullstack Laravel Developer">
        <meta property="og:description" content="Portfolio of Davi Oliveira, a Senior Fullstack Developer.">
        <meta property="twitter:title" content="Davi Oliveira - Fullstack Laravel Developer">
        <meta property="twitter:description" content="Portfolio of Davi Oliveira, a Senior Fullstack Developer.">
    @endif
    <meta property="og:type" content="website">
    <meta property="twitter:card" content="summary_large_image">

    <link rel="icon" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'><style>@media(prefers-color-scheme:dark){rect{fill:%23dd6b20}}</style><rect width='100' height='100' rx='15' fill='%23F5770A'/><text x='50' y='55' font-size='50' text-anchor='middle' font-family='Inter,sans-serif' font-weight='700' fill='white'>DO</text></svg>">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">

    <script>
        window.translations = {
            'en': @json(Lang::get('portfolio', [], 'en')),
            'pt-br': @json(Lang::get('portfolio', [], 'pt-br'))
        };
    </script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-white dark:bg-zinc-900 text-zinc-800 dark:text-zinc-200 font-sans transition-colors duration-300">
    <x-theme-switcher />

    <main>
        <x-hero-section />
        <x-experience-section />
        <x-education-section />
        <x-skills-section />
        <x-site-footer />
    </main>

</body>
</html>