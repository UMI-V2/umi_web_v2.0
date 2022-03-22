<?php

namespace App\Repositories;

use App\Models\MasterTransactionCategory;
use App\Repositories\BaseRepository;

/**
 * Class MasterTransactionCategoryRepository
 * @package App\Repositories
 * @version February 28, 2022, 5:58 pm UTC
*/

class MasterTransactionCategoryRepository extends BaseRepository
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
        return MasterTransactionCategory::class;
    }
}
