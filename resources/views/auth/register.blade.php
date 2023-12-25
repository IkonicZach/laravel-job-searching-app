@section('title', 'Register account')
@extends('layout.master')
@section('content')
    <div class="d-flex justify-content-center align-items-center vh-100">
        <div class="p-5 shadow-lg rounded w-35">
            <form method="POST" action="{{ route('user.store') }}">
                @csrf
                <div class="row g-0">
                    <div class="col-6 mb-3">
                        <label class="form-label" for="name">Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                            name="name">
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-6 mb-3">
                        <label class="form-label" for="email">Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                            name="email">
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-12 mb-3">
                        <label class="form-label" for="password">Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password"
                            name="password">
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-12 mb-3">
                        <label class="form-label" for="password_confirmation">Confirm Password</label>
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                    </div>
                    <div class="col-12">
                        <label for="form-label">What do you register for?</label>
                        <div class="row">
                            <div class="col-6">
                                <input class="form-check-input @error('role') is-invalid @enderror" type="radio"
                                    name="role" id="candidate" value="{{ encrypt('candidate') }}">
                                @error('role')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <label class="form-check-label" for="candidate">To find jobs</label>
                            </div>
                            <div class="col-6 ">
                                <input class="form-check-input @error('role') is-invalid @enderror" type="radio"
                                    name="role" id="employer" value="{{ encrypt('employer') }}">
                                @error('role')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <label class="form-check-label" for="employer">To hire talents</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 row align-items-center">
                        <small class="text-muted col-8">Already have an account? <a href="">login</a>.</small>
                        <button type="submit" class="btn btn-light col-4">Register</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    {{-- <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required
                autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="" :value="__('What do you register for?')" />
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="role" id="candidate"
                    value="candidate">
                <label class="form-check-label" for="candidate">To find jobs</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="role" id="employer"
                    value="employer">
                <label class="form-check-label fs-sm" for="employer">To hire talents</label>
            </div>
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 :text-gray-400 hover:text-gray-900 :hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 :focus:ring-offset-gray-800"
                href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div> --}}
@endsection
