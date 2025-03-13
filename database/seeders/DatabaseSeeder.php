<?php

namespace Database\Seeders;

use App\helpers\UserHelper;
use App\helpers\VideoHelpers;
use App\Models\Multimedia;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\User;
use App\Models\Video;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {


        User::truncate();
        Video::truncate();
        Permission::query()->delete();
        Role::query()->delete();

        $permissions = [
            'super_admin',
            'video_manager',
        ];

        foreach ($permissions as $perm) {
            Permission::firstOrCreate(['name' => $perm, 'guard_name' => 'web']);
        }


        $adminRole = Role::firstOrCreate(['name' => 'super_admin']);
        $videoManagerRole = Role::firstOrCreate(['name' => 'video_manager']);
        $adminRole->givePermissionTo('super_admin');
        $adminRole->givePermissionTo('video_manager');
        $videoManagerRole->givePermissionTo('video_manager');


        $admin = UserHelper::create_superadmin_user();
        if ($admin) {
            $admin->assignRole('super_admin');
        }

        $manager = UserHelper::create_video_manager_user();
        if ($manager) {
            $manager->assignRole('video_manager');
        }
        UserHelper::create_regular_user();

        $id = $manager->id;

        VideoHelpers::createSecondDefaultVideo($id);
        VideoHelpers::createDefaultNoPublishedVideo($id);
        VideoHelpers::createDefaultVideo($id);

    }
}
