<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShortLinkController;
use App\Http\Controllers\AdminController;
use App\Http\Middleware\SetLocale;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('portfolio');
});

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::post('/login', function (Illuminate\Http\Request $request) {
    $credentials = $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required'],
    ]);

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();
        return redirect()->intended('admin');
    }

    return back()->withErrors(['email' => 'As credenciais não batem com o registro.']);
});

Route::post('/logout', function (Illuminate\Http\Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/');
})->name('logout');

// Grupo Admin
Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::delete('/{id}', [AdminController::class, 'destroy'])->name('admin.destroy');
});

Route::get('/s', [ShortLinkController::class, 'create'])->name('shortlink.create');
Route::post('/s', [ShortLinkController::class, 'store'])->name('shortlink.store');
Route::get('/s/{short_code}/stats', [ShortLinkController::class, 'stats'])->name('shortlink.stats');

// Now page — o que estou fazendo agora (estilo nownownow.com)
Route::get('/now', fn () => view('now'))->name('now');

// Sitemap dinâmico — lista as páginas públicas indexáveis
Route::get('/sitemap.xml', function () {
    $base = url('/');
    $today = now()->toIso8601String();
    $urls = [
        ['loc' => $base,                 'priority' => '1.0', 'changefreq' => 'monthly'],
        ['loc' => $base . '/now',        'priority' => '0.7', 'changefreq' => 'monthly'],
    ];
    $xml = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
    $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" '
          . 'xmlns:xhtml="http://www.w3.org/1999/xhtml">' . "\n";
    foreach ($urls as $u) {
        $xml .= "  <url>\n";
        $xml .= '    <loc>' . htmlspecialchars($u['loc']) . "</loc>\n";
        $xml .= "    <lastmod>{$today}</lastmod>\n";
        $xml .= "    <changefreq>{$u['changefreq']}</changefreq>\n";
        $xml .= "    <priority>{$u['priority']}</priority>\n";
        $xml .= '    <xhtml:link rel="alternate" hreflang="pt-br" href="' . htmlspecialchars($u['loc']) . "\" />\n";
        $xml .= '    <xhtml:link rel="alternate" hreflang="en" href="' . htmlspecialchars($u['loc']) . "\" />\n";
        $xml .= '    <xhtml:link rel="alternate" hreflang="x-default" href="' . htmlspecialchars($u['loc']) . "\" />\n";
        $xml .= "  </url>\n";
    }
    $xml .= '</urlset>';
    return response($xml, 200)->header('Content-Type', 'application/xml; charset=UTF-8');
})->name('sitemap');

// Switch de idioma — persiste em sessão e redireciona de volta
Route::get('/lang/{locale}', function (string $locale, Illuminate\Http\Request $request) {
    if (in_array($locale, SetLocale::SUPPORTED, true)) {
        $request->session()->put('locale', $locale);
    }
    return back();
})->name('lang.switch')->where('locale', '[a-z\-]+');

Route::get('/{short_code}', [ShortLinkController::class, 'show'])->name('shortlink.show');
