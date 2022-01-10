<?php

namespace App\Http\LogicasDelNegocio;


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


}
