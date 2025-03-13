<?php

namespace Tests\Feature\Videos\VideosTest;

use App\helpers\UserHelper;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Spatie\Permission\Models\Permission;
use Tests\TestCase;

class UsersManageControllerTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->userAdmin = UserHelper::create_superadmin_user();
        Permission::findOrCreate('super_admin');
        $this->userAdmin->givePermissionTo('super_admin');
        $this->userManager = UserHelper::create_regular_user();
        $this->userRegular = UserHelper::create_video_manager_user();
    }

    private function loginAsSuperAdmin()
    {
        $this->actingAs($this->userAdmin);
    }

    private function loginAsVideoManager()
    {
        $this->actingAs($this->userRegular);
    }

    private function loginAsRegularUser()
    {
        $this->actingAs($this->userManager);
    }

    public function test_user_with_permissions_can_see_add_users()
    {
        $this->loginAsSuperAdmin();
        $response = $this->get(route('users.manage.create'));
        $response->assertStatus(200);
    }

    public function test_user_without_users_manage_create_cannot_see_add_users()
    {
        $this->loginAsVideoManager();
        $response = $this->get(route('users.manage.create'));
        $response->assertForbidden();
    }

    public function test_user_with_permissions_can_store_users()
    {
        $this->loginAsSuperAdmin();
        $response = $this->post(route('users.manage.store'), []);
        $response->assertStatus(302);
    }

    public function test_user_without_permissions_cannot_store_users()
    {
        $this->loginAsRegularUser();
        $response = $this->post(route('users.manage.store'), []);
        $response->assertForbidden();
    }

    public function test_user_with_permissions_can_destroy_users()
    {
        $this->loginAsSuperAdmin();
        $response = $this->delete(route('users.manage.destroy', ['id' => 1]));
        $response->assertStatus(302);
    }

    public function test_user_without_permissions_cannot_destroy_users()
    {
        $this->loginAsRegularUser();
        $response = $this->delete(route('users.manage.destroy', ['id' => 1]));
        $response->assertForbidden();
    }

    public function test_user_with_permissions_can_see_edit_users()
    {
        $this->loginAsSuperAdmin();
        $response = $this->get(route('users.manage.edit', ['id' => 1]));
        $response->assertStatus(200);
    }

    public function test_user_without_permissions_cannot_see_edit_users()
    {
        $this->loginAsRegularUser();
        $response = $this->get(route('users.manage.edit', ['id' => 1]));
        $response->assertForbidden();
    }

    public function test_user_with_permissions_can_update_users()
    {
        $this->loginAsSuperAdmin();
        $response = $this->put(route('users.manage.update', ['id' => 1]), []);
        $response->assertStatus(302);
    }

    public function test_user_without_permissions_cannot_update_users()
    {
        $this->loginAsRegularUser();
        $response = $this->put(route('users.manage.update', ['id' => 1]), []);
        $response->assertForbidden();
    }

    public function test_user_with_permissions_can_manage_users()
    {
        $this->loginAsSuperAdmin();
        $response = $this->get(route('users.manage.create'));
        $response->assertStatus(200);
    }

    public function test_regular_users_cannot_manage_users()
    {
        $this->loginAsRegularUser();
        $response = $this->get(route('users.manage.create'));
        $response->assertForbidden();
    }

    public function test_guest_users_cannot_manage_users()
    {
        $response = $this->get(route('users.manage.create'));
        $response->assertRedirect(route('login'));
    }

    public function test_superadmins_can_manage_users()
    {
        $this->loginAsSuperAdmin();
        $response = $this->get(route('users.manage.create'));
        $response->assertStatus(200);
    }
}
