<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusinessProductImage extends Model
{
    use HasFactory;
    protected $table = 'businessproductimages';
    protected $fillable = [
        'productId',
        'imageUrl',
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
        'featureImageUrl'
    ];

    public $timestamps = false;

    
    public function business()
    {
        return $this->belongsTo(Business::class, 'productId', 'productId');
    }

}
