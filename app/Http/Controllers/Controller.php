<?php

namespace App\Http\Controllers;

use App\Models\User;



abstract class Controller
{
    public function validar_email($codigo) {
        $codigo = User::where('codigo','=',$codigo)->get()->first();
        
        if($codigo){
            $codigo->verificado = 'S';
            $codigo->save();
            return view("mail.verificado")->with('usuario', $codigo)->with("achou", "S");
        }else{
            $codigo = new User();
            return view("mail.nao_verificado")->with('usuario', $codigo)->with("achou", "N");
        }
    }

}