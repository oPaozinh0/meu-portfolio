{{-- =====================================================================
     ATTRION — layout master
     Used by views migrated to the new design system.
     ===================================================================== --}}
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Attrion')</title>

    <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}">
    <link rel="apple-touch-icon" href="{{ asset('favicon.svg') }}">
    <meta name="theme-color" content="#080808">

    {{-- Default = noindex. Páginas indexáveis (portfolio, /now) sobrescrevem via @push('head'). --}}
    @hasSection('robots-override')
        @yield('robots-override')
    @else
        <meta name="robots" content="noindex, nofollow">
    @endif

    {{-- Anti-flash: aplica data-theme antes do paint --}}
    <script>
        (function () {
            var t = localStorage.getItem('attrion-theme');
            var valid = ['dark', 'dark-slate', 'dark-forest', 'dark-warm', 'light', 'light-warm'];
            if (valid.indexOf(t) === -1) {
                t = window.matchMedia && window.matchMedia('(prefers-color-scheme: light)').matches
                    ? 'light'
                    : 'dark';
            }
            document.documentElement.setAttribute('data-theme', t);
        })();
    </script>

    {{-- Fontes --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=JetBrains+Mono:wght@400;700&display=swap" rel="stylesheet">

    {{-- Vite (apenas attrion entries; o app.css/js antigo NÃO é carregado aqui) --}}
    @vite(['resources/css/attrion.css', 'resources/js/attrion.js'])

    @stack('head')
</head>
<body x-data="appState()" x-init="initTheme()" class="attrion">

    {{-- Cursor (desktop) --}}
    <div id="cd"></div>
    <div id="cr"></div>

    @yield('content')

    @include('layouts.partials.appearance-modal')

    @stack('scripts')
</body>
</html>
