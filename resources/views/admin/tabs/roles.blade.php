@section('title', 'Roles management')
@extends('layout.master')
@section('content')
    @include('layout.nav')
    <div class="white-space"></div>

    <div class="row g-0 me-5">
        <div class="col-2 shadow-lg">
            @include('admin.nav')
        </div>
        <div class="col-10">
            <a class="btn btn-primary m-3 mb-0" data-bs-toggle="modal" data-bs-target="#roleCreate"><i class="fa-solid fa-user-plus"></i> Add a new role</a>
            <div class="shadow-lg p-5 m-3 me-5 w-100 rounder">
                <div class="d-flex justify-content-between align-items-center">
                    <h4 class="text-primary">Admin</h4>
                    <a class="btn btn-primary"><i
                            class="fa-solid fa-plus"></i> Assign permission</a>
                </div>
                
                <!-- Permission Create Modal Starts -->
                <div class="modal fade" id="roleCreate" tabindex="-1" data-bs-backdrop="static"
                    aria-labelledby="roleCreateLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content p-5">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="roleCreateLabel">Create new role</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form action="{{ route('role.store') }}" class="needs-validation" method="POST">
                                @csrf
                                <div class="modal-body">
                                    <label for="name" class="form-label fw-bold">Role Name</label>
                                    <input type="text" name="name" id="name"
                                        class="form-control @error('name') is-invalid @enderror">
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Create</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Permission Ends Modal Starts -->
            </div>
        </div>
    </div>
@endsection
