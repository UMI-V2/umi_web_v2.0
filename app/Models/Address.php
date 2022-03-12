<?php

namespace App\Models;

use App\Models\MasterCity;
use App\Models\master_province;
use App\Models\MasterSubDistrict;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Address extends Model
{
    use HasFactory;

    public $fillable = [
        'id_user',
        'id_master_address_type',
        'nama',
        'no_hp',
        'id_provinsi',
        'id_kota',
        'id_kecamatan',
        'alamat_lengkap',
        'patokan',
        'is_alamat_utama',
        'latitude',
        'longitude'
    ];

    public function province()
    {
        return $this->hasOne(master_province::class, 'province_id', 'id_provinsi');
    }

    public function city()
    {
        return $this->hasOne(MasterCity::class, 'city_id', 'id_kota');
    }
    public function subDistrict()
    {
        return $this->hasOne(MasterSubDistrict::class, 'subdistrict_id', 'id_kecamatan');
    }
}
