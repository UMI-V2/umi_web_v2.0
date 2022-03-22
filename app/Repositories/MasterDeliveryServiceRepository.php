<?php

namespace App\Repositories;

use App\Models\MasterDeliveryService;
use App\Repositories\BaseRepository;

/**
 * Class MasterDeliveryServiceRepository
 * @package App\Repositories
 * @version February 28, 2022, 5:28 pm UTC
*/

class MasterDeliveryServiceRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nama_jasa_pengiriman',
        'ongkir',
        'deskripsi',
        'kode_rajaongkir'
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
        return MasterDeliveryService::class;
    }
}
