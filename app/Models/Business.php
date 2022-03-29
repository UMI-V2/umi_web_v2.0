<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @SWG\Definition(
 *      definition="Business",
 *      required={"id_user", "id_master_status_usaha", "nama_usaha"},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="id_user",
 *          description="id_user",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="id_master_status_usaha",
 *          description="id_master_status_usaha",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="nama_usaha",
 *          description="nama_usaha",
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
class Business extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'businesses';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'id_user',
        'id_master_status_usaha',
        'nama_usaha'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'id_user' => 'integer',
        'id_master_status_usaha' => 'integer',
        'nama_usaha' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'id_user' => 'required',
        'id_master_status_usaha' => 'required',
        'nama_usaha' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function users()
    {
        return $this->belongsTo(\App\Models\User::class, 'id_user', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function masterStatusBusinesses()
    {
        return $this->belongsTo(\App\Models\MasterStatusBusiness::class, 'id_master_status_usaha', 'id');
    }
}
