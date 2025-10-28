<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ListaController extends Controller
{
    public function exibe_listas (Request $resquest){
        return view('Listagroup');
    }
}
