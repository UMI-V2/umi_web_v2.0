<?php

namespace App\Repositories;

use App\Models\City;
use App\Repositories\BaseRepository;

/**
 * Class CityRepository
 * @package App\Repositories
 * @version March 29, 2022, 12:52 pm UTC
*/

class CityRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id_provinsi',
        'nama_kota'
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
        return City::class;
    }
}
