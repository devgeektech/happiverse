<?php

namespace App\Http\Controllers;

use App\Models\Friend;
use App\Models\MstUser;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use GuzzleHttp\Client;

class SearchController extends Controller
{
    public function searchByPeople(Request $request)
    {
        $data = MstUser::where('userName', 'like', '%' . $request->searchPeople . '%')

            ->orderBy('userId', 'desc')
            ->get();
        return view('web.search.search-by-people', compact('data'));
    }

    function searchPeople(Request $request)
    {
        $loggedIn = Auth::user()->getUserDetail->userId;
        if ($request->ajax()) {
            $output = '';
            $data = MstUser::where('userId', '!=', $loggedIn)
                ->where('userName', 'like', '%' . $request->searchPeople . '%')
                ->orWhere('address', 'like', '%' . $request->searchPeople . '%')
                ->orderBy('userId', 'desc')
                ->get();

            if ($data) {
                foreach ($data  as $key => $data) {
                    $output .=
                        // '<tr>' .
                            '<div>
                                <img src="http://127.0.0.1:8000/userdoc/' . $data->profileImageUrl . '"height="20px" width="20px"> 
                                <a href="' . url('people-profile', $data->userId) . '" >' . $data->userName . '<a>
                            </div>' ;
                        // '</tr>';
                }
                return Response($output);
            }
        }
    }

    public function searchByUserId($userId)
    {
        try {
            $loggedIn = Auth::user()->getUserDetail->userId ?? '';
            $data = MstUser::where('userId', $userId)
                ->where('userId', '!=', $loggedIn)
                ->orderBy('userId', 'desc')
                ->first();
            $checkIsFriend = Friend::where('userId', $userId)->where('followerId', $loggedIn)->first() ?? ''; //check user searched is follower
            $checkTotalFollowers = '';
            $findUserIsFriend = Friend::where('userId', $loggedIn)->where('followerId', $userId)->first() ?? '';
            $status = '';
            // dd($checkIsFriend, $findUserIsFriend);
            if (isset($checkIsFriend->userId) > 0 || isset($findUserIsFriend) > 0) {
                $status = 'friend';
            } else if (is_null($checkIsFriend->userId) || is_null($findUserIsFriend)) {
                $status = 'follow';
            }
            return view('web.search.search-people-by-id', compact('data', 'status'));
        } catch (\Exception $e) {
            return redirect()->back()->withErrors('something went wrong');
        }
    }

    public function peoplePhotos(Request $request, $userId)
    {
        $data = MstUser::where('userId', $userId)
            ->orderBy('userId', 'desc')
            ->first();

        $postWithImages = Post::with('postImage')->where('userId', $userId)->where('postType', 'image')
            ->orderBy('userId', 'desc')
            ->get();

        return view('web.search.people-photos', compact('postWithImages', 'data'));
    }

    public function peopleVideos(Request $request, $userId)
    {
        $data = MstUser::where('userId', $userId)
            ->orderBy('userId', 'desc')
            ->first();

        $postWithImages = Post::with('postImage')->where('userId', $userId)->where('postType', 'image')
            ->orderBy('userId', 'desc')
            ->get();

        return view('web.search.people-videos', compact('postWithImages', 'data'));
    }

    public function peoplePost(Request $request, $userId)
    {
        $results = Post::where('userId', $userId)->where('content_type', 'feeds')->orderBy('postId', 'DESC')->paginate(10);
        $artilces = '';
        if ($request->ajax()) {
            foreach ($results as $result) {
                $artilces .= '<div class="card mb-2"> 
                <div class="card-body">' . $result->postId . 'serx36tu <h5 class="card-title">' . $result->caption . '</h5> ' . $result->postType . '</div></div>';
            }
            return $artilces;
        }
    }
    
    

public function imageSearch(Request $request)
{
  
    $request->validate(["image"=> "required"]);
    $apiUrl = 'https://app.zenserp.com/api/v2/search';
    $apiKey = '3c207ad0-24c8-11ee-9076-47b28c8377f0'; // Replace with your ZenSERP API key
    $image = $request->file('image');
    $imageUrl = public_path($image->store('images', 'public'));
    // dd($imageUrl);
    // $imageUrl = "http://127.0.0.1:8000/hapiverse/public/images/".$image->store('images', 'public');
  
   $imageUrl = 'https://img.oastatic.com/img2/26768004/900x450r/t.jpg'; // Replace with your image URL
try {
    $client = new Client();

    
        $response = $client->request('GET', $apiUrl, [
            'query' => [
                'q' => 'face',
                'image_url' => $imageUrl
            ],
            'headers' => [
                'apikey' => $apiKey
            ]
        ]);

        $statusCode = $response->getStatusCode();
        $responseData = $response->getBody()->getContents();
        $responseData = json_decode($responseData, true);

        $responseData= $responseData['reverse_image_results'];
        // Handle the API response data
        // ...
        // $responseData = $responseData->json();
    //   return $responseData;
        return view('user-web.image-search', ['responseData' => $responseData]);
    } catch (Exception $e) {
        dd($e);
        // Handle the API request error
        // ...
    }
}

}
