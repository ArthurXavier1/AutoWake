<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
     public function exibe_DashboardAuto (Request $resquest){
        return view('DashboardAuto');
    }
}
