<?php

namespace App\Http\Controllers;

use App\Models\ShortLink;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ShortLinkController extends Controller
{
    public function create()
    {
        // Retorna a view com o formulário
        return view('shorten');
    }

    public function store(Request $request)
    {
        $request->validate([
            'original_url' => 'required|url',
        ]);

        $shortLink = ShortLink::create([
            'original_url' => $request->original_url,
            'short_code' => Str::random(6),
            'expires_at' => now()->addHours(3),
        ]);

        return redirect()->route('shortlink.create')->with('success', 'Link encurtado com sucesso!')->with('short_code', $shortLink->short_code);
    }

    public function show($short_code, Request $request)
    {
        $shortLink = ShortLink::where('short_code', $short_code)->first();
        if (!$shortLink) {
            abort(404);
        }

        if ($shortLink->expires_at && $shortLink->expires_at->isPast()) {
            return response()->view('errors.expired', [], 404);
        }

        $shortLink->visits()->create([
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
        ]);

        return redirect($shortLink->original_url);
    }

    public function stats($short_code)
    {
        $shortLink = ShortLink::where('short_code', $short_code)
                            ->withCount('visits') // Carrega a contagem de visitas
                            ->with('visits')      // Carrega os detalhes de cada visita
                            ->firstOrFail();

        return view('shortlink_stats', ['shortLink' => $shortLink]);
    }
}
