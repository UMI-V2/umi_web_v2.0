<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterCity extends Model
{
    use HasFactory;

    protected $primaryKey = 'city_id';

    public $fillable = [
        'province_id',
        'city_name',
        'postal_code',
    ];
}
