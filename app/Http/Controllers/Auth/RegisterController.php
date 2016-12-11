<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Sheria\UserActivationLibrary;
use App\Notifications\userAccountActivation;
use Illuminate\Http\Request;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/portal';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(UserActivationLibrary $userActivationLibrary)
    {
        $this->middleware('guest');
        $this->userActivationLibrary = $userActivationLibrary;
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => 'required|max:255',
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'gender' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'username' => $data['username'],
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'gender' => $data['gender'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);

    }
    /**
     * overides register method in Illuminate\Foundation\Auth\RegistersUsers.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
  public function register(Request $request)
    {
        $validator = $this->validator($request->all());
        $user = $this->create($request->all());
        $this->userActivationLibrary->sendActivationMail($user);
        return redirect('/login')->with('activationStatus', true);
    }

}
