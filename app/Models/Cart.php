<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cart extends Model
{
    use HasFactory;


    public $fillable = [
        'id_user',
        'id_produk',
        'qty',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'id_produk', 'id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }

}
