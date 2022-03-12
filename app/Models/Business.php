<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Business extends Model
{
    use HasFactory, SoftDeletes;

    public $fillable = [
        'id_user',
        'nama',
        'id_status',
        'deskripsi',
        'is_ambil_di_toko',
    ];

    public function category()
    {
        return $this->belongsTo(master_business_category::class,  'id_kategori_usaha','id');
    }

}
