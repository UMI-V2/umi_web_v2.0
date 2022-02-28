<?php

namespace App\Repositories;

use App\Models\master_privilege;
use App\Repositories\BaseRepository;

/**
 * Class master_privilegeRepository
 * @package App\Repositories
 * @version February 28, 2022, 3:35 pm UTC
*/

class master_privilegeRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id',
        'nama_hak_akses_pengguna'
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
        return master_privilege::class;
    }
}
