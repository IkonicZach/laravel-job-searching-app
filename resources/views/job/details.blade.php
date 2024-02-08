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
                                <li class="d-flex align-items-center me-2 fw-semibold">
                                    <a href="{{ route('company.profile', $job->company->created_by) }}" class="text-dark">
                                        <i class="fa-regular fa-building text-primary me-1"></i>
                                        {{ $job->company->name }}
                                    </a>
                                </li>
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
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="mb-0">Job Information:</h5>
                            @auth
                                @if ($job->created_by == auth()->user()->id)
                                    <a href="{{ route('job.edit', $job->id) }}" class="btn btn-sm icon-link btn-warning">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                        Edit job details
                                    </a>
                                @endif
                            @endauth
                        </div>

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
                                        <small class="text-primary mb-0">{{ $job->category->name ?? '-' }}</small>
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

                    @auth
                        <!-- Modal -->
                        <div class="modal fade" id="jobApplyModal{{ $job->id }}" tabindex="-1"
                            aria-labelledby="jobApplyModalLabel" aria-hidden="true" data-bs-backdrop="static">
                            <div class="modal-dialog" style="max-width: 650px">
                                <div class="modal-content p-5">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h5>Your info</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="row col-12 mb-3">
                                        <div class="col-2">
                                            <img src="{{ asset('uploads/' . auth()->user()->img) }}" class="apply-img"
                                                alt="">
                                        </div>
                                        <div class="col-10">
                                            <b>{{ $user->name }}</b>
                                            <p class="m-0">{{ $user->job ?? '--' }}</p>
                                            <p class="text-muted m-0">{{ $user->city }}, {{ $user->country }}
                                            </p>
                                        </div>
                                    </div>
                                    <form action="{{ route('job.apply', $job->id) }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="user_id" value="{{ $user->id }}">

                                        <div class="row">
                                            <label for="email" class="form-label fw-bold">Your Email</label>
                                            <input type="email" name="email" id="email"
                                                class="form-control @error('email') is-invalid @enderror mb-3"
                                                placeholder="Enter the email we can contact..." value="{{ $user->email }}">
                                            @error('email')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror

                                            <label for="phone" class="form-label fw-bold">Your Phone</label>
                                            <input type="tel" name="phone" id="phone"
                                                class="form-control @error('phone') is-invalid @enderror mb-3"
                                                placeholder="Enter the phone we can contact..." value="{{ $user->phone }}">
                                            @error('phone')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror

                                            <label for="resume_path" class="form-label fw-bold">Upload Resume
                                                <small class="text-muted fw-normal">(PDF | 5MB)</small></label>
                                            <input type="file" name="resume_path" id="resume_path"
                                                class="form-control @error('resume_path') is-invalid @enderror">
                                            @error('resume_path')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                            <small class="text-muted col-12 mb-3"><span class="text-danger">*</span> Be
                                                sure to
                                                include an updated resume.</small>
                                            <div class="d-flex justify-content-end">
                                                <input type="submit" class="btn btn-primary" value="Submit Application">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @else
                        <!-- Modal -->
                        <div class="modal fade" id="jobApplyModal{{ $job->id }}" tabindex="-1"
                            aria-labelledby="jobApplyModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content p-5">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h5>Please be authenticated to apply jobs.</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>

                                    <div class="d-flex justify-content-center pt-4">
                                        <a href="{{ route('user.login') }}" class="btn btn-primary me-1">Login</a>
                                        <a href="{{ route('user.register') }}" class="btn btn-light">Register</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endauth

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
                            <a data-bs-toggle="modal" data-bs-target="#jobApplyModal{{ $job->id }}"
                                class="btn btn-outline-primary">Apply Now <i
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
                @foreach ($similarJobs as $similarJob)
                    <div class="col-lg-4 col-md-6 col-12 mt-4 pt-2">
                        <div class="job-post job-type-three rounded shadow bg-white p-4">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <img src="{{ asset('uploads/' . $similarJob->company->img) }}"
                                        class="avatar avatar-small rounded shadow p-3 bg-white" alt="">
                                    <a href="{{ route('company.profile', $similarJob->company->created_by) }}"
                                        class="h5 company text-dark d-block mt-2">{{ $similarJob->company->name }}</a>
                                </div>
                                <ul class="list-unstyled align-items-center mb-0">
                                    <li class="list-inline-item">
                                        <form action="{{ route('job.bookmark', $similarJob->id) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            <button type="submit"
                                                class="btn btn-sm btn-icon btn-pills @auth @if (auth()->user()->bookmarkedJobs->contains($similarJob)) btn-primary @else btn-soft-primary @endif @endauth bookmark"><i
                                                    class="fa-regular fa-bookmark"></i></button>
                                        </form>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="#" class="btn btn-icon btn-sm btn-soft-primary">
                                            <i class="fa-solid fa-arrow-up-right-from-square"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>

                            <div class="mt-2">
                                <a href="job-detail-three.html" class="text-dark title h5">{{ $similarJob->title }}</a>
                                <p class="text-muted mt-2">
                                    {{ Str::limit($similarJob->description, $limit = 115, $end = '...') }}</p>

                                <ul class="list-unstyled mb-0">
                                    <li class="d-inline-block me-1"><a href="#"
                                            class="badge bg-primary">{{ $similarJob->employment_type }}</a></li>
                                    <li class="d-inline-block me-1"><a href="#"
                                            class="badge bg-primary">${{ $similarJob->min_salary }}
                                            - ${{ $similarJob->max_salary }}</a></li>
                                    <li class="d-inline-block me-1"><a href="#" class="badge bg-primary"><i
                                                class="fa-solid fa-location-dot pe-1"></i>{{ $similarJob->country }}</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div><!--end col-->
                @endforeach
            </div><!--end row-->
        </div><!--end container-->
    </section>
    <!-- End -->
    @include('layout.footer')
@endsection
