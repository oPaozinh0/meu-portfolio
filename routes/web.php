<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShortLinkController;
use App\Http\Controllers\AdminController;
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
Route::get('/{short_code}', [ShortLinkController::class, 'show'])->name('shortlink.show');
Route::get('/s/{short_code}/stats', [ShortLinkController::class, 'stats'])->name('shortlink.stats');
