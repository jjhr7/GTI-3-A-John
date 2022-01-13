<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMapRequest;
use App\Http\Requests\UpdateMapRequest;
use App\Models\Map;
use Faker\Factory;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\View;

class MapController extends Controller
{
    //método que devuelve la vista mapa
    /**
     * @return Application|\Illuminate\Contracts\View\Factory|View
     */
    public function getView(){
        $map= Map::all();
        return view('maps.map', compact('map'));
    }

    public function getViewMobile(){
        $map= Map::all();
        return view('maps.mapMobile', compact('map'));
    }
}
