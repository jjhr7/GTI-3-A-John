<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Device;
use Illuminate\Http\Request;
use App\Http\LogicasDelNegocio\LNDevices;
use App\Http\Requests\StoreDevice;

/**
 * @author Leire Villarroya Martínez
 * DeviceController
 * 2021-11-26
 * Lógica del controlador de dispositivos
 */

class DeviceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $LNDevice=new LNDevices();

        return response([
            'devices'=>$LNDevice->obtenerTodosLosDispositivos(),
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
        $LNDevice=new LNDevices();

        $deviceCreada=$LNDevice->guardarDispositivo($request->serial);

        if($deviceCreada[0]==1){
            return response([
                'message' => 'Device creado correctamente!',
                'device' => $deviceCreada[1],
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
        $LNDevice=new LNDevices();
        $device=$LNDevice->obtenerDispositivo($id);

        if($device[0]==1){
            return response([
                'message' => 'Device encontrado',
                'device' => $device[1],
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
        $LNDevice=new LNDevices();

        $deviceActualizado=$LNDevice->actualizarDatosDevice($id, $request);

        if($deviceActualizado[0]==1){
            return response([
                'message'=>'Se ha actualizado el dispositivo correctamente',
                'device'=>$deviceActualizado[1],
                'success' => 1
            ]);
        }else{
            return response([
                'message' => 'Se ha producido un error y no se ha podido actualizar el dispositivo',
                'success'=>0
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $LNDevices=new LNDevices();

        $deviceEliminada=$LNDevices->eliminarDevice($id);

        if($deviceEliminada){
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
