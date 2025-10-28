<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CadastrosController extends Controller
{
    public function exibe_cadastros (Request $resquest){
        return view('Cadastros');
    }
}
