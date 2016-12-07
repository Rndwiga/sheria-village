<?php

namespace App\Sheria;

use Illuminate\Support\Facades\Auth;
use App\Notifications\newUserLogin;
/**
 *  Transfer this into a laravel package
 * This class is for sending login notification upon successful login.
 * in the file vendor/laravel/framework/src/Illuminate/Foundation/Auth/AuthenticatesUsers,
 * import < use App\Sheria; >
 * in the method < sendLoginResponse(Request $request) > add
 *
  *      $sheria = new Sheria;
  *      $sheria->sendLoginNotification($request);
 */
class Sheria
{

  function __construct()
  {
    # code...
  }
  public function sendLoginNotification($request)
  {
      $user = Auth::user();
      $user->notify(new newUserLogin($request));
  }
}
