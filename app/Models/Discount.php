<?php

namespace App\Models;

use Eloquent as Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @SWG\Definition(
 *      definition="Discount",
 *      required={"id_produk", "nama_promo", "waktu_mulai", "waktu_berakhir", "harga", "batas_pembelian", "type"},
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
 *          property="nama_promo",
 *          description="nama_promo",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="waktu_mulai",
 *          description="waktu_mulai",
 *          type="string",
 *          format="date-time"
 *      ),
 *      @SWG\Property(
 *          property="waktu_berakhir",
 *          description="waktu_berakhir",
 *          type="string",
 *          format="date-time"
 *      ),
 *      @SWG\Property(
 *          property="harga",
 *          description="harga",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="batas_pembelian",
 *          description="batas_pembelian",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="type",
 *          description="type",
 *          type="boolean"
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
class Discount extends Model
{

    use HasFactory;

    public $table = 'discounts';
    



    public $fillable = [
        'id_produk',
        'nama_promo',
        'waktu_mulai',
        'waktu_berakhir',
        'harga',
        'batas_pembelian',
        'type'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'id_produk' => 'integer',
        'nama_promo' => 'string',
        'waktu_mulai' => 'datetime',
        'waktu_berakhir' => 'datetime',
        'harga' => 'integer',
        'batas_pembelian' => 'integer',
        'type' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'id_produk' => 'required',
        'nama_promo' => 'required',
        'waktu_mulai' => 'required',
        'waktu_berakhir' => 'required',
        'harga' => 'required',
        'batas_pembelian' => 'required',
        'type' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function products()
    {
        return $this->belongsTo(\App\Models\Product::class, 'id_produk', 'id');
    }
}
