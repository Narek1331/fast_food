<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Services\LanguageService;

class LocaleController extends Controller
{
    protected $lang_serv;

    /**
     * Construct a new LocaleController instance.
     *
     * @param  \App\Services\LanguageService  $lang_serv
     * @return void
     */
    public function __construct(LanguageService $lang_serv)
    {
        $this->lang_serv = $lang_serv;
    }

    /**
     * Change the application locale.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function changeLocale(Request $request)
    {
        $locale = $request['lang'] ?? null;
        // Get all supported languages
        $languages = $this->lang_serv->getOnlyNames();

        // Check if the requested locale is supported
        if (!in_array($locale, $languages->toArray())) {
            abort(400, 'Invalid locale');
        }

        // Set the application locale
        App::setLocale($locale);

        // Store the locale in session for future requests
        $request->session()->put('locale', $locale);

        // Redirect back to the previous page or a specific route
        return redirect()->route('home',['locale'=>$locale]);
    }
}
