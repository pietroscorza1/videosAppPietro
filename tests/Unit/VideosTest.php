<?php
namespace Tests\Feature\Videos;

use App\helpers\VideoHelpers;
use App\Models\Video;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class VideosTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_get_formatted_published_at_date()
    {
        $video = VideoHelpers::createDefaultVideo();

        $formattedDate = $video->formatted_published_at;

        $this->assertEquals("15 de enero de 2025", $formattedDate);
    }

    public function test_can_get_formatted_published_at_date_when_not_published()
    {
        $video = VideoHelpers::createDefaultNoPublishedVideo();

        $formattedDate = $video->formatted_published_at;

        $this->assertEquals('Fecha no disponible', $formattedDate);
    }
}
