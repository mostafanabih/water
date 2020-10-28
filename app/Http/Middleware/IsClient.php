<?php

namespace App\Http\Middleware;

use App\Client;
use Closure;

class IsClient
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
        $client = Client::where('api_token', $request->api_token)->exists();
        if ($client) {
            return $next($request);
        }

        return response()->json([
            'status' => false,
            'message' => 'لا يوجد عميل بهذه البيانات'
        ]);
    }
}
