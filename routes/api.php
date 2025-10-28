<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RelatorioController;
use App\Http\Controllers\AuthController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Middleware\Auth_API;
use App\Mail\VerificationCodeMail;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Relatorio_reactController;
use App\Http\Controllers\Funcionario_reactController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\FreteController;


Route::post('/cadastro_frete', [FreteController::class, 'processaFrete']);

Route::get('/user', function (Request $request) {
    return $request->user();


})->middleware('auth:sanctum');

Route::middleware([Auth_API::class])->group(function () {



Route::post('PrimeiroPdf', [AuthController::class, 'mostrar_pdf']);

Route::post('/relatorio/salvar', [Relatorio_reactController::class, 'salvar_relatorio']);
Route::get('/relatorio/listar', [Relatorio_reactController::class, 'listar_relatorios']);
Route::get('/relatorio/exibir/{id}', [Relatorio_reactController::class, 'exibir_relatorio']);
Route::put('/relatorio/editar/{id}', [Relatorio_reactController::class, 'editar_relatorio']);
Route::delete('/relatorio/deletar/{id}', [Relatorio_reactController::class, 'deletar_relatorio']);
Route::get('/relatorios-filtrar', [Relatorio_reactController::class, 'filtrar_relatorios']);


});

Route::post('/login',[AuthController::class,'login']);



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