<?php

/**
 * @author Leire Villarroya
 * LNRoles
 * 2021-11-25
 * Lógica del negocio de roles
 */

namespace App\Http\LogicasDelNegocio;


use App\Role;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class LNRoles
{

    /**
     * guardarRol. Funcion que guarda un rol en la base de datos.
     * @param $name Nombre del rol a guardar
     * @param $guard_name
     * @return array|int[]
     */
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


    /**
     * eliminarRol. Funcion que elimina un rol por id en la base de datos.
     * @param $id Id del rol a buscar
     */
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

    /**
     * obtenerRol. Funcion que obtiene un rol por id en la base de datos.
     * @param $id Id del rol a buscar
     */
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

    /**
     * obtenerTodosLosRoles. Funcion que obtiene todos los roles almacenados en la base de datos.
     * @return Role[]|Collection Lista de roles almacenados en la base de datos
     */
    public function obtenerTodosLosRoles(){
        return Role::all();
        //Devuelve todos los roles registrados en la bbdd
    }

    /**
     * actualizarDatosRol. Funcion que actualizar todos los datos del rol almacenados en la base de datos.
     * @param Request $request Request para acceder a la petición
     * @param $id Id del rol a buscar
     * @return array|int[]
     */
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
