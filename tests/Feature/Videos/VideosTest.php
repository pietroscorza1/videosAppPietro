<?php

namespace Tests\Feature\Videos\VideosTest;

use App\helpers\UserHelper;
use App\helpers\VideoHelpers;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Spatie\Permission\Models\Permission;
use Tests\TestCase;

class VideosTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        // Create roles
        Permission::firstOrCreate(['name' => 'video_manager']);
        Permission::firstOrCreate(['name' => 'super_admin']);

        $videoDefault = VideoHelpers::createDefaultVideo();
    }


    public function test_users_can_view_videos()
    {
        $video = VideoHelpers::createDefaultVideo();

        $response = $this->get(route('videos.show', $video->id));

        $response->assertStatus(200);

        $response->assertSee($video->title);
        $response->assertSee($video->description);
    }

    public function test_users_cannot_view_not_existing_videos()
    {
        $response = $this->get(route('videos.show', 9999));
        $response->assertStatus(404);
    }

    public function test_user_without_permissions_can_see_default_videos_page()
    {
        $user = UserHelper::create_regular_user();
        $this->actingAs($user);

        $response = $this->get(route('home'));

        $response->assertStatus(200);
    }
    public function test_user_with_permissions_can_see_default_videos_page()
    {
        $user = UserHelper::create_superadmin_user();
        $user->givePermissionTo('super_admin');
        $this->actingAs($user);

        $response = $this->get(route('home'));

        $response->assertStatus(200);
    }
    public function test_not_logged_users_can_see_default_videos_page()
    {
        $response = $this->get(route('home'));

        $response->assertStatus(200);
    }
}
