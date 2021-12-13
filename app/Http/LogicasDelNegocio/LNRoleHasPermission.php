<?php

namespace App\Http\LogicasDelNegocio;

use App\Models\RoleHasPermission;

class LNRoleHasPermission
{
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

    public function actualizarRoleHasPermission($role_id, $permission_id){
        $role=RoleHasPermission::find($id);

        //buscamos el rol por id
        if($role) {
            //los campos que queremos modificar
            $role->role_id = $role_id;
            $role->permission_id = $permission_id;

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
