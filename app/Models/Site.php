<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

/**
 * Class Site
 * @package App\Models
 * @version February 22, 2020, 2:10 am UTC
 *
 * @property \App\Models\SiteType type
 * @property \Illuminate\Database\Eloquent\Collection comments
 * @property string name
 * @property boolean active
 * @property integer type_id
 * @property number lat
 * @property number long
 */
class Site extends Model
{

    public $table = 'sites';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';




    public $fillable = [
        'name',
        'active',
        'type_id',
        'lat',
        'long'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'active' => 'boolean',
        'type_id' => 'integer',
        'lat' => 'float',
        'long' => 'float'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'active' => 'required',
        'type_id' => 'required',
        'lat' => 'required',
        'long' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function type()
    {
        return $this->belongsTo(\App\Site_type::class, 'type_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function comments()
    {
        return $this->hasMany(\App\Models\Comment::class, 'site_id');
    }
}
