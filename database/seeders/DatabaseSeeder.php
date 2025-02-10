<?php

namespace Database\Seeders;

use App\helpers\UserHelper;
use App\Models\User;
use App\Models\Video;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::truncate();
        Video::truncate();
        Permission::truncate();


        Video::factory(10)->create();


        Permission::create(['name' => 'super_admin']);
        Permission::create(['name' => 'video_manager']);

        $admin = UserHelper::create_superadmin_user();
        $admin->assignRole('super_admin');

        $manager = UserHelper::create_video_manager_user();
        $manager->assignRole('video_manager');

        UserHelper::create_regular_user();

    }

}
