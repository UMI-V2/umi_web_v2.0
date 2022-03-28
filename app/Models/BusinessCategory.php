<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusinessCategory extends Model
{
    use HasFactory;

    public $fillable = [
        'id_usaha',
        'id_kategori_usaha',
    ];

    public function category()
    {
        return $this->belongsTo(master_business_category::class,  'id_kategori_usaha','id');
    }

    public function usaha()
    {
        return $this->belongsTo(Business::class,  'id_usaha','id');
    }
}
