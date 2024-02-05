@extends('layout.master')
@section('title', 'Admin Dashboard | Jobnova')
@section('content')
    @include('layout.nav')
    <div class="white-space"></div>

    <div class="row g-0">
        <div class="col-2 shadow-lg">
            @include('admin.nav')
        </div>
        <div class="col-10">
            <div class="px-5">
                <div class="dashboard-card-row">
                    <a href="{{ route('user-management.index') }}" class="col-4 dashboard-card shadow-lg">
                        <div>
                            <h5>Users</h5>
                            <span>{{ count($users) }}</span>
                        </div>
                        <i class="fa-solid fa-users text-info"></i>
                    </a>
                    <a href="{{ route('company-management.index') }}" class="col-4 dashboard-card shadow-lg">
                        <div>
                            <h5>Companies</h5>
                            <span>{{ count($companies) }}</span>
                        </div>
                        <i class="fa-solid fa-building text-success"></i>
                    </a>
                    <a href="{{ route('job-management.index') }}" class="col-4 dashboard-card shadow-lg">
                        <div>
                            <h5>Vacant Jobs</h5>
                            <span>{{ count($jobs) }}</span>
                        </div>
                        <i class="fa-solid fa-briefcase text-warning"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
