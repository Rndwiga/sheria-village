<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Authenticated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Notifications\newUserLogin;
use App\Notifications\userAccountActivation;
use App\Sheria\UserActivationLibrary;
use Illuminate\Support\Facades\Session;
use App\User;

class UserEventSubscriber
{
  private $userActivationLibrary;
  protected $resendAfter = 24;
  public function __construct()
  {
  }
  /**
   * Handle user login events.
   */
  public function onUserLogin($event) {
  //  $userData = json_decode($event->user->toJson());
  //  $user = User::find($userData->id);
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
}
