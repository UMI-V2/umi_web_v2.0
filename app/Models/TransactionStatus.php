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
        'status',
        'status_auto_payment',
        'tanggal_pesanan_dibuat',
        'tanggal_pesanan_disetujui',
        'tanggal_pembayaran',
        'tanggal_pesanan_disiapkan',
        'tanggal_pesanan_telah_siap',
        'tanggal_pesanan_dikirimkan',
        'tanggal_pesanan_diterima',
        'tanggal_pesanan_dibatalkan',
        'reason_pembatalan_penjual',
        'reason_pembatalan_pembeli'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'id_transaksi_penjualan' => 'integer',
        'tanggal_pesanan_dibuat' => 'datetime',
        'tanggal_pesanan_disetujui' => 'datetime',
        'tanggal_pembayaran' => 'datetime',
        'tanggal_pesanan_disiapkan' => 'datetime',
        'tanggal_pesanan_dikirimkan' => 'datetime',
        'tanggal_pesanan_diterima' => 'datetime',
        'tanggal_pesanan_dibatalkan' => 'datetime',
        'reason_pembatalan_penjual' => 'string',
        'reason_pembatalan_pembeli' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'id_transaksi_penjualan' => 'required',
        'tanggal_pesanan_dibuat' => 'nullable',
        'tanggal_pembayaran' => 'nullable',
        'tanggal_pesanan_dikirimkan' => 'nullable',
        'tanggal_pesanan_diterima' => 'nullable'
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
}
