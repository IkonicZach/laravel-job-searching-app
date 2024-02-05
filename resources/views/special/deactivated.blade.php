@section('title', 'Error page | Jobnova')
@extends('layout.master')
@section('content')
    <!-- Start -->
    <section class="position-relative bg-soft-primary">
        <div class="container">
            <div class="row">
                <div class="col-12 p-0">
                    <div class="d-flex flex-column min-vh-100 justify-content-center px-md-5 py-5 px-4">
                        <div class="text-center">
                            <a href="index.html"><img src="{{ asset('images/logo-icon-64.png') }}" alt="" /></a>
                        </div>

                        {{-- Modal Starts here  --}}
                        <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModal2Label"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content p-5">
                                    <form method="POST" action="{{ route('user.activate') }}">
                                        @csrf
                                        <a href="/">
                                            <img src="{{ asset('images/logo-dark.png') }}" class="mb-4 d-block mx-auto">
                                        </a>

                                        <h6 class="mb-3 text-danger text-center fw-normal">Remember! Signing in will
                                            re-activate your account!</h6>

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
                                            <input type="password"
                                                class="form-control @error('password') is-invalid @enderror" id="password"
                                                name="password" placeholder="Password">
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
                                                    class="text-muted">Forgot password
                                                    ?</a></span>
                                        </div>

                                        <button class="btn btn-primary w-100" type="submit">Sign in</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        {{-- Modal Ends here  --}}

                        <div class="title-heading text-center my-auto">
                            <img src="{{ asset('images/error.png') }}" class="img-fluid" alt="" />
                            <h3 class="text-dark text-uppercase mt-2 mb-4 fw-bold">
                                @if (auth()->check() && $user->id !== auth()->user()->id)
                                    Page Not Found?
                                @else
                                    This account is deactivated.
                                @endif
                            </h3>
                            <p class="text-muted para-desc mx-auto">
                                @if (auth()->check() && $user->id !== auth()->user()->id)
                                    Whoops, this is embarassing. <br />
                                    Looks like the page you were looking for wasn't found.
                                @else
                                    Do you wanna re-activate your account? <br />
                                    If yes, click <b>activate</b>.
                                @endif
                            </p>

                            @if (auth()->check() && $user->id !== auth()->user()->id)
                                <div class="mt-4">
                                    <a href="/" class="btn btn-primary">Back to Home</a>
                                </div>
                            @else
                                <div class="row col-12 justify-content-center mt-4" style="gap: 1rem">
                                    <a href="/" class="btn btn-light col-2">Back to Home</a>
                                    <a class="btn btn-primary col-2" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal2">Activate</a>
                                </div>
                            @endif
                        </div>
                        <div class="text-center">
                            <p class="mb-0 text-muted">
                                ©
                                <script>
                                    document.write(new Date().getFullYear());
                                </script>
                                Jobnova
                            </p>
                        </div>
                    </div>
                </div>
                <!--end col-->
            </div>
            <!--end row-->
        </div>
        <!--end container-->
    </section>
    <!--end section-->
@endsection
