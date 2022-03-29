<?php

namespace App\Repositories;

use App\Models\BusinessCategory;
use App\Repositories\BaseRepository;

/**
 * Class BusinessCategoryRepository
 * @package App\Repositories
 * @version March 29, 2022, 12:08 pm UTC
*/

class BusinessCategoryRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id_usaha',
        'id_master_kategori_usaha'
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
        return BusinessCategory::class;
    }
}
