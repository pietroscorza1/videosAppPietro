<?php
namespace Tests\Unit;

use App\helpers\VideoHelpers;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Config;
use Tests\TestCase;
use App\helpers\UserHelper;

class UserTest extends TestCase
{
use RefreshDatabase;

    public function test_is_super_admin()
    {
        $user = UserHelper::create_superadmin_user();
        $this->assertTrue($user->isSuperAdmin());
    }
    public function test_no_super_admin()
    {
        $user = UserHelper::create_regular_user();
        $this->assertFalse($user->isSuperAdmin());
    }


}



