<?php

namespace App\Repositories;

use App\Models\MasterUnit;
use App\Repositories\BaseRepository;

/**
 * Class MasterUnitRepository
 * @package App\Repositories
 * @version February 28, 2022, 3:04 pm UTC
*/

class MasterUnitRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nama_satuan',
        'singkatan_satuan'
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
        return MasterUnit::class;
    }
}
