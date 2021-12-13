<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GasGuideController extends Controller
{
    //método que devuelve la vista de gas guide
    public function getView(){
        return view('gas-guide.gas-guide');
    }
}
