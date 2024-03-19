<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    use HasFactory;
    protected $table = 'mstbusiness';
    public $timestamps = false;

    protected $fillable = [
        'businessName',
        'email',
        'ownerName',
        'vatNumber',
        'address',
        'city',
        'country',
        'businessContact',
        'categoryId',
        'isActive',
        'isAlwaysOpen',
        'businessType',
        'businessId',
        'latitude',
        'longitude',
        'logoImageUrl',
        'featureImageUrl',
        'isStealth'
    ];

    public function event()
    {
        return  $this->hasMany(Event::class, 'businessId', 'businessId');
    }

    public function workingHours()
    {
        return  $this->hasMany(BusinessHour::class, 'businessId', 'businessId');
    }
    public function order()
    {
        return $this->belongsTo(Order::class, 'businessId', 'businessId');
    }

    public function businessAd()
    {
        return $this->belongsTo(BusinessAd::class, 'adId', 'adId');
    }

    public function businessProduct()
    {
        return $this->hasMany(BusinessProduct::class, 'businessId', 'businessId');
    }

    public function rating()
    {
        return $this->hasMany(Rating::class, 'businessId', 'businessId');
    }
        public function userIntrests()
    {
        return $this->hasMany(UserInterest::class, 'userId', 'businessId');
    }
}
