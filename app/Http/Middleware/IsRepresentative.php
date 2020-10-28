<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class IsRepresentative
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
        if (Auth::guard('IsRepresentative')->check() and Auth::guard('IsRepresentative')->user()->role == 'representative') {
            return $next($request);
        }

        return response()->json([
            'status' => false,
            'message' => 'ليس لديك صلاحية'
        ]);
    }
}
