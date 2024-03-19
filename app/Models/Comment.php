<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $table = 'trnpostcomment';
    protected $fillable = [
        'userId',
        'comment',
        'postId'
    ];
    public $timestamps = false;
    public function post()
    {
        return $this->belongsTo(Post::class, 'postId', 'postId');
    }

    public function user()
    {
        return $this->hasOne(MstUser::class, 'userId', 'userId');
    }
}
