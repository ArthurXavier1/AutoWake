<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AutowakeController extends Controller
{
     public function exibe_inicial (Request $resquest){
        return view('AutoWake');
    }   
}
