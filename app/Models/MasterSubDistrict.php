<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterSubDistrict extends Model
{
    use HasFactory;

    protected $primaryKey = 'subdistrict_id';

    public $fillable = [
        'city_id',
        'subdistrict_name',
    ];

     /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     **/
    public function master_provinces()
    {
        return $this->hasOne(\App\Models\MasterProvince::class, 'province_id', 'subdistrict_id');
    }

     /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     **/
    public function master_cities()
    {
        return $this->hasOne(\App\Models\MasterCity::class, 'city_id', 'subdistrict_id');
    }
}
