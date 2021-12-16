<?php

namespace App\Http\LogicasDelNegocio;

use App\Models\Zone;

class LNZone
{
    /**
     * guardarMunicipio. Funcion que guarda un municipio en la base de datos.
     * @param $postal_code
     * @param $name
     * @param $area
     * @param $altitude
     */
    public function guardarZona($request){

        //Crear una instancia del modelo vacío
        $zone = new Zone();
        $zone->o2avg=0;
        $zone->name=$request->name;
        $zone->geojson="non";
        $zone->area=$request->area;
        $zone->town_id=$request->id_town;

        $zone->save();

        if($zone){
            return [1,$zone];
        }else{
            return [0];
        }
    }


    /**
     * eliminarTown. Funcion que elimina una zona por id almacenado en la base de datos.
     * @param $id Id de la ciudad a eliminar
     */
    public function eliminarZona($id){
        $zone = Zone::find($id);
        //buscamos el municipio que queremos eliminar por la id

        if($zone){
            $zone->delete();
            return 1;
        }else{
            return 0;
        }
    }


    /**
     * obtenerTodosLosMunicipios. Funcion que obtiene todos los municipios almacenados en la base de datos.
     * @return Zone[]|\Illuminate\Database\Eloquent\Collection Lista de municipios almacenados en la base de datos
     */
    public function obtenerTodasLasZonas(){
        return Zone::all();
        //Devuelve todos los municipios registrados en la bbdd
    }


    /**
     * obtenerMunicipio. Funcion que obtiene una zona por id almacenado en la base de datos.
     * @param $id Id de la zona a buscar
     */
    public function obtenerZona($id){
        $zone=Zone::find($id);

        if($zone) {
            return [1, $zone];
        }else{
            return [0];
        }
    }


    /**
     * actualizarDatosTown. Funcion que actualiza todos los datos de una zona por id almacenados en la base de datos.
     * @param $id dela zona
     * @param Request $request
     * @return array|int[]
     */
    public function actualizarDatosZona($id, Request $request){
        $zone = Zone::find($id);
        if($zone){
            $zone->o2avg=$request->o2avg;
            $zone->name=$request->name;
            $zone->geojson=$request->geojson;
            $zone->area=$request->area;
            $zone->town_id=$request->town_id;

            $zone->save();

            return [1,$zone];
        }else{
            return [0];
        }
    }

}
