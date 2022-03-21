<?php

namespace App\Repositories;

use App\Models\MasterProductCategory;
use App\Repositories\BaseRepository;

/**
 * Class MasterProductCategoryRepository
 * @package App\Repositories
 * @version February 28, 2022, 1:05 pm UTC
*/

class MasterProductCategoryRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nama_kategori_produk',
        'status_kategori_produk'
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
        return MasterProductCategory::class;
    }
}
