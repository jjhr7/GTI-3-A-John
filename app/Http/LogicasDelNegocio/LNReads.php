<?php


namespace App\Http\LogicasDelNegocio;
use App\Models\Read;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * @author Leire Villarroya Martínez
 * LNReads
 * 2021-11-26
 * Lógica del negocio de mediciones
 */

class LNReads
{

    /**
     * Descripción de guardarRead. Función que guarda un dispositivo dado el número de serie
     * @param $user_id
     * @param $device_id
     * @param $latitude
     * @param $longitude
     * @param $type_read
     * @param $value
     * @param $date
     * @return array
     */
    public function guardarRead($user_id, $device_id, $latitude, $longitude,$type_read, $value){
        //Crear una instancia del modelo vacío
        $read=new Read();
        $read->user_id=$user_id;
        $read->device_id=$device_id;
        $read->latitude=$latitude;
        $read->longitude=$longitude;
        $read->type_read=$type_read;
        $read->value=$value;
        $read->date=Carbon::now('CET')->toRfc850String();

        $read->save();

        if($read){
            return [1,$read];
        }else{
            return [0];
        }
    }

    /**
     * Descripción de eliminarRead. Función que elimina la medición dado su id
     * @param $id número del id de la medición
     * @return int
     */
    public function eliminarRead($id){
        $read=Read::find($id);

        if($read){
            $read->delete();
            return 1;
        }else{
            return 0;
        }
    }

    /**
     * Descripción de obtenerTodosLosReads. Función que devuelve todos los reads
     * @return void
     */
    public function obtenerTodosLosReads(){
        $read=Read::all();
    }

    /**
     * Descripción de obtenerReads. Función que devuelve todos los reads
     * @param $id
     * @return array
     */
    public function obtenerReads($id){
        $read=Read::find($id);

        if($read){
            return [1,$read];
        }else{
            return [0];
        }
    }

    /**
     * Descripción de actualizarDatosRead. Función que actualiza los datos de una medicion
     * dado su id
     * @param int $id
     * @param Request $request
     * @return array
     */
    public function actualizarDatosRead($id, Request $request){
        $read=Read::find($id);
        if($read){
            $read->user_id=$request->user_id;
            $read->device_id=$request->device_id;
            $read->latitude=$request->latitude;
            $read->longitude=$request->longitude;
            $read->type_read=$request->type_read;
            $read->value=$request->value;
            $read->date=$request->date;

            $read->save();

            return[1,$read];
        }else{
            return [0];
        }
    }

    public function obtenerUltimasReads($nMediciones){
        return Read::latest()->take($nMediciones)->get();
    }

    public function obtenerTodasLasMedicionesPorUsuario(){

        $mediciones = auth()->user()->reads;


        return $mediciones;
    }

    public function obtenerReadsByUserAndDate($date){

        // La fecha: Monday, 13-Dec-21 17:13:02 CET
        $fecha_obtenida = strtotime($date);

        $num =0;
        $mediciones_dentro_fecha = [];

        $mediciones = auth()->user()->reads;

        foreach ($mediciones as $medicion ){

            if(strtotime($medicion->date)<=$fecha_obtenida){
                $mediciones_dentro_fecha[$num]= $medicion;

            }
            $num ++;
        }

        return $mediciones_dentro_fecha;
    }

    public function obtenerUltimasReadsByTown(){

        $mediciones = auth()->user()->reads;


        return $mediciones;
    }
}
