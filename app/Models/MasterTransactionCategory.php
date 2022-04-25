<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @SWG\Definition(
 *      definition="MasterTransactionCategory",
 *      required={"nama_kategori_transaksi", "deskripsi_kategori_transaksi"},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="nama_kategori_transaksi",
 *          description="nama_kategori_transaksi",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="deskripsi_kategori_transaksi",
 *          description="deskripsi_kategori_transaksi",
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
class MasterTransactionCategory extends Model
{

    use HasFactory;

    public $table = 'master_transaction_categories';
    



    public $fillable = [
        'nama_kategori_transaksi',
        'deskripsi_kategori_transaksi'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nama_kategori_transaksi' => 'string',
        'deskripsi_kategori_transaksi' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nama_kategori_transaksi' => 'required',
        'deskripsi_kategori_transaksi' => 'required'
    ];

    
}
