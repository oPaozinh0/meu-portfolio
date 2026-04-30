{{-- Experiência profissional · timeline --}}
<section id="experience" class="section">
    <div class="section-inner">
        <div class="section-header" style="text-align: left;">
            <div class="ph-label p">{{ __('portfolio.experience_title') }}</div>
            <h2 class="section-title">{{ __('portfolio.experience_heading') }}</h2>
        </div>

        <div class="timeline">
            @foreach ($experiences as $exp)
                <div class="timeline-item">
                    <div class="timeline-dot"></div>
                    <div class="timeline-card">
                        <div style="display: flex; align-items: center; justify-content: space-between; gap: 12px; flex-wrap: wrap; margin-bottom: 4px;">
                            <div class="timeline-role">
                                {{ __('portfolio.experience.' . $exp['role']) }}
                            </div>
                            @if (!empty($exp['current']))
                                <span class="badge g">{{ __('portfolio.experience_current_badge') }}</span>
                            @endif
                        </div>

                        <div class="timeline-company">
                            @if (!empty($exp['website']))
                                <a href="{{ $exp['website'] }}"
                                   target="_blank"
                                   rel="noopener noreferrer"
                                   style="color: inherit; text-decoration: none; display: inline-flex; align-items: center; gap: 6px;">
                                    {{ $exp['company'] }}
                                    <span style="font-size: 9px; opacity: .6;">↗</span>
                                </a>
                            @else
                                {{ $exp['company'] }}
                            @endif
                        </div>

                        <div class="timeline-meta">
                            {{ __('portfolio.experience.' . $exp['period']) }}
                            ·
                            {{ __('portfolio.experience.' . $exp['location']) }}
                        </div>

                        @if (!empty($exp['description']))
                            <ul class="timeline-list">
                                @foreach ($exp['description'] as $desc)
                                    <li>{{ __('portfolio.experience.' . $desc) }}</li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
