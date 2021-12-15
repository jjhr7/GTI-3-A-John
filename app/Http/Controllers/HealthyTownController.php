<?php

namespace App\Http\Controllers;

use App\Http\LogicasDelNegocio\LNHealthyTown;
use Illuminate\Http\Request;
use App\Models\Healthytown;
use DataTables,Auth;

class HealthyTownController extends Controller
{

    public function index(){
        $healthytowns  = Healthytown::get();

        return view('healthy-towns.healthy-towns', compact('healthytowns'));
    }

    /**
     * Obtiene una lista de la ciudad
     *
     * @param Request $request
     * @return mixed
     */
    public function getHealthyTownList(Request $request)
    {

        $data  = Healthytown::get();


        return Datatables::of($data)

            ->addColumn('town', function(Healthytown $healthytown){
                return $healthytown->town->name;
            })

            ->addColumn('action', function($data){

                if (auth()->user()->information->role->name == 'Super admin' || auth()->user()->information->role->name == 'Admin'){
                    return '<div class="table-actions">
                                <a href="'.url('healthytown/delete/'.$data->id).'"><i class="ik ik-trash-2 f-16 text-red"></i></a>
                            </div>';
                }else{
                    return '';
                }
            })
            ->rawColumns(['action'])->toJson();
    }

    /**
     * Store new roles with assigned permission
     * Associate permissions will be stored in table
     */

    public function create(Request $request)
    {

        $LNHealthyTown = new LNHealthyTown();
        $healthy_townCreado=$LNHealthyTown->guardarHealthyTown($request->town_id,$request->date);

        if($healthy_townCreado[0]==1){
            return redirect('towns')->with('success', 'Healthy town created succesfully!');


        }else{
            return redirect('towns')->with('error', 'Failed to create healthy town! Try again.');

        }
    }

    public function createForm(){
        // $LNPermission=new LNPermission();
        // $permissions=$LNPermission->obtenerTodosLosPermisos();
        return view('town.create-town');
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return Response
     */
    public function delete($id)
    {
        $healthy_town   = Healthytown::find($id);
        if($healthy_town){
            $delete = $healthy_town->delete();
            return redirect('healthytowns')->with('success', 'Town deleted!');
        }else{
            return redirect('404');
        }
    }
}
