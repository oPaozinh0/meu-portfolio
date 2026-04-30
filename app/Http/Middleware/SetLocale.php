<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    public const SUPPORTED = ['pt-br', 'en'];
    public const DEFAULT = 'pt-br';

    public function handle(Request $request, Closure $next): Response
    {
        $locale = $request->session()->get('locale', self::DEFAULT);

        if (!in_array($locale, self::SUPPORTED, true)) {
            $locale = self::DEFAULT;
        }

        app()->setLocale($locale);

        return $next($request);
    }
}
