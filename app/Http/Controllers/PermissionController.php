<?php

namespace App\Http\Controllers;

use App\Http\LogicasDelNegocio\LNPermission;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Validator;
use DataTables,Auth;

class PermissionController extends Controller
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
        try{
            $roles = Role::pluck('name','id');

            return view('permisos.permissions', compact('roles'));
        }catch (\Exception $e) {
            $bug = $e->getMessage();
            return redirect()->back()->with('error', $bug);

        }
    }

    /**
     * Show the role list with associate permissions.
     * Server side list view using yajra datatables
     */

    public function getPermissionList(Request $request)
    {

        $data  = Permission::get();

        return Datatables::of($data)
            ->addColumn('action', function($data){
                if (auth()->user()->information->role->name == 'Super admin' || auth()->user()->information->role->name == 'Admin'){
                    return '<div class="table-actions">
                                <a href="'.url('permission/'.$data->id).'" ><i class="ik ik-edit-2 f-16 mr-15 text-green"></i></a>
                                <a href="'.url('permission/delete/'.$data->id).'"><i class="ik ik-trash-2 f-16 text-red"></i></a>
                            </div>';
                }else{
                    return '';
                }
            })
            ->rawColumns(['action'])->toJson();

    }

    /**
     * Store new roles with assigned permission
     * Associate permissions will be stored in table
     */

    public function create(Request $request)
    {

        $LNPermission = new LNPermission();

        $permisoCreado=$LNPermission->guardarPermiso($request->permission,$request->permission);


        if($permisoCreado[0]==1){

            return redirect('roles')->with('success', 'Permission created succesfully!');

        }else{
            return redirect('roles')->with('error', 'Failed to create permission! Try again.');

        }
    }

    public function update(Request $request)
    {


        try{

            $lnPermission = new LNPermission();
            $update = $lnPermission->actualizarDatosPermiso($request->id,$request);

            return redirect('permission')->with('success', 'Permission updated succesfully!');
        }catch (\Exception $e) {
            $bug = $e->getMessage();
            return redirect()->back()->with('error', $bug);

        }
    }

    public function edit($id)
    {

        try {

            $permission = Permission::find($id);
            $namePermission = $permission->name;

            if ($permission) {
                return view('permisos.edit-permission', compact('permission'));
            } else {
                return redirect('404');
            }

        } catch (\Exception $e) {
            $bug = $e->getMessage();
            return redirect()->back()->with('error', $bug);
        }
    }


    public function delete($id)
    {
        $permission   = Permission::find($id);
        if($permission){
            $delete = $permission->delete();
            $perm   = $permission->roles()->delete();

            return redirect('permission')->with('success', 'Permission deleted!');
        }else{
            return redirect('404');
        }
    }


    public function getPermissionBadgeByRole(Request $request){
        $badges = '';
        if ($request->id) {
            $role = Role::find($request->id);
            $permissions =  $role->permissions()->pluck('name','id');
            foreach ($permissions as $key => $permission) {
                $badges .= '<span class="badge badge-dark m-1">'.$permission.'</span>';
            }
        }

        if($role->name == 'Super Admin'){
            $badges = 'Super Admin has all the permissions!';
        }

        return $badges;
    }

    public function createForm(){
        // $LNPermission=new LNPermission();
        // $permissions=$LNPermission->obtenerTodosLosPermisos();
        $permissions = Permission::pluck('name','id');
        return view('permisos.create-permission');
    }
}
