<?php
namespace Tests\Unit;

use App\Models\Team;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Config;
use Tests\TestCase;
use App\helpers\UserHelper;

class HelpersTest extends TestCase
{
use RefreshDatabase;

    public function can_create_default_video_and_check_date_formatting()
    {
        // Crear el video por defecto
        $video = createDefaultVideo();

        // Verificar que el video fue creado correctamente con los valores predeterminados
        $this->assertDatabaseHas('videos', [
            'title' => config('defaultVideo.video.title'),
            'description' => config('defaultVideo.video.description'),
            'url' => config('defaultVideo.video.url'),
            'published_at' => Carbon::now()->toDateTimeString(), // Verificar que la fecha se haya asignado correctamente
        ]);

        // Verificar la formateación de la fecha de publicación
        $formattedDate = $video->formatted_published_at;
        $this->assertEquals(Carbon::now()->translatedFormat('j \d\e F \d\e Y'), $formattedDate);

        // Verificar la formateación 'fa fa' (cuando no está publicado)
        $videoWithoutDate = Video::create([
            'title' => 'Test Video Without Date',
            'description' => 'Video without published date',
            'url' => 'https://www.youtube.com/watch?v=xyz123',
            'published_at' => Carbon::now(),
            'series_id' => null,
        ]);

        $this->assertEquals($videoWithoutDate->formatted_published_at, Carbon::now()->translatedFormat('j \d\e F \d\e Y'));
    }

public function test_can_create_default_user()
{

        $user = (new UserHelper)->createDefaultUsers([
        'name' => Config::get('defaultusers.user.name'),
        'email' => Config::get('defaultusers.user.email'),
        'password' => Config::get('defaultusers.user.password'),
    ]);

    $this->assertEquals(Config::get('defaultusers.user.name'), $user->name);
    $this->assertEquals(Config::get('defaultusers.user.email'), $user->email);
    $this->assertTrue(\Hash::check(Config::get('defaultusers.user.password'), $user->password));
    $this->assertCount(1, $user->ownedTeams);
}

public function test_can_create_default_professor_user()
    {

    $user = (new UserHelper)->createDefaultUsers([
        'name' => Config::get('defaultusers.professor.name'),
        'email' => Config::get('defaultusers.professor.email'),
        'password' => Config::get('defaultusers.professor.password'),
    ]);

    $this->assertEquals(Config::get('defaultusers.professor.name'), $user->name);
    $this->assertEquals(Config::get('defaultusers.professor.email'), $user->email);
    $this->assertTrue(\Hash::check(Config::get('defaultusers.professor.password'), $user->password));
    $this->assertCount(1, $user->ownedTeams);
    }

    public function can_create_default_video()
    {
        // Crear el video por defecto
        $video = createDefaultVideo();

        // Verificar que el video fue creado correctamente
        $this->assertDatabaseHas('videos', [
            'title' => config('defaultVideo.video.title'),
            'description' => config('defaultVideo.video.description'),
            'url' => config('defaultVideo.video.url'),
            'published_at' => config('defaultVideo.video.published'),
        ]);
    }

}



