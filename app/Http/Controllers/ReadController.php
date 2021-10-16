<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\LogicasDelNegocio\LNMediciones;

class ReadController extends Controller
{

    public function index(){

        return view('mediciones.mediciones');

    }

    public function obtenerMediciones(){
        $LNMediciones = new LNMediciones();
        return $LNMediciones->prepararTablaMediciones();
    }

    public function show($id){

    }

    public function delete($id){
        $LNMediciones = new LNMediciones();
        $LNMediciones->eliminarMedicion($id);
        return redirect('mediciones')->with('success', 'Medicion eliminada!');
    }

}
