<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Auth;

/**
 * @SWG\Definition(
 *      definition="Event",
 *      required={"title", "sub_title", "description", "author", "start_time", "end_time", "contact_person"},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="title",
 *          description="title",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="sub_title",
 *          description="sub_title",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="description",
 *          description="description",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="author",
 *          description="author",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="start_time",
 *          description="start_time",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="end_time",
 *          description="end_time",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="contact_person",
 *          description="contact_person",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="created_at",
 *          description="created_at",
 *          type="string",
 *          format="date-time"
 *      ),
 *      @SWG\Property(
 *          property="updated_at",
 *          description="updated_at",
 *          type="string",
 *          format="date-time"
 *      )
 * )
 */
class Event extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'events';
    

    protected $dates = ['deleted_at'];

    protected $appends = ['photos', 'total_participants', 'is_participant'];


    public $fillable = [
        'title',
        'sub_title',
        'description',
        'author',
        'start_time',
        'end_time',
        'contact_person',
        'max_registers',
        'registration_deadline',
        'address'

    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'title' => 'string',
        'sub_title' => 'string',
        'description' => 'string',
        'author' => 'string',
        'start_time' => 'datetime',
        'end_time' => 'datetime',
        'registration_deadline'=>'datetime',
        'contact_person' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'title' => 'required',
        'sub_title' => 'required',
        'description' => 'required',
        'author' => 'required',
        'start_time' => 'required',
        'end_time' => 'required',
        'contact_person' => 'required'
    ];

    public function getPhotosAttribute()
    {
        return GeneralFile::where('events_id',$this->id)->get();
    }

    public function getIsParticipantAttribute()
    {
        return EventRegister::where('event_id',$this->id)->where('user_id', Auth::user()->id)->get()->isNotEmpty();
    }

    public function getTotalParticipantsAttribute()
    {
        return EventRegister::where('event_id',$this->id)->get();
    }
}
