@section('title', 'Job Application Lists | Jobnova')
@extends('layout.master')
@section('content')
    @include('layout.nav')
    <div class="white-space"></div>

    <section class="pt-5 section">
        <div class="container mt-60">
            <h3>Total Applicants: <span class="text-primary">{{ count($applications) }}</span></h3>
            <div class="row g-4">
                @foreach ($applications as $application)
                    <div class="col-12">
                        <div
                            class="job-post job-post-list rounded shadow p-4 d-md-flex align-items-center justify-content-between position-relative">
                            <div class="d-flex align-items-center">
                                <img src="{{ asset('uploads/' . $application->user->img) }}"
                                    class="avatar avatar-small rounded shadow p-3 bg-white"
                                    style="width: 100px; height: 100px;">

                                {{-- <div class="ms-3">
                                    <a href="job-detail-one.html"
                                        class="h5 title text-dark">{{ $application->user->name }}</a>
                                </div> --}}
                            </div>

                            <div class="d-flex align-items-center justify-content-between d-md-block mt-3 mt-md-0">
                                <a href="{{ route('user.profile', $application->user_id) }}"
                                    class="h5 title text-dark">{{ $application->user->name }}</a>
                                <span
                                    class="text-muted d-flex align-items-center fw-medium mt-md-2">{{ $application->user->position }}</span>
                            </div>

                            <div class="d-flex align-items-center justify-content-between d-md-block mt-3 mt-md-0">
                                <span class="badge bg-soft-primary rounded-pill">Full Time</span>
                                <span class="text-muted d-flex align-items-center fw-medium mt-md-2">
                                    <i class="fa-regular fa-clock fea icon-sm me-1 align-middle"></i>
                                    Applied {{ $application->created_at->diffForHumans() }}
                                </span>
                            </div>

                            <div class="d-flex align-items-center justify-content-between d-md-block mt-2 mt-md-0 w-130px">
                                <span class="text-muted d-flex align-items-center">
                                    <i class="fa-solid fa-location-dot fea icon-sm me-1 align-middle"></i>
                                    {{ $application->user->country }}
                                </span>
                                <span class="d-flex fw-medium mt-md-2">$950 - $1100/mo</span>
                            </div>

                            <div class="mt-3 mt-md-0">
                                <a href="{{ route('user.profile', $application->user_id) }}"
                                    class="btn btn-sm btn-primary w-full ms-md-1">View Profile</a>
                                <a href="{{ route('application.download', $application->id) }}"
                                    class="btn btn-sm btn-light w-fukk ms-md-1">Download CV</a>
                                <form action="{{ route('user.bookmark', $application->user_id) }}" method="POST"
                                    class="d-inline">
                                    @csrf
                                    <button type="submit"
                                        class="@if (auth()->user()->bookmarkedUsers->contains($application->user)) btn-primary @else btn-soft-primary @endif btn btn-sm btn-icon btn-pills bookmark">
                                        <i class="fa-regular fa-bookmark icons"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div><!--end col-->
                @endforeach
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
                            <i data-feather="phone" class="fea icon-ex-md"></i>
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
                            <i data-feather="cpu" class="fea icon-ex-md"></i>
                        </div>

                        <div class="mt-4">
                            <a href="#" class="title h5 text-dark">Tech & Startup Jobs</a>
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
                            <i data-feather="activity" class="fea icon-ex-md"></i>
                        </div>

                        <div class="mt-4">
                            <a href="#" class="title h5 text-dark">Quick & Easy</a>
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
                            <i data-feather="clock" class="fea icon-ex-md"></i>
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
            </div><!--end row-->
        </div><!--end container-->
    </section><!--end section-->
    <!-- End -->
    @include('layout.footer')
@endsection
