<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Covid extends Model
{
    use HasFactory;
    protected $table = 'covid';

    protected $fillable = [
        'hospitalName',
        'covidStatus',
        'date',
        'userId'
    ];
    public $timestamps = false;

}
