<?php

namespace App\Http\Controllers;

use App\Http\LogicasDelNegocio\LNRoleHasPermission;
use App\Http\LogicasDelNegocio\LNRoles;
use App\Http\Requests\StoreRole;
use App\Models\Town;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
//use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Validator;
use App\Http\LogicasDelNegocio\LNPermission;
use App\Permission;
use DataTables,Auth;

class RolesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the roles page
     *
     */
    public function index()
    {

        $logicaPermissions= new LNPermission();
        $permissions=$logicaPermissions->obtenerTodosLosPermisos();

        try{

            return view('roles', compact('permissions'));
        }catch (\Exception $e) {
            $bug = $e->getMessage();
            return redirect()->back()->with('error', $bug);

        }
    }

    /**
     * Show the role list with associate permissions.
     * Server side list view using yajra datatables
     */

    public function getRoleList(Request $request)
    {

        $data  = Role::get();

        return Datatables::of($data)
                ->addColumn('permissions', function($data){
                    $roles = $data->permissions()->get();
                    $badges = '';
                    foreach ($roles as $key => $role) {
                        $badges .= '<span class="badge badge-dark m-1">'.$role->name.'</span>';
                    }
                    if($data->name == 'Super Admin'){
                        return '<span class="badge badge-success m-1">All permissions</span>';
                    }

                    return $badges;
                })
                ->addColumn('action', function($data){
                    if($data->name == 'Super Admin'){
                        return '';
                    }
                    if (auth()->user()->information->role->name == 'Super admin' || auth()->user()->information->role->name == 'Admin'){
                        return '<div class="table-actions">
                                    <a href="'.url('role/edit/'.$data->id).'" ><i class="ik ik-edit-2 f-16 mr-15 text-green"></i></a>
                                    <a href="'.url('role/delete/'.$data->id).'"  ><i class="ik ik-trash-2 f-16 text-red"></i></a>
                                </div>';
                    }else{
                        return '';
                    }
                })
                ->rawColumns(['permissions','action'])->toJson();
    }

    /**
     * Store new roles with assigned permission
     * Associate permissions will be stored in table
     */

    public function create(Request $request)
    {

            $lnRoles = new LNRoles();
            $LNRoleHasPermission=new LNRoleHasPermission();

            $rolCreado=$lnRoles->guardarRol($request->role,$request->role);


            if($rolCreado[0]==1){
                $permissionsId=$request->permissions;
                foreach ($permissionsId as $id){
                    $rolePermissionCreado=$LNRoleHasPermission->guardarRoleHasPermission($rolCreado[1]->id,$id);
                    if($rolePermissionCreado[0]==1){

                    }else{
                        return redirect('roles')->with('error', 'Failed to assign permission! Try again.');
                    }
                }

                return redirect('roles')->with('success', 'Role created succesfully!');


            }else{
                return redirect('roles')->with('error', 'Failed to create role! Try again.');

            }

    }

    public function createForm(){
       // $LNPermission=new LNPermission();
       // $permissions=$LNPermission->obtenerTodosLosPermisos();
        $permissions = Permission::pluck('name','id');
        return view('roles.role-create', compact('permissions'));
    }


    public function edit($id)
    {
        $role  = Role::where('id',$id)->first();
        $roles = \App\Role::where('id',$id)->first();
        // if role exist
        if($role){
            $role_permission = $roles->roleHasPermisions()
                                    ->pluck('permission_id')
                                    ->toArray();

            $permissions = Permission::pluck('name','id');

            return view('edit-roles', compact('role','role_permission','permissions'));
        }else{
            return redirect('404');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function update(Request $request)
    {
        try{

            $ln= new LNRoles();
            $lnH= new LNRoleHasPermission();
            $update = $ln->actualizarDatosRol($request, $request->id);
            // Sync role permissions
            foreach ($request->permissions as $permission){
                $roleH= $lnH->actualizarRoleHasPermission($request->id,$permission);
            }

            return redirect('roles')->with('success', 'Role info updated succesfully!');
        }catch (\Exception $e) {
            $bug = $e->getMessage();
            return redirect()->back()->with('error', $bug);

        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return Response
     */
    public function delete($id)
    {
        $role   = Role::find($id);
        if($role){
            $delete = $role->delete();
            $perm   = $role->permissions()->delete();

            return redirect('roles')->with('success', 'Role deleted!');
        }else{
            return redirect('404');
        }
    }

}
