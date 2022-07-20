<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeneralFile extends Model
{
    use HasFactory;


    public $fillable = [
        'news_id',
        'announcement_id',
        'events_id',
        'feed_id',
        'file',
        'is_video',
        'is_photo',
    ];
}
