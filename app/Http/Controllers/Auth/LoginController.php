<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
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
        $this->middleware('guest')->except('logout');
    }

    /**
     * The user has been authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */

    public function redirectTo()
    {
        if (auth()->user()->hasRole('admin')) {
            return '/admin/dashboard';
        }  elseif (auth()->user()->hasRole('instructur')) {
            return '/instructur';
        } elseif (auth()->user()->hasRole('student')) {
           return '/student';
       } elseif (auth()->user()->hasRole('parent')) {
           return '/parent';
       } 
           
        return $this->redirectTo;
    }

    //Memisahkan antar user redirect if authenticated
    // protected function authenticated(Request $request, $user)
    // {
    //     if ($user->hasRole('admin')) {
    //         # code...
    //         return redirect()->route('admin.dashboard.index');
    //     }

    //     return redirect()->route('home');
        
    // }
}
