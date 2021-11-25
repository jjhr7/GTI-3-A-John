<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\LogicasDelNegocio\LNUseraccountinformation;
use App\Http\LogicasDelNegocio\LNUserinformation;
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

        $userCreated = $this->createNewUser($request->name, $request->email, $request->password);

        if($userCreated[0] == 1){

            $Useraccountinformationcreated = $this->createNewUserAccountInformation($userCreated[1]->id);

            if($Useraccountinformationcreated[0] == 1){

                $Userinformationcreated = $this->createUserInformation($userCreated[1]->id,$request->role_id,$request->town_id);

                if($Userinformationcreated[0] == 1){

                    return response([
                        'message' => 'User created succesfully!',
                        'user'    => $userCreated[1],
                        'success' => 1
                    ]);

                }else{

                    return response([
                        'message' => 'Error! Failed to create userInformation!',
                        'success' => 01
                    ]);

                }

            }else{
                return response([
                    'message' => 'Error! Failed to create userAccountInformation!',
                    'success' => 02
                ]);
            }

        }

        return response([
                'message' => 'Sorry! Failed to create user!',
                'success' => 03
            ]);
    }

    public function createNewUser($name,$email,$password){
        $LNuser = new LNUser();
        return $LNuser->guardarUsuario($name,$email,$password);
    }

    public function createNewUserAccountInformation($id){
        $LNUseraccountinformation = new LNUseraccountinformation();
        return $LNUseraccountinformation->guardarUsuarioaccountinformationApp($id);
    }

    public function createUserInformation($id,$role_id,$town_id){
        $LNUserinformation =  new LNUserinformation();
        return $LNUserinformation->guardarUserinformationApp($id,$role_id,$town_id);
    }

    public function profile($id)
    {
        $LNUser = new LNUser();
        $userData = $LNUser->obtenerDatosUsuario($id);

        if($userData[0] == 1)
            return response([
                'message' => 'User found!',
                'user' => $userData[1],
                'userAccountInformation' => $userData[2],
                'userInformation' => $userData[3],
                'success' => 1]);
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
        if($userUpdated[0] == 1){
            return response([
                'message' => 'User has been updated successfully!',
                'user'=> $userUpdated[1],
                'userInformation' => $userUpdated[2],
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

    public function asignarDispositivo(Request $request){

    }
}
