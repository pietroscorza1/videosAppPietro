@extends('layouts.videos-app-layout')

@section('title', 'Videos Management - Videos App')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Recommended Videos</h1>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
            @foreach($videos as $video)
                <div class="bg-white rounded-lg overflow-hidden shadow-md hover:shadow-lg transition duration-300">
                    <a href="{{ route('videos.show', $video->id) }}" class="block relative">
                        <img src="{{ $video->thumbnail_url }}" alt="{{ $video->title }}" class="w-full h-48 object-cover">

                    </a>
                    <div class="p-4">
                        <div class="flex items-start">
                            <div class="flex-grow">
                                <h2 class="text-base font-semibold text-gray-800 line-clamp-2">{{ $video->title }}</h2>
                                <div class="text-xs text-gray-500 mt-1">
                                    {{ $video->created_at->diffForHumans() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
@endsection

@push('styles')
    <style>
        .line-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
    </style>
@endpush
