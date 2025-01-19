<?php

namespace Tests\Feature\Videos;

use App\Models\Video;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class VideoTest extends TestCase
{
    use RefreshDatabase;

    public function users_can_view_videos()
    {
        $video = $this->createDefaultVideo();

        $response = $this->get(route('videos.show', $video->id));

        $response->assertStatus(200);
        $response->assertSee($video->title);
    }
    public function users_cannot_view_not_existing_videos()
    {
        $response = $this->get(route('videos.show', 9999));

        $response->assertStatus(404);
    }
    private function createDefaultVideo()
    {
        return Video::create([
            'title' => 'Default Video Title',
            'description' => 'Default video description.',
            'url' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
            'published_at' => now(),
            'next' => null,
            'series_id' => null,
        ]);
    }
}
