{{-- <x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('user.login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full @error('email') is-invalid @enderror" type="email"
                name="email" :value="old('email')" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full @error('password') is-invalid @enderror"
                type="password" name="password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="d-flex justify-content-between mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox"
                    class="rounded :bg-gray-900 border-gray-300 :border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 :focus:ring-indigo-600 :focus:ring-offset-gray-800"
                    name="remember">
                <span class="ms-2 text-sm text-gray-600 :text-gray-400">{{ __('Remember me') }}</span>
            </label>
            <p class="m-0">
                <span class="text-muted">Don't have an account? Register</span>
                <a href="{{ route('user.register') }}" class="text-primary">here</a>
            </p>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 :text-gray-400 hover:text-gray-900 :hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 :focus:ring-offset-gray-800"
                    href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <input type="submit" class="ms-3 btn btn-primary" value="Log in">
        </div>
    </form>
</x-guest-layout> --}}
@section('title', 'Login to Account | Skilltrack')
@extends('layout.master')
@section('content')
    <section class="bg-home d-flex align-items-center" style="background: url('{{ asset('images/hero/bg3.jpg') }}') center;">
        <div class="bg-overlay bg-linear-gradient-2"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-5 col-12">
                    <div class="p-4 bg-white rounded shadow-md mx-auto w-100" style="max-width: 400px;">
                        <form method="POST" action="{{ route('user.login') }}">
                            @csrf
                            <a href="/">
                                <img src="{{ asset('images/logo-dark.png') }}" class="mb-4 d-block mx-auto">
                            </a>

                            <h6 class="mb-3 text-uppercase text-center fw-semibold">Please sign in</h6>

                            <div class="mb-3">
                                <label class="form-label fw-semibold">Your Email</label>
                                <input name="email" id="email" type="email"
                                    class="form-control @error('email') is-invalid @enderror"
                                    placeholder="example@website.com">
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-semibold" for="password">Password</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                    id="password" name="password" placeholder="Password">
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="d-flex justify-content-between">
                                <div class="mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value=""
                                            id="flexCheckDefault">
                                        <label class="form-label form-check-label text-muted"
                                            for="flexCheckDefault">Remember me</label>
                                    </div>
                                </div>
                                <span class="forgot-pass text-muted small mb-0"><a href="reset-password.html"
                                        class="text-muted">Forgot password ?</a></span>
                            </div>

                            <button class="btn btn-primary w-100" type="submit">Sign in</button>

                            <div class="col-12 text-center mt-3">
                                <span><span class="text-muted me-2 small">Don't have an account ?</span> <a
                                        href="{{ route('user.register') }}" class="text-dark fw-semibold small">Sign
                                        Up</a></span>
                            </div><!--end col-->
                        </form>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->
    </section><!--end section-->
@endsection
