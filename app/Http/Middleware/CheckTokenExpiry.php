<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class CheckTokenExpiry
{
    public function handle(Request $request, Closure $next)
    {
        $user = auth()->user();

        if ($user && $user->tokens()->exists()) {
            $token = $user->currentAccessToken();

            if ($token && $token->expires_at && Carbon::parse($token->expires_at)->isPast()) {
                $token->delete();

                return response()->json([
                    'message' => 'Your token has expired. Please log in again.',
                ], 401);
            }
        }

        return $next($request);
    }
}
