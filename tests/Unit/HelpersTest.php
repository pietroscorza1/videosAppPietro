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

    public function can_create_default_video_and_check_date_formatting()
    {
        $video = VideoHelpers::createDefaultVideo();

        $this->assertDatabaseHas('videos', [
            'title' => config('defaultVideo.video.title'),
            'description' => config('defaultVideo.video.description'),
            'url' => config('defaultVideo.video.url'),
            'published_at' => Carbon::now()->toDateTimeString(),
        ]);

        $formattedDate = $video->formatted_published_at;
        $this->assertEquals(Carbon::now()->translatedFormat('j \d\e F \d\e Y'), $formattedDate);
    }

public function test_can_create_default_user()
{

        $user = UserHelper::createDeaultUser();

    $this->assertEquals(Config::get('defaultUsers.user.name'), $user->name);
    $this->assertEquals(Config::get('defaultUsers.user.email'), $user->email);
    $this->assertTrue(\Hash::check(Config::get('defaultUsers.user.password'), $user->password));
    $this->assertCount(1, $user->ownedTeams);
}

    public function test_can_create_default_professor_user()
    {

        $user = UserHelper::createDeaultProfessor();

        $this->assertEquals(Config::get('defaultUsers.professor.name'), $user->name);
        $this->assertEquals(Config::get('defaultUsers.professor.email'), $user->email);
        $this->assertTrue(\Hash::check(Config::get('defaultUsers.professor.password'), $user->password));
        $this->assertCount(1, $user->ownedTeams);
    }


    public function can_create_default_video()
    {
        $video = VideoHelpers::createDefaultVideo();

        $this->assertDatabaseHas('videos', [
            'title' => config('defaultVideo.video.title'),
            'description' => config('defaultVideo.video.description'),
            'url' => config('defaultVideo.video.url'),
            'published_at' => config('defaultVideo.video.published'),
        ]);
    }

}



