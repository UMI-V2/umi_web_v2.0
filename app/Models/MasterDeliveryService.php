<?php

namespace App\Models;

use Eloquent as Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @SWG\Definition(
 *      definition="MasterDeliveryService",
 *      required={"nama_jasa_pengiriman", "ongkir", "deskripsi"},
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
 *          property="ongkir",
 *          description="ongkir",
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

    use HasFactory;

    public $table = 'master_delivery_services';
    



    public $fillable = [
        'nama_jasa_pengiriman',
        'ongkir',
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
        'ongkir' => 'string',
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
        'ongkir' => 'required',
        'deskripsi' => 'required'
    ];

    
}
