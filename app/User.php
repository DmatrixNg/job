<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use NotificationChannels\WebPush\HasPushSubscriptions;

class User extends Authenticatable
{
    use Notifiable;
    use HasPushSubscriptions;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
     protected $fillable = [
       'name', 'email', 'age',
'address', 'password','status',
     ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];



    public function business()
      {
          return $this->hasMany('App\Vendor', 'userId');
      }
      public function orders()
        {
            return $this->hasMany('App\Order', 'userId');
        }
      public function setting()
        {
            return $this->hasOne('App\UserSetting', 'userId');
        }
      public function responds()
        {
            return $this->hasMany('App\Respond', 'userId');
        }
      public function wallet()
        {
            return $this->hasMany('App\Wallet', 'userId');
        }


}
