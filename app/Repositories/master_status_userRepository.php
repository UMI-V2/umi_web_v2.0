<?php

namespace App\Repositories;

use App\Models\master_status_user;
use App\Repositories\BaseRepository;

/**
 * Class master_status_userRepository
 * @package App\Repositories
 * @version March 7, 2022, 3:09 pm UTC
*/

class master_status_userRepository extends BaseRepository
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
        return master_status_user::class;
    }
}
