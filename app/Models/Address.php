<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @SWG\Definition(
 *      definition="Address",
 *      required={"id_users", "id_provinsi", "id_kota", "id_kecamatan", "nama", "no_hp", "alamat_lengkap", "patokan", "is_alamat_utama", "is_rumah", "is_kantor", "is_usaha"},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="id_users",
 *          description="id_users",
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
 *          property="id_kecamatan",
 *          description="id_kecamatan",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="nama",
 *          description="nama",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="no_hp",
 *          description="no_hp",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="alamat_lengkap",
 *          description="alamat_lengkap",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="patokan",
 *          description="patokan",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="is_alamat_utama",
 *          description="is_alamat_utama",
 *          type="boolean"
 *      ),
 *      @SWG\Property(
 *          property="is_rumah",
 *          description="is_rumah",
 *          type="boolean"
 *      ),
 *      @SWG\Property(
 *          property="is_kantor",
 *          description="is_kantor",
 *          type="boolean"
 *      ),
 *      @SWG\Property(
 *          property="is_usaha",
 *          description="is_usaha",
 *          type="boolean"
 *      ),
 *      @SWG\Property(
 *          property="latitude",
 *          description="latitude",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="longitude",
 *          description="longitude",
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
class Address extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'addresses';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'id_users',
        'id_provinsi',
        'id_kota',
        'id_kecamatan',
        'nama',
        'no_hp',
        'alamat_lengkap',
        'patokan',
        'is_alamat_utama',
        'is_rumah',
        'is_kantor',
        'is_usaha',
        'latitude',
        'longitude'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'id_users' => 'integer',
        'id_provinsi' => 'integer',
        'id_kota' => 'integer',
        'id_kecamatan' => 'integer',
        'nama' => 'string',
        'no_hp' => 'string',
        'alamat_lengkap' => 'string',
        'patokan' => 'string',
        'is_alamat_utama' => 'boolean',
        'is_rumah' => 'boolean',
        'is_kantor' => 'boolean',
        'is_usaha' => 'boolean',
        'latitude' => 'string',
        'longitude' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'id_users' => 'required',
        'id_provinsi' => 'required',
        'id_kota' => 'required',
        'id_kecamatan' => 'required',
        'nama' => 'required',
        'no_hp' => 'required',
        'alamat_lengkap' => 'required',
        'patokan' => 'required',
        'is_alamat_utama' => 'required',
        'is_rumah' => 'required',
        'is_kantor' => 'required',
        'is_usaha' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function users()
    {
        return $this->belongsTo(\App\Models\User::class, 'id_users', 'id');
    }

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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function sub_districts()
    {
        return $this->belongsTo(\App\Models\SubDistrict::class, 'id_kecamatan', 'id');
    }
}
