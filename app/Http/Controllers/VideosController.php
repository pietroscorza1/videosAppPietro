<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Support\Facades\Auth;
use Tests\Feature\Videos\VideosTest;

class VideosController extends Controller
{
    public function testedBy()
    {

    }

    public function show($id)
    {
        $video = Video::findOrFail($id);

        return view('videos.show', compact('video'));
    }
    public function index()
    {
        $videos = Video::all();

        return view('videos.index', compact('videos'));
    }
}
