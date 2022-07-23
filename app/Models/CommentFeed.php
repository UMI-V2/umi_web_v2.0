<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentFeed extends Model
{
    use HasFactory;



    public $fillable = [
        'id_user',
        'id_feed',
        'comment',
    ];
}
