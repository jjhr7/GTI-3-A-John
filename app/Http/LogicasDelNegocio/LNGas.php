<?php

/**
 * @author Belén Grande
 * LNGas
 * 2021-12-9
 * Lógica del negocio de gas
 */

namespace App\Http\LogicasDelNegocio;
use App\Models\Gas;
use Illuminate\Http\Request;

class LNGas
{

    /**
     * ObtenerTodosLosGases. Funcion que obtiene todos los gases almacenados en la base de datos.
     *
     * @return [Gas] Devuelve la lista de gases almacenados en la base de datos
     */
    public function obtenerTodosLosGases(){
        return Gas::all();
    }


    /**
     * ObtenerGas. Funcion que obtiene un gas por id almacenado en la base de datos.
     * @param id Id del gas a buscar
     */
    public function obtenerGas($id){
        $gas = Gas::find($id);

        if($gas){
            return [1, $gas];
        }else{
            return [0];
        }
    }

}
