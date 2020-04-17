<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Socialite;
use Auth;
use App\UserSetting;
use App\User;

class SocialController extends Controller
{
    public function redirect($provider)
    {
    	return Socialite::driver($provider)->redirect();
    }

    public function Callback($provider){
        $userSocial =   Socialite::driver($provider)->stateless()->user();
        $users       =   User::where(['email' => $userSocial->getEmail()])->first();
if($users){
            Auth::login($users);
            if (!isset($users->profile->schoolId)) {
              return redirect('select_school');
            }else {

              $school = School::firstWhere('id', $users->profile->schoolId);
              return redirect()->to(strtoupper($school->abbr)."/");
            }
        }else{
          $email = $userSocial->getEmail();
          $username = strstr($email, '@', true);

$user = User::create([
                'name'          => $userSocial->getName(),
                'email'         => $userSocial->getEmail(),
                'username'      => $username,
                'image'         => $userSocial->getAvatar(),
                'provider_id'   => $userSocial->getId(),
                'provider'      => $provider,
            ]);
            $user = User::firstWhere('name',$userSocial->getName());
            Auth::login($user, true);
          $this->store_settings($user->id);
         return redirect('select_school');
        }
}

          public function store_settings($user_id)
          {
          $setting       =   UserSetting::where('userId', $user_id)->first();
          if($setting){
          return $setting;
          }
          return  UserSetting::create([
            'userId'  => $user_id,
            'type'  => 'student',
            'privilages'  => 'basic',
            'status'  => 'active',

          ]);
          }


}
