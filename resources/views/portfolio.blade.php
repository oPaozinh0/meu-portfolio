{{-- resources/views/portfolio.blade.php --}}
@extends('layouts.app')

@section('title', 'Davi Oliveira - Desenvolvedor Fullstack Laravel')

@push('meta')
    @if(app()->getLocale() == 'pt-br')
        <meta name="description" content="Davi Oliveira, Desenvolvedor Fullstack Sênior especializado em Laravel. Conheça meus projetos, experiência e habilidades.">
        <meta name="keywords" content="Desenvolvedor Fullstack, Laravel, PHP, Desenvolvedor Web, Portfólio, Davi Oliveira">
    @else
        <meta name="description" content="Davi Oliveira, a Senior Fullstack Developer specializing in Laravel. Discover my projects, experience, and skills.">
        <meta name="keywords" content="Fullstack Developer, Laravel, PHP, Web Developer, Portfolio, Davi Oliveira">
    @endif

    <meta property="og:url" content="https://opaozinh0.live">
    <meta property="twitter:url" content="https://opaozinh0.live">
    <meta property="og:image" content="https://i.imgur.com/fvIQp4q.png">
    <meta property="twitter:image" content="https://i.imgur.com/fvIQp4q.png">

    @if(app()->getLocale() == 'pt-br')
        <meta property="og:title" content="Davi Oliveira - Desenvolvedor Fullstack Laravel">
        <meta property="og:description" content="Davi Oliveira, Desenvolvedor Fullstack Sênior.">
        <meta property="twitter:title" content="Davi Oliveira - Desenvolvedor Fullstack Laravel">
        <meta property="twitter:description" content="Davi Oliveira, Desenvolvedor Fullstack Sênior.">
    @else
        <meta property="og:title" content="Davi Oliveira - Fullstack Laravel Developer">
        <meta property="og:description" content="Davi Oliveira, a Senior Fullstack Developer.">
        <meta property="twitter:title" content="Davi Oliveira - Fullstack Laravel Developer">
        <meta property="twitter:description" content="Davi Oliveira, a Senior Fullstack Developer.">
    @endif
    <meta property="og:type" content="website">
    <meta property="twitter:card" content="summary_large_image">
@endpush

@section('content')
    <x-hero-section />
    <x-about-section />
    <x-experience-section />
    <x-education-section />
    <x-skills-section />
    <x-site-footer />
@endsection
