<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlanFeature extends Model
{
    use HasFactory;
    protected $table = 'plan_features';
    public $timestamps = false;

    public function plan()
    {
        return $this->belongsTo(Plan::class,  'plan_id', 'planId');
    }
}
