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
    ];
}
