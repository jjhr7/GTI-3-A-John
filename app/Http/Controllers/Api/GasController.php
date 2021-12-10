<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\LogicasDelNegocio\LNGas;
use Illuminate\Http\Request;

class GasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $LNGas=new LNGas();

        return response([
            'gases'=>$LNGas->obtenerTodosLosGases(),
            'success'=>1
        ]);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $LNGas=new LNGas();
        $gas=$LNGas->obtenerGas($id);

        if($gas[0]==1){
            return response([
                'message' => 'Gas encontrado',
                'gas' => $gas[1],
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
