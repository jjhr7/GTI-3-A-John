<?php


namespace App\Http\LogicasDelNegocio;


use App\Role;
use Illuminate\Http\Request;

class LNRoles
{
    public function guardarRol($name, $guard_name){
        //Crear una isntancia del modelo vacío
        $role=new Role();
        $role->name=$name;
        $role->guard_name=$guard_name;

        $role->save();
        //guardamos el rol creado

        if($role){
            //si se ha añadido correctamente
            //devuelve 1 más el rol
            return [1,$role];
        }else{
            //si no se ha añadido
            //devuelve 0
            return [0];
        }
    }

    public function eliminarRol($id){
        $role=Role::find($id);
        //buscamos el rol que queremos eliminar por la id

        if($role){
            $role->delete();
            //si se hace bien
            return 1;
        }else{
            //sino
            return 0;
        }
    }

    public function obtenerRol($id){
        $role=Role::find($id);
        //para obtener todos los roles de la bbdd

        if($role){
            //si ha ido bien
            return [1,$role];
        }else{
            //si no
            return [0];
        }
    }

    public function obtenerTodosLosRoles(){
        return Role::all();
        //Devuelve todos los roles registrados en la bbdd
    }

    public function actualizarDatosRol(Request $request, $id){
        //dd($request);
        $role=Role::find($id);

        //buscamos el rol por id
        if($role) {
            //los campos que queremos modificar
            $role->name = $request->name;
            $role->guard_name = $request->guard_name;

            $role->save();
            //guardamos

            //si ha ido bien
            return [1, $role];
        }else{
            //si no
            return [0];
        }
    }
}
