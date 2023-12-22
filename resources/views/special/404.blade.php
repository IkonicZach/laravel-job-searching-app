@section('titile', 'Error page')
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
                        <div class="title-heading text-center my-auto">
                            <img src="{{ asset('images/error.png') }}" class="img-fluid" alt="" />
                            <h3 class="text-dark text-uppercase mt-2 mb-4 fw-bold">
                                Page Not Found?
                            </h3>
                            <p class="text-muted para-desc mx-auto">
                                Whoops, this is embarassing. <br />
                                Looks like the page you were looking for wasn't found.
                            </p>

                            <div class="mt-4">
                                <a href="/" class="btn btn-primary">Back to Home</a>
                            </div>
                        </div>
                        <div class="text-center">
                            <p class="mb-0 text-muted">
                                ©
                                <script>
                                    document.write(new Date().getFullYear());
                                </script>
                                Jobnova. Design with
                                <i class="mdi mdi-heart text-danger"></i> by
                                <a href="https://shreethemes.in/" target="_blank" class="text-reset">Shreethemes</a>.
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
