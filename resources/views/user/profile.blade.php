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
                    <div class="modal fade" id="resumeShow" tabindex="-1" aria-labelledby="resumeShowLabel" aria-hidden="true">
                        <div class="modal-dialog" style="max-width: 700px !important">
                            <div class="modal-content p-5">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h4>Your resume</h4>
                                    <div>
                                        @if (auth()->user()->id == request()->route()->id)
                                            <a href="{{ route('resume.create') }}"
                                                class="btn btn-light icon-link @if ($user->resumes()->count() >= 3) disabled @endif"><i
                                                    class="fa-regular fa-plus me-1"></i>New Resume</a>
                                            @if (auth()->user()->id == request()->route()->id)
                                                <a href="{{ route('resume.trash') }}" class="icon-btn btn-light"><i
                                                        class="fa-solid fa-trash-can"></i></a>
                                            @endif
                                        @endif
                                    </div>
                                </div>
                                @if ($user->resumes()->count() > 0)
                                    <ul class="list-group list-group-flush">
                                        @foreach ($user->resumes as $resume)
                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                                <a href="{{ route('resume.show', $resume->id) }}"
                                                    class="text-primary icon-link"><i class="fa-regular fa-file"></i>
                                                    {{ $resume->title }}</a>
                                                <div class="d-flex">
                                                    <a href="{{ route('resume.download', $resume->id) }}"
                                                        class="btn btn-primary icon-link fw-normal me-1"
                                                        style="font-size: 12px !important">
                                                        <i class="fa-solid fa-download"></i> Download
                                                    </a>
                                                    @if (auth()->user()->id == request()->route()->id)
                                                        <form action="{{ route('resume.destroy', $resume->id) }}"
                                                            method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="icon-btn btn-light">
                                                                <i class="fa-solid fa-circle-minus"></i>
                                                            </button>
                                                        </form>
                                                    @endif
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                @else
                                    <div class="d-flex justify-content-center align-items-center" style="height: 50vh">
                                        <div class="row justify-content-center text-center">
                                            <h3 class="text-muted col-12">No resume here</h3>
                                            @if (auth()->user()->id == request()->route()->id)
                                                <a href="{{ route('resume.create') }}"
                                                    class="btn btn-primary icon-link col-5"><i
                                                        class="fa-regular fa-plus me-1"></i>Make one</a>
                                            @endif
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
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
                                    @role('employer')
                                        <a href="{{ route('company.profile', $user->id) }}" class="btn btn-primary">Your
                                            Company</a>
                                    @endrole
                                    <a href="{{ route('user.settings', $user->id) }}" class="btn btn-light icon-btn h5"><i
                                            class="fa-solid fa-gear"></i></a>
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
                                            style="width:{{ $skill->pivot->proficiency }}%;">
                                            <div class="progress-value d-block text-dark h6">
                                                {{ $skill->pivot->proficiency }}%</div>
                                        </div>
                                    </div>
                                </div><!--end process box-->
                            </div><!--end col-->
                        @endforeach
                    </div><!--end row-->

                    <h5 class="mt-4">Experience:</h5>

                    <div class="row">
                        <div class="col-12 mt-4">
                            <div class="d-flex">
                                <div class="text-center">
                                    <img src="images/company/linkedin.png"
                                        class="avatar avatar-small bg-white shadow p-2 rounded" alt="">
                                    <h6 class="text-muted mt-2 mb-0">2019-22</h6>
                                </div>

                                <div class="ms-3">
                                    <h6 class="mb-0">Full Stack Developer</h6>
                                    <p class="text-muted">Linkedin - U.S.A.</p>
                                    <p class="text-muted mb-0">It seems that only fragments of the original text remain in
                                        the Lorem Ipsum texts used today. One may speculate that over the course of time
                                        certain letters were added or deleted at various positions within the text.</p>
                                </div>
                            </div>
                        </div><!--end col-->

                        <div class="col-12 mt-4">
                            <div class="d-flex">
                                <div class="text-center">
                                    <img src="images/company/lenovo-logo.png"
                                        class="avatar avatar-small bg-white shadow p-2 rounded" alt="">
                                    <h6 class="text-muted mt-2 mb-0">2017-19</h6>
                                </div>

                                <div class="ms-3">
                                    <h6 class="mb-0">Back-end Developer</h6>
                                    <p class="text-muted">Lenovo - China</p>
                                    <p class="text-muted mb-0">It seems that only fragments of the original text remain in
                                        the Lorem Ipsum texts used today. One may speculate that over the course of time
                                        certain letters were added or deleted at various positions within the text.</p>
                                </div>
                            </div>
                        </div><!--end col-->
                    </div><!--end row-->

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
                                                placeholder="Name :" value="{{ auth()->user()->id }}">
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
                    <div class="col-lg-3 col-md-4 col-sm-6 col-12 mt-4 pt-2">
                        <div class="candidate-card position-relative overflow-hidden text-center shadow rounded p-4">
                            <div class="content">
                                <img src="images/team/02.jpg" class="avatar avatar-md-md rounded-pill shadow-md"
                                    alt="">

                                <div class="mt-3">
                                    <a href="candidate-profile.html" class="title h5 text-dark">Tiffany Betancourt</a>
                                    <p class="text-muted mt-1">Application Developer</p>

                                    <span class="badge bg-soft-primary rounded-pill">Design</span>
                                    <span class="badge bg-soft-primary rounded-pill">UI</span>
                                    <span class="badge bg-soft-primary rounded-pill">UX</span>
                                    <span class="badge bg-soft-primary rounded-pill">Digital</span>
                                </div>

                                <div class="mt-2 d-flex align-items-center justify-content-between">
                                    <div class="text-center">
                                        <p class="text-muted fw-medium mb-0">Salary:</p>
                                        <p class="mb-0 fw-medium">$5k - $6k</p>
                                    </div>

                                    <div class="text-center">
                                        <p class="text-muted fw-medium mb-0">Experience:</p>
                                        <p class="mb-0 fw-medium">2 Years</p>
                                    </div>
                                </div>

                                <div class="mt-3">
                                    <a href="candidate-profile.html" class="btn btn-sm btn-primary me-1">View Profile</a>
                                    <a href="contactus.html" class="btn btn-sm btn-icon btn-soft-primary"><i
                                            data-feather="message-circle" class="icons"></i></a>
                                </div>

                                <a href="javascript:void(0)" class="like"><i
                                        class="mdi mdi-heart align-middle fs-4"></i></a>
                            </div>
                        </div>
                    </div><!--end col-->

                    <div class="col-lg-3 col-md-4 col-sm-6 col-12 mt-4 pt-2">
                        <div class="candidate-card position-relative overflow-hidden text-center shadow rounded p-4">
                            <div class="content">
                                <img src="images/team/03.jpg" class="avatar avatar-md-md rounded-pill shadow-md"
                                    alt="">

                                <div class="mt-3">
                                    <a href="candidate-profile.html" class="title h5 text-dark">Jacqueline Burns</a>
                                    <p class="text-muted mt-1">Senior Product Designer</p>

                                    <span class="badge bg-soft-primary rounded-pill">Design</span>
                                    <span class="badge bg-soft-primary rounded-pill">UI</span>
                                    <span class="badge bg-soft-primary rounded-pill">UX</span>
                                    <span class="badge bg-soft-primary rounded-pill">Digital</span>
                                </div>

                                <div class="mt-2 d-flex align-items-center justify-content-between">
                                    <div class="text-center">
                                        <p class="text-muted fw-medium mb-0">Salary:</p>
                                        <p class="mb-0 fw-medium">$5k - $6k</p>
                                    </div>

                                    <div class="text-center">
                                        <p class="text-muted fw-medium mb-0">Experience:</p>
                                        <p class="mb-0 fw-medium">2 Years</p>
                                    </div>
                                </div>

                                <div class="mt-3">
                                    <a href="candidate-profile.html" class="btn btn-sm btn-primary me-1">View Profile</a>
                                    <a href="contactus.html" class="btn btn-sm btn-icon btn-soft-primary"><i
                                            data-feather="message-circle" class="icons"></i></a>
                                </div>

                                <a href="javascript:void(0)" class="like"><i
                                        class="mdi mdi-heart align-middle fs-4"></i></a>
                            </div>
                        </div>
                    </div><!--end col-->

                    <div class="col-lg-3 col-md-4 col-sm-6 col-12 mt-4 pt-2">
                        <div class="candidate-card position-relative overflow-hidden text-center shadow rounded p-4">
                            <div class="ribbon ribbon-left overflow-hidden"><span
                                    class="text-center d-block bg-warning shadow small h6"><i
                                        class="mdi mdi-star"></i></span>
                            </div>
                            <div class="content">
                                <img src="images/team/04.jpg" class="avatar avatar-md-md rounded-pill shadow-md"
                                    alt="">

                                <div class="mt-3">
                                    <a href="candidate-profile.html" class="title h5 text-dark">Mari Harrington</a>
                                    <p class="text-muted mt-1">C++ Developer</p>

                                    <span class="badge bg-soft-primary rounded-pill">Design</span>
                                    <span class="badge bg-soft-primary rounded-pill">UI</span>
                                    <span class="badge bg-soft-primary rounded-pill">UX</span>
                                    <span class="badge bg-soft-primary rounded-pill">Digital</span>
                                </div>

                                <div class="mt-2 d-flex align-items-center justify-content-between">
                                    <div class="text-center">
                                        <p class="text-muted fw-medium mb-0">Salary:</p>
                                        <p class="mb-0 fw-medium">$5k - $6k</p>
                                    </div>

                                    <div class="text-center">
                                        <p class="text-muted fw-medium mb-0">Experience:</p>
                                        <p class="mb-0 fw-medium">2 Years</p>
                                    </div>
                                </div>

                                <div class="mt-3">
                                    <a href="candidate-profile.html" class="btn btn-sm btn-primary me-1">View Profile</a>
                                    <a href="contactus.html" class="btn btn-sm btn-icon btn-soft-primary"><i
                                            data-feather="message-circle" class="icons"></i></a>
                                </div>

                                <a href="javascript:void(0)" class="like"><i
                                        class="mdi mdi-heart align-middle fs-4"></i></a>
                            </div>
                        </div>
                    </div><!--end col-->

                    <div class="col-lg-3 col-md-4 col-sm-6 col-12 mt-4 pt-2">
                        <div class="candidate-card position-relative overflow-hidden text-center shadow rounded p-4">
                            <div class="content">
                                <img src="images/team/05.jpg" class="avatar avatar-md-md rounded-pill shadow-md"
                                    alt="">

                                <div class="mt-3">
                                    <a href="candidate-profile.html" class="title h5 text-dark">Floyd Glasgow</a>
                                    <p class="text-muted mt-1">Php Developer</p>

                                    <span class="badge bg-soft-primary rounded-pill">Design</span>
                                    <span class="badge bg-soft-primary rounded-pill">UI</span>
                                    <span class="badge bg-soft-primary rounded-pill">UX</span>
                                    <span class="badge bg-soft-primary rounded-pill">Digital</span>
                                </div>

                                <div class="mt-2 d-flex align-items-center justify-content-between">
                                    <div class="text-center">
                                        <p class="text-muted fw-medium mb-0">Salary:</p>
                                        <p class="mb-0 fw-medium">$5k - $6k</p>
                                    </div>

                                    <div class="text-center">
                                        <p class="text-muted fw-medium mb-0">Experience:</p>
                                        <p class="mb-0 fw-medium">2 Years</p>
                                    </div>
                                </div>

                                <div class="mt-3">
                                    <a href="candidate-profile.html" class="btn btn-sm btn-primary me-1">View Profile</a>
                                    <a href="contactus.html" class="btn btn-sm btn-icon btn-soft-primary"><i
                                            data-feather="message-circle" class="icons"></i></a>
                                </div>

                                <a href="javascript:void(0)" class="like"><i
                                        class="mdi mdi-heart align-middle fs-4"></i></a>
                            </div>
                        </div>
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end container-->
        @endif
    </section><!--end section-->
    <!-- End -->
    @include('layout.footer')
@endsection
