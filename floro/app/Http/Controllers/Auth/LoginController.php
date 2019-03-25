<?php

namespace App\Http\Controllers\Auth;
use Carbon\Carbon ;

use Illuminate\Http\Request;
use App\AuthenticationLogs;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use User;

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
    protected $redirectTo = '/users';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    function authenticated(Request $request,$user)
    {
        $userLogin=auth()->id();
        $user->find($userLogin)->update([
            'last_login_at' => Carbon::now()->toDateTimeString(),
            'last_logout_at' => Carbon::now()->toDateTimeString(),
            'login_ip' => $request->getClientIp(),
            'http_user_agent' => $request->server('HTTP_USER_AGENT'),
            ]);
        AuthenticationLogs::insert([
        'user_id'=>auth()->id(),
        'login_time' => Carbon::now()->toDateTimeString(),
        'logout_time' => Carbon::now()->toDateTimeString(),
        'ip_address' => $request->getClientIp(),
        'browser_agent'=> $request->server('HTTP_USER_AGENT'),
    
        ]);
    }
}
