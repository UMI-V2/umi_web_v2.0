<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Bagusindrayana\LaravelCoordinate\Traits\LaravelCoordinate;

/**
 * @SWG\Definition(
 *      definition="Address",
 *      required={"id_users", "province_id", "id_kota", "id_kecamatan", "nama", "no_hp", "alamat_lengkap", "patokan", "is_alamat_utama", "is_rumah", "is_kantor", "is_usaha"},
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
 *          property="province_id",
 *          description="province_id",
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
    use LaravelCoordinate;

    //optional

    public $_latitudeName = "latitude"; //default name is latitude
    public $_longitudeName = "longitude";
    public $table = 'addresses';
    protected $dates = ['deleted_at'];



    public $fillable = [
        'id_users',
        'province_id',
        'city_id',
        'subdistrict_id',
        'nama',
        'no_hp',
        'alamat_lengkap',
        'patokan',
        'is_alamat_utama',
        'is_rumah',
        'is_kantor',
        'is_usaha',
        'latitude',
        'longitude',
        'updated_at'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'id_users' => 'integer',
        'province_id' => 'integer',
        'city_id' => 'integer',
        'subdistrict_id' => 'integer',
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
        'province_id' => 'required',
        'city_id' => 'required',
        'subdistrict_id' => 'required',
        'nama' => 'required',
        'no_hp' => 'required',
        'alamat_lengkap' => 'required',
        'patokan' => 'required',
        'is_alamat_utama' => 'required',
        'is_rumah' => 'required',
        'is_kantor' => 'required',
        'is_usaha' => 'required'
    ];

    // protected $appends = ['distance'];

    // public function getDistanceAttribute()
    // {
    //     // return $this->attributes['id'];
    //     return Address::where('id', 1)->nearby([
    //         -6.383358, //latitude
    //         108.292559//longitude
    //     ], 100, 2)->selectDistance([], 'jarak')->get();
    // }


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
    public function province()
    {
        return $this->belongsTo(MasterProvince::class, 'province_id', 'province_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function city()
    {
        return $this->belongsTo(MasterCity::class, 'city_id', 'city_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function sub_district()
    {
        return $this->belongsTo(MasterSubDistrict::class, 'subdistrict_id', 'subdistrict_id');
    }
    public function business()
    {
        return $this->belongsTo(Business::class, 'id_users', 'id_user');
    }
}
