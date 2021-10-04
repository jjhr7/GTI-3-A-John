<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
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
        $role = Role::create(['name' => $request->name, 'guard_name' => 'api_'.$request->name]);


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
            ]);
    }


    public function show($id)
    {
        $role = Role::find($id);
        if($role)
            return response(['role' => $role,'success' => 1]);
        else
            return response(['message' => 'Sorry! Not found!','success' => 0]);
    }


    public function delete($id)
    {
        $role = Role::find($id);

        if($role){
            $role->delete();
            return response(['message' => 'Role has been deleted','success' => 1]);
        }
        else
            return response(['message' => 'Sorry! Not found!','success' => 0]);
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
            ]);
    }
}
