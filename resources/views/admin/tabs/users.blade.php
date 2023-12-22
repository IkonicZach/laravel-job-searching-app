@section('title', 'employers management')
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
                    <h3>Employers list</h3>
                    <div class="table-head w-100 g-0">
                        <div class="th col-05"><b>#</b></div>
                        <div class="th col-2"><b>Name</b></div>
                        <div class="th col-3"><b>Email</b></div>
                        <div class="th col-3"><b>Company</b></div>
                        <div class="th col-2"><b>Location</b></div>
                        <div class="th col-2"><b>Actions</b></div>
                    </div>
                    <div class="table-body">
                        <?php $i = 1; ?>
                        @if (!empty($employers))
                            @if (count($employers) > 0)
                                @foreach ($employers as $employer)
                                    <!-- Category Delete Confirm Modal starts here -->
                                    <div class="modal fade" id="delete{{ $employer->id }}" tabindex="-1"
                                        aria-labelledby="delete{{ $employer->id }}Label" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="delete{{ $employer->id }}Label">
                                                        Confirmation
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Are you sure you want to delete this category?
                                                </div>
                                                <div class="modal-footer">
                                                    <form action="{{ route('category.destroy', $employer->id) }}"
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
                                    <!-- Category Delete Confirm Modal ends here -->

                                    <div class="table-data w-100 align-items-center g-0">
                                        <div class="td col-05">
                                            <p>{{ $employer->id }}.</p>
                                        </div>
                                        <div class="td col-2">
                                            <p>{{ $employer->name }}</p>
                                        </div>
                                        <div class="td col-3">
                                            <p>{{ $employer->email }}</p>
                                        </div>
                                        <div class="td col-3">
                                            <p>{{ $employer->company->name ?? '-' }}</p>
                                        </div>
                                        <div class="td col-2">
                                            <p>{{ $employer->city ?? '...' }}, {{ $employer->country ?? '...' }}</p>
                                        </div>
                                        <div class="td col-2">
                                            <div class="d-flex">
                                                <a data-bs-toggle="collapse" data-bs-target="#cat_edit{{ $employer->id }}"
                                                    aria-expanded="true" aria-controls="cat_edit{{ $employer->id }}"
                                                    class="btn btn-primary me-1 relative">
                                                    <i class="fa-solid fa-pen-to-square"></i></a>
                                                <a data-bs-toggle="modal" data-bs-target="#delete{{ $employer->id }}"
                                                    class="btn btn-primary"><i class="fa-regular fa-trash-can"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <?php $i++; ?>
                                @endforeach
                            @else
                                <h4 class="text-muted">No category available</h4>
                            @endif
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
