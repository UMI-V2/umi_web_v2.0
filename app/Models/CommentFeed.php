<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CommentFeed extends Model
{
    use HasFactory, SoftDeletes;

    public $fillable = [
        'id_user',
        'id_feed',
        'comment',
    ];

    protected $appends = ['user'];
    public function getUserAttribute()
    {
        return User::find($this->id_user);
    }
}
