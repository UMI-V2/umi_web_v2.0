<?php

namespace App\Models;

use Eloquent as Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @SWG\Definition(
 *      definition="Rating",
 *      required={"id_produk", "id_transaksi_penjualan", "rating", "ulasan"},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="id_produk",
 *          description="id_produk",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="id_transaksi_penjualan",
 *          description="id_transaksi_penjualan",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="rating",
 *          description="rating",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="ulasan",
 *          description="ulasan",
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
class Rating extends Model
{

    use HasFactory;

    public $table = 'ratings';
    



    public $fillable = [
        'id_produk',
        'id_transaksi_penjualan',
        'rating',
        'ulasan'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'id_produk' => 'integer',
        'id_transaksi_penjualan' => 'integer',
        'rating' => 'integer',
        'ulasan' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'id_produk' => 'required',
        'id_transaksi_penjualan' => 'required',
        'rating' => 'required|numeric',
        'ulasan' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function products()
    {
        return $this->belongsTo(\App\Models\Product::class, 'id_produk', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function sales_transactions()
    {
        return $this->belongsTo(\App\Models\SalesTransaction::class, 'id_transaksi_penjualan', 'id');
    }
}
