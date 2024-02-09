@section('title', 'Our Services | Jobnova')
@extends('layout.master')
@section('content')
    @include('layout.nav')
    <!-- Hero Start -->
    <section class="bg-half-170 d-table w-100" style="background: url({{ asset('images/hero/bg.jpg') }});">
        <div class="bg-overlay bg-gradient-overlay"></div>
        <div class="container">
            <div class="row mt-5 justify-content-center">
                <div class="col-12">
                    <div class="title-heading text-center">
                        <h5 class="heading fw-semibold mb-0 sub-heading text-white title-dark">How it works?</h5>
                    </div>
                </div><!--end col-->
            </div><!--end row-->

            <div class="position-middle-bottom">
                <nav aria-label="breadcrumb" class="d-block">
                    <ul class="breadcrumb breadcrumb-muted mb-0 p-0">
                        <li class="breadcrumb-item"><a href="/">Jobnova</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Services</li>
                    </ul>
                </nav>
            </div>
        </div><!--end container-->
    </section><!--end section-->
    <div class="position-relative">
        <div class="shape overflow-hidden text-white">
            <svg viewBox="0 0 2880 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0 48H1437.5H2880V0H2160C1442.5 52 720 0 720 0H0V48Z" fill="currentColor"></path>
            </svg>
        </div>
    </div>
    <!-- Hero End -->

    <!-- Start -->
    <section class="section">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                    <div class="position-relative features text-center p-4 rounded shadow bg-white">
                        <div
                            class="feature-icon bg-soft-primary rounded shadow mx-auto position-relative overflow-hidden d-flex justify-content-center align-items-center">
                            <i class="fa-solid fa-phone fea icon-ex-md h3"></i>
                        </div>

                        <div class="mt-4">
                            <a href={{ route('services') }} class="title h5 text-dark">24/7 Support</a>
                            <p class="text-muted mt-3 mb-0">Many desktop publishing now use and a search for job.</p>
                            <div class="mt-3">
                                <a href={{ route('services') }} class="btn btn-link primary text-dark">Read More
                                    <i class="fa-solid fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div><!--end col-->

                <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                    <div class="position-relative features text-center p-4 rounded shadow bg-white">
                        <div
                            class="feature-icon bg-soft-primary rounded shadow mx-auto position-relative overflow-hidden d-flex justify-content-center align-items-center">
                            <i class="fa-solid fa-microchip fea icon-ex-md h3"></i>
                        </div>

                        <div class="mt-4">
                            <a href={{ route('services') }} class="title h5 text-dark">Tech & Startup Jobs</a>
                            <p class="text-muted mt-3 mb-0">Many desktop publishing now use and a search for job.</p>
                            <div class="mt-3">
                                <a href={{ route('services') }} class="btn btn-link primary text-dark">Read More
                                    <i class="fa-solid fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div><!--end col-->

                <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                    <div class="position-relative features text-center p-4 rounded shadow bg-white">
                        <div
                            class="feature-icon bg-soft-primary rounded shadow mx-auto position-relative overflow-hidden d-flex justify-content-center align-items-center">
                            <i class="fa-solid fa-wave-square fea icon-ex-md h3"></i>
                        </div>

                        <div class="mt-4">
                            <a href={{ route('services') }} class="title h5 text-dark">Quick & Easy</a>
                            <p class="text-muted mt-3 mb-0">Many desktop publishing now use and a search for job.</p>
                            <div class="mt-3">
                                <a href={{ route('services') }} class="btn btn-link primary text-dark">Read More
                                    <i class="fa-solid fa-arrow-right">
                                    </i></a>
                            </div>
                        </div>
                    </div>
                </div><!--end col-->

                <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                    <div class="position-relative features text-center p-4 rounded shadow bg-white">
                        <div
                            class="feature-icon bg-soft-primary rounded shadow mx-auto position-relative overflow-hidden d-flex justify-content-center align-items-center">
                            <i class="fa-solid fa-clock fea icon-ex-md h3"></i>
                        </div>

                        <div class="mt-4">
                            <a href={{ route('services') }} class="title h5 text-dark">Save Time</a>
                            <p class="text-muted mt-3 mb-0">Many desktop publishing now use and a search for job.</p>
                            <div class="mt-3">
                                <a href={{ route('services') }} class="btn btn-link primary text-dark">Read More
                                    <i class="fa-solid fa-arrow-right">
                                    </i></a>
                            </div>
                        </div>
                    </div>
                </div><!--end col-->

                <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                    <div class="position-relative features text-center p-4 rounded shadow bg-white">
                        <div
                            class="feature-icon bg-soft-primary rounded shadow mx-auto position-relative overflow-hidden d-flex justify-content-center align-items-center">
                            <i class="fa-solid fa-file-text fea icon-ex-md h3"></i>
                        </div>

                        <div class="mt-4">
                            <a href={{ route('services') }} class="title h5 text-dark">Apply with confidence</a>
                            <p class="text-muted mt-3 mb-0">Many desktop publishing now use and a search for job.</p>
                            <div class="mt-3">
                                <a href={{ route('services') }} class="btn btn-link primary text-dark">Read More
                                    <i class="fa-solid fa-arrow-right">
                                    </i></a>
                            </div>
                        </div>
                    </div>
                </div><!--end col-->

                <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                    <div class="position-relative features text-center p-4 rounded shadow bg-white">
                        <div
                            class="feature-icon bg-soft-primary rounded shadow mx-auto position-relative overflow-hidden d-flex justify-content-center align-items-center">
                            <i class="fa-solid fa-cube fea icon-ex-md h3"></i>
                        </div>

                        <div class="mt-4">
                            <a href={{ route('services') }} class="title h5 text-dark">Reduce Hiring Bias</a>
                            <p class="text-muted mt-3 mb-0">Many desktop publishing now use and a search for job.</p>
                            <div class="mt-3">
                                <a href={{ route('services') }} class="btn btn-link primary text-dark">Read More
                                    <i class="fa-solid fa-arrow-right">
                                    </i></a>
                            </div>
                        </div>
                    </div>
                </div><!--end col-->

                <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                    <div class="position-relative features text-center p-4 rounded shadow bg-white">
                        <div
                            class="feature-icon bg-soft-primary rounded shadow mx-auto position-relative overflow-hidden d-flex justify-content-center align-items-center">
                            <i class="fa-solid fa-users fea icon-ex-md h3"></i>
                        </div>

                        <div class="mt-4">
                            <a href={{ route('services') }} class="title h5 text-dark">Proactive Employers</a>
                            <p class="text-muted mt-3 mb-0">Many desktop publishing now use and a search for job.</p>
                            <div class="mt-3">
                                <a href={{ route('services') }} class="btn btn-link primary text-dark">Read More
                                    <i class="fa-solid fa-arrow-right">
                                    </i></a>
                            </div>
                        </div>
                    </div>
                </div><!--end col-->

                <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                    <div class="position-relative features text-center p-4 rounded shadow bg-white">
                        <div
                            class="feature-icon bg-soft-primary rounded shadow mx-auto position-relative overflow-hidden d-flex justify-content-center align-items-center">
                            <i class="fa-solid fa-user-check fea icon-ex-md h3"></i>
                        </div>

                        <div class="mt-4">
                            <a href={{ route('services') }} class="title h5 text-dark">No Missed Opportunities</a>
                            <p class="text-muted mt-3 mb-0">Many desktop publishing now use and a search for job.</p>
                            <div class="mt-3">
                                <a href={{ route('services') }} class="btn btn-link primary text-dark">Read More
                                    <i class="fa-solid fa-arrow-right">
                                    </i></a>
                            </div>
                        </div>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->

        <div class="container mt-100 mt-60">
            <div class="row g-4 align-items-center">
                <div class="col-lg-6 col-md-6 mb-5">
                    <div class="about-left">
                        <div class="position-relative shadow rounded img-one">
                            <img src="{{ asset('images/about/ab01.jpg') }}" class="img-fluid rounded" alt="work-image">
                        </div>

                        <div class="img-two shadow rounded p-2 bg-white">
                            <img src="{{ asset('images/about/ab02.jpg') }}" class="img-fluid rounded" alt="work-image">

                            <div class="position-absolute top-0 start-50 translate-middle">
                                <a href="www.youtube.com" data-type="youtube" data-id="yba7hPeTSjk"
                                    class="avatar avatar-md-md rounded-pill shadow card d-flex justify-content-center align-items-center lightbox">
                                    <i class="fa-solid fa-play mdi-24px text-primary"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div><!--end col-->

                <div class="col-lg-6 col-md-6">
                    <div class="section-title mb-4 ms-lg-3">
                        <h4 class="title mb-3">Frequently Asked Questions</h4>
                        <p class="text-muted para-desc mb-0">Search all the open positions on the web. Get your own
                            personalized salary estimate. Read reviews on over 30000+ companies worldwide.</p>

                        <div class="accordion mt-4 pt-2" id="buyingquestion">
                            <div class="accordion-item rounded">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button border-0 bg-light" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true"
                                        aria-controls="collapseOne" style="background: none !important">
                                        How does it work ?
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse border-0 collapse show"
                                    aria-labelledby="headingOne" data-bs-parent="#buyingquestion">
                                    <div class="accordion-body text-muted">
                                        There are many variations of passages of Lorem Ipsum available, but the majority
                                        have suffered alteration in some form.
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item rounded mt-2">
                                <h2 class="accordion-header" id="headingTwo">
                                    <button class="accordion-button border-0 bg-light collapsed" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false"
                                        aria-controls="collapseTwo" style="background: none !important">
                                        Do I need a designer to use Jobnova ?
                                    </button>
                                </h2>
                                <div id="collapseTwo" class="accordion-collapse border-0 collapse"
                                    aria-labelledby="headingTwo" data-bs-parent="#buyingquestion">
                                    <div class="accordion-body text-muted">
                                        There are many variations of passages of Lorem Ipsum available, but the majority
                                        have suffered alteration in some form.
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item rounded mt-2">
                                <h2 class="accordion-header" id="headingThree">
                                    <button class="accordion-button border-0 bg-light collapsed" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false"
                                        aria-controls="collapseThree" style="background: none !important">
                                        What do I need to do to start selling ?
                                    </button>
                                </h2>
                                <div id="collapseThree" class="accordion-collapse border-0 collapse"
                                    aria-labelledby="headingThree" data-bs-parent="#buyingquestion">
                                    <div class="accordion-body text-muted">
                                        There are many variations of passages of Lorem Ipsum available, but the majority
                                        have suffered alteration in some form.
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item rounded mt-2">
                                <h2 class="accordion-header" id="headingFour">
                                    <button class="accordion-button border-0 bg-light collapsed" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false"
                                        aria-controls="collapseFour" style="background: none !important">
                                        What happens when I receive an order ?
                                    </button>
                                </h2>
                                <div id="collapseFour" class="accordion-collapse border-0 collapse"
                                    aria-labelledby="headingFour" data-bs-parent="#buyingquestion">
                                    <div class="accordion-body text-muted">
                                        There are many variations of passages of Lorem Ipsum available, but the majority
                                        have suffered alteration in some form.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->
    </section>
    <!-- End -->
    @include('layout.footer')
@endsection
