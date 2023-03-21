@extends('layouts.app')

@section('content')
    <a href="/" class="ml-8 btn btn-primary text-white">Go Back</a>
    <div class="flex flex-col h-screen bg-secondary mt-20">
        <div class="flex justify-center">
            <div class="w-full max-w-xs">
                <div class="bg-white rounded-2xl overflow-hidden shadow-md">
                    <div class="px-6 py-4 bg-primary text-white border-b">
                        <h2 class="font-bold justify-center flex">{{ __('Register') }}</h2>
                    </div>

                    <div class="p-6">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="mb-4">
                                <label for="name" class="block text-gray-700 font-bold mb-2">{{ __('Name') }}</label>

                                <input id="name" type="text" class="input input-bordered input-sm w-full max-w-xs @error('name') border-red-500 @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="email" class="block text-gray-700 font-bold mb-2">{{ __('Email Address') }}</label>

                                <input id="email" type="email" class="input input-bordered input-sm w-full max-w-xs @error('email') border-red-500 @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="password" class="block text-gray-700 font-bold mb-2">{{ __('Password') }}</label>

                                <input id="password" type="password" class="input input-bordered input-sm w-full max-w-xs @error('password') border-red-500 @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="password-confirm" class="block text-gray-700 font-bold mb-2">{{ __('Confirm Password') }}</label>

                                <input id="password-confirm" type="password" class="input input-bordered input-sm w-full max-w-xs" name="password_confirmation" required autocomplete="new-password">
                            </div>

                            <div class="flex items-center justify-between">
                                <button type="submit" class="bg-primary text-white font-bold py-2 px-4 rounded">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
    </div>
</div>
@endsection
