@section('title', 'Forgot Account | Skilltrack')
@extends('layout.master')
@section('content')
    <section class="bg-home d-flex align-items-center" style="background: url('images/hero/bg3.jpg') center;">
        <div class="bg-overlay bg-linear-gradient-2"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-5 col-12">
                    <div class="p-4 bg-white rounded shadow-md mx-auto w-100" style="max-width: 400px;">
                        <form action="{{ route('password.send') }}" method="POST">
                            @csrf
                            <a href="/">
                                <img src="images/logo-dark.png" class="mb-4 d-block mx-auto">
                            </a>
                            <h6 class="mb-2 text-uppercase fw-semibold">Reset your password</h6>

                            @if (session()->has('message'))
                                <div class="alert alert-success d-flex align-items-center" role="alert">
                                    <i class="fa-solid fa-check-circle me-1"></i>
                                    <span>{{ session('message') }}</span>
                                </div>
                            @endif

                            <small class="text-muted">
                                Please enter your email address. You will receive a link to create a new password via email.
                            </small>

                            <div class="my-3">
                                <label class="form-label fw-semibold">Your Email</label>
                                <input name="email" id="email" type="email"
                                    class="form-control @error('email') is-invalid @enderror"
                                    placeholder="example@website.com">
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <button class="btn btn-primary w-100" type="submit">Send</button>

                            <div class="col-12 text-center mt-3">
                                <span><span class="text-muted small me-2">Remember your password ? </span> <a
                                        href="login.html" class="text-dark fw-semibold small">Sign in</a></span>
                            </div><!--end col-->
                        </form>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->
    </section><!--end section-->
@endsection
