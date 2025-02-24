<?php
namespace Tests\Unit;

use App\helpers\VideoHelpers;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Config;
use Tests\TestCase;
use App\helpers\UserHelper;

class HelpersTest extends TestCase
{
use RefreshDatabase;

    public function test_can_create_default_video_and_check_date_formatting()
    {
        $video = VideoHelpers::createDefaultVideo();

        $this->assertDatabaseHas('videos', [
            'title' => config('defaultVideo.video.title'),
            'description' => config('defaultVideo.video.description'),
            'url' => config('defaultVideo.video.url'),
            'published_at' => config('defaultVideo.video.published_at')
        ]);

        $formattedDate = $video->formatted_published_at;
        $this->assertEquals(config('defaultVideo.video.published_at_formated'), $formattedDate);
    }

    public function test_can_create_default_user()
    {
        $user = UserHelper::createDefaultUser();

        $this->assertEquals(config('defaultUsers.user.name'), $user->name);
        $this->assertEquals(config('defaultUsers.user.email'), $user->email);
        $this->assertTrue(\Hash::check(config('defaultUsers.user.password'), $user->password));

        $this->assertCount(1, $user->ownedTeams);

        $team = $user->ownedTeams->first();
        self::assertTrue($team->personal_team);
    }

    public function test_can_create_default_video()
    {
        $video = VideoHelpers::createDefaultNoPublishedVideo();  // Llamando al método con 'published_at' null

        // Verificar que los datos existen en la base de datos, incluyendo 'published_at' como null
        $this->assertDatabaseHas('videos', [
            'title' => config('defaultVideo.video.title'),
            'description' => config('defaultVideo.video.description'),
            'url' => config('defaultVideo.video.url'),
            'published_at' => null,  // Verificando que published_at sea null
        ]);
    }


}



