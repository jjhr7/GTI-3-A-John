<?php

namespace App\Http\LogicasDelNegocio;
use App\Models\Reads;
use Illuminate\Http\Request;

class LNMediciones
{

    public function guardarMedicion($data, $read_date, $device_id){

        $read = new Reads();
        $read->data = $data;
        $read->read_date = $read_date;
        $read->device_id = $device_id;

        $read->save();

        if($read){
            return [1,$read];
        }else{
            return [0];
        }
    }

    public function obtenerTodasLasMediciones(){
        return Reads::all();
    }

    public function eliminarMedicion($id){
        $read = Reads::find($id);

        if($read){
            $read->delete();
            return 1;
        }else{
            return 0;
        }
    }

    public function obtenerUltimasMediciones($nMediciones){
        return Reads::latest()->take($nMediciones)->get();
    }

    public function obtenerMedicion($id){
        $read = Reads::find($id);

        if($read){
            return [1,$read];
        }else{
            return 0;
        }
    }

    public function actualizarDatosMedicion($id, Request $request){
        $read =  Reads::find($id);

        if($read){
            $read->data = $request->data;
            $read->read_date = $request->read_date;
            $read->device_id = $request->device_id;

            $read->save();

            return [1,$read];
        }else{
            return [0];
        }
    }

}
