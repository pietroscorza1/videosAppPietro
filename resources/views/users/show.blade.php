@extends('layouts.videos-app-layout')

@section('content')
    <div class="bg-transparent min-h-96 flex w-full items-center justify-center">
        <div class="bg-white rounded-lg shadow-md p-6 max-w-md w-full">
            <h1 class="text-2xl font-bold text-center mb-6">Detalles del Usuario</h1>

            <div class="space-y-4">
                @if(isset($user))
                    <div class="border-b pb-2">
                        <p class="text-gray-600">Nombre:</p>
                        <p class="font-semibold">{{ $user->name }}</p>
                    </div>

                    <div>
                        <p class="text-gray-600">Email:</p>
                        <p class="font-semibold">{{ $user->email }}</p>
                    </div>

                    <div class="mt-6">
                        <h2 class="text-xl font-bold text-center mb-4">Videos</h2>
                        @if($user->videos->isEmpty())
                            <p class="text-gray-500 text-center">No videos found</p>
                        @else
                            <ul class="list-disc list-inside">
                                @foreach($user->videos as $video)
                                    <li class="text-gray-700 flex justify-between items-center">
                                        {{ $video->title }}
                                        <a href="{{ route('videos.show', $video->id) }}" class="bg-blue-500 hover:bg-blue-600 text-white px-2 py-1 rounded text-sm">
                                            Ver
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                @else
                    <p class="text-red-500 text-center">Usuario no encontrado</p>
                @endif
            </div>

            <div class="mt-6 text-center">
                <a href="{{ route('users.index') }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">
                    Volver
                </a>
            </div>
        </div>
    </div>
@endsection
