<?php

namespace App\Repositories;

use App\Models\MasterBusinessCategory;
use App\Repositories\BaseRepository;

/**
 * Class MasterBusinessCategoryRepository
 * @package App\Repositories
 * @version February 28, 2022, 2:16 pm UTC
*/

class MasterBusinessCategoryRepository extends BaseRepository
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
        return MasterBusinessCategory::class;
    }
}
