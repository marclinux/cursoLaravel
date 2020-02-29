<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

/**
 * Class Comments
 * @package App\Models
 * @version February 26, 2020, 11:58 pm UTC
 *
 * @property \App\Models\Site site
 * @property string texto
 * @property string fecha
 * @property boolean active
 * @property integer site_id
 */
class Comments extends Model
{

    public $table = 'comments';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';




    public $fillable = [
        'texto',
        'fecha',
        'active',
        'site_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'texto' => 'string',
        'fecha' => 'date',
        'active' => 'boolean',
        'site_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'texto' => 'required',
        'fecha' => 'required',
        'active' => 'required',
        'site_id' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function site()
    {
        return $this->belongsTo(\App\Models\Site::class, 'site_id');
    }
}
