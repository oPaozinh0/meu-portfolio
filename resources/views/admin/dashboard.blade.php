@extends('layouts.app')

@section('title', 'Admin Dashboard - Sketchy')

@section('content')
<div class="container mx-auto px-4 mt-24 pb-12 max-w-7xl">

    <div class="flex flex-col md:flex-row justify-between items-center mb-10 gap-4">
        <div>
            <h1 class="text-5xl font-bold text-zinc-800 dark:text-zinc-100 font-['Patrick_Hand']">
                Painel de Controle
            </h1>
            <p class="text-zinc-500 dark:text-zinc-400 font-['Patrick_Hand'] text-lg">
                Visão geral dos seus links rabiscados
            </p>
        </div>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <wired-button elevation="3" onclick="this.closest('form').submit()" class="bg-red-100 text-red-600 font-bold text-lg">
                SAIR DO SISTEMA
            </wired-button>
        </form>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">

        <wired-card elevation="2" class="bg-white dark:bg-zinc-900 block h-full">
            <div class="p-6 flex flex-col items-center justify-center h-full">
                <h3 class="text-2xl font-['Patrick_Hand'] text-zinc-500 dark:text-zinc-400">Links Ativos</h3>
                <p class="text-6xl font-bold text-green-600 font-['Patrick_Hand'] my-2">{{ $activeLinks }}</p>
                <div class="text-sm bg-green-100 text-green-800 px-3 py-1 rounded-full font-['Patrick_Hand']">
                    de {{ $totalLinks }} total
                </div>
            </div>
        </wired-card>

        <wired-card elevation="2" class="bg-white dark:bg-zinc-900 block h-full">
            <div class="p-6 flex flex-col items-center justify-center h-full">
                <h3 class="text-2xl font-['Patrick_Hand'] text-zinc-500 dark:text-zinc-400">Total de Acessos</h3>
                <p class="text-6xl font-bold text-amber-500 font-['Patrick_Hand'] my-2">{{ $totalClicks }}</p>
                <div class="text-sm bg-amber-100 text-amber-800 px-3 py-1 rounded-full font-['Patrick_Hand']">
                    histórico completo
                </div>
            </div>
        </wired-card>

        <wired-card elevation="2" class="bg-white dark:bg-zinc-900 block h-full">
            <div class="p-6 flex flex-col items-center justify-center h-full">
                <h3 class="text-2xl font-['Patrick_Hand'] text-zinc-500 dark:text-zinc-400">Expirados</h3>
                <p class="text-6xl font-bold text-red-500 font-['Patrick_Hand'] my-2">{{ $totalLinks - $activeLinks }}</p>
                <div class="text-sm bg-red-100 text-red-800 px-3 py-1 rounded-full font-['Patrick_Hand']">
                    links inativos
                </div>
            </div>
        </wired-card>
    </div>

    <div class="grid grid-cols-1 gap-8">

        <wired-card elevation="3" class="bg-white dark:bg-zinc-900 block">
            <div class="p-6">
                <div class="flex items-center gap-2 mb-4">
                    <x-icons.skills.datadog class="w-6 h-6 text-zinc-600"/> <h2 class="text-2xl font-bold text-zinc-800 dark:text-zinc-100 font-['Patrick_Hand']">
                        Performance (Últimos 7 Dias)
                    </h2>
                </div>
                <div id="clicks-chart" style="width: 100%; height: 300px;"></div>
            </div>
        </wired-card>

        <wired-card elevation="3" class="bg-white dark:bg-zinc-900 block">
            <div class="p-6">
                <h2 class="text-2xl font-bold text-zinc-800 dark:text-zinc-100 font-['Patrick_Hand'] mb-4">
                    Gerenciamento de Links
                </h2>

                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="border-b-2 border-zinc-300 dark:border-zinc-600 font-bold text-xl font-['Patrick_Hand'] text-zinc-800 dark:text-zinc-200">
                                <th class="p-4 w-32">Código</th>
                                <th class="p-4">URL Original</th>
                                <th class="p-4 text-center w-24">Cliques</th>
                                <th class="p-4 w-40">Status/Expira</th>
                                <th class="p-4 text-right w-32">Ações</th>
                            </tr>
                        </thead>
                        <tbody class="text-zinc-700 dark:text-zinc-300 font-['Patrick_Hand'] text-lg">
                            @forelse($links as $link)
                            <tr class="border-b border-dashed border-zinc-200 dark:border-zinc-700 hover:bg-amber-50 dark:hover:bg-zinc-800 transition-colors group">
                                <td class="p-4">
                                    <a href="{{ route('shortlink.stats', $link->short_code) }}" target="_blank" class="text-amber-600 font-bold text-xl hover:underline decoration-wavy">
                                        {{ $link->short_code }}
                                    </a>
                                </td>
                                <td class="p-4">
                                    <div class="max-w-md truncate opacity-80 group-hover:opacity-100 transition-opacity" title="{{ $link->original_url }}">
                                        {{ $link->original_url }}
                                    </div>
                                </td>
                                <td class="p-4 text-center font-bold text-xl">
                                    {{ $link->visits_count }}
                                </td>
                                <td class="p-4">
                                    @if($link->expires_at && $link->expires_at->isPast())
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                            Expirado
                                        </span>
                                    @elseif($link->expires_at)
                                        <span class="text-green-600 font-bold">{{ $link->expires_at->diffForHumans() }}</span>
                                        <div class="text-xs text-zinc-400">{{ $link->expires_at->format('d/m/Y H:i') }}</div>
                                    @else
                                        <span class="text-zinc-400">Nunca expira</span>
                                    @endif
                                </td>
                                <td class="p-4 text-right">
                                    <form action="{{ route('admin.destroy', $link->id) }}" method="POST" onsubmit="return confirm('Tem certeza que quer apagar este link?');">
                                        @csrf
                                        @method('DELETE')
                                        <wired-button elevation="1" class="text-red-500 hover:text-red-700 font-bold text-sm bg-transparent" onclick="this.closest('form').submit()">
                                            X
                                        </wired-button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="p-12 text-center text-zinc-400 font-['Patrick_Hand'] text-xl border-dashed border-2 border-zinc-200 rounded-lg m-4">
                                    Nenhum link encontrado no caderno.
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="mt-6 font-['Patrick_Hand']">
                    {{ $links->links() }}
                </div>
            </div>
        </wired-card>
    </div>
</div>

<script type="module">
    // Espera um pouco para garantir que as fontes carregaram para o gráfico pegar o estilo certo
    window.addEventListener('load', () => {
        if(window.roughViz) {
            new window.roughViz.Bar({
                element: '#clicks-chart',
                data: {
                    labels: @json($chartLabels),
                    values: @json($chartValues)
                },
                title: '',
                roughness: 3, // Mais "rabiscado"
                fillStyle: 'zigzag-line', // Estilo diferente de preenchimento
                color: '#f59e0b',
                stroke: 'gray',
                strokeWidth: 2,
                axisFontSize: '1.5rem',
                font: 'Patrick Hand',
                margin: { top: 20, right: 20, bottom: 60, left: 60 },
                highlight: '#fbbf24'
            });
        }
    });
</script>
@endsection
