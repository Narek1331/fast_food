<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class LocalizationMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $locale = $request->segment(1);

        if (in_array($locale, ['en', 'ru', 'am'])) {
            app()->setLocale($locale);
        } else {
            app()->setLocale('am');
        }

        return $next($request);
    }
}
