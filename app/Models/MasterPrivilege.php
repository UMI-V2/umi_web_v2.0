<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="MasterPrivilege",
 *      required={"nama_hak_akses_pengguna"},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="nama_hak_akses_pengguna",
 *          description="nama_hak_akses_pengguna",
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
class MasterPrivilege extends Model
{

    use HasFactory, SoftDeletes;

    public $table = 'master_privileges';    



    public $fillable = [
        'nama_hak_akses_pengguna'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nama_hak_akses_pengguna' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nama_hak_akses_pengguna' => 'required'
    ];

    public static function boot() {
        parent::boot();

        static::deleting(function($model) { 
           
        });
    }
}
