<?php

/**
 * @author Jonathan Hernández
 * LNTown
 * 2021-11-24
 * Controller de Town
 */

namespace App\Http\Controllers\Api;

use App\Models\Town;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\LogicasDelNegocio\LNTown;
use App\Http\Requests\StoreTown;
use Illuminate\Http\Response;

//Intancia la clase LNTown para poder utilizar sus métodos

class TownController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $LNTown= new LNTown(); // Creamos nueva logica town

        return response([
            'towns'=>$LNTown->obtenerTodosLosMunicipios(),
            'success'=>1
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreTown $request
     * @return Response
     */
    public function store(StoreTown $request)
    {
        $LNTown = new LNTown(); // Creamos nueva logica town

        $townCreada=$LNTown->guardarMunicipio($request->postal_code,$request->name, $request->area, $request->altitude);

        if($townCreada[0] == 1) {
            return response([
                'message' => 'Town creada correctamente!',
                'town' => $townCreada[1],
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
     * @param $id
     * @return Response
     */
    public function show($id)
    {
        $LNTown=new LNTown(); // Creamos nueva logica town
        $town=$LNTown->obtenerMunicipio($id);

        if($town[0]==1){
            return response([
                'message'=> 'Town encontrado',
                'town'=>$town[1],
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
     * @param Request $request
     * @param $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $LNTown = new LNTown(); // Creamos nueva logica town

        $townActualizada=$LNTown->actualizarDatosTown($id, $request);
        if($townActualizada[0]==1){
            return response([
                'message'=>'Se ha actualizado la town correctamente',
                'town'=>$townActualizada[1],
                'success' => 1
            ]);

        }else{
            return response([
                'message' => 'Se ha producido un error y no se ha podido actualizar la town',
                'success'=>0
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return Response
     */
    public function destroy($id)
    {
        $LNTown=new LNTown(); // Creamos nueva logica town

        $townEliminada=$LNTown->eliminarTown($id);

        if($townEliminada){
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
