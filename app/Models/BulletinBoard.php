<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BulletinBoard extends Model
{
    use HasFactory;
    protected $table = 'bullitenboard';
    public $timestamps = false;
    protected $fillable = [
         'businessId',
        'title',
        'body',


    ];

}