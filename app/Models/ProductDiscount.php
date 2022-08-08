<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class DiscountProduct
 * @package App\Models
 * @version July 8, 2022, 12:23 am WIB
 *
 * @property \App\Models\Product $idProduct
 * @property \App\Models\Discount $idDiscount
 * @property integer $id_product
 * @property integer $id_discount
 * @property integer $harga_diskon
 * @property integer $batas_pembelian
 */
class ProductDiscount extends Model
{
    use HasFactory, SoftDeletes;

    public $table = 'product_discounts';

    public $fillable = [
        'id_product',
        'id_discount',
        'harga_diskon',
        'batas_pembelian',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'id_product' => 'integer',
        'id_discount' => 'integer',
        'harga_diskon' => 'integer',
        'batas_pembelian' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'id_product' => 'required',
        'id_discount' => 'required',
        'harga_diskon' => 'required',
        'batas_pembelian' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public static function boot() {
        parent::boot();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function discounts()
    {
        return $this->belongsTo(\App\Models\Discount::class, 'id_discount', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function products()
    {
        return $this->belongsTo(\App\Models\Product::class, 'id_product', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function businesses()
    {
        return $this->belongsTo(\App\Models\Business::class, 'id_usaha', 'id');
    }
}
