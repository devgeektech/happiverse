<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\GroupInvites;
use App\Models\GroupMember;
use App\Models\MstUser;
use App\Models\Post;
use App\Models\PostImages;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
class GroupController extends Controller
{
    public function index()
    {
        if(Auth::user()->userTypeId==1){
            $loggedIn = \Auth::user()->getUserDetail->userId;
        }else{
            $loggedIn = \Auth::user()->getBusinessDetail->businessId;
            
        }
        $getGroupsList = Group::with('user', 'groupMembers')->where('groupAdminId', $loggedIn)->get();
        // dd($getGroupsList);
        $groupInvites = GroupInvites::where('userId', $loggedIn)->get();
        
        foreach($groupInvites as $invite){
            $invites = MstUser::where('userId',$invite->inviterId)->get();
        }
        
       if(empty($invites)){
           $invites = "";
       }
        

        return view('user-web.groups.index', compact('getGroupsList','invites'));
    }
    public function getGroupPostView($groupId)
    {
        $group = Group::where('groupId', $groupId)
            ->orderBy('groupId', 'DESC')
            ->first();
      
       $photos = Post::with('userPostMedia')->where('groupId',  $groupId)->where('postType', 'image')->where('content_type', 'group')->get();
    
        $postFile = array();
        foreach ($photos as $photo) {
            $postFile[] = PostImages::where('postId', $photo->postId)->first();
        }
        $videos = Post::with('userPostMedia')
            ->where('groupId',  $groupId)
            ->where('postType', 'video')->get();
        $postVideo = [];
        foreach ($videos as $vid) {
            $postVideo[] = PostImages::where('postId', $vid->postId)->first();
        }
        $results = Post::where('groupId', $groupId)
            ->where('content_type', 'group')->orderBy('postId', 'DESC')
            ->paginate(10);
         
        return view('web.groups.group-post', compact('group', 'groupId','results','photos','videos','postFile','postVideo'));
    }

    public function getGroupPost(Request $request, $groupId)
    {
        $results = Post::where('groupId', $groupId)
            ->where('content_type', 'group')->orderBy('postId', 'DESC')
            ->paginate(10);
        $artilces = '';
        if ($request->ajax()) {
            foreach ($results as $result) {

                $artilces .= '
                <div class="card post-card">
                    <div class="card-header">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="info-wrapper">
                                <img src="';
                $artilces .= asset('userdoc/' . $result->user->profileImageUrl);
                $artilces .= '" class="profil-pic">
                <h3 class="title">';
                $artilces .= $result->user->userName;
                $artilces .= '</h3>
                </div>
                <a href=""><img src="';
                $artilces .= asset('libraries/images/svg/more-light.svg');
                $artilces .= '" alt=""></a>
                </div>
                </div>
                <div class="card-body">';
                $artilces .=  $result->caption;

                $artilces .= '<div class="post-slider">';
                foreach ($result->postImage as $image) {
                    $fileName = $image->postFileUrl;
                    $fileNameParts = explode('.', $fileName);
                    $ext = end($fileNameParts);
                    if ($ext == "jpg" || $ext == "png" || $ext == "webp" || $ext == "jpeg") {
                        $artilces .= ' <div>
                        <img src="';
                        $artilces .= asset($image->postFileUrl);
                        $artilces .= '" class="card-img">
                    </div>';
                    }
                    if ($ext == "mp4" || $ext == "MOV") {
                        $artilces .= ' <div>
                        <video src="';
                        $artilces .= asset($image->postFileUrl);
                        $artilces .= '" class="card-img" controls> </video> 
                    </div>';
                    }
                }
                $artilces .= '</div>
                </div>
                <div class="card-footer">
                    <div class="action-center">
                        <input type="text" class="form-control" placeholder="Add Comment Here">
                        <ul class="icons-wrapper">
                            <li class="list-item">
                                <a class="heart" href="">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="19.673" height="17.215" viewBox="0 0 19.673 17.215">
                                        <g id="heart-light" transform="translate(0.001 -2)">
                                            <path id="heartPath" data-name="Path 146" d="M9.4,19.031a.614.614,0,0,0,.875,0l7.865-7.969A5.328,5.328,0,0,0,14.424,2c-2.8,0-4.086,2.058-4.587,2.443C9.334,4.057,8.056,2,5.25,2a5.326,5.326,0,0,0-3.714,9.062Z" transform="translate(0 0)" fill="#a4b6e1" />
                                        </g>
                                    </svg>
                                    <span>20</span>
                                </a>
                            </li>
                            <li class="list-item">
                                <a href="">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20.906" height="17.215" viewBox="0 0 20.906 17.215">
                                        <g id="comment-light" transform="translate(0 -0.5)">
                                            <path id="Path_147" data-name="Path 147" d="M16.619.5H4.287A4.292,4.292,0,0,0,0,4.787v6.622a4.218,4.218,0,0,0,3.033,4.055L5.1,17.535a.612.612,0,0,0,.866,0l1.9-1.9h8.749a4.292,4.292,0,0,0,4.287-4.287V4.787A4.292,4.292,0,0,0,16.619.5Zm3.062,10.848a3.066,3.066,0,0,1-3.062,3.062h-9a.613.613,0,0,0-.433.179L5.537,16.236,3.784,14.483a.612.612,0,0,0-.285-.161,3,3,0,0,1-2.274-2.913V4.787A3.066,3.066,0,0,1,4.287,1.725H16.619a3.066,3.066,0,0,1,3.062,3.062Zm0,0" fill="#a4b6e1" />
                                            <path id="Path_148" data-name="Path 148" d="M154.148,144.328H146.37a.612.612,0,1,0,0,1.225h7.778a.612.612,0,1,0,0-1.225Zm0,0" transform="translate(-139.806 -137.955)" fill="#a4b6e1" />
                                            <path id="Path_149" data-name="Path 149" d="M154.148,197.352H146.37a.612.612,0,1,0,0,1.225h7.778a.612.612,0,1,0,0-1.225Zm0,0" transform="translate(-139.806 -188.814)" fill="#a4b6e1" />
                                        </g>
                                    </svg>
                                    <span>102</span>
                                </a>
                            </li>
                            <li class="list-item">
                                <a href="">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="17.214" height="17.215" viewBox="0 0 17.214 17.215">
                                        <g id="share.light" transform="translate(-0.013)">
                                            <path id="Path_150" data-name="Path 150" d="M17.034.407A1.016,1.016,0,0,0,16.181,0a1.717,1.717,0,0,0-.541.1L1,4.975a1.364,1.364,0,0,0-.956.945A1.364,1.364,0,0,0,.476,7.193.5.5,0,0,0,.6,7.285l6.164,3.177,3.177,6.164a.5.5,0,0,0,.092.126,1.433,1.433,0,0,0,1.01.463h0a1.307,1.307,0,0,0,1.208-.987l4.88-14.64a1.289,1.289,0,0,0-.1-1.181ZM1.025,6.152c.019-.082.132-.166.294-.22L15.215,1.3,7.044,9.471l-5.9-3.042a.362.362,0,0,1-.116-.277ZM11.3,15.909c-.048.144-.139.3-.251.3a.424.424,0,0,1-.246-.12l-3.042-5.9,8.171-8.171Z" transform="translate(0)" fill="#A4B6E1" />
                                        </g>
                                    </svg>
                                </a>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
        ';
                // $artilces .= $result->postId;
                // 'serx36tu <h5 class="card-title">' . $result->caption . '</h5> ' . $result->postType . '</div></div>';
            }
            return $artilces;
        }
    }

    public function groupPostStore(Request $request)
    {
    
        $user = \Auth::user();
        $userId = $user->getUserDetail->userId;
        $postType = "text";
        $fileName = '';
        $groupId = $request->groupId;
         
        if (!empty($request->image)) {
            if ($request->hasFile('image')) {
                $ext = $request->image->extension();
                if ($ext == "mp4" || $ext == "MOV") {
                     $postType = "video";
                    }
                else{
                     $postType = "image";
                }
                $file = $request->file('image');
                $fileName = time() . '.' . $request->image->extension();
                $url = $request->image->move('../../groupdoc', $fileName);
            }
            $post = Post::create([
            'caption' => $request->caption,
            'postType' => $postType,
            'userId' => $userId,
            'privacy' => '???? public',
            'content_type' => 'group',
            'font_color' => '',
            'text_back_ground' => '',
            'interest' => '1',
            'active' => '1',
            'profileName' => "",
            'profileImageUrl' => "",
            'location' => '',
            'postContentText' => "",
            'groupId' => $groupId,
        ]);
            PostImages::create([
            'postId' => $post->id,
            'userId' => $userId,
            'postFileUrl' => 'groupdoc/' . $fileName
        ]);
        }

        elseif (!empty($request->video)) {
            if ($request->hasFile('video')) {
                $postType = "video";
                $file = $request->file('video');
                $fileName = time() . '.' . $request->video->extension();
                $url = $request->video->move('../../groupdoc', $fileName);
            }
            $post = Post::create([
            'caption' => $request->caption,
            'postType' => $postType,
            'userId' => $userId,
            'privacy' => '???? public',
            'content_type' => 'group',
            'font_color' => '',
            'text_back_ground' => '',
            'interest' => '1',
            'active' => '1',
            'profileName' => "",
            'profileImageUrl' => "",
            'location' => '',
            'postContentText' => "",
            'groupId' => $groupId,
        ]);
            PostImages::create([
            'postId' => $post->id,
            'userId' => $userId,
            'postFileUrl' => 'groupdoc/' . $fileName
        ]);
        
        }
        else{
        $post = Post::create([
            'caption' => $request->caption,
            'postType' => $postType,
            'userId' => $userId,
            'privacy' => '???? public',
            'content_type' => 'group',
            'font_color' => '',
            'text_back_ground' => '',
            'interest' => '1',
            'active' => '1',
            'profileName' => "",
            'profileImageUrl' => "",
            'location' => '',
            'postContentText' => "",
            'groupId' => $groupId,
        ]);
        }
        // dd($groupId, $request->caption);
       
        
        return redirect()->back();
    }

    public function create()
    {
        if(Auth::user()->userTypeId==1){
            $loggedIn = \Auth::user()->getUserDetail;
            $groups = Group::where('groupAdminId', $loggedIn->userId)->get();
            $users = MstUser::where('userId', '!=', $loggedIn->userId)->get();
        }else{
            $loggedIn = \Auth::user()->getBusinessDetail;
            $groups = Group::where('groupAdminId', $loggedIn->businessId)->get();
            $users = MstUser::where('userId', '!=', $loggedIn->businessId)->get();
        }
        
        return view('web.groups.create', compact('groups', 'users'));
    }

    public function store(Request $request)
    {
        // dd($request);
        $fileName = '';
        if(Auth::user()->userTypeId==1){
            $addedBy=Auth::user()->getUserDetail->userId;
        }else{
            $addedBy=Auth::user()->getBusinessDetail->businessId;
        }
        if (!empty($request->groupImageUrl)) {
            if ($request->hasFile('groupImageUrl')) {
                $postType = "image";
                $file = $request->file('groupImageUrl');
                $fileName = time() . '.' . $request->groupImageUrl->extension();
                $url = $request->groupImageUrl->move('../../groupdoc', $fileName, 'public');
            }
        }
        $group = Group::create([
            'groupName' => $request->groupName,
            'groupDescription' => $request->groupDescription,
            'groupAdminId' => $addedBy,
            'groupPrivacy' => $request->groupPrivacy,
            'groupImageUrl' => 'groupdoc/' . $fileName
        ]);

        $userType = '';
        foreach ($request->groupMemberId as $member) {
            if ($addedBy == $member) {
                $userType = 'Admin';
            } else {
                $userType = 'Member';
            }
            
            GroupMember::create([
                'groupMemberId' => $member,
                'groupId' => $group->id,
                'addedById' => $addedBy,
                'memberRole' => $userType,
                'memberStatus' => 1

            ]);
        }
        return redirect()->route('groups')
            ->withSuccess(__('Group created successfully'));
    }

    public function delete($groupId)
    {

        $group = Group::where('groupId', $groupId)->delete();
        // $groupMembers = GroupMember::where('groupId', $groupId)->get()->delete();
        // $groupInvites = GroupInvites::where('groupId', $groupId)->get()->delete();

        // $groupPost = Post::where('groupId', $groupId)->get();

        // $postIds = $groupPost->pluck('postId');
        // $groupMembers = PostImages::whereIn('postId', $postIds)->get()->delete();
        // $groupPost->delete();

        //    $groupInvites='';
        //     foreach ($groupPost as $post) {
        //         $post->delete();
        //         $post->postImage->delete();

        //     }

        return redirect()->route('groups')
            ->withSuccess(__('Group deleted success fully'));

        // $user->delete();

    }

    public function addMemberView($groupId)
    {
        $group = Group::where('groupId', $groupId)->first();
        $loggedIn = \Auth::user()->getUserDetail;
        $groupMember = GroupMember::where('groupId', $groupId)->get()->pluck('groupMemberId');
        $userList = MstUser::whereNotIn('userId', $groupMember)->where('userId', '!=', $loggedIn->userId)->get();
        return view('web.groups.add-member', compact('userList', 'group', 'groupId'));
    }

    public function addMemberPost(Request $request, $groupId)
    {
        foreach ($request->memberId as $member) {
            GroupMember::create(['groupMemberId' => $member, 'groupId' => $groupId, 'memberRole' => 'Member', 'memberStatus' => 1]);
        }
        return redirect()->to('/groups')->withSuccess(__('Group member added successfully'));
    }

    public function edit($groupId)
    {
        $group = Group::where('groupId', $groupId)->first();

        return view('web.groups.edit', compact('group', 'groupId'));
    }
    public function update(Request $request, $groupId)
    {
        $data = Arr::except($request->all(), ['_method', '_token']);
        $group = Group::where('groupId', $groupId);
        $group->update($data);
        return redirect()->to('/group/edit/' . $groupId)->withSuccess(__('Group information updated successfully'));
    }

    public function groupMemberRemove($memberId)
    {
    }
}
