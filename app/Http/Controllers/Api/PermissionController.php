<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\LogicasDelNegocio\LNPermission;
use App\Http\Requests\StorePermission;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Auth;

class PermissionController extends Controller
{
    public function list()
    {
        return response([
            'permissions' => Permission::all(),
            'success' => 1
        ]);
    }


    public function store(StorePermission $request)
    {
        /*$request->validate([
            'name'     => 'required| unique:permissions'
        ]);

        store user information
        $permission = Permission::create(['guard_name' => 'web','name' => $request->name]);
        if($permission){
            return response([
                'message' => 'Permission created succesfully!',
                'permission'    => $permission,
                'success' => 1
            ]);*/
        $LNPermission=new LNPermission();

        $permissionCreada=$LNPermission->guardarPermiso($request->name,$request->guard_name);

        if($permissionCreada[0]==1){
            return response([
                'message' => 'Permiso creado correctamente!',
                'permission' => $permissionCreada[1],
                'success' => 1
            ]);
        }else{
            return response([
                'message'=>'Error! No se ha podido crear el permiso',
                'success'=>0
            ]);
        }
    }


    public function show($id,Request $request)
    {
        /* codigo anterior
        $permission = Permission::with('roles')->find($id);
        if($permission)
            return response(['permission' => $permission,'success' => 1]);
        else
            return response(['message' => 'Sorry! Not found!','success' => 0]);
        */

        $LNPermission=new LNPermission();
        $permission=$LNPermission->obtenerPermiso($id);

        if($permission[0]==1) {
            return response([
                'message' => 'Permiso encontrado',
                'permission' => $permission[1],
                'success' => 1
            ]);
        }else{
            return response([
                'message'=>'Error! No se ha encontrado el permiso',
                'success'=>0
            ]);
        }
    }


    public function delete($id, Request $request)
    {
        /* código antiguo
        $permission = Permission::find($id);

        if($permission){
            $permission->delete();
            return response(['message' => 'Permission has been deleted','success' => 1]);
        }
        else
            return response(['message' => 'Sorry! Not found!','success' => 0]);
        */

        $LNPermission=new LNPermission();
        $permission=$LNPermission->eliminarPermiso($id);
    }

    public function update(Request $request, $id){

        $LNPermission = new LNPermission();
        $permissionUpdated =  $LNPermission->actualizarDatosPermiso($id, $request);
        if($permissionUpdated[0] == 1){
            return response([
                'message' => 'User has been updated successfully!',
                'permission'=> $permissionUpdated[1],
                'success' => 1
            ]);
        }

        return response([
            'message' => 'Sorry! User Not found!',
            'success' => 0
        ]);
    }
}
