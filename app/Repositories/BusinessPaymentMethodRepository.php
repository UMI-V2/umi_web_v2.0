<?php

namespace App\Repositories;

use App\Models\BusinessPaymentMethod;
use App\Repositories\BaseRepository;

/**
 * Class BusinessPaymentMethodRepository
 * @package App\Repositories
 * @version March 31, 2022, 7:49 am UTC
*/

class BusinessPaymentMethodRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id_usaha',
        'id_metode_pembayaran'
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
        return BusinessPaymentMethod::class;
    }
}
