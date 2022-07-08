<?php

namespace App\Repositories;

use App\Models\ProductDiscount;
use App\Repositories\BaseRepository;

/**
 * Class ProductDiscountRepository
 * @package App\Repositories
 * @version July 8, 2022, 12:23 am WIB
 */

class ProductDiscountRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id_product',
        'id_discount',
        'harga_diskon',
        'batas_pembelian'
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
        return ProductDiscount::class;
    }
}
