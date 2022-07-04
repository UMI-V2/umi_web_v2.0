<?php

namespace App\Repositories;

use App\Models\MasterSubDistrict;
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
        'province_id',
        'id_kota',
        'subdistrict_name'
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
        return MasterSubDistrict::class;
    }
}
