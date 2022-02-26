<?php

namespace App\Repositories;

use App\Models\master_product_category;
use App\Repositories\BaseRepository;

/**
 * Class master_product_categoryRepository
 * @package App\Repositories
 * @version February 26, 2022, 10:43 am UTC
*/

class master_product_categoryRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nama'
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
