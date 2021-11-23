<?php

namespace App\Http\LogicasDelNegocio;

use App\Models\Useraccountinformation;

class LNUseraccountinformation
{
    public function guardarUsuarioaccountinformationApp($id){

        $useraccountinformation = new Useraccountinformation();
        $useraccountinformation->user_id = $id;

        $useraccountinformation->save();

        if ($useraccountinformation){
            return [1, $useraccountinformation];
        }else{
            return [0];
        }
    }
}
