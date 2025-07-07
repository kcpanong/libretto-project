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

                $plainToken = $user->createToken('libretto-token');
                $plainToken->accessToken->expires_at = now()->addDay();
                $plainToken->accessToken->save();

                return redirect()->route('login')->withErrors(['Your session expired. Please log in again.']);
            }
        }

        return $next($request);
    }
}
