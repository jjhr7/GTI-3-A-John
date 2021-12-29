<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\LogicasDelNegocio\LNZone;
use App\Models\Zone;
use Illuminate\Http\Request;

class ZoneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $LNTown= new LNZone(); // Creamos nueva logica town

        return response([
            'towns'=>$LNTown->obtenerTodasLasZonas(),
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
        $LNZone = new LNZone(); // Creamos nueva logica town

        $zoneCreada=$LNZone->guardarZona($request);


        if($zoneCreada[0] == 1) {
            return response([
                'message' => 'Zona creada correctamente!',
                'town' => $zoneCreada[1],
                'success' => 1
            ]);
        }else{
            return response([
                'message'=>'Error! No se ha podido crear la zona',
                'success'=>0
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Zone  $zone
     * @return \Illuminate\Http\Response
     */
    public function show(Zone $zone)
    {
        $LNZone=new LNZone(); // Creamos nueva logica town
        $zone=$LNZone->obtenerZona($id);

        if($zone[0]==1){
            return response([
                'message'=> 'Zona encontrada',
                'town'=>$zone[1],
                'success'=>1
            ]);
        }else{
            return response([
                'message'=>'Error! No se ha encontrado la zona',
                'success'=>0
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Zone  $zone
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Zone $zone)
    {
        $LNZone = new LNZone(); // Creamos nueva logica town

        $zonaActualizada=$LNZone->actualizarDatosZona($id, $request);
        if($zonaActualizada[0]==1){
            return response([
                'message'=>'Se ha actualizado la zona correctamente',
                'town'=>$zonaActualizada[1],
                'success' => 1
            ]);

        }else{
            return response([
                'message' => 'Se ha producido un error y no se ha podido actualizar la zona',
                'success'=>0
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Zone  $zone
     * @return \Illuminate\Http\Response
     */
    public function destroy(Zone $zone)
    {
        $LNZone=new LNZone(); // Creamos nueva logica town

        $zonaEliminada=$LNZone->eliminarZona($id);


        if($zonaEliminada){
            return response([
                'message' => 'Se ha eliminado correctamente la zona',
                'success' => 1
            ]);
        }else{
            return response([
                'message' => 'Error! No se ha podido eliminar la zona',
                'success' => 0
            ]);
        }
    }
}
