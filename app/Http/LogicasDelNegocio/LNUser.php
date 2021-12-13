<?php

/**
 * @author Jonathan Hernández
 * LNUser
 * 2021-11-25
 * Lógica del negocio de user
 */

namespace App\Http\LogicasDelNegocio;

use App\Models\Device;
use App\Models\Useraccountinformation;
use App\Models\Userinformation;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LNUser
{

    /**
     * guardarUsuario. Funcion que guarda un usuario en la base de datos.
     * @param name Nombre del usuario a guardar
     * @param email Correo del usuario a guardar
     * @param password Contraseña del usuario a guardar
     */
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

    /**
     * obtenerTodosLosUsuarios. Funcion que obtiene todos los usuarios almacenados en la base de datos.
     * @return [User]
     */
    public function obtenerTodosLosUsuarios(){
        return User::all();
    }

    /**
     * eliminarUsuario. Funcion que elimina un usuario por id almacenado en la base de datos.
     * @param id Id del usuario a buscar
     */
    public function eliminarUsuario($id){
        $user = User::find($id);

        if($user){
            $user->delete();
            return 1;
        }else{
            return 0;
        }
    }

    /**
     * obtenerUltimosUsuarios. Funcion que obtiene los últimos usuarios almacenados en la base de datos.
     * @param nUsuarios Numero de usuarios a mostrar
     */
    public function obtenerUltimosUsuarios($nUsuarios){

        return User::latest()->take($nUsuarios)->get();
    }

    /**
     * obtenerDatosUsuario. Funcion que obtiene todos los datos de un usuario almacenados en la base de datos.
     * @param id Id del usuario a buscar
     */
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

    /**
     * actualizarDatosUsuario. Funcion que actualiza todos los datos del usuario por id almacenados en la base de datos.
     * @param request Request para acceder a la petición
     * @param id Id del usuario a actualizar
     */
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
