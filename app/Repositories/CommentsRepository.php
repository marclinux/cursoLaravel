<?php

namespace App\Repositories;

use App\Models\Comments;
use App\Repositories\BaseRepository;

/**
 * Class CommentsRepository
 * @package App\Repositories
 * @version February 26, 2020, 11:58 pm UTC
*/

class CommentsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'texto',
        'fecha',
        'active',
        'site_id'
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
        return Comments::class;
    }
}
