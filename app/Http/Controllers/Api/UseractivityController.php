<?php

namespace App\Http\Controllers\Api;
use App\Http\LogicasDelNegocio\LNUseractivity;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UseractivityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $LNUseractivity=new LNUseractivity();

        return response([
            'useractivities'=>$LNUseractivity->obtenerTodosLosUserActivities(),
            'success'=>1
        ]);
    }
    public function getActivitiesByUser(){
        $LNUseractivity=new LNUseractivity();

        return response([
            'useractivities'=>$LNUseractivity->obtenerUserActivitiesByUser(),
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
        $LNUseractivity=new LNUseractivity();

        $activityUser=$LNUseractivity->guardarUseractivity($request->user_id,$request->time_activity,$request->distance_traveled, $request->date);

        if($activityUser[0]==1) {
            return response([
                'message' => 'Useractivities creada correctamente!',
                'notification' => $activityUser[1],
                'success' => 1
            ]);
        }else{
            return response([
                'message'=>'Error! No se ha podido crear la Useractivity',
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
        $LNUseractivity=new LNUseractivity();
        $useractivity=$LNUseractivity->obtenerTodosLosUserActivities($id);

        if($useractivity[0]==1) {
            return response([
                'message' => 'Useractivity encontrada',
                'notification' => $useractivity[1],
                'success' => 1
            ]);
        }else{
            return response([
                'message'=>'Error! No se ha encontrado el useractivity',
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
        $LNUseractivity=new LNUseractivity();
        $useractivity=$LNUseractivity->actualizarDatosUserActivity($id, $request);

        if($useractivity[0]==1){
            return response([
                'message'=> 'Useractivity encontrado',
                'town'=>$useractivity[1],
                'success'=>1
            ]);
        }else{
            return response([
                'message'=>'Error! No se ha encontrado la Useractivity',
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
        $LNUseractivity=new LNUseractivity();

        $useractivityEliminado=$LNUseractivity->eliminarUserActivity($id);

        if($useractivityEliminado){
            return response([
                'message' => 'Se ha eliminado correctamente la activityuser',
                'success' => 1
            ]);
        }else{
            return response([
                'message' => 'Error! No se ha podido eliminar la activityuser',
                'success' => 0
            ]);
        }
    }

    public function eliminarActivitiesByUser(){
        $LNUseractivity=new LNUseractivity();

        $activitiesEliminadas=$LNUseractivity->deleteActivitiesByUser();

        if($activitiesEliminadas==1){
            return response([
                'message' => 'Se han eliminado correctamente las activities',
                'success' => 1
            ]);
        }else{
            return response([
                'message' => 'Error! No se han podido eliminar las activities',
                'success' => 0
            ]);
        }
    }

    /**
     * @param $id
     * @return ResponseFactory|Response
     */
    public function obtenerUserActivity($id){
        $LNUseractivity=new LNUseractivity();
        $useractivity=$LNUseractivity->obtenerUserActivity($id);

        if($useractivity[0]==1){
            return response([
                'message'=> 'UserActivity encontrado',
                'town'=>$useractivity[1],
                'success'=>1
            ]);
        }else{
            return response([
                'message'=>'Error! No se ha encontrado la useractivity',
                'success'=>0
            ]);
        }
    }
}
