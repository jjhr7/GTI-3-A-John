<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\LogicasDelNegocio\LNRoleHasPermission;
use App\Http\LogicasDelNegocio\LNRoles;
use App\Http\Requests\StoreRole;
use Illuminate\Http\Request;
//use Spatie\Permission\Models\Role;
use App\Role;
use Auth;

class RolesController extends Controller
{
    public function list()
    {
        return response([
            'roles' => Role::all(),
            'success' => 1
        ]);
    }


    public function store(StoreRole $request)
    {

        // store user information
        //Código antiguo
        /*$role = Role::create(['name' => $request->name, 'guard_name' => 'api_'.$request->name]);

        if($role){
            return response([
                'message' => 'Role created succesfully!',
                'role'    => $role,
                'success' => 1
            ]);
        }

        return response([
                'message' => 'Sorry! Failed to create role!',
                'success' => 0
            ]);*/

        $LNRoles=new LNRoles();
        $LNRoleHasPermission=new LNRoleHasPermission();


        $rolCreado=$LNRoles->guardarRol($request->name,$request->guard_name);


        if($rolCreado[0]==1){
            $permissionsId=$request->permissions;
            foreach ($permissionsId as $id){
                $rolePermissionCreado=$LNRoleHasPermission->guardarRoleHasPermission($rolCreado[1]->id,$id);
                if($rolePermissionCreado[0]==1){
                    return response([
                        'message' => 'Permiso asignado correctamente!',
                        'role' => $rolePermissionCreado[1],
                        'success' => 1
                    ]);
                }else{
                    return response([
                        'message'=>'Error! No se ha podido crear el role',
                        'success'=>0
                    ]);
                }
            }

            return response([
                'message' => 'Rol creada correctamente!',
                'role' => $rolCreado[1],
                'success' => 1
            ]);

        }else{
            return response([
                'message'=>'Error! No se ha podido crear el role',
                'success'=>0
            ]);
        }
    }


    public function show($id)
    {
        //Código antiguo
        /*
        $role = Role::find($id);
        if($role)
            return response(['role' => $role,'success' => 1]);
        else
            return response(['message' => 'Sorry! Not found!','success' => 0]);
        */

        $LNRoles=new LNRoles();
        $role=$LNRoles->obtenerRol($id);
        //llamamos a obtener rol pasándole el id

        if($role[0]==1) {
            //si lo encuentra
            return response([
                'message' => 'Rol encontrado',
                'town' => $role[1],
                'success' => 1
            ]);
        }else{
            //sino
            return response([
                'message'=>'Error! No se ha encontrado el rol',
                'success'=>0
            ]);
        }

    }


    public function delete($id)
    {
        /*
         * Código antiguo
        $role = Role::find($id);

        if($role){
            $role->delete();
            return response(['message' => 'Role has been deleted','success' => 1]);
        }
        else
            return response(['message' => 'Sorry! Not found!','success' => 0]);
        */

        $LNRoles=new LNRoles();

        $rolEliminado=$LNRoles->eliminarRol($id);

        if($rolEliminado){
            return response([
                'message' => 'Se ha eliminado correctamente el rol',
                'success' => 1
            ]);
        }else{
            return response([
                'message' => 'Error! No se ha podido eliminar la town',
                'success' => 0
            ]);
        }
    }

    /*public function changePermissions($id,Request $request)
    {
        $request->validate([
            'permissions'     => 'required'
        ]);

        // update role permissions
        $role = Role::find($id);
        if($role){
            // assign permission to role
            $role->syncPermissions($request->permissions);
            return response([
                'message' => 'Permission changed successfully!',
                'success' => 1
            ]);
        }

        return response([
                'message' => 'Sorry! Role not found',
                'success' => 0
            ]);
    }*/

    public function update(Request $request, $id){
        /* Código viejo
        $role = Role::find($id);
        if($role){
            $role->update($request->all());

            return response([
                'message' => 'Role has been updated!',
                'role' => $role,
                'success' =>1
            ]);
        }
        return response([
               'message' => 'Sorry, role not found!',
                'success' => 0
            ]);*/

        $LNRoles=new LNRoles();



        $rolActualizado=$LNRoles->actualizarDatosRol($request, $id);

        if($rolActualizado[0]==1){
            return response([
                'message'=>'Se ha actualizado el rol correctamente',
                'role'=>$rolActualizado[1],
                'success' => 1
            ]);
        }else{
            return response([
                'message' => 'Se ha producido un error y no se ha podido actualizar el rol',
                'success'=>0
            ]);
        }
    }
}
