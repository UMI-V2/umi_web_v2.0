<?php

namespace App\Repositories;

use App\Models\master_product_category;
use App\Repositories\BaseRepository;

/**
 * Class master_product_categoryRepository
 * @package App\Repositories
 * @version February 28, 2022, 1:05 pm UTC
*/

class master_product_categoryRepository extends BaseRepository
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
        return master_product_category::class;
    }
}
