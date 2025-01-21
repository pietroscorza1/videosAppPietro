<?php

namespace Database\Seeders;

use App\Models\User;
use App\helpers\UserHelper;
use App\helpers\VideoHelpers;

use App\Models\Video;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Config;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Video::truncate();
        User::truncate();

        (new UserHelper)->createDefaultUsers([
            'name' => Config::get('defaultusers.user.name'),
            'email' => Config::get('defaultusers.user.email'),
            'password' => Config::get('defaultusers.user.password'),
        ]);

        VideoHelpers::createDefaultVideo();

        User::factory(10)->withPersonalTeam()->create();
        Video::factory(10)->create();

    }
}
