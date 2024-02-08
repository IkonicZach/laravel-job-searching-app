@section('title', 'Register New Account | Jobnova')
@extends('layout.master')
@section('content')
    <section class="bg-home d-flex align-items-center" style="background: url('{{ asset('images/hero/bg3.jpg') }}') center;">
        <div class="bg-overlay bg-linear-gradient-2"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-8 col-12">
                    <div class="p-4 bg-white rounded shadow-md mx-auto w-100">
                        <form method="POST" action="{{ route('user.store') }}">
                            @csrf
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <a href="/">
                                    <img src="{{ asset('images/logo-dark.png') }}" class="d-block mx-auto">
                                </a>

                                <h6 class="text-uppercase fw-bold text-center">Register your account</h6>
                            </div>

                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-12 mb-3">
                                    <label class="form-label fw-semibold">Your Name</label>
                                    <input name="name" id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" placeholder="Calvin Carlo"
                                        value="{{ old('name') }}">
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-lg-6 col-md-6 col-12 mb-3">
                                    <label class="form-label fw-semibold">Your Email</label>
                                    <input name="email" id="email" type="email"
                                        class="form-control  @error('email') is-invalid @enderror"
                                        placeholder="example@website.com" value="{{ old('email') }}">
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label fw-semibold" for="loginpass">Password</label>
                                    <input type="password" class="form-control  @error('password') is-invalid @enderror"
                                        id="loginpass" name="password" placeholder="Password">
                                    @error('password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label fw-semibold" for="passconf">Re-type Password</label>
                                    <input type="password" class="form-control" id="passconf" name="password_confirmation"
                                        placeholder="Enter password again">
                                </div>

                                <div class="col-12 mb-3">
                                    <label class="form-label fw-semibold">What do you register for? </label>
                                    @error('role')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <div class="row">
                                        <div class="col-6">
                                            <input class="form-check-input" type="radio" name="role" id="candidate"
                                                value="{{ encrypt('candidate') }}">
                                            <label class="form-check-label fw-semibold" for="candidate">To find
                                                jobs</label>
                                        </div>
                                        <div class="col-6 ">
                                            <input class="form-check-input" type="radio" name="role" id="employer"
                                                value="{{ encrypt('employer') }}">
                                            <label class="form-check-label fw-semibold" for="employer">To hire
                                                talents</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-check mb-3">
                                <input class="form-check-input @error('check') is-invalid @enderror" type="checkbox"
                                    name="check" id="check">
                                <label class="form-label form-check-label text-muted" for="check">I Accept <a
                                        href="" class="text-primary">Terms And Condition</a></label>
                                @error('check')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <button class="btn btn-primary w-100" type="submit">Register</button>

                            <div class="col-12 text-center mt-3">
                                <span><span class="text-muted small me-2">Already have an account ? </span> <a
                                        href="{{ route('user.login') }}" class="text-dark fw-semibold small">Sign
                                        in</a></span>
                            </div><!--end col-->
                        </form>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->
    </section><!--end section-->
@endsection
