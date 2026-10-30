{{-- Hero — landing pessoal estilo Attrion --}}
<section id="hero" class="hero-screen">
    <div class="hero-grid-pattern" aria-hidden="true"></div>
    <div class="blob blob-1"></div>
    <div class="blob blob-2"></div>
    <div class="blob blob-3"></div>

    <div class="hero-content">
        <div class="hero-status-wrap">
            <span class="hero-status-pill">
                <span class="status-ping"></span>
                <span class="status-dot"></span>
                <span>{{ __('portfolio.hero_status') }}</span>
            </span>
        </div>

        <div class="ph-label c" style="justify-content: center; margin-bottom: 1.25rem;">
            {{ __('portfolio.hero_role') }}
        </div>

        <h1 class="hero-name">{{ $name }}</h1>

        <p class="hero-tagline">{{ $title }}</p>

        <div class="hero-stack" aria-label="Stack principal">
            <span class="hero-stack-item stack-oracle">Oracle PL/SQL</span>
            <span class="hero-stack-item stack-postgres">PostgreSQL</span>
            <span class="hero-stack-item stack-laravel">Laravel 12</span>
            <span class="hero-stack-item stack-nextjs">Next.js / React</span>
            <span class="hero-stack-item stack-python">Python</span>
            <span class="hero-stack-item stack-typescript">TypeScript</span>
            <span class="hero-stack-item stack-vue">Vue.js</span>
            <span class="hero-stack-item stack-redis">Redis</span>
        </div>

        <div class="hero-ctas">
            <a href="{{ $linkedinUrl }}" target="_blank" rel="me noopener" class="hero-cta primary">
                <x-icons.linkedin class="w-4 h-4" />
                LinkedIn
            </a>
            <a href="{{ $githubUrl }}" target="_blank" rel="me noopener" class="hero-cta">
                <x-icons.github class="w-4 h-4" />
                GitHub
            </a>
            @if ($cvUrl)
                <a href="{{ $cvUrl }}" download class="hero-cta">
                    <x-icons.download class="w-4 h-4" />
                    {{ __('portfolio.hero_cta_cv') }}
                </a>
            @endif
            <a href="#contact" class="hero-cta">
                <x-icons.email class="w-4 h-4" />
                {{ __('portfolio.hero_cta_contact') }}
            </a>
        </div>
    </div>

    <a href="#about" class="scroll-indicator">{{ __('portfolio.hero_scroll') }}</a>
</section>
