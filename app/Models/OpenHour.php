<?php

namespace App\Models;

use Eloquent as Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @SWG\Definition(
 *      definition="OpenHour",
 *      required={"id_usaha"},
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
 *          property="senin",
 *          description="senin",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="selasa",
 *          description="selasa",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="rabu",
 *          description="rabu",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="kamis",
 *          description="kamis",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="jumat",
 *          description="jumat",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="sabtu",
 *          description="sabtu",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="minggu",
 *          description="minggu",
 *          type="string"
 *      )
 * )
 */
class OpenHour extends Model
{

    use HasFactory;

    public $table = 'open_hours';
    



    public $fillable = [
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
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'id_usaha' => 'integer',
        'senin' => 'string',
        'selasa' => 'string',
        'rabu' => 'string',
        'kamis' => 'string',
        'jumat' => 'string',
        'sabtu' => 'string',
        'minggu' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'id_usaha' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function businesses()
    {
        return $this->belongsTo(\App\Models\Business::class, 'id_usaha', 'id');
    }
}
