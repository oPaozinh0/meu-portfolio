@extends('layouts.attrion-admin')

@section('title', 'Dashboard · Admin')
@section('page-title', 'Dashboard')

@section('content')
@php
    $expiredLinks = $totalLinks - $activeLinks;
    $maxClick = max($chartValues ?: [0]);
@endphp

<div class="ph">
    <div class="ph-label p">Encurtador</div>
    <h1 class="ph-title">Painel de controle.</h1>
    <p class="ph-sub">
        Visão geral dos links rabiscados e seus acessos. Atualizado em tempo real.
    </p>
</div>

{{-- KPIs --}}
<div class="kpi-grid cols-3">
    <div class="kpi">
        <div class="kpi-label">Links ativos</div>
        <div class="kpi-val" style="color: var(--cyan);">{{ $activeLinks }}</div>
        <div class="kpi-sub">de {{ $totalLinks }} total</div>
        <div class="kpi-accent" style="background: var(--cyan);"></div>
    </div>
    <div class="kpi">
        <div class="kpi-label">Total de cliques</div>
        <div class="kpi-val" style="color: var(--green);">{{ number_format($totalClicks, 0, ',', '.') }}</div>
        <div class="kpi-sub">histórico completo</div>
        <div class="kpi-accent" style="background: var(--green);"></div>
    </div>
    <div class="kpi">
        <div class="kpi-label">Expirados</div>
        <div class="kpi-val" style="color: var(--pink);">{{ $expiredLinks }}</div>
        <div class="kpi-sub">links inativos</div>
        <div class="kpi-accent" style="background: var(--pink);"></div>
    </div>
</div>

{{-- Chart 7d (CSS bars) --}}
<div class="tbl-wrap" style="margin-bottom: 1.5rem;">
    <div class="tbl-head">
        <span class="tbl-title">Performance · últimos 7 dias</span>
        <span style="font-size: 9px; color: var(--muted); font-family: 'JetBrains Mono', monospace;">
            pico: {{ $maxClick }} {{ Str::plural('clique', $maxClick) }}
        </span>
    </div>

    @if (empty($chartValues) || $maxClick === 0)
        <div style="padding: 3rem 1.5rem; text-align: center; color: var(--muted); font-size: 11px;">
            Sem cliques registrados nos últimos 7 dias.
        </div>
    @else
        <div class="css-chart" style="border: none;">
            @foreach ($chartLabels as $i => $label)
                @php
                    $value = $chartValues[$i] ?? 0;
                    $height = $maxClick > 0 ? max(2, round(($value / $maxClick) * 100)) : 0;
                @endphp
                <div class="css-chart-col" title="{{ $value }} cliques em {{ $label }}">
                    <span class="css-chart-val">{{ $value }}</span>
                    <div style="flex: 1; width: 100%; display: flex; align-items: flex-end;">
                        <div class="css-chart-bar" style="height: {{ $height }}%;"></div>
                    </div>
                    <span class="css-chart-label">{{ $label }}</span>
                </div>
            @endforeach
        </div>
    @endif
</div>

{{-- Tabela de links --}}
<div class="tbl-wrap">
    <div class="tbl-head">
        <span class="tbl-title">Gerenciamento de links</span>
        <a href="{{ route('shortlink.create') }}" class="tb-btn">+ Novo link</a>
    </div>

    <div class="tbl-scroll">
        <table>
            <thead>
                <tr>
                    <th style="width: 120px;">Código</th>
                    <th>URL original</th>
                    <th class="hide-mobile" style="text-align: right; width: 80px;">Cliques</th>
                    <th class="hide-mobile" style="width: 160px;">Status</th>
                    <th style="text-align: right; width: 140px;">Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($links as $link)
                    @php
                        $isExpired = $link->expires_at && $link->expires_at->isPast();
                    @endphp
                    <tr>
                        <td class="mono" style="color: var(--cyan);">
                            {{ $link->short_code }}
                        </td>
                        <td>
                            <span class="truncate" title="{{ $link->original_url }}">
                                {{ $link->original_url }}
                            </span>
                        </td>
                        <td class="mono hide-mobile" style="text-align: right;">
                            {{ $link->visits_count }}
                        </td>
                        <td class="hide-mobile">
                            @if ($isExpired)
                                <span class="badge p">Expirado</span>
                            @elseif ($link->expires_at)
                                <span class="badge g">Ativo</span>
                                <div style="font-size: 9px; color: var(--muted); margin-top: 2px;" class="mono">
                                    {{ $link->expires_at->diffForHumans() }}
                                </div>
                            @else
                                <span class="badge mu">Permanente</span>
                            @endif
                        </td>
                        <td>
                            <div class="act">
                                <a href="{{ route('shortlink.stats', $link->short_code) }}"
                                   class="act-btn"
                                   target="_blank"
                                   rel="noopener">
                                    Stats
                                </a>
                                <form method="POST"
                                      action="{{ route('admin.destroy', $link->id) }}"
                                      onsubmit="return confirm('Apagar o link {{ $link->short_code }}?');"
                                      style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="act-btn danger">Apagar</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" style="padding: 3rem 1.5rem; text-align: center; color: var(--muted);">
                            Nenhum link cadastrado.
                            <a href="{{ route('shortlink.create') }}"
                               style="color: var(--cyan); text-decoration: none; margin-left: 6px;">
                                Criar o primeiro →
                            </a>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@if ($links instanceof \Illuminate\Contracts\Pagination\Paginator && $links->hasPages())
    <div class="pag-wrap">
        {{ $links->links() }}
    </div>
@endif
@endsection
