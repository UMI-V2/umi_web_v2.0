<?php

namespace App\Models;

use Eloquent as Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @SWG\Definition(
 *      definition="master_business_category",
 *      required={"nama_kategori_usaha", "status_kategori_usaha"},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="nama_kategori_usaha",
 *          description="nama_kategori_usaha",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="status_kategori_usaha",
 *          description="status_kategori_usaha",
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
class master_business_category extends Model
{

    use HasFactory;

    public $table = 'master_business_categories';
    



    public $fillable = [
        'nama_kategori_usaha',
        'status_kategori_usaha'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nama_kategori_usaha' => 'string',
        'status_kategori_usaha' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nama_kategori_usaha' => 'required',
        'status_kategori_usaha' => 'required'
    ];

    
}
