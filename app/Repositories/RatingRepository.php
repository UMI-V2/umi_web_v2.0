<?php

namespace App\Repositories;

use App\Models\Rating;
use App\Repositories\BaseRepository;

/**
 * Class RatingRepository
 * @package App\Repositories
 * @version March 31, 2022, 9:04 am UTC
*/

class RatingRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id_produk',
        'id_transaksi_penjualan',
        'rating',
        'ulasan'
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
        return Rating::class;
    }
}
