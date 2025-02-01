<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Tests\Feature\Videos\VideosTest;

class VideosController extends Controller
{
    public function testedBy()
    {
        $test = new VideosTest();
        $test->test_can_get_formatted_published_at_date();
        $test->test_can_get_formatted_published_at_date_when_not_published();
    }

    public function show($id)
    {
        $video = Video::findOrFail($id);

        return view('videos.show', compact('video'));
    }
}
