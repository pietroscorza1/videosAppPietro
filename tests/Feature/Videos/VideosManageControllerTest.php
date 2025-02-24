<?php

namespace Tests\Feature\Videos;

use App\helpers\UserHelper;
use App\helpers\VideoHelpers;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Spatie\Permission\Models\Permission;
use Tests\TestCase;

class VideosManageControllerTest extends TestCase
{


    protected function setUp(): void
    {
        parent::setUp();

        // Create roles
        Permission::firstOrCreate(['name' => 'video_manager']);
        Permission::firstOrCreate(['name' => 'super_admin']);

        $videoDefault = VideoHelpers::createDefaultVideo();
    }


    use RefreshDatabase;

    /** @test */
    public function test_user_with_permissions_can_manage_videos()
    {
        // Crea un usuario con permisos para gestionar videos
        $user = UserHelper::create_video_manager_user();
        $user->givePermissionTo("video_manager");
        $this->actingAs($user);
        $response = $this->get(route('videos.manage.index'));

        $response->assertStatus(200);
        $response->assertViewIs('videos.manage.index');
    }

    public function test_regular_users_cannot_manage_videos()
    {
        $user = UserHelper::create_regular_user();

        $response = $this->actingAs($user)->get(route('videos.manage.index'));
        $response->assertStatus(403);
    }


        public function test_guest_users_cannot_manage_videos()
        {
            $response = $this->get(route('videos.manage.index'));
            $response->assertRedirect('/login');
        }

        public function test_superadmins_can_manage_videos()
        {
            $user = UserHelper::create_superadmin_user();

            $user->givePermissionTo('super_admin');
            $user->givePermissionTo('video_manager');

            $this->actingAs($user);

            $response = $this->get(route('videos.manage.index'));

            $response->assertStatus(200);
        }

        public function test_login_as_video_manager()
        {
            $user = UserHelper::create_video_manager_user();
            $response = $this->post('/login', [
                'email' => $user->email,
                'password' => "123456789",
            ]);
            $response->assertStatus(302);
        }

        public function test_loginAsSuperAdmin()
        {
            $user = UserHelper::create_superadmin_user();
            $response = $this->post('/login', [
                'email' => $user->email,
                'password' => "123456789",
            ]);
            $response->assertStatus(302);
        }

        public function test_loginAsRegularUser()
        {
            $user = UserHelper::create_regular_user();
            $response = $this->post('/login', [
                'email' => $user->email,
                'password' => "123456789",
            ]);
            $response->assertStatus(302);
        }
}
