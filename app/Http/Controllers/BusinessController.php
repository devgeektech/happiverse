<?php

namespace App\Http\Controllers;

use App\Models\Business;
use App\Models\BusinessOrder;
use App\Models\BusinessProduct;
use App\Models\BusinessProductImage;
use App\Models\BusinessHour;
use App\Models\SponsoredAccount;
use App\Models\Friend;
use App\Models\Group;
use App\Models\GroupInvites;
use App\Models\Plan;
use App\Models\PlanFeature;
use App\Models\Post;
use App\Models\PostImages;
use App\Models\MstUser;
use Illuminate\Http\Request;
use Stripe\Product;
use Illuminate\Support\Facades\Auth;
use DB;
use Session;

class BusinessController extends Controller
{
    function searchBusiness(Request $request)
    {

        if ($request->ajax()) {
            $output = '';
            $data = Business::where('businessName', 'like', '%' . $request->searchBusiness . '%')
                ->orderBy('businessId', 'desc')
                ->get();
            if ($data) {
                foreach ($data  as $key => $data) {
                    $logoUrl = 'http://127.0.0.1:8000/' . $data->logoImageUrl ?? "";
                    $output .=
                        '<tr>' .
                        '<td><img src="{{' . $logoUrl . '}}" height="20px" width="20px"> 
                            <a href="' . url('business-profile', $data->businessId) . '" >' . $data->businessName . '<a></td>' .
                        '</tr>';
                }
                return Response($output);
            }
        }
    }

    public function searchBusinessList(Request $request)
    {
        $data = Business::where('businessName', 'like', '%' . $request->searchBusiness . '%')
            ->orderBy('businessId', 'desc')
            ->get();
        return view('web.business.business-by-name', compact('data'));
    }

    public function addBusinessProduct(Request $request)
    {
        // $image = $request->aksfileupload;
        // dd($request);
        $loggedIn = \Auth::user()->getBusinessDetail->businessId ?? "";
        $request['businessId'] =  $loggedIn;
        $imageNameArray = array();
        if ($request->hasFile('productImage')) {
            $file = $request->file('productImage');
            // dd($file);
            foreach ($file as $f => $value) {
                $imageNameArray[] = 'product-'.time() .$f. '.' . $value->extension();
                $imageName='product-'.time() .$f. '.' . $value->extension();
                $path = '/home/hapiverse/public_html/business/product';
                $value->move($path, $imageName);
            }
        }
        // dd($imageNameArray);
        $add = BusinessProduct::create([
            'productName' => $request->productName,
            'productPrice' => $request->productPrice,
            'productdescription' => $request->productdescription,
            'businessId' => $loggedIn,

        ]);
        foreach($imageNameArray as $images){
            BusinessProductImage::create([
                'productId' => $add->id,
                'imageUrl' => 'business/product/' . $images
            ]);    
        }
        return redirect()->route('business-products');
    }
    public function editBusinessProduct(Request $request){
        $productId=$request->query('productId');
        $findProduct=BusinessProduct::where('productId',$productId)->first();
        $findProductImage=BusinessProductImage::where('productId',$productId)->first();
        $array=array(
            'productId'=> $productId,
            'productName'=> $findProduct->productName,
            'productPrice'=> $findProduct->productPrice,
            'productdescription'=> $findProduct->productdescription,
            'productImage'=>'http://127.0.0.1:8000/'.$findProductImage->imageUrl,
        );
        
        echo json_encode($array);
    }
    public function updateBusinessProduct(Request $request){
        $update = BusinessProduct::where('productId',$request->productId)->update([
            'productName' => $request->productName,
            'productPrice' => $request->productPrice,
            'productdescription' => $request->productdescription,

        ]);
        return redirect()->route('business-products');
    }
    public function deleteBusinessProduct($pId){
        BusinessProduct::where('productId',$pId)->delete();
        BusinessProductImage::where('productId',$pId)->delete();
        return redirect()->back();
    }
    public function viewBusinessProduct($pId){
        $product=BusinessProduct::where('productId',$pId)->first();
        $businessDetail = \Auth::user()->getBusinessDetail ?? "";
        $productImages=BusinessProductImage::where('productId',$pId)->get();
        return view('business.product.details', compact('product','productImages','businessDetail'));
    }
    public function businessPhotos()
    {
        $loggedIn = \Auth::user()->getBusinessDetail->businessId ?? "";
        // dd($loggedIn);
        $photos = Post::where('userId', $loggedIn)->where('postType', 'image')->get();
        $stories = Post::where('content_type', 'story')->get();
        // dd($stories);
        return view('business.photos', compact('photos', 'stories'));
    }

    public function businessVideos()
    {
        $loggedIn = \Auth::user()->getBusinessDetail->businessId ?? "";
        $photos = Post::where('userId', $loggedIn)->where('postType', 'video')->get();
        $stories = Post::where('content_type', 'story')->get();

        return view('business.videos', compact('photos', 'stories'));
    }
    public function businessOrders()
    {
        $loggedIn = \Auth::user()->getBusinessDetail->businessId ?? "";
        $photos = BusinessOrder::where('businessId', $loggedIn)->get();
        return view('business.orders', compact('photos', 'stories'));
    }

    public function businessProfile()
    {
        $loggedIn = \Auth::user()->getBusinessDetail ?? "";
        $businessHours=BusinessHour::where('businessId',$loggedIn->businessId)->get();
        
        $totalFollowers=$loggedIn->totalFollowers;
        $totalFollowing=$loggedIn->totalFollowing;
        $posts = Post::where('userId', $loggedIn->businessId)->where('content_type', 'feeds')->get();
        $photos = Post::where('userId', $loggedIn->businessId)->where('postType', 'image')->get();
        $videos = Post::where('userId', $loggedIn->businessId)->where('postType', 'video')->get();
        $videos = Post::with('userPostMedia')
            ->where('userId', $loggedIn->businessId)
            ->where('postType', 'video')->get();
        $postVideo = [];
        foreach ($videos as $vid) {
            $postVideo[] = PostImages::where('postId', $vid->postId)->first();
        }

        // $MstAuthorization=Ms
        $getFriendsList = Friend::where('userId', $loggedIn->businessId)->get();
        $groups = Group::with('user', 'groupMembers')
            // ->where('userId', $loggedIn->userId)
            ->where('groupAdminId', $loggedIn->businessId)
            ->get();
        $groupInvites = GroupInvites::where('userId', $loggedIn->businessId)->get();

        $plans = Plan::where('planType', '2')->get();
        $planFeatures = PlanFeature::all();
        $userIntrest = $loggedIn->userIntrests ?? '';
        return view('business.profile', compact('businessHours','loggedIn', 'posts', 'photos', 'videos', 'getFriendsList', 'planFeatures', 'groups', 'plans','totalFollowers','totalFollowing','userIntrest','postVideo','groupInvites'));
    }
    public function generateSponsor(Request $request){
        if($request->plan_type==1){
            $plan_id=$request->plan_id;
        }else{
            $plan_id=$request->business_plan_id;
        }
        
        $refferalCode=$this->random_str(12);
        $accountType=$request->plan_type;
        $businessId=Auth::user()->getBusinessDetail->businessId;
        $planId=$plan_id;
        $sponsor=DB::table('sponseraccountinfo')->insert(
            array(
                "businessId" => $businessId,
                "accountType" => $accountType,
                "planId" => $planId,
                "refferalCode" => $refferalCode,
            )
        );
        if($sponsor){
            echo $refferalCode;
        }
    }
    public function random_str(int $length = 64,string $keyspace = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'): string {
    if ($length < 1) {
        throw new \RangeException("Length must be a positive integer");
    }
    $pieces = [];
    $max = mb_strlen($keyspace, '8bit') - 1;
    for ($i = 0; $i < $length; ++$i) {
        $pieces []= $keyspace[random_int(0, $max)];
    }
        return implode('', $pieces);
    }
    public function createStory(Request $request){
        if($request->postType=='text'){
            $post=Post::create([
                'userId' => (Auth::User()->userTypeId==1) ? Auth::User()->getUserDetail->userId : Auth::user()->getBusinessDetail->businessId,
                'isBusiness' => (Auth::User()->userTypeId==1) ? 0 : 1,
                'caption' => $request->caption,
                'content_type' => $request->content_type,
                'postType' => $request->postType,
                'text_back_ground' => $request->text_back_ground,
                'font_color' => '',
                'interest' => '',
                'active' => 1,
                'profileName' => '',
                'profileImageUrl' => '',
                'location' => '',
                'postContentText' => '',
            ]);    
        }else{
            // dd($request);
            $post=Post::create([
                'userId' => (Auth::User()->userTypeId==1) ? Auth::User()->getUserDetail->userId : Auth::user()->getBusinessDetail->businessId,
                'isBusiness' => (Auth::User()->userTypeId==1) ? 0 : 1,
                'caption' => $request->caption,
                'content_type' => $request->content_type,
                'postType' => $request->postType,
                'text_back_ground' => '',
                'font_color' => '',
                'interest' => '',
                'active' => 1,
                'profileName' => '',
                'profileImageUrl' => '',
                'location' => '',
                'postContentText' => '',
            ]);
            // dd($post);
            $value=$request->file('story_image');
            $imageName='post-'.time().'.' . $value->extension();
            $path = '/home/hapiverse/public_html/postdoc';
            $value->move($path, $imageName);
            $postImages=PostImages::create([
                'postId'=>$post->id,
                'userId'=>(Auth::User()->userTypeId==1) ? Auth::User()->getUserDetail->userId : Auth::user()->getBusinessDetail->businessId,
                'postFileUrl'=>'postdoc/'.$imageName,
            ]);
            // dd('239',$postImages);
        }
        
        return redirect()->back();
        
    }
    
    public function saveProfile(Request $request){
        $businessId=Auth::user()->getBusinessDetail->businessId;
        $businessName=$request->businessName;
        $ownerName=$request->ownerName;
        $businessContact=$request->phone;
        $address=$request->address;
        $latitude=$request->latitude_business;
        $longitude=$request->longitude_business;
        $profile_image=$request->profile_image;
        if(!empty($profile_image)){
            if ($request->hasFile('profile_image')) {
             
                $file = $request->file('profile_image');
                $fileName = time() . '.' . $request->profile_image->extension();
                $url = $request->profile_image->move('../../business', $fileName);
                
                $update=Business::where('businessId',$businessId)->update([
                        'logoImageUrl'=>'business/'.$fileName,
            
                    ]);

            }
        }
        
        
        $update=Business::where('businessId',$businessId)->update([
            'businessName'=>$businessName,
            'ownerName'=>$ownerName,
            'businessContact'=>$businessContact,
            'address'=>$address,
            'latitude'=>number_format((float)$latitude, 7, '.', ''),
            'longitude'=>number_format((float)$longitude, 7, '.', ''),
            'isStealth'=>($request->isStealth!="") ? 1 : 0
        ]);
        return redirect()->back();
    }
    
    public function placesSearch(){
        Session::forget('distance');
        return view('business.places');
    }
    
    public function placesStore(Request $request){
        if($request->distance!=""){
            $distance=$request->distance;
            Session::put('distance',$distance);
            return view('business.places',compact('distance'));
        }
    }
    public function saveBusinessImage(Request $request){
        $businessId=Auth::user()->getBusinessDetail->businessId;
        $profile_image=$request->profile_image;

        if(!empty($profile_image)){
            
            if ($request->hasFile('profile_image')) {
             
                $file = $request->file('profile_image');
                $fileName = time() . '.' . $request->profile_image->extension();
                $url = $request->profile_image->move('../../business', $fileName);
                
                $update=Business::where('businessId',$businessId)->update([
                        'logoImageUrl'=>'business/'.$fileName,
            
                    ]);

            }
        }
        return redirect()->back();
    }
}
