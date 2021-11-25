<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\LogicasDelNegocio\LNNotifications;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $LNNotification=new LNNotifications();

        return response([
            'notifications'=>$LNNotification->obtenerTodasLasNotificaciones(),
            'success'=>1
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $LNNotification=new LNNotifications();

        $notificationCreada=$LNNotification->guardarNotificacion($request->user_id,$request->date,$request->message,$request->type);

        if($notificationCreada[0]==1) {
            return response([
                'message' => 'Notificaciones creada correctamente!',
                'notification' => $notificationCreada[1],
                'success' => 1
            ]);
        }else{
            return response([
                'message'=>'Error! No se ha podido crear la notificación',
                'success'=>0
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $LNNotificacion=new LNNotifications();
        $notification=$LNNotificacion->obtenerTodosLosMunicipios($id);

        if($notification[0]==1) {
            return response([
                'message' => 'Notificacion encontrada',
                'notification' => $notification[1],
                'success' => 1
            ]);
        }else{
            return response([
                'message'=>'Error! No se ha encontrado el municipio',
                'success'=>0
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $LNNotification=new LNNotifications();

        $notificationActualizada=$LNNotification->actualizarDatosNotificacion($id,$request);
        if($notificationActualizada[0]==1) {
            return response([
                'message' => 'Se ha actualizado la town correctamente',
                'town' => $notificationActualizada[1],
                'success' => 1
            ]);
        }else{
            return response([
                'message' => 'Se ha producido un error y no se ha podido actualizar la notificacion',
                'success'=>0
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $LNNotification=new LNNotifications();

        $notificationEliminada=$LNNotification->eliminarNotificacion($id);

        if($notificationEliminada){
            return response([
                'message' => 'Se ha eliminado correctamente la notificacion',
                'success' => 1
            ]);
        }else{
            return response([
                'message' => 'Error! No se ha podido eliminar la notificacion',
                'success' => 0
            ]);
        }
    }
}
