{{-- =====================================================================
     ATTRION — admin master layout (sidebar + topbar + main)
     ===================================================================== --}}
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin · Davi Oliveira')</title>

    <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}">
    <link rel="apple-touch-icon" href="{{ asset('favicon.svg') }}">
    <meta name="theme-color" content="#080808">

    {{-- Admin nunca indexa --}}
    <meta name="robots" content="noindex, nofollow">

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

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=JetBrains+Mono:wght@400;700&display=swap" rel="stylesheet">

    @vite(['resources/css/attrion.css', 'resources/js/attrion.js'])

    @stack('head')
</head>
<body x-data="appState()" x-init="initTheme()" class="attrion" style="overflow: hidden;">

    <div id="cd"></div>
    <div id="cr"></div>

    <div class="app">

        @include('layouts.partials.admin-sidebar')

        <header class="topbar">
            <button class="ham"
                    :class="$store.attrion.mobileMenu ? 'open' : ''"
                    @click="$store.attrion.toggleMobileMenu()"
                    aria-label="Menu">
                <span></span><span></span><span></span>
            </button>

            <div class="tb-breadcrumb">
                <span class="tb-crumb-main">@yield('page-title', 'Dashboard')</span>
            </div>

            <div class="tb-actions">
                @yield('topbar-actions')

                <button @click="$store.attrion.openTheme()"
                        class="tb-btn-ghost"
                        style="display: flex; align-items: center; gap: 6px;"
                        :style="$store.attrion.themeOpen ? 'border-color: var(--fg); color: var(--fg);' : ''">
                    <svg width="11" height="11" viewBox="0 0 12 12" style="flex-shrink: 0;" aria-hidden="true">
                        <circle cx="6" cy="6" r="5.5" fill="none" stroke="currentColor" stroke-width="1" opacity=".5"/>
                        <path d="M6 0.5a5.5 5.5 0 0 1 0 11Z" fill="currentColor"/>
                    </svg>
                    <span x-text="themeName()"></span>
                </button>
            </div>
        </header>

        <main class="main">
            <div class="page">
                @yield('content')
            </div>
        </main>
    </div>

    @include('layouts.partials.appearance-modal')

    @stack('scripts')
</body>
</html>
