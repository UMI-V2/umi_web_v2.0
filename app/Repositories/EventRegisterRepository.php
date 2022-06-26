<?php

namespace App\Repositories;

use App\Models\EventRegister;
use App\Repositories\BaseRepository;

/**
 * Class EventRegisterRepository
 * @package App\Repositories
 * @version June 26, 2022, 6:17 pm WIB
*/

class EventRegisterRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'event_id',
        'user_id'
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
        return EventRegister::class;
    }
}
