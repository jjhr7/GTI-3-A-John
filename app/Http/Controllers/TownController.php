<?php

namespace App\Http\Controllers;

use App\Models\Town;
use Illuminate\Http\Request;
use DataTables;


class TownController extends Controller
{
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
                                <a href="'.url('town/'.$data->id).'" ><i class="ik ik-edit-2 f-16 mr-15 text-green"></i></a>
                                <a href="'.url('town/delete/'.$data->id).'"><i class="ik ik-trash-2 f-16 text-red"></i></a>
                            </div>';
                }else{
                    return '';
                }
            })
            ->rawColumns(['action'])->toJson();
    }
}
