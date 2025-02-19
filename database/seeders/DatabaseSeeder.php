<?php

use App\helpers\UserHelper;
use App\Models\User;
use App\Models\Video;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::truncate();
        Video::truncate();
        Permission::truncate();
        Role::truncate();

        Video::factory(10)->create();

        Permission::create(['name' => 'super_admin']);
        Permission::create(['name' => 'video_manager']);

        $roleSuperAdmin = Role::create(['name' => 'super_admin']);
        $roleVideoManager = Role::create(['name' => 'video_manager']);

        $admin = UserHelper::create_superadmin_user();
        $admin->assignRole($roleSuperAdmin);

        $manager = UserHelper::create_video_manager_user();
        $manager->assignRole($roleVideoManager);

        UserHelper::create_regular_user();
    }
}

