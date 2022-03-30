<?php

namespace App\Repositories;

use App\Models\Address;
use App\Repositories\BaseRepository;

/**
 * Class AddressRepository
 * @package App\Repositories
 * @version March 30, 2022, 6:10 am UTC
*/

class AddressRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id_users',
        'id_provinsi',
        'id_kota',
        'id_kecamatan',
        'nama',
        'no_hp',
        'alamat_lengkap',
        'patokan',
        'is_alamat_utama',
        'is_rumah',
        'is_kantor',
        'is_usaha',
        'latitude',
        'longitude'
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
        return Address::class;
    }
}
