<?php
namespace App\helpers;

use App\Models\Video;
use Carbon\Carbon;
class VideoHelpers {
    public static function createDefaultVideo(): Video
    {
        return Video::create([
            'title' => config('defaultVideo.video.title'),
            'description' => config('defaultVideo.video.description'),
            'url' => config('defaultVideo.video.url'),
            'published_at' => config('defaultVideo.video.published_at'),
            'next' => null,
            'series_id' => null,
        ]);
    }

    public static function createDefaultNoPublishedVideo(): Video
    {
        return Video::create([
            'title' => config('defaultVideo.video.title'),
            'description' => config('defaultVideo.video.description'),
            'url' => config('defaultVideo.video.url'),
            'published_at' => null,
            'next' => null,
            'series_id' => null,
        ]);
    }
}
