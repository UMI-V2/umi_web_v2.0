<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterSubDistrict extends Model
{
    use HasFactory;

    protected $primaryKey = 'subdistrict_id';

    public $fillable = [
        'city_id',
        'subdistrict_name',
    ];
}
