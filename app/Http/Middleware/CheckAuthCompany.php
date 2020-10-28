<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckAuthCompany
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!Auth::guard('company')->check()) {
            abort(404);
        }
        if (!Auth::guard('company')->user()->role == 'representative'){
            abort(404);
        }

        return $next($request);
    }
}
