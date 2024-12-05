<?php
namespace Tests\Unit;

use App\Models\Team;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Config;
use Tests\TestCase;
use App\helpers\UserHelper;

class HelpersTest extends TestCase
{
use RefreshDatabase;

public function test_can_create_default_user()
{

        $user = (new UserHelper)->createDefaultUsers([
        'name' => Config::get('defaultusers.user.name'),
        'email' => Config::get('defaultusers.user.email'),
        'password' => Config::get('defaultusers.user.password'),
    ]);

    $this->assertEquals(Config::get('defaultusers.user.name'), $user->name);
    $this->assertEquals(Config::get('defaultusers.user.email'), $user->email);
    $this->assertTrue(\Hash::check(Config::get('defaultusers.user.password'), $user->password));
    $this->assertCount(1, $user->ownedTeams);
}

public function test_can_create_default_professor_user()
    {

    $user = (new UserHelper)->createDefaultUsers([
        'name' => Config::get('defaultusers.professor.name'),
        'email' => Config::get('defaultusers.professor.email'),
        'password' => Config::get('defaultusers.professor.password'),
    ]);

    $this->assertEquals(Config::get('defaultusers.professor.name'), $user->name);
    $this->assertEquals(Config::get('defaultusers.professor.email'), $user->email);
    $this->assertTrue(\Hash::check(Config::get('defaultusers.professor.password'), $user->password));
    $this->assertCount(1, $user->ownedTeams);
    }
}
