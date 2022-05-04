<?php

namespace App\Models;

use App\Models\MasterBusinessCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @SWG\Definition(
 *      definition="BusinessCategory",
 *      required={"id_usaha", "id_master_kategori_usaha"},
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
 *          property="id_master_kategori_usaha",
 *          description="id_master_kategori_usaha",
 *          type="integer",
 *          format="int32"
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
class BusinessCategory extends Model
{

    use HasFactory;

    public $table = 'business_categories';
    



    public $fillable = [
        'id_usaha',
        'id_master_kategori_usaha'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'id_usaha' => 'integer',
        'id_master_kategori_usaha' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'id_usaha' => 'required',
        'id_master_kategori_usaha' => 'required'
    ];

    public function usaha()
    {
        return $this->belongsTo(Business::class,  'id_usaha','id');
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
    public function master_business_categories()
    {
        return $this->belongsTo(MasterBusinessCategory::class, 'id_master_kategori_usaha', 'id');
    }
}
