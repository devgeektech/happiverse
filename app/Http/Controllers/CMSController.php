<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\LocationTrack;
use App\Models\MstUser;
use App\Models\LocationRequest;
use App\Models\Coins;
use DB;
use Illuminate\Support\Facades\Auth;

class CMSController extends Controller
{
    public function termsAndConditions(){
        return view('business.terms');
    }
    public function dataPolicy(){
        return view('business.data-policy');
    }
    public function privacyPolicy(){
        return view('business.privacy-policy');
    }
    public function aboutSite(){
        return view('business.about-hapiverse');
    }
    public function viewCalendar(Request $request){
        
        if($request->ajax()) {
            $data = Event::select('eventId as id','eventName as title','eventDate as start')
                       ->get();    
            return response()->json($data);
        }
        
        return view('business.calendar');
    }
    
    public function translate(){
        if(Auth::User()->userTypeId==2){
        return view('business.translate');
        }
        else{
           return view('user-web.translate');  
        }
    }
    public function JobView(){
        $loggedIn = \Auth::user()->getBusinessDetail->businessId ?? "";
         $jobs=DB::table('mstjobs')->where('businessId',  $loggedIn)->get();
        return view('business.add-Job',compact('jobs'));
    }
    
    public function JobStore(Request $request){
        $job=DB::table('mstjobs')->insert([
            "businessId"=>Auth::User()->getBusinessDetail->businessId,
            "jobTitle" =>$request->jobTitle,
            "companyName" =>$request->companyName,
            "workplaceType" =>$request->workplaceType,
            "jobLocation" =>$request->jobLocation,
            "jobType" =>$request->jobType,
            "jobDescription" =>$request->jobDescription,
        ]);
        
        return redirect()->route('business-dashboard');
    }
    public function JobFetch(){
        
        if(Auth::User()->userTypeId!=1){
            return redirect()->route('business-dashboard');    
        }else{
            $jobs=DB::table('mstjobs')->get();
            // dd($jobs);
        return view('business.all-jobs',compact('jobs'));    
        }
        
    }
    
    
    public function JobDisplay($id){
        
        
        if(Auth::User()->userTypeId!=1){
            return redirect()->route('business-dashboard');    
        }else{
            $jobs=DB::table('mstjobs')->where('jobId', $id)->get();
        return view('business.job_view',compact('jobs'));    
        }
        
    }
    public function DeleteJob($id){
            $jobs=DB::table('mstjobs')->where('jobId', $id)->delete();
        return redirect()->back();    
     
    }
    public function UpdateJob(Request $request, $id){
            $jobs=DB::table('mstjobs')->where('jobId', $id)->update([
            'jobTitle' => $request->jobTitle,
            'companyName' => $request->companyName,
            'workplaceType' => $request->workplaceType,
            'jobLocation' => $request->jobLocation,
            'jobType' => $request->jobType,
            'jobDiscription' => $request->jobDescription,

        ]);;
        return redirect()->back();    
     
    }
    
    
    public function locationSharing(){
        
        $loggedIn = Auth::user()->getUserDetail->userId;
        $locations = LocationTrack::where("receiverId",$loggedIn)->get();
        
        
       
        $requests = LocationRequest::where("userId",$loggedIn)->get();
        
        if(Auth::User()->userTypeId==2){
        return view('business.translate',compact('locations','requests'));
        }
        else{
           return view('user-web.locationsharing',compact('locations','requests'));  
        }
    }
    public function locationTracking(){
        
        $loggedIn = Auth::user()->getUserDetail->userId;
        $locations = LocationTrack::where("receiverId",$loggedIn)->get();
        
        
       
        $requests = LocationRequest::where("userId",$loggedIn)->get();
        
        if(Auth::User()->userTypeId==2){
        return view('business.translate',compact('locations','requests'));
        }
        else{
           return view('user-web.locationTracking',compact('locations','requests'));  
        }
    }
    
    public function RemoveLocation($recieverId){
     
        $locations = LocationTrack::where("trackLocationId",$recieverId)->delete();
      
       
       return redirect()->back();
    }
    
    public function rewardCenter(){
     $loggedIn = Auth::user()->getUserDetail->userId;
       $coins=Coins::where('userId', $loggedIn)->get();
      return view('user-web.rewardCenter',compact("coins"));  
       
    }
    
    
   
}
