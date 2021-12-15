<?php

/**
 * @author Jonathan Hernández
 * LNTown
 * 2021-11-24
 * Lógica del negocio de town
 */

namespace App\Http\LogicasDelNegocio;
use App\Models\Town; //Instanciar el modelo que conecta con la base de datos
use Illuminate\Http\Request; //Validador para crear el municipio
use App\User;
use App\Models\Useraccountinformation;
use App\Models\Userinformation;

class LNTown
{

    /**
     * guardarMunicipio. Funcion que guarda un municipio en la base de datos.
     * @param $postal_code
     * @param $name
     * @param $area
     * @param $altitude
     */
    public function guardarMunicipio($postal_code, $name, $area, $altitude){
        //Crear una instancia del modelo vacío
        $town = new Town();
        $town->postal_code=$postal_code;
        $town->name=$name;
        $town->area=$area;
        $town->altitude=$altitude;

        $town->save();

        if($town){
            return [1,$town];
        }else{
            return [0];
        }
    }


    /**
     * eliminarTown. Funcion que elimina un municipio por id almacenado en la base de datos.
     * @param $id Id de la ciudad a eliminar
     */
    public function eliminarTown($id){
        $town = Town::find($id);
        //buscamos el municipio que queremos eliminar por la id

        if($town){
            $town->delete();
            return 1;
        }else{
            return 0;
        }
    }


    /**
     * obtenerTodosLosMunicipios. Funcion que obtiene todos los municipios almacenados en la base de datos.
     * @return Town[]|\Illuminate\Database\Eloquent\Collection Lista de municipios almacenados en la base de datos
     */
    public function obtenerTodosLosMunicipios(){
        return Town::all();
        //Devuelve todos los municipios registrados en la bbdd
    }


    /**
     * obtenerMunicipio. Funcion que obtiene un municipio por id almacenado en la base de datos.
     * @param $id Id del municipio a buscar
     */
    public function obtenerMunicipio($id){
        $town=Town::find($id);

        if($town) {
            return [1, $town];
        }else{
            return [0];
        }
    }


    /**
     * actualizarDatosTown. Funcion que actualiza todos los datos de una town por id almacenados en la base de datos.
     * @param $id del municipio a buscar
     * @param Request $request
     * @return array|int[]
     */
    public function actualizarDatosTown($id, Request $request){
        $town = Town::find($id);
        if($town){
            $town->postal_code=$request->postal_code;
            $town->name=$request->name;
            $town->area=$request->area;
            $town->altitude=$request->altitude;

            $town->save();

            return [1,$town];
        }else{
            return [0];
        }
    }

    public function obtenerTodosUsersDeUnaTown($id){

        $users = Userinformation::get();

        $contador=0;

        $usersOfTown= [];
        foreach ($users as $user){

            if($user->town_id==$id){

                $usersOfTown[$contador]=$user->user;

                $contador++;
            }

        }

        return $usersOfTown;

    }

}
