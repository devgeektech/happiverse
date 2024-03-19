<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostLike extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $table = 'trnlike';
    protected $fillable = [
        'userId',
        'postId',
        'likeType',
        'date',
    ];

    public function user()
    {
        return $this->belongsTo(MstUser::class, 'userId', 'userId');
    }
    public function business()
    {
        return $this->belongsTo(Business::class, 'businessId', 'userId');
    }
}
