<?php
namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\helpers\UserHelper;

class UserTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

       $this->userAdmin = UserHelper::create_superadmin_user();
       $this->userRegular = UserHelper::create_video_manager_user();
    }
    public function test_true_is_true()
    {
        $this->assertTrue(true);
    }
    public function test_user_without_permissions_can_see_default_users_page()
    {
        $response = $this->actingAs($this->userRegular)->get(route('users.index'));
        $response->assertStatus(200);
    }

    public function test_user_with_permissions_can_see_default_users_page()
    {
        $response = $this->actingAs($this->userAdmin)->get(route('users.index'));
        $response->assertStatus(200);
    }

    public function test_not_logged_users_cannot_see_default_users_page()
    {
        $response = $this->get(route('users.manage.index'));
        $response->assertRedirect(route('login'));
    }

    public function test_user_without_permissions_can_see_user_show_page()
    {
        $response = $this->actingAs($this->userRegular)->get(route('users.show', 1));
        $response->assertStatus(200);
    }

    public function test_user_with_permissions_can_see_user_show_page()
    {
        $response = $this->actingAs($this->userAdmin)->get(route('users.index'));
        $response->assertStatus(200);
    }

    public function test_not_logged_users_cannot_see_user_show_page()
    {
        $response = $this->get(route('users.show', 1));
        $response->assertRedirect(route('login'));
    }
}
