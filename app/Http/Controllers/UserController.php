<?php

namespace App\Http\Controllers;

use App\Http\LogicasDelNegocio\LNUser;
use App\Models\Town;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

use App\User;
//use Spatie\Permission\Models\Role;
use App\Role;
use Spatie\Permission\Models\Permission;
use DataTables,Auth;

class UserController extends Controller
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
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function index()
    {
        return view('users');

    }

    /**
     * Obtiene una lista del usuario
     *
     * @param Request $request
     * @return mixed
     */
    public function getUserList(Request $request)
    {

        $data  = User::get();


        return Datatables::of($data)
                ->addColumn('rol', function(User $user){
                    if($user->information->role->name != null){
                        return $user->information->role->name;
                    }else{
                        return '';
                    }
                })
                ->addColumn('action', function($data){
                    if($data->name == 'Super Admin'){
                        return '';
                    }
                    if (auth()->user()->information->role->name == 'Super admin' || auth()->user()->information->role->name == 'Admin'){
                        return '<div class="table-actions">
                                <a href="'.url('user/'.$data->id).'" ><i class="ik ik-edit-2 f-16 mr-15 text-green"></i></a>
                                <a href="'.url('user/delete/'.$data->id).'"><i class="ik ik-trash-2 f-16 text-red"></i></a>
                            </div>';
                    }else{
                        return '';
                    }
                })
                ->rawColumns(['action'])->toJson();
    }

    /**
     * Crea un usuario
     *
     * @return mixed
     */
    public function create()
    {
        try
        {
            $data  = Town::pluck('name','id');;
            $roles = Role::pluck('name','id');
            return view('create-user', compact('roles', 'data'));

        }catch (\Exception $e) {
            $bug = $e->getMessage();
            return redirect()->back()->with('error', $bug);

        }
    }

    /**
     * Almacena un usuario
     *
     * @param Request $request
     * @return mixed
     */
    public function store(Request $request)
    {
        // create user
        $validator = Validator::make($request->all(), [
            'name'     => 'required | string ',
            'email'    => 'required | email | unique:users',
            'password' => 'required | confirmed',
            'role'     => 'required'
        ]);

        if($validator->fails()) {
            return redirect()->back()->withInput()->with('error', $validator->messages()->first());
        }
        try
        {
            // store user information
            $user = User::create([
                        'name'     => $request->name,
                        'email'    => $request->email,
                        'password' => Hash::make($request->password),
                    ]);

            // assign new role to the user
            $user->syncRoles($request->role);

            if($user){
                return redirect('users')->with('success', 'New user created!');
            }else{
                return redirect('users')->with('error', 'Failed to create new user! Try again.');
            }
        }catch (\Exception $e) {
            $bug = $e->getMessage();
            return redirect()->back()->with('error', $bug);
        }
    }

    /**
     * Edita un usuario
     *
     * @param $id
     * @return Application|Factory|View|RedirectResponse|Redirector
     */
    public function edit($id)
    {
        try
        {

            $user  = User::find($id);

            if($user){
                $user_town = $user->information->town->id;

                $user_role = $user->information->role->id;
                $towns  = Town::pluck('name','id');;
                $roles   = Role::pluck('name','id');

                return view('user-edit', compact('user','user_role','user_town','roles', 'towns'));
            }else{
                return redirect('404');
            }

        }catch (\Exception $e) {
            $bug = $e->getMessage();
            return redirect()->back()->with('error', $bug);
        }
    }

    /**
     * Actualiza un usuario
     *
     * @param Request $request
     * @return mixed
     */
    public function update(Request $request)
    {
        // update user info
        $validator = Validator::make($request->all(), [
            'id'       => 'required',
            'name'     => 'required | string ',
            'email'    => 'required | email',
            'role'     => 'required'
        ]);

        // check validation for password match
        if(isset($request->password)){
            $validator = Validator::make($request->all(), [
                'password' => 'required | confirmed'
            ]);
        }

        if ($validator->fails()) {
            return redirect()->back()->withInput()->with('error', $validator->messages()->first());
        }

        try{

            $user = User::find($request->id);

            $lnUser = new LNUser();
            $update = $lnUser->actualizarDatosUsuario($request->id,$request);

            // update password if user input a new password
            if(isset($request->password)){
                $update = $user->update([
                    'password' => Hash::make($request->password)
                ]);
            }

            return redirect('users')->with('success', 'User information updated succesfully!');
        }catch (\Exception $e) {
            $bug = $e->getMessage();
            return redirect()->back()->with('error', $bug);

        }
    }

    /**
     * Elimina un usuario
     *
     * @param $id
     * @return Application|Redirector|RedirectResponse
     */
    public function delete($id)
    {
        $user   = User::find($id);
        if($user){
            $user->delete();
            return redirect('users')->with('success', 'User removed!');
        }else{
            return redirect('users')->with('error', 'User not found');
        }
    }
}
