<?php

namespace App\Http\Middleware;

use App\Models\UserToken; 
use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Auth_API
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->has('user_id') && $request->has('token')) {
            $achei = UserToken::where('user_id', $request->user_id)
                ->where('token', $request->token)
                ->where('valido_ate', '>=', Carbon::now())
                ->first();

            if ($achei) {
                return $next($request);
            } else {
                return response()->json(['msg' => 'Token Inválido ou expirado'], 401);
            }
        } else {
            return response()->json(['msg' => 'User ID ou Token vazio'], 401);
        }
        
    }
}
