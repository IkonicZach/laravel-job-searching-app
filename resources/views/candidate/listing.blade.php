@section('title', 'Candidate Listings | Skilltrack')
@extends('layout.master')
@section('content')
    @include('layout.nav')
    <div class="white-space"></div>
    <!-- Start -->
    <section class="section">
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

                                {{-- @role('employer') --}}
                                    <form action="{{ route('user.bookmark', $candidate->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        <button type="submit"
                                            style="border: none; background: none; -webkit-text-fill-color: unset !important;"
                                            class="like @if (auth()->user()->bookmarkedUsers->contains($candidate)) text-danger @else text-muted @endif bookmark">
                                            <i class="fa-solid fa-bookmark align-middle fs-4"></i>
                                        </button>
                                    </form>
                                {{-- @endrole --}}

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
