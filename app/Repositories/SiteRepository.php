<?php

namespace App\Repositories;

use App\Models\Site;
use App\Repositories\BaseRepository;

/**
 * Class SiteRepository
 * @package App\Repositories
 * @version February 22, 2020, 2:10 am UTC
*/

class SiteRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'active',
        'type_id',
        'lat',
        'long'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Site::class;
    }
}
