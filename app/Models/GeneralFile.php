<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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

    public function getFileAttribute()
    {
        if ($this->attributes['file']) {
            return url('') . Storage::url($this->attributes['file']);
        } else {
            return null;
        }
    }
}
