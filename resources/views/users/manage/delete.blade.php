@extends('layouts.videos-app-layout')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <div class="max-w-md mx-auto">
            <h1 class="text-3xl font-bold text-gray-800 mb-6">Delete Video</h1>
            @can('video_manager')
                <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                    <p class="mb-4 text-gray-700">Quieres borrar este video?:</p>
                    <p class="mb-6 text-lg font-semibold text-gray-900">"{{ $user->name }}"?</p>
                    <form action="{{ route('users.manage.destroy', $user->id) }}" method="POST" class="flex items-center justify-between">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                            Delete
                        </button>
                        <a href="{{ route('users.manage.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                            Cancel
                        </a>
                    </form>
                </div>
            @else
                <div class="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4" role="alert">
                    <p class="font-bold">No Permission</p>
                    <p>You do not have permission to delete videos.</p>
                </div>
            @endcan
        </div>
    </div>
@endsection

