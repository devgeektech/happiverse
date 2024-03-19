<?php

namespace App\Http\Controllers;

use App\Models\Business;
use App\Models\Friend;
use App\Models\MstAuthorization;
use App\Models\MstUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FriendController extends Controller
{
    public function index()
    {
        $users = MstUser::all();
        $businesses = Business::all();
        $loggedIn = \Auth::user()->getUserDetail;
        $getFriendsList = Friend::where('userId', $loggedIn->userId)->get();
        $friendDetail=[];
        $friendNames=[];
        $followeId = [];
        foreach ($getFriendsList as $list) {
            $followeId[] = $list->followerId;
        }
        $checkUserType = MstAuthorization::whereIn('userId', $followeId)->get();
        foreach ($checkUserType as $user) {
            if ($user->userTypeId == 1) {
                $friendDetail[] = MstUser::where('userId', $user->userId)->get();
            } else if ($user->userTypeId == 2) {
                $friendDetail[] = Business::where('businessId', $user->userId)->get();
            }
        }
       
        // dd($userDetail);
        return view('user-web.friends.index', compact('users','getFriendsList', 'friendDetail','loggedIn','friendNames','businesses'));
    }

    public function unFriend($friendId)
    {
    
        if(Auth::User()->userTypeId==1){
            $loggedIn = \Auth::user()->getUserDetail;
            $unfriend = Friend::where('userId', $loggedIn->userId)->where('followerId', $friendId)->delete();    
            return redirect()->route('friends')->withSuccess(__('Unfriend successfully'));
        }else{
            $loggedIn = \Auth::user()->getBusinessDetail;
            $unfriend = Friend::where('userId', $loggedIn->businessId)->where('followerId', $friendId)->delete();
            return redirect()->route('business-friends')->withSuccess(__('Unfriend successfully'));
        }
        
        
    }

    public function businessFriends()
    {
        $loggedIn = \Auth::user()->getBusinessDetail;
        $getFriendsList = Friend::where('userId', $loggedIn->businessId)
            ->get();
        return view('business.friends', compact('getFriendsList'));
    }
    
    public function addfriend(Request $req, $friendId)
    {
        $loggedIn = \Auth::User()->getUserDetail;
       
       
        //dd($friendId);
        Friend::create([
            'userId' =>  $loggedIn->userId,
            'followerId' => $friendId,

        ]);
        return redirect()->back();
        
        
    }
}
