<?php

namespace App\Repositories;

use App\Models\TransactionProduct;
use App\Repositories\BaseRepository;

/**
 * Class TransactionProductRepository
 * @package App\Repositories
 * @version March 31, 2022, 9:44 am UTC
*/

class TransactionProductRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id_transaksi_penjualan',
        'id_produk',
        'harga_produk',
        'harga_diskon',
        'deskripsi_produk',
        'kondisi',
        'preorder',
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
        return TransactionProduct::class;
    }
}
