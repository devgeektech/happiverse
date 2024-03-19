<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BulletinNotes extends Model
{
    use HasFactory;
    protected $table = 'bullitennotes';
    public $timestamps = false;
    protected $fillable = [
        'bullitenId',
        'userId',
        'title',
        'body',
    ];

    public function post()
    {
        return $this->belongsTo(Post::class, 'postId', 'postId');
    }
}