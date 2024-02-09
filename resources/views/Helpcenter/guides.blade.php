@section('title', 'Guides & Support | Jobnova')
@extends('layout.master')
@section('content')
    @include('layout.nav')
    <!-- Hero Start -->
    <section class="bg-half-170 d-table w-100" style="background: url('images/hero/bg.jpg');">
        <div class="bg-overlay bg-gradient-overlay"></div>
        <div class="container">
            <div class="row mt-5 justify-content-center">
                <div class="col-12">
                    <div class="title-heading text-center">
                        <h5 class="heading fw-semibold mb-0 sub-heading text-white title-dark">Guides & Support</h5>
                    </div>
                </div><!--end col-->
            </div><!--end row-->

            <div class="position-middle-bottom">
                <nav aria-label="breadcrumb" class="d-block">
                    <ul class="breadcrumb breadcrumb-muted mb-0 p-0">
                        <li class="breadcrumb-item"><a href="/">Jobnova</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('help-center') }}">Help Center</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Guides</li>
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
            <div class="row">
                <div class="col-lg-4 col-md-6 col-12">
                    <h5>Getting started</h5>
                    <ul class="list-unstyled mt-4 mb-0">
                        <li class="mt-2">
                            <a href="javascript:void(0)" class="text-muted">
                                <i class="fa-solid fa-arrow-right text-primary me-2"></i>
                                Deciding to purchase
                            </a>
                        </li>
                        <li class="mt-2">
                            <a href="javascript:void(0)" class="text-muted">
                                <i class="fa-solid fa-arrow-right text-primary me-2"></i>
                                List your space
                            </a>
                        </li>
                        <li class="mt-2">
                            <a href="javascript:void(0)" class="text-muted">
                                <i class="fa-solid fa-arrow-right text-primary me-2"></i>
                                Landing an experience or adventure
                            </a>
                        </li>
                        <li class="mt-2">
                            <a href="javascript:void(0)" class="text-muted">
                                <i class="fa-solid fa-arrow-right text-primary me-2"></i>
                                Top uses questions
                            </a>
                        </li>
                    </ul>
                </div><!--end col-->

                <div class="col-lg-4 col-md-6 col-12 mt-4 mt-sm-0 pt-2 pt-sm-0">
                    <h5>Your calendar</h5>
                    <ul class="list-unstyled mt-4 mb-0">
                        <li class="mt-2">
                            <a href="javascript:void(0)" class="text-muted">
                                <i class="fa-solid fa-arrow-right text-primary me-2"></i>
                                Pricing & availability
                            </a>
                        </li>
                        <li class="mt-2">
                            <a href="javascript:void(0)" class="text-muted">
                                <i class="fa-solid fa-arrow-right text-primary me-2"></i>Booking settings
                            </a>
                        </li>
                        <li class="mt-2">
                            <a href="javascript:void(0)" class="text-muted">
                                <i class="fa-solid fa-arrow-right text-primary me-2"></i>Responding to enquiries & requests
                            </a>
                        </li>
                        <li class="mt-2">
                            <a href="javascript:void(0)" class="text-muted">
                                <i class="fa-solid fa-arrow-right text-primary me-2"></i>Snoozing or deactivating your
                                listing
                            </a>
                        </li>
                    </ul>
                </div><!--end col-->

                <div class="col-lg-4 col-md-6 col-12 mt-4 mt-lg-0 pt-2 pt-lg-0 pt-2">
                    <h5>Your listings</h5>
                    <ul class="list-unstyled mt-4 mb-0">
                        <li class="mt-2">
                            <a href="javascript:void(0)" class="text-muted">
                                <i class="fa-solid fa-arrow-right text-primary me-2"></i>
                                Updating your listing
                            </a>
                        </li>
                        <li class="mt-2">
                            <a href="javascript:void(0)" class="text-muted">
                                <i class="fa-solid fa-arrow-right text-primary me-2"></i>
                                Neighbourhoods
                            </a>
                        </li>
                        <li class="mt-2">
                            <a href="javascript:void(0)" class="text-muted">
                                <i class="fa-solid fa-arrow-right text-primary me-2"></i>
                                Listing photos & photography
                            </a>
                        </li>
                        <li class="mt-2">
                            <a href="javascript:void(0)" class="text-muted">
                                <i class="fa-solid fa-arrow-right text-primary me-2"></i>
                                Jobnova Plus
                            </a>
                        </li>
                        <li class="mt-2">
                            <a href="javascript:void(0)" class="text-muted">
                                <i class="fa-solid fa-arrow-right text-primary me-2"></i>
                                API-connected software
                            </a>
                        </li>
                    </ul>
                </div><!--end col-->

                <div class="col-lg-4 col-md-6 col-12 mt-4 pt-2">
                    <h5>How payouts work</h5>
                    <ul class="list-unstyled mt-4 mb-0">
                        <li class="mt-2">
                            <a href="javascript:void(0)" class="text-muted">
                                <i class="fa-solid fa-arrow-right text-primary me-2"></i>
                                Getting paid
                            </a>
                        </li>
                        <li class="mt-2">
                            <a href="javascript:void(0)" class="text-muted">
                                <i class="fa-solid fa-arrow-right text-primary me-2"></i>
                                Adding payout info
                            </a>
                        </li>
                        <li class="mt-2">
                            <a href="javascript:void(0)" class="text-muted">
                                <i class="fa-solid fa-arrow-right text-primary me-2"></i>
                                Your payout status
                            </a>
                        </li>
                        <li class="mt-2">
                            <a href="javascript:void(0)" class="text-muted">
                                <i class="fa-solid fa-arrow-right text-primary me-2"></i>
                                Donations
                            </a>
                        </li>
                        <li class="mt-2">
                            <a href="javascript:void(0)" class="text-muted">
                                <i class="fa-solid fa-arrow-right text-primary me-2"></i>
                                Taxes
                            </a>
                        </li>
                    </ul>
                </div><!--end col-->

                <div class="col-lg-4 col-md-6 col-12 mt-4 pt-2">
                    <h5>Your reservations</h5>
                    <ul class="list-unstyled mt-4 mb-0">
                        <li class="mt-2">
                            <a href="javascript:void(0)" class="text-muted">
                                <i class="fa-solid fa-arrow-right text-primary me-2"></i>
                                Jobnova safely
                            </a>
                        </li>
                        <li class="mt-2">
                            <a href="javascript:void(0)" class="text-muted">
                                <i class="fa-solid fa-arrow-right text-primary me-2"></i>
                                Jobnova Experiences and
                                Adventures
                            </a>
                        </li>
                        <li class="mt-2">
                            <a href="javascript:void(0)" class="text-muted">
                                <i class="fa-solid fa-arrow-right text-primary me-2"></i>
                                Changing a reservation
                            </a>
                        </li>
                        <li class="mt-2">
                            <a href="javascript:void(0)" class="text-muted">
                                <i class="fa-solid fa-arrow-right text-primary me-2"></i>
                                Cancelling a reservation
                            </a>
                        </li>
                        <li class="mt-2">
                            <a href="javascript:void(0)" class="text-muted">
                                <i class="fa-solid fa-arrow-right text-primary me-2"></i>
                                Long-term reservations
                            </a>
                        </li>
                    </ul>
                </div><!--end col-->

                <div class="col-lg-4 col-md-6 col-12 mt-4 pt-2">
                    <h5>Reservation help</h5>
                    <ul class="list-unstyled mt-4 mb-0">
                        <li class="mt-2">
                            <a href="javascript:void(0)" class="text-muted">
                                <i class="fa-solid fa-arrow-right text-primary me-2"></i>
                                Help with a reservation or guest
                            </a>
                        </li>
                        <li class="mt-2">
                            <a href="javascript:void(0)" class="text-muted">
                                <i class="fa-solid fa-arrow-right text-primary me-2"></i>
                                Guest cancellations
                            </a>
                        </li>
                    </ul>
                </div><!--end col-->

                <div class="col-lg-4 col-md-6 col-12 mt-4 pt-2">
                    <h5>Your account</h5>
                    <ul class="list-unstyled mt-4 mb-0">
                        <li class="mt-2">
                            <a href="javascript:void(0)" class="text-muted">
                                <i class="fa-solid fa-arrow-right text-primary me-2"></i>
                                Your profile
                            </a>
                        </li>
                        <li class="mt-2">
                            <a href="javascript:void(0)" class="text-muted">
                                <i class="fa-solid fa-arrow-right text-primary me-2"></i>
                                Account security
                            </a>
                        </li>
                        <li class="mt-2">
                            <a href="javascript:void(0)" class="text-muted">
                                <i class="fa-solid fa-arrow-right text-primary me-2"></i>
                                Identification & verifications
                            </a>
                        </li>
                        <li class="mt-2">
                            <a href="javascript:void(0)" class="text-muted">
                                <i class="fa-solid fa-arrow-right text-primary me-2"></i>
                                Reviews
                            </a>
                        </li>
                        <li class="mt-2">
                            <a href="javascript:void(0)" class="text-muted">
                                <i class="fa-solid fa-arrow-right text-primary me-2"></i>
                                Superhost status
                            </a>
                        </li>
                    </ul>
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->
    </section><!--end section-->
    <!-- End Section -->
    @include('layout.footer')
@endsection