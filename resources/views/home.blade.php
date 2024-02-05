@section('title', 'Home | Jobnova')
@extends('layout.master')
@section('content')
    @include('layout.nav')
    <!-- Hero Start -->
    <section class="bg-half-170 d-table w-100 bg-primary" style="background: url('images/bg2.png') center;">
        <div class="container">
            <div class="row g-4 align-items-center">
                <div class="col-md-6">
                    <div class="title-heading">
                        <h1 class="heading text-white fw-bold">Get hired <br> by the popular <br> candidates.</h1>
                        <p class="para-desc text-white-50 mb-0">Find Jobs, Employment & Career Opportunities. Some of the
                            companies we've helped recruit excellent applicants over the years.</p>

                        <div class="text-center subscribe-form mt-4">
                            <form style="max-width: 800px;">
                                <div class="mb-0">
                                    <div class="position-relative">
                                        <i data-feather="search"
                                            class="fa-solid fa-magnifying-glass position-absolute top-50 start-0 translate-middle-y ms-3"></i>
                                        <input type="text" id="help" name="name"
                                            class="shadow rounded-pill bg-white ps-5" required=""
                                            placeholder="Search jobs & candidates ...">
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-pills">Search</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div><!--end col-->

                <div class="col-md-6">
                    <div class="position-relative ms-lg-5">
                        <img src="images/hero1.png" class="img-fluid p-5" alt="">

                        <div class="spinner">
                            <div class="position-absolute top-0 start-0 mt-lg-5 mt-4 ms-lg-5 ms-4">
                                <img src="images/company/circle-logo.png"
                                    class="avatar avatar-md-sm rounded shadow p-2 bg-white" alt="">
                            </div>
                            <div class="position-absolute top-0 start-50 translate-middle-x">
                                <img src="images/company/facebook-logo.png"
                                    class="avatar avatar-md-sm rounded shadow p-2 bg-white" alt="">
                            </div>
                            <div class="position-absolute top-0 end-0 mt-lg-5 mt-4 me-lg-5 me-4">
                                <img src="images/company/google-logo.png"
                                    class="avatar avatar-md-sm rounded shadow p-2 bg-white" alt="">
                            </div>
                            <div class="position-absolute top-50 start-0 translate-middle-y">
                                <img src="images/company/lenovo-logo.png"
                                    class="avatar avatar-md-sm rounded shadow p-2 bg-white" alt="">
                            </div>
                            <div class="position-absolute top-50 end-0 translate-middle-y">
                                <img src="images/company/android.png"
                                    class="avatar avatar-md-sm rounded shadow p-2 bg-white" alt="">
                            </div>
                            <div class="position-absolute bottom-0 start-0 mb-lg-5 mb-4 ms-lg-5 ms-4">
                                <img src="images/company/linkedin.png"
                                    class="avatar avatar-md-sm rounded shadow p-2 bg-white" alt="">
                            </div>
                            <div class="position-absolute bottom-0 start-50 translate-middle-x">
                                <img src="images/company/skype.png" class="avatar avatar-md-sm rounded shadow p-2 bg-white"
                                    alt="">
                            </div>
                            <div class="position-absolute bottom-0 end-0 mb-lg-5 mb-4 me-lg-5 me-4">
                                <img src="images/company/snapchat.png"
                                    class="avatar avatar-md-sm rounded shadow p-2 bg-white" alt="">
                            </div>
                        </div>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->
    </section><!--end section-->
    <!-- Hero End -->

    <!-- Start -->
    <section class="section">
        <div class="container">
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
                    <div class="section-title ms-lg-5">
                        <h4 class="title mb-3">Millions of jobs. <br> Find the one that's right for you.</h4>
                        <p class="text-muted para-desc mb-0">Search all the open positions on the web. Get your own
                            personalized salary estimate. Read reviews on over 30000+ companies worldwide.</p>

                        <ul class="list-unstyled text-muted mb-0 mt-3">
                            <li class="mb-1"><span class="text-primary h5 me-2"><i
                                        class="fa-regular fa-circle-check align-middle"></i></span>Digital Marketing
                                Solutions for Tomorrow</li>
                            <li class="mb-1"><span class="text-primary h5 me-2"><i
                                        class="fa-regular fa-circle-check align-middle"></i></span>Our Talented &
                                Experienced Marketing Agency</li>
                            <li class="mb-1"><span class="text-primary h5 me-2"><i
                                        class="fa-regular fa-circle-check align-middle"></i></span>Create your own skin to
                                match your brand</li>
                        </ul>

                        <div class="mt-4">
                            <a href="" class="btn btn-primary">About Us <i
                                    class="fa-solid fa-arrow-right align-middle"></i></a>
                        </div>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->

        <div class="container mt-100 mt-60">
            <div class="row justify-content-center mb-4 pb-2">
                <div class="col-12">
                    <div class="section-title text-center">
                        <h4 class="title mb-3">Popular Categories</h4>
                        <p class="text-muted para-desc mx-auto mb-0">Search all the open positions on the web. Get your own
                            personalized salary estimate. Read reviews on over 30000+ companies worldwide.</p>
                    </div>
                </div><!--end col-->
            </div><!--end row-->

            <div class="row">
                <div class="col-12 mt-4">
                    <div class="tns-outer" id="tns1-ow">
                        <div class="tns-controls" aria-label="Carousel Navigation" tabindex="0"><button type="button"
                                data-controls="prev" tabindex="-1" aria-controls="tns1"><i
                                    class="mdi mdi-chevron-left "></i></button><button type="button"
                                data-controls="next" tabindex="-1" aria-controls="tns1"><i
                                    class="mdi mdi-chevron-right"></i></button></div>
                        <div class="tns-liveregion tns-visually-hidden" aria-live="polite" aria-atomic="true">slide <span
                                class="current">2 to 6</span> of 7</div>
                        <div id="tns1-mw" class="tns-ovh">
                            <div class="tns-inner" id="tns1-iw">
                                <div class="tiny-five-item  tns-slider tns-carousel tns-subpixel tns-calc tns-horizontal"
                                    id="tns1" style="transform: translate3d(-14.2857%, 0px, 0px);">
                                    <div class="tiny-slide tns-item" id="tns1-item0" aria-hidden="true" tabindex="-1">
                                        <div
                                            class="position-relative job-category text-center px-4 py-5 rounded shadow m-2">
                                            <div
                                                class="feature-icon bg-soft-primary rounded shadow mx-auto position-relative overflow-hidden d-flex justify-content-center align-items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-airplay fea icon-ex-md">
                                                    <path
                                                        d="M5 17H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-1">
                                                    </path>
                                                    <polygon points="12 15 17 21 7 21 12 15"></polygon>
                                                </svg>
                                            </div>

                                            <div class="mt-4">
                                                <a href="#" class="title h5 text-">Business <br> Development</a>
                                                <p class="text-muted mb-0 mt-3">74 Jobs</p>
                                            </div>
                                        </div>
                                    </div><!--end col-->

                                    <div class="tiny-slide tns-item tns-slide-active" id="tns1-item1">
                                        <div
                                            class="position-relative job-category text-center px-4 py-5 rounded shadow m-2">
                                            <div
                                                class="feature-icon bg-soft-primary rounded shadow mx-auto position-relative overflow-hidden d-flex justify-content-center align-items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-award fea icon-ex-md">
                                                    <circle cx="12" cy="8" r="7"></circle>
                                                    <polyline points="8.21 13.89 7 23 12 20 17 23 15.79 13.88"></polyline>
                                                </svg>
                                            </div>

                                            <div class="mt-4">
                                                <a href="#" class="title h5 text-">Marketing &amp; <br>
                                                    Communication</a>
                                                <p class="text-muted mb-0 mt-3">20 Jobs</p>
                                            </div>
                                        </div>
                                    </div><!--end col-->

                                    <div class="tiny-slide tns-item tns-slide-active" id="tns1-item2">
                                        <div
                                            class="position-relative job-category text-center px-4 py-5 rounded shadow m-2">
                                            <div
                                                class="feature-icon bg-soft-primary rounded shadow mx-auto position-relative overflow-hidden d-flex justify-content-center align-items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-at-sign fea icon-ex-md">
                                                    <circle cx="12" cy="12" r="4"></circle>
                                                    <path d="M16 8v5a3 3 0 0 0 6 0v-1a10 10 0 1 0-3.92 7.94"></path>
                                                </svg>
                                            </div>

                                            <div class="mt-4">
                                                <a href="#" class="title h5 text-">Project <br> Management</a>
                                                <p class="text-muted mb-0 mt-3">35 Jobs</p>
                                            </div>
                                        </div>
                                    </div><!--end col-->

                                    <div class="tiny-slide tns-item tns-slide-active" id="tns1-item3">
                                        <div
                                            class="position-relative job-category text-center px-4 py-5 rounded shadow m-2">
                                            <div
                                                class="feature-icon bg-soft-primary rounded shadow mx-auto position-relative overflow-hidden d-flex justify-content-center align-items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-codesandbox fea icon-ex-md">
                                                    <path
                                                        d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z">
                                                    </path>
                                                    <polyline points="7.5 4.21 12 6.81 16.5 4.21"></polyline>
                                                    <polyline points="7.5 19.79 7.5 14.6 3 12"></polyline>
                                                    <polyline points="21 12 16.5 14.6 16.5 19.79"></polyline>
                                                    <polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>
                                                    <line x1="12" y1="22.08" x2="12" y2="12">
                                                    </line>
                                                </svg>
                                            </div>

                                            <div class="mt-4">
                                                <a href="#" class="title h5 text-">Customer <br> Service</a>
                                                <p class="text-muted mb-0 mt-3">46 Jobs</p>
                                            </div>
                                        </div>
                                    </div><!--end col-->

                                    <div class="tiny-slide tns-item tns-slide-active" id="tns1-item4">
                                        <div
                                            class="position-relative job-category text-center px-4 py-5 rounded shadow m-2">
                                            <div
                                                class="feature-icon bg-soft-primary rounded shadow mx-auto position-relative overflow-hidden d-flex justify-content-center align-items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-chrome fea icon-ex-md">
                                                    <circle cx="12" cy="12" r="10"></circle>
                                                    <circle cx="12" cy="12" r="4"></circle>
                                                    <line x1="21.17" y1="8" x2="12" y2="8">
                                                    </line>
                                                    <line x1="3.95" y1="6.06" x2="8.54" y2="14">
                                                    </line>
                                                    <line x1="10.88" y1="21.94" x2="15.46" y2="14">
                                                    </line>
                                                </svg>
                                            </div>

                                            <div class="mt-4">
                                                <a href="#" class="title h5 text-">Software <br> Engineering</a>
                                                <p class="text-muted mb-0 mt-3">60 Jobs</p>
                                            </div>
                                        </div>
                                    </div><!--end col-->

                                    <div class="tiny-slide tns-item tns-slide-active" id="tns1-item5">
                                        <div
                                            class="position-relative job-category text-center px-4 py-5 rounded shadow m-2">
                                            <div
                                                class="feature-icon bg-soft-primary rounded shadow mx-auto position-relative overflow-hidden d-flex justify-content-center align-items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-copy fea icon-ex-md">
                                                    <rect x="9" y="9" width="13" height="13" rx="2"
                                                        ry="2"></rect>
                                                    <path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1">
                                                    </path>
                                                </svg>
                                            </div>

                                            <div class="mt-4">
                                                <a href="#" class="title h5 text-">Human Resource <br> HR</a>
                                                <p class="text-muted mb-0 mt-3">74 Jobs</p>
                                            </div>
                                        </div>
                                    </div><!--end col-->

                                    <div class="tiny-slide tns-item" id="tns1-item6" aria-hidden="true" tabindex="-1">
                                        <div
                                            class="position-relative job-category text-center px-4 py-5 rounded shadow m-2">
                                            <div
                                                class="feature-icon bg-soft-primary rounded shadow mx-auto position-relative overflow-hidden d-flex justify-content-center align-items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-cpu fea icon-ex-md">
                                                    <rect x="4" y="4" width="16" height="16" rx="2"
                                                        ry="2"></rect>
                                                    <rect x="9" y="9" width="6" height="6"></rect>
                                                    <line x1="9" y1="1" x2="9" y2="4">
                                                    </line>
                                                    <line x1="15" y1="1" x2="15" y2="4">
                                                    </line>
                                                    <line x1="9" y1="20" x2="9" y2="23">
                                                    </line>
                                                    <line x1="15" y1="20" x2="15" y2="23">
                                                    </line>
                                                    <line x1="20" y1="9" x2="23" y2="9">
                                                    </line>
                                                    <line x1="20" y1="14" x2="23" y2="14">
                                                    </line>
                                                    <line x1="1" y1="9" x2="4" y2="9">
                                                    </line>
                                                    <line x1="1" y1="14" x2="4" y2="14">
                                                    </line>
                                                </svg>
                                            </div>

                                            <div class="mt-4">
                                                <a href="#" class="title h5 text-">It &amp; <br> Networking</a>
                                                <p class="text-muted mb-0 mt-3">20 Jobs</p>
                                            </div>
                                        </div>
                                    </div><!--end col-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--end container-->

        <div class="container mt-100 mt-60">
            <div class="row align-items-end mb-4 pb-2">
                <div class="col-lg-6 col-md-9">
                    <div class="section-title text-md-start text-center">
                        <h4 class="title mb-3">Explore Jobs</h4>
                        <p class="text-muted para-desc mb-0">Search all the open positions on the web. Get your own
                            personalized salary estimate. Read reviews on over 30000+ companies worldwide.</p>
                    </div>
                </div><!--end col-->

                <div class="col-lg-6 col-md-3 d-none d-md-block">
                    <div class="text-md-end">
                        <a href="job-grid-one.html" class="btn btn-link primary text-muted">See More Jobs <i
                                class="fa-solid fa-arrow-right"></i></a>
                    </div>
                </div><!--end col-->
            </div><!--end row-->

            <div class="row g-4 mt-0">
                @foreach ($jobs as $job)
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="job-post rounded shadow p-4">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center">
                                    <img src="{{ asset('uploads/' . $job->company->img) }}"
                                        class="avatar avatar-small rounded shadow p-3 bg-white" alt="">

                                    <div class="ms-3">
                                        <a href="{{ route('company.profile', $job->company->created_by) }}"
                                            class="h5 company text-">{{ $job->company->name }}</a>
                                        <span class="text-muted d-flex align-items-center small mt-2">
                                            <i data-feather="clock" class="fa-regular fa-clock me-1"></i>
                                            {{ $job->created_at->diffForHumans() }}
                                        </span>
                                    </div>
                                </div>

                                <span class="badge bg-soft-primary">{{ $job->employment_type }}</span>
                            </div>

                            <div class="mt-4">
                                <a href="{{ route('job.show', $job->id) }}" class="text- title h5">{{ $job->title }}</a>

                                <span class="text-muted d-flex align-items-center mt-2">
                                    <i data-feather="map-pin" class="fa-solid fa-location-dot me-1"></i>
                                    {{ $job->country }}
                                </span>
                                @if ($job->limit !== null)
                                    <?php $percentage = (count($job->applications) / $job->limit) * 100; ?>
                                    <div class="progress-box mt-3">
                                        <div class="progress mb-2">
                                            <div class="progress-bar position-relative bg-primary"
                                                style="width:{{ $percentage }}%;">
                                            </div>
                                        </div>

                                        <span class="text-">
                                            {{ count($job->applications) }} applied of
                                            <span class="text-muted">{{ $job->limit }} vacancy</span>
                                        </span>
                                    </div>
                                @endif
                            </div>
                        </div><!--end job post-->
                    </div><!--end col-->
                @endforeach
                <div class="col-12 d-md-none d-block">
                    <div class="text-center">
                        <a href="job-grid-one.html" class="btn btn-link primary text-muted">See More Jobs <i
                                class="mdi mdi-arrow-right"></i></a>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->

        <div class="container mt-100 mt-60">
            <div class="row justify-content-center mb-4 pb-2">
                <div class="col-12">
                    <div class="section-title text-center">
                        <h4 class="title mb-3">Here's why you'll love it Jobnova</h4>
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
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-phone fea icon-ex-md">
                                <path
                                    d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z">
                                </path>
                            </svg>
                        </div>

                        <div class="mt-4">
                            <a href="#" class="title h5 text-dark">24/7 Support</a>
                            <p class="text-muted mt-3 mb-0">Many desktop publishing now use and a search for job.</p>
                            <div class="mt-3">
                                <a href="#" class="btn btn-link primary text-dark">Read More <i
                                        class="mdi mdi-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div><!--end col-->

                <div class="col-lg-3 col-md-4 col-sm-6 col-12 mt-4 pt-2">
                    <div class="position-relative features text-center p-4 rounded shadow bg-white">
                        <div
                            class="feature-icon bg-soft-primary rounded shadow mx-auto position-relative overflow-hidden d-flex justify-content-center align-items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-cpu fea icon-ex-md">
                                <rect x="4" y="4" width="16" height="16" rx="2" ry="2"></rect>
                                <rect x="9" y="9" width="6" height="6"></rect>
                                <line x1="9" y1="1" x2="9" y2="4"></line>
                                <line x1="15" y1="1" x2="15" y2="4"></line>
                                <line x1="9" y1="20" x2="9" y2="23"></line>
                                <line x1="15" y1="20" x2="15" y2="23"></line>
                                <line x1="20" y1="9" x2="23" y2="9"></line>
                                <line x1="20" y1="14" x2="23" y2="14"></line>
                                <line x1="1" y1="9" x2="4" y2="9"></line>
                                <line x1="1" y1="14" x2="4" y2="14"></line>
                            </svg>
                        </div>

                        <div class="mt-4">
                            <a href="#" class="title h5 text-dark">Tech &amp; Startup Jobs</a>
                            <p class="text-muted mt-3 mb-0">Many desktop publishing now use and a search for job.</p>
                            <div class="mt-3">
                                <a href="#" class="btn btn-link primary text-dark">Read More <i
                                        class="mdi mdi-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div><!--end col-->

                <div class="col-lg-3 col-md-4 col-sm-6 col-12 mt-4 pt-2">
                    <div class="position-relative features text-center p-4 rounded shadow bg-white">
                        <div
                            class="feature-icon bg-soft-primary rounded shadow mx-auto position-relative overflow-hidden d-flex justify-content-center align-items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-activity fea icon-ex-md">
                                <polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline>
                            </svg>
                        </div>

                        <div class="mt-4">
                            <a href="#" class="title h5 text-dark">Quick &amp; Easy</a>
                            <p class="text-muted mt-3 mb-0">Many desktop publishing now use and a search for job.</p>
                            <div class="mt-3">
                                <a href="#" class="btn btn-link primary text-dark">Read More <i
                                        class="mdi mdi-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div><!--end col-->

                <div class="col-lg-3 col-md-4 col-sm-6 col-12 mt-4 pt-2">
                    <div class="position-relative features text-center p-4 rounded shadow bg-white">
                        <div
                            class="feature-icon bg-soft-primary rounded shadow mx-auto position-relative overflow-hidden d-flex justify-content-center align-items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-clock fea icon-ex-md">
                                <circle cx="12" cy="12" r="10"></circle>
                                <polyline points="12 6 12 12 16 14"></polyline>
                            </svg>
                        </div>

                        <div class="mt-4">
                            <a href="#" class="title h5 text-dark">Save Time</a>
                            <p class="text-muted mt-3 mb-0">Many desktop publishing now use and a search for job.</p>
                            <div class="mt-3">
                                <a href="#" class="btn btn-link primary text-dark">Read More <i
                                        class="mdi mdi-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div><!--end col-->
            </div>
        </div><!--end container-->

        <div class="container mt-100 mt-60">
            <div class="row g-4 align-items-center">
                <div class="col-lg-6 col-md-6 mb-5  order-md-2 order-1">
                    <div class="about-right">
                        <div class="position-relative shadow rounded img-one">
                            <img src="images/about/ab03.jpg" class="img-fluid rounded" alt="work-image">
                        </div>

                        <div class="img-two shadow rounded p-2 bg-white">
                            <img src="images/about/ab04.jpg" class="img-fluid rounded" alt="work-image">

                            <div class="position-absolute top-0 start-50 translate-middle">
                                <a href="#!" data-type="youtube" data-id="yba7hPeTSjk"
                                    class="avatar avatar-md-md rounded-pill shadow card d-flex justify-content-center align-items-center lightbox">
                                    <i class="fa-solid fa-play text-primary"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div><!--end col-->

                <div class="col-lg-6 col-md-6 mt-4 pt-2 mt-sm-0 pt-sm-0 order-md-1 order-2">
                    <div class="section-title mb-4 me-lg-5">
                        <h4 class="title mb-3">Find Best Companies.</h4>
                        <p class="text-muted para-desc mb-0">Search all the open positions on the web. Get your own
                            personalized salary estimate. Read reviews on over 30000+ companies worldwide.</p>
                    </div>

                    <div class="row g-4 mt-0">
                        @foreach ($companies as $company)
                            <div class="col-md-6">
                                <div class="employer-card rounded shadow p-2 bg-light">
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('uploads/' . $company->img) }}"
                                            class="avatar avatar-md-sm rounded shadow p-2 bg-white" alt="">

                                        <div class="content ms-3">
                                            <a href="employer-profile.html"
                                                class="h5 title text-">{{ $company->name }}</a>
                                            <span
                                                class="text-muted d-flex align-items-center small mt-1">{{ count($company->jobs) }}
                                                Jobs</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="mt-4">
                        <a href="{{ route('company.index') }}" class="btn btn-link primary text-muted">
                            See More Companies
                            <i class="fa-solid fa-arrow-right align-middle"></i>
                        </a>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->

        <div class="container mt-100 mt-60">
            <div class="row justify-content-center">
                <div class="col">
                    <div class="section-title text-center mb-4 pb-2">
                        <h4 class="title mb-3">Latest Blog or News</h4>
                        <p class="text-muted para-desc mb-0 mx-auto">Search all the open positions on the web. Get your own
                            personalized salary estimate. Read reviews on over 30000+ companies worldwide.</p>
                    </div>
                </div><!--end col-->
            </div><!--end row-->

            <div class="row g-4 mt-0">
                <style>
                    .col-lg-4 .position-relative .img-fluid {
                        height: 230px !important;
                        object-fit: cover;
                    }
                </style>
                @foreach ($blogs as $blog)
                    <div class="col-lg-4 col-md-6">
                        <div class="card blog blog-primary shadow rounded overflow-hidden border-0">
                            <div class="card-img blog-image position-relative overflow-hidden rounded-0">
                                <div class="position-relative overflow-hidden">
                                    <img src="{{ asset('uploads/' . $blog->thumbnail) }}" class="img-fluid"
                                        alt="">
                                    <div class="card-overlay"></div>
                                </div>
                            </div>

                            <div class="card-body blog-content position-relative p-0">
                                <div class="blog-tag px-4">
                                    @foreach ($blog->blogcategories as $blogCategory)
                                        <a href="#"
                                            class="badge bg-primary rounded-pill">{{ $blogCategory->name }}</a>
                                    @endforeach
                                </div>
                                <div class="p-4">
                                    <ul class="list-unstyled text-muted small mb-2">
                                        <li class="d-inline-flex align-items-center me-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-calendar fea icon-ex-sm me-1 text-">
                                                <rect x="3" y="4" width="18" height="18" rx="2"
                                                    ry="2"></rect>
                                                <line x1="16" y1="2" x2="16" y2="6">
                                                </line>
                                                <line x1="8" y1="2" x2="8" y2="6">
                                                </line>
                                                <line x1="3" y1="10" x2="21" y2="10">
                                                </line>
                                            </svg>{{ $blog->created_at->format('d F Y') }}
                                        </li>
                                        <li class="d-inline-flex align-items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-clock fea icon-ex-sm me-1 text-">
                                                <circle cx="12" cy="12" r="10"></circle>
                                                <polyline points="12 6 12 12 16 14"></polyline>
                                            </svg>{{ $blog->read_time }} min read
                                        </li>
                                    </ul>

                                    <a href="{{ route('blog.show', $blog->id) }}" class="title fw-semibold fs-5 text-">
                                        {{ $blog->title }}
                                    </a>

                                    <ul
                                        class="list-unstyled d-flex justify-content-between align-items-center text-muted mb-0 mt-3">
                                        <li class="list-inline-item me-2"><a href="{{ route('blog.show', $blog->id) }}"
                                                class="btn btn-link primary text-">Read Now <i
                                                    class="fa-solid fa-arrow-right"></i></a></li>
                                        <li class="list-inline-item"><span class="text-">By</span> <a
                                                href="{{ route('user.profile', $blog->user_id) }}"
                                                class="text-muted link-title">{{ $blog->user->name }}</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div><!--end col-->
                @endforeach
            </div><!--end row-->
        </div><!--end container-->
    </section><!--end section-->
    <!-- End -->
    @include('layout.footer')
@endsection
