{{-- resources/views/portfolio.blade.php — landing pessoal --}}
@extends('layouts.attrion')

@section('title', __('portfolio.meta_title'))

@section('robots-override')
    <meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">
@endsection

@push('head')
    {{-- ── BASIC META ─────────────────────────────────────────────────── --}}
    <meta name="description" content="{{ __('portfolio.meta_description') }}">
    <meta name="keywords" content="{{ __('portfolio.meta_keywords') }}">
    <meta name="author" content="Davi Oliveira">
    <link rel="canonical" href="{{ url('/') }}">

    {{-- Alternates pra os 2 idiomas (mesma URL — locale via sessão) --}}
    <link rel="alternate" hreflang="x-default" href="{{ url('/') }}">
    <link rel="alternate" hreflang="pt-br" href="{{ url('/') }}">
    <link rel="alternate" hreflang="en" href="{{ url('/') }}">

    {{-- ── OPEN GRAPH ─────────────────────────────────────────────────── --}}
    <meta property="og:type" content="website">
    <meta property="og:locale" content="{{ app()->getLocale() === 'pt-br' ? 'pt_BR' : 'en_US' }}">
    <meta property="og:locale:alternate" content="{{ app()->getLocale() === 'pt-br' ? 'en_US' : 'pt_BR' }}">
    <meta property="og:site_name" content="{{ __('portfolio.site_name') }}">
    <meta property="og:title" content="{{ __('portfolio.meta_title') }}">
    <meta property="og:description" content="{{ __('portfolio.meta_description') }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:image" content="{{ asset('og-image.png') }}">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:image:alt" content="{{ __('portfolio.meta_image_alt') }}">

    {{-- ── TWITTER CARD ───────────────────────────────────────────────── --}}
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ __('portfolio.meta_title') }}">
    <meta name="twitter:description" content="{{ __('portfolio.meta_description') }}">
    <meta name="twitter:url" content="{{ url()->current() }}">
    <meta name="twitter:image" content="{{ asset('og-image.png') }}">
    <meta name="twitter:image:alt" content="{{ __('portfolio.meta_image_alt') }}">

    {{-- ── ASSETS ─────────────────────────────────────────────────────── --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/devicons/devicon@latest/devicon.min.css">
    <link rel="preload" as="style" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@900&display=swap" crossorigin>

    {{-- ── SCHEMA.ORG (Person + WebSite + ProfilePage) ────────────────── --}}
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@graph": [
            {
                "@type": "WebSite",
                "@id": @json(url('/') . '#website'),
                "url": @json(url('/')),
                "name": @json(__('portfolio.site_name')),
                "description": @json(__('portfolio.meta_description')),
                "inLanguage": ["pt-BR", "en-US"],
                "publisher": { "@id": @json(url('/') . '#me') }
            },
            {
                "@type": "Person",
                "@id": @json(url('/') . '#me'),
                "name": "Davi Oliveira",
                "alternateName": "Davi Vieira",
                "url": @json(url('/')),
                "image": @json(asset('og-image.png')),
                "jobTitle": "Analista de Banco de Dados Jr & Senior Full Stack Developer",
                "worksFor": {
                    "@type": "Organization",
                    "name": "Solinftec",
                    "url": "https://www.solinftec.com",
                    "description": "Global AgTech leader developing AI, robotics, and SaaS solutions for agriculture."
                },
                "description": @json(__('portfolio.meta_description')),
                "knowsAbout": [
                    "Oracle PL/SQL", "PostgreSQL", "PostGIS", "Geospatial Databases", "ELT / ETL Procedures",
                    "Laravel", "PHP", "TypeScript", "JavaScript", "React", "Next.js", "Vue.js", "Tailwind CSS",
                    "MySQL", "Redis", "MongoDB",
                    "Docker", "Kubernetes", "Git",
                    "SaaS Architecture", "Multi-tenant Systems",
                    "Data Migration", "Data Quality", "Agile Methodology"
                ],
                "knowsLanguage": [
                    { "@type": "Language", "name": "Portuguese", "alternateName": "pt-BR" },
                    { "@type": "Language", "name": "English", "alternateName": "en" }
                ],
                "nationality": { "@type": "Country", "name": "Brazil" },
                "alumniOf": [
                    {
                        "@type": "CollegeOrUniversity",
                        "name": "Centro Universitário Católico Salesiano Auxilium - UniSALESIANO",
                        "url": "https://www.unisalesiano.edu.br"
                    },
                    {
                        "@type": "EducationalOrganization",
                        "name": "ETEC - Escola Técnica Estadual de São Paulo"
                    }
                ],
                "sameAs": [
                    "https://www.linkedin.com/in/davio-vieira",
                    "https://github.com/oPaozinh0"
                ]
            },
            {
                "@type": "ProfilePage",
                "@id": @json(url('/')),
                "url": @json(url('/')),
                "name": @json(__('portfolio.meta_title')),
                "description": @json(__('portfolio.meta_description')),
                "inLanguage": @json(app()->getLocale() === 'pt-br' ? 'pt-BR' : 'en-US'),
                "mainEntity": { "@id": @json(url('/') . '#me') },
                "isPartOf": { "@id": @json(url('/') . '#website') }
            }
        ]
    }
    </script>
@endpush

@section('content')
    {{-- Skip link (a11y) --}}
    <a href="#main" class="skip-link">{{ __('portfolio.skip_to_content') }}</a>

    {{-- Nav sticky --}}
    <nav class="public-nav sticky">
        <a href="#hero" class="public-nav-logo">DAVI<em>·</em>OLIVEIRA</a>

        <div class="public-nav-links">
            <a href="#about" class="public-nav-link">{{ __('portfolio.nav_about') }}</a>
            <a href="#projects" class="public-nav-link">{{ __('portfolio.nav_projects') }}</a>
            <a href="#experience" class="public-nav-link">{{ __('portfolio.nav_experience') }}</a>
            <a href="#skills" class="public-nav-link">{{ __('portfolio.nav_skills') }}</a>
            <a href="#contact" class="public-nav-link">{{ __('portfolio.nav_contact') }}</a>
        </div>

        <div class="public-nav-actions">
            @php $altLang = app()->getLocale() === 'pt-br' ? 'en' : 'pt-br'; @endphp
            <a href="{{ route('lang.switch', $altLang) }}"
               class="tb-btn-ghost"
               style="text-decoration: none;"
               aria-label="{{ __('portfolio.lang_switch_aria') }}">
                {{ $altLang === 'en' ? 'EN' : 'PT' }}
            </a>
            <button @click="$store.attrion.openTheme()" class="tb-btn-ghost">
                <span x-text="themeName()"></span>
            </button>
        </div>
    </nav>

    <main id="main">
        <x-hero-section />
        <x-about-section />
        <x-projects-section />
        <x-experience-section />
        <x-education-section />
        <x-skills-section />
        <x-site-footer />
    </main>

    <button type="button"
            id="back-top"
            class="back-top"
            aria-label="{{ __('portfolio.back_to_top') }}"
            title="{{ __('portfolio.back_to_top') }}">↑</button>

    @push('scripts')
        <script type="module">
            const reduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
            const revealTargets = '.section, .timeline-item, .edu-card, .skill-card, .kpi, .project-card';

            // Scroll-triggered reveal (substitui AOS)
            if (!reduced) {
                const obs = new IntersectionObserver((entries) => {
                    for (const e of entries) {
                        if (e.isIntersecting) {
                            e.target.classList.add('reveal-in');
                            obs.unobserve(e.target);
                        }
                    }
                }, { threshold: 0.12, rootMargin: '0px 0px -60px 0px' });
                document.querySelectorAll(revealTargets).forEach(el => {
                    el.classList.add('reveal');
                    obs.observe(el);
                });
            } else {
                document.querySelectorAll(revealTargets).forEach(el => {
                    el.classList.add('reveal-in');
                });
            }

            // Active section indicator na nav
            const sectionsMap = new Map();
            document.querySelectorAll('section[id], #hero, footer[id]').forEach(s => {
                const link = document.querySelector(`.public-nav-link[href="#${s.id}"]`);
                if (link) sectionsMap.set(s, link);
            });
            const navObs = new IntersectionObserver((entries) => {
                entries.forEach(e => {
                    const link = sectionsMap.get(e.target);
                    if (!link) return;
                    if (e.isIntersecting) {
                        document.querySelectorAll('.public-nav-link.active').forEach(l => l.classList.remove('active'));
                        link.classList.add('active');
                    }
                });
            }, { rootMargin: '-40% 0px -55% 0px', threshold: 0 });
            sectionsMap.forEach((_, section) => navObs.observe(section));

            // Back-to-top
            const backTop = document.getElementById('back-top');
            if (backTop) {
                const onScroll = () => {
                    backTop.classList.toggle('visible', window.scrollY > 600);
                };
                window.addEventListener('scroll', onScroll, { passive: true });
                backTop.addEventListener('click', () => {
                    window.scrollTo({ top: 0, behavior: reduced ? 'auto' : 'smooth' });
                });
                onScroll();
            }

            // Easter egg console (apenas em prod-ish)
            if (!window.location.hostname.includes('localhost')) {
                console.log(
                    '%c\n' +
                    ' ____    _    __     _____\n' +
                    '|  _ \\  / \\   \\ \\   / /_ _|\n' +
                    '| | | |/ _ \\   \\ \\ / / | |\n' +
                    '| |_| / ___ \\   \\ V /  | |\n' +
                    '|____/_/   \\_\\   \\_/  |___|\n\n' +
                    'Curioso? github.com/oPaozinh0\n',
                    'color:#e83f6f;font-family:monospace;font-weight:bold;'
                );
            }
        </script>
    @endpush
@endsection
