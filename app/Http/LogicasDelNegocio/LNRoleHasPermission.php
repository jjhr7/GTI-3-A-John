<?php

/**
 * @author Jose Julio
 * LNRoleHasPermission
 * 2021-11-24
 * Lógica del negocio de los roles con permisos
 */

namespace App\Http\LogicasDelNegocio;

use App\Models\RoleHasPermission;

class LNRoleHasPermission
{

    /**
     * guardarRoleHasPermission. Funcion que guarda un permiso como un rol en la base de datos.
     * @param $role_id Id del rol a guardar
     * @param $permission_id Id del permiso a guardar
     */
    public function guardarRoleHasPermission($role_id, $permission_id){
        //Instancia del modelo vacío
        $roleHasPermission=new RoleHasPermission();
        $roleHasPermission->role_id=$role_id;
        $roleHasPermission->permission_id=$permission_id;

        $roleHasPermission->save();
        //Guardamos el permiso

        if($roleHasPermission) {
            return [1, $roleHasPermission];
            //Si ha ido bien, devuelve 1 y el permiso creado
        }else{
            return [0];
            //Si ha ido mal, devuelve 0
        }
    }
}
