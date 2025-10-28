<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CaminhaoController extends Controller
{
     public function exibe_caminhao (Request $resquest){
        return view('Cadastro_Caminhao');
    }   
}
