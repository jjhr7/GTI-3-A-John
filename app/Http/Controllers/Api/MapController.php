<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\LogicasDelNegocio\LNMap;
use Illuminate\Http\Request;

class MapController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $LNMap=new LNMap();

        return response([
            'devices'=>$LNMap->obtenerTodosLosMapas(),
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
        $LNMap=new LNMap();

        $mapaCreado=$LNMap->guardarMapa($request->date);

        if($mapaCreado[0]==1){
            return response([
                'message' => 'Device creado correctamente!',
                'device' => $mapaCreado[1],
                'success' => 1
            ]);
        }else {
            return response([
                'message' => 'Error! No se ha podido crear el dispositivo',
                'success' => 0
            ]);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $LNMap=new LNMap();
        $map=$LNMap->obtenerMapa($id);

        if($map[0]==1){
            return response([
                'message' => 'Device encontrado',
                'device' => $map[1],
                'success' => 1
            ]);
        }else{
            return response([
                'message'=>'Error! No se ha encontrado el device',
                'success'=>0
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //no se debe de poder actualizar un mapa de una fecha en concreto
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $LNMap=new LNMap();

        $mapaEliminado=$LNMap->eliminarMapa($id);

        if($mapaEliminado){
            return response([
                'message' => 'Se ha eliminado correctamente el dispositivo',
                'success' => 1
            ]);
        }else{
            return response([
                'message' => 'Error! No se ha podido eliminar el dispositivo',
                'success' => 0
            ]);
        }
    }
}
