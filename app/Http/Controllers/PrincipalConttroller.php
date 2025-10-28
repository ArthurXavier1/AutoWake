<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PrincipalConttroller extends Controller
{
    
    
    public function exibe_principal (Request $resquest){
        return view('Principal');
    }
}
