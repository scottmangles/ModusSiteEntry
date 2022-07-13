<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SiteManager
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::user()->role == 'site_manager' && $request->site->siteManager->id == Auth::user()->id) {
            return $next($request);
        }

        if (Auth::user()->role == 'site_manager' && $request->site->siteManager->id != Auth::user()->id) {
            abort(403, 'You do not have access to '.$request->site->name.' site');
        }

        abort(403, 'Site Manager access only');
    }
}
