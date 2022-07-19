<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterBank extends Model
{
    use HasFactory;

    public $fillable = [
        'name',
        'description',
        'cost_admin',
        'logo',
    ];
}
