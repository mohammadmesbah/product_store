@extends('layouts.header')

@section('content')
<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" class="text-lg text-orange-700"/>
            <x-text-input id="name" class="border-gray-300 focus:border-orange-500 focus:ring-orange-500 rounded-md shadow-sm block mt-1 w-full"
             type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" class="text-lg text-orange-700"/>
            <x-text-input id="email" class="border-gray-300 focus:border-orange-500 focus:ring-orange-500 rounded-md shadow-sm block mt-1 w-full"
             type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" class="text-lg text-orange-700"/>

            <x-text-input id="password" class="border-gray-300 focus:border-orange-500 focus:ring-orange-500 rounded-md shadow-sm block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="text-lg text-orange-700"/>

            <x-text-input id="password_confirmation" class="border-gray-300 focus:border-orange-500 focus:ring-orange-500 rounded-md shadow-sm block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-orange-600 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4 items-center justify-center px-4 py-2 font-semibold bg-orange-600 hover:bg-white hover:text-orange-600
            hover:border-orange-600 active:bg-orange-500 active:text-white focus:ring-orange-500">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
@endsection