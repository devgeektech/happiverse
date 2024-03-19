<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $table = 'mstpost';
    protected $fillable = [
        'content_type',
        'caption',
        'postContentText',
        'postType',
        'userId',
        'postId',
        'profileName',
        'privacy',
        'font_color',
        'text_back_ground',
        'interest',
        'active',
        'profileImageUrl',
        'location',
        'postContentText',
        'groupId',
        'isBusiness',

    ];

    public function user()
    {
        return $this->hasOne(MstUser::class, 'userId', 'userId');
    }
    public function business()
    {
        return $this->hasOne(Business::class, 'businessId', 'userId');
    }
    public function comment()
    {
        return $this->hasMany(Comment::class, 'postId', 'postId');
    }

    public function commentCount()
    {
        return $this->comment()->count();
    }

    public function postlike()
    {
        return $this->hasOne(PostLike::class, 'postId', 'postId');
    }

    public function postlikes()
    {
        return $this->hasMany(PostLike::class, 'postId', 'postId');
    }

    public function postLikeCount()
    {
        $this->postlikes()->count();
    }

    public function postImage()
    {
        return $this->hasMany(PostImages::class, 'postId', 'postId');
    }

    public function userPostMedia()
    {
        return $this->hasMany(PostImages::class, 'userId', 'userId');
    }
     public function backgroundImage()
    {
        return $this->hasMany(BackgroundImages::class, 'postId', 'postId');
    }

}
