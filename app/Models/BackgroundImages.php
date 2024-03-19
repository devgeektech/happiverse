<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BackgroundImages extends Model
{
    use HasFactory;
    protected $table = 'trnpostBackground';
    public $timestamps = false;
    protected $fillable = [
        'postId',
        'userId',
        'background_images',


    ];

    public function post()
    {
        return $this->belongsTo(Post::class, 'postId', 'postId');
    }
}
