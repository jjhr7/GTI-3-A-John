<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\User;
use Auth;
use App\Http\LogicasDelNegocio\LNUser;

class UserController extends Controller
{


    public function list()
    {
        $LNuser = new LNUser();

        return response([
                'users' => $LNuser->obtenerTodosLosUsuarios(),
                'success' => 1
            ]);
    }


    public function store(StoreUser $request)
    {
        $LNuser = new LNUser();

        $userCreated = $LNuser->guardarUsuario($request->name,$request->email,$request->password,$request->role_id);


        if($userCreated[0]){

            return response([
                'message' => 'User created succesfully!',
                'user'    => User::find($userCreated[1]),
                'success' => 1
            ]);
        }

        return response([
                'message' => 'Sorry! Failed to create user!',
                'success' => 0
            ]);
    }

    public function profile($id)
    {
        $LNUser = new LNUser();
        $userData = $LNUser->obtenerDatosUsuario($id);
        if($userData[0])
            return response(['user' => $userData[1],'success' => 1]);
        else
            return response(['message' => 'Sorry! Not found!','success' => 0]);
    }


    public function delete($id)
    {
        $LNUser = new LNUser();
        $userRemoved = $LNUser->eliminarUsuario($id);

        if($userRemoved){
            return response(['message' => 'User has been deleted','success' => 1]);
        }
        else
            return response(['message' => 'Sorry! Not found!','success' => 0]);
    }


    /*public function changeRole($id,Request $request)
    {
        $request->validate([
            'roles'     => 'required'
        ]);

        // update user roles
        $user = User::find($id);
        if($user){
            // assign role to user
            $user->syncRoles($request->roles);
            return response([
                'message' => 'Roles changed successfully!',
                'success' => 1
            ]);
        }

        return response([
                'message' => 'Sorry! User not found',
                'success' => 0
            ]);
    }*/

    public function update(Request $request, $id){

        $LNUser = new LNUser();
       $userUpdated =  $LNUser->actualizarDatosUsuario($id, $request);
        //dd($request,$id);
        if($userUpdated[0]){
            return response([
                'message' => 'User has been updated successfully!',
                'user'=> $userUpdated[1],
                'success' => 1
            ]);
        }

        return response([
            'message' => 'Sorry! User Not found!',
            'success' => 0
        ]);
    }

    public function getUltimosUsuarios($nUsuarios){
        $LNUser = new LNUser();
        return response([
            'message'=>'These are the users that we have registred',
            'users'=>$LNUser->obtenerUltimosUsuarios($nUsuarios),
            'success'=>1
        ]);
    }
}
