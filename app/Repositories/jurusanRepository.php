<?php

namespace App\Repositories;

use App\Models\jurusan;
use App\Repositories\BaseRepository;

/**
 * Class jurusanRepository
 * @package App\Repositories
 * @version February 19, 2022, 6:00 pm UTC
*/

class jurusanRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nama_jurusan'
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
        return jurusan::class;
    }
}
