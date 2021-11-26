<?php


namespace App\Http\LogicasDelNegocio;
use App\Models\Device;
use Illuminate\Http\Request;



class LNDevices
{
    public function guardarDispositivo($serial){
        //Crear una instancia del modelo vacío
        $device=new Device();
        $device->serial=$serial;

        $device->save();
        //para guardar

        if($device) {
            //si va bien, devuelve 1 y el dispositivo
            return [1, $device];
        }else{
            return[0];
        }
    }

    public function obtenerTodosLosDispositivos(){
        return Device::all();
    }

    public function obtenerDispositivo($id){
        $device=Device::find($id);

        if($device){
            return [1,$device];
        }else{
            return[0];
        }
    }

    public function actualizarDatosDevice($id, Request $request){
        $device=Device::find($id);
        //busca el dispositivo que vamos a actualizar por el id
        if($device) {
            //campos que vamos a actualizar
            $device->serial = $request->serial;

            $device->save();
            //guardamos los cambiamos

            return [1, $device];
        }else{
            return[0];
        }
    }

    public function eliminarDevice($id){
        $device=Device::find($id);

        if($device){
            $device->delete();
            return 1;
        }else{
            return 0;
        }
    }


}
