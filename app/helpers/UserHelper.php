<?php

namespace App\helpers;

use App\Actions\Fortify\PasswordValidationRules;
use App\Models\Team;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class UserHelper {

    public static function createDeaultUser()
    {
        $user = User::create([
                'name' => config('defaultUsers.user.name'),
                'email' => config('defaultUsers.user.email'),
                'password' => Hash::make(config('defaultUsers.user.password')),
                'super_admin' => true,
            ]
        );

        UserHelper::add_personal_team($user);
        return $user;
    }

    public static function createDeaultProfessor()
    {
        $professor = User::create([
            'name' => config('defaultUsers.professor.name'),
            'email' => config('defaultUsers.professor.email'),
            'password' => Hash::make(config('defaultUsers.professor.password')),
            'super_admin' => true,
            ]
        );

        UserHelper::add_personal_team($professor);
        return $professor;

    }
    public static function add_personal_team($user)
    {
        return Team::forceCreate([
            "id" => 1,
            'user_id' => $user->id,
            'name' => $user->name."'s Team",
            'personal_team' => true,
        ]);
    }
    public static function createRegularUser(): User {
        return User::create([
            'name' => 'Regular User',
            'email' => 'regular@videosapp.com',
            'password' => '123456789',
        ]);
    }

    public static function createVideoManagerUser(): User {
        return User::create([
            'name' => 'Video Manager',
            'email' => 'videosmanager@videosapp.com',
            'password' => '123456789',
        ]);
    }
    public static function createSuperadminUser(): User {
        return User::create([
            'name' => 'Super Admin',
            'email' => 'superadmin@videosapp.com',
            'password' => '123456789',
        ]);
    }
}
