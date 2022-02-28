<?php

namespace App\Models;

use Eloquent as Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @SWG\Definition(
 *      definition="master_product_category",
 *      required={"nama_kategori_produk", "status_kategori_produk"},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="nama_kategori_produk",
 *          description="nama_kategori_produk",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="status_kategori_produk",
 *          description="status_kategori_produk",
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
class master_product_category extends Model
{

    use HasFactory;

    public $table = 'master_product_categories';
    



    public $fillable = [
        'nama_kategori_produk',
        'status_kategori_produk'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nama_kategori_produk' => 'string',
        'status_kategori_produk' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nama_kategori_produk' => 'required',
        'status_kategori_produk' => 'required'
    ];

    
}
