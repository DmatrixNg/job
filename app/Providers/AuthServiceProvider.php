<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('admin', function ($user) {

          // dump($user);
            return \App\UserSetting::where('userId',auth()->user()->id)->first()->privilages === 'admin';

      });
        Gate::define('dispatcher', function ($user) {
          return \App\UserSetting::where('userId',auth()->user()->id)->first()->privilages === 'dispatcher';
      });
    }
}
