<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    protected $fillable = ['name', 'active', 'lat', 'long', 'type_id'];
    
    public function type()
    {
        return $this->hasOne('App\Site_type', 'id', 'type_id');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
}
