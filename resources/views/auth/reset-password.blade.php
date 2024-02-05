@section('title', 'Reset Your Password | Jobnova')
@extends('layout.master')
@section('content')
    <section class="bg-home d-flex align-items-center" style="background: url('{{ asset('images/hero/bg3.jpg') }}') center;">
        <div class="bg-overlay bg-linear-gradient-2"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-5 col-12">
                    <div class="p-4 bg-white rounded shadow-md mx-auto w-100" style="max-width: 400px;">
                        <form method="POST" action="{{ route('password.reset') }}">
                            @csrf

                            <input type="hidden" name="token" value="{{ $token }}">
                            <a href="/">
                                <img src="{{ asset('images/logo-dark.png') }}" class="mb-4 d-block mx-auto">
                            </a>

                            <h6 class="mb-3 text-uppercase text-center fw-semibold">Please enter new password.</h6>

                            @if (session()->has('error'))
                                <div class="alert alert-success d-flex align-items-center" role="alert">
                                    <i class="fa-solid fa-check-circle me-1"></i>
                                    <span>{{ session('error') }}</span>
                                </div>
                            @endif

                            <div class="mb-3">
                                <label class="form-label fw-semibold">Your Email</label>
                                <input name="email" id="email" type="email"
                                    class="form-control @error('email') is-invalid @enderror"
                                    placeholder="example@website.com" value="{{ old('email') }}">
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-semibold" for="password">New Password</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                    id="password" name="password" placeholder="Password">
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-semibold" for="password_confirmation">Confirm Your
                                    Password</label>
                                <input type="password" class="form-control" id="password_confirmation"
                                    name="password_confirmation" placeholder="Password">
                            </div>

                            <button class="btn btn-primary w-100" type="submit">Sign in</button>
                        </form>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->
    </section><!--end section-->
@endsection
