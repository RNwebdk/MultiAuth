<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;

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
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

    // public function redirectTo()
    // {
    //     switch(Auth::user()->role){
    //         case 1:
    //             $this->redirectTo = '/admin';
    //             return $this->redirectTo;
    //             break;
    //         case 2:
    //             $this->redirectTo = '/manager';
    //             return $this->redirectTo;
    //             break;
    //         case 3:
    //             $this->redirectTo = '/user';
    //             return $this->redirectTo;
    //             break;
    //         default:
    //             $this->redirectTo = '/';
    //             return $this->redirectTo;
    //     }
         
    //     // return $next($request);
    // } 

    public function redirectTo()
    {
        $locations = [
            1 => '/admin',
            2 => '/manager',
            3 => '/user'
       ];
       return $locations[Auth::user()->role] ?? '/';
    } 
}
