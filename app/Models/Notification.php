<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;
    //type = [specific, all]
    //category = [general, order ]
    public $fillable = [
        'id_item',
        'id_user_destination',
        'type',
        'category',
        'title',
        'sort_message',
        'full_message',
        'image',
        'is_read',
    ];
}
