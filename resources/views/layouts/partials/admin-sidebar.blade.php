{{-- Sidebar do painel admin --}}
@php
    $current = request()->routeIs('admin.*') ? 'dashboard'
        : (request()->routeIs('shortlink.*') ? 'shorten' : null);
@endphp

<div class="sb-overlay"
     x-show="$store.attrion.mobileMenu"
     x-cloak
     @click="$store.attrion.closeMobileMenu()"></div>

<aside class="sidebar" :class="$store.attrion.mobileMenu ? 'open' : ''">

    <div class="sb-logo">
        <a href="{{ route('admin.dashboard') }}">
            <span class="sb-logo-text">DAVI<em>·</em>OLIVEIRA</span>
        </a>
        <span class="sb-admin-badge">Admin</span>
    </div>

    <nav class="sb-nav">
        <div class="sb-section">Visão geral</div>
        <a href="{{ route('admin.dashboard') }}"
           class="snav {{ $current === 'dashboard' ? 'on' : '' }}">
            <span class="sico">◈</span> Dashboard
        </a>

        <div class="sb-section">Encurtador</div>
        <a href="{{ route('shortlink.create') }}"
           class="snav {{ $current === 'shorten' ? 'on' : '' }}">
            <span class="sico">→</span> Novo link
        </a>

        <div class="sb-sep"></div>

        <a href="{{ url('/') }}" class="snav">
            <span class="sico">←</span> Voltar ao site
        </a>

        <form method="POST" action="{{ route('logout') }}" id="sidebar-logout-form">
            @csrf
            <button type="submit" class="snav">
                <span class="sico">⊗</span> Sair
            </button>
        </form>
    </nav>

    <div class="sb-bottom">
        <div class="sb-user">
            <div class="sb-avatar">
                {{ auth()->check() ? strtoupper(substr(auth()->user()->name, 0, 1)) : '?' }}
            </div>
            <div>
                <div class="sb-user-name">{{ auth()->user()->name ?? 'Admin' }}</div>
                <div class="sb-user-plan">Operador</div>
            </div>
        </div>
        <div class="dots" style="margin: 0 20px 4px;">
            <div class="dot dot-c"></div>
            <div class="dot dot-y"></div>
            <div class="dot dot-p"></div>
        </div>
    </div>
</aside>
