<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DatableController extends Controller
{
     public function exibe_Datable (Request $resquest){
        return view('Datable');
    }
}
