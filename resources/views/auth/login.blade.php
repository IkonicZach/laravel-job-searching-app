@section('title', 'Login to Account | Jobnova')
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
                                        <input class="form-check-input" type="checkbox" id="remember" name="remember"
                                            {{ old('remember') ? 'checked' : '' }}>
                                        <label class="form-label form-check-label text-muted" for="remember">
                                            Remember me
                                        </label>
                                    </div>
                                </div>
                                <span class="forgot-pass text-muted small mb-0">
                                    <a href="{{ route('password.forgot') }}" class="text-muted">Forgot password ?</a>
                                </span>
                            </div>

                            <button class="btn btn-primary w-100" type="submit">Sign in</button>

                            <div class="col-12 text-center mt-3">
                                <span>
                                    <span class="text-muted me-2 small">Don't have an account ?</span>
                                    <a href="{{ route('user.register') }}" class="text-dark fw-semibold small">
                                        Sign Up
                                    </a>
                                </span>
                            </div><!--end col-->
                        </form>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->
    </section><!--end section-->
@endsection
