<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Site_type;

class MapaController extends Controller
{
    public function index()
    {
        if(Gate::allows('users_manage'))
        {
            $tipos = Site_type::all();
            return view('mapas.index')
                        ->with('tipos', $tipos);
        }
        else
            return abort(401);
    }
}
