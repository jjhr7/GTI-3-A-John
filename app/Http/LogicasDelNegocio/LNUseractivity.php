<?php

namespace App\Http\LogicasDelNegocio;

use App\Models\UserActivity;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class LNUseractivity
{
    /**
     * Descripción de guardarNotificaciones. Función que guarda una notificación
     * @param $user_id
     * @param $time_activity
     * @param $distance_traveled
     * @param $date
     * @return array
     */
    public function guardarUseractivity($user_id, $time_activity, $distance_traveled){
        $useractivty=new UserActivity();
        $useractivty->user_id=$user_id;
        $useractivty->time_activity=$time_activity;
        $useractivty->distance_traveled=$distance_traveled;
        $useractivty->date=Carbon::now('CET')->toRfc850String();
        $useractivty->save();

        if($useractivty){
            return [1,$useractivty];
        }else{
            return[0];
        }
    }

    /**
     * Descripción de obtenerNotificacionesByUser. Función que devuelve todas las notificaciones
     * de un usuario
     *
     * @return UserActivity[]|Collection
     */
    public function obtenerTodosLosUserActivities(){
        return UserActivity::all();
        //Devuelve todos los user activities registrados en la bbdd
    }

    public function obtenerUserActivitiesByUser(){
        $useractivty=UserActivity::where('user_id',auth()->user()->id)->get();
        return $useractivty;
    }


    /**
     * @param $id id del useractivity
     * @return int
     */
    public function eliminarUserActivity($id){
        $useractivty=UserActivity::find($id);

        if($useractivty){
            $useractivty->delete();
            return 1;
        }else{
            return 0;
        }
    }

    /**
     * @param $id
     * @return array
     */
    public function obtenerUserActivity($id){
        $useractivty=UserActivity::find($id);
        if($useractivty) {
            return [1, $useractivty];
        }else{
            return [0];
        }
    }


    /**
     * dado su id
     * @param int $id
     * @param Request $request
     * @return array
     */
    public function actualizarDatosUserActivity($id, Request $request){
        $useractivty=UserActivity::find($id);
        if($useractivty) {
            $useractivty->user_id=$request->user_id;
            $useractivty->time_activity=$request->time_activity;
            $useractivty->distance_traveled=$request->distance_traveled;
            $useractivty->date=$request->date;

            $useractivty->save();

            return [1, $useractivty];
        }else{
            return[0];
        }
    }

    public function obtenerActivitiesByUser(){
        $activities=UserActivity::where('user_id',auth()->user()->id)->get();
        return $activities;
    }

    public function deleteActivitiesByUser(){
        $activities=$this->obtenerActivitiesByUser();
        if(count($activities)>0){
            foreach ($activities as $item) {
                $this->eliminarUserActivity($item->id);
            }
        }
        $activities=$this->obtenerUserActivitiesByUser();
        if(count($activities)==0){
            return 1;
        }else{
            return 0;
        }
    }
}
