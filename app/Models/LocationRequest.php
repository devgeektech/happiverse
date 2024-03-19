<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LocationRequest extends Model
{
    use HasFactory;
    protected $table = 'locationrequest';
    
    public $timestamps = false;
    
    public function getUserDetail()
    {
        return $this->hasOne(MstUser::class, 'userId', 'userId');
    }
    public function getBusinessDetail()
    {
        return $this->hasOne(Business::class, 'businessId', 'userId');
    }
}