<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // register
    public function register(Request $request)
    {
        $input = $request->validate([
            'name' => 'required|string|max:255|min:3',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        // buat user
        $user = User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => bcrypt($input['password']),
            // hash password
            // 'password' => Hash::make($input['password']),
        ]);

        // token
        $token = $user->createToken('IniAdalahKeyRahasia')->plainTextToken;

        $data = [
            'status' => Response::HTTP_CREATED,
            'message' => 'User berhasil dibuat',
            'data' => $user,
            'token' => $token,
            'type' => 'Bearer'
        ];
        return response()->json($data, Response::HTTP_CREATED);
    }

    public function login(Request $request)
    {
        $input = $request->validate([
            'email' => 'required|email|string',
            'password' => 'required|string',
        ]);

        $user = User::where('email', $input['email'])->first();

        if (!$user || !Hash::check($input['password'], $user->password)) {
            return response()->json([
                'status' => Response::HTTP_UNAUTHORIZED,
                'message' => 'Invalid credentials',
            ], Response::HTTP_UNAUTHORIZED);
        }

        $token = $user->createToken('IniAdalahKeyRahasia')->plainTextToken;

        $data = [
            'status' => Response::HTTP_OK,
            'message' => 'User berhasil login',
            'data' => $user,
            'token' => $token,
            'type' => 'Bearer'
        ];
        return response()->json($data, Response::HTTP_OK);
    }

    public function user()
    {
        $data = [
            'status' => Response::HTTP_OK,
            'message' => 'User details',
            'data' => auth()->user(),
        ];
        return response()->json($data, Response::HTTP_OK);
    }

    public function logout()
    {
        // cara hapus
        auth()->user()->tokens->each(function ($token) {
            $token->delete();
        });

        $data = [
            'status' => Response::HTTP_OK,
            'message' => 'Berhasil logout',
        ];
        return response()->json($data, Response::HTTP_OK);
    }
}
