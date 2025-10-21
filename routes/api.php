<?php

use App\Http\Controllers\Auth\VerificationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Relatorio_reactController;
use App\Http\Controllers\Funcionario_reactController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Mail\VerificationCodeMail;


Route::post('/api/enviar-codigo', [VerificationController::class, 'enviarCodigo']);


Route::post('/api/confirmacao/validar', function(Request $request) {
    $request->validate([
        'email' => 'required|email',
        'nome' => 'required|string',
        'codigo' => 'required|digits:6',
    ]);

    $user = User::where('email', $request->email)
                ->where('name', $request->nome)
                ->first();

    if (!$user) {
        return response()->json([
            'status' => 'erro',
            'mensagem' => 'Usuário não encontrado.'
        ], 404);
    }

    if ($user->codigo === $request->codigo) {
        $user->email_confirmado = true;
        $user->save();

        return response()->json([
            'status' => 'sucesso',
            'mensagem' => 'Código confirmado com sucesso!'
        ]);
    }

    return response()->json([
        'status' => 'erro',
        'mensagem' => 'Código inválido.'
    ], 422);
});



Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});


Route::apiResource('funcionarios', Funcionario_reactController::class);
Route::apiResource('relatorios', Relatorio_reactController::class);



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

    // Envia o e-mail com o código
    Mail::to($user->email)->send(new VerificationCodeMail($user));

    return response()->json([
        "message" => "Cadastro realizado com sucesso. Verifique seu e-mail.",
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