<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthenticateWithImpulse
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $tokenDb = $request->session()->get('session_id');

        $token = \Illuminate\Support\Facades\DB::table('auth_tokens')
            ->where('auth_token', $tokenDb)->first();

        if ($token) {
            return $next($request);
        }

         return to_route('home');
    }
}
