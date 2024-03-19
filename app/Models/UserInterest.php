<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserInterest extends Model
{
    use HasFactory;
    protected $table = 'mstuserinterest';
    public $timestamps = false;
    protected $fillable = [
        	"interestSubCategoryId",
        	"userId"
        ];

    public function interest()
    {
        return $this->hasMany(Intrest::class, 'intrestCategoryId', 'interestSubCategoryId');
    }
    public function subinterest()
    {
        return $this->hasMany(SubIntrest::class, 'interestSubCategoryId', 'interestSubCategoryId');
    }
}
