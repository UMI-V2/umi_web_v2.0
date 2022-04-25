<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @SWG\Definition(
 *      definition="BusinessDeliveryService",
 *      required={"id_usaha", "id_master_jasa_pengiriman", "biaya"},
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
 *          property="id_master_jasa_pengiriman",
 *          description="id_master_jasa_pengiriman",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="biaya",
 *          description="biaya",
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
class BusinessDeliveryService extends Model
{

    use HasFactory;

    public $table = 'business_delivery_services';
    



    public $fillable = [
        'id_usaha',
        'id_master_jasa_pengiriman',
        'biaya'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'id_usaha' => 'integer',
        'id_master_jasa_pengiriman' => 'integer',
        'biaya' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'id_usaha' => 'required',
        'id_master_jasa_pengiriman' => 'required',
        'biaya' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function businesses()
    {
        return $this->belongsTo(\App\Models\Business::class, 'id_usaha', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function master_delivery_services()
    {
        return $this->belongsTo(\App\Models\MasterDeliveryService::class, 'id_master_jasa_pengiriman', 'id');
    }
}
