<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterCity extends Model
{
    use HasFactory;

    // province_id
    // city_name
    // postal_code

    public $fillable = [
        'province_id',
        'city_name',
        'postal_code',
    ];
}
