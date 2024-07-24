<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
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
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;
    public function authenticated()
    {
        if (Auth::user()->role_as == 'admin') {

            return redirect('/admin/dashboard')->with('status', 'Welcome to Dashboard');
        } elseif (Auth::user()->role_as == 'doctor') {

            return redirect('/doctor/dashboard')->with('status', 'Welcome to Dashboard');
        } elseif (Auth::user()->role_as == 'user') {

            return redirect('/user/appointments')->with('status', 'Logged In Successfully');
        } else {

            return redirect('/')->with('status', 'Logged In Successfully');
        }
    }
}
