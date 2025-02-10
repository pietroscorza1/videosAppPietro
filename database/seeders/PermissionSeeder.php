<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::truncate();

        Permission::create(['name' => 'super_admin']);
        Permission::create(['name' => 'video_manager']);
        Permission::create(['name' => 'regular']);
    }
}
