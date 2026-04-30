@extends('layouts.attrion')

@section('title', 'Stats · ' . $shortLink->short_code)

@section('content')

@php
    $shortUrl = route('shortlink.show', $shortLink->short_code);
    $isExpired = $shortLink->expires_at && $shortLink->expires_at->isPast();
    $visits = $shortLink->visits->sortByDesc('created_at');
@endphp

<nav class="public-nav">
    <a href="{{ url('/') }}" class="public-nav-logo">DAVI<em>·</em>OLIVEIRA</a>
    <div class="public-nav-actions">
        <a href="{{ route('shortlink.create') }}" class="tb-btn-ghost" style="text-decoration: none;">
            ← Encurtador
        </a>
        <a href="{{ route('now') }}" class="tb-btn-ghost" style="text-decoration: none;">
            /now
        </a>
        @auth
            <a href="{{ route('admin.dashboard') }}" class="tb-btn-ghost" style="text-decoration: none;">
                Admin
            </a>
        @endauth
        @php $altLang = app()->getLocale() === 'pt-br' ? 'en' : 'pt-br'; @endphp
        <a href="{{ route('lang.switch', $altLang) }}" class="tb-btn-ghost" style="text-decoration: none;">
            {{ $altLang === 'en' ? 'EN' : 'PT' }}
        </a>
        <button @click="$store.attrion.openTheme()" class="tb-btn-ghost">
            <span x-text="themeName()"></span>
        </button>
    </div>
</nav>

<div class="container-wide">

    <div class="ph">
        <div class="ph-label {{ $isExpired ? 'p' : 'c' }}">Estatísticas</div>
        <h1 class="ph-title mono" style="font-family: 'JetBrains Mono', monospace;">
            /{{ $shortLink->short_code }}
        </h1>
        <p class="ph-sub" style="word-break: break-all;">
            <a href="{{ $shortLink->original_url }}"
               target="_blank"
               rel="noopener"
               style="color: var(--cyan); text-decoration: none;">
                {{ $shortLink->original_url }}
            </a>
        </p>
    </div>

    {{-- KPIs --}}
    <div class="kpi-grid cols-3">
        <div class="kpi">
            <div class="kpi-label">Total de cliques</div>
            <div class="kpi-val" style="color: var(--cyan);">{{ $shortLink->visits_count }}</div>
            <div class="kpi-sub">desde a criação</div>
            <div class="kpi-accent" style="background: var(--cyan);"></div>
        </div>

        <div class="kpi">
            <div class="kpi-label">Status</div>
            <div class="kpi-val" style="color: {{ $isExpired ? 'var(--pink)' : 'var(--green)' }}; font-size: clamp(1.1rem, 2vw, 1.6rem);">
                {{ $isExpired ? 'Expirado' : 'Ativo' }}
            </div>
            <div class="kpi-sub">
                @if ($shortLink->expires_at)
                    {{ $isExpired ? 'expirou' : 'expira' }} {{ $shortLink->expires_at->diffForHumans() }}
                @else
                    sem expiração
                @endif
            </div>
            <div class="kpi-accent" style="background: {{ $isExpired ? 'var(--pink)' : 'var(--green)' }};"></div>
        </div>

        <div class="kpi">
            <div class="kpi-label">Link encurtado</div>
            <div style="font-size: 12px; font-weight: 700; line-height: 1.4; word-break: break-all;" class="mono">
                <a href="{{ $shortUrl }}" target="_blank" rel="noopener" style="color: var(--fg); text-decoration: none;">
                    {{ $shortUrl }}
                </a>
            </div>
            @if ($shortLink->expires_at)
                <div class="kpi-sub mono" style="margin-top: 4px;">
                    {{ $shortLink->expires_at->format('d/m/Y H:i') }}
                </div>
            @endif
            <div class="kpi-accent" style="background: var(--yellow);"></div>
        </div>
    </div>

    {{-- Tabela de visits --}}
    <div class="tbl-wrap">
        <div class="tbl-head">
            <span class="tbl-title">Registros de acesso</span>
            <span style="font-size: 9px; color: var(--muted); font-family: 'JetBrains Mono', monospace;">
                {{ $visits->count() }} {{ Str::plural('registro', $visits->count()) }}
            </span>
        </div>

        <div class="tbl-scroll">
            <table>
                <thead>
                    <tr>
                        <th style="width: 180px;">Data / hora</th>
                        <th style="width: 140px;">IP</th>
                        <th>User Agent</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($visits as $visit)
                        <tr>
                            <td class="mono neu">{{ $visit->created_at->format('d/m/Y H:i:s') }}</td>
                            <td class="mono">{{ $visit->ip_address }}</td>
                            <td class="neu">
                                <span class="truncate" title="{{ e($visit->user_agent) }}">
                                    {{ Str::limit($visit->user_agent, 80) }}
                                </span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" style="padding: 3rem 1.5rem; text-align: center; color: var(--muted);">
                                Nenhum clique registrado ainda.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>

@endsection
