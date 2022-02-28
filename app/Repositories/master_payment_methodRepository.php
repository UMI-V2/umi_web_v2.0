<?php

namespace App\Repositories;

use App\Models\master_payment_method;
use App\Repositories\BaseRepository;

/**
 * Class master_payment_methodRepository
 * @package App\Repositories
 * @version February 28, 2022, 5:40 pm UTC
*/

class master_payment_methodRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nama_metode_pembayaran',
        'deskripsi_metode_pembayaran'
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
        return master_payment_method::class;
    }
}
