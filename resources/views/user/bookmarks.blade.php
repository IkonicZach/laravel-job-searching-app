@section('title', "User's Saved Jobs | Jobnova")
@extends('layout.master')
@section('content')
    @include('layout.nav')
    <div class="white-space"></div>
    <section class="section">

        @role('candidate')
            {{-- Bookmarked Jobs Starts Here --}}
            <div class="container mt-60">
                <h3>Bookmarked Jobs</h3>
                <div class="row g-4">
                    @if (count($bookmarkedJobs) > 0)
                        @foreach ($bookmarkedJobs as $job)
                            <div class="col-lg-4 col-md-6 col-12">
                                <div class="job-post job-type-three rounded shadow bg-white p-4">
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <img src="{{ asset('uploads/' . $job->company->img) }}"
                                                class="avatar avatar-small rounded shadow p-3 bg-white" alt="">
                                            <a href="employer-profile.html"
                                                class="h5 company text-dark d-block mt-2">{{ $job->company->name }}</a>
                                        </div>

                                        <ul class="list-unstyled align-items-center mb-0">
                                            <li class="list-inline-item">
                                                <form action="{{ route('job.bookmark', $job->id) }}" method="POST"
                                                    class="d-inline">
                                                    @csrf
                                                    <button type="submit"
                                                        class="btn btn-sm btn-icon btn-pills @if (auth()->user()->bookmarkedJobs->contains($job)) btn-primary @else btn-soft-primary @endif bookmark"><i
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
                                        <a href="job-detail-three.html" class="text-dark title h5">{{ $job->title }}</a>
                                        <p class="text-muted mt-2">
                                            {{ Str::limit($job->description, $limit = 115, $end = '...') }}</p>

                                        <ul class="list-unstyled mb-0">
                                            <li class="d-inline-block me-1">
                                                <a href="#" class="badge bg-primary">
                                                    {{ $job->employment_type }}
                                                </a>
                                            </li>
                                            <li class="d-inline-block me-1">
                                                <a href="#" class="badge bg-primary">
                                                    ${{ $job->min_salary }} - ${{ $job->max_salary }}
                                                </a>
                                            </li>
                                            <li class="d-inline-block me-1">
                                                <a href="#" class="badge bg-primary">
                                                    <i class="fa-solid fa-location-dot me-1"></i>
                                                    {{ $job->country }}
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div><!--end col-->
                        @endforeach
                    @else
                        <div class="d-flex justify-content-center align-items-center" style="height: 30vh">
                            <h4 class="text-muted">No bookmaked jobs.</h4>
                        </div>
                    @endif
                </div><!--end row-->

                <div class="d-flex justify-content-center">
                    {{ $bookmarkedJobs->links() }}
                </div>
            </div>
            {{-- Bookmarked Jobs Ends Here --}}
        @endrole

        @role('employer')
            {{-- Bookmarked Candidates Starts Here --}}
            <div class="container">
                <h3>Bookmarked Candidates</h3>
                <div class="row g-4">
                    @if (count($bookmarkedUsers) > 0)
                        @foreach ($bookmarkedUsers as $candidate)
                            <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                                <div class="candidate-card position-relative overflow-hidden text-center shadow rounded p-4">
                                    @if ($candidate->hasRole('admin'))
                                        <div class="ribbon ribbon-left overflow-hidden"><span
                                                class="text-center d-block bg-warning shadow small h6"><i
                                                    class="mdi mdi-star"></i></span>
                                        </div>
                                    @endif
                                    <div class="content">
                                        @php
                                            $imgPath = public_path('uploads/' . $candidate->img);
                                            $imgSrc = file_exists($imgPath) ? asset('uploads/' . $candidate->img) : asset('images/guest.jpg');
                                        @endphp

                                        <img src="{{ $imgSrc }}" class="avatar avatar-md-md rounded-pill shadow-md"
                                            alt="Candidate Image">

                                        <div class="mt-3">
                                            <a href="{{ route('user.profile', $candidate->id) }}"
                                                class="title h5 text-dark">{{ $candidate->name }}</a>
                                            <p class="text-muted mt-1">{{ $candidate->position }}</p>

                                            @foreach ($candidate->user_skill as $skill)
                                                <span class="badge bg-soft-primary rounded-pill">{{ $skill->name }}</span>
                                            @endforeach
                                        </div>

                                        <div class="mt-2 d-flex align-items-center justify-content-between">
                                            <div class="text-center">
                                                <p class="text-muted fw-medium mb-0">Salary:</p>
                                                <p class="mb-0 fw-medium">$5k - $6k</p>
                                            </div>

                                            <div class="text-center">
                                                <p class="text-muted fw-medium mb-0">Location:</p>
                                                <p class="mb-0 fw-medium">{{ $candidate->city }}</p>
                                            </div>
                                        </div>

                                        <div class="mt-3">
                                            <a href="{{ route('user.profile', $candidate->id) }}"
                                                class="btn btn-sm btn-primary me-1">View
                                                Profile</a>
                                            <a href="" class="btn btn-sm btn-icon btn-soft-primary"><i
                                                    class="fa-regular fa-message icons"></i></a>
                                        </div>

                                        <form action="{{ route('user.bookmark', $candidate->id) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            <button type="submit"
                                                style="border: none; background: none; -webkit-text-fill-color: unset !important;"
                                                class="like @if (auth()->user()->bookmarkedUsers->contains($candidate)) text-danger @else text-muted @endif bookmark">
                                                <i class="fa-solid fa-bookmark align-middle fs-4"></i>
                                            </button>
                                        </form>

                                        {{-- <a href="" class="like">
                                    <i class="fa-solid fa-bookmark align-middle fs-4"></i>
                                </a> --}}
                                    </div>
                                </div>
                            </div><!--end col-->
                        @endforeach
                    @else
                        <div class="d-flex justify-content-center align-items-center" style="height: 30vh">
                            <h4 class="text-muted">No bookmaked candidates.</h4>
                        </div>
                    @endif
                </div><!--end row-->

                <div class="d-flex justify-content-center">
                    {{ $bookmarkedUsers->links() }}
                </div>
            </div>
            {{-- Bookmarked Candidates Ends Here --}}
        @endrole
    </section>
    @include('layout.footer')
@endsection
