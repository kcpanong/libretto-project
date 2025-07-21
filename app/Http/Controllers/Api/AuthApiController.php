<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Carbon;

class AuthApiController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|confirmed|min:6',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $token = $user->createToken('libretto-token')->plainTextToken;

        return response()->json(['token' => $token, 'user' => $user], 201);
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if (! $user || ! Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        // Check for an existing token that’s not expired
        $validToken = $user->tokens()
            ->where('name', 'libretto-token')
            ->where('expires_at', '>', now())
            ->latest()
            ->first();

        if ($validToken) {
            return response()->json([
                'message' => 'Token is still valid. Please continue using your previously issued token.',
                'token' => $validToken->plain_token,
                'expires_at' => $validToken->expires_at,
                'user' => $user,
            ]);
        }

        // Delete expired tokens
        $user->tokens()->where('expires_at', '<=', now())->delete();

        // Create a new token
        $token = $user->createToken('libretto-token');
        $token->accessToken->expires_at = now()->addHours(24);
        $token->accessToken->plain_token = $token->plainTextToken;
        $token->accessToken->save();

        return response()->json([
            'token' => $token->plainTextToken,
            'expires_at' => $token->accessToken->expires_at,
            'user' => $user,
        ]);
    }

    public function logout(Request $request)
    {
        return response()->json(['message' => 'Logged out']);
    }
}
