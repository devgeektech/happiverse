<?php

namespace App\Http\Controllers;

use App\Models\Business;
use App\Models\Friend;
use App\Models\MstAuthorization;
use App\Models\MstUser;
use App\Models\Chats;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Chatify\Facades\ChatifyMessenger as Chatify;


use LaravelFCM\Message\OptionsBuilder;
use LaravelFCM\Message\PayloadDataBuilder;
use LaravelFCM\Message\PayloadNotificationBuilder;
use FCM;

class FCMController extends Controller
{
    public function index(Request $req)
    {
        $input = $req ->all();
       $fcm_token = $input["fcm_token"];
       $user_id = $input["user_id"];
       
      $user = MstUser::where('userId',$user_id)->update([
          "fcm_token"=>$fcm_token,
          ]);
       
    //   $user->fcm_token = $fcm_token;
    //   $user->save();
        // dd($userDetail);
        return response()->json([
            "success",true,
            "message", "User Token Updated Successfully"
            ]);
    }
    
      public function createChat(Request $req){
          
        if(Auth::User()->userTypeId==1){
            $loggedIn = Auth::user()->getUserDetail->userId;    
            $userName=  Auth::user()->getUserDetail->userName;
        }else{
            $loggedIn = Auth::user()->getBusinessDetail->businessId;
            $userName=  Auth::user()->getBusinessDetail->businessName;
        }
        
        $input = $req->all();
        $receiverId = $input["receiverId"];
        $message = $input["message"];
        $this->broadcastMessage($userName, $message);
        
    if (!empty($req->image)) {
            if ($req->hasFile('image')) {
                // $target_dir = "postdoc/";
                // $target_file = "../".$target_dir . basename($_FILES["image"]["name"]);
                $ext = $req->image->extension();
                $file = $req->file('image');
                $fileName = time() . '.' . $req->image->extension();
                $url = $req->image->move('messagedoc', $fileName);
      
               $chat = Chats::create([
                    'sender_id' => $loggedIn,
                    'sender_name' => $userName,
                    'message' => "",
                    'receiverId' => $receiverId ,
                    'image' => 'messagedoc/' . $fileName,
                    ]);
            }
        }
    else{
        $chat = Chats::create([
            'sender_id' => $loggedIn,
            'sender_name' => $userName,
            'message' => $message,
            'receiverId' => $receiverId 
            ]);
   
         Chatify::push("private-chatify.", 'messaging', [
                    'from_id' =>"check",
                    'to_id' => "check",
            
                ]);
    }
        
        return redirect()->back();
    }
    
    private function broadcastMessage($senderName, $message){
        
        $optionBuilder = new OptionsBuilder();
        $optionBuilder->setTimeToLive(60*20);
        
        $notificationBuilder = new PayloadNotificationBuilder('New Message From:', $senderName);
        $notificationBuilder->setBody($message)->setSound('default')
        ->setClickAction("http://127.0.0.1:8000/hapiverse/public/dashboard");
        
        $dataBuilder = new PayloadDataBuilder();
        $dataBuilder->addData([
            'sender_name' => $senderName,
            'message' => $message
            ]);
            
        $option = $optionBuilder->build();
        $notification = $notificationBuilder->build();
        $data = $dataBuilder->build();
        
        $token = MstUser::all()->pluck('fcm_token')->toArray();
        $downstreamResponse = FCM::sendTo($token, $option, $notification, $data);
        return $downstreamResponse->numberSuccess();
    }
    public function delete($chatId){
     
        $chat = Chats::where("id",$chatId)->delete();
        $chats = Chats::all();
        $artilces = "";
        foreach($chats as $chat){
        $artilces .= '    <div class="message-item sent">
                <div class="message">
                    <div class="d-flex gap-2">
                        <img src="{{$url}}" alt="" class="user-img">
                        <div class="text-wrapper">
                            <p class="comment-text">';
        $artilces .=                     $chat->message;
        $artilces .=                     '</p>
                        </div>
                    </div>
                    
                    <div class="dropdown dropstart">
                    <ul class="dropdown-menu">
                       
                       
                        <li><button class="dropdown-item chat_remove" id = "chat_remove" value = "{{$chat->id}}">Remove</button></li>
                      
                    </ul>
                    <button type="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <i class="fas fa-ellipsis-v"></i>
                    </button>
                    
                    </div>
                </div>
                
            </div>';
        }

         return array('chats' => $artilces);

    }

}