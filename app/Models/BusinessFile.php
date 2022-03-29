<?php

namespace App\Models;

use Eloquent as Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @SWG\Definition(
 *      definition="BusinessFile",
 *      required={"id_usaha", "file", "is_video", "is_photo"},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="id_usaha",
 *          description="id_usaha",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="file",
 *          description="file",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="is_video",
 *          description="is_video",
 *          type="boolean"
 *      ),
 *      @SWG\Property(
 *          property="is_photo",
 *          description="is_photo",
 *          type="boolean"
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
class BusinessFile extends Model
{

    use HasFactory;

    public $table = 'business_files';
    



    public $fillable = [
        'id_usaha',
        'file',
        'is_video',
        'is_photo'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'id_usaha' => 'integer',
        'file' => 'string',
        'is_video' => 'boolean',
        'is_photo' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'id_usaha' => 'required',
        'file' => 'required',
        'is_video' => 'required',
        'is_photo' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function businesses()
    {
        return $this->belongsTo(\App\Models\Business::class, 'id_usaha', 'id');
    }
}