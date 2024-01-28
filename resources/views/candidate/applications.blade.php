@section('title', 'Applications List | Skilltrack')
@extends('layout.master')
@section('content')
    @include('layout.nav')
    <div class="white-space"></div>
    <div class="container my-5">
        <div class="row g-4">
            <div class="d-flex justify-content-between align-items-center">
                <ul class="my-breadcrumb">
                    <li class="my-breadcrumb-item"> Home </li>
                </ul>
                <a href="{{ route('trash.application') }}" class="btn icon-link btn-light">
                    <i class="fa-regular fa-trash-can"></i>
                    Trash can
                </a>
            </div>
            @foreach ($applications as $application)
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="job-post rounded shadow bg-white">
                        <div class="p-4">
                            <div class="d-flex justify-content-between align-items-center">
                                <a href="{{ route('job.show', $application->job_id) }}" class="text-dark title h5 m-0">
                                    {{ $application->job->title }}
                                </a>
                                <form action="{{ route('application.destroy', $application->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-icon btn-danger" data-bs-toggle="tooltip"
                                        data-bs-title="Move to trash">
                                        <i class="fa-regular fa-trash-can"></i>
                                    </button>
                                </form>
                            </div>


                            <p class="text-muted d-flex align-items-center small mt-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-clock fea icon-sm text-primary me-1">
                                    <circle cx="12" cy="12" r="10"></circle>
                                    <polyline points="12 6 12 12 16 14"></polyline>
                                </svg>
                                Applied {{ $application->created_at->diffForHumans() }}
                            </p>

                            <ul class="list-unstyled d-flex justify-content-between align-items-center mb-0 mt-3">
                                <li class="list-inline-item">
                                    <span class="badge bg-soft-primary">{{ $application->job->employment_type }}</span>
                                </li>
                                <li class="list-inline-item">
                                    <span class="text-muted d-flex align-items-center small">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-dollar-sign fea icon-sm text-primary me-1">
                                            <line x1="12" y1="1" x2="12" y2="23"></line>
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
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
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
        </div>
    </div>
    @include('layout.footer')
@endsection
