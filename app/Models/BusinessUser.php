<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusinessUser extends Model
{
    use HasFactory;
    protected $table = 'mstuser';

    protected $fillable = [
        'email',
        'userName',
        'DOB',
        'gender',
        'martialStatus',
        'city',
        'postCode',
        'phoneNo',
        'address',
        'country',
        'profileImageUrl',
        'userId',
        'lat',
        'lng',
        'userTypeId',
        'stealthtime',
        'userId'
    ];

    public function order()
    {
        return $this->belongsTo(Order::class, 'userId', 'userId');
    }

    public function post()
    {
        return $this->hasMany(Post::class, 'userId', 'userId');
    } 

    public function comment()
    {
        return $this->hasMany(Comment::class, 'userId', 'userId');
    }



   
}
