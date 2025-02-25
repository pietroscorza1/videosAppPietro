@extends('layouts.videos-app-layout')


@section('content')
<div class="flex justify-center">
    <form class="bg-green-900 p-6 rounded-xl  w-1/2" method="POST" action="{{ route('login') }}">
        @csrf

        <div>
            <label class="text-white">email</label>
            <x-input id="email" class=" block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
        </div>

        <div class="mt-4">
            <label class="text-white">password</label>
            <x-input id="password" class=" block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
        </div>

        <div class="block mt-4">
            <label for="remember_me" class="flex items-center">
                <x-checkbox id="remember_me" name="remember" />
                <span class="text-white ms-2 text-sm dark:text-gray-400">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">

            <x-button class="ms-4">
                enviar
            </x-button>
        </div>
    </form>
</div>
@endsection
