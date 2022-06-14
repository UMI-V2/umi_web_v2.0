<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @SWG\Definition(
 *      definition="ProductFile",
 *      required={"id_produk", "file", "video", "photo"},
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
 *          property="file",
 *          description="file",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="video",
 *          description="video",
 *          type="boolean"
 *      ),
 *      @SWG\Property(
 *          property="photo",
 *          description="photo",
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
class ProductFile extends Model
{

    use HasFactory;

    public $table = 'product_files';
    



    public $fillable = [
        'id_produk',
        'file',
        'video',
        'photo',
        'image_url'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'id_produk' => 'integer',
        'file' => 'string',
        'video' => 'boolean',
        'photo' => 'boolean',
        'image_url' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'id_produk' => 'required',
        'file' => 'required',
        'video' => 'required',
        'photo' => 'required',
        'image_url' => 'required'
    ];

    public function getFileAttribute()
    {
        if ($this->attributes['file']) {
            return url('') . Storage::url($this->attributes['file']);
        } else {
            return null;
        }
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function products()
    {
        return $this->belongsTo(\App\Models\Product::class, 'id_produk', 'id');
    }
}
