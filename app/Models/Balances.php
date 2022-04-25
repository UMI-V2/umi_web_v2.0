<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @SWG\Definition(
 *      definition="Balances",
 *      required={"id_kategori_transaksi", "id_transaksi_penjualan", "pengeluaran", "pemasukan"},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="id_kategori_transaksi",
 *          description="id_kategori_transaksi",
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
 *          property="pengeluaran",
 *          description="pengeluaran",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="pemasukan",
 *          description="pemasukan",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="deskripsi",
 *          description="deskripsi",
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
class Balances extends Model
{

    use HasFactory;

    public $table = 'balances';
    



    public $fillable = [
        'id_kategori_transaksi',
        'id_transaksi_penjualan',
        'pengeluaran',
        'pemasukan',
        'deskripsi'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'id_kategori_transaksi' => 'integer',
        'id_transaksi_penjualan' => 'integer',
        'pengeluaran' => 'integer',
        'pemasukan' => 'integer',
        'deskripsi' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'id_kategori_transaksi' => 'required',
        'id_transaksi_penjualan' => 'required',
        'pengeluaran' => 'required|numeric',
        'pemasukan' => 'required|numeric'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function master_transaction_categories()
    {
        return $this->belongsTo(\App\Models\MasterTransactionCategory::class, 'id_kategori_transaksi', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function sales_transactions()
    {
        return $this->belongsTo(\App\Models\SalesTransaction::class, 'id_transaksi_penjualan', 'id');
    }
}
