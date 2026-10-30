{{-- Habilidades por categoria --}}
<section id="skills" class="section">
    <div class="section-inner">
        <div class="section-header" style="text-align: left;">
            <div class="ph-label g">{{ __('portfolio.skills_title') }}</div>
            <h2 class="section-title">{{ __('portfolio.skills_heading') }}</h2>
        </div>

        <div class="skills-grid">
            @foreach ($skillCategories as $category => $skills)
                @php $catSlug = strtolower(str_replace([' & ', ' '], ['_', '_'], $category)); @endphp
                <div class="skill-card skill-cat-{{ $catSlug }} reveal-delay-{{ min($loop->iteration, 6) }}">
                    <div class="skill-category">
                        {{ __('portfolio.skills_category_' . strtolower(str_replace(' & ', '_', $category))) }}
                    </div>

                    <div class="skill-pills">
                        @foreach ($skills as $skill)
                            <span class="skill-pill">
                                <span class="icon-wrap">
                                    @if (str_starts_with($skill['icon'], 'devicon-'))
                                        <i class="{{ $skill['icon'] }}"></i>
                                    @else
                                        <x-dynamic-component :component="$skill['icon']" class="w-4 h-4" />
                                    @endif
                                </span>
                                <span class="skill-name">{{ $skill['name'] }}</span>
                            </span>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
