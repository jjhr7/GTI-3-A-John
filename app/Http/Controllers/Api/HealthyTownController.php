<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\LogicasDelNegocio\LNHealthyTown;
use App\Models\Healthytown;
use Illuminate\Http\Request;

class HealthyTownController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $LNHealthy_town= new LNHealthyTown(); // Creamos nueva logica town

        return response([
            'towns'=>$LNHealthy_town->obtenerTodosLosHealthyTowns(),
            'success'=>1
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $LNHealthy_town = new LNHealthyTown(); // Creamos nueva logica town

        $healthy_townCreada=$LNHealthy_town->guardarHealthyTown($request->town_id,$request->date);

        if($healthy_townCreada[0] == 1) {
            return response([
                'message' => 'Town creada correctamente!',
                'town' => $healthy_townCreada[1],
                'success' => 1
            ]);
        }else{
            return response([
                'message'=>'Error! No se ha podido crear la town',
                'success'=>0
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Healthytown  $healthytown
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $LNHealthy_town=new LNHealthyTown(); // Creamos nueva logica town
        $healthy_town=$LNHealthy_town->obtenerHealthyTown($id);

        if($healthy_town[0]==1){
            return response([
                'message'=> 'Town encontrado',
                'town'=>$healthy_town[1],
                'success'=>1
            ]);
        }else{
            return response([
                'message'=>'Error! No se ha encontrado el municipio',
                'success'=>0
            ]);
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Healthytown  $healthytown
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Healthytown $healthytown)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Healthytown  $healthytown
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $LNHealthy_town=new LNHealthyTown(); // Creamos nueva logica town

        $healthy_townEliminada=$LNHealthy_town->eliminarHealthyTown($id);

        if($healthy_townEliminada){
            return response([
                'message' => 'Se ha eliminado correctamente la town',
                'success' => 1
            ]);
        }else{
            return response([
                'message' => 'Error! No se ha podido eliminar la town',
                'success' => 0
            ]);
        }
    }
}
