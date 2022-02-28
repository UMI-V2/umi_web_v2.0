<?php

namespace App\Repositories;

use App\Models\master_business_category;
use App\Repositories\BaseRepository;

/**
 * Class master_business_categoryRepository
 * @package App\Repositories
 * @version February 28, 2022, 2:16 pm UTC
*/

class master_business_categoryRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nama_kategori_usaha',
        'status_kategori_usaha'
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
        return master_business_category::class;
    }
}
