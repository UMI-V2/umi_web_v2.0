<?php

namespace App\Repositories;

use App\Models\MasterStatusUser;
use App\Repositories\BaseRepository;

/**
 * Class MasterStatusUserRepository
 * @package App\Repositories
 * @version March 7, 2022, 3:09 pm UTC
*/

class MasterStatusUserRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nama_status_pengguna'
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
        return MasterStatusUser::class;
    }
}
