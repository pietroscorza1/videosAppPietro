<?php
namespace App\helpers;

use App\Models\Video;
use Carbon\Carbon;
class VideoHelpers {
    public static function createDefaultVideo($id): Video
    {
        return Video::create([
            'title' => config('defaultVideo.video.title'),
            'description' => config('defaultVideo.video.description'),
            'url' => config('defaultVideo.video.url'),
            'published_at' => config('defaultVideo.video.published_at'),
            'next' => null,
            'series_id' => null,
            'user_id' => $id
        ]);
    }
    public static function createSecondDefaultVideo($id): Video
    {
        return Video::create([
            'title' => config('defaultVideo.video.title'),
            'description' => config('defaultVideo.video.description'),
            'url' => config('defaultVideo.video.url'),
            'published_at' => config('defaultVideo.video.published_at'),
            'next' => null,
            'series_id' => null,
            'user_id' => $id

        ]);
    }
    public static function createDefaultNoPublishedVideo($id): Video
    {
        return Video::create([
            'title' => config('defaultVideo.video.title'),
            'description' => config('defaultVideo.video.description'),
            'url' => config('defaultVideo.video.url'),
            'published_at' => null,
            'next' => null,
            'series_id' => null,
            'user_id' => $id
        ]);
    }


}
