<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use App\Models\PlanFeature;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    public function refferalPlansList()
    {
        $refferalPlans = Plan::where('planType', 2)->get();
        $planFeatures = PlanFeature::all();
     
        return view('plan.refferal-plans', compact('refferalPlans','planFeatures'));
    }
}
