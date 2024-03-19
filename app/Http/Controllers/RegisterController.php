<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\Mail\Otp;
use App\Models\MstAuthorization;
use App\Models\SponsoredAccount;
use App\Models\Plan;
use Illuminate\Contracts\Validation\Validator;
use Session;
use Illuminate\Support\Facades\Mail;
use Stripe;

class RegisterController extends Controller
{
    /**
     * Display register page.
     * 
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('auth.register');
    }
    public function refferCodeView()
    {
        return view('auth.reffer-code');
    }
    public function premiumView()
    {
        return view('auth.premium');
    }
    public function premiumEmailVerify(Request $request){
        
        $email = $request->email;
        
        $generateOneTimeCode = rand(1000, 9999);
        $validate = Validator()->make($request->all(), [
            'email' => 'required|email',
        ], [
            'email.required' => 'Email field is required'
        ]);
        if ($validate->fails()) {
            return back()->withErrors($validate->errors())->withInput();
        } 
        
        $checkEmail = MstAuthorization::where('email', $request->email)->first();

        if (!empty($checkEmail)) {
            return back()->withErrors(['email'=>'Email has been already taken']);
        }
        Mail::to($request->email)->send(new OTP($generateOneTimeCode));
        MstAuthorization::create(['email' => $request->email, 'verificationCode' => $generateOneTimeCode]);

        return redirect()->route('otpPremium', ['email' => $request->email]);    
    }
    public function refferalCode(Request $request)
    {
        $validate = Validator()->make($request->all(), [
            'refferalCode' => 'required',
        ], [
            'refferalCode.required' => 'Refferal code is required',
        ]);
        if ($validate->fails()) {
            return back()->withErrors($validate->errors())->withInput();
        }
        //if SponseredAccount status 1 mean status code is already taken
        $checkRefferCodeIsValid = SponsoredAccount::where('refferalCode', $request->refferalCode)
            ->where('alreadyAccountCreated', 0)
            ->first();
        if (!empty($checkRefferCodeIsValid)) {
            return redirect()->route('email', ['refferCode' => $request->refferalCode]);
        }
        // dd("48");
        
        return back()->withErrors(["refferalCode"=>"No reffer code found"]);
    }

    public function emailView(Request $request)
    {
        $getRefferCode = $request->get('refferCode');
        //in this view we check sponsered account is having reffer code with status 0 and send data to post request form 
        //SponseredAccount status 1 mean status code is already taken
        $getBusinessDetail = SponsoredAccount::where('refferalCode', $getRefferCode)->first();
        if($getBusinessDetail){
            return view('auth.email', compact('getRefferCode'));    
        }else{
            return redirect('/reffer-code');
        }
    }

    public function emailVerify(Request $request)
    {
     
        $getBusinessDetail = SponsoredAccount::where('refferalCode', $request->refferCode)->first();
        // dd($getBusinessDetail->accountType);
        $email = $request->email;
        
        $generateOneTimeCode = rand(1000, 9999);
        $validate = Validator()->make($request->all(), [
            'email' => 'required|email',
        ], [
            'email.required' => 'Email field is required'
        ]);
        if ($validate->fails()) {
            return back()->withErrors($validate->errors())->withInput();
        } 
        $refferCode = $request->get('refferCode');
        $checkEmail = MstAuthorization::where('email', $request->email)->first();
        Mail::to($request->email)->send(new OTP($generateOneTimeCode));
        if (!empty($checkEmail)) {
            return back()->withErrors(['email'=>'Email has been already taken']);
        }
        // $generateOneTimeCode = $this->rand_passwd();
        MstAuthorization::create(['userTypeId' => $getBusinessDetail->accountType,'email' => $request->email, 'verificationCode' => $generateOneTimeCode]);
       // $buinessSponsorAccountUpdate = SponseredAccount::where('refferalCode', $refferCode)->update(['alreadyAccountCreated' => 1]);

        return redirect()->route('otp', ['email' => $request->email, 'refferCode' => $refferCode]);
    }
    function rand_passwd($length = 4, $chars = '0123456789')
    {
        return substr(str_shuffle($chars), 0, $length);
    }

    public function otpView(Request $request)
    {
        $email = $request->get('email');
        $refferCode = $request->get('refferCode');
        //in this view we check sponsered account is having reffer code with status 0 and send data to post request form 
        //SponseredAccount status 1 mean status code is already taken
        //$getBusinessDetail = SponseredAccount::where('refferalCode', $refferCode)->first();
        return view('auth.otp', compact('email', 'refferCode'));
    }
    public function otpPremiumView(Request $request)
    {
        $email = $request->get('email');
        return view('auth.otpPremium', compact('email'));
    }
    public function otpPremiumProccess(Request $request)
    {
        $validate = Validator()->make($request->all(), [
            'otp' => 'required',
        ], [
            'otp.required' => 'OTP is required',
        ]);
        if ($validate->fails()) {
            return back()->withErrors($validate->errors())->withInput();
        }
        $email = $request->get('email');
        $checkEmailOtp = MstAuthorization::where('email',  $email)->where('verificationCode', $request->otp)->first();
        if (empty($checkEmailOtp)) {
            return back()->withErrors(['otp'=>'OTP in not valid']);
        }
        
        return redirect()->route('premiumPlan', ['email' => $email]);
    }
    public function otpProccess(Request $request)
    {
        $validate = Validator()->make($request->all(), [
            'otp' => 'required',
        ], [
            'otp.required' => 'OTP is required',
        ]);
        if ($validate->fails()) {
            return back()->withErrors($validate->errors())->withInput();
        }
        $email = $request->get('email');
        $refferCode = $request->get('refferCode');
        $checkEmailOtp = MstAuthorization::where('email',  $email)->where('verificationCode', $request->otp)->first();
        if (empty($checkEmailOtp)) {
            return back()->withErrors(['otp'=>'OTP in not valid']);
        }

        return redirect()->route('registration', ['email' => $email, 'refferCode' => $refferCode]);
    }
    public function premiumPlanView(Request $request){
        $email = $request->get('email');
        $plans=Plan::where('planType',1)->get();
        $businessPlans=Plan::where('planType',2)->get();
        
        return view('auth.premiumPlan',compact('plans','businessPlans','email'));
    }
    public function planPremiumProccess(Request $request){
        if($request->plans=='business'){
            $plan_id=$request->business_plan_id;
        }else{
            $plan_id=$request->plan_id;
        }
        $plan=$request->plans;
        
        return redirect()->route('stripe.get', ['plan_id' => $plan_id, 'plan' => $plan,'email'=>$request->email]);
    }
    public function stripe(Request $request){
        $email = $request->get('email');
        return view('auth.stripe',compact('email'));
    }
    public function stripePost(Request $request)
    {
        $email=$request->email;
        Stripe\Stripe::setApiKey('sk_test_51MUka3BL7C3orhY46jgSuaE4CM4CKtVwALXhQgHcagjyW2PLl1mv3hEHJ4QZUYXUU3fprPOrCvlSEPJtK48CumrY00bH2PRNry');
        $response=Stripe\Charge::create ([
                "amount" => 100*100,
                "currency" => "USD",
                "source" => $request->stripeToken,
                "description" => "This payment is testing purpose of happiverse",
        ]);
        if($response->status=='succeeded'){
           return redirect()->route('registration',['email' => $email]); 
        }
        // Session::flash('success', 'Payment Successfull!');
           
        return back();
    }
    public function register(RegisterRequest $request)
    {
        $user['name'] = $request->input('username');
        $user = User::create($request->validated());
        auth()->login($user);
        return redirect('/')->with('success', "Account successfully registered.");
    }
}
