<?php

namespace Tests\Feature;

use App\helpers\VideoHelpers;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class VideoTest extends TestCase
{
    use RefreshDatabase;

    public function test_users_can_view_videos()
    {
        $video = VideoHelpers::createDefaultVideo();

        $response = $this->get(route('videos.show', $video->id));

        $response->assertStatus(200);

        $response->assertSee($video->title);
        $response->assertSee($video->description);
    }


    public function users_cannot_view_not_existing_videos()
    {
        $response = $this->get(route('videos.show', 9999));
        $response->assertStatus(404);
    }
}
