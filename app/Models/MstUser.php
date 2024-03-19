<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Passport\HasApiTokens;

class MstUser extends Model
{
    use HasFactory, HasApiTokens;
    protected $table = 'mstuser';
    protected $fillable = [
        'name',
        'email',
        'password',
        'userName',
        'DOB',
        'martialStatus',
        'gender',
        'city',
        'postCode',
        'country',
        'lat',
        'long',
        'address',
        'userTypeId',
        'password',
        'phoneNo',
        'userId',
        'password',
        'profileImageUrl',
        'hairColor',
        'height',
        'religion',
        'flatColor',
        'firstgredientcolor',
        'secondgredientcolor',
        'stealthtime', 'isPrivate',
        'fcm_token'

    ];
    public $timestamps = false;

    public function education()
    {
        return $this->hasMany(Education::class, 'userId', 'userId');
    }

    public function occupation()
    {
        return $this->hasMany(Occupation::class, 'userId', 'userId');
    }

    public function userIntrests()
    {
        return $this->hasMany(UserInterest::class, 'userId', 'userId');
    }
    

    public function posts()
    {
        return $this->hasMany(Post::class, 'userId', 'userId');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'userId', 'userId');
    }

    public function postImages()
    {
        return $this->hasMany(PostImages::class, 'userId', 'userId');
    }

    public function covid()
    {
        return $this->hasOne(Covid::class, 'userId', 'userId');
    }
}
