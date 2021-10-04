<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\User;
use Auth;

class UserController extends Controller
{
    public function list(Request $request)
    {
        return response([
                'users' => User::all(),
                'success' => 1
            ]);
    }


    public function store(StoreUser $request)
    {
        // store user information
        $user = User::create([
                    'name'     => $request->name,
                    'email'    => $request->email,
                    'password' => Hash::make($request->password),
                    'role_id' => $request->role_id
                ]);

        if($user){
            return response([
                'message' => 'User created succesfully!',
                'user'    => $user,
                'success' => 1
            ]);
        }

        return response([
                'message' => 'Sorry! Failed to create user!',
                'success' => 0
            ]);
    }

    public function profile($id, Request $request)
    {
        $user = User::find($id);
        if($user)
            return response(['user' => $user,'success' => 1]);
        else
            return response(['message' => 'Sorry! Not found!','success' => 0]);
    }


    public function delete($id)
    {
        $user = User::find($id);

        if($user){
            $user->delete();
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


        $user = User::find($id);
        //dd($request,$id);
        if($user){

            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->role_id = $request->role_id;
            $user->save();
            return response([
                'message' => 'User has been updated successfully!',
                'user'=> $user,
                'success' => 1
            ]);

        }
        return response([
            'message' => 'Sorry! User Not found!',
            'success' => 0
        ]);
    }
}
