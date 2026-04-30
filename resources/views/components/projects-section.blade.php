{{-- Projetos em destaque --}}
<section id="projects" class="section">
    <div class="section-inner">
        <div class="section-header" style="text-align: left;">
            <div class="ph-label p">{{ __('portfolio.projects_title') }}</div>
            <h2 class="section-title">{{ __('portfolio.projects_heading') }}</h2>
        </div>

        <div class="projects-grid">
            @foreach ($projects as $project)
                @php
                    $statusKey = 'project_status_' . $project['status'];
                    $statusBadge = match ($project['status']) {
                        'production' => 'g',
                        'open_source' => 'c',
                        'wip' => 'y',
                        default => 'mu',
                    };
                @endphp
                <article class="project-card">
                    <div class="project-card-accent" style="background: {{ $project['accent'] }};"></div>

                    <div class="project-header">
                        <h3 class="project-name">{{ $project['name'] }}</h3>
                        <span class="badge {{ $statusBadge }}">
                            {{ __('portfolio.' . $statusKey) }}
                        </span>
                    </div>

                    <p class="project-desc">
                        {{ __('portfolio.project_' . $project['key'] . '_desc') }}
                    </p>

                    <div class="project-tags">
                        @foreach ($project['tags'] as $tag)
                            <span class="project-tag">{{ $tag }}</span>
                        @endforeach
                    </div>

                    <div class="project-links">
                        @foreach ($project['links'] as $link)
                            @php
                                $href = $link['url'] ?? (isset($link['route']) ? route($link['route']) : '#');
                                $external = isset($link['url']);
                                $primary = !empty($link['primary']);
                            @endphp
                            <a href="{{ $href }}"
                               class="project-link {{ $primary ? 'primary' : '' }}"
                               @if ($external) target="_blank" rel="noopener noreferrer" @endif>
                                {{ __('portfolio.' . $link['label_key']) }}
                                @if ($external) <span style="font-size: 9px; opacity: .7;">↗</span> @endif
                            </a>
                        @endforeach
                    </div>
                </article>
            @endforeach
        </div>
    </div>
</section>
