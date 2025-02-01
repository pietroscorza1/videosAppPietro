<?php

namespace Database\Seeders;

use App\Models\User;
use App\helpers\UserHelper;
use App\helpers\VideoHelpers;

use App\Models\Video;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Gate;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Video::truncate();
        User::truncate();

        UserHelper::createSuperadminUser();
        UserHelper::createRegularUser();
        UserHelper::createVideoManagerUser();


        VideoHelpers::createDefaultVideo();

        User::factory(10)->withPersonalTeam()->create();
        Video::factory(10)->create();

    }
    /**
     * Define gates and permissions.
     */
    protected function defineGatesAndPermissions(): void
    {
        Gate::define('super-admin', function ($user) {
            return $user->isSuperAdmin();
        });

        Gate::define('manage-videos', function ($user) {
            return $user->hasRole('video-manager');
        });

        Gate::define('view-reports', function ($user) {
            return $user->hasRole('regular-user');
        });
    }
}
