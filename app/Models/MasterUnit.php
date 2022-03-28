<?php

namespace App\Models;

use Eloquent as Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @SWG\Definition(
 *      definition="MasterUnit",
 *      required={"nama_satuan", "singkatan_satuan"},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="nama_satuan",
 *          description="nama_satuan",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="singkatan_satuan",
 *          description="singkatan_satuan",
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
class MasterUnit extends Model
{

    use HasFactory;

    public $table = 'master_units';
    



    public $fillable = [
        'nama_satuan',
        'singkatan_satuan'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nama_satuan' => 'string',
        'singkatan_satuan' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nama_satuan' => 'required',
        'singkatan_satuan' => 'required'
    ];

    
}
