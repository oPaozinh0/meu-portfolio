@extends('layouts.app')

@section('title', __('portfolio.error_404_title') . ' - Davi Oliveira')

@push('meta')
    <meta name="page-title-key" content="error_404_title">
@endpush
@section('content')
<section class="min-h-screen flex flex-col items-center justify-center text-center px-4">
    <div class="container mx-auto max-w-2xl px-4">
        <h1 class="text-6xl font-bold text-amber-600 dark:text-amber-500 mb-4">404</h1>
        <h2 class="text-3xl font-bold text-zinc-800 dark:text-zinc-100 mb-4" data-translate="error_404_title">Página Não Encontrada</h2>
        <p class="text-lg text-zinc-600 dark:text-zinc-400 mb-8" data-translate="error_404_message">
            O link que você tentou acessar não existe ou foi movido.
        </p>
        <a href="{{ url('/') }}" class="text-amber-600 dark:text-amber-400 hover:underline text-lg" data-translate="error_404_back_home">&larr; Voltar para a página inicial</a>
    </div>
</section>
@endsection
