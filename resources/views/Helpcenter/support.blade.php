@section('title', 'Submit Support Request | Jobnova')
@extends('layout.master')
@section('content')
    @include('layout.nav')
    <!-- Hero Start -->
    <section class="bg-half-170 d-table w-100" style="background: url('{{ asset('images/hero/bg.jpg') }}');">
        <div class="bg-overlay bg-gradient-overlay"></div>
        <div class="container">
            <div class="row mt-5 justify-content-center">
                <div class="col-12">
                    <div class="title-heading text-center">
                        <h5 class="heading fw-semibold mb-0 sub-heading text-white title-dark">Submit your Support Request
                        </h5>
                    </div>
                </div><!--end col-->
            </div><!--end row-->

            <div class="position-middle-bottom">
                <nav aria-label="breadcrumb" class="d-block">
                    <ul class="breadcrumb breadcrumb-muted mb-0 p-0">
                        <li class="breadcrumb-item"><a href="/">Jobnova</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('help-center') }}">Help Center</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Support</li>
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
                <div class="col-lg-7 col-12">
                    <div class="rounded p-4 shadow">
                        <div class="row">
                            <div class="col-12">
                                <form>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label fw-semibold">Your Name <span
                                                        class="text-danger">*</span></label>
                                                <input name="name" id="name" type="text" class="form-control"
                                                    placeholder="First Name :">
                                            </div>
                                        </div><!--end col-->
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label fw-semibold">Your Email <span
                                                        class="text-danger">*</span></label>
                                                <input name="email" id="email" type="email" class="form-control"
                                                    placeholder="Your email :">
                                            </div>
                                        </div><!--end col-->
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label class="form-label fw-semibold">Subject</label>
                                                <input name="subject" id="subject" class="form-control"
                                                    placeholder="Your subject :">
                                            </div>
                                        </div><!--end col-->
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label class="form-label fw-semibold">Comments</label>
                                                <textarea name="comments" id="comments" rows="4" class="form-control" placeholder="Your Message :"></textarea>
                                            </div>
                                        </div>
                                    </div><!--end row-->
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <input type="submit" id="submit" name="send" class="btn btn-primary"
                                                value="Send Request">
                                        </div><!--end col-->
                                    </div><!--end row-->
                                </form><!--end form-->
                            </div><!--end col-->
                        </div><!--end row-->
                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->
    </section><!--end section-->
    <!-- End Section -->
    @include('layout.footer')
@endsection