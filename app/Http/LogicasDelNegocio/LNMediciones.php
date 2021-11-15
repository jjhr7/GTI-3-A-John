<?php

namespace App\Http\LogicasDelNegocio;
use App\Models\Read;
use DataTables;
use Illuminate\Http\Request;

class LNMediciones
{

    public function guardarMedicion($data, $read_date, $device_id){

        $read = new Read();
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
        return Read::all();
    }

    public function eliminarMedicion($id){
        $read = Read::find($id);

        if($read){
            $read->delete();
            return 1;
        }else{
            return 0;
        }
    }

    public function obtenerUltimasMediciones($nMediciones){
        return Read::latest()->take($nMediciones)->get();
    }

    public function obtenerMedicion($id){
        $read = Read::find($id);

        if($read){
            return [1,$read];
        }else{
            return 0;
        }
    }

    public function actualizarDatosMedicion($id, Request $request){
        $read =  Read::find($id);

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

    public function prepararTablaMediciones(){

        $data = $this->obtenerTodasLasMediciones();

        return Datatables::of($data)
            ->addColumn('device', function(Read $read){
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
                if (auth()->user()->role->name == 'Super admin' || auth()->user()->role->name == 'Admin'){
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

}
