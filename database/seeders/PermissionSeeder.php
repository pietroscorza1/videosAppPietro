<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Primero, limpiar los permisos y roles
        Permission::truncate();
        Role::truncate();

        // Crear permisos
        $superAdminPermission = Permission::create(['name' => 'super_admin']);
        $videoManagerPermission = Permission::create(['name' => 'video_manager']);
        $regularPermission = Permission::create(['name' => 'regular']);

        // Crear roles
        $adminRole = Role::create(['name' => 'admin']);
        $videoManagerRole = Role::create(['name' => 'video_manager']);

        // Asignar permisos a los roles
        $adminRole->givePermissionTo($videoManagerPermission);  // Admin tiene "video_manager"
        $adminRole->givePermissionTo($superAdminPermission);    // Admin tiene "super_admin"

        $videoManagerRole->givePermissionTo($videoManagerPermission);  // Video manager tiene "video_manager"
    }
}
