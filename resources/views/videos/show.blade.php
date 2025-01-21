@extends('layouts.videos-app-layout')

@section('title', $video->title . ' - Videos App')

@section('content')
    <div class="max-w-4xl mx-auto">
        <h1 class="text-3xl font-bold mb-4">{{ $video->title }}</h1>

        <div class=" mb-4 h-96 ">
            <iframe
                src="{{ $video->url }}"
                frameborder="0"
                allow="autoplay; fullscreen; picture-in-picture"
                allowfullscreen
                class="w-full h-96">
            </iframe>
        </div>


        <div class="bg-white shadow-md rounded-lg p-6 mb-6">
            <p class="text-gray-700 mb-4">{{ $video->description }}</p>

            <div class="flex items-center text-sm text-gray-500">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
                <span>Publicado el {{ $video->formatted_published_at }}</span>
            </div>

            <div class="flex items-center text-sm text-gray-500 mt-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span>{{ $video->formatted_for_humans_published_at }}</span>
            </div>
        </div>

        @if($video->nextVideo)
            <div class="bg-indigo-100 border-l-4 border-indigo-500 text-indigo-700 p-4 mb-6" role="alert">
                <p class="font-bold">Siguiente video en la serie:</p>
                <p>
                    <a href="{{ route('videos.show', $video->nextVideo) }}" class="underline hover:text-indigo-900">
                        {{ $video->nextVideo->title }}
                    </a>
                </p>
            </div>
        @endif

        <div class="mt-8">
            <h2 class="text-2xl font-bold mb-4">Metadatos del video</h2>
            <dl class="grid grid-cols-1 gap-x-4 gap-y-8 sm:grid-cols-2">
                <div class="sm:col-span-1">
                    <dt class="text-sm font-medium text-gray-500">ID del video</dt>
                    <dd class="mt-1 text-sm text-gray-900">{{ $video->id }}</dd>
                </div>
                <div class="sm:col-span-1">
                    <dt class="text-sm font-medium text-gray-500">Fecha de publicación (timestamp)</dt>
                    <dd class="mt-1 text-sm text-gray-900">{{ $video->published_at_timestamp }}</dd>
                </div>
                @if($video->series_id)
                    <div class="sm:col-span-1">
                        <dt class="text-sm font-medium text-gray-500">ID de la serie</dt>
                        <dd class="mt-1 text-sm text-gray-900">{{ $video->series_id }}</dd>
                    </div>
                @endif
            </dl>
        </div>
    </div>
@endsection
