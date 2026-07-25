{{-- Hero — landing pessoal estilo Attrion --}}
<section id="hero" class="hero-screen">
    <div class="blob blob-1"></div>
    <div class="blob blob-2"></div>

    <div class="hero-content">
        <div class="ph-label c" style="justify-content: center; margin-bottom: 1.25rem;">
            {{ __('portfolio.hero_role') }}
        </div>

        <h1 class="hero-name">{{ $name }}</h1>

        <p class="hero-tagline">{{ $title }}</p>

        <div class="hero-stack" aria-label="Stack principal">
            <span class="hero-stack-item">Laravel</span>
            <span class="hero-stack-item">PHP</span>
            <span class="hero-stack-item">Vue.js</span>
            <span class="hero-stack-item">Python</span>
            <span class="hero-stack-item">TypeScript</span>
            <span class="hero-stack-item">PostgreSQL</span>
            <span class="hero-stack-item">Redis</span>
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
