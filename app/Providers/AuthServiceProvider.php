<?php

namespace App\Providers;

use App\Models\Customer;
use App\Models\UserInfo;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('get-user', function ($user) {
            return $user->info->role == UserInfo::ROLE['admin'];
        });

        Gate::define('create-user', function ($user) {
            return $user->info->role == UserInfo::ROLE['admin'];
        });

        Gate::define('update-user', function ($user){
            return $user->info->role == UserInfo::ROLE['admin'];
        });

        Gate::define('delete-user', function ($user) {
            return $user->info->role == UserInfo::ROLE['admin'];
        });
    }
}
