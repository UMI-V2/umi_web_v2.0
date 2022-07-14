<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AddressDelivery extends Model
{
    use HasFactory, SoftDeletes;

    public $fillable = [
        'id_transaksi_penjualan',
        'province_id',
        'city_id',
        'subdistrict_id',
        'nama',
        'no_hp',
        'alamat_lengkap',
        'patokan',
        'is_alamat_utama',
        'is_rumah',
        'is_kantor',
        'is_usaha',
        'latitude',
        'longitude',
        // 
    ];

    protected $casts = [
        'id' => 'integer',
        'id_transaksi_penjualan' => 'integer',
        'province_id' => 'integer',
        'city_id' => 'integer',
        'subdistrict_id' => 'integer',
        'nama' => 'string',
        'no_hp' => 'string',
        'alamat_lengkap' => 'string',
        'patokan' => 'string',
        'is_alamat_utama' => 'boolean',
        'is_rumah' => 'boolean',
        'is_kantor' => 'boolean',
        'is_usaha' => 'boolean',
        'latitude' => 'string',
        'longitude' => 'string'
    ];
}
