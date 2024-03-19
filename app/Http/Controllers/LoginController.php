<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Models\MstAuthorization;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function show()
    {
        return view('auth.login');
    }


    public function login(LoginRequest $request)
    {
        $credentials = $request->getCredentials();

        if (!Auth::validate($credentials)) :

            return redirect()->route('login.show')
                ->withErrors(trans('auth.failed'));
        endif;

        $user = Auth::getProvider()->retrieveByCredentials($credentials);

        $userLoggedIn = Auth::login($user);
        if (Auth::user()->user_type == "1") {
            $url = $this->authenticated($request, $user);
        } elseif (Auth::user()->user_type == "2") {
            $url = $this->authenticatedBusiness($request, $user);
        } elseif (Auth::user()->user_type == "") {
            $url=redirect()->route('login.show')
                ->withErrors(trans('auth.failed'));
        }
        //dd(Auth::user()->user_type);

        return $url;
    }

    /**
     * Handle response after user authenticated
     *
     * @param Request $request
     * @param Auth $user
     *
     * @return \Illuminate\Http\Response
     */
    protected function authenticated(Request $request, $user)
    {

        return redirect()->route('dashboard');
    }

    protected function authenticatedBusiness(Request $request, $user)
    {

        return redirect()->route('business-dashboard');
    }
}
