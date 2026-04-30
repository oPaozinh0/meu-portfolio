{{-- Formação acadêmica --}}
<section id="education" class="section">
    <div class="section-inner">
        <div class="section-header" style="text-align: left;">
            <div class="ph-label y">{{ __('portfolio.education_title') }}</div>
            <h2 class="section-title">{{ __('portfolio.education_heading') }}</h2>
        </div>

        <div class="edu-grid">
            @foreach ($education as $edu)
                <div class="edu-card">
                    <div class="edu-degree">
                        {{ __('portfolio.education.' . $edu['degree']) }}
                    </div>
                    <h3 class="edu-institution">{{ $edu['institution'] }}</h3>
                    <div class="edu-period">
                        {{ __('portfolio.education.' . $edu['period']) }}
                        @if (!empty($edu['location']))
                            · {{ $edu['location'] }}
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
