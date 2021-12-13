<?php

/**
 * @author Belén Grande
 * GasController
 * 2021-12-9
 * Controlador de gas
 */

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\LogicasDelNegocio\LNGas;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class GasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $LNGas=new LNGas(); //Creamos una nueva logica de gas

        return response([
            'gases'=>$LNGas->obtenerTodosLosGases(), // obtenemos todos los gases
            'success'=>1
        ]);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $LNGas=new LNGas(); //Creamos una nueva logica de gas
        $gas=$LNGas->obtenerGas($id); //OBtenemos gas por id

        if($gas[0]==1){
            return response([
                'message' => 'Gas encontrado',
                'gas' => $gas[1], // Mostramos el gas
                'success' => 1
            ]);
        }else{
            return response([
                'message'=>'Error! No se ha encontrado el gas',
                'success'=>0
            ]);
        }
    }

}
