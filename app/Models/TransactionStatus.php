<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="TransactionStatus",
 *      required={"id_transaksi_penjualan", "tanggal_pesanan_dibuat", "tanggal_pembayaran", "tanggal_pesanan_dikirimkan", "tanggal_pesanan_diterima"},
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
 *          property="tanggal_pesanan_dibuat",
 *          description="tanggal_pesanan_dibuat",
 *          type="string",
 *          format="date"
 *      ),
 *      @SWG\Property(
 *          property="tanggal_pembayaran",
 *          description="tanggal_pembayaran",
 *          type="string",
 *          format="date"
 *      ),
 *      @SWG\Property(
 *          property="tanggal_pesanan_dikirimkan",
 *          description="tanggal_pesanan_dikirimkan",
 *          type="string",
 *          format="date"
 *      ),
 *      @SWG\Property(
 *          property="tanggal_pesanan_diterima",
 *          description="tanggal_pesanan_diterima",
 *          type="string",
 *          format="date"
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
class TransactionStatus extends Model
{

    use HasFactory, SoftDeletes;

    public $table = 'transaction_statuses';
    



    public $fillable = [
        'id_transaksi_penjualan',
        'tanggal_pesanan_dibuat',
        'tanggal_pembayaran',
        'tanggal_pesanan_dikirimkan',
        'tanggal_pesanan_diterima'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'id_transaksi_penjualan' => 'integer',
        'tanggal_pesanan_dibuat' => 'date',
        'tanggal_pembayaran' => 'date',
        'tanggal_pesanan_dikirimkan' => 'date',
        'tanggal_pesanan_diterima' => 'date'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'id_transaksi_penjualan' => 'required',
        'tanggal_pesanan_dibuat' => 'required',
        'tanggal_pembayaran' => 'required',
        'tanggal_pesanan_dikirimkan' => 'required',
        'tanggal_pesanan_diterima' => 'required'
    ];

    public static function boot() {
        parent::boot();

        static::deleting(function($model) { 
           
        });
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function sales_transactions()
    {
        return $this->belongsTo(\App\Models\SalesTransaction::class, 'id_transaksi_penjualan', 'id');
    }
}
