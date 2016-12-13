<?php
/*
* This service provider will be used for auto generating data used in the whole application
* Its registered in the Config\app.php provider array
* Output: model data
*/
namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;

class sheriaServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
      // Using Closure based composers...
      View::composer('auth.login', function ($view) {
          //$user = Auth::user();
          $view->with('user', Auth::user());
        //  return $user;
      });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
