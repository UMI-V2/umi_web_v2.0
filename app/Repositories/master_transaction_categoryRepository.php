<?php

namespace App\Repositories;

use App\Models\master_transaction_category;
use App\Repositories\BaseRepository;

/**
 * Class master_transaction_categoryRepository
 * @package App\Repositories
 * @version February 28, 2022, 5:58 pm UTC
*/

class master_transaction_categoryRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nama_kategori_transaksi',
        'deskripsi_kategori_transaksi'
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
        return master_transaction_category::class;
    }
}
