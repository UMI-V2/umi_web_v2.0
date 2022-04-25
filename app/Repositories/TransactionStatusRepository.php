<?php

namespace App\Repositories;

use App\Models\TransactionStatus;
use App\Repositories\BaseRepository;

/**
 * Class TransactionStatusRepository
 * @package App\Repositories
 * @version March 31, 2022, 9:24 am UTC
*/

class TransactionStatusRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id_transaksi_penjualan',
        'tanggal_pesanan_dibuat',
        'tanggal_pembayaran',
        'tanggal_pesanan_dikirimkan',
        'tanggal_pesanan_diterima'
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
        return TransactionStatus::class;
    }
}
