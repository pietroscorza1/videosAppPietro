<?php

namespace Tests\Feature\Videos;

use App\helpers\VideoHelpers;
use App\Models\Video;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Route;
use Tests\TestCase;

class VideoTest extends TestCase
{
    use RefreshDatabase;

    public function users_can_view_videos()
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
