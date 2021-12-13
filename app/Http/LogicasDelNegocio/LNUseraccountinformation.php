<?php

/**
 * @author Jonathan Hernández
 * LNUserAccountInformation
 * 2021-11-24
 * Lógica del negocio de la información de la cuenta del usuario
 */

namespace App\Http\LogicasDelNegocio;

use App\Models\Useraccountinformation;

class LNUseraccountinformation
{

    /**
     * guardarUsuarioaccountinformationApp. Funcion que guarda una información del usuario en su cuenta en la base de datos.
     * @param $id Id del usuario
     */
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
