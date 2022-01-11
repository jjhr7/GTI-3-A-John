<?php


namespace App\Http\LogicasDelNegocio;
use App\Models\Device;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Seeder;
/**
 * @author Leire Villarroya Martínez
 * LNDevices
 * 2021-11-26
 * Lógica del negocio de devices
 */

class LNDevices
{
    /**
     * Descripción de guardarDispositivos. Función que guarda un dispositivo dado el número de serie
     * @param $serial número serial del dispositivo
     *
     * @return array
     */
    public function guardarDispositivo(Request $request){
        $faker = \Faker\Factory::create();

        //Crear una instancia del modelo vacío
        $device=new Device();
        $device->serial=$faker->uuid;
        $device->save();
        //para guardar

        if($device) {
            //si va bien, devuelve 1 y el dispositivo
            return [1, $device];
        }else{
            return[0];
        }
    }

    /**
     * Descripción de obtenerTodosLosDispositivos. Función que devuelve todos los dispositivos
     *
     * @return Device[]|Collection
     */
    public function obtenerTodosLosDispositivos(){
        return Device::all();
    }

    /**
     * Descripción de obtenerDispositivo. Función que devuelve un dispositivo.
     *
     * @param $id
     * @return array
     */
    public function obtenerDispositivo($id){
        $device=Device::find($id);

        if($device){
            return [1,$device];
        }else{
            return[0];
        }
    }

    /**
     * Descripción de actualizarDatosDevice. Función que actualiza los datos del dispositivo seleccionado
     * dado su id
     * @param int $id
     * @param Request $request
     * @return array
     */
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

    /**
     * Descripción de eliminarDevice. Función que elimina el dispositivo dado su id
     * @param $id id del dispositivo
     * @return int
     */
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
