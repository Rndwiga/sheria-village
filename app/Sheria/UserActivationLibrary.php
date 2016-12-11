<?php

namespace App\Sheria;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Notifications\newUserLogin;
use Carbon\Carbon;

class UserActivationLibrary
{
    protected $db; //activatin
    protected $table = 'user_activations';
  /*
    Code for sending email Activation
  */
  /*
    Get the activation token from the activation tb using user_id
  */

  public function getActivation($user)
  {
    return DB::table($this->table)->where('user_id', $user->id)->first();
  }
  public function getActivationByToken($token)
  {
    return DB::table($this->table)->where('token', $token)->first();
  }
  public function deleteActivation($token)
  {
    return DB::table($this->table)->where('token', $token)->delete();
  }
  public function createActivation($user)
  {
    $activation = $this->getActivation($user);
      if (!$activation) {
        return $this->createToken($user);
      }
    return $this->regenerateToken($user);
  }
  protected function getToken()
  {
    return hash_hmac('sha256', str_random(40), config('app.key'));
  }
  private function generateToken($user)
  {
    $token = $this->getToken();
    DB::table($this->table)->where('user_id', $user->id)->update(['token'=> $token]);
    return $token;
  }
  private function regenerateToken($user)
  {
      $token = $this->getToken();
      DB::table($this->table)->where('user_id', $user->id)->update([
          'token' => $token,
          'created_at' => new Carbon()
      ]);
      return $token;
  }
  private function createToken($user)
  {
    $token = $this->getToken();
    DB::table($this->table)->insert([
      'user_id' => $user->id,
      'token' => $token,
    ]);
    return $token;
  }

}
