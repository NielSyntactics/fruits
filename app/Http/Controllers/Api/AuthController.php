<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request) {


        return response()->json($response);

    }

    public function login(Request $request) {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $token = auth()->user()->createToken('myapptoken')->plainTextToken;

            $response = [
                'User' => auth()->user(),
                'token' => $token,
            ];

            return response()->json($response);
        }

        return response()->json([
            'Message' => 'Invalid Email/Password'
        ]);
    }

    public function logout(Request $request) {
        auth()->user()->tokens()->delete();

        return [
            'message'   =>  'Logged out'
        ];
    }
}
