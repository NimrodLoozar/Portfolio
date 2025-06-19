<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class SetLocale
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        // Get locale from session, or use default
        $locale = Session::get('locale', config('app.locale'));

        // Validate the locale against supported locales
        $supportedLocales = config('app.supported_locales', ['en', 'hu', 'nl']);
        if (!in_array($locale, $supportedLocales)) {
            $locale = config('app.locale');
        }

        // Set the locale
        App::setLocale($locale);

        return $next($request);
    }
}
