@extends('layouts.videos-app-layout')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold text-gray-800">Manage Videos</h1>
            @can('video_manager')
                <a href="{{ route('videos.manage.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded inline-flex items-center">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                    Create New Video
                </a>
            @endcan
        </div>

        @can('video_manager')
            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Description</th>
                        <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider w-32">Actions</th>
                    </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($videos as $video)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-medium text-gray-900">{{ Str::limit($video->title, 50) }}</div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-sm text-gray-500 truncate max-w-xs">{{ $video->description }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <a href="{{ route('videos.manage.edit', $video) }}" class="text-indigo-600 hover:text-indigo-900 mr-3">Edit</a>
                                <a href="{{ route('videos.manage.delete', $video) }}" class="text-red-600 hover:text-red-900">Delete</a>
                                <a href="{{ route('videos.show', $video->id) }}" class="text-yellow-300 hover:text-yellow-600">show</a>

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4" role="alert">
                <p class="font-bold">No tienes permisos</p>
                <p>No tienes permisos para administrar videos.</p>
            </div>
        @endcan
    </div>
@endsection

