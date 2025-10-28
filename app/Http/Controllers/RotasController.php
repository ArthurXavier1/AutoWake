<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RotasController extends Controller
{
    public function exibe_rotas (Request $resquest){
        return view('Iniciar_Rota');
    }
}
