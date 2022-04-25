<?php

namespace App\Repositories;

use App\Models\OpenHour;
use App\Repositories\BaseRepository;

/**
 * Class OpenHourRepository
 * @package App\Repositories
 * @version March 30, 2022, 11:50 am UTC
*/

class OpenHourRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id_usaha',
        'senin',
        'selasa',
        'rabu',
        'kamis',
        'jumat',
        'sabtu',
        'minggu'
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
        return OpenHour::class;
    }
}
