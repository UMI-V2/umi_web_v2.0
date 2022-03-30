<?php

namespace App\Repositories;

use App\Models\BusinessDeliveryService;
use App\Repositories\BaseRepository;

/**
 * Class BusinessDeliveryServiceRepository
 * @package App\Repositories
 * @version March 30, 2022, 12:16 pm UTC
*/

class BusinessDeliveryServiceRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id_usaha',
        'id_master_jasa_pengiriman',
        'biaya'
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
        return BusinessDeliveryService::class;
    }
}
