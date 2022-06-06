<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductDiscount extends Model
{
    use HasFactory;

    //     id_product
    // id_discount

    public $fillable = [
        'id_product',
        'id_discount',
        'harga_diskon',
        'batas_pembelian',
    ];

    public function discount()
    {
        return $this->belongsTo(\App\Models\Discount::class, 'id_discount', 'id');
    }

    public function product()
    {
        return $this->belongsTo(\App\Models\Product::class, 'id_product', 'id');
    }

    public function business()
    {
        return $this->belongsTo(\App\Models\Business::class, 'id_usaha', 'id');
    }
}
