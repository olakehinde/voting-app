<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Socialite;
use App\User;
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
    protected $redirectTo = '/categories';

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
     * Redirect the user to the Facebook authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Obtain the user information from Facebook.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback()
    {
        $userFbDetails = Socialite::driver('facebook')->user();
        
        $user = User::where('email', $userFbDetails->user['email'])->first();

        if ($user) {
            if (Auth::loginUsingId($user->id)) {
                return redirect()->route('categories.index');
            }
        }
        
        $userSignUp = User::create([
            'name'=> $userFbDetails->user['name'],
            'email'=> $userFbDetails->user['email'],
            'password' => bcrypt('Passw0rd123'),
            'avatar' => $userFbDetails->avatar,
        ]);

        if ($userSignUp) {
            if (Auth::loginUsingId($userSignUp->id)) {
                return redirect()->route('categories.index');
            }
        }
    }
}
