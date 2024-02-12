@section('title', 'Candidate Listings | Jobnova')
@extends('layout.master')
@section('content')
    @include('layout.nav')
    <div class="white-space"></div>
    <!-- Hero Start -->
    <section class="bg-half-170 d-table w-100" style="background: url('{{ asset('images/hero/bg.jpg') }}');">
        <div class="bg-overlay bg-gradient-overlay"></div>
        <div class="container">
            <div class="row mt-5 justify-content-center">
                <div class="col-12">
                    <div class="title-heading text-center">
                        <h5 class="heading fw-semibold mb-0 sub-heading text-white title-dark">Browse Candidates</h5>
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
                            <form action="{{ route('candidate.index') }}" method="GET" class="card-body text-start">
                                @csrf
                                <div class="registration-form text-dark text-start">
                                    <div class="row g-lg-0">
                                        <div class="col-lg-3 col-md-6 col-12">
                                            <div class="mb-3 mb-sm-0">
                                                <div class="filter-search-form position-relative filter-border">
                                                    <i class="fa-solid fa-magnifying-glass icons"></i>
                                                    <input name="search" type="text" id="job-keyword"
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
                                                    <select class="form-select search-select" name="country">
                                                        <option class="search-select-item" disabled selected>
                                                            Country</option>
                                                        @foreach ($countries as $country)
                                                            <option class="search-select-item" value="{{ $country }}">
                                                                {{ $country }}
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
                                                    <select class="form-select search-select" name="category_id">
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

                                        <div class="col-lg-3 col-md-6 col-12 d-flex align-items-center">
                                            <input type="submit" style="border-radius: 6px !important;height: 60px;"
                                                class="btn btn-primary searchbtn w-100" value="Search">
                                            <a href="{{ route('candidate.index') }}" data-bs-toggle="tooltip"
                                                data-bs-title="Refresh" style="border-radius: 6px !important;height: 60px;"
                                                class="btn btn-light searchbtn d-flex align-items-center">
                                                <i class="fa-solid fa-rotate-right"></i>
                                            </a>
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
            <div class="row g-4">
                @foreach ($candidates as $candidate)
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
                                        <p class="mb-0 fw-medium">
                                            ${{ $candidate->min_salary }} - ${{ $candidate->max_salary }}
                                        </p>
                                    </div>

                                    <div class="text-center">
                                        <p class="text-muted fw-medium mb-0">Experience:</p>
                                        <p class="mb-0 fw-medium">{{ $candidate->experience ?? '-' }}</p>
                                    </div>
                                </div>

                                <div class="mt-3">
                                    <a href="{{ route('user.profile', $candidate->id) }}"
                                        class="btn btn-sm btn-primary me-1">View
                                        Profile</a>
                                    <a href="" class="btn btn-sm btn-icon btn-soft-primary"><i
                                            class="fa-regular fa-message icons"></i></a>
                                </div>

                                @auth
                                    @can('save-user')
                                        <form action="{{ route('user.bookmark', $candidate->id) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            <button type="submit"
                                                style="border: none; background: none; -webkit-text-fill-color: unset !important;"
                                                class="like @if (auth()->user()->bookmarkedUsers->contains($candidate)) text-danger @else text-muted @endif bookmark">
                                                <i class="fa-solid fa-bookmark align-middle fs-4"></i>
                                            </button>
                                        </form>
                                    @endcan
                                @endauth

                                {{-- <a href="" class="like">
                                    <i class="fa-solid fa-bookmark align-middle fs-4"></i>
                                </a> --}}
                            </div>
                        </div>
                    </div><!--end col-->
                @endforeach
            </div><!--end row-->

            <div class="d-flex justify-content-center">
                {{ $candidates->links() }}
            </div>
        </div><!--end container-->
    </section><!--end section-->
    <!-- End -->
    @include('layout.footer')
@endsection
