<?php

namespace App\Repositories;

use App\Models\master_province;
use App\Repositories\BaseRepository;

/**
 * Class master_provinceRepository
 * @package App\Repositories
 * @version February 28, 2022, 4:20 pm UTC
*/

class master_provinceRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id',
        'nama_provinsi'
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
        return master_province::class;
    }
}
