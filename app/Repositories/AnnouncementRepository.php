<?php

namespace App\Repositories;

use App\Models\Announcement;
use App\Repositories\BaseRepository;

/**
 * Class AnnouncementRepository
 * @package App\Repositories
 * @version June 26, 2022, 5:57 pm WIB
*/

class AnnouncementRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'title',
        'sub_title',
        'description',
        'author'
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
        return Announcement::class;
    }
}
