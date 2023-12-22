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
    <div class="position-relative">
        <div class="shape overflow-hidden text-white">
            <svg viewBox="0 0 2880 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0 48H1437.5H2880V0H2160C1442.5 52 720 0 720 0H0V48Z" fill="currentColor"></path>
            </svg>
        </div>
    </div>
    <!-- Hero End -->

    <!-- Start -->
    <section class="section p-0">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="card bg-white p-4 rounded shadow sticky-bar">
                        <!-- SEARCH -->
                        <div>
                            <h6 class="mb-0">Search Properties</h6>

                            <div class="search-bar mt-2">
                                <div id="itemSearch2" class="menu-search mb-0">
                                    <form role="search" method="get" id="searchItemform2" class="searchform">
                                        <input type="text" class="form-control rounded border" name="s"
                                            id="searchItem2" placeholder="Search...">
                                        <input type="submit" id="searchItemsubmit2" value="Search">
                                        <i class="fa-solid fa-magnifying-glass lens"></i>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- SEARCH -->

                        <!-- Categories -->
                        <div class="mt-4">
                            <h6 class="mb-0">Categories</h6>
                            <select class="form-select form-control border mt-2" id="category" name="category_id">
                                <option selected disabled value="">Choose
                                    Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"> {{ $category->name }} </option>
                                @endforeach
                            </select>
                        </div>
                        <!-- Categories -->

                        <!-- Sub-ategories -->
                        <div class="mt-4">
                            <h6 class="mb-0">Sub-categories</h6>
                            <select class="form-select form-control border mt-2" aria-label="Default select example"
                                id="subcategory_id" name="subcategory_id">
                                <option selected disabled value="">Choose Sub-category</option>
                            </select>
                        </div>
                        <!-- Sub-categories -->

                        <!-- Country -->
                        <div class="mt-4">
                            <h6 class="mb-0">Country</h6>
                            <select class="form-select form-control border mt-2" aria-label="Default select example">
                                @foreach ($countries['name'] as $country)
                                    <option value="{{ $country }}">{{ $country }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <!-- Country -->

                        <!-- City -->
                        <div class="mt-4">
                            <h6 class="mb-0">Country</h6>
                            <select class="form-select form-control border mt-2" aria-label="Default select example">
                                @foreach ($cities['name'] as $city)
                                    <option value="{{ $city }}">{{ $city }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <!-- City -->

                        <!-- Type Start -->
                        <div class="mt-4">
                            <h6>Job Types</h6>

                            @foreach ($allEmploymentTypeCounts as $type => $count)
                                <div class="d-flex justify-content-between mt-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value=""
                                            id="{{ $type }}">
                                        <label class="form-check-label"
                                            for="{{ $type }}">{{ $type }}</label>
                                    </div>
                                    <span class="badge bg-soft-primary rounded-pill">{{ $count }}</span>
                                </div>
                            @endforeach
                        </div>
                        <!-- Type End -->

                        <!-- Salary -->
                        <div class="mt-4">
                            <h6 class="mb-0">Salary</h6>

                            <ul class="list-unstyled mt-2 mb-0">
                                <li class="mt-1">
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <div class="form-check mb-0">
                                            <input class="form-check-input" checked type="radio" name="flexRadioDefault"
                                                id="rent">
                                            <label class="form-check-label" for="rent">10k - 15k</label>
                                        </div>
                                    </div>
                                </li>

                                <li class="mt-1">
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <div class="form-check mb-0">
                                            <input class="form-check-input" checked type="radio" name="flexRadioDefault"
                                                id="buy">
                                            <label class="form-check-label" for="buy">15k - 25k</label>
                                        </div>
                                    </div>
                                </li>

                                <li class="mt-1">
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <div class="form-check mb-0">
                                            <input class="form-check-input" checked type="radio" name="flexRadioDefault"
                                                id="sell">
                                            <label class="form-check-label" for="sell">more than 25K</label>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <!-- Salary -->

                        <div class="mt-4">
                            <a href="#" class="btn btn-primary w-100">Apply Filter</a>
                        </div>
                    </div>
                </div><!--end col-->

                <div class="col-lg-8 col-md-6 col-12">
                    <div class="row g-4">
                        <a href="{{ route('job.create') }}" class="btn btn-primary mt-5">Post a job</a>
                        @foreach ($jobs as $job)
                            <div class="col-12">
                                <div
                                    class="job-post job-post-list rounded shadow p-4 d-md-flex align-items-center justify-content-between position-relative">
                                    <div class="d-flex align-items-center w-250px">
                                        <img src="{{ asset('uploads/' . $job->company->img) }}"
                                            class="avatar avatar-small rounded-circle shadow p-2 bg-white" alt="">
                                        <div class="ms-3">
                                            <a href="/jobs/{{ $job->id }}/details"
                                                class="h5 title text-dark">{{ substr($job->title, 0, 30) }}</a>
                                            <small class="d-flex align-items-center"><i
                                                    class="fa-regular fa-building text-primary me-1"></i>
                                                {{ $job->company->name }}</small>
                                        </div>
                                    </div>

                                    <div
                                        class="d-flex align-items-center justify-content-between d-md-block mt-3 mt-md-0 w-100px">
                                        <a class="badge bg-soft-primary rounded-pill">{{ $job->employment_type }}</a>
                                        <small class="text-muted d-flex align-items-center fw-medium mt-md-2"><i
                                                class="fa-regular fa-clock pe-1"></i></i>{{ $job->created_at->diffForHumans() }}</small>
                                    </div>

                                    <div
                                        class="d-flex align-items-center justify-content-between d-md-block mt-2 mt-md-0 w-130px">
                                        <a class="text-muted d-flex align-items-center"><i
                                                class="fa-solid fa-location-dot pe-1"></i>{{ $job->country }}</a>
                                        <span class="d-flex fw-medium mt-md-2">${{ $job->min_salary }} -
                                            ${{ $job->max_salary }}/mo</span>
                                    </div>

                                    <div class="mt-3 mt-md-0">
                                        <a href="#"
                                            class="btn btn-sm btn-icon btn-pills btn-soft-primary bookmark"><i
                                                class="fa-regular fa-bookmark"></i></a>
                                        <a href="/jobs/{{ $job->id }}/apply"
                                            class="btn btn-sm btn-primary w-full ms-md-1">Apply
                                            Now</a>
                                    </div>
                                </div>
                            </div><!--end col-->
                        @endforeach
                    </div><!--end row-->

                    {{ $jobs->links() }}
                    {{-- <div class="row">
                        <div class="col-12 mt-4 pt-2">
                            <ul class="pagination justify-content-center mb-0">
                                <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Previous">
                                        <span aria-hidden="true"><i class="mdi mdi-chevron-left fs-6"></i></span>
                                    </a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item active"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Next">
                                        <span aria-hidden="true"><i class="mdi mdi-chevron-right fs-6"></i></span>
                                    </a>
                                </li>
                            </ul>
                        </div><!--end col-->
                    </div><!--end row--> --}}
                </div>
            </div>
        </div><!--end container-->

        <div class="container mt-100 mt-60">
            <div class="row justify-content-center mb-4 pb-2">
                <div class="col-12">
                    <div class="section-title text-center">
                        <h4 class="title mb-3">Here's why you'll love it at Skilltrack</h4>
                        <p class="text-muted para-desc mx-auto mb-0">Search all the open positions on the web. Get your own
                            personalized salary estimate. Read reviews on over 30000+ companies worldwide.</p>
                    </div>
                </div><!--end col-->
            </div><!--end row-->

            <div class="row">
                <div class="col-lg-3 col-md-4 col-sm-6 col-12 mt-4 pt-2">
                    <div class="position-relative features text-center p-4 rounded shadow bg-white">
                        <div
                            class="feature-icon bg-soft-primary rounded shadow mx-auto position-relative overflow-hidden d-flex justify-content-center align-items-center">
                            <i data-feather="phone" class="fea icon-ex-md"></i>
                        </div>

                        <div class="mt-4">
                            <a href="#" class="title h5 text-dark">24/7 Support</a>
                            <p class="text-muted mt-3 mb-0">Many desktop publishing now use and a search for job.</p>
                            <div class="mt-3">
                                <a href="#" class="btn btn-link primary text-dark">Read More <i
                                        class="fa-solid fa-arrow-right-long"></i></a>
                            </div>
                        </div>
                    </div>
                </div><!--end col-->

                <div class="col-lg-3 col-md-4 col-sm-6 col-12 mt-4 pt-2">
                    <div class="position-relative features text-center p-4 rounded shadow bg-white">
                        <div
                            class="feature-icon bg-soft-primary rounded shadow mx-auto position-relative overflow-hidden d-flex justify-content-center align-items-center">
                            <i data-feather="cpu" class="fea icon-ex-md"></i>
                        </div>

                        <div class="mt-4">
                            <a href="#" class="title h5 text-dark">Tech & Startup Jobs</a>
                            <p class="text-muted mt-3 mb-0">Many desktop publishing now use and a search for job.</p>
                            <div class="mt-3">
                                <a href="#" class="btn btn-link primary text-dark">Read More <i
                                        class="fa-solid fa-arrow-right-long"></i></a>
                            </div>
                        </div>
                    </div>
                </div><!--end col-->

                <div class="col-lg-3 col-md-4 col-sm-6 col-12 mt-4 pt-2">
                    <div class="position-relative features text-center p-4 rounded shadow bg-white">
                        <div
                            class="feature-icon bg-soft-primary rounded shadow mx-auto position-relative overflow-hidden d-flex justify-content-center align-items-center">
                            <i data-feather="activity" class="fea icon-ex-md"></i>
                        </div>

                        <div class="mt-4">
                            <a href="#" class="title h5 text-dark">Quick & Easy</a>
                            <p class="text-muted mt-3 mb-0">Many desktop publishing now use and a search for job.</p>
                            <div class="mt-3">
                                <a href="#" class="btn btn-link primary text-dark">Read More <i
                                        class="fa-solid fa-arrow-right-long"></i></a>
                            </div>
                        </div>
                    </div>
                </div><!--end col-->

                <div class="col-lg-3 col-md-4 col-sm-6 col-12 mt-4 pt-2">
                    <div class="position-relative features text-center p-4 rounded shadow bg-white">
                        <div
                            class="feature-icon bg-soft-primary rounded shadow mx-auto position-relative overflow-hidden d-flex justify-content-center align-items-center">
                            <i data-feather="clock" class="fea icon-ex-md"></i>
                        </div>

                        <div class="mt-4">
                            <a href="#" class="title h5 text-dark">Save Time</a>
                            <p class="text-muted mt-3 mb-0">Many desktop publishing now use and a search for job.</p>
                            <div class="mt-3">
                                <a href="#" class="btn btn-link primary text-dark">Read More <i
                                        class="fa-solid fa-arrow-right-long"></i></a>
                            </div>
                        </div>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->
    </section><!--end section-->
    <!-- End -->
    @include('layout.footer')

    <script>
        // Use jQuery or vanilla JavaScript to handle the change event
        $('#category').on('change', function() {
            var categoryId = $(this).val();

            // Make an AJAX request to get subcategories based on the selected category
            $.ajax({
                url: '/get-subcategories',
                type: 'GET',
                data: {
                    category_id: categoryId
                },
                success: function(data) {
                    // Clear existing options
                    $('#subcategory_id').empty();

                    // Populate subcategories dropdown with new options
                    $.each(data, function(key, value) {
                        $('#subcategory_id').append('<option value="' + value.id + '">' + value
                            .name + '</option>');
                    });
                }
            });
        });
    </script>
@endsection
