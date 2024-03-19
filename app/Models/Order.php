<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'businessOrders';
    protected $fillable =[
        'userId',
        'productId',
        'orderNo',
        'businessId',
        'orderCost',
        'shippingCost',
        'shippingAddress',
        'totalAmount',
        ];
    public $timestamps = false;

    public function customer()
    {
        return $this->belongsTo(BusinessUser::class, 'userId', 'userId');
    }

    public function business()
    {
        return $this->belongsTo(Business::class, 'businessId', 'businessId');
    }
    public function product()
    {
        return $this->belongsTo(BusinessProduct::class, 'productId', 'productId');
    }

    public static function orderWithStatusCount($statusKey)
    {
        return self::where('orderStatus',$statusKey)->count();
    }
}
