<?php

namespace App\Repositories;

use App\Models\MasterPaymentMethod;
use App\Repositories\BaseRepository;

/**
 * Class MasterPaymentMethodRepository
 * @package App\Repositories
 * @version February 28, 2022, 5:40 pm UTC
*/

class MasterPaymentMethodRepository extends BaseRepository
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
        return MasterPaymentMethod::class;
    }
}
