<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\LogicasDelNegocio\LNUserinformation;
use App\Models\Device;
use App\Models\Userinformation;
use Illuminate\Http\Request;

class UserInformationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Userinformation  $userinformation
     * @return \Illuminate\Http\Response
     */
    public function show(Userinformation $userinformation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Userinformation  $userinformation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Userinformation $userinformation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Userinformation  $userinformation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Userinformation $userinformation)
    {
        //
    }

    public function asignarDispositivo(Request $request){
        $LNUserinformation = new LNUserinformation();
        $deviceAssigned = $LNUserinformation->assignDevice($request->serial);

        if($deviceAssigned[0] == 1){
            return response([
                'message' => 'Se ha asignado correctamente el dispositivo',
                'userInformation' => $deviceAssigned[1],
                'success' => 1

            ]);
        }else{
            return response([
                'message' => 'Error al asignar el dispositivo!',
                'success' => 0
            ]);
        }
    }

}
