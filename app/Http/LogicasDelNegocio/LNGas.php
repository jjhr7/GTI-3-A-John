<?php

namespace App\Http\LogicasDelNegocio;
use App\Models\Gas;
use Illuminate\Http\Request;

class LNGas
{

    public function obtenerTodosLosGases(){
        return Gas::all();
    }

    public function obtenerGas($id){
        $gas = Gas::find($id);

        if($gas){
            return [1, $gas];
        }else{
            return [0];
        }
    }

}
