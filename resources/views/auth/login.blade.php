@extends('layouts.attrion')

@section('title', 'Login · Davi Oliveira')

@section('content')
<div class="auth-shell" x-data="{ showPw: false }">

    {{-- ── FORM PANEL ─────────────────────────────────────────────────── --}}
    <div class="panel-form">
        <a href="{{ url('/') }}" class="auth-logo">DAVI<em>·</em>OLIVEIRA</a>

        <div class="auth-form-label">Acesso à plataforma</div>
        <h1 class="auth-form-title">Bem-vindo<br>de volta.</h1>

        @if ($errors->any())
            <div class="auth-error">
                <p>{{ $errors->first() }}</p>
            </div>
        @endif

        <form action="{{ route('login') }}" method="POST">
            @csrf

            <div class="field">
                <label class="field-label" for="email">Email</label>
                <input id="email"
                       name="email"
                       class="field-input"
                       type="email"
                       placeholder="seu@email.com"
                       value="{{ old('email') }}"
                       required
                       autofocus
                       autocomplete="username">
            </div>

            <div class="field">
                <label class="field-label" for="password">Senha</label>
                <div class="field-wrap">
                    <input id="password"
                           name="password"
                           class="field-input"
                           :type="showPw ? 'text' : 'password'"
                           placeholder="••••••••"
                           required
                           autocomplete="current-password"
                           style="padding-right: 42px;">
                    <button type="button"
                            class="field-eye"
                            @click="showPw = !showPw"
                            x-text="showPw ? '🙈' : '👁'"
                            aria-label="Mostrar senha"></button>
                </div>
            </div>

            <button type="submit" class="btn-submit">Entrar →</button>
        </form>

        <div style="margin-top: 1.5rem; display: flex; align-items: center; justify-content: space-between;">
            <a href="{{ url('/') }}" class="form-link">← Voltar para o site</a>
            <button type="button" @click="$store.attrion.openTheme()" class="form-link">Aparência</button>
        </div>

        <div class="form-bottom">
            <span style="font-size: 10px; color: var(--muted);">© {{ date('Y') }} Davi Oliveira</span>
            <div class="dots">
                <div class="dot dot-c"></div>
                <div class="dot dot-y"></div>
                <div class="dot dot-p"></div>
            </div>
        </div>
    </div>

    {{-- ── PREVIEW PANEL ──────────────────────────────────────────────── --}}
    <div class="panel-preview">
        <div class="blob blob-1"></div>
        <div class="blob blob-2"></div>

        {{-- Floating card (top-right) --}}
        <div class="preview-card-3">
            <div style="font-size: 8px; font-weight: 700; letter-spacing: .15em; text-transform: uppercase; color: var(--cyan); margin-bottom: 8px;">
                Uptime · 30d
            </div>
            <div style="font-size: 1.8rem; font-weight: 900; letter-spacing: -.04em; color: var(--cyan);" class="mono">99.9%</div>
            <div style="font-size: 8px; color: var(--muted); font-weight: 600; margin-top: 4px;">↑ +0.2 vs mês anterior</div>
        </div>

        {{-- Main preview card --}}
        <div class="preview-card">
            <div class="preview-bar">
                <div class="preview-dot" style="background: #ff5f57;"></div>
                <div class="preview-dot" style="background: #febc2e;"></div>
                <div class="preview-dot" style="background: #28c840;"></div>
                <span style="font-size: 9px; font-weight: 600; letter-spacing: .06em; color: var(--muted); margin-left: 8px; font-family: 'JetBrains Mono', monospace;">davioliveira.dev</span>
            </div>
            <div class="preview-body">
                <div class="preview-kpi-row">
                    <div class="preview-kpi">
                        <div class="preview-kpi-v mono">312</div>
                        <div class="preview-kpi-l">Links ativos</div>
                        <div class="preview-kpi-d">↑ 24 esta semana</div>
                    </div>
                    <div class="preview-kpi">
                        <div class="preview-kpi-v mono" style="color: var(--pink);">8.4k</div>
                        <div class="preview-kpi-l">Cliques · 30d</div>
                        <div class="preview-kpi-d" style="color: var(--pink);">↑ 12%</div>
                    </div>
                </div>
                <div class="preview-chart">
                    <div class="preview-bar-col" style="height: 38%;"></div>
                    <div class="preview-bar-col" style="height: 52%;"></div>
                    <div class="preview-bar-col" style="height: 44%;"></div>
                    <div class="preview-bar-col" style="height: 68%;"></div>
                    <div class="preview-bar-col" style="height: 55%;"></div>
                    <div class="preview-bar-col hi" style="height: 88%;"></div>
                    <div class="preview-bar-col" style="height: 72%;"></div>
                    <div class="preview-bar-col" style="height: 60%;"></div>
                    <div class="preview-bar-col hi" style="height: 100%;"></div>
                </div>
                <div class="preview-row">
                    <div style="width: 24px; height: 24px; border: 1px solid var(--border); display: flex; align-items: center; justify-content: center; font-size: 9px; font-weight: 900; flex-shrink: 0;">→</div>
                    <div style="flex: 1; min-width: 0;">
                        <div style="font-size: 10px; font-weight: 700;">/r/launch · LinkedIn post</div>
                        <div style="font-size: 9px; color: var(--muted);" class="mono">1.2k cliques · 7d</div>
                    </div>
                    <span class="badge g">Ativo</span>
                </div>
                <div class="preview-row">
                    <div style="width: 24px; height: 24px; border: 1px solid var(--border); display: flex; align-items: center; justify-content: center; font-size: 9px; font-weight: 900; flex-shrink: 0;">→</div>
                    <div style="flex: 1; min-width: 0;">
                        <div style="font-size: 10px; font-weight: 700;">/r/cv · Currículo PDF</div>
                        <div style="font-size: 9px; color: var(--muted);" class="mono">487 cliques · 30d</div>
                    </div>
                    <span class="badge g">Ativo</span>
                </div>
                <div class="preview-row">
                    <div style="width: 24px; height: 24px; border: 1px solid var(--border); display: flex; align-items: center; justify-content: center; font-size: 9px; font-weight: 900; flex-shrink: 0;">→</div>
                    <div style="flex: 1; min-width: 0;">
                        <div style="font-size: 10px; font-weight: 700;">/r/old · Campanha 2024</div>
                        <div style="font-size: 9px; color: var(--muted);" class="mono">2.8k cliques · histórico</div>
                    </div>
                    <span class="badge p">Expirado</span>
                </div>
            </div>
        </div>

        {{-- Floating card (bottom-left) --}}
        <div class="preview-card-2">
            <div style="font-size: 8px; font-weight: 700; letter-spacing: .15em; text-transform: uppercase; color: var(--yellow); margin-bottom: 8px;">
                Stack
            </div>
            <div style="font-size: 10px; font-weight: 700; margin-bottom: 4px;">Laravel 12 · Alpine 3</div>
            <div style="font-size: 9px; color: var(--muted);">Tailwind v4 · SQLite</div>
            <div style="margin-top: 8px; display: flex; align-items: center; gap: 6px;">
                <div style="width: 6px; height: 6px; border-radius: 50%; background: var(--green); box-shadow: 0 0 6px var(--green);"></div>
                <span style="font-size: 8px; color: var(--green); font-weight: 700; letter-spacing: .08em;">Deploy ativo</span>
            </div>
        </div>

        <div style="position: absolute; bottom: 2rem; right: 2rem; font-size: 9px; font-weight: 700; letter-spacing: .18em; text-transform: uppercase; color: var(--muted);">
            Preview — Encurtador
        </div>
    </div>

</div>
@endsection
