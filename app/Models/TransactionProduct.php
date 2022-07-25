<?php

namespace App\Models;

use App\Models\StatusTransaction;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @SWG\Definition(
 *      definition="TransactionProduct",
 *      required={"id_transaksi_penjualan", "id_produk", "harga_produk", "harga_diskon", "deskripsi_produk", "kondisi", "preorder", "ongkir"},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
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
 *          property="id_produk",
 *          description="id_produk",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="harga_produk",
 *          description="harga_produk",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="harga_diskon",
 *          description="harga_diskon",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="deskripsi_produk",
 *          description="deskripsi_produk",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="kondisi",
 *          description="kondisi",
 *          type="boolean"
 *      ),
 *      @SWG\Property(
 *          property="preorder",
 *          description="preorder",
 *          type="boolean"
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
class TransactionProduct extends Model
{

    use HasFactory, SoftDeletes;

    public $table = 'transaction_products';




    public $fillable = [
        'id',
        'id_transaksi_penjualan',
        'id_produk',
        'nama_produk',
        'photo_url_produk',
        'deskripsi_produk',
        'harga_produk',
        'harga_diskon',
        'jumlah_satuan',
        'nama_satuan',
        'kuantitas',
        'kondisi',
        'preorder',
        'is_rating',
        'is_service'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'id_transaksi_penjualan' => 'integer',
        'id_produk' => 'integer',
        'harga_produk' => 'integer',
        'harga_diskon' => 'integer',
        'deskripsi_produk' => 'string',
        'kondisi' => 'boolean',
        'preorder' => 'boolean',
        'is_rating'=>'boolean',
        'is_service'=> 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'id_transaksi_penjualan' => 'required',
        'id_produk' => 'required',
        'harga_produk' => 'required|numeric',
        'harga_diskon' => 'required|numeric',
        'deskripsi_produk' => 'required',
        'kondisi' => 'nullable',
        'preorder' => 'nullable',
        'is_service'=> 'nullable'
    ];

    public static function boot()
    {
        parent::boot();

        static::deleting(function ($model) {
        });
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function sales_transactions()
    {
        return $this->belongsTo(\App\Models\SalesTransaction::class, 'id_transaksi_penjualan', 'id');
    }
    public function status_transactions()
    {
        return $this->belongsTo(TransactionStatus::class, 'id_transaksi_penjualan', 'id_transaksi_penjualan');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function products()
    {
        return $this->belongsTo(\App\Models\Product::class, 'id_produk', 'id');
    }
    public function rating()
    {
        return $this->belongsTo(\App\Models\Rating::class, 'id', 'id_transaksi_produk');
    }

    public function transaction_status()
    {
        return $this->belongsTo(\App\Models\TransactionStatus::class, 'id_transaksi_penjualan', 'id_transaksi_penjualan');
    }
    
}
