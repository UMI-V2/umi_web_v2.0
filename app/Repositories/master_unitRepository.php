<?php

namespace App\Repositories;

use App\Models\master_unit;
use App\Repositories\BaseRepository;

/**
 * Class master_unitRepository
 * @package App\Repositories
 * @version February 28, 2022, 3:04 pm UTC
*/

class master_unitRepository extends BaseRepository
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
        return master_unit::class;
    }
}
