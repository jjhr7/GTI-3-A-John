<?php

namespace App\Http\LogicasDelNegocio;
use App\Models\Read;
use App\Models\Reads;
use DataTables;
use Illuminate\Http\Request;

/**
 * @author Leire Villarroya Martínez
 * LNMediciones
 * 2021-11-26
 * Lógica del negocio de mediciones
 */

class LNMediciones
{

    /**
     * Descripción de guardarMedicion. Función que guarda una medición
     * @param $data
     * @param $read_date
     * @param $device_id
     * @return array
     */
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

    /**
     * Descripción de obtenerTodasLasMediciones. Función que devuelve todas las mediciones
     * @return Reads
     */
    public function obtenerTodasLasMediciones(){
        return Reads::all();
    }

    /**
     * Descripción de eliminarMedicion. Función que elimina la medición dado su id
     * @param $id número del id del dispositivo
     * @return int
     */
    public function eliminarMedicion($id){
        $read = Reads::find($id);

        if($read){
            $read->delete();
            return 1;
        }else{
            return 0;
        }
    }

    /**
     * Descripción de obtenerUltimasMediciones. Función que devuelve las últimas mediciones dado el número de mediciones
     * @param $nMediciones número de mediciones que quiero obtener
     * @return Read
     */
    public function obtenerUltimasMediciones($nMediciones){
        return Reads::latest()->take($nMediciones)->get();
    }

    /**
     * Descripción de obtenerMedicion. Función que devuelve una medición dado su id
     * @param $id de la medición
     * @return Reads
     */
    public function obtenerMedicion($id){
        $read = Reads::find($id);

        if($read){
            return [1,$read];
        }else{
            return 0;
        }
    }

    /**
     * Descripción de actualizarDatosMedicion. Función que actualiza los datos de una medicion
     * dado su id
     * @param int $id
     * @param Request $request
     * @return array
     */
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

    /**
     * @return mixed
     */
    public function prepararTablaMediciones(){

        $data = $this->obtenerTodasLasMediciones();

        return Datatables::of($data)
            ->addColumn('device', function(Reads $read){
                if($read->device->serial != null){
                    return $read->device->serial;
                }else{
                    return '';
                }
            })
            ->addColumn('action', function($data){
                if($data->name == 'Super Admin'){
                    return '';
                }
                if (auth()->user()->information->role->name == 'Super admin' || auth()->user()->information->role->name == 'Admin'){
                    return '<div class="table-actions">
                                <a href="'.url('medicion/'.$data->id).'" ><i class="ik ik-edit-2 f-16 mr-15 text-green"></i></a>
                                <a href="'.url('medicion/delete/'.$data->id).'"><i class="ik ik-trash-2 f-16 text-red"></i></a>
                            </div>';
                }else{
                    return '';
                }
            })
            ->rawColumns(['action'])->toJson();
    }

    public function obtenerMedicionesPorCiudad($idtown){

        $mediciones = Reads::get();

        dd($mediciones);
        $contador=0;

        $medicionesByTown= [];
        foreach ($mediciones as $medicion){

            if($medicion->user->information->town->id==$idtown){


                $medicionesByTown[$contador]=$medicion;

                $contador++;
            }

        }

    }

}
