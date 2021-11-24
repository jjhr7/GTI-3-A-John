<?php

namespace App\Http\LogicasDelNegocio;
use App\Models\Userinformation;

class LNUserinformation
{
    public function guardarUserinformationApp($id,$role_id,$town_id){


        $userinformation = new Userinformation();
        $userinformation->user_id = $id;
        $userinformation->role_id = $role_id;
        $userinformation->town_id = $town_id;

        $userinformation->save();

        if($userinformation){
            return [1,$userinformation];
        }else{
            return [0];
        }
    }
}
