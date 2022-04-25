<?php

namespace App\Repositories;

use App\Models\SalesDeliveryService;
use App\Repositories\BaseRepository;

/**
 * Class SalesDeliveryServiceRepository
 * @package App\Repositories
 * @version March 31, 2022, 6:42 am UTC
*/

class SalesDeliveryServiceRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id_jasa_pengiriman',
        'jenis_layanan',
        'deskripsi_layanan',
        'ongkir'
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
        return SalesDeliveryService::class;
    }
}
