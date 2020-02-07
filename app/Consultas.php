<?php

namespace App;

use Illuminate\Support\Facades\DB;

class Consultas 
{
    public function getSitios($idType) {
        $sitios = DB::table('sites')
        ->join('site_types', 'sites.type_id', '=', 'site_types.id')
        ->leftjoin('comments', 'sites.id', '=', 'comments.site_id')
        ->select('sites.*', 'site_types.name as typename', 'comments.texto')
        ->where('sites.type_id', '=', $idType)
        ->get();
        return $sitios;
    }
}
