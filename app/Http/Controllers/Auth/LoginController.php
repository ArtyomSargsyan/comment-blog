<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    //protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    public function redirectTo()
    {
        if(Auth::user()->is_admin == '1') //1 = Admin Login
        {

            return 'admin';
        }
        elseif(Auth::user()->role_as == '0') // Normal or Default User Login
        {

            return 'pages';
        }
    }

    protected function authenticated()
    {
        if(Auth::user()->role_as == '1') //1 = Admin Login
        {

            return redirect('admins')->with('status','Welcome to your dashboard');
        }
        elseif(Auth::user()->role_as == '0') // Normal or Default User Login
        {

            return redirect('pages')->with('status','Logged in successfully');
        }
    }
}
