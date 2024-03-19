<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusinessProduct extends Model
{
    use HasFactory;
    protected $table = 'businessproduct';

    public $timestamps = false;

    protected $fillable = [
        'productId',
        'productName',
        'productPrice',
        'businessId',
        'collectionId',
        'discouintedPrice',
        'isDiscountActive',
        'productdescription',

    ];

    public function order()
    {
        return $this->belongsTo(Order::class, 'productId', 'productId');
    }

    public function business()
    {
        return $this->belongsTo(Business::class, 'businessId', 'businessId');
    }

    public function productImage(){
        return $this->hasOne(BusinessProductImage::class, 'productId', 'productId');     
    }
}
