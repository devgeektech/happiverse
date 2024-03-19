<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChoosedPlan extends Model
{
    use HasFactory;
    protected $table = 'choosedplan';
    public function plan()
    {
        return $this->hasOne(Plan::class, 'planId', 'planId');
    }
}
