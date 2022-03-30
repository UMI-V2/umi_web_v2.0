<?php

namespace App\Repositories;

use App\Models\ShippingCostVariable;
use App\Repositories\BaseRepository;

/**
 * Class ShippingCostVariableRepository
 * @package App\Repositories
 * @version March 30, 2022, 1:11 pm UTC
*/

class ShippingCostVariableRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id_product',
        'is_paid_by_seller',
        'berat',
        'lebar',
        'panjang',
        'tinggi'
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
        return ShippingCostVariable::class;
    }
}
