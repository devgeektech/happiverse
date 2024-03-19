<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe;
use Session;
use Validator;

class StripeController extends Controller
{
    public function form()
    {
        return view('stripe.stripe');
    }
    public function postPaymentStripe(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'card_no' => 'required',
            'ccExpiryMonth' => 'required',
            'ccExpiryYear' => 'required',
            'cvvNumber' => 'required',
            'cardHolderName' => 'required',

        ]);
        if ($validator->fails()) {
            return response(['status' => 'Error', 'message' => 'required fields are missing', 'error' => $validator->errors()->all()], 422);
        }

        $stripe = Stripe\Stripe::setApiKey('sk_test_51LXnxoB5Y8vfZbFaNSoGoMr36waN9Ofh7bML66J2hooS9i92m0p4Th9mbpqldUVqGGM6XCYXcNBa1EKuLJMLEqTH00v0cSIlNS');
        $response = \Stripe\Token::create(array(
            "card" => array(
                "number"    => $request->input('card_no'),
                "exp_month" => $request->input('ccExpiryMonth'),
                "exp_year"  => $request->input('ccExpiryYear'),
                "cvc"       => $request->input('cvvNumber'),

            )
        ));
        $charge = \Stripe\Charge::create([
            'card' => $response['id'],
            'currency' => 'USD',
            'amount' => 20 * 100,

        ]);

        if ($charge['status'] == 'succeeded') {
            if ($charge['status'] == 'succeeded') {
                return redirect()->to('/successTransaction');
            } else {
                return back()->withErrors("fail");
            }
        }
    }

    public function successTransaction()
    {
        return view('stripe.success-transaction');
    }
}
