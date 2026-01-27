<?php

namespace App\Http\Controllers\Api; // Updated to capital 'A' for PSR-4

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;

class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');
    
        /** @var \Tymon\JWTAuth\JWTGuard $auth */
        $auth = auth('api');
    
        $token = $auth->attempt($credentials);
    
        if(!$token){
            return response()->json(['error' => 'Unauthorized'], 401);
        }
    
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => $auth->factory()->getTTL() * 60
        ]);
    }

    public function refresh()
    {
        /** @var \Tymon\JWTAuth\JWTGuard $auth */
        $auth = auth('api');

        $refreshedToken = $auth->refresh();

        return response()->json([
            'access_token' => $refreshedToken,
            'token_type' => 'bearer',
            'expires_in' => $auth->factory()->getTTL() * 60
        ]);
    }

    public function me()
    {
        /** @var \Tymon\JWTAuth\JWTGuard $auth */
        $auth = auth('api');

        $user = $auth->user();
        return response()->json($user);
    }
    
    public function Logout()
    {
        /** @var \Tymon\JWTAuth\JWTGuard $auth */
        $auth = auth('api');

        $auth->logout(true); // true forces the token to be blacklisted
        return response()->json(['message' => 'Successfully logged out']);
    }
}