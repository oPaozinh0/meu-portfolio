<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShortLinkController;

Route::get('/', function () {
    return view('portfolio');
});

Route::get('/s', [ShortLinkController::class, 'create'])->name('shortlink.create');
Route::post('/s', [ShortLinkController::class, 'store'])->name('shortlink.store');
Route::get('/{short_code}', [ShortLinkController::class, 'show'])->name('shortlink.show');
Route::get('/s/{short_code}/stats', [App\Http\Controllers\ShortLinkController::class, 'stats'])->name('shortlink.stats');
