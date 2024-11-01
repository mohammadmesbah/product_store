@extends('layouts.header')

@section('content')

<x-guest-layout> <!-- Session Status -->
    <h1 class="text-center relative top-0 logo-text text-3xl font-bold text-orange-700 font-mono">LOGIN</h1>
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <label for="email" class="text-lg text-orange-700">Email</label>
            <x-text-input id="email" class="border-gray-300 focus:border-orange-500 focus:ring-orange-500 rounded-md shadow-sm block mt-1 w-full"
             type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <label class="text-lg text-orange-700"  for="password">Password</label>

            <x-text-input id="password"
            class="border-gray-300 focus:border-orange-500 focus:ring-orange-500 rounded-md shadow-sm block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-orange-300 text-orange-600 shadow-sm focus:ring-orange-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-between mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

        <x-primary-button class=" items-center justify-center px-4 py-3 font-semibold bg-orange-600 hover:bg-white hover:text-orange-600
         hover:border-orange-600 active:bg-orange-500 active:text-white focus:ring-orange-500">
            {{ __('Log in') }}
        </x-primary-button>

        </div>

        
    </form>
    <a class="block text-center mt-4 text-md text-orange-600 hover:text-orange-900 hover:underline rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ url('register') }}">
        {{ __('Do not have an account? Register Now') }}
    </a>
</x-guest-layout>
@endsection