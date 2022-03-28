<?php

namespace App\Repositories;

use App\Models\MasterProvince;
use App\Repositories\BaseRepository;

/**
 * Class MasterProvinceRepository
 * @package App\Repositories
 * @version February 28, 2022, 4:20 pm UTC
*/

class MasterProvinceRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'province_id',
        'province_name'
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
        return MasterProvince::class;
    }
}
