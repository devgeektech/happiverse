<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LocationTrack extends Model
{
    use HasFactory;
    protected $table = 'tracklocation';
    
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