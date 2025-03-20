<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class HelloGonbe
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // 前処理
        if ($request->input('name') === 'gonbe') {
            return response('Hello! Gonbe!');
        }

        $response = $next($request);

        // 後処理

        return $response;
    }
}
