<?php

namespace App\Repositories;

use App\Models\SalesTransaction;
use App\Repositories\BaseRepository;

/**
 * Class SalesTransactionRepository
 * @package App\Repositories
 * @version March 31, 2022, 8:19 am UTC
*/

class SalesTransactionRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id_user',
        'id_usaha',
        'id_metode_pembayaran',
        'id_sales_delivery_service',
        'is_ambil_di_toko',
        'no_pemesanan',
        'subtotal_produk',
        'subtotal_ongkir',
        'diskon',
        'biaya_penanganan',
        'link_pembayaran',
        'total_pesanan',
        'is_rating'
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
        return SalesTransaction::class;
    }
}
