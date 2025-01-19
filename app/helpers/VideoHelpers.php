<?php
// app/Helpers/video_helpers.php

use App\Models\Video;
use Carbon\Carbon;

/**
 * Crea un video por defecto con valores predeterminados.
 *
 * @return Video
 */
function createDefaultVideo(): Video
{
    return Video::create([
        'title' => config('defaultVideo.video.title'),
        'description' => config('defaultVideo.video.description'),
        'url' => config('defaultVideo.video.url'),
        'published_at' => Carbon::now(),
        'next' => null,
        'series_id' => null,
    ]);
}
