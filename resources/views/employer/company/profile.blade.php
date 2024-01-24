@section('title', 'Company Profile | Skilltrack')
@extends('layout.master')
@section('content')
    @include('layout.nav')
    <!-- Hero Start -->
    <section class="bg-half-170 d-table w-100" style="background: url('{{ asset('images/hero/bg4.jpg') }}') center;">
        <div class="bg-overlay bg-gradient-overlay-2"></div>
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
            <div class="row justify-content-center">
                <div class="col-12 mt-4">
                    <div class="features-absolute">
                        <div class="d-md-flex justify-content-between align-items-center bg-white shadow rounded p-4">
                            <div class="d-flex align-items-center">
                                <img src="{{ asset('uploads/' . $user->company->img) }}"
                                    class="avatar avatar-md-md rounded-circle shadow rounder bg-white">
                                <div class="ms-3">
                                    <h5>{{ $user->company->name }}</h5>
                                    <span class="text-muted d-flex align-items-center"><i
                                            class="fa-solid fa-location-dot me-1"></i>{{ $user->company->city }},
                                        {{ $user->company->country }}</span>
                                </div>
                            </div>

                            <div class="mt-4 mt-md-0">
                                @if ($user->id !== auth()->user()->id)
                                    <a href="#" class="btn btn-sm btn-primary me-1">Follow</a>
                                @else
                                    <a href="{{ route('job.create') }}" class="btn btn-sm btn-primary me-1">Post Job</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->

        <div class="container">
            <div class="row g-4">
                <div class="col-lg-8 col-md-7 col-12">
                    <h4 class="mb-4">Company Story:</h4>

                    <p class="text-muted">{!! nl2br(e($user->company->bio)) !!}</p>

                    <div class="row g-4">
                        <div class="col-12"><img src="{{ asset('images/company/1.jpg') }}" class="rounded shadow img-fluid"
                                alt="">
                        </div>
                        <div class="col-6"><img src="{{ asset('images/company/2.jpg') }}" class="rounded shadow img-fluid"
                                alt="">
                        </div>
                        <div class="col-6"><img src="{{ asset('images/company/3.jpg') }}" class="rounded shadow img-fluid"
                                alt="">
                        </div>
                    </div>

                    <h4 class="my-4">Recent Vacancies:</h4>
                    <!-- Job List Modal -->
                    <div class="modal fade" id="JobListModal" tabindex="-1" aria-labelledby="JobListModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog" style="max-width: 1100px">
                            <div class="modal-content p-5">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="JobListModalLabel">
                                        All vacancies by <span class="text-primary">{{ $user->company->name }}</span>
                                    </h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="row g-4">
                                        @foreach ($jobs as $job)
                                            <div class="col-12">
                                                <div
                                                    class="job-post job-post-list rounded shadow p-4 d-md-flex align-items-center justify-content-between position-relative">
                                                    <div class="d-flex align-items-center w-310px">
                                                        <img src="{{ asset('uploads/' . $user->company->img) }}"
                                                            class="avatar avatar-small rounded shadow p-3 bg-white"
                                                            alt="">

                                                        <div class="ms-3">
                                                            <a href="{{ route('job.show', $job->id) }}"
                                                                class="h5 title text-dark">{{ $job->title }}</a>
                                                        </div>
                                                    </div>

                                                    <div
                                                        class="d-flex align-items-center justify-content-between d-md-block mt-3 mt-md-0 w-100px">
                                                        <span
                                                            class="badge bg-soft-primary rounded-pill">{{ $job->employment_type }}</span>
                                                        <span
                                                            class="text-muted d-flex align-items-center fw-medium mt-md-2">
                                                            <i class="fa-regular fa-clock me-1"></i>
                                                            {{ $job->created_at->diffForHumans() }}
                                                        </span>
                                                    </div>

                                                    <div
                                                        class="d-flex align-items-center justify-content-between d-md-block mt-2 mt-md-0 w-130px">
                                                        <span class="text-muted d-flex align-items-center">
                                                            <i class="fa-solid fa-location-dot me-1"></i>
                                                            {{ $job->country }}
                                                        </span>
                                                        <span class="d-flex fw-medium mt-md-2">
                                                            ${{ $job->min_salary }} - ${{ $job->max_salary }}/mo
                                                        </span>
                                                    </div>

                                                    <div class="mt-3 mt-md-0">
                                                        <form action="{{ route('job.bookmark', $job->id) }}" method="POST"
                                                            class="d-inline">
                                                            @csrf
                                                            <button type="submit"
                                                                class="btn btn-sm btn-icon btn-pills @role('employer') disabled @endrole @auth @if (auth()->user()->bookmarkedJobs->contains($job)) btn-primary @else btn-soft-primary @endif @endauth bookmark"><i
                                                                    class="fa-regular fa-bookmark"></i></button>
                                                        </form>
                                                        @if ($user->id == auth()->user()->id)
                                                            <a href="{{ route('job.edit', $job->id) }}"
                                                                class="btn btn-warning icon-link"><i
                                                                    class="fa-regular fa-pen-to-square"></i>Edit</a>
                                                        @else
                                                            <a data-bs-toggle="modal"
                                                                data-bs-target="#jobApplyModal{{ $job->id }}"
                                                                class="btn btn-sm btn-primary w-full ms-md-1 @role('employer') disabled @endrole">Apply
                                                                Now</a>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div><!--end col-->
                                        @endforeach
                                    </div>
                                </div>
                                {{-- <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Save changes</button>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                    <div class="row g-4">
                        @foreach ($showJobs as $job)
                            <div class="col-lg-6 col-12">
                                <div class="job-post rounded shadow bg-white">
                                    <div class="p-4">
                                        <a href="job-detail-one.html" class="text-dark title h5">{{ $job->title }}</a>
                                        <p class="text-muted d-flex align-items-center small mt-3">
                                            <i class="fa-regular fa-clock text-primary me-1"></i>
                                            Posted {{ $job->created_at->diffForHumans() }}
                                        </p>
                                        <ul
                                            class="list-unstyled d-flex justify-content-between align-items-center mb-0 mt-3">
                                            <li class="list-inline-item">
                                                <span class="badge bg-soft-primary">{{ $job->employment_type }}</span>
                                            </li>
                                            <li class="list-inline-item">
                                                <span class="text-muted d-flex align-items-center small">
                                                    <i class="fa-regular fa-dollar-sign text-primary me-1"></i>
                                                    ${{ $job->min_salary }} - ${{ $job->max_salary }}/mo
                                                </span>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="d-flex align-items-center p-4 border-top">
                                        <img src="{{ asset('uploads/' . $job->company->img) }}"
                                            class="avatar avatar-small rounded shadow p-3 bg-white" alt="">
                                        <div class="ms-3">
                                            <h6>{{ $job->company->name }}</h6>
                                            <span class="text-muted d-flex align-items-center">
                                                <i class="fa-solid fa-location-dot me-1"></i>{{ $job->company->country }}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <div class="row justify-content-center mt-3">
                            <a class="btn btn-sm btn-primary col-2" data-bs-toggle="modal"
                                data-bs-target="#JobListModal">See all jobs</a>
                        </div>
                    </div>
                </div><!--end col-->

                <div class="col-lg-4 col-md-5 col-12">
                    <div class="card bg-white p-4 rounded shadow sticky-bar">
                        <div class="map map-400px border-0">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3819.8894055677633!2d96.17153280962361!3d16.782177019893346!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30c1ed6232ed2ac1%3A0x5817e6d2d92f0b44!2sPKT%20Education%20Center!5e0!3m2!1sen!2smm!4v1702960431907!5m2!1sen!2smm"
                                width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>

                        <div class="mt-3">
                            <div class="d-flex align-items-center justify-content-between mt-2">
                                <span class="text-muted fw-medium">Founded:</span>
                                <span>1984</span>
                            </div>

                            <div class="d-flex align-items-center justify-content-between mt-2">
                                <span class="text-muted fw-medium">Founder:</span>
                                <a href="{{ route('user.profile', $user->id) }}">{{ $user->name }}</a>
                            </div>

                            <div class="d-flex align-items-center justify-content-between mt-2">
                                <span class="text-muted fw-medium">Headquarters:</span>
                                <span>{{ $user->company->country }}</span>
                            </div>

                            <div class="d-flex align-items-center justify-content-between mt-2">
                                <span class="text-muted fw-medium">Number of employees:</span>
                                <span>+ {{ $user->company->size }}</span>
                            </div>

                            <div class="d-flex align-items-center justify-content-between mt-2">
                                <span class="text-muted fw-medium">Website:</span>
                                <a href="https://{{ $user->company->socials }}">{{ $user->company->socials }}</a>
                            </div>

                            <div class="d-flex align-items-center justify-content-between mt-2">
                                <span class="text-muted fw-medium">Social:</span>

                                <ul class="list-unstyled social-icon text-sm-end mb-0">
                                    <li class="list-inline-item"><a href="https://dribbble.com/shreethemes"
                                            target="_blank" class="rounded"><i class="fa-brands fa-dribbble"></i></a>
                                    </li>
                                    <li class="list-inline-item"><a href="http://linkedin.com/company/shreethemes"
                                            target="_blank" class="rounded"><i class="fa-brands fa-linkedin-in"></i></a>
                                    </li>
                                    <li class="list-inline-item"><a href="https://www.facebook.com/shreethemes"
                                            target="_blank" class="rounded"><i class="fa-brands fa-facebook-f"></i></a>
                                    </li>
                                    <li class="list-inline-item"><a href="https://www.instagram.com/shreethemes/"
                                            target="_blank" class="rounded"><i class="fa-brands fa-instagram"></i></a>
                                    </li>
                                    <li class="list-inline-item"><a href="https://twitter.com/shreethemes"
                                            target="_blank" class="rounded"><i class="fa-brands fa-twitter"></i></a></li>
                                </ul><!--end icon-->
                            </div>
                        </div>

                        @if ($user->id !== auth()->user()->id)
                            <div class="mt-4 pt-4 border-top">
                                <h5>Get in touch !</h5>
                                <form class="mt-4" method="post" name="myForm" onsubmit="return validateForm()">
                                    <p class="mb-0" id="error-msg"></p>
                                    <div id="simple-msg"></div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="mb-3">
                                                <label class="form-label fw-semibold">Your Name <span
                                                        class="text-danger">*</span></label>
                                                <input name="name" id="name" type="text" class="form-control"
                                                    placeholder="Name :">
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="mb-3">
                                                <label class="form-label fw-semibold">Your Email <span
                                                        class="text-danger">*</span></label>
                                                <input name="email" id="email" type="email" class="form-control"
                                                    placeholder="Email :">
                                            </div>
                                        </div><!--end col-->

                                        <div class="col-12">
                                            <div class="mb-3">
                                                <label class="form-label fw-semibold">Subject</label>
                                                <input name="subject" id="subject" class="form-control"
                                                    placeholder="Subject :">
                                            </div>
                                        </div><!--end col-->

                                        <div class="col-12">
                                            <div class="mb-3">
                                                <label class="form-label fw-semibold">Comments <span
                                                        class="text-danger">*</span></label>
                                                <textarea name="comments" id="comments" rows="4" class="form-control" placeholder="Message :"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="d-grid">
                                                <button type="submit" id="submit" name="send"
                                                    class="btn btn-primary">Send Message</button>
                                            </div>
                                        </div><!--end col-->
                                    </div><!--end row-->
                                </form>
                            </div>
                        @else
                            <a href="{{ route('company.edit', $user->company->id) }}"
                                class="btn btn-sm btn-primary me-1">Edit company
                                details</a>
                        @endif
                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->

        <div class="container mt-100 mt-60">
            <div class="row justify-content-center mb-4 pb-2">
                <div class="col-12">
                    <div class="section-title text-center">
                        <h4 class="title mb-3">Related Companies</h4>
                        <p class="text-muted para-desc mx-auto mb-0">Search all the open positions on the web. Get your own
                            personalized salary estimate. Read reviews on over 30000+ companies worldwide.</p>
                    </div>
                </div><!--end col-->
            </div><!--end row-->

            <div class="row">
                @foreach ($similarCompanies as $company)
                    <div class="col-lg-3 col-md-4 col-sm-6 col-12 mt-5">
                        <div class="employer-card position-relative bg-white rounded shadow p-4 mt-3">
                            <div
                                class="employer-img d-flex justify-content-center align-items-center bg-white shadow-md rounded">
                                <img src="{{ asset('uploads/' . $company->img) }}" class="avatar avatar-ex-small">
                            </div>

                            <div class="content mt-3">
                                <a href="{{ route('company.profile', $company->created_by) }}"
                                    class="title text-dark h5">{{ $company->name }}</a>

                                <p class="text-muted mt-2 mb-0">
                                    {{ Str::limit($company->bio, $limit = 80, $end = '.....') }}</p>
                            </div>

                            <ul
                                class="list-unstyled d-flex justify-content-between align-items-center border-top mt-3 pt-3 mb-0">
                                <li class="text-muted d-inline-flex align-items-center"><i
                                        class="fa-solid fa-location-dot me-1"></i>{{ $company->country }}</li>
                                <li class="list-inline-item text-primary fw-medium">{{ count($company->jobs) }} Jobs</li>
                            </ul>
                        </div>
                    </div><!--end col-->
                @endforeach
            </div><!--end row-->
        </div><!--end container-->
    </section><!--end section-->
    <!-- End -->
    @include('layout.footer')
@endsection
