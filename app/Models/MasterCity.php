<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;

class MasterCity extends Model
{
    use HasFactory;

    public $table = 'master_cities';

    // protected $primaryKey = 'city_id';

    public $fillable = [
        'province_id',
        'city_name',
        'postal_code',
    ];
    
    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'city_id' => 'integer',
        'province_id' => 'integer',
        'city_name' => 'string',
        'postal_code' => 'string',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        // 'city_id' => 'required',
        'province_id' => 'required',
        'city_name' => 'required',
        'postal_code' => 'required|numeric'
    ];

    public static function boot() {
        parent::boot();

        static::deleting(function($model) { 
            // Address::where('city_id', $model->id)->delete();
            // MasterSubDistrict::where('city_id', $model->id)->delete();
        });
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     **/
    public function master_provinces()
    {
        return $this->hasOne(\App\Models\MasterProvince::class, 'province_id', 'city_id');
    }
}
