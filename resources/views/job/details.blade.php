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
    <!-- Start -->
    <section class="bg-half d-table w-100" style="padding-top: 100px !important">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-4 col-md-6">
                    <div class="card border-0 shadow rounded p-4 sticky-bar">
                        <div class="row g-0 align-items-center">
                            <div class="col-5">
                                <img src="{{ asset('uploads/' . $job->company->img) }}"
                                    class="avatar avatar-medium p-2 rounded-pill shadow bg-white" alt="">
                            </div>
                            <ul class="list-unstyled mb-0 col-7">
                                <li class="d-flex align-items-center me-2"><i
                                        class="fa-regular fa-building text-primary me-1"></i> {{ $job->company->name }}</li>
                                <li class="d-flex align-items-center"> <i
                                        class="fa-solid fa-location-dot text-primary me-1"></i>
                                    {{ $job->city }}, {{ $job->country }}
                                </li>
                            </ul>
                        </div>


                        <div class="mt-4">
                            <h4 class="title mb-3"> {{ $job->title }} </h4>
                            <p class="para-desc">{!! nl2br(e($job->company->bio)) !!}</p>
                        </div>
                    </div>
                </div><!--end col-->

                <div class="col-lg-8 col-md-6">
                    <div class="sidebar border-0">
                        <h5 class="mb-0">Job Information:</h5>

                        <ul class="list-unstyled mb-0 mt-4">
                            <li class="list-inline-item px-3 py-2 shadow rounded text-start m-1 bg-white">
                                <div class="d-flex widget align-items-center">
                                    <i class="fa-solid fa-user-check fs-4 me-3"></i>
                                    <div class="flex-1">
                                        <h6 class="widget-title mb-0">Employment Type:</h6>
                                        <small class="text-primary mb-0">{{ $job->employment_type }}</small>
                                    </div>
                                </div>
                            </li>

                            <li class="list-inline-item px-3 py-2 shadow rounded text-start m-1 bg-white">
                                <div class="d-flex widget align-items-center">
                                    <i class="fa-solid fa-location-dot fs-4 me-3"></i>
                                    <div class="flex-1">
                                        <h6 class="widget-title mb-0">Location:</h6>
                                        <small class="text-primary mb-0">{{ $job->city }}, {{ $job->country }}</small>
                                    </div>
                                </div>
                            </li>

                            <li class="list-inline-item px-3 py-2 shadow rounded text-start m-1 bg-white">
                                <div class="d-flex widget align-items-center">
                                    <i class="fa-regular fa-clock fs-4 me-3"></i>
                                    <div class="flex-1">
                                        <h6 class="widget-title mb-0">Date posted:</h6>
                                        <small
                                            class="text-primary mb-0 mb-0">{{ $job->created_at->format('d/M/Y') }}</small>
                                    </div>
                                </div>
                            </li>

                            <li class="list-inline-item px-3 py-2 shadow rounded text-start m-1 bg-white">
                                <div class="d-flex widget align-items-center">
                                    <i class="fa-solid fa-briefcase fs-4 me-3"></i>
                                    <div class="flex-1">
                                        <h6 class="widget-title mb-0">Field:</h6>
                                        <small class="text-primary mb-0">{{ $job->category->name }}</small>
                                    </div>
                                </div>
                            </li>

                            <li class="list-inline-item px-3 py-2 shadow rounded text-start m-1 bg-white">
                                <div class="d-flex widget align-items-center">
                                    <i class="fa-solid fa-user-tie fs-4 me-3"></i>
                                    <div class="flex-1">
                                        <h6 class="widget-title mb-0">Position:</h6>
                                        <small class="text-primary mb-0">{{ $job->title }}</small>
                                    </div>
                                </div>
                            </li>

                            <li class="list-inline-item px-3 py-2 shadow rounded text-start m-1 bg-white">
                                <div class="d-flex widget align-items-center">
                                    <i class="fa-regular fa-dollar-sign fs-4 me-3"></i>
                                    <div class="flex-1">
                                        <h6 class="widget-title mb-0">Salary:</h6>
                                        <small class="text-primary mb-0">+{{ $job->min_salary }} to
                                            {{ $job->max_salary }}/mo</small>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>

                    <div class="mt-4">
                        <h5>Job Description: </h5>
                        <p style="white-space: pre-wrap"> {!! nl2br(e($job->description)) !!}</p>

                        <h5 class="mt-4">Responsibilities and Duties: </h5>
                        <p style="white-space: pre-wrap"> {!! nl2br(e($job->responsibilities)) !!}</p>

                        <h5 class="mt-4">Required Experience, Skills and Qualifications: </h5>
                        <p style="white-space: pre-wrap"> {!! nl2br(e($job->requirements)) !!}</p>

                        <h5 class="mt-4">Benefits: </h5>
                        <p style="white-space: pre-wrap"> {!! nl2br(e($job->benefits)) !!}</p>


                        <div class="mt-4">
                            <a href="/jobs/{{ $job->id }}/apply" class="btn btn-outline-primary">Apply Now <i
                                    class="fa-regular fa-paper-plane"></i></a>
                        </div>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->

        <div class="container mt-100 mt-60">
            <div class="row justify-content-center mb-4 pb-2">
                <div class="col-12">
                    <div class="section-title text-center">
                        <h4 class="title mb-3">Related Vacancies</h4>
                        <p class="text-muted para-desc mx-auto mb-0">Search all the open positions on the web. Get
                            your own personalized salary estimate. Read reviews on over 30000+ companies worldwide.
                        </p>
                    </div>
                </div><!--end col-->
            </div><!--end row-->

            <div class="row align-items-center">
                <div class="col-lg-4 col-md-6 col-12 mt-4 pt-2">
                    <div class="job-post job-type-three rounded shadow bg-white p-4">
                        <div class="d-flex justify-content-between">
                            <div>
                                <img src="{{ asset('images/company/google-logo.png') }}"
                                    class="avatar avatar-small rounded shadow p-3 bg-white" alt="">
                                <a href="employer-profile.html" class="h5 company text-dark d-block mt-2">Google</a>
                            </div>
                            <ul class="list-unstyled align-items-center mb-0">
                                <li class="list-inline-item"><a href="#"
                                        class="btn btn-icon btn-sm btn-soft-primary"><i
                                            class="fa-regular fa-bookmark"></i></a></li>
                                <li class="list-inline-item"><a href="#"
                                        class="btn btn-icon btn-sm btn-soft-primary"><i
                                            class="fa-solid fa-arrow-up-right-from-square"></i></i></a></li>
                            </ul>
                        </div>

                        <div class="mt-2">
                            <a href="job-detail-three.html" class="text-dark title h5">Marketing Director</a>
                            <p class="text-muted mt-2">Looking for an experienced Web Designer for an our company.
                            </p>

                            <ul class="list-unstyled mb-0">
                                <li class="d-inline-block me-1"><a href="#" class="badge bg-primary">Part
                                        Time</a></li>
                                <li class="d-inline-block me-1"><a href="#" class="badge bg-primary">$4,000
                                        - $4,500</a></li>
                                <li class="d-inline-block me-1"><a href="#" class="badge bg-primary"><i
                                            class="fa-solid fa-location-dot pe-1"></i>Australia</a></li>
                            </ul>
                        </div>
                    </div>
                </div><!--end col-->

                <div class="col-lg-4 col-md-6 col-12 mt-4 pt-2">
                    <div class="job-post job-type-three rounded shadow bg-white p-4">
                        <div class="d-flex justify-content-between">
                            <div>
                                <img src="{{ asset('images/company/android.png') }}"
                                    class="avatar avatar-small rounded shadow p-3 bg-white" alt="">
                                <a href="employer-profile.html" class="h5 company text-dark d-block mt-2">Android</a>
                            </div>

                            <ul class="list-unstyled align-items-center mb-0">
                                <li class="list-inline-item"><a href="javascript:void(0)" class="like"><i
                                            class="mdi mdi-heart align-middle fs-3"></i></a></li>
                                <li class="list-inline-item"><a href="#"
                                        class="btn btn-icon btn-sm btn-soft-primary"><i data-feather="bookmark"
                                            class="icons"></i></a></li>
                                <li class="list-inline-item"><a href="#"
                                        class="btn btn-icon btn-sm btn-soft-primary"><i data-feather="arrow-up-right"
                                            class="icons"></i></a></li>
                            </ul>
                        </div>

                        <div class="mt-2">
                            <a href="job-detail-three.html" class="text-dark title h5">Application Developer</a>
                            <p class="text-muted mt-2">Looking for an experienced Web Designer for an our company.
                            </p>

                            <ul class="list-unstyled mb-0">
                                <li class="d-inline-block me-1"><a href="#" class="badge bg-primary">Remote</a>
                                </li>
                                <li class="d-inline-block me-1"><a href="#" class="badge bg-primary">$4,000
                                        - $4,500</a></li>
                                <li class="d-inline-block me-1"><a href="#" class="badge bg-primary"><i
                                            class="mdi mdi-map-marker me-1"></i>Australia</a></li>
                            </ul>
                        </div>
                    </div>
                </div><!--end col-->

                <div class="col-lg-4 col-md-6 col-12 mt-4 pt-2">
                    <div class="job-post job-type-three rounded shadow bg-white p-4">
                        <div class="d-flex justify-content-between">
                            <div>
                                <img src="{{ asset('images/company/lenovo-logo.png') }}"
                                    class="avatar avatar-small rounded shadow p-3 bg-white" alt="">
                                <a href="employer-profile.html" class="h5 company text-dark d-block mt-2">Lenovo</a>
                            </div>

                            <ul class="list-unstyled align-items-center mb-0">
                                <li class="list-inline-item"><a href="javascript:void(0)" class="like"><i
                                            class="mdi mdi-heart align-middle fs-3"></i></a></li>
                                <li class="list-inline-item"><a href="#"
                                        class="btn btn-icon btn-sm btn-soft-primary"><i data-feather="bookmark"
                                            class="icons"></i></a></li>
                                <li class="list-inline-item"><a href="#"
                                        class="btn btn-icon btn-sm btn-soft-primary"><i data-feather="arrow-up-right"
                                            class="icons"></i></a></li>
                            </ul>
                        </div>

                        <div class="mt-2">
                            <a href="job-detail-three.html" class="text-dark title h5">Senior Product Designer</a>
                            <p class="text-muted mt-2">Looking for an experienced Web Designer for an our company.
                            </p>

                            <ul class="list-unstyled mb-0">
                                <li class="d-inline-block me-1"><a href="#" class="badge bg-primary">WFH</a></li>
                                <li class="d-inline-block me-1"><a href="#" class="badge bg-primary">$4,000
                                        - $4,500</a></li>
                                <li class="d-inline-block me-1"><a href="#" class="badge bg-primary"><i
                                            class="mdi mdi-map-marker me-1"></i>Australia</a></li>
                            </ul>
                        </div>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->
    </section>
    <!-- End -->
    @include('layout.footer')
@endsection
