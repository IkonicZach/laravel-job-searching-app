@section('title', 'Jobs management')
@extends('layout.master')
@section('content')
    @include('layout.nav')
    <div class="white-space"></div>

    <div class="row g-0 me-5">
        <div class="col-2 shadow-lg">
            @include('admin.nav')
        </div>
        <div class="col-10">
            <div class="shadow-lg p-5 m-3 me-5 w-100 rounder">
                <div class="d-flex justify-content-between align-items-center">
                    <h3>Jobs list</h3>
                    <div class="d-flex justify-content-between align-items-center">
                        <a href="{{ route('trash.permission') }}" class="btn btn-light">Trash Can <i
                                class="fa-solid fa-trash-can"></i></a>
                    </div>
                </div>
                <div class="row g-4">
                    @foreach ($jobs as $job)
                        <div class="col-12">
                            <div
                                class="job-post job-post-list rounded shadow p-4 d-md-flex align-items-center justify-content-between position-relative">
                                <div class="d-flex align-items-center w-250px">
                                    <img src="{{ asset('uploads/' . $job->company->img) }}"
                                        class="avatar avatar-small rounded-circle shadow p-2 bg-white" alt="">
                                    <div class="ms-3">
                                        <a href="{{ route('job.show', $job->id) }}"
                                            class="h5 title text-dark">{{ substr($job->title, 0, 30) }}</a>
                                        <small class="d-flex align-items-center"><i
                                                class="fa-regular fa-building text-primary me-1"></i>
                                            {{ $job->company->name }}</small>
                                    </div>
                                </div>

                                <div
                                    class="d-flex align-items-center justify-content-between d-md-block mt-3 mt-md-0 w-100px">
                                    <a class="badge bg-soft-primary rounded-pill">{{ $job->employment_type }}</a>
                                    <small class="text-muted d-flex align-items-center fw-medium mt-md-2"><i
                                            class="fa-regular fa-clock pe-1"></i></i>{{ $job->created_at->diffForHumans() }}</small>
                                </div>

                                <div
                                    class="d-flex align-items-center justify-content-between d-md-block mt-2 mt-md-0 w-130px">
                                    <a class="text-muted d-flex align-items-center"><i
                                            class="fa-solid fa-location-dot pe-1"></i>{{ $job->country }}</a>
                                    <span class="d-flex fw-medium mt-md-2">${{ $job->min_salary }} -
                                        ${{ $job->max_salary }}/mo</span>
                                </div>

                                <div class="mt-3 mt-md-0">
                                    <a href="" class="btn btn-sm btn-icon btn-pills btn-soft-primary bookmark"><i
                                            class="fa-regular fa-pen-to-square"></i></a>
                                    <a href="" class="btn btn-sm btn-primary w-full ms-md-1">Apply
                                        Now</a>
                                </div>
                            </div>
                        </div><!--end col-->
                    @endforeach
                </div><!--end row-->
            </div>
        </div>
    </div>
@endsection
