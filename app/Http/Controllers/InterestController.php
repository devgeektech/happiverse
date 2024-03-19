<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Stock;
use App\Models\UserInterest;
use App\Models\Intrest;
use Illuminate\Support\Facades\Auth;
class InterestController extends Controller
{
    //
  


    
    public function deleteInterest(Request $req, $id){
    
        
        $userInterest = UserInterest::where('mstUserInterestId',$id)->delete();
        
    return redirect()->back();
    }
    
    public function addInterest($interest){
   
    $interests = Intrest::where("intrestCategoryTitle",$interest)->get();
    foreach($interests as $interest){
        $interest_id = $interest->intrestCategoryId;
    }

        $userId=Auth::user()->getUserDetail->userId;
        $userInterest = UserInterest::create([
            'interestSubCategoryId'=> $interest_id,
            "userId"=> $userId
            ]);
      
        
    return response($interest_id);
    }
    
 
}