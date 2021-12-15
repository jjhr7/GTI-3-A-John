<?php

namespace App\Http\LogicasDelNegocio;
use App\Models\Healthytown;


class LNHealthyTown
{

    /**
     * guardarMunicipio. Funcion que guarda un municipio en la base de datos.
     * @param $town_id
     * @param $date
     * @return array|int[]
     */
    public function guardarHealthyTown($town_id, $date){
        //Crear una instancia del modelo vacío
        $healthy_town = new Healthytown();
        $healthy_town->town_id = $town_id;
        $healthy_town->date = $date;

        $healthy_town->save();

        if($healthy_town){
            return [1,$healthy_town];
        }else{
            return [0];
        }
    }


    /**
     * obtenerTodosLosHealthyTowns. Funcion que obtiene todos los municipios almacenados en la base de datos.
     * @return Healthytown[]|\Illuminate\Database\Eloquent\Collection Lista de municipios almacenados en la base de datos
     */
    public function obtenerTodosLosHealthyTowns(){
        return Healthytown::all();
        //Devuelve todos los municipios registrados en la bbdd
    }

    /**
     * obtenerHealthyTown. Funcion que obtiene un municipio por id almacenado en la base de datos.
     * @param $id Id del municipio a buscar
     */
    public function obtenerHealthyTown($id){
        $healthy_town=Healthytown::find($id);

        if($healthy_town) {
            return [1, $healthy_town];
        }else{
            return [0];
        }
    }

    /**
     * eliminarTown. Funcion que elimina un municipio por id almacenado en la base de datos.
     * @param $id Id de la ciudad a eliminar
     */
    public function eliminarHealthyTown($id){
        $healthy_town = Healthytown::find($id);
        //buscamos el municipio que queremos eliminar por la id

        if($healthy_town){
            $healthy_town->delete();
            return 1;
        }else{
            return 0;
        }
    }
}
