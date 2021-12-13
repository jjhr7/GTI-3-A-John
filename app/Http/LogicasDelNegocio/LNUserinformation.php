<?php

/**
 * @author Jonathan Hernández
 * LNGas
 * 2021-11-26
 * Lógica del negocio de la información del usuario
 */

namespace App\Http\LogicasDelNegocio;
use App\Models\Device;
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

    public function assignDevice($serial){


        $userInformation = Userinformation::find(Userinformation::where('user_id',auth()->user()->id)->get()[0]->id);

        $device = Device::where('serial',$serial)->get();

        if($device){
            $userInformation->device_id = $device[0]->id;
            $userInformation->save();

            return [1,$userInformation];
        }else{
            return [0];
        }

    }
}
