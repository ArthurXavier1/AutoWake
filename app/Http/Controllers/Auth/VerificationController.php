<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class VerificationController extends Controller
{
    public function enviarCodigo(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $email = $request->email;

        $user = User::where('email', $email)->first();

        if (!$user) {
            return response()->json(['status' => 'erro', 'mensagem' => 'Usuário não encontrado.'], 404);
        }

        // Gerar código de 6 dígitos
        $codigo = rand(100000, 999999);

        // Salvar hash do código no Redis por 10 minutos
        $hash = Hash::make($codigo);
        Redis::setex("verify:$email", 600, $hash);

        // Enviar email com o código (HTML customizado)
        Mail::send('emails.verificacao', ['user' => $user, 'codigo' => $codigo], function ($message) use ($email) {
            $message->to($email)
                ->subject('Seu código de verificação');
        });

        return response()->json(['status' => 'sucesso', 'mensagem' => 'Código enviado para o seu email.']);
    }

    public function validarCodigo(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'codigo' => 'required|string|min:6|max:6',
        ]);

        $email = $request->email;
        $codigo = $request->codigo;

        $hash = Redis::get("verify:$email");

        if (!$hash) {
            return response()->json(['status' => 'erro', 'mensagem' => 'Código expirado ou inválido.']);
        }

        if (Hash::check($codigo, $hash)) {
            // Marcar email verificado no banco
            $user = User::where('email', $email)->first();
            if ($user) {
                $user->email_verified_at = now();
                $user->save();
            }

            Redis::del("verify:$email");

            return response()->json(['status' => 'sucesso', 'mensagem' => 'Email verificado com sucesso!']);
        }

        return response()->json(['status' => 'erro', 'mensagem' => 'Código inválido.']);
    }
}