@extends('layouts.attrion')

@section('title', 'Encurtador · Davi Oliveira')

@section('content')

{{-- Nav superior simples --}}
<nav class="public-nav">
    <a href="{{ url('/') }}" class="public-nav-logo">DAVI<em>·</em>OLIVEIRA</a>
    <div class="public-nav-actions">
        <a href="{{ route('now') }}" class="tb-btn-ghost" style="text-decoration: none;">
            /now
        </a>
        @auth
            <a href="{{ route('admin.dashboard') }}" class="tb-btn-ghost" style="text-decoration: none;">
                Admin
            </a>
        @else
            <a href="{{ route('login') }}" class="tb-btn-ghost" style="text-decoration: none;">
                Login
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

<div class="container-narrow">

    <div class="ph">
        <div class="ph-label c">Encurtador</div>
        <h1 class="ph-title">Encurte qualquer<br>URL.</h1>
        <p class="ph-sub">
            Cole a URL completa abaixo. Geramos um link curto que expira em 3 horas.
            Você pode acompanhar os cliques na página de estatísticas.
        </p>
    </div>

    {{-- Success: link gerado --}}
    @if (session('success') && session('short_code'))
        @php
            $code = session('short_code');
            $shortUrl = route('shortlink.show', $code);
            $statsUrl = route('shortlink.stats', $code);
        @endphp
        <div class="success-box" x-data="{
            url: @js($shortUrl),
            copied: false,
            copy() {
                navigator.clipboard.writeText(this.url).then(() => {
                    this.copied = true;
                    setTimeout(() => this.copied = false, 2000);
                });
            }
        }">
            <div class="success-title">Link encurtado · pronto pra usar</div>
            <div style="display: flex; align-items: center; gap: 10px; flex-wrap: wrap; margin-top: 4px;">
                <a href="{{ $shortUrl }}" target="_blank" rel="noopener">{{ $shortUrl }}</a>
                <button type="button" class="act-btn" @click="copy()">
                    <span x-show="!copied">Copiar</span>
                    <span x-show="copied" x-cloak>Copiado ✓</span>
                </button>
            </div>
            <div class="success-meta">
                Expira em 3 horas ·
                <a href="{{ $statsUrl }}" target="_blank" rel="noopener" style="font-family: 'Montserrat', sans-serif; font-size: 10px; font-weight: 700; letter-spacing: .1em; text-transform: uppercase; color: var(--muted);">
                    Ver estatísticas →
                </a>
            </div>
        </div>
    @endif

    {{-- Error de validação --}}
    @if ($errors->any())
        <div class="auth-error">
            <p>{{ $errors->first() }}</p>
        </div>
    @endif

    {{-- Form --}}
    <form method="POST" action="{{ route('shortlink.store') }}" style="margin-top: 2rem;">
        @csrf

        <div class="field">
            <label class="field-label" for="original_url">URL original</label>
            <input id="original_url"
                   name="original_url"
                   type="url"
                   class="field-input"
                   placeholder="https://exemplo.com/uma-url-bem-longa"
                   value="{{ old('original_url') }}"
                   required
                   autofocus>
        </div>

        <button type="submit" class="btn-submit">Encurtar →</button>

        <p style="font-size: 10px; color: var(--muted); margin-top: 1rem; line-height: 1.6; text-align: center;">
            O link gerado expirará em 3 horas. Sem cadastro, sem cookies de tracking.
        </p>
    </form>

</div>

@endsection
