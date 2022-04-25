<?php

namespace App\Repositories;

use App\Models\ProductFile;
use App\Repositories\BaseRepository;

/**
 * Class ProductFileRepository
 * @package App\Repositories
 * @version March 31, 2022, 7:00 am UTC
*/

class ProductFileRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id_produk',
        'file',
        'video',
        'photo'
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
        return ProductFile::class;
    }
}
