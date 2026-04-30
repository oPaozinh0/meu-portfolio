{{-- Sobre mim --}}
<section id="about" class="section">
    <div class="section-inner">
        <div class="section-header" style="text-align: left;">
            <div class="ph-label c">{{ __('portfolio.about_title') }}</div>
            <h2 class="section-title">{{ __('portfolio.about_heading') }}</h2>
        </div>

        <div class="about-grid">
            <picture>
                <source type="image/webp"
                        srcset="{{ asset('avatar-280.webp') }} 1x, {{ asset('avatar-560.webp') }} 2x">
                <img src="{{ asset('avatar.jpg') }}"
                     alt="Davi Oliveira"
                     class="about-photo"
                     width="280" height="280"
                     loading="lazy"
                     decoding="async">
            </picture>

            <div class="about-bio">
                <p class="about-text">{{ __('portfolio.about_description') }}</p>

                <div class="kpi-grid">
                    <div class="kpi">
                        <div class="kpi-label">{{ __('portfolio.about_kpi_years_label') }}</div>
                        <div class="kpi-val" style="color: var(--cyan);">{{ __('portfolio.about_kpi_years_value') }}</div>
                        <div class="kpi-accent" style="background: var(--cyan);"></div>
                    </div>
                    <div class="kpi">
                        <div class="kpi-label">{{ __('portfolio.about_kpi_roles_label') }}</div>
                        <div class="kpi-val" style="color: var(--green);">{{ __('portfolio.about_kpi_roles_value') }}</div>
                        <div class="kpi-accent" style="background: var(--green);"></div>
                    </div>
                    <div class="kpi">
                        <div class="kpi-label">{{ __('portfolio.about_kpi_startup_label') }}</div>
                        <div class="kpi-val" style="color: var(--pink); font-size: clamp(1.1rem, 2vw, 1.6rem);">
                            {{ __('portfolio.about_kpi_startup_value') }}
                        </div>
                        <div class="kpi-accent" style="background: var(--pink);"></div>
                    </div>
                    <div class="kpi">
                        <div class="kpi-label">{{ __('portfolio.about_kpi_location_label') }}</div>
                        <div class="kpi-val" style="color: var(--yellow); font-size: clamp(.9rem, 1.5vw, 1.2rem);">
                            {{ __('portfolio.about_kpi_location_value') }}
                        </div>
                        <div class="kpi-accent" style="background: var(--yellow);"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
