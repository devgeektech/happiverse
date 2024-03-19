<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MstAuthorization extends Model
{
    use HasFactory;
    protected $table = 'mstauthorization';
    protected $fillable = [
        'userTypeId',
        'email',
        'verificationCode',
        'password'
    ];
    public $timestamps = false;

}
