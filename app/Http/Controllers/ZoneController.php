<?php

namespace App\Http\Controllers;

use App\Http\LogicasDelNegocio\LNZone;
use App\Models\Town;
use App\Models\Zone;
use Illuminate\Http\Request;
use DataTables,Auth;


class ZoneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('zona.zonas');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getZoneList()
    {
        $data  = Zone::get();


        return Datatables::of($data)

            ->addColumn('town', function(Zone $zone){
                return $zone->town->name;
            })

            ->addColumn('action', function($data){

                if (auth()->user()->information->role->name == 'Super admin' || auth()->user()->information->role->name == 'Admin'){
                    return '<div class="table-actions">
                                <a href="'.url('zone/'.$data->id).'" ><i class="ik ik-edit-2 f-16 mr-15 text-green"></i></a>
                                <a href="'.url('zone/delete/'.$data->id).'"><i class="ik ik-trash-2 f-16 text-red"></i></a>
                            </div>';
                }else{
                    return '';
                }
            })
            ->rawColumns(['action'])->toJson();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $LNZone = new LNZone();
        $rolCreado=$LNZone->guardarZona($request);

        if($rolCreado[0]==1){
            return redirect('zonas')->with('success', 'Zone created succesfully!');


        }else{
            return redirect('zonas')->with('error', 'Failed to create zone! Try again.');

        }
    }




    public function createForm($id){
        // $LNPermission=new LNPermission();
        // $permissions=$LNPermission->obtenerTodosLosPermisos();

        $town  = Town::where('id',$id)->first();
        // if role exist
        if($town){

            $idT=$town->id;
            $town_name=$town->name;

            return view('zona.create-zone', compact('idT', 'town_name'));
        }else{
            return redirect('404');
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $zone  = Zone::where('id',$id)->first();
        // if role exist
        if($zone){

            $zone_o2avg=$zone->o2avg;
            $zone_name=$zone->name;
            $zone_area=$zone->area;
            $zone_geojson=$zone->geojson;
            $zone_town_id=$zone->town_id;

            return view('zona.edit-zone', compact('zone','zone_name','zone_area','zone_geojson','zone_town_id'));
        }else{
            return redirect('404');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $zone = Zone::find($request->id);
        if($zone){
            $zone->name=$request->name;
            $zone->area=$request->area;

            $zone->save();

            return redirect('zonas')->with('success', 'Zone info updated succesfully!');
        }else{
            return redirect()->back()->with('error', $bug);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $ln=new LNZone();
        $zona   = $ln->eliminarZona($id);
        if($zona==1){
            return redirect('zonas')->with('success', 'Zone deleted!');
        }else{
            return redirect('404');
        }
    }
}
