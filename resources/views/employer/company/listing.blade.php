@section('title', 'Company Listings | Jobnova')
@extends('layout.master')
@section('content')
    @include('layout.nav')
    <style type="text/css">
        .typewrite>.wrap {
            border-right: 0.08em solid transparent
        }
    </style>
    <div class="white-space"></div>
    <!-- Hero Start -->
    <section class="bg-half-170 d-table w-100" style="background: url('images/hero/bg.jpg');">
        <div class="bg-overlay bg-gradient-overlay"></div>
        <div class="container">
            <div class="row mt-5 justify-content-center">
                <div class="col-12">
                    <div class="title-heading text-center">
                        <h5 class="heading fw-semibold mb-0 sub-heading text-white title-dark">Browse Companies</h5>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->
    </section>
    <!--end section-->
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
            <div class="row justify-content-center">
                <div class="col-12 mt-4">
                    <div class="features-absolute">
                        <div class="d-md-flex justify-content-between align-items-center bg-white shadow rounded p-4">
                            <form class="card-body text-start">
                                <div class="registration-form text-dark text-start">
                                    <div class="row g-lg-0">
                                        <div class="col-lg-3 col-md-6 col-12">
                                            <div class="mb-3 mb-sm-0">
                                                <div class="filter-search-form position-relative filter-border">
                                                    <i class="fa-solid fa-magnifying-glass icons"></i>
                                                    <input name="name" type="text" id="job-keyword"
                                                        class="form-control filter-input-box bg-light border-0"
                                                        placeholder="Search your keywords">
                                                </div>
                                            </div>
                                        </div><!--end col-->

                                        <div class="col-lg-3 col-md-6 col-12">
                                            <div class="mb-3 mb-sm-0">
                                                <label class="form-label d-none fs-6">Location:</label>
                                                <div class="filter-search-form position-relative filter-border">
                                                    <i class="fa-solid fa-location-dot icons"></i>
                                                    <select class="form-select search-select">
                                                        <option class="search-select-item" value="" disabled selected>
                                                            Country</option>
                                                        @foreach ($cities as $city)
                                                            <option class="search-select-item" value="{{ $city }}">
                                                                {{ $city }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div><!--end col-->

                                        <div class="col-lg-3 col-md-6 col-12">
                                            <div class="mb-3 mb-sm-0">
                                                <div class="filter-search-form relative filter-border">
                                                    <i class="fa-solid fa-briefcase icons"></i>
                                                    <select class="form-select search-select">
                                                        <option class="search-select-item" value="" disabled selected>
                                                            Field</option>
                                                        @foreach ($categories as $category)
                                                            <option class="search-select-item" value="{{ $category->id }}">
                                                                {{ $category->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div><!--end col-->

                                        <div class="col-lg-3 col-md-6 col-12">
                                            <input type="submit" id="search" name="search"
                                                style="border-radius: 6px !important;height: 60px;"
                                                class="btn btn-primary searchbtn w-100" value="Search">
                                        </div><!--end col-->
                                    </div><!--end row-->
                                </div>
                            </form><!--end form-->
                        </div>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->

        <div class="container">
            <div class="row g-4 gy-5">
                @foreach ($companies as $company)
                    <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                        <div class="employer-card position-relative bg-white rounded shadow p-4 mt-3">
                            <div
                                class="employer-img d-flex justify-content-center align-items-center bg-white shadow-md rounded">
                                <img src="{{ asset('uploads/' . $company->img) }}" class="avatar avatar-ex-small"
                                    alt="">
                            </div>

                            <div class="content mt-3">
                                <a href="{{ route('company.profile', $company->created_by) }}"
                                    class="title text-dark h5">{{ $company->name }}</a>

                                <p class="text-muted mt-2 mb-0">
                                    {{ Str::limit($company->bio, $limit = 80, $end = '.....') }}</p>
                            </div>

                            <ul
                                class="list-unstyled d-flex justify-content-between align-items-center border-top mt-3 pt-3 mb-0">
                                <li class="text-muted d-inline-flex align-items-center">
                                    <i class="fa-solid fa-location-dot icon-sm me-1 align-middle"></i>
                                    {{ $company->country }}
                                </li>
                                <li class="list-inline-item text-primary fw-medium">{{ count($company->jobs) }} Jobs</li>
                            </ul>
                        </div>
                    </div><!--end col-->
                @endforeach
            </div><!--end row-->
            <div class="d-flex justify-content-center mt-5">
                {{ $companies->links() }}
            </div>
        </div><!--end container-->

        <div class="container mt-100 mt-60">
            <div class="row g-4 align-items-center">
                <div class="col-lg-6 col-md-6 mb-5">
                    <div class="about-left">
                        <div class="position-relative shadow rounded img-one">
                            <img src="images/about/ab01.jpg" class="img-fluid rounded" alt="work-image">
                        </div>

                        <div class="img-two shadow rounded p-2 bg-white">
                            <img src="images/about/ab02.jpg" class="img-fluid rounded" alt="work-image">

                            <div class="position-absolute top-0 start-50 translate-middle">
                                <a href="#!" data-type="youtube" data-id="yba7hPeTSjk"
                                    class="avatar avatar-md-md rounded-pill shadow card d-flex justify-content-center align-items-center lightbox">
                                    <i class="fa-solid fa-play text-primary"></i>
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
                                        aria-controls="collapseOne" style="background-color: transparent !important">
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
                                        aria-controls="collapseTwo" style="background-color: transparent !important">
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
                                        aria-controls="collapseThree" style="background-color: transparent !important">
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
                                        aria-controls="collapseFour" style="background-color: transparent !important">
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
    <!--end section-->
    <!-- End -->
    @include('layout.footer')
@endsection
