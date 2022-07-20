<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FavoriteProduct extends Model
{
    use HasFactory;

    public $fillable = [
        'id_user',
        'id_product',
    ];

    public function product()
    {
        return $this->belongsTo(\App\Models\Product::class, 'id_product', 'id');
    }
}
