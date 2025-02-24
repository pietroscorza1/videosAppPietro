<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;

class AuthServiceProvider extends ServiceProvider
{

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        $this->define_gates();
    }

    /**
     * Define the authorization gates.
     */
    public function define_gates(): void
    {

        Gate::define('super-admin', function (User $user) {
            return $user->hasRole('super-admin');
        });

        Gate::define('video_manager', function (User $user) {
            return $user->hasRole('video_manager');
        });
    }

}
