<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

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
    protected function redirectTo()
    {
        Log::info(Auth::user()->first_name);
        if (Auth::user()->role==1)
            return 'admin/dashboard';

        return '/';
    }
    //protected $redirectTo = '/';



    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    public function logout(){
        Auth::logout();
        return redirect('/');
    }

    public function adminLogin(){
        if(Auth::check() && Auth::user()->role == 1)
            return redirect('admin/dashboard');
        return view('auth.admin-login');
    }
}
