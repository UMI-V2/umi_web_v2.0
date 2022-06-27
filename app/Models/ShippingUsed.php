<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="ShippingUsed",
 *      required={"id_shipping_cost_variable", "id_business_delivery_services"},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="id_shipping_cost_variable",
 *          description="id_shipping_cost_variable",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="id_business_delivery_services",
 *          description="id_business_delivery_services",
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
class ShippingUsed extends Model
{

    use HasFactory, SoftDeletes;

    public $table = 'shipping_useds';
    



    public $fillable = [
        'id_shipping_cost_variable',
        'id_business_delivery_services'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'id_shipping_cost_variable' => 'integer',
        'id_business_delivery_services' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'id_shipping_cost_variable' => 'required',
        'id_business_delivery_services' => 'required'
    ];

    public static function boot() {
        parent::boot();

        static::deleting(function($model) { 
           
        });
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function shipping_cost_variables()
    {
        return $this->belongsTo(\App\Models\ShippingCostVariable::class, 'id_shipping_cost_variable', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function business_delivery_services()
    {
        return $this->belongsTo(\App\Models\BusinessDeliveryService::class, 'id_business_delivery_services', 'id');
    }
}
