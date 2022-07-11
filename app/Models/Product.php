<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Bagusindrayana\LaravelCoordinate\Traits\LaravelCoordinate;
use Illuminate\Database\Eloquent\SoftDeletes;

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

    use HasFactory, LaravelCoordinate, SoftDeletes;

    public $_latitudeName = "latitude"; //default name is latitude
    public $_longitudeName = "longitude";


    public $table = 'products';




    public $fillable = [
        'id',
        'id_usaha',
        'id_satuan',
        'nama',
        'deskripsi',
        'harga',
        'stok',
        'kondisi',
        'preorder',
        'jumlah_satuan',
        'is_arshive',
        'latitude',
        'longitude',
        'created_at',
        'updated_at',
        // 'deleted_at'
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
        'preorder' => 'boolean',
        'is_arshive' => 'boolean'
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

    public function product_category()
    {
        return $this->hasMany(\App\Models\ProductCategory::class, 'id_produk', 'id');
    }
    // public function master_product_category()
    // {
    //     return $this->hasMany(MasterProductCategory::class, 'id_kategori', 'id');
    // }

    public function product_files()
    {
        return $this->hasMany(\App\Models\ProductFile::class, 'id_produk', 'id');
    }

    public function available_discount()
    {
        return $this->belongsTo(\App\Models\ProductDiscount::class, 'id', 'id_product');
    }
    public function product_discount()
    {
        return $this->belongsTo(\App\Models\ProductDiscount::class, 'id', 'id_product');
    }

    public static function boot()
    {
        parent::boot();

        static::deleting(function($product) { 
             $product->product_category()->delete();
            //  $files = ProductFile::where('id_produk', $product->id)->get();
            //  foreach ($files as $file) {
            //      $fileName = $file->getAttributes()['file'];
            //     ProductFile::where('file', $fileName)->delete();
            //     // if (Storage::disk('public')->exists($fileName)) {
            //     //     Storage::disk('public')->delete($fileName);
            //     // }
            // }
             $product->product_files()->delete();
             $product->product_discount()->delete();
             Cart::where('id_produk', $product->id)->delete();
             Rating::where('id_produk', $product->id)->delete();
             ShippingCostVariable::where('id_produk', $product->id)->delete();
        });
    }
}
