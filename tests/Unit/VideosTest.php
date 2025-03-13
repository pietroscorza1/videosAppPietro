<?php
namespace Tests\Feature\Videos;

use App\helpers\UserHelper;
use App\helpers\VideoHelpers;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class VideosTest extends TestCase
{
    use RefreshDatabase;
    protected function setUp(): void
    {
        parent::setUp();
        $user = UserHelper::create_video_manager_user();
        $this->id = $user->id;
    }

    public function assetTrue()
    {
        $this->assertTrue(true);
    }

    public function test_can_get_formatted_published_at_date()
    {
        $video = VideoHelpers::createDefaultVideo($this->id);

        $formattedDate = $video->formatted_published_at;

        $this->assertEquals("15 de enero de 2025", $formattedDate);
    }

    public function test_can_get_formatted_published_at_date_when_not_published()
    {
        $video = VideoHelpers::createDefaultNoPublishedVideo($this->id);

        $formattedDate = $video->formatted_published_at;

        $this->assertEquals('Fecha no disponible', $formattedDate);
    }
}
