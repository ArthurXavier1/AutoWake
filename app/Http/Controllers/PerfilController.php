<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PerfilController extends Controller
{
     public function exibe_Perfil (Request $resquest){
        return view('Perfil');
    }
}
