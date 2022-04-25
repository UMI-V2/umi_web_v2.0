<?php

namespace App\Models;

use Eloquent as Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @SWG\Definition(
 *      definition="SubDistrict",
 *      required={"id_provinsi", "id_kota", "nama_kecamatan"},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="id_provinsi",
 *          description="id_provinsi",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="id_kota",
 *          description="id_kota",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="nama_kecamatan",
 *          description="nama_kecamatan",
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
class SubDistrict extends Model
{

    use HasFactory;

    public $table = 'sub_districts';
    



    public $fillable = [
        'id_provinsi',
        'id_kota',
        'nama_kecamatan'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'id_provinsi' => 'integer',
        'id_kota' => 'integer',
        'nama_kecamatan' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'id_provinsi' => 'required',
        'id_kota' => 'required',
        'nama_kecamatan' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function master_provinces()
    {
        return $this->belongsTo(\App\Models\MasterProvince::class, 'id_provinsi', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function cities()
    {
        return $this->belongsTo(\App\Models\City::class, 'id_kota', 'id');
    }
}
