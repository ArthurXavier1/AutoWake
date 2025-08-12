<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FilmesController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/filme/certificado/{id}', [FilmesController::class, 'certificado']);
Route::post('/filme/salvar', [FilmesController::class, 'salvar_vela']);
Route::put('/filmes/editar/{id}', [FilmesController::class, 'editar_filme']);
Route::delete('/filmes/deletar/{id}', [FilmesController::class, 'deletar_filme']);

Route::post('/register', function(Request $request) {
    $request->validate([
        "email" => "required|string|email|unique:users",
        "name" => "required|string",
        "password" => "required|string|min:6",
    ]);

    $numericCode = rand(100000, 999999);


    $user = User::create([
        "email" => $request->email,
        "name" => $request->name,
        "password" => Hash::make($request->password),
        "codigo" => $numericCode
    ]);


    return response()->json([
        "message" => "Cadastro realizado com sucesso",
        "user" => $user
    ]);
});


Route::post('/login', function (Request $request) {
    $credentials = $request->only('email', 'password');

    if(Auth::attempt($credentials)) {
        $user = $request->user();

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            "access_token" => $token,
            "token_type" => 'Bearer'
        ]);
    }

    return response() ->json([
        "message" => "Usuário inválido"
    ]);
});
