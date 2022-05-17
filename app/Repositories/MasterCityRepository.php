<?php

namespace App\Repositories;

use App\Models\MasterCity;
use App\Repositories\BaseRepository;

/**
 * Class MasterCityRepository
 * @package App\Repositories
 * @version March 29, 2022, 12:52 pm UTC
*/

class MasterCityRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'province_id',
        'city_name',
        'postal_code'
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
        return MasterCity::class;
    }
}
