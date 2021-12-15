<?php


namespace App\Http\LogicasDelNegocio;
use App\Models\Device;
use App\Models\Notification;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

/**
 * @author Leire Villarroya Martínez
 * LNNotificaciones
 * 2021-11-25
 * Lógica del negocio de notificaciones
 */

class LNNotifications
{
    /**
     * Descripción de guardarNotificaciones. Función que guarda una notificación
     * @param $user_id
     * @param $date
     * @param $message
     * @param $type
     * @return array
     */
    public function guardarNotificacion($user_id,$message,$type){
        $notification=new Notification();
        $notification->user_id=$user_id;
        $notification->date=Carbon::now('CET')->toRfc850String();
        $notification->message=$message;
        $notification->type=$type;

        $notification->save();

        if($notification){
            return [1,$notification];
        }else{
            return[0];
        }
    }

    /**
     * Descripción de obtenerNotificacionesByUser. Función que devuelve todas las notificaciones
     * de un usuario
     *
     * @return int
     */
    public function obtenerNotificacionesByUser(){
        $notifications=Notification::where('user_id',auth()->user()->id)->get();
        return $notifications;
    }

    public function deleteNotificacionesByUser(){
        $notifications=$this->obtenerNotificacionesByUser();
//        dd($notifications[0]->id, $notifications[1]->id);
        if(count($notifications)>0){
            foreach ($notifications as $item) {
                $this->eliminarNotificacion($item->id);
            }
        }
        $notifications=$this->obtenerNotificacionesByUser();
        if(count($notifications)==0){
            return 1;
        }else{
            return 0;
        }
    }

    /**
     * Descripción de obtenerTodasLasNotificaciones. Función que devuelve todas las notificaciones
     *
     * @return Notification[]|Collection
     */
    public function obtenerTodasLasNotificaciones(){
        return Notification::all();
    }

    /**
     * Descripción de eliminarNotificacion. Función que elimina una notificación
     * @param $id id de la notificación
     * @return int
     */
    public function eliminarNotificacion($id){
        $notificacion=Notification::find($id);

        if($notificacion){
            $notificacion->delete();
            return 1;
        }else{
            return 0;
        }
    }

    /**
     * Descripción de obtenerNotificacion. Función que devuelve una notificacion.
     *
     * @param $id
     * @return array
     */
    public function obtenerNotificacion($id){
        $notification=Notification::find($id);
        if($notification) {
            return [1, $notification];
        }else{
            return [0];
        }
    }


    /**
     * Descripción de actualizarDatosNotificacion. Función que actualiza los datos de la notificación
     * dado su id
     * @param int $id
     * @param Request $request
     * @return array
     */
    public function actualizarDatosNotificacion($id, Request $request){
        $notificacion=Notification::find($id);
        if($notificacion) {
            $notificacion->user_id = $request->user_id;
            $notificacion->date = $request->date;
            $notificacion->message = $request->message;
            $notificacion->type = $request->type;

            $notificacion->save();

            return [1, $notificacion];
        }else{
            return[0];
        }
    }
}
