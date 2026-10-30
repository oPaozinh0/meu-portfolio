{{-- Experiência profissional · timeline --}}
<section id="experience" class="section">
    <div class="section-inner">
        <div class="section-header" style="text-align: left;">
            <div class="ph-label p">{{ __('portfolio.experience_title') }}</div>
            <h2 class="section-title">{{ __('portfolio.experience_heading') }}</h2>
        </div>

        <div class="timeline">
            @foreach ($experiences as $exp)
                @php $isCurrent = !empty($exp['current']); @endphp
                <div class="timeline-item {{ $isCurrent ? 'timeline-item-current' : '' }} reveal-delay-{{ min($loop->iteration, 4) }}">
                    <div class="timeline-dot {{ $isCurrent ? 'timeline-dot-current' : '' }}"></div>
                    <div class="timeline-card {{ $isCurrent ? 'timeline-card-current' : '' }}">
                        <div style="display: flex; align-items: center; justify-content: space-between; gap: 12px; flex-wrap: wrap; margin-bottom: 6px;">
                            <div class="timeline-role">
                                {{ __('portfolio.experience.' . $exp['role']) }}
                            </div>
                            @if ($isCurrent)
                                <span class="badge g badge-current-pulse">
                                    <span class="badge-pulse-dot"></span>
                                    {{ __('portfolio.experience_current_badge') }}
                                </span>
                            @endif
                        </div>

                        <div class="timeline-company">
                            @if (!empty($exp['website']))
                                <a href="{{ $exp['website'] }}"
                                   target="_blank"
                                   rel="noopener noreferrer"
                                   class="timeline-company-link">
                                    <span>{{ $exp['company'] }}</span>
                                    <span class="company-link-arrow">↗</span>
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
