<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\PostImages;
use App\Models\BackgroundImages;
use App\Models\PostLike;
use App\Models\Comment;
use App\Models\Notifications;
use Illuminate\Http\Request;
use PHPUnit\Util\Blacklist;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index(Request $request)
    {
        return view('web.post.my-timeline-post');
    }
    public function myPost(Request $request)
    {
        // $loggedInUser = \Auth::user();
        // $userDetail = $loggedInUser->getUserDetail->userId;

        // $results = Post::orderBy('postId')->where('userId',  $userDetail)->paginate(10);
        // $artilces = '';
        // if ($request->ajax()) {
        //     foreach ($results as $result) {

        //         $artilces .= '<div class="card mb-2"> <div class="card-body">'
        //             . $result->postId .
        //             ' <h5 class="card-title">'
        //             . $result->caption .
        //             '</h5> ' . $result->postContentText . '</div></div>';
        //     }
        //     return $artilces;
        // }
        // return view('web.post.my-timeline-post');
    }

    public function store(Request $request)
    {
      
        $user = \Auth::user();
        
        if($user->userTypeId==2){
            $userId = $user->getBusinessDetail->businessId;
        }else{
            $userId = $user->getUserDetail->userId;    
        }
        
        $postType = "text";
        $fileName = '';
       
       
        if (!empty($request->image)) {
         
            if ($request->hasFile('image')) {
                // $target_dir = "postdoc/";
                // $target_file = "../".$target_dir . basename($_FILES["image"]["name"]);
                $ext = $request->image->extension();
                if ($ext == "mp4" || $ext == "MOV") {
                     $postType = "video";
                    }
                else{
                     $postType = "image";
                }

               
                $file = $request->file('image');
               
                $fileName = time() . '.' . $request->image->extension();
              
                $url = $request->image->move('postdoc', $fileName);
                // $url  = $request->image->move(public_path('postdoc'), $fileName);
                $request->background_image = null;
                
                $post = Post::create([
                    'caption' => $request->caption,
                    'postType' => $postType,
                    'userId' => $userId,
                    'privacy' => $request->privacy,
                    'content_type' => 'feeds',
                    'font_color' => '',
                    'text_back_ground' =>$request->text_back_ground,
                    'interest' => '1',
                    'active' => '1',
                    'profileName' => "",
                    'profileImageUrl' => "",
                    'location' => '',
                    'postContentText' => "",
                ]);

                PostImages::create([
                    'postId' => $post->id,
                    'userId' => $userId,
                    'postFileUrl' => 'postdoc/' . $fileName,
                    'background_images' => $request->background_image
                ]);
            }
        }elseif (!empty($request->video)) {
           
                $postType = "video";
                $fileName =$request->video->getClientOriginalName();


                $url = $request->video->move('postdoc', $fileName);
                
                  $post = Post::create([
            'caption' => $request->caption,
            'postType' => $postType,
            'userId' => $userId,
            'privacy' => $request->privacy,
            'content_type' => 'feeds',
            'font_color' => '',
            'text_back_ground' =>$request->text_back_ground,
            'interest' => '1',
            'active' => '1',
            'profileName' => "",
            'profileImageUrl' => "",
            'location' => '',
            'postContentText' => "",
        ]);

                PostImages::create([
                    'postId' => $post->id,
                    'userId' => $userId,
                    'postFileUrl' => 'postdoc/' . $fileName,
                    'background_images' => $request->background_image
                ]);
            
        }
        elseif (!empty($request->background_image)) {
           
            $post = Post::create([
            'caption' => $request->caption,
            'postType' => $postType,
            'userId' => $userId,
            'privacy' => $request->privacy,
            'content_type' => 'feeds',
            'font_color' => '',
            'text_back_ground' =>$request->background_image,
            'interest' => '1',
            'active' => '1',
            'profileName' => "",
            'profileImageUrl' => "",
            'location' => '',
            'postContentText' => "",
        ]);
        }

      else{
       
        $post = Post::create([
            'caption' => $request->caption,
            'postType' => $postType,
            'userId' => $userId,
            'privacy' => $request->privacy,
            'content_type' => 'feeds',
            'font_color' => '',
            'text_back_ground' =>$request->text_back_ground,
            'interest' => '1',
            'active' => '1',
            'profileName' => "",
            'profileImageUrl' => "",
            'location' => '',
            'postContentText' => "",
        ]);

    }
        
        // dd($request->background_image);
     
        return redirect()->back();
        
         return response()->json(['success' => true]);
    }
    public function addComment(Request $request, $postId)
    {
        
        $user = \Auth::user();
        $posts = Post::where('postId',$postId)->get();
        $request->validate([
            'comment'=>"required",
            ]);
        foreach($posts as $post){
            $receiverId = $post->userId;
        }
        if($user->userTypeId==2){
            $userId = $user->getBusinessDetail->businessId;
            $userName = $user->getBusinessDetail->businessName;
        }else{
            $userId = $user->getUserDetail->userId;  
            $userName = $user->getUserDetail->userName; 
        }
         Comment::create([
           
            'userId' =>$userId,
            'comment' => $request->comment,
            'postId' =>  $postId
           
        ]);
         Notifications::create(['senderId' => $userId, 'receiverId' => $receiverId, 'notificationTypeId' => 2,'subject' => $userName , "body" => "commented on  your post","id"=>$postId]);

        return redirect()->back();
    }

    public function postLike($postId)
    {
        $artilces = "";
        $posts = Post::where('postId',$postId)->get();
        foreach($posts as $post){
            $receiverId = $post->userId;
        }
     
         if(Auth::User()->userTypeId==1){
            $loggedIn = Auth::user()->getUserDetail->userId;
            $loggedInName = Auth::user()->getUserDetail->userName;
        
          
        }else{
            $loggedIn = Auth::user()->getBusinessDetail->businessId;
            $loggedInName = Auth::user()->getUserDetail->businessName;
            
        }
        $checkLiked = PostLike::where('userId', $loggedIn)->where('postId', $postId)->first();
        
        
        if (empty($checkLiked)) {
            PostLike::create(['userId' => $loggedIn, 'postId' => $postId, 'likeType' => 1]);
            $output= PostLike::where('postId', $postId)->get();
            foreach ($output as $like) {
                $artilces .= '
                <span class="list-item"><img src="http://127.0.0.1:8000/';
                if(Auth::User()->userTypeId==1){
                //   . $like->user->profileImageUrl??''
                  $artilces .=$like->user->profileImageUrl??'' ; 
                }
                else{
                    $artilces .=$like->business->logoImageUrl??'' ; 
                }
                
                $artilces .= '" alt=""></span>
            ';
            }
            $count = '<b>'.count($output).'</b>';
            Notifications::create(['senderId' => $loggedIn, 'receiverId' => $receiverId, 'notificationTypeId' => 2,'subject' => $loggedInName , "body" => "liked your post","id"=>$postId]);

            return array('status' => 'Success', 'data' => 'liked successfully', 'postlikes' => $count,'image' => $artilces);
        } else {
            PostLike::where('userId', $loggedIn)->where('postId', $postId)->delete();
            $output= PostLike::where('postId', $postId)->get();
            $count = '<b>'.count($output).'</b>';
            Notifications::where('senderId', $loggedIn)->where('receiverId', $receiverId)->where('id', $postId)->delete();
            return array('status' => 'Blank', 'data' => 'unliked successfully', 'postlikes' => $count,'image' => $artilces);
        }
    }
    
    public function delete($postId){
         $post = Post::where('postId', $postId)->delete();
         $post = PostImages::where('postId', $postId)->delete();
        return redirect()->back();
    }
}
