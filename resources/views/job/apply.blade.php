@section('title', 'Jobs page')
@extends('layout.master')
@section('content')
    <style>
        .search-bar .searchform:after {
            display: none !important;
        }
    </style>
    @include('layout.nav')
    <div class="white-space"></div>
    <!-- Job apply form Start -->
    <section class="section bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7 col-md-7">
                    <div class="card border-0">
                        <form class="rounded shadow p-4">
                            <div class="row">
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label class="form-label fw-semibold">Your Name :<span
                                                class="text-danger">*</span></label>
                                        <input name="name" id="name2" type="text" class="form-control"
                                            placeholder="First Name :" />
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label class="form-label fw-semibold">Your Email :<span
                                                class="text-danger">*</span></label>
                                        <input name="email" id="email2" type="email" class="form-control"
                                            placeholder="Your email :" />
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label class="form-label fw-semibold">Your Phone no. :<span
                                                class="text-danger">*</span></label>
                                        <input name="number" id="number2" type="number" class="form-control"
                                            placeholder="Your phone no. :" />
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label class="form-label fw-semibold">Job Title :</label>
                                        <input name="subject" id="subject2" class="form-control" placeholder="Title :" />
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label class="form-label fw-semibold">Types of jobs :</label>
                                        <select class="form-control form-select" id="Sortbylist-Shop">
                                            <option>All Jobs</option>
                                            <option>Full Time</option>
                                            <option>Half Time</option>
                                            <option>Remote</option>
                                            <option>In Office</option>
                                        </select>
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label class="form-label fw-semibold">Description :</label>
                                        <textarea name="comments" id="comments2" rows="4" class="form-control" placeholder="Describe the job :"></textarea>
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label for="formFile" class="form-label fw-semibold">Upload Your Cv / Resume
                                            :</label>
                                        <input class="form-control" type="file" id="formFile" />
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-12">
                                    <div class="mb-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value=""
                                                id="flexCheckDefault" />
                                            <label class="form-check-label" for="flexCheckDefault">I Accept
                                                <a href="#" class="text-primary">Terms And Condition</a></label>
                                        </div>
                                    </div>
                                </div>
                                <!--end col-->
                            </div>
                            <!--end row-->
                            <div class="row">
                                <div class="col-12">
                                    <input type="submit" id="submit2" name="send" class="submitBnt btn btn-primary"
                                        value="Apply Now" />
                                </div>
                                <!--end col-->
                            </div>
                            <!--end row-->
                        </form>
                        <!--end form-->
                    </div>
                    <!--end custom-form-->
                </div>
            </div>
        </div>
        <!--end container-->
    </section>
    <!--end section-->
    <!-- Job apply form End -->
    @include('layout.footer')
@endsection
