<?php

namespace App\Http\LogicasDelNegocio;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LNUser
{

    public function guardarUsuario($name,$email,$password,$rol_id){
        $user = new User();
        $user->name = $name;
        $user->email = $email;
        $user->password = Hash::make($password);
        $user->role_id = $rol_id;

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
        if($user){
            return [1,$user];
        }else{
            return 0;
        }
    }

    public function actualizarDatosUsuario($id, Request $request){
        $user = User::find($id);

        if ($user){
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->role_id = $request->role_id;
            $user->save();
            return [1,$user];
        }else{
            return [0];
        }
    }
}
