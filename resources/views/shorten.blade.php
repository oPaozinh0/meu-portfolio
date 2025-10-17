@extends('layouts.app')

@section('title', __('portfolio.shortlink_title') . ' - Davi Oliveira')

@push('meta')
    <meta name="page-title-key" content="shortlink_title">
@endpush

@section('content')
<section class="min-h-screen flex flex-col items-center justify-center text-center px-4">
    <div class="container mx-auto mt-20 max-w-2xl px-4">
        <h1 class="text-4xl font-bold text-center mb-8 text-zinc-800 dark:text-zinc-100" data-translate="shortlink_title">Encurtador de Links</h1>

        <div class="bg-white dark:bg-zinc-900 p-8 rounded-lg shadow-lg">
            <form action="{{ route('shortlink.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="original_url" class="block text-zinc-700 dark:text-zinc-300 mb-2" data-translate="shortlink_original_url_label">URL Original</label>
                    <input type="url" name="original_url" id="original_url" class="w-full px-4 py-2 border rounded-lg dark:bg-zinc-800 dark:border-zinc-700 focus:outline-none focus:ring-2 focus:ring-amber-500" required>
                </div>
                <p class="text-sm text-zinc-500 dark:text-zinc-400 text-center mb-6" data-translate="shortlink_expiry_notice">
                    O link gerado expirará em 3 horas.
                </p>
                <button type="submit" class="w-full bg-amber-600 text-white py-2 rounded-lg hover:bg-amber-700 transition-colors" data-translate="shortlink_button">Encurtar</button>
            </form>

            @if (session('success'))
                <div class="mt-6 p-4 bg-green-100 dark:bg-green-900 text-green-800 dark:text-green-200 rounded-lg">
                    <span data-translate="shortlink_success_message">{{ session('success') }}</span>
                    @if(session('short_code'))
                        <p class="mt-2"><span data-translate="shortlink_your_link">Seu link:</span> <a href="{{ route('shortlink.show', session('short_code')) }}" target="_blank" class="font-bold underline">{{ route('shortlink.show', session('short_code')) }}</a></p>
                        <p class="mt-1">
                            <a href="{{ route('shortlink.stats', session('short_code')) }}" target="_blank" class="text-sm underline" data-translate="shortlink_view_stats">Ver estatísticas</a>
                        </p>
                    @endif
                </div>
            @endif
        </div>
    </div>
</section>
@endsection
