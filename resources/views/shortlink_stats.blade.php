<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estatísticas do Link</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-50 dark:bg-zinc-800">
    <div class="container mx-auto mt-20 max-w-4xl px-4">
        <h1 class="text-4xl font-bold text-center mb-8 text-zinc-800 dark:text-zinc-100">Estatísticas do Link</h1>

        <div class="bg-white dark:bg-zinc-900 p-8 rounded-lg shadow-lg mb-8">
            <p class="text-zinc-700 dark:text-zinc-300 mb-2"><strong>URL Original:</strong> <a href="{{ $shortLink->original_url }}" target="_blank" class="text-amber-600 break-all">{{ $shortLink->original_url }}</a></p>
            <p class="text-zinc-700 dark:text-zinc-300 mb-2"><strong>Link Encurtado:</strong> <a href="{{ route('shortlink.show', $shortLink->short_code) }}" target="_blank" class="text-amber-600">{{ route('shortlink.show', $shortLink->short_code) }}</a></p>
            <p class="text-zinc-700 dark:text-zinc-300 mb-2"><strong>Total de Cliques:</strong> {{ $shortLink->visits_count }}</p>
            @if($shortLink->expires_at)
            <p class="text-zinc-700 dark:text-zinc-300"><strong>Expira em:</strong> {{ $shortLink->expires_at->format('d/m/Y H:i') }}</p>
            @endif
        </div>

        <h2 class="text-2xl font-bold text-center mb-6 text-zinc-800 dark:text-zinc-100">Registros de Acesso</h2>
        <div class="bg-white dark:bg-zinc-900 p-8 rounded-lg shadow-lg">
            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead>
                        <tr class="border-b dark:border-zinc-700">
                            <th class="py-2 px-4">Data / Hora</th>
                            <th class="py-2 px-4">Endereço IP</th>
                            <th class="py-2 px-4">User Agent</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($shortLink->visits->sortByDesc('created_at') as $visit)
                            <tr class="border-b dark:border-zinc-700">
                                <td class="py-2 px-4">{{ $visit->created_at->format('d/m/Y H:i:s') }}</td>
                                <td class="py-2 px-4">{{ $visit->ip_address }}</td>
                                <td class="py-2 px-4 text-sm text-gray-500 truncate" title="{{ $visit->user_agent }}">{{ Str::limit($visit->user_agent, 70) }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="py-4 text-center text-gray-500">Nenhum clique registrado ainda.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        <div class="text-center mt-8">
             <a href="{{ route('shortlink.create') }}" class="text-amber-600 dark:text-amber-400 hover:underline">&larr; Voltar para o encurtador</a>
        </div>
    </div>
</body>
</html>
