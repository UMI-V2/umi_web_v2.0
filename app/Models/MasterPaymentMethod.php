<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="MasterPaymentMethod",
 *      required={"nama_metode_pembayaran", "deskripsi_metode_pembayaran"},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="nama_metode_pembayaran",
 *          description="nama_metode_pembayaran",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="deskripsi_metode_pembayaran",
 *          description="deskripsi_metode_pembayaran",
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
class MasterPaymentMethod extends Model
{

    use HasFactory, SoftDeletes;

    public $table = 'master_payment_methods';




    public $fillable = [
        'nama_metode_pembayaran',
        'deskripsi_metode_pembayaran'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nama_metode_pembayaran' => 'string',
        'deskripsi_metode_pembayaran' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nama_metode_pembayaran' => 'required',
        'deskripsi_metode_pembayaran' => 'required'
    ];

    public static function boot()
    {
        parent::boot();

        static::deleting(function ($model) {
            // BusinessPaymentMethod::where('id_metode_pembayaran', $model->id)->delete();
        });
    }
}
