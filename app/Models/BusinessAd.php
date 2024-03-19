<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusinessAd extends Model
{
    use HasFactory;
    protected $table = 'businessads';

    protected $fillable = [
        'adType',
        'adDescription',
        'adTitle',
        'businessId',
        'adContent',
        'audianceStartAge',
        'audianceEndAge',
        'startDate',
        'endDate',
        'status'
    ];
    public $timestamps = false;

    public function business()
    {
        return $this->belongsTo(Business::class, 'businessId', 'businessId');
    }
}
