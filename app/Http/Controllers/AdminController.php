<?php

namespace App\Http\Controllers;

use App\Models\ShortLink;
use App\Models\LinkVisit;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        // 1. Métricas Gerais
        $totalLinks = ShortLink::count();
        $activeLinks = ShortLink::where('expires_at', '>', now())->count();
        $totalClicks = LinkVisit::count();

        // 2. Dados para o Gráfico (Últimos 7 dias)
        $chartData = LinkVisit::select(DB::raw('DATE(created_at) as date'), DB::raw('count(*) as count'))
            ->where('created_at', '>=', now()->subDays(7))
            ->groupBy('date')
            ->orderBy('date', 'asc')
            ->get();

        // Formata para o Javascript (Labels e Values)
        $chartLabels = $chartData->pluck('date')->map(fn($d) => date('d/m', strtotime($d)))->toArray();
        $chartValues = $chartData->pluck('count')->toArray();

        // 3. Lista de Links (com paginação)
        $links = ShortLink::withCount('visits')
                    ->orderBy('created_at', 'desc')
                    ->paginate(10);

        return view('admin.dashboard', compact(
            'links',
            'totalLinks',
            'activeLinks',
            'totalClicks',
            'chartLabels',
            'chartValues'
        ));
    }

    public function destroy($id)
    {
        ShortLink::destroy($id);
        return back()->with('success', 'Link removido do caderno!');
    }
}
