<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Gas;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class GasGuideController extends Controller
{
    //método que devuelve la vista de gas guide
    /**
     * @return Factory|View
     */
    public function getView(){
        $gases = Gas::all();
        return view('gas-guide.gas-guide', compact('gases'));
    }

}
