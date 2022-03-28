<?php

namespace App\Repositories;

use App\Models\MasterStatusBusiness;
use App\Repositories\BaseRepository;

/**
 * Class MasterStatusBusinessRepository
 * @package App\Repositories
 * @version February 28, 2022, 2:34 pm UTC
*/

class MasterStatusBusinessRepository extends BaseRepository
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
        return MasterStatusBusiness::class;
    }
}
