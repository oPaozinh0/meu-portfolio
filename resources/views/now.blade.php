@extends('layouts.attrion')

@section('title', __('portfolio.now_title') . ' · Davi Oliveira')

@section('robots-override')
    <meta name="robots" content="index, follow, max-image-preview:large">
@endsection

@push('head')
    <meta name="description" content="{{ __('portfolio.now_focus_value') }}">
    <meta name="author" content="Davi Oliveira">
    <link rel="canonical" href="{{ url('/now') }}">

    <meta property="og:type" content="profile">
    <meta property="og:locale" content="{{ app()->getLocale() === 'pt-br' ? 'pt_BR' : 'en_US' }}">
    <meta property="og:site_name" content="{{ __('portfolio.site_name') }}">
    <meta property="og:title" content="{{ __('portfolio.now_title') }} · Davi Oliveira">
    <meta property="og:description" content="{{ __('portfolio.now_focus_value') }}">
    <meta property="og:url" content="{{ url('/now') }}">
    <meta property="og:image" content="{{ asset('og-image.png') }}">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:image:alt" content="{{ __('portfolio.meta_image_alt') }}">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ __('portfolio.now_title') }} · Davi Oliveira">
    <meta name="twitter:description" content="{{ __('portfolio.now_focus_value') }}">
    <meta name="twitter:image" content="{{ asset('og-image.png') }}">
    <meta name="twitter:image:alt" content="{{ __('portfolio.meta_image_alt') }}">
@endpush

@section('content')

<nav class="public-nav">
    <a href="{{ url('/') }}" class="public-nav-logo">DAVI<em>·</em>OLIVEIRA</a>
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

<div class="container-narrow">
    <div class="ph">
        <div class="ph-label c">{{ __('portfolio.now_title') }}</div>
        <h1 class="ph-title">{{ __('portfolio.now_heading') }}</h1>
        <p class="ph-sub">{!! __('portfolio.now_intro') !!}</p>
    </div>

    <div style="display: flex; flex-direction: column; gap: 1px; border: 1px solid var(--border); background: var(--border); margin-bottom: 2rem;">

        <div style="background: var(--bg2); padding: 1.5rem 1.75rem;">
            <div class="ph-label p" style="margin-bottom: .75rem;">{{ __('portfolio.now_focus_label') }}</div>
            <p style="font-size: 14px; line-height: 1.7; color: var(--fg);">
                {{ __('portfolio.now_focus_value') }}
            </p>
        </div>

        <div style="background: var(--bg2); padding: 1.5rem 1.75rem;">
            <div class="ph-label c" style="margin-bottom: .75rem;">{{ __('portfolio.now_stack_label') }}</div>
            <p class="mono" style="font-size: 13px; line-height: 1.8; color: var(--muted); font-family: 'JetBrains Mono', monospace;">
                {{ __('portfolio.now_stack_value') }}
            </p>
        </div>

        <div style="background: var(--bg2); padding: 1.5rem 1.75rem;">
            <div class="ph-label y" style="margin-bottom: .75rem;">{{ __('portfolio.now_learning_label') }}</div>
            <p style="font-size: 14px; line-height: 1.7; color: var(--fg);">
                {{ __('portfolio.now_learning_value') }}
            </p>
        </div>

        <div style="background: var(--bg2); padding: 1.5rem 1.75rem; display: flex; justify-content: space-between; flex-wrap: wrap; gap: 1rem;">
            <div>
                <div class="ph-label g" style="margin-bottom: .5rem;">{{ __('portfolio.now_location_label') }}</div>
                <span style="font-size: 13px; color: var(--fg); font-weight: 700;">{{ __('portfolio.now_location_value') }}</span>
            </div>
            <div style="text-align: right;">
                <div class="ph-label" style="margin-bottom: .5rem; color: var(--muted);">{{ __('portfolio.now_last_update_label') }}</div>
                <span class="mono" style="font-size: 13px; color: var(--muted); font-family: 'JetBrains Mono', monospace;">
                    {{ \Carbon\Carbon::create(2026, 4, 30)->locale(app()->getLocale())->isoFormat('MMMM YYYY') }}
                </span>
            </div>
        </div>
    </div>

    <div style="text-align: center;">
        <a href="{{ url('/') }}" class="tb-btn-ghost" style="text-decoration: none; display: inline-block;">
            {{ __('portfolio.now_back_home') }}
        </a>
    </div>
</div>

@endsection
