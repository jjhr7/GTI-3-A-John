<?php


namespace App\Http\LogicasDelNegocio;


use App\Models\Notification;
use App\Permission;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

/**
 * @author Leire Villarroya Martínez
 * LNPermisssion
 * 2021-11-25
 * Lógica del negocio de permisos
 */

class LNPermission
{

    /**
     * Descripción de guardarPermiso. Función que guarda un permiso
     * @param $name
     * @param $guard_name
     * @return array
     */
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

    /**
     * Descripción de eliminarPermiso. Función que elimina un permiso
     * @param $id id del permiso
     * @return int
     */
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

    /**
     * Descripción de obtenerTodosLosPermisos. Función que devuelve todos los permisos
     *
     * @return Permission[]|Collection
     */
    public function obtenerTodosLosPermisos(){
        return Permission::all();
        //Devuelve todos los permisos registrados en la bbdd
    }

    /**
     * Descripción de obtenerPermiso. Función que devuelve un permiso.
     *
     * @param $id
     * @return array
     */
    public function obtenerPermiso($id){
        $permission=Permission::find($id);

        if($permission) {
            return [1, $permission];
        }else{
            return [0];
        }
    }

    /**
     * Descripción de actualizarDatosPermiso. Función que actualiza los datos de un permiso
     * dado su id
     * @param int $id
     * @param Request $request
     * @return array
     */
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
