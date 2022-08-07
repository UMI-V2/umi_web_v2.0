<?php

namespace App\Repositories;

use App\Models\WithdrawBalance;
use App\Repositories\BaseRepository;

/**
 * Class WithdrawBalanceRepository
 * @package App\Repositories
 * @version July 28, 2022, 8:24 pm WIB
*/

class WithdrawBalanceRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id_user',
        'id_usaha',
        'id_bank',
        'nominal_request',
        'no_rek',
        'rek_name',
        'bank_name',
        'cost_admin',
        'total_withdraw',
        'status',
        'note'
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
        return WithdrawBalance::class;
    }
}
