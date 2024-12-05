<?php

namespace App\helpers;

use App\Actions\Fortify\PasswordValidationRules;
use App\Models\Team;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class UserHelper {
    use PasswordValidationRules;

    public function createDefaultUsers(array $user): User {
        {
            Validator::make($user, [
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|string|min:8',
            ])->validate();

            return DB::transaction(function () use ($user) {
                return tap(User::create([
                    'name' => $user['name'],
                    'email' => $user['email'],
                    'password' => Hash::make($user['password']),
                ]), function (User $user) {
                    $this->createTeam($user);
                });
            });
        }
    }
    protected function createTeam(User $user): void
    {
        $user->ownedTeams()->save(Team::forceCreate([
            'user_id' => $user->id,
            'name' => explode(' ', $user->name, 2)[0]."'s Team",
            'personal_team' => true,
        ]));
    }
}
