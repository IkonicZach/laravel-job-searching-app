@section('title', 'Companies management')
@extends('layout.master')
@section('content')
    @include('layout.nav')
    <div class="white-space"></div>

    <div class="row g-0 me-5">
        <div class="col-2 shadow-lg">
            @include('admin.nav')
        </div>
        <div class="col-10">
            <div class="row shadow-lg p-5 m-3 me-5 w-100 rounder">
                <div class="col-12 my-table">
                    <div class="d-flex justify-content-between align-items-center">
                        <h3>Companies list</h3>
                        <a href="{{ route('company-management.trash') }}" class="btn btn-light">Trash Can <i
                                class="fa-solid fa-trash-can"></i> </a>
                    </div>
                    <div class="table-head w-100 g-0">
                        <div class="th col-1"><b>#</b></div>
                        <div class="th col-3"><b>Name</b></div>
                        <div class="th col-3"><b>Email</b></div>
                        <div class="th col-2"><b>Field</b></div>
                        <div class="th col-3"><b>Actions</b></div>
                    </div>
                    <div class="table-body">
                        @if (!empty($companies))
                            @if (count($companies) > 0)
                                @foreach ($companies as $company)
                                    <!-- Company Delete Confirm Modal starts here -->
                                    <div class="modal fade" id="delete{{ $company->id }}" tabindex="-1"
                                        aria-labelledby="delete{{ $company->id }}Label" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="delete{{ $company->id }}Label">
                                                        Confirmation
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"><i class="fa-solid fa-xmark"></i></button>
                                                </div>
                                                <div class="modal-body">
                                                    Are you sure you want to delete this company?
                                                </div>
                                                <div class="modal-footer">
                                                    <form action="{{ route('company-management.destroy', $company->id) }}"
                                                        method="POST">
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
                                    <!-- Company Delete Confirm Modal ends here -->

                                    {{-- Edit modal starts here  --}}
                                    <x-admin-company-edit :company="$company" :categories="$categories" :countries="$countries"
                                        :cities="$cities" />
                                    {{-- Edit modal ends here  --}}

                                    <div class="table-data w-100 align-items-center g-0">
                                        <div class="td col-1">
                                            <p>{{ $company->id }}.</p>
                                        </div>
                                        <div class="td col-3">
                                            <p>{{ $company->name }}</p>
                                        </div>
                                        <div class="td col-3">
                                            <p>{{ $company->email ?? '...' }}</p>
                                        </div>
                                        <div class="td col-2">
                                            <p>{{ $company->category->name ?? '-' }}</p>
                                        </div>
                                        <div class="td col-3">
                                            <div class="d-flex">
                                                <a href="{{ route('company.profile', $company->createdBy->id) }}"
                                                    class="btn btn-primary me-1">
                                                    <i class="fa-solid fa-eye"></i>
                                                </a>
                                                <a class="btn btn-warning me-1" data-bs-toggle="modal"
                                                    data-bs-target="#company{{ $company->id }}">
                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                </a>
                                                <a data-bs-toggle="modal" data-bs-target="#delete{{ $company->id }}"
                                                    class="btn btn-danger">
                                                    <i class="fa-solid fa-circle-minus"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <h4 class="text-muted">No companies registered</h4>
                            @endif
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
