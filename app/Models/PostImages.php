<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostImages extends Model
{
    use HasFactory;
    protected $table = 'trnpostfiles';
    public $timestamps = false;
    protected $fillable = [
        'postId',
        'userId',
        'postFileUrl',
        'background_images',


    ];

    public function post()
    {
        return $this->belongsTo(Post::class, 'postId', 'postId');
    }
}
