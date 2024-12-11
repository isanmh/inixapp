<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthJwtController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|confirmed|min:6',
        ]);

        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
        ]);

        return response()->json([
            'message' => 'User created successfully',
            'data' => $user,
        ], 201);
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        // jwt token
        $token = JWTAuth::attempt([
            'email' => $request['email'],
            'password' => $request['password'],
        ]);

        // kalau token berhasil dibuat
        if (!empty($token)) {
            return response()->json([
                'message' => 'login berhasil',
                'token' => $token,
            ], 200);
        }

        return response()->json([
            'status' => 'Unauthorized',
            'message' => 'login gagal',
        ], 401);
    }

    public function refresh()
    {
        $newToken = auth()->refresh();
        return response()->json([
            'message' => 'New token generated',
            'token' => $newToken,
        ], 200);
    }

    public function logout()
    {
        auth()->logout();

        return response()->json([
            'status' => 200,
            'message' => 'logout berhasil',
        ], 200);
    }
}
