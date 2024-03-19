<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notifications extends Model
{
    use HasFactory;
    protected $table = 'mstnotification';
     protected $fillable = [
        'senderId',
        'receiverId',
        'subject',
        'notificationTypeId',
        'body',
        'id'
    ];
    public $timestamps = false;
    public function sender()
    {
        return $this->hasOne(MstUser::class, 'userId', 'senderId');
    }
    public function business()
    {
        return $this->hasOne(Business::class, 'businessId', 'senderId');
    }
    
    
}