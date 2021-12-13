<?php

/**
 * @author Jonathan Hernández
 * UserInformationController
 * 2021-11-26
 * Controlador de la información del usuario
 */


namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\LogicasDelNegocio\LNUserinformation;
use App\Models\Device;
use App\Models\Userinformation;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UserInformationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param Userinformation $userinformation
     * @return void
     */
    public function show(Userinformation $userinformation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Userinformation $userinformation
     * @return void
     */
    public function update(Request $request, Userinformation $userinformation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Userinformation $userinformation
     * @return void
     */
    public function destroy(Userinformation $userinformation)
    {
        //
    }

    /**
     * Asigna un dispositivo a un usuario
     *
     * @param Request $request
     * @return Response
     */
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
