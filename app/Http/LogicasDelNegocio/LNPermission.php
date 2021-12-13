<?php


namespace App\Http\LogicasDelNegocio;


use App\Permission;
use Illuminate\Http\Request;

class LNPermission
{
    public function guardarPermiso($name, $guard_name){
        //Instancia del modelo vacío
        $perimssion=new Permission();
        $perimssion->name=$name;
        $perimssion->guard_name=$guard_name;

        $perimssion->save();
        //Guardamos el permiso

        if($perimssion) {
            return [1, $perimssion];
            //Si ha ido bien, devuelve 1 y el permiso creado
        }else{
            return [0];
            //Si ha ido mal, devuelve 0
        }
    }

    public function eliminarPermiso($id){
        $permission=Permission::find($id);

        if($permission) {
            $permission->delete();
            return 1;
            //Si ha sido eliminado correctamente, devuelve 1
        }else{
            return 0;
            //Si no, devuleve 0
        }
    }

    public function obtenerTodosLosPermisos(){
        return Permission::all();
        //Devuelve todos los permisos registrados en la bbdd
    }

    public function obtenerPermiso($id){
        $permission=Permission::find($id);

        if($permission) {
            return [1, $permission];
        }else{
            return [0];
        }
    }

    public function actualizarDatosPermiso($id, Request $request){
        $permission=Permission::find($id);
        if($permission) {
            $permission->name = $request->permission;
            $permission->guard_name = $request->permission;

            $permission->save();
            //Modificación guardada

            return [1, $permission];
        }else{
            return 0;
        }
    }
}
