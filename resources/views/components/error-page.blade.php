@props([
    'code' => '404',
    'title' => '',
    'message' => '',
    'accent' => 'c',
    'backUrl' => null,
    'backLabel' => null,
])

@php
    $backUrl ??= url('/');
    $backLabel ??= __('portfolio.error_back_home');
@endphp

<div class="container-narrow"
     style="text-align: center; min-height: 80vh; display: flex; flex-direction: column; justify-content: center;">

    <div class="ph-label {{ $accent }}" style="justify-content: center;">
        {{ $code }}
    </div>

    <h1 class="ph-title mono"
        style="font-family: 'JetBrains Mono', monospace; margin-bottom: .75rem; font-size: clamp(3rem, 9vw, 6rem);">
        {{ $code }}
    </h1>

    <p style="font-size: 1.5rem; font-weight: 700; margin-bottom: .75rem; letter-spacing: -.01em;">
        {{ $title }}
    </p>

    <p style="font-size: 1rem; color: var(--muted); margin-bottom: 2rem; line-height: 1.6; max-width: 480px; margin-left: auto; margin-right: auto;">
        {{ $message }}
    </p>

    <div style="display: flex; gap: 12px; justify-content: center; flex-wrap: wrap;">
        <a href="{{ $backUrl }}" class="tb-btn" style="text-decoration: none; display: inline-block;">
            {{ $backLabel }}
        </a>
        {{ $slot }}
    </div>
</div>
