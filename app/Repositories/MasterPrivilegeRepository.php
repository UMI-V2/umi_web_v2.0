<?php

namespace App\Repositories;

use App\Models\MasterPrivilege;
use App\Repositories\BaseRepository;

/**
 * Class MasterPrivilegeRepository
 * @package App\Repositories
 * @version February 28, 2022, 3:35 pm UTC
*/

class MasterPrivilegeRepository extends BaseRepository
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
        return MasterPrivilege::class;
    }
}
