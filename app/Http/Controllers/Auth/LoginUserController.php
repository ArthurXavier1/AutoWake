<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserToken;
use Illuminate\Support\Facades\Auth;


class LoginUserController extends Controller
{
   public function login(Request $request)
{

    $credentials = $request->only('email', 'password');

    if (!Auth::attempt($credentials)) {
        return response()->json(['message' => 'Credenciais inválidas'], 401);
    }

    $user = Auth::user();


    $tokenResult = $user->createToken('authToken');
    $token = $tokenResult->plainTextToken;


    return response()->json([
        'access_token' => $token,
        'token_type' => 'Bearer',
        'userId' => $user->id,
        'name' => $user->name,
        'email' => $user->email,
    ]);
}
}
