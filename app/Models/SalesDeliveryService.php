<?php

namespace App\Models;

use Eloquent as Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @SWG\Definition(
 *      definition="SalesDeliveryService",
 *      required={"id_jasa_pengiriman", "jenis_layanan", "deskripsi_layanan", "ongkir"},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="id_jasa_pengiriman",
 *          description="id_jasa_pengiriman",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="jenis_layanan",
 *          description="jenis_layanan",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="deskripsi_layanan",
 *          description="deskripsi_layanan",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="ongkir",
 *          description="ongkir",
 *          type="integer",
 *          format="int32"
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
class SalesDeliveryService extends Model
{

    use HasFactory;

    public $table = 'sales_delivery_services';
    



    public $fillable = [
        'id_jasa_pengiriman',
        'jenis_layanan',
        'deskripsi_layanan',
        'ongkir'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'id_jasa_pengiriman' => 'integer',
        'jenis_layanan' => 'string',
        'deskripsi_layanan' => 'string',
        'ongkir' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'id_jasa_pengiriman' => 'required',
        'jenis_layanan' => 'required',
        'deskripsi_layanan' => 'required',
        'ongkir' => 'required|numeric'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function master_delivery_services()
    {
        return $this->belongsTo(\App\Models\MasterDeliveryService::class, 'id_jasa_pengiriman', 'id');
    }
}
