<?php

namespace App\Repositories;

use App\Models\Balances;
use App\Repositories\BaseRepository;

/**
 * Class BalancesRepository
 * @package App\Repositories
 * @version March 31, 2022, 10:16 am UTC
*/

class BalancesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id_kategori_transaksi',
        'id_transaksi_penjualan',
        'pengeluaran',
        'pemasukan',
        'deskripsi'
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
        return Balances::class;
    }
}
