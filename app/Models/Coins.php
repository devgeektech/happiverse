<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coins extends Model
{
    use HasFactory;
    protected $table = 'usercoins';
    
    public $timestamps = false;
    
     public function getUserDetail()
    {
        return $this->hasOne(MstUser::class, 'userId', 'userId');
    }
    public function getBusinessDetail()
    {
        return $this->hasOne(Business::class, 'businessId', 'businessId');
    }

    
    
    
    
}