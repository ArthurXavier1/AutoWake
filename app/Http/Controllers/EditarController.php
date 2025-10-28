<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EditarController extends Controller
{
     public function exibe_editarperfil (Request $resquest){
        return view('Editar_Perfil');
    }
}
