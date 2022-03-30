<?php

namespace App\Models;

use Eloquent as Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @SWG\Definition(
 *      definition="Product",
 *      required={"id_usaha", "id_satuan", "nama", "deskripsi", "harga", "stok", "kondisi", "preorder"},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
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
 *          property="id_satuan",
 *          description="id_satuan",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="nama",
 *          description="nama",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="deskripsi",
 *          description="deskripsi",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="harga",
 *          description="harga",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="stok",
 *          description="stok",
 *          type="integer",
 *          format="int32"
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
class Product extends Model
{

    use HasFactory;

    public $table = 'products';
    



    public $fillable = [
        'id_usaha',
        'id_satuan',
        'nama',
        'deskripsi',
        'harga',
        'stok',
        'kondisi',
        'preorder'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'id_usaha' => 'integer',
        'id_satuan' => 'integer',
        'nama' => 'string',
        'deskripsi' => 'string',
        'harga' => 'string',
        'stok' => 'integer',
        'kondisi' => 'boolean',
        'preorder' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'id_usaha' => 'required',
        'id_satuan' => 'required',
        'nama' => 'required',
        'deskripsi' => 'required',
        'harga' => 'required',
        'stok' => 'required|numeric',
        'kondisi' => 'required',
        'preorder' => 'required'
    ];

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
    public function master_units()
    {
        return $this->belongsTo(\App\Models\MasterUnit::class, 'id_satuan', 'id');
    }
}
