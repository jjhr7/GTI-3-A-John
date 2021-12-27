<?php

namespace App\Http\Controllers;

use App\Http\LogicasDelNegocio\LNTown;
use App\Models\Town;
use App\User;
use Illuminate\Http\Request;
use DataTables,Auth;
use function Symfony\Component\Translation\t;


class TownController extends Controller
{

    public $idTown;


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function index(){
        return view('town.town');
    }

    /**
     * Obtiene una lista de la ciudad
     *
     * @param Request $request
     * @return mixed
     */
    public function getTownList(Request $request)
    {

        $data  = Town::get();


        return Datatables::of($data)

            ->addColumn('action', function($data){

                if (auth()->user()->information->role->name == 'Super admin' || auth()->user()->information->role->name == 'Admin'){
                    return '<div class="table-actions">
                                <a href="'.url('/town/users/'.$data->id).'" ><i class="ik ik-user f-16 mr-15 text-green"></i></a>
                                <a href="'.url('zone/createForm/'.$data->id).'" ><i class="ik ik-plus f-16 mr-15 text-green"></i></a>
                                <a href="'.url('town/'.$data->id).'" ><i class="ik ik-edit-2 f-16 mr-15 text-green"></i></a>
                                <a href="'.url('town/delete/'.$data->id).'"><i class="ik ik-trash-2 f-16 text-red"></i></a>
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

        $lnLNTown = new LNTown();
        $rolCreado=$lnLNTown->guardarMunicipio($request->postal_code,$request->name,$request->area,$request->altitude);

        if($rolCreado[0]==1){
            return redirect('towns')->with('success', 'Role created succesfully!');


        }else{
            return redirect('towns')->with('error', 'Failed to create role! Try again.');

        }
    }

    public function createForm(){
        // $LNPermission=new LNPermission();
        // $permissions=$LNPermission->obtenerTodosLosPermisos();
        return view('town.create-town');
    }


    public function edit($id)
    {
        $town  = Town::where('id',$id)->first();
        // if role exist
        if($town){

            $town_postal_code=$town->postal_code;
            $town_altitude=$town->altitude;
            $town_area=$town->area;
            $town_name=$town->name;

            return view('town.edit-town', compact('town','town_name','town_altitude','town_area', 'town_postal_code'));
        }else{
            return redirect('404');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function update(Request $request)
    {
        try{

            $ln= new LNTown();
            $update = $ln->actualizarDatosTown($request->id,$request);
            return redirect('towns')->with('success', 'Town info updated succesfully!');
        }catch (\Exception $e) {
            $bug = $e->getMessage();
            return redirect()->back()->with('error', $bug);

        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return Response
     */
    public function delete($id)
    {
        $town   = Town::find($id);
        if($town){
            $delete = $town->delete();
            return redirect('towns')->with('success', 'Town deleted!');
        }else{
            return redirect('404');
        }
    }


    public function getUserView($id){
        $ln=new LNTown();
        config(['app.town_id' => $id]);
        $this->idTown=$id;

        $town = Town::find($this->idTown);
        return view('town.town-users', compact('town'));
    }


    public function getUserList($id)
    {
        $LNTown=new LNTown(); // Creamos nueva logica town
        $data  = $LNTown->obtenerTodosUsersDeUnaTown($id);

        return Datatables::of($data)
            ->addColumn('rol', function(User $user){
                if($user->information->role->name != null){
                    return $user->information->role->name;
                }else{
                    return '';
                }
            })
            ->addColumn('action', function($data){

                if (auth()->user()->information->role->name == 'Super admin' || auth()->user()->information->role->name == 'Admin'){
                    return '<div class="table-actions">
                                <a href="'.url('user/'.$data->id).'" ><i class="ik ik-edit-2 f-16 mr-15 text-green"></i></a>
                                <a href="'.url('user/delete/'.$data->id).'"><i class="ik ik-trash-2 f-16 text-red"></i></a>
                            </div>';
                }else{
                    return '';
                }
            })
            ->rawColumns(['action'])->toJson();
    }



}
