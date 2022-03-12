<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterSubDistrict extends Model
{
    use HasFactory;

    public $fillable = [
        'subdistrict_id',
        'city_id',
        'subdistrict_name',
    ];
}
