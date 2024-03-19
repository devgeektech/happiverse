<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Friend extends Model
{
   public $timestamps = false;
    use HasFactory;
    protected $table = 'trnfollowerfollowing';
    
     protected $fillable = [
        'userId',
        'followerId'
    ];

    public function friend()
    {
        return $this->belongsTo(MstUser::class, 'followerId', 'userId');
    }

    public function businessFriend()
    {
        return $this->belongsTo(Business::class, 'followerId', 'businessId');
    }

    public function occupation()
    {
        return $this->hasMany(Occupation::class, 'userId', 'userId');
    }

    public function checkFollowers()
    {
        # code...
    }
}
