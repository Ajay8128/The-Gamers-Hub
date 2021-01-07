<?php

namespace App\Http\Controllers\Auth;

use Auth;


use App\Http\Controllers\Controller;
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
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');// it shows that inside of this appication u need to use guest middleware
        // every single function here the validator,login etc all th functiions will paas through this middleware excepy the logout one

        //this middleware guest checks whether u r guest(logged out ) or not //if not then u will not access these

        //so if u are logged in as user (when u pass through this) this middleware will not allow u to access the login page and will redirect u 
    }


    public function __logout()
     {
        Auth::logout();
        return redirect('/login');
     }

}
