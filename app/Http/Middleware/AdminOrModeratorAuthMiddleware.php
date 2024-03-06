<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminOrModeratorAuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->user() && $request->user()->isAdminOrModerator()) {
            return $next($request);
        }

        // If the user is not authenticated or is not an admin, you can redirect them to a different route.
        return redirect()->route('home',['locale'=>app()->getLocale()])->with('error', 'You are not authorized to access this page.');
    }
}
