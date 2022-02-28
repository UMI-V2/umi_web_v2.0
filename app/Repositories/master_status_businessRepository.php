<?php

namespace App\Repositories;

use App\Models\master_status_business;
use App\Repositories\BaseRepository;

/**
 * Class master_status_businessRepository
 * @package App\Repositories
 * @version February 28, 2022, 2:34 pm UTC
*/

class master_status_businessRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nama_status_usaha'
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
        return master_status_business::class;
    }
}
