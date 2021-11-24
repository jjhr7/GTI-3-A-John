<?php


namespace App\Http\LogicasDelNegocio;
use App\Models\Town; //Instanciar el modelo que conecta con la base de datos
use Illuminate\Http\Request; //Validador para crear el municipio

class LNTown
{

    public function obtenerTodosLosMunicipios(){
        return Town::all();
        //Devuelve todos los municipios registrados en la bbdd
    }

}
