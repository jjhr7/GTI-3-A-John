<?php

namespace App\Http\LogicasDelNegocio;


use App\Models\Map;
use App\Models\Reads;
use http\Env\Response;

include('vendor/rmccue/requests/library/Requests.php');

Requests::register_autoloader();

class LNMap
{

    /**
     * Descripción de obtenerMedicionDeLasEstaciones. Función que devuelve la medicion de las estaciones oficiales de medida
     * Haciendo una petición a la api oficial
     * @return Response
     */
        public function obtenerMedicionDeLasEstaciones($lat, $lon){
            $url = 'http://api.airvisual.com/v2/nearest_city?lat='.$lat.'&lon='.$lon.'&key=e88b27dd-b65c-4eb6-a258-4b161fa20949';

            $response = Requests::get($url);

            return $response::all();
        }

    /**
     * Descripción de guardarMapa. Función que guarda una medición
     * @param $date
     * @return array
     */
    public function guardarMapa($date){

        $map = new Map();
        $map->date = $date;

        $map->save();

        if($map){
            return [1,$map];
        }else{
            return [0];
        }
    }

    /**
     * Descripción de obtenerTodosLosMapas. Función que devuelve todos los mapas
     *
     * @return Map[]|Collection
     */
    public function obtenerTodosLosMapas(){
        return Map::all();
    }

    /**
     * Descripción de obtenerMapa. Función que devuelve un mapa.
     *
     * @param $id
     * @return array
     */
    public function obtenerMapa($id){
        $map=Map::find($id);

        if($map){
            return [1,$map];
        }else{
            return[0];
        }
    }

    /**
     * Descripción de eliminarMapa. Función que elimina el mapa dado su id
     * @param $id id del mapa
     * @return int
     */
    public function eliminarMapa($id){
        $map=Map::find($id);

        if($map){
            $map->delete();
            return 1;
        }else{
            return 0;
        }
    }

}
