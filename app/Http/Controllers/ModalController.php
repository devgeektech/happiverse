<?php
  
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use App;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Chats;
use Illuminate\Support\Facades\Auth;
  
class ModalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
    */
    public function loadModal($id)
    
{
    $comments = Comment::where('postId',$id)->get();
   
    // $comments = Comment::where(postCommentId,$id)->get();
    // write your process if any
    return view('models.commentModel',compact('comments'));
}
  
      public function loadPostModal($id)
    
{
    $results = Post::where('postId',$id)->get();
    if(Auth::User()->userTypeId==1){
            $loggedIn = Auth::user()->getUserDetail->userId;    
        }else{
            $loggedIn = Auth::user()->getBusinessDetail->businessId;
            $userName=  Auth::user()->getBusinessDetail->businessName;
        }
   
   
    // $comments = Comment::where(postCommentId,$id)->get();
    // write your process if any
    return view('models.postModel',compact('results','loggedIn'));
}

public function loadMessageModel($id)
    
{
    $chats = Chats::all();
   
    // $comments = Comment::where(postCommentId,$id)->get();
    // write your process if any
    return view('models.messageModel',compact('chats'));
}
 

}