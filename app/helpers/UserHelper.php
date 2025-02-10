<?php

namespace App\helpers;

use App\Models\Team;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Gate;

class UserHelper {

    public static function createDefaultUser()
    {
        $user = User::create([
            'name' => config('defaultUsers.user.name'),
            'email' => config('defaultUsers.user.email'),
            'password' => Hash::make(config('defaultUsers.user.password')),
            'super_admin' => true,
        ]);

        self::add_personal_team($user);
        return $user;
    }

    public static function createDefaultProfessor()
    {
        $professor = User::create([
            'name' => config('defaultUsers.professor.name'),
            'email' => config('defaultUsers.professor.email'),
            'password' => Hash::make(config('defaultUsers.professor.password')),
            'super_admin' => true,
        ]);

        self::add_personal_team($professor);
        return $professor;
    }

    public static function add_personal_team($user)
    {
        return Team::forceCreate([
            'user_id' => $user->id,
            'name' => $user->name . "'s Team",
            'personal_team' => true,
        ]);
    }

    public static function create_regular_user(): User {
        $user = User::create([
            'name' => 'Regular User',
            'email' => 'regular@videosapp.com',
            'password' => Hash::make('123456789'),
        ]);

        $role = Role::firstOrCreate(['name' => 'regular']);
        $user->assignRole($role);

        return $user;
    }

    public static function create_video_manager_user(): User {
        $user = User::create([
            'name' => 'Video Manager',
            'email' => 'videosmanager@videosapp.com',
            'password' => Hash::make('123456789'),
        ]);

        $role = Role::firstOrCreate(['name' => 'video manager']);
        $user->assignRole($role);

        return $user;
    }

    public static function create_superadmin_user(): User {
        $user = User::create([
            'name' => 'Super Admin',
            'email' => 'superadmin@videosapp.com',
            'password' => Hash::make('123456789'),
            'super_admin' => true,
        ]);

        $role = Role::firstOrCreate(['name' => 'superadmin']);
        $user->assignRole($role);

        return $user;
    }


}
