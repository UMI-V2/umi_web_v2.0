<?php

namespace App\Repositories;

use App\Models\MasterBank;
use App\Repositories\BaseRepository;

/**
 * Class MasterBankRepository
 * @package App\Repositories
 * @version July 28, 2022, 12:06 pm WIB
*/

class MasterBankRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'description',
        'cost_admin',
        'logo'
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
        return MasterBank::class;
    }
}
