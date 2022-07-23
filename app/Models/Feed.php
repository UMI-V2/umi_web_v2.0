<?php

namespace App\Models;

use App\Models\LikeFeed;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Feed extends Model
{
    use HasFactory, SoftDeletes;

    public $fillable = [
        'id',
        'id_user',
        'description'
    ];
    protected $appends = ['is_my_like', 'total_like', 'total_comment', 'photos', 'user', 'business', 'address'];

    public function getIsMyLikeAttribute()
    {
        return LikeFeed::where('id_feed',$this->id)->where('id_user', $this->id_user)->get()->isNotEmpty();
    }

    public function getTotalLikeAttribute()
    {
        return LikeFeed::where('id_feed',$this->id)->count();
    }

    public function getTotalCommentAttribute()
    {
        return CommentFeed::where('id_feed',$this->id)->count();
    }

    public function getPhotosAttribute()
    {
        return GeneralFile::where('feed_id',$this->id)->get();
    }

    public function getUserAttribute()
    {
        return User::find($this->id_user);
    }

    public function getBusinessAttribute()
    {
        return Business::where('id_user',$this->id_user)->first();
    }

    public function getAddressAttribute()
    {
        return Address::where('id_users',$this->id_user)->where('is_alamat_utama', 1)->first();
    }

}
