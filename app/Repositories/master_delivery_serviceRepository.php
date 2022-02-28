<?php

namespace App\Repositories;

use App\Models\master_delivery_service;
use App\Repositories\BaseRepository;

/**
 * Class master_delivery_serviceRepository
 * @package App\Repositories
 * @version February 28, 2022, 5:28 pm UTC
*/

class master_delivery_serviceRepository extends BaseRepository
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
        return master_delivery_service::class;
    }
}
