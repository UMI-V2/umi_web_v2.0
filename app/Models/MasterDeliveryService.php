<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="MasterDeliveryService",
 *      required={"nama_jasa_pengiriman", "is_set_seller", "deskripsi"},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="nama_jasa_pengiriman",
 *          description="nama_jasa_pengiriman",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="is_set_seller",
 *          description="is_set_seller",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="deskripsi",
 *          description="deskripsi",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="kode_rajaongkir",
 *          description="kode_rajaongkir",
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
class MasterDeliveryService extends Model
{

    use HasFactory, SoftDeletes;

    public $table = 'master_delivery_services';




    public $fillable = [
        'nama_jasa_pengiriman',
        'is_set_seller',
        'deskripsi',
        'kode_rajaongkir'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nama_jasa_pengiriman' => 'string',
        'is_set_seller' => 'string',
        'deskripsi' => 'string',
        'kode_rajaongkir' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nama_jasa_pengiriman' => 'required',
        'is_set_seller' => 'required',
        'deskripsi' => 'required'
    ];

    public static function boot() {
        parent::boot();

        static::deleting(function($model) { 
            // BusinessDeliveryService::where('id_master_jasa_pengiriman', $model->id)->delete();
        });
    }
    
}
