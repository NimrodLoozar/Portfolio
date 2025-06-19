<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    /**
     * Switch the application language
     */
    public function switch(Request $request, $locale)
    {
        // Validate the locale
        $supportedLocales = config('app.supported_locales', ['en', 'hu', 'nl']);

        if (!in_array($locale, $supportedLocales)) {
            abort(404);
        }

        // Store the locale in session
        Session::put('locale', $locale);

        // Set the locale for the current request
        App::setLocale($locale);

        // Redirect back to the previous page
        return redirect()->back();
    }
}
