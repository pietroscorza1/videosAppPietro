<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;

class VideosController extends Controller
{
    public function testedBy(){

    }
    public function show($id)
    {
        $video = Video::findOrFail($id);

        return view('videos.show', compact('video'));
    }
}
