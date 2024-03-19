<?php

use App\Http\Controllers\EventsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FCMController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|e
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/clear', function () {
    Artisan::call('cache:clear');
    Artisan::call('config:cache');
    Artisan::call('view:clear');
    return "Cleared!";
});

//Har
Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post');
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');


Route::group(['namespace' => 'App\Http\Controllers'], function () {
    Route::get('/posts', 'HomeController@getPost')->name('posts');

    Route::get('/', 'LoginController@show')->name('login.show');
    Route::post('/login', 'LoginController@login')->name('login.perform');


    Route::get('/user-dashboard', 'HomeController@dashboard')->name('user-dashboard');
    // Route::get('/stripe', 'StripeController@form')->name('stripe');
    // Route::post('/stripe',  'StripeController@postPaymentStripe')->name('stripe.payment');
    Route::get('/successTransaction',  'StripeController@successTransaction')->name('success.transaction');

    // Route::group(['middleware' => ['guest']], function () {
        Route::get('/register', 'RegisterController@show')->name('register.show');
        Route::post('/register', 'RegisterController@register')->name('register.perform');
        Route::get('/premium', 'RegisterController@premiumView')->name('premium');
        Route::post('/premium-email/verify', 'RegisterController@premiumEmailVerify')->name('premium-email.verify');
        Route::get('/otpPremium', 'RegisterController@otpPremiumView')->name('otpPremium');
        Route::post('/otpPremium', 'RegisterController@otpPremiumProccess')->name('otpPremium.process');
        Route::get('/premiumPlan', 'RegisterController@premiumPlanView')->name('premiumPlan');
        Route::post('/planPremium', 'RegisterController@planPremiumProccess')->name('planPremium.process');
        Route::get('stripe', 'RegisterController@stripe')->name('stripe.get');
        Route::post('stripe', 'RegisterController@stripePost')->name('stripe.post');
        Route::get('/reffer-code', 'RegisterController@refferCodeView')->name('reffer-code');
        Route::post('/reffer-code', 'RegisterController@refferalCode')->name('refferal-code.check');
        Route::get('/email', 'RegisterController@emailView')->name('email');
        Route::post('/email/verify', 'RegisterController@emailVerify')->name('email.verify');
        Route::get('/otp', 'RegisterController@otpView')->name('otp');
        Route::post('/otp', 'RegisterController@otpProccess')->name('otp.process');
        Route::get('/registeration', 'UsersController@create')->name('registration');
        Route::post('/registeration', 'UsersController@store')->name('registration.perform');
        Route::get('/plans', 'PlanController@refferalPlansList')->name('plans.refferal-code');
    // });

    Route::group(['middleware' => ['auth']], function () {
        Route::get('/dashboard', 'HomeController@getPost')->name('dashboard');
        // Business urls

        Route::get('/business-dashboard', 'HomeController@businessDashboard')->name('business-dashboard');
        Route::post('add-product', 'BusinessController@addBusinessProduct')->name('add-product');
        Route::get('edit-product', 'BusinessController@editBusinessProduct')->name('edit-product');
        Route::post('update-product', 'BusinessController@updateBusinessProduct')->name('update-product');
        Route::get('delete-product/{pId}', 'BusinessController@deleteBusinessProduct')->name('delete-product');
        Route::get('product-details/{pId}', 'BusinessController@viewBusinessProduct')->name('product-details');
        Route::post('create-story', 'BusinessController@createStory')->name('create-story');
        Route::get('story-detail/{userid}', 'HomeController@storyDetail')->name('story-detail');
        Route::get('business-events', 'EventController@index')->name('business-events');
        Route::get('business-products', 'ProductController@index')->name('business-products');
        Route::post('business-event/store', 'EventController@store')->name('business-event.store');
        Route::get('business-event/edit', 'EventController@edit')->name('edit-business-products');
        Route::post('business-event/update', 'EventController@update')->name('business-event.update');
        Route::get('delete-event/{eId}', 'EventController@deleteBusinessEvent')->name('delete-event');
        Route::get('event-details/{pId}', 'EventController@viewBusinessEvent')->name('event-details');
        Route::get('business-friends', 'FriendController@businessFriends')->name('business-friends');
        Route::get('business-photos', 'BusinessController@businessPhotos')->name('business-photos');
        Route::get('business-videos', 'BusinessController@businessVideos')->name('business-videos');
        Route::get('business-profile', 'BusinessController@businessProfile')->name('business-profile');



        Route::get('/display-image/update/{userId}', 'UsersController@updateProfilePicture')->name('display-image.update');
        Route::post('add-covid', 'HomeController@addCovid')->name('add-covid');
        Route::get('/about', 'HomeController@about')->name('about');
        Route::post('/post', 'PostController@store')->name('post.store');
        Route::get('/like/{id}', 'PostController@postLike')->name('like');

        Route::get('/myposts', 'PostController@index')->name('myposts');
        Route::get('/post/Delete/{postId}', 'PostController@delete')->name('post.delelt');
        Route::get('/photos', 'UsersController@myPhotos')->name('photos');
        Route::get('/videos', 'UsersController@myVideos')->name('videos');
        Route::get('/musics', 'UsersController@myMusics')->name('musics');
        Route::get('/account-settings', 'UsersController@accountSetting')->name('account-settings');
        Route::post('/account-settings/update', 'UsersController@accountSettingUpdate')->name('account-settings.update');
        Route::get('change-password', 'UsersController@changePassword')->name('change-password');
        Route::post('change-password/update', 'UsersController@changePasswordUpdate')->name('change-password.update');
        Route::get('/basic-information', 'UsersController@basicInformationView')->name('basic-information');
        Route::post('/basic-information', 'UsersController@updateBasicInformation')->name('basic-information.update');
        Route::get('/work-information', 'UsersController@workInformationView')->name('work-information');
        Route::post('/work-information/update', 'UsersController@workInformationUpdate')->name('work-information.update');
        Route::get('/education-information', 'UsersController@educationInformationView')->name('education-information');
        Route::post('/education-information/update', 'UsersController@educationInformationUpdate')->name('education-information.update');
        Route::post('/add-comment/{postId}', 'PostController@addComment')->name('add-comment');


        Route::get('friends', 'FriendController@index')->name('friends');
        Route::get('unfriend/{id}', 'FriendController@unfriend')->name('unfriend');
        Route::get('addfriend/{id}', 'FriendController@addfriend')->name('addfriend');

        Route::get('/groups', 'GroupController@index')->name('groups');
        Route::get('/group', 'GroupController@create')->name('group.create');
        Route::post('/group', 'GroupController@store')->name('group.store');
        Route::get('/groups/{id}', 'GroupController@getGroupPostView')->name('groups.show');
        Route::get('/group-post/{id}', 'GroupController@getGroupPost')->name('group-post');
        Route::post('/group/post', 'GroupController@groupPostStore')->name('group.post');
        Route::get('group/delete/{id}', 'GroupController@delete')->name('group.delete');
        Route::get('group/{group-id}/leave', 'GroupController@groupLeave')->name('group.leave');
        Route::get('/add-member/{id}', 'GroupController@addMemberView')->name('add-member');

        Route::post('/add-member/{id}', 'GroupController@addMemberPost')->name('add-member.update');
        Route::get('/group/edit/{id}', 'GroupController@edit')->name('group.edit');
        Route::put('/group/update/{id}', 'GroupController@update')->name('group.update');

        Route::get('/group/{group_id}/accept/{member_id}', 'GroupMemberController@acceptInvitation')->name('group.invitation.accept');
        Route::get('/group/{group_id}/decline/{member_id}', 'GroupMemberController@declineInvitation')->name('group.invitation.decline');
        Route::get('group/{group_id}/member/remove/{member_id}', 'GroupMemberController@memberRemove')->name('member.remove');

        Route::get('orders', 'OrderController@index')->name('orders');
        Route::get('business-orders', 'OrderController@businessOrders')->name('business-orders');
        Route::get('orders/{id}', 'OrderController@show')->name('orders.show');
        Route::post('orderplace/{id}', 'OrderController@orderPlace')->name('orders.place');



        // Route::get('/groups/id', 'GroupController@index')->name('groups');
        Route::get('/search-business', 'BusinessController@searchBusiness')->name('search-business');
        Route::post('/search-business-list', 'BusinessController@searchBusinessList')->name('search-business.list');

        Route::get('/search-people', 'SearchController@searchPeople')->name('search-people');
        Route::post('/search-people', 'SearchController@searchByPeople')->name('search-people.post');
        Route::get('people-profile/{id}', 'SearchController@searchByUserId')->name('people-profile');
        Route::get('people-post/{id}', 'SearchController@peoplePost')->name('people-post');
        Route::get('people-photos/{id}', 'SearchController@peoplePhotos')->name('people-photos');
        Route::get('people-videos/{id}', 'SearchController@peopleVideos')->name('videos-photos');
        Route::get('/movies', 'MoviesController@index')->name('movies.index');
        Route::get('/movies/{id}', 'MoviesController@show')->name('movies.show');
        Route::get('/tv', 'TvController@index')->name('tv.index');
        Route::get('/tv/{id}', 'TvController@show')->name('tv.show');
        Route::get('/actors', 'ActorsController@index')->name('actors.index');
        Route::get('/actors/page/{page?}', 'ActorsController@index');
        Route::get('/actors/{id}', 'ActorsController@show')->name('actors.show');
        Route::get('/logout', 'LogoutController@perform')->name('logout.perform');
        Route::get('/my-profile', 'HomeController@myProfile')->name('my-profile');
        Route::post('saveUserProfile', 'HomeController@saveUserProfile')->name('saveUserProfile');
        Route::get('/friendProfile/{id}', 'HomeController@friendProfile')->name('friend-profile');


        Route::get('/orderDetail/{id}', 'OrderDetailController@index');
        Route::get('/cancel-order/{id}', 'OrderDetailController@cancelOrder');
        Route::get('/searchWeb', 'HomeController@businessSearch');
        Route::get('/searchWebUser', 'HomeController@userSearch');
        Route::get('/view-profile/{id}/{type}', 'HomeController@ViewProfile');
        Route::post('generateSponsor', 'BusinessController@generateSponsor')->name('generate-sponsor');
        Route::post('saveProfile', 'BusinessController@saveProfile')->name('saveProfile');
        Route::post('SaveBussinessImage', 'BusinessController@saveBusinessImage')->name('SaveBussinessImage');
        Route::get('/places', 'BusinessController@placesSearch');
        Route::post('/placesStore', 'BusinessController@placesStore');

        Route::get('product-detail/{pId}', 'ProductController@viewUserProduct')->name('product-detail');
        Route::get('addtocart/{pId}', 'ProductController@addToCart')->name('addtocart');
        Route::post('addtoplaylist', 'UsersController@addtoplaylist')->name('addtoplaylist');
        Route::get('terms-and-conditions', 'CMSController@termsAndConditions')->name('terms-and-conditions');
        Route::get('data-policy', 'CMSController@dataPolicy')->name('data-policy');
        Route::get('privacy-policy', 'CMSController@privacyPolicy')->name('privacy-policy');
        Route::get('about-hapiverse', 'CMSController@aboutSite')->name('about-hapiverse');
        Route::get('calendar', 'CMSController@viewCalendar')->name('calendar');
        Route::get('translate', 'CMSController@translate')->name('translate');
        Route::get('job', 'CMSController@JobView')->name('job');
        Route::post('job-store', 'CMSController@JobStore')->name('job.store');
        Route::get('jobView', 'CMSController@JobFetch')->name('job-fetch');
        Route::get('jobDisplay/{id}', 'CMSController@JobDisplay')->name('JobDisplay');
        Route::get('delete-job/{id}', 'CMSController@DeleteJob')->name('DeleteJob');
        Route::post('update-job/{id}', 'CMSController@UpdateJob')->name('update-Job');
        Route::get('locationTracking', 'CMSController@locationTracking')->name('locationTracking');
        Route::get('locationSharing', 'CMSController@locationSharing')->name('locationSharing');
        Route::get('removeLocation/{id}', 'CMSController@RemoveLocation')->name('removeLocation');
        Route::get('rewardCenter', 'CMSController@rewardCenter')->name('rewardCenter');

        Route::get('/HapiMart', 'MarketPlaceController@index');
        Route::get('/bulletinBoard', 'BulletinBoardController@index');
        Route::post('/addbulletinBoard', 'BulletinBoardController@createBulletinBoard')->name('AddBulletinBoard');
        Route::post('/addbulletinNote', 'BulletinBoardController@createBulletinNote')->name('AddBulletinNote');
        Route::get('/editbulletinNote/{id}', 'BulletinBoardController@editBullitenNotes')->name('EditBulletinNote');
        Route::post('/editNote/{id}', 'BulletinBoardController@editNotes')->name('EditNote');
        Route::get('/bulletinBoardDelete/{id}', 'BulletinBoardController@deleteBulletinBoard')->name('DeleteBulletinBoard');
        Route::get('/bulletinBoardView/{id}/{title}', 'BulletinBoardController@bulletinBoardView')->name('BulletinBoardView');

        Route::get('/interest-delete/{id}', 'InterestController@deleteInterest')->name('DeleteInterest');
        Route::get('/add-interest/{interest}', 'InterestController@addInterest')->name('AddInterest');

      Route::post('/save-token', 'App\Http\Controllers\FCMController@index');

        Route::get('lang/home', 'LangController@index');
        Route::get('lang/change/{id}', 'LangController@change')->name('changeLang');
        Route::get('dynamicModal/{id}',['as'=>'dynamicModal','uses'=> 'ModalController@loadModal']);
        Route::get('postModal/{id}',['as'=>'postModal','uses'=> 'ModalController@loadPostModal']);
        Route::get('messageModal/{id}',['as'=>'messageModal','uses'=> 'ModalController@loadMessageModal']);



        Route::get('/agora-chat', 'App\Http\Controllers\AgoraVideoController@index');
        Route::get('/agora/token', 'App\Http\Controllers\AgoraVideoController@token');
        Route::post('/agora/token', 'App\Http\Controllers\AgoraVideoController@token');
        Route::post('/agora/call-user', 'App\Http\Controllers\AgoraVideoController@callUser');

        Route::get('/video-chat', 'App\Http\Controllers\VideoController@index');
        Route::post('/video/call-user', 'App\Http\Controllers\VideoController@callUser');
        Route::post('/video/accept-call', 'App\Http\Controllers\VideoController@acceptCall');


        Route::post('/dashboard', 'App\Http\Controllers\FCMController@createChat')->name('create-chat');
        Route::get('/delete-chat/{id}', 'App\Http\Controllers\FCMController@delete')->name('delete-chat');
        Route::post('/image-search', 'SearchController@imageSearch');

        Route::get('/chatgpt','ChatGPTController@index' )
        ->name('chatgpt.index');
        Route::post('/chatgpt/ask','ChatGPTController@ask' )
        ->name('chatgpt.ask');
        Route::get('/log', function () {
            return view("user-web.log");
        });

    });
});
