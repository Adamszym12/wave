<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckSecretKey
{
    public function handle(Request $request, Closure $next): Response
    {
        $secretKey = $request->header('X-SUPER-SECRET-KEY');

        $expectedKey = config('auth.secret_key');

        if ($secretKey !== $expectedKey) {
            return response()->json([
                'message' => 'Unauthorized: Invalid SUPER SECRET API key.'
            ], 403);
        }

        return $next($request);
    }
}
