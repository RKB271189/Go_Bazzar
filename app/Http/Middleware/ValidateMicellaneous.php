<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ValidateMicellaneous
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $token = $request->token;
        if ($token === '3a2fd5c783854a0c1e50f377337298e2') {
            return $next($request);
        }
        return response()->json(['error' => 'Invalid token provided'], 401);
    }
}
