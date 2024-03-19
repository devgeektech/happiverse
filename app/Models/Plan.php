<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;
    protected $fillable = [
        'planName',
        'planType',
        'isActive',
        'planPrice',
    ];
    public $timestamps = false;
    
    public function subscriptions()
    {
        return $this->belongsTo(Plan::class, 'planId', 'planId');
    }

    public function planFeature()
    {
        return $this->belongsToMany(PlanFeature::class, 'plan_id', 'planId');

    }
}
