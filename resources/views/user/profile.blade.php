@section('title', 'Profile')
@extends('layout.master')
@section('content')
    @include('layout.nav')
    {{-- <div class="white-space"></div> --}}
    <!-- Start -->
    <style>
        #topnav .navigation-menu li a {
            color: #1e293b !important;
        }

        .l-light {
            display: none !important;
        }

        .l-dark {
            display: inline-block !important;
        }
    </style>
    <section style="paddin-top: 30px !important" class="section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Resumes Modal Starts -->
                    <x-resume-show :user="$user" />
                    <!-- Resumes Modal ends -->

                    <div class="position-relative">
                        <div class="candidate-cover">
                            @if ($user->cover == null)
                                <img src="{{ asset('images/banner.jpg') }}" class="img-fluid rounded shadow"
                                    style="object-position: top">
                            @else
                                <img src="{{ asset('uploads/' . $user->cover) }}" class="img-fluid rounded shadow"
                                    style="object-position: top">
                            @endif
                        </div>
                        <div class="candidate-profile d-flex align-items-end justify-content-between mx-2">
                            <div class="d-flex align-items-end w-100 justify-content-between">
                                <div class="d-flex align-items-end">
                                    <img src="{{ asset('uploads/' . $user->img) }}"
                                        class="rounded-pill shadow border border-3 avatar avatar-medium" alt="">

                                    <div class="ms-2">
                                        <h5 class="mb-0">{{ $user->name }}</h5>
                                        <p class="text-muted mb-0">{{ $user->position }}</p>
                                    </div>
                                </div>

                                <div>
                                    @if (auth()->user()->id == request()->route()->id)
                                        @role('employer')
                                            <a href="{{ route('company.profile', $user->id) }}" class="btn btn-primary">Your
                                                Company</a>
                                        @endrole
                                        <a href="{{ route('user.settings', $user->id) }}"
                                            class="btn btn-light icon-btn h5"><i class="fa-solid fa-gear"></i></a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->
        <div class="container mt-4">
            <div class="row g-4">
                <div class="col-lg-8 col-md-7 col-12">
                    <h5 class="mb-4">Introduction:</h5>

                    <p class="text-muted">{!! nl2br(e($user->bio)) !!}</p>

                    <h5 class="mt-4">Skills:</h5>
                    <div class="row">
                        @foreach ($user->user_skill as $skill)
                            <div class="col-lg-6 col-12">
                                <div class="progress-box mt-4">
                                    <h6 class="font-weight-normal">{{ $skill->name }}</h6>
                                    <div class="progress">
                                        <div class="progress-bar position-relative bg-primary"
                                            style="width:{{ $skill->pivot->proficiency ?? '50' }}%;">
                                            <div class="progress-value d-block text-dark h6">
                                                {{ $skill->pivot->proficiency }}%</div>
                                        </div>
                                    </div>
                                </div><!--end process box-->
                            </div><!--end col-->
                        @endforeach
                    </div><!--end row-->

                    {{-- Experiences Section Starts Here  --}}
                    @if (count($experiences) > 0)
                        <div class="d-flex justify-content-between align-items-center mt-4">
                            <h5>Experience:</h5>
                            @if (auth()->user()->id == request()->route()->id)
                                <!-- Experience Create Modal Starts Here -->
                                <x-profile-exp-create />
                                <!-- Experience Create Modal Ends Here -->

                                <a class="btn btn-sm btn-primary icon-link" data-bs-toggle="modal"
                                    data-bs-target="#expCreate">
                                    <i class="fa-regular fa-plus"></i>
                                    <span>New Experience</span>
                                </a>
                            @endif
                        </div>

                        <div class="row">
                            @foreach ($experiences as $experience)
                                <div class="col-12 mt-4 d-flex">
                                    <div class="">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="d-flex align-items-center" style="gap: 0.3rem">
                                                <h5 class="mb-0">{{ $experience->job_title }}</h5>
                                                <small class="text-muted">
                                                    ({{ $experience->start_date->format('m/Y') }} -
                                                    {{ $experience->end_date->format('m/Y') }})
                                                </small>
                                            </div>
                                            @if (auth()->user()->id == request()->route()->id)
                                                <x-profile-exp-edit :experience="$experience" />

                                                <a class="btn btn-sm btn-warning btn-icon" data-bs-toggle="modal"
                                                    data-bs-target="#expEdit{{ $experience->id }}">
                                                    <i class="fa-regular fa-pen-to-square"></i>
                                                </a>
                                            @endif
                                        </div>
                                        <p class="text-muted">
                                            {{ $experience->company_name }} - {{ $experience->location }}
                                        </p>
                                        <p class="text-muted mb-0">
                                            {{ $experience->description }}
                                        </p>
                                    </div>
                                </div><!--end col-->
                            @endforeach
                        </div><!--end row-->

                        <x-profile-exp-all :allExperiences="$allExperiences" />
                        <div class="row justify-content-center mt-3">
                            <a class="btn btn-sm btn-primary col-2" data-bs-toggle="modal" data-bs-target="#expAll">
                                View All
                            </a>
                        </div>
                    @endif
                    {{-- Experiences Section Ends Here  --}}

                    {{-- Applied Jobs Section Starts Here  --}}
                    @if (auth()->user()->id == request()->route()->id)
                        @if (count($user->applications) > 0)
                            <h5 class="mt-4">Recently Applied Jobs:</h5>
                            <div class="row g-4 mt-4"></div>
                            @foreach ($user->applications as $application)
                                <div class="col-lg-6 col-md-8 col-12">
                                    <div class="job-post rounded shadow bg-white">
                                        <div class="p-4">
                                            <a href="{{ route('job.show', $application->job_id) }}"
                                                class="text-dark title h5">
                                                {{ $application->job->title }}
                                            </a>

                                            <p class="text-muted d-flex align-items-center small mt-3">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-clock fea icon-sm text-primary me-1">
                                                    <circle cx="12" cy="12" r="10"></circle>
                                                    <polyline points="12 6 12 12 16 14"></polyline>
                                                </svg>
                                                Applied {{ $application->created_at->diffForHumans() }}
                                            </p>

                                            <ul
                                                class="list-unstyled d-flex justify-content-between align-items-center mb-0 mt-3">
                                                <li class="list-inline-item">
                                                    <span
                                                        class="badge bg-soft-primary">{{ $application->job->employment_type }}</span>
                                                </li>
                                                <li class="list-inline-item">
                                                    <span class="text-muted d-flex align-items-center small">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round"
                                                            class="feather feather-dollar-sign fea icon-sm text-primary me-1">
                                                            <line x1="12" y1="1" x2="12"
                                                                y2="23"></line>
                                                            <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6">
                                                            </path>
                                                        </svg>
                                                        ${{ $application->job->min_salary }} -
                                                        ${{ $application->job->max_salary }}/mo
                                                    </span>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="d-flex align-items-center p-4 border-top">
                                            <img src="{{ asset('uploads/' . $application->job->company->img) }}"
                                                class="avatar avatar-small rounded shadow p-3 bg-white" alt="">

                                            <div class="ms-3">
                                                <a href="{{ route('company.profile', $application->job->company->created_by) }}"
                                                    class="h5 company text-dark">
                                                    {{ $application->job->company->name }}
                                                </a>
                                                <span class="text-muted d-flex align-items-center mt-1">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="feather feather-map-pin fea icon-sm me-1">
                                                        <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                                                        <circle cx="12" cy="10" r="3"></circle>
                                                    </svg>
                                                    {{ $application->job->company->country }}
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <div class="row justify-content-center mt-3">
                                <a href="{{ route('candidate.applications', $user->id) }}"
                                    class="btn btn-sm btn-primary col-3">
                                    View all applications
                                </a>
                            </div>
                        @endif
                    @endif
                    {{-- Applied Jobs Section Ends Here  --}}

                    @if (auth()->user()->id != request()->route()->id)
                        <div class="p-4 rounded shadow mt-4">
                            <h5>Contact <span class="text-primary">{{ $user->name }}</span> !</h5>
                            <form class="mt-4" method="post" name="myForm" onsubmit="return validateForm()">
                                <p class="mb-0" id="error-msg"></p>
                                <div id="simple-msg"></div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label fw-semibold">Your Name <span
                                                    class="text-danger">*</span></label>
                                            <input name="name" id="name" type="text" class="form-control"
                                                placeholder="Name :" value="{{ auth()->user()->name }}">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label fw-semibold">Your Email <span
                                                    class="text-danger">*</span></label>
                                            <input name="email" id="email" type="email" class="form-control"
                                                placeholder="Email :" value="{{ auth()->user()->email }}">
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
                    @endif
                </div><!--end col-->

                <div class="col-lg-4 col-md-5 col-12">
                    <div class="card bg-light p-4 rounded shadow sticky-bar">
                        <h5 class="mb-0">Personal Detail:</h5>
                        <div class="mt-3">
                            <div class="d-flex align-items-center justify-content-between mt-3">
                                <span class="d-inline-flex align-items-center text-muted fw-medium"><i
                                        class="fa-regular fa-envelope me-2"></i> Email:</span>
                                <span class="fw-medium">{{ $user->email }}</span>
                            </div>

                            @if ($user->birthday != null)
                                <div class="d-flex align-items-center justify-content-between mt-3">
                                    <span class="d-inline-flex align-items-center text-muted fw-medium"><i
                                            class="fa-solid fa-gift me-2"></i> D.O.B.:</span>
                                    <span class="fw-medium">{{ $user->birthday->format('d-M-Y') }}</span>
                                </div>
                            @endif

                            <div class="d-flex align-items-center justify-content-between mt-3">
                                <span class="d-inline-flex align-items-center text-muted fw-medium"><i
                                        class="fa-solid fa-location-dot me-2"></i> City:</span>
                                <span class="fw-medium">{{ $user->city }}</span>
                            </div>

                            <div class="d-flex align-items-center justify-content-between mt-3">
                                <span class="d-inline-flex align-items-center text-muted fw-medium"><i
                                        class="fa-solid fa-globe me-2"></i> Country:</span>
                                <span class="fw-medium">{{ $user->country }}</span>
                            </div>

                            <div class="d-flex align-items-center justify-content-between mt-3">
                                <span class="d-inline-flex align-items-center text-muted fw-medium"><i
                                        class="fa-solid fa-phone me-2"></i> Mobile:</span>
                                <span class="fw-medium">{{ $user->phone }}</span>
                            </div>

                            <div class="d-flex align-items-center justify-content-between mt-3">
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

                            <div class="p-3 rounded shadow bg-white mt-2">
                                @role('candidate')
                                    <a class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#resumeShow">
                                        @if (auth()->user()->id == request()->route()->id)
                                            Your Resume
                                        @else
                                            <i class="fa-solid fa-download"></i> Download CV
                                        @endif
                                    </a>
                                @endrole
                            </div>
                        </div>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->

        @if (auth()->user()->id != request()->route()->id)
            <div class="container mt-100 mt-60">
                <div class="row justify-content-center mb-4 pb-2">
                    <div class="col-12">
                        <div class="section-title text-center">
                            <h4 class="title mb-3">Related Candidates</h4>
                            <p class="text-muted para-desc mx-auto mb-0">Search all the open positions on the web. Get your
                                own
                                personalized salary estimate. Read reviews on over 30000+ companies worldwide.</p>
                        </div>
                    </div><!--end col-->
                </div><!--end row-->

                <div class="row">
                    @foreach ($relatedCandidates as $candidate)
                        <div class="col-lg-3 col-md-4 col-sm-6 col-12 mt-4 pt-2">
                            <div class="candidate-card position-relative overflow-hidden text-center shadow rounded p-4">
                                <div class="content">
                                    <img src="{{ asset('uploads/' . $candidate->img) }}"
                                        class="avatar avatar-md-md rounded-pill shadow-md" alt="">

                                    <div class="mt-3">
                                        <a href="candidate-profile.html"
                                            class="title h5 text-dark">{{ $candidate->name }}</a>
                                        <p class="text-muted mt-1">{{ $candidate->country }}</p>
                                        @foreach ($candidate->user_skill as $skill)
                                            <span class="badge bg-soft-primary rounded-pill">{{ $skill->name }}</span>
                                        @endforeach
                                    </div>

                                    <div class="mt-2 d-flex align-items-center justify-content-between">
                                        <div class="text-center">
                                            <p class="text-muted fw-medium mb-0">Salary:</p>
                                            <p class="mb-0 fw-medium">
                                                ${{ $candidate->min_salary }} - ${{ $candidate->max_salary }}
                                            </p>
                                        </div>

                                        <div class="text-center">
                                            <p class="text-muted fw-medium mb-0">Experience:</p>
                                            <p class="mb-0 fw-medium">{{ $candidate->experience }}</p>
                                        </div>
                                    </div>

                                    <div class="mt-3">
                                        <a href="{{ route('user.profile', $candidate->id) }}"
                                            class="btn btn-sm btn-primary me-1">
                                            View Profile
                                        </a>
                                        <a href="contactus.html" class="btn btn-sm btn-icon btn-soft-primary">
                                            <i class="fa-regular fa-message icons"></i>
                                        </a>
                                    </div>

                                    <a href="javascript:void(0)" class="like"><i
                                            class="mdi mdi-heart align-middle fs-4"></i></a>
                                </div>
                            </div>
                        </div><!--end col-->
                    @endforeach
                </div><!--end row-->
            </div><!--end container-->
        @endif
    </section><!--end section-->
    <!-- End -->
    @include('layout.footer')
@endsection
