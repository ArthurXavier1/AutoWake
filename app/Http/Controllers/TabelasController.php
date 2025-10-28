<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TabelasController extends Controller
{
    public function exibe_Tabelas (Request $request){
        return view('Tabelas_Funcionario');
    }
}
