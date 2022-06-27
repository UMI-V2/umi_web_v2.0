<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MasterSubDistrict extends Model
{
    use HasFactory;

    protected $primaryKey = 'subdistrict_id';

    public $fillable = [
        'city_id',
        'subdistrict_name',
    ];
    public static function boot()
    {
        parent::boot();

        static::deleting(function ($model) {
            // Address::where('subdistrict_id', $model->id)->delete();
            
        });
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function master_provinces()
    {
        return $this->belongsTo(\App\Models\MasterProvince::class, 'province_id', 'subdistrict_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function master_cities()
    {
        return $this->belongsTo(\App\Models\MasterCity::class, 'city_id', 'subdistrict_id');
    }
}
