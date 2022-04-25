<?php

namespace App\Repositories;

use App\Models\SubDistrict;
use App\Repositories\BaseRepository;

/**
 * Class SubDistrictRepository
 * @package App\Repositories
 * @version March 29, 2022, 1:25 pm UTC
*/

class SubDistrictRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id_provinsi',
        'id_kota',
        'nama_kecamatan'
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
        return SubDistrict::class;
    }
}
