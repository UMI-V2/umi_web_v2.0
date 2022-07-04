<?php

namespace App\Models;

use App\Models\Address;
use Bagusindrayana\LaravelCoordinate\Traits\LaravelCoordinate;
use Illuminate\Database\Eloquent\Model;
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

    use HasFactory, LaravelCoordinate;

    public $_latitudeName = "latitude"; //default name is latitude
    public $_longitudeName = "longitude";


    public $table = 'businesses';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'id',
        'id_user',
        'id_master_status_usaha',
        'nama_usaha',
        'deskripsi',
        'is_ambil_di_toko',
        'is_auto_payment',
        'is_manual_payment',
        'is_delivery',
        'latitude',
        'longitude',
        'created_at',
        'updated_at',
        'deleted_at'

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
        'nama_usaha' => 'string',
        'is_ambil_di_toko' => 'boolean',
        'is_auto_payment' => 'boolean',
        'is_manual_payment' => 'boolean',
        'is_delivery' => 'boolean',
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
    public function category()
    {
        return $this->hasMany(BusinessCategory::class,  'id_usaha', 'id');
    }

    public function business_file()
    {
        return $this->hasMany(BusinessFile::class,  'id_usaha', 'id');
    }

    public function open_hours()
    {
        return $this->hasOne(OpenHour::class,  'id_usaha', 'id');
    }

    public function address()
    {
        return $this->belongsTo(Address::class,  'id_user', 'id_users');
    }

    public static function boot()
    {
        parent::boot();

        static::deleting(function ($model) {
            BusinessCategory::where('id_usaha', $model->id)->delete();
            BusinessDeliveryService::where('id_usaha', $model->id)->delete();
            BusinessFile::where('id_usaha', $model->id)->delete();
            BusinessPaymentMethod::where('id_usaha', $model->id)->delete();
            Discount::where('id_usaha', $model->id)->delete();
            OpenHour::where('id_usaha', $model->id)->delete();
            Product::where('id_usaha', $model->id)->delete();
        });
    }
}
