<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Laravel\Socialite\Facades\Socialite;

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
    protected $redirectTo = '/home';

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
     * Redirect the user to the GitHub authentication page.
     *
     * @return Response
     */
    public function redirectToProvider()
    {
       // return Socialite::driver('facebook')->redirect();
       return Socialite::driver('facebook')->with(['email'])->redirect();
//        return Socialite::driver('facebook')->scopes([
//            'email'
//        ])->redirect();

    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return Response
     */
    public function handleProviderCallback()
    {


        //$user = Socialite::driver('facebook')->scopes(['email']);
        $facebook_user = Socialite::driver('facebook')->fields([
            'first_name', 'last_name', 'email', 'gender', 'birthday','location'
        ])->user();
        dd($facebook_user);
//       echo $user->getId();
//        echo "<br>";
//      echo  $user->getNickname();
//        echo "<br>";
//       echo $user->getName();
//        echo "<br>";
  //echo  "Email: " .  $facebook_user->getEmail();
//        echo "<br>";
//       $img =  $user->getAvatar();
//        echo '<img src="'.$img.'" alt="sorry">';
//
////
    //    $summer = new User();
//        $summer->name = $user->getName();
//        $summer->email = "example@xyz.com";
//        $summer->password = bcrypt('123');
//        $summer->file = $user->getAvatar();
   //     $summer->save($user);
        //Auth::login($user->getEmail());





    }

}
