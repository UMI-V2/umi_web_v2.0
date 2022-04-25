<?php

namespace App\Repositories;

use App\Models\ShippingUsed;
use App\Repositories\BaseRepository;

/**
 * Class ShippingUsedRepository
 * @package App\Repositories
 * @version March 30, 2022, 1:29 pm UTC
*/

class ShippingUsedRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id_shipping_cost_variable',
        'id_business_delivery_services'
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
        return ShippingUsed::class;
    }
}
