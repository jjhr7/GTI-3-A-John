<?php


namespace App\Http\LogicasDelNegocio;
use App\Models\Town; //Instanciar el modelo que conecta con la base de datos
use Illuminate\Http\Request; //Validador para crear el municipio

class LNTown
{
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

    public function obtenerTodosLosMunicipios(){
        return Town::all();
        //Devuelve todos los municipios registrados en la bbdd
    }

    public function obtenerMunicipio($id){
        $town=Town::find($id);

        if($town) {
            return [1, $town];
        }else{
            return [0];
        }
    }

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

}
