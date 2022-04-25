<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @SWG\Definition(
 *      definition="ShippingCostVariable",
 *      required={"id_product", "is_paid_by_seller", "berat", "lebar", "panjang", "tinggi"},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="id_product",
 *          description="id_product",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="is_paid_by_seller",
 *          description="is_paid_by_seller",
 *          type="boolean"
 *      ),
 *      @SWG\Property(
 *          property="berat",
 *          description="berat",
 *          type="number",
 *          format="number"
 *      ),
 *      @SWG\Property(
 *          property="lebar",
 *          description="lebar",
 *          type="number",
 *          format="number"
 *      ),
 *      @SWG\Property(
 *          property="panjang",
 *          description="panjang",
 *          type="number",
 *          format="number"
 *      ),
 *      @SWG\Property(
 *          property="tinggi",
 *          description="tinggi",
 *          type="number",
 *          format="number"
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
class ShippingCostVariable extends Model
{

    use HasFactory;

    public $table = 'shipping_cost_variables';
    



    public $fillable = [
        'id_product',
        'is_paid_by_seller',
        'berat',
        'lebar',
        'panjang',
        'tinggi'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'id_product' => 'integer',
        'is_paid_by_seller' => 'boolean',
        'berat' => 'double',
        'lebar' => 'double',
        'panjang' => 'double',
        'tinggi' => 'double'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'id_product' => 'required',
        'is_paid_by_seller' => 'required',
        'berat' => 'required',
        'lebar' => 'required',
        'panjang' => 'required',
        'tinggi' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function products()
    {
        return $this->belongsTo(\App\Models\Product::class, 'id_product', 'id');
    }
}
