<?php


namespace App\Http\LogicasDelNegocio;
use App\Models\Notification;
use Carbon\Carbon;
use Illuminate\Http\Request;

class LNNotifications
{
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

    public function obtenerTodasLasNotificaciones(){
        return Notification::all();
    }

    public function eliminarNotificacion($id){
        $notificacion=Notification::find($id);

        if($notificacion){
            $notificacion->delete();
            return 1;
        }else{
            return 0;
        }
    }

    public function obtenerNotificacion($id){
        $notification=Notification::find($id);
        if($notification) {
            return [1, $notification];
        }else{
            return [0];
        }
    }


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
