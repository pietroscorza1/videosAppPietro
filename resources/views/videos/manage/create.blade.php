@extends('layouts.videos-app-layout')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <div class="max-w-2xl mx-auto">
            <h1 class="text-3xl font-bold text-gray-800 mb-6">Create New Video</h1>
            @can('video_manager')
                <form action="{{ route('videos.manage.store') }}" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" data-qa="video-create-form">
                    @csrf
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="title">
                            Title
                        </label>
                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="title" type="text" name="title" placeholder="Enter video title" required data-qa="video-title-input">
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="description">
                            Description
                        </label>
                        <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="description" name="description" rows="4" placeholder="Enter video description" required data-qa="video-description-input"></textarea>
                    </div>
                    <div class="mb-6">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="url">
                            URL
                        </label>
                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="url" type="url" name="url" placeholder="https://example.com/video" required data-qa="video-url-input">
                    </div>
                    <div class="flex items-center justify-between">
                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit" data-qa="video-submit-button">
                            Create Video
                        </button>
                        <a href="{{ route('videos.manage.index') }}" class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800" data-qa="video-cancel-button">
                            Cancel
                        </a>
                    </div>
                </form>
            @else
                <div class="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4" role="alert">
                    <p class="font-bold">No Permission</p>
                    <p>You do not have permission to create videos.</p>
                </div>
            @endcan
        </div>
    </div>
@endsection
