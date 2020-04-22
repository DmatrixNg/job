<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Auth;
use App\UserSetting;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    protected function redirectTo()
    {
      if (auth()->user()->setting->type == 'administrator') {
        return '/admin';
      }
      if (auth()->user()->setting->type == 'dispatcher') {
        return '/dispatcher';
      }
      return '/home';
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->middleware('guest');
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'age' => ['required', 'date'],
            'address' => ['required', 'string'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
      // dd($data['role']);
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'age' => $data['age'],
            'address' => $data['address'],
            'password' => Hash::make($data['password']),
        ]);
        if (isset($data['role'])) {
            $setting = array(
              'userId' => $user->id,
              'type' => 'administrator',
              'privilages' => $data['role'],
              'status' => 'active',
            );
          $setting = $this->settings($setting);
          if ($setting) {
            return $user;
          }

        }
        else {

          $setting = array(
            'userId' => $user->id,
            'type' => 'guest',
            'privilages' => "buyers",
            'status' => 'active',
          );
        $setting = $this->settings($setting);
        if ($setting) {
          return $user;
        }

        }
        return $user;
    }
    public function settings($setting)
    {
        return UserSetting::create($setting);
    }
}
