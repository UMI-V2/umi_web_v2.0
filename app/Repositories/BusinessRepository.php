<?php

namespace App\Repositories;

use App\Models\Business;
use App\Repositories\BaseRepository;

/**
 * Class BusinessRepository
 * @package App\Repositories
 * @version March 29, 2022, 7:23 am UTC
*/

class BusinessRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id_user',
        'id_master_status_usaha',
        'nama_usaha'
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
        return Business::class;
    }
}
