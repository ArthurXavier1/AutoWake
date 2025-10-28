<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\File;
use App\Models\UserToken;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use GuzzleHttp\Psr7\Response;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
        'name' => 'required|string',
        'email' => [
        'required',
        'string',
        'email',
        'unique:users,email',
        'regex:/^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$/', 
        'regex:/[0-9]/', 
        ],
        'password' => 'required|string|min:6',
    ], [
        'email.regex' => 'O e-mail deve estar em letras minúsculas, conter "@" e pelo menos um número.',
    ]);


        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $tokenString = md5($request->password . $request->email . Carbon::now());

        UserToken::where('user_id', $user->id)->delete();

        $usertoken = new UserToken();
        $usertoken->user_id = $user->id;
        $usertoken->token = $tokenString;
        $usertoken->valido_ate = Carbon::now()->addDays(7);
        $usertoken->save();

        return response()->json([
            'message' => 'Usuário registrado com sucesso.',
            'usuario' => [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'token' => $usertoken->token,
            ],
        ], 201);
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (!Auth::attempt($credentials)) {
            return response()->json(['error' => 'Email ou senha inválidos'], 401);
        }

        $user = Auth::user();

        $tokenString = md5($request->password . $request->email . Carbon::now());

        UserToken::where('user_id', $user->id)->delete();

        $usertoken = new UserToken();
        $usertoken->user_id = $user->id;
        $usertoken->token = $tokenString;
        $usertoken->valido_ate = Carbon::now()->addDays(7);
        $usertoken->save();

        return response()->json([
            'message' => 'Login realizado com sucesso.',
            'usuario' => [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'token' => $usertoken->token,
            ],
        ], 200);
    }

    public function profile()
    {
        return response()->json(Auth::user());
    }

    public function logout()
    {
        Auth::logout();
        return response()->json(['message' => 'Logout realizado com sucesso']);
    }


    public function mostrar_pdf (Request $request){

        $data = [];
        $data['usuarios'] = User::get()->all();

        $pdf = Pdf::loadView('pdf.invoice', $data);
        return $pdf->download('invoice.pdf');

    }
}