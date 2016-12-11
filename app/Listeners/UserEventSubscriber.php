<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Authenticated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Auth;
use App\Notifications\newUserLogin;
use App\Notifications\userAccountActivation;
use App\Sheria\UserActivationLibrary;
use App\User;

class UserEventSubscriber
{
  private $userActivationLibrary;
  protected $resendAfter = 24;
  public function __construct(UserActivationLibrary $userActivationLibrary)
  {
      $this->userActivationLibrary = $userActivationLibrary;
  }
  /**
   * Handle user login events.
   */
  public function onUserLogin($event) {
    $userData = json_decode($event->user->toJson());
    $user = User::find($userData->id);
    if (!$user->activated) {
      /**
       * Handle user login events.
       * $this->sendActivationMail($event); write logic that asks the user to get actiation link resent
       *$user = Auth::user();
        * //  $user->notify(new newUserLogin());
       */
            auth()->logout();
            return back()->with('activationWarning', true);
        }
        return redirect()->back();
  }

  /**
   * Handle user Attempting events.
   */
  public function onUserAttempting($event) {}

  /**
   * Handle user logout events.
   */
  public function onUserLogout($event) {}

  /**
   * Handle user authenticated events.
   */
  public function onUserAuthenticated($event) {}

  /**
   * Handle user registration events.
   */
  public function onUserRegistered($event) {
    $this->sendActivationMail($event);
  }

  /**
   * Handle user Lockout events.
   */
  public function onUserLockout($event) {}

  /**
   * Register the listeners for the subscriber.
   *
   * @param  Illuminate\Events\Dispatcher  $events
   */
  public function subscribe($events)
  {
      $events->listen(
          'Illuminate\Auth\Events\Login',
          'App\Listeners\UserEventSubscriber@onUserLogin'
      );

      $events->listen(
          'Illuminate\Auth\Events\Logout',
          'App\Listeners\UserEventSubscriber@onUserLogout'
      );
      $events->listen(
          'Illuminate\Auth\Events\Authenticated',
          'App\Listeners\UserEventSubscriber@onUserAuthenticated'
      );
      $events->listen(
          'Illuminate\Auth\Events\Registered',
          'App\Listeners\UserEventSubscriber@onUserRegistered'
      );
      $events->listen(
          'Illuminate\Auth\Events\Lockout',
          'App\Listeners\UserEventSubscriber@onUserLockout'
      );
      $events->listen(
          'Illuminate\Auth\Events\Attempting',
          'App\Listeners\UserEventSubscriber@onUserAttempting'
      );
  }
  private function sendActivationMail($event)
  {
    $userData = json_decode($event->user->toJson());
      /*
        [username] =>
        [first_name] =>
        [last_name] =>
        [gender] =>
        [email] =>
        [updated_at] => 2016-12-11 07:54:15
        [created_at] => 2016-12-11 07:54:15
        [id] => 39
      */
      if ($event->user->activated || !$this->shouldSend($userData)) {
          return;
        }
      $token = $this->userActivationLibrary->createActivation($userData);
      $user = User::find($userData->id);
      $user->notify(new userAccountActivation($token));

  }
  private function shouldSend($userData)
  {
      $activation = $this->userActivationLibrary->getActivation($userData);
      return $activation === null || strtotime($activation->created_at) + 60 * 60 * $this->resendAfter < time();
  }
}
