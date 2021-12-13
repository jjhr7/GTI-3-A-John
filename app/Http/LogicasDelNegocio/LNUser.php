<?php

namespace App\Http\LogicasDelNegocio;

use App\Models\Device;
use App\Models\Useraccountinformation;
use App\Models\Userinformation;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LNUser
{

    public function guardarUsuario($name,$email,$password){
        $user = new User();
        $user->name = $name;
        $user->email = $email;
        $user->password = Hash::make($password);
        $user->save();

        if($user){
            return [1,$user];
        }else{
            return [0];
        }
    }

    public function obtenerTodosLosUsuarios(){
        return User::all();
    }

    public function eliminarUsuario($id){
        $user = User::find($id);

        if($user){
            $user->delete();
            return 1;
        }else{
            return 0;
        }
    }

    public function obtenerUltimosUsuarios($nUsuarios){

        return User::latest()->take($nUsuarios)->get();
    }

    public function obtenerDatosUsuario($id){
        $user = User::find($id);
        $userAccountInformation = Useraccountinformation::find(Useraccountinformation::where('user_id',$id)->get()[0]->id);
        $userInformation = Userinformation::find(Userinformation::where('user_id',$id)->get()[0]->id);
        if($user){
            return [1,$user,$userAccountInformation,$userInformation];
        }else{
            return 0;
        }
    }

    public function actualizarDatosUsuario($id, Request $request){
        $user = User::find($id);

        $userInformation = Userinformation::find(Userinformation::where('user_id',$id)->get()[0]->id);

        if ($user && $userInformation){
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->save();

            $userInformation->town_id = $request->town;
            $userInformation->role_id = $request->role;

            $userInformation->save();
            return [1,$user,$userInformation];
        }else{
            return [0];
        }
    }


}
