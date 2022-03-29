<?php

namespace App\Repositories;

use App\Models\BusinessFile;
use App\Repositories\BaseRepository;

/**
 * Class BusinessFileRepository
 * @package App\Repositories
 * @version March 29, 2022, 11:01 am UTC
*/

class BusinessFileRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id_usaha',
        'file',
        'is_video',
        'is_photo'
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
        return BusinessFile::class;
    }
}
