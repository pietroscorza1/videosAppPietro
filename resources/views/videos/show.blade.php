@extends('layouts.videos-app-layout')

@section('content')
    <div class="video-container">
        <h1>{{ $video->title }}</h1>
        <p><strong>Descripció:</strong> {{ $video->description }}</p>
        <p><strong>Publicat:</strong> {{ $video->formatted_published_at }}</p>
        <p><strong>URL:</strong> <a href="{{ $video->url }}" target="_blank">{{ $video->url }}</a></p>

        @if($video->nextVideo)
            <p><strong>Vídeo següent:</strong>
                <a href="{{ route('videos.show', ['id' => $video->nextVideo->id]) }}">
                    {{ $video->nextVideo->title }}
                </a>
            </p>
        @endif
    </div>
@endsection
