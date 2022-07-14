<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="SalesTransaction",
 *      required={"id_user", "id_usaha", "id_metode_pembayaran", "id_sales_delivery_service", "is_ambil_di_toko", "no_pemesanan", "subtotal_produk", "subtotal_ongkir", "diskon", "biaya_penanganan", "link_pembayaran", "total_pesanan", "is_rating"},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="id_user",
 *          description="id_user",
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
 *          property="id_metode_pembayaran",
 *          description="id_metode_pembayaran",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="id_sales_delivery_service",
 *          description="id_sales_delivery_service",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="is_ambil_di_toko",
 *          description="is_ambil_di_toko",
 *          type="boolean"
 *      ),
 *      @SWG\Property(
 *          property="no_pemesanan",
 *          description="no_pemesanan",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="subtotal_produk",
 *          description="subtotal_produk",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="subtotal_ongkir",
 *          description="subtotal_ongkir",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="diskon",
 *          description="diskon",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="biaya_penanganan",
 *          description="biaya_penanganan",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="link_pembayaran",
 *          description="link_pembayaran",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="total_pesanan",
 *          description="total_pesanan",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="is_rating",
 *          description="is_rating",
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
class SalesTransaction extends Model
{

    use HasFactory, SoftDeletes;

    public $table = 'sales_transactions';

    protected $appends = ['sales_history'];




    public $fillable = [
        'id_user',
        'id_usaha',
        'id_metode_pembayaran',
        'id_sales_delivery_service',
        'is_ambil_di_toko',
        'no_pemesanan',
        'subtotal_produk',
        'subtotal_ongkir',
        'diskon',
        'biaya_penanganan',
        'link_pembayaran',
        'batas_waktu_pembayaran',
        'total_pesanan',
        'is_delivery',
        'is_manual_payment',
        'is_auto_payment',
        'message',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'id_user' => 'integer',
        'id_usaha' => 'integer',
        'id_metode_pembayaran' => 'integer',
        'id_sales_delivery_service' => 'integer',
        'is_ambil_di_toko' => 'boolean',
        'no_pemesanan' => 'string',
        'subtotal_produk' => 'integer',
        'subtotal_ongkir' => 'integer',
        'diskon' => 'integer',
        'biaya_penanganan' => 'integer',
        'link_pembayaran' => 'string',
        'total_pesanan' => 'integer',
        'is_delivery'=> 'boolean',
        'is_manual_payment'=> 'boolean',
        'is_auto_payment'=> 'boolean',
        'is_rating' => 'boolean',
        'sales_history' => 'object'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'id_user' => 'required',
        'id_usaha' => 'required',
        'id_metode_pembayaran' => 'required',
        'id_sales_delivery_service' => 'required',
        'is_ambil_di_toko' => 'required',
        'no_pemesanan' => 'required',
        'subtotal_produk' => 'required|numeric',
        'subtotal_ongkir' => 'required|numeric',
        'diskon' => 'required|numeric',
        'biaya_penanganan' => 'required|numeric',
        'link_pembayaran' => 'nullable',
        'total_pesanan' => 'required|numeric',
        'is_rating' => 'required'
    ];

    public static function boot()
    {
        parent::boot();

        static::deleting(function ($model) {
            // Balances::where('id_transaksi_penjualan', $model->id)->delete();
            // Rating::where('id_transaksi_penjualan', $model->id)->delete();
            // TransactionProduct::where('id_transaksi_penjualan', $model->id)->delete();
        });
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function users()
    {
        return $this->belongsTo(\App\Models\User::class, 'id_user', 'id');
    }

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
    public function business_payment_methods()
    {
        return $this->belongsTo(\App\Models\BusinessPaymentMethod::class, 'id_metode_pembayaran', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function sales_delivery_services()
    {
        return $this->belongsTo(\App\Models\SalesDeliveryService::class, 'id_sales_delivery_service', 'id');
    }
    public function transaction_status()
    {
        return $this->belongsTo(\App\Models\TransactionStatus::class, 'id', 'id_transaksi_penjualan');
    }
    public function products_detail()
    {
        return $this->hasMany(\App\Models\TransactionProduct::class, 'id_transaksi_penjualan', 'id');
    }

    public function address_delivery()
    {
        return $this->belongsTo(\App\Models\AddressDelivery::class, 'id', 'id_transaksi_penjualan');
    }

    public function getSalesHistoryAttribute()
    {
        $history = [];
        $history['no_pemesanan'] = $this->no_pemesanan;
        $history['nama_produk'] = $this->products_detail->pluck('products.nama')->implode(', ');
        $history['transaction_status'] = $this->transaction_status->status ?? '-';
        return $history;
    }
}
