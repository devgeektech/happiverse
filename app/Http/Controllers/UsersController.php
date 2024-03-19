<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Intrest;
use App\Models\MstUser;
use App\Models\Education;
use App\Models\MstAuthorization;
use App\Models\Occupation;
use App\Models\Post;
use App\Models\PostImages;
use App\Models\SponseredAccount;
use App\Models\SponsoredAccount;
use DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Arr;
use stdClass;
use App\Models\Business;
class UsersController extends Controller
{
    public function create(Request $request)
    {
        if($request->refferCode){
            $getBusinessDetail = SponsoredAccount::where('refferalCode', $request->refferCode)->first();    
        }else{
            $getBusinessDetail= new stdClass();
            $getBusinessDetail->accountType= 1;
            // $getBusinessDetail = array('accountType'=>1);
        }
        // dd($getBusinessDetail);
        $email = $request->get('email');
        $refferCode = $request->get('refferCode');
        $intrest = Intrest::all();
        return view('users.add-user', compact('email', 'refferCode', 'intrest','getBusinessDetail'));
    }

     public function store(Request $request)
    {
        
        try {
            $email = $request->email;
            // $accountType = $request->accountType;
            $accountType = 1;
            if($accountType==1){
                
                $validator = Validator::make($request->all(), [
                    'userName' => 'required|string|max:255',
                    'password' => 'required|string|min:6',
                    'confirm_password' => 'required|same:password|min:6',
                    'martialStatus' => 'required',
                    'DOB' => 'required',
                    'religion' => 'required',
                    'gender' => 'required',
                    // 'phoneNo' => 'required',
                    'hairColor' =>  'required',
                    'height' => 'required',
                    'profileImageUrl' => 'image|mimes:png,jpg,jpeg',
                    'education_title' => 'required',
                    'education_level' => 'required',
                    'education_location' => 'required',
                    'education_startDate' => 'required',
                    'education_endDate' => 'required|date',
                    'work_title' => 'required',
                    'work_description' => 'required',
                    'work_location' => 'required',
                    'work_startDate' => 'required',
                    'work_endDate' => 'required|date',
                ]);
                if ($validator->fails()) {
                    dd($request->all());
                    return back()->withErrors($validator->errors())->withInput();
                }
                //check email exist in authorization
                $checkUserExistFirstStep = MstUser::where('email', $request->email)->first();
                if (!empty($checkUserExistFirstStep)) {
                    return back()->withErrors('email already exist');
                }
                
                $length = 10;
                $randomUserIdGenerate = substr(base_convert(uniqid(mt_rand()), 16, 36), 0, $length);
                $imageName = "";
                $fourRandomDigit = mt_rand(1000, 9999);
                if ($request->hasFile('profileImageUrl')) {
                    $file = $request->file('profileImageUrl');
                    $imageName = time() . '.' . $request->profileImageUrl->extension();
                    $url = $request->profileImageUrl->move('userdoc', $imageName, 'public_html');
                    // $imageName->storeAs('userdoc', $imageName, 'public_html');
                    //   $request->file('profileImageUrl')->storeAs('userdoc',  $imageName );
    
                }
                // dd($imageName);
                $flatColor = $request->flatColor ?? 0;
                // dd($flatColor);
                $firstgredientcolor = $request->firstgredientcolor ?? 0;
                $secondgredientcolor = $request->secondgredientcolor ?? 0;
                $stealthtime = $request->stealthtime ?: date('Y-m-d H:i:s', time());
                $city = $request->city ?? 0;
                $country = $request->country ?? 0;
                $postCode = $request->postCode ?? 0;
                $address = $request->address ?? 0;
                $phoneNo = $request->phoneNo ?? 0;
                // dd($request);
                $user = MstUser::create([
                    'userId' => $randomUserIdGenerate,
                    'email' => $email,
                    'userName' => $request->userName,
                    'martialStatus' => $request->martialStatus,
                    'DOB' => $request->DOB,
                    'gender' => $request->gender,
                    'city' =>  $city,
                    'postCode' => $postCode,
                    'country' => $country,
                    'lat' => $request->lat ? $request->lat : '',
                    'long' => $request->long ? $request->long : '',
                    'address' =>   $address,
                    'userTypeId' => $request->userTypeId,
                    'phoneNo' => $phoneNo,
                    'hairColor' => $request->hairColor,
                    'height' => $request->height,
                    'religion' => $request->religion,
                    'password' => bcrypt($request->password),
                    'profileImageUrl' => 'userdoc/'.$imageName,
                    'flatColor' =>  $flatColor,
                    'firstgredientcolor' =>  $firstgredientcolor,
                    'secondgredientcolor' => $secondgredientcolor,
                    'stealthtime' => $stealthtime,
                    // 'userTypeId' => 1
                ]);
                
                $attributes['password'] = bcrypt($request->password);
                $attributes['email'] = $request->email;
                $user = User::create($attributes);
                // \Auth::login($attributes, true);
                $user['token'] = $user->createToken('Hapiverse-Auth')->accessToken;
                $authorization = MstAuthorization::where('email', $request->email)->update([
                    'token' => $user['token'],
                    'userId' => $randomUserIdGenerate,
                    'password' => hash('md5', $request->password),
                    'phoneNo' => $request->phoneNo
    
    
                ]);
                // dd($request);
                // dd($request->education_startDate);
                $education = Education::create([
                    'title' => $request->education_title,
                    'level' => $request->education_level,
                    'location' => $request->education_location,
                    'userId' => $randomUserIdGenerate,
                    'startDate' => $request->education_startDate,
                    'endDate' => $request->education_endDate,
                ]);
                // dd($education);
                $occupation = Occupation::create([
                    'userId' => $randomUserIdGenerate,
                    'title' => $request->work_title,
                    'description' => $request->work_description,
                    'location' => $request->work_location,
                    'startDate' => $request->work_startDate,
                    'endDate' => $request->work_endDate,
                    'current_working' => $request->current_working,
                ]);    
            }else{
                 
                $validator = Validator::make($request->all(), [
                    'userName' => 'required|string|max:255',
                    'ownerName'=> 'required|string|max:255',
                    'password' => 'required|string|min:6',
                    'confirm_password' => 'required|same:password|min:6',
                    
                ]);
                if ($validator->fails()) {
                    return back()->withErrors($validator->errors())->withInput();
                }
            }
            if($request->refferCode!=''){
                    SponsoredAccount::where('refferalCode', $request->refferCode)->update([
                    'alreadyAccountCreated' => 1
                ]);    
            }
            
            Auth::login($user);
            // session()->regenerate();
            if($request->userTypeId==1){
                // dd("User");
                return redirect()->route('dashboard');    
            }else{
                // dd("Business");
                return redirect()->route('business-dashboard');
            }
            
        } catch (\Exception $e) {
            return back()->withErrors($e->getMessage());
        }
    }


    public function show(User $user)
    {
        return view('dashboard.users.show', [
            'user' => $user
        ]);
    }


    public function edit(User $user)
    {
        return view('dashboard.users.edit', [
            'user' => $user,
            'userRole' => $user->roles->pluck('name')->toArray(),
            'roles' => Role::latest()->get()
        ]);
    }


    public function updateBasicInformation(Request $request)
    {
        $userId = $request->userId;
        $data = Arr::except($request->all(), ['userId', '_token']);
        $user = MstUser::where('userId', $userId);
        $user->update($data);
        return redirect()->route('basic-information')
            ->withSuccess(__('Infromation updated successfully.'));
    }


    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('users.index')
            ->withSuccess(__('User deleted successfully.'));
    }

    public function basicInformationView()
    {
        return view('users.basic-information');
    }

    public function workInformationView()
    {
        return view('users.edit-work');
    }

    public function workInformationUpdate(Request $request)
    {

        $userId = $request->userId;
        $data = Arr::except($request->all(), ['userId', '_token']);
        $user = Occupation::where('userId', $userId);
        $user->update($data);
        return redirect()->route('work-information')
            ->withSuccess(__('Work infromation updated successfully.'));
    }

    public function educationInformationUpdate(Request $request)
    {

        $userId = $request->userId;
        $data = Arr::except($request->all(), ['userId', '_token']);
        $user = Education::where('userId', $userId);
        $user->update($data);
        return redirect()->route('work-information')
            ->withSuccess(__('Education infromation updated successfully.'));
    }

    public function educationInformationView()
    {
        return view('users.edit-education');
    }

    public function timeLineNavBar()
    {
    }

    public function myPhotos()
    {
         $results = Post::orderBy('postId', 'DESC')->where('content_type', 'feeds')->get();
         $loggedIn = Auth::user()->getUserDetail?? "";
      
        $photos = Post::with('userPostMedia')->where('userId', $loggedIn->userId)
            ->where('postType', 'image')->where('content_type', 'feeds')->get();
        $postFile = array();
        foreach ($photos as $photo) {
            $postFile[] = PostImages::where('postId', $photo->postId)->first();
        }
        
        // $videos = Post::with('userPostMedia')->where('userId', $userDetail->userId)
        // ->where('postType', 'video')->where('content_type', 'feeds')->get();


        return view('user-web.photos', compact('photos', 'postFile','results','loggedIn'));
    }

    public function myVideos()
    {
        $loggedIn = Auth::user() ?? "";
        $userDetail = $loggedIn->getUserDetail ?? "";
        $videos = Post::with('userPostMedia')
            ->where('userId', $userDetail->userId)
            ->where('postType', 'video')->get();
        $postVideo = [];
        foreach ($videos as $vid) {
            $postVideo[] = PostImages::where('postId', $vid->postId)->first();
        }
        return view('user-web.videos', compact('videos', 'postVideo'));
    }
    public function myMusics()
    {
        
        $client_id = 'ad9393e8e1994b5cb04547eca7e7b368'; 
        $client_secret = 'd5b771386fad4175a1ff6a4baed19859'; 
    
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,            'https://accounts.spotify.com/api/token' );
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1 );
        curl_setopt($ch, CURLOPT_POST,           1 );
        curl_setopt($ch, CURLOPT_POSTFIELDS,     'grant_type=client_credentials' ); 
        curl_setopt($ch, CURLOPT_HTTPHEADER,     array('Authorization: Basic '.base64_encode($client_id.':'.$client_secret))); 
        $result=curl_exec($ch); 
        $result = json_decode($result, true);
        curl_close($ch);    
        $barerToken=$result['access_token'];
        //find spotify data
        $spotifyURL = 'https://api.spotify.com/v1/recommendations?limit=20&market=PL&seed_artists=4NHQUGzhtTLFvgF5SZesLK%2C5FF8xJSW4qUVU8bk79KYLT&seed_genres=classical&seed_tracks=0c6xIDDpzE81m2q797ordA%2C2Q9nA56DKKJhj4cHMbHlAS';
        $authorization = 'Authorization: Bearer '.$barerToken;
    
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json' , $authorization ));
        curl_setopt($ch, CURLOPT_URL, $spotifyURL);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:x.x.x) Gecko/20041107 Firefox/x.x");
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $json = curl_exec($ch);
        //$json = json_decode($json, true);
        curl_close($ch);
        // dd(json_decode($json));
        $postFiles = json_decode($json);
        $tracks=$postFiles->tracks;
        if(Auth::User()->userTypeId==1){
            $userId=Auth::User()->getUserDetail->userId;
        }else{
            $userId=Auth::User()->getBusinessDetail->businessId;
        }
        $playlists=DB::table('mst_music_playlist')->where('userId',$userId)->get();
        
            // dd($tracks);
        return view('users.music', compact('tracks','playlists'));
    }
    public function fileExtenstion($url)
    {
        $n = strrpos($url, '.');
        return ($n === false) ? '' : substr($url, $n + 1);
    }

    public function accountSetting()
    {
        $isPrivate = Auth::user()->getUserDetail->isPrivate;

        return view('users.account-settings', compact('isPrivate'));
    }

    public function accountSettingUpdate(Request $request)
    {

        $loggedIn = Auth::user()->getUserDetail->userId;

        $user = MstUser::where('userId', $loggedIn);

        if ($request->privacy == "on")
            $isPrivate = $user->isPrivate = 1;
        if ($request->privacy == "off")
            $isPrivate = $user->isPrivate = 0;
        $user->update(['isPrivate' => $isPrivate]);
        return view('users.account-settings');
    }
    public function changePassword(Request $request)
    {
        return view('users.change-password');
    }

    public function changePasswordUpdate(Request $request)
    {
        $loggedIn = \Auth::user()->getUserDetail;
        $checkOldPassword = MstAuthorization::where('userId', $loggedIn->userId)->first();
        // dd(md5($request->current_password), $checkOldPassword->password);
        if (md5($request->current_password) !== $checkOldPassword->password) {
            return redirect()->route('change-password')
                ->withErrors(__('old password inncorrect'));
        }
        // dd(md5($request->new_password), md5($request->confirm_password));
        if (md5($request->new_password) !== md5($request->confirm_password)) {
            return redirect()->route('change-password')
                ->withErrors(__('new password anc confirm password does not match'));
        }
        $passwordUpdate = MstAuthorization::where('userId', $loggedIn->userId)->update(['password' => md5($request->new_password)]);

        $updateUserPassword = User::where('email', $loggedIn->email)
            ->update(['password' => bcrypt($request->new_password)]);
        return redirect()->route('change-password')
            ->withSuccess(__('password updated'));
    }

    public function updateProfilePicture($userId)
    {
        dd($userId);
    }
    
    public function addtoplaylist(Request $request){
        $music_id=$request->music_id;
        $music_href=$request->music_href;
        $music_title=$request->music_title;
        if(Auth::User()->userTypeId==1){
            $userId=Auth::User()->getUserDetail->userId;
        }else{
            $userId=Auth::User()->getBusinessDetail->businessId;
        }
        $addedOn=date('Y-m-d h:i:s');
        $status="1";
        $music_image=$request->music_image;
        $alreadyAdded=DB::table('mst_music_playlist')->where('musicId',$music_id)->where('userId',$userId)->first();
        if($music_href!=""){
            if(!$alreadyAdded){
                $addtoplaylist=DB::table('mst_music_playlist')->insert([
                    'userId'=>$userId,
                    'musicId'=>$music_id,
                    'music_title'=>$music_title,
                    'music_src'=>$music_href,
                    'images'=>$music_image,
                    'status'=>$status,
                    'addedOn'=>$addedOn
                ]);
                echo "1";
            }else{
                echo "Already added to playList!";
            }    
        }else{
            echo "Can't add to playlist now!";
        }
    }
}
