@section('title', 'Frequently Asked Questions | Jobnova')
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
                        <h5 class="heading fw-semibold mb-0 sub-heading text-white title-dark">Frequently Asked Questions
                        </h5>
                    </div>
                </div><!--end col-->
            </div><!--end row-->

            <div class="position-middle-bottom">
                <nav aria-label="breadcrumb" class="d-block">
                    <ul class="breadcrumb breadcrumb-muted mb-0 p-0">
                        <li class="breadcrumb-item"><a href="/">Jobnova</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('help-center') }}">Help Center</a></li>
                        <li class="breadcrumb-item active" aria-current="page">FAQs</li>
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

    <!-- Start Section -->
    <section class="section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-5 col-12 d-none d-md-block">
                    <div class="rounded shadow p-4 sticky-bar">
                        <ul class="list-unstyled sidebar-nav mb-0 py-0" id="navmenu-nav">
                            <li class="navbar-item p-0"><a href="#tech" class="h6 text-dark navbar-link">Buying
                                    Questions</a></li>
                            <li class="navbar-item mt-3 p-0"><a href="#general" class="h6 text-dark navbar-link">General
                                    Questions</a></li>
                            <li class="navbar-item mt-3 p-0"><a href="#payment" class="h6 text-dark navbar-link">Payments
                                    Questions</a></li>
                            <li class="navbar-item mt-3 p-0"><a href="#support" class="h6 text-dark navbar-link">Support
                                    Questions</a></li>
                        </ul>
                    </div>
                </div><!--end col-->

                <div class="col-lg-8 col-md-7 col-12">
                    <div class="section-title" id="tech">
                        <h4>Buying Product</h4>
                    </div>

                    <div class="accordion mt-4 pt-2" id="buyingquestion">
                        <div class="accordion-item rounded">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button border-0 bg-light" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne"
                                    style="background: none !important">
                                    How does it work ?
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse border-0 collapse show"
                                aria-labelledby="headingOne" data-bs-parent="#buyingquestion">
                                <div class="accordion-body text-muted">
                                    There are many variations of passages of Lorem Ipsum available, but the majority have
                                    suffered alteration in some form.
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
                            <div id="collapseTwo" class="accordion-collapse border-0 collapse" aria-labelledby="headingTwo"
                                data-bs-parent="#buyingquestion">
                                <div class="accordion-body text-muted">
                                    There are many variations of passages of Lorem Ipsum available, but the majority have
                                    suffered alteration in some form.
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
                                    There are many variations of passages of Lorem Ipsum available, but the majority have
                                    suffered alteration in some form.
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
                                    There are many variations of passages of Lorem Ipsum available, but the majority have
                                    suffered alteration in some form.
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="section-title mt-5" id="general">
                        <h4>General Questions</h4>
                    </div>

                    <div class="accordion mt-4 pt-2" id="generalquestion">
                        <div class="accordion-item rounded">
                            <h2 class="accordion-header" id="headingfive">
                                <button class="accordion-button border-0 bg-light" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapsefive" aria-expanded="true"
                                    aria-controls="collapsefive" style="background: none !important">
                                    How does it work ?
                                </button>
                            </h2>
                            <div id="collapsefive" class="accordion-collapse border-0 collapse show"
                                aria-labelledby="headingfive" data-bs-parent="#generalquestion">
                                <div class="accordion-body text-muted">
                                    There are many variations of passages of Lorem Ipsum available, but the majority have
                                    suffered alteration in some form.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item rounded mt-2">
                            <h2 class="accordion-header" id="headingsix">
                                <button class="accordion-button border-0 bg-light collapsed" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapsesix" aria-expanded="false"
                                    aria-controls="collapsesix" style="background: none !important">
                                    Do I need a designer to use Jobnova ?
                                </button>
                            </h2>
                            <div id="collapsesix" class="accordion-collapse border-0 collapse"
                                aria-labelledby="headingsix" data-bs-parent="#generalquestion">
                                <div class="accordion-body text-muted">
                                    There are many variations of passages of Lorem Ipsum available, but the majority have
                                    suffered alteration in some form.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item rounded mt-2">
                            <h2 class="accordion-header" id="headingseven">
                                <button class="accordion-button border-0 bg-light collapsed" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapseseven" aria-expanded="false"
                                    aria-controls="collapseseven" style="background: none !important">
                                    What do I need to do to start selling ?
                                </button>
                            </h2>
                            <div id="collapseseven" class="accordion-collapse border-0 collapse"
                                aria-labelledby="headingseven" data-bs-parent="#generalquestion">
                                <div class="accordion-body text-muted">
                                    There are many variations of passages of Lorem Ipsum available, but the majority have
                                    suffered alteration in some form.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item rounded mt-2">
                            <h2 class="accordion-header" id="headingeight">
                                <button class="accordion-button border-0 bg-light collapsed" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapseeight" aria-expanded="false"
                                    aria-controls="collapseeight" style="background: none !important">
                                    What happens when I receive an order ?
                                </button>
                            </h2>
                            <div id="collapseeight" class="accordion-collapse border-0 collapse"
                                aria-labelledby="headingeight" data-bs-parent="#generalquestion">
                                <div class="accordion-body text-muted">
                                    There are many variations of passages of Lorem Ipsum available, but the majority have
                                    suffered alteration in some form.
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="section-title mt-5" id="payment">
                        <h4>Payments Questions</h4>
                    </div>

                    <div class="accordion mt-4 pt-2" id="paymentquestion">
                        <div class="accordion-item rounded">
                            <h2 class="accordion-header" id="headingnine">
                                <button class="accordion-button border-0 bg-light" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapsenine" aria-expanded="true"
                                    aria-controls="collapsenine" style="background: none !important">
                                    How does it work ?
                                </button>
                            </h2>
                            <div id="collapsenine" class="accordion-collapse border-0 collapse show"
                                aria-labelledby="headingnine" data-bs-parent="#paymentquestion">
                                <div class="accordion-body text-muted">
                                    There are many variations of passages of Lorem Ipsum available, but the majority have
                                    suffered alteration in some form.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item rounded mt-2">
                            <h2 class="accordion-header" id="headingten">
                                <button class="accordion-button border-0 bg-light collapsed" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapseten" aria-expanded="false"
                                    aria-controls="collapseten" style="background: none !important">
                                    Do I need a designer to use Jobnova ?
                                </button>
                            </h2>
                            <div id="collapseten" class="accordion-collapse border-0 collapse"
                                aria-labelledby="headingten" data-bs-parent="#paymentquestion">
                                <div class="accordion-body text-muted">
                                    There are many variations of passages of Lorem Ipsum available, but the majority have
                                    suffered alteration in some form.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item rounded mt-2">
                            <h2 class="accordion-header" id="headingeleven">
                                <button class="accordion-button border-0 bg-light collapsed" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapseeleven" aria-expanded="false"
                                    aria-controls="collapseeleven" style="background: none !important">
                                    What do I need to do to start selling ?
                                </button>
                            </h2>
                            <div id="collapseeleven" class="accordion-collapse border-0 collapse"
                                aria-labelledby="headingeleven" data-bs-parent="#paymentquestion">
                                <div class="accordion-body text-muted">
                                    There are many variations of passages of Lorem Ipsum available, but the majority have
                                    suffered alteration in some form.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item rounded mt-2">
                            <h2 class="accordion-header" id="headingtwelve">
                                <button class="accordion-button border-0 bg-light collapsed" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapsetwelve" aria-expanded="false"
                                    aria-controls="collapsetwelve" style="background: none !important">
                                    What happens when I receive an order ?
                                </button>
                            </h2>
                            <div id="collapsetwelve" class="accordion-collapse border-0 collapse"
                                aria-labelledby="headingtwelve" data-bs-parent="#paymentquestion">
                                <div class="accordion-body text-muted">
                                    There are many variations of passages of Lorem Ipsum available, but the majority have
                                    suffered alteration in some form.
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="section-title mt-5" id="support">
                        <h4>Support Questions</h4>
                    </div>

                    <div class="accordion mt-4 pt-2" id="supportquestion">
                        <div class="accordion-item rounded">
                            <h2 class="accordion-header" id="headingthirteen">
                                <button class="accordion-button border-0 bg-light" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapsethirteen" aria-expanded="true"
                                    aria-controls="collapsethirteen" style="background: none !important">
                                    How does it work ?
                                </button>
                            </h2>
                            <div id="collapsethirteen" class="accordion-collapse border-0 collapse show"
                                aria-labelledby="headingthirteen" data-bs-parent="#supportquestion">
                                <div class="accordion-body text-muted">
                                    There are many variations of passages of Lorem Ipsum available, but the majority have
                                    suffered alteration in some form.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item rounded mt-2">
                            <h2 class="accordion-header" id="headingfourteen">
                                <button class="accordion-button border-0 bg-light collapsed" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapsefourteen" aria-expanded="false"
                                    aria-controls="collapsefourteen" style="background: none !important">
                                    Do I need a designer to use Jobnova ?
                                </button>
                            </h2>
                            <div id="collapsefourteen" class="accordion-collapse border-0 collapse"
                                aria-labelledby="headingfourteen" data-bs-parent="#supportquestion">
                                <div class="accordion-body text-muted">
                                    There are many variations of passages of Lorem Ipsum available, but the majority have
                                    suffered alteration in some form.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item rounded mt-2">
                            <h2 class="accordion-header" id="headingfifteen">
                                <button class="accordion-button border-0 bg-light collapsed" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapsefifteen" aria-expanded="false"
                                    aria-controls="collapsefifteen" style="background: none !important">
                                    What do I need to do to start selling ?
                                </button>
                            </h2>
                            <div id="collapsefifteen" class="accordion-collapse border-0 collapse"
                                aria-labelledby="headingfifteen" data-bs-parent="#supportquestion">
                                <div class="accordion-body text-muted">
                                    There are many variations of passages of Lorem Ipsum available, but the majority have
                                    suffered alteration in some form.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item rounded mt-2">
                            <h2 class="accordion-header" id="headingsixteen">
                                <button class="accordion-button border-0 bg-light collapsed" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapsesixteen" aria-expanded="false"
                                    aria-controls="collapsesixteen" style="background: none !important">
                                    What happens when I receive an order ?
                                </button>
                            </h2>
                            <div id="collapsesixteen" class="accordion-collapse border-0 collapse"
                                aria-labelledby="headingsixteen" data-bs-parent="#supportquestion">
                                <div class="accordion-body text-muted">
                                    There are many variations of passages of Lorem Ipsum available, but the majority have
                                    suffered alteration in some form.
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->
    </section><!--end section-->
    <!-- End Section -->
    @include('layout.footer')
@endsection
