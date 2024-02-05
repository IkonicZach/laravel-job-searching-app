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

                            <div class="title-heading text-center my-auto">
                                <img src="{{ asset('images/error.png') }}" class="img-fluid" alt="" />
                                <h3 class="text-dark text-uppercase mt-2 mb-4 fw-bold">
                                    Access Denied
                                </h3>
                                <p class="text-muted para-desc mx-auto">
                                    Looks like you are trying to post a job without a company profile.
                                    Please make a company profile first.
                                </p>

                                <div class="row col-12 justify-content-center mt-4" style="gap: 1rem">
                                    <a href="{{ route('job.index') }}" class="btn btn-light col-2">Back to Jobs</a>
                                    <a href="{{ route('company.create') }}" class="btn btn-primary col-2">Proceed</a>
                                </div>
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
