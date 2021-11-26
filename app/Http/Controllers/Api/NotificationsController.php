<?php

namespace App\Http\Controllers\Api;

use App\Http\LogicasDelNegocio\LNNotifications;
use App\Models\Notification;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NotificationsController extends Controller
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
    public function getNotificationsByUser(){
        $LNNotifications=new LNNotifications();

        return response([
           'notifications'=>$LNNotifications->obtenerNotificacionesByUser(),
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
     * @param  \App\Models\Notification  $notification
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $LNNotificacion=new LNNotifications();
        $notification=$LNNotificacion->obtenerTodasLasNotificaciones($id);

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

    public function obtenerNotification($id){
        $LNNotifications=new LNNotifications();
        $notification=$LNNotifications->obtenerNotificacion($id);

        if($notification[0]==1){
            return response([
                'message'=> 'Notificacion encontrado',
                'town'=>$notification[1],
                'success'=>1
            ]);
        }else{
            return response([
                'message'=>'Error! No se ha encontrado la notificación',
                'success'=>0
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Notification  $notification
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
     * @param  \App\Models\Notification  $notification
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

    public function eliminarNotificacionesByUser(){
        $LNNotification=new LNNotifications();

        $notificationesEliminadas=$LNNotification->deleteNotificacionesByUser();

        if($notificationesEliminadas==1){
            return response([
                'message' => 'Se han eliminado correctamente las notificaciones',
                'success' => 1
            ]);
        }else{
            return response([
                'message' => 'Error! No se han podido eliminar las notificaciones',
                'success' => 0
            ]);
        }
    }
}
