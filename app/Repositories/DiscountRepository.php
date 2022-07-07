<?php

namespace App\Repositories;

use App\Models\Discount;
use App\Repositories\BaseRepository;

/**
 * Class DiscountRepository
 * @package App\Repositories
 * @version March 31, 2022, 6:20 am UTC
*/

class DiscountRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id_produk',
        'nama_promo',
        'waktu_mulai',
        'waktu_berakhir',
        'potongan',
        'batas_pembelian',
        'type'
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
        return Discount::class;
    }
}
