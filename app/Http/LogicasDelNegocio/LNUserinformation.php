<?php

/**
 * @author Jonathan Hernández
 * LNUserInformation
 * 2021-11-26
 * Lógica del negocio de la informacion del usuario
 */

namespace App\Http\LogicasDelNegocio;
use App\Models\Device;
use App\Models\Userinformation;

class LNUserinformation
{

    /**
     * guardarUserinformationApp. Funcion que guarda un rol en la base de datos.
     * @param $id id del usuario de la informacion a guardar
     * @param $role_id  rol del usuario de la informacion a guardar
     * @param $town_id ciudad del usuario de la informacion a guardar
     * @return array|int[]
     */
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

    /**
     * assignDevice. Funcion que asigna un dispositov a un usuario de la base de datos.
     * @param $serial serial del dispositivo a asignar
     * @return array|int[]
     */
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
