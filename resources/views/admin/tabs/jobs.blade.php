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
                        <a href="{{ route('trash.job') }}" class="btn btn-light">Trash Can <i
                                class="fa-solid fa-trash-can"></i></a>
                    </div>
                </div>
                <div class="row g-4">
                    @foreach ($jobs as $job)
                        <div class="col-12">
                            <x-admin-job-edit :job="$job" :categories="$categories" :subcategories="$subcategories" :types="$employment_types"
                                :countries="$countries" :cities="$cities" />

                            <!-- Job Delete Confirm Modal starts here -->
                            <div class="modal fade" id="delete{{ $job->id }}" tabindex="-1"
                                aria-labelledby="delete{{ $job->id }}Label" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="delete{{ $job->id }}Label">
                                                Confirmation
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"><i class="fa-solid fa-xmark"></i></button>
                                        </div>
                                        <div class="modal-body">
                                            Are you sure you want to move this job to trash?
                                        </div>
                                        <div class="modal-footer">
                                            <form action="{{ route('job.destroy', $job->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Job Delete Confirm Modal ends here -->

                            <div
                                class="job-post job-post-list rounded shadow p-4 d-md-flex align-items-center justify-content-between position-relative">
                                <div class="d-flex align-items-center">
                                    <img src="{{ asset('uploads/' . $job->company->img) }}"
                                        class="avatar avatar-small rounded-circle shadow p-2 bg-white" alt="">
                                    <div class="ms-3">
                                        <a href="{{ route('job.show', $job->id) }}"
                                            class="h5 title text-dark">{{ substr($job->title, 0, 30) }}</a>
                                        <small class="d-flex align-items-center">
                                            <i class="fa-regular fa-building text-primary me-1"></i>
                                            {{ $job->company->name }}
                                        </small>
                                    </div>
                                </div>

                                <div class="d-flex align-items-center justify-content-between d-md-block mt-3 mt-md-0">
                                    <a class="badge bg-soft-primary rounded-pill">{{ $job->employment_type }}</a>
                                    <small class="text-muted d-flex align-items-center fw-medium mt-md-2">
                                        <i class="fa-regular fa-clock pe-1"></i></i>{{ $job->created_at->diffForHumans() }}
                                    </small>
                                </div>

                                <div class="d-flex align-items-center justify-content-between d-md-block mt-2 mt-md-0">
                                    <a class="text-muted d-flex align-items-center">
                                        <i class="fa-solid fa-location-dot pe-1"></i>
                                        {{ $job->country }}
                                    </a>
                                    <span class="d-flex fw-medium mt-md-2">
                                        ${{ $job->min_salary }} - ${{ $job->max_salary }}/mo
                                    </span>
                                </div>

                                <div class="mt-3 mt-md-0">
                                    <a data-bs-toggle="tooltip" data-bs-title="Edit">
                                        <button class="btn btn-icon btn-warning me-1" data-bs-toggle="modal"
                                            data-bs-target="#edit{{ $job->id }}">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </button>
                                    </a>
                                    <a data-bs-toggle="tooltip" data-bs-title="Move to trash">
                                        <button class="btn btn-icon btn-danger me-1" data-bs-toggle="modal"
                                            data-bs-target="#delete{{ $job->id }}">
                                            <i class="fa-regular fa-trash-can"></i>
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </div><!--end col-->
                    @endforeach
                </div><!--end row-->
            </div>
        </div>
    </div>
@endsection
