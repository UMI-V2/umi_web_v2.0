<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

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

    use HasFactory, SoftDeletes;

    public $table = 'open_hours';
    



    public $fillable = [
        'id_usaha',
        'senin_buka',
        'senin_tutup',
        'selasa_buka',
        'selasa_tutup',
        'rabu_buka',
        'rabu_tutup',
        'kamis_buka',
        'kamis_tutup',
        'jumat_buka',
        'jumat_tutup',
        'sabtu_buka',
        'sabtu_tutup',
        'minggu_buka',
        'minggu_tutup'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'id_usaha' => 'integer',
        'senin_buka' => 'string',
        'senin_tutup' => 'string',
        'selasa_buka' => 'string',
        'selasa_tutup' => 'string',
        'rabu_buka' => 'string',
        'rabu_tutup' => 'string',
        'kamis_buka' => 'string',
        'kamis_tutup' => 'string',
        'jumat_buka' => 'string',
        'jumat_tutup' => 'string',
        'sabtu_buka' => 'string',
        'sabtu_tutup' => 'string',
        'minggu_buka' => 'string',
        'minggu_tutup' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'id_usaha' => 'required'
    ];

    public static function boot() {
        parent::boot();

        static::deleting(function($model) { 
           
        });
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function businesses()
    {
        return $this->belongsTo(\App\Models\Business::class, 'id_usaha', 'id');
    }


}
