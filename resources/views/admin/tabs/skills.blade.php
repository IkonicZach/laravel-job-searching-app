@section('title', 'Skills management')
@extends('layout.master')
@section('content')
    @include('layout.nav')
    <div class="white-space"></div>

    <div class="row g-0 me-5">
        <div class="col-2 shadow-lg">
            @include('admin.nav')
        </div>
        <div class="col-10">
            <!-- Skill Create Modal Starts -->
            <div class="modal fade" id="skillCreate" tabindex="-1" data-bs-backdrop="static" aria-labelledby="skillCreateLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content p-5">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="skillCreateLabel">Create new skill</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{ route('skill.store') }}" class="needs-validation" method="POST">
                            @csrf
                            <div class="modal-body">
                                <label for="name" class="form-label fw-bold">Skill Name</label>
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
            <!-- Skill Ends Modal Starts -->
            <a class="btn btn-primary m-3 mb-0" data-bs-toggle="modal" data-bs-target="#skillCreate"><i
                    class="fa-solid fa-user-plus"></i> Add a new skill</a>
            <div class="shadow-lg p-5 m-3 me-5 w-100 rounder">
                @foreach ($skills as $skill)
                    <!-- Skill Update Modal Starts -->
                    <div class="modal fade" id="skillUpdate{{ $skill->id }}" tabindex="-1" data-bs-backdrop="static"
                        aria-labelledby="skillUpdate{{ $skill->id }}Label" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content p-5">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="skillUpdate{{ $skill->id }}Label">Update skill</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form action="{{ route('skill.update', $skill->id) }}" class="needs-validation"
                                    method="POST">
                                    @csrf
                                    @METHOD('PUT')
                                    <div class="modal-body">
                                        <label for="name" class="form-label fw-bold">Skill Name</label>
                                        <input type="text" name="name" id="name"
                                            class="form-control @error('name') is-invalid @enderror"
                                            value="{{ $skill->name }}">
                                        @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Confirm Changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Skill Update Modal Ends -->

                    <!-- Skill Delete Confirm Modal starts here -->
                    <div class="modal fade" id="delete{{ $skill->id }}" tabindex="-1"
                        aria-labelledby="delete{{ $skill->id }}Label" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="delete{{ $skill->id }}Label">
                                        Confirmation
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Are you sure you want to delete this skill?
                                </div>
                                <div class="modal-footer">
                                    <form action="{{ route('skill.destroy', $skill->id) }}" method="POST">
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
                    <!-- Skill Delete Confirm Modal ends here -->
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="text-primary">{{ $skill->name }}</h5>
                        <div>
                            <a class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#skillUpdate{{ $skill->id }}"><i
                                    class="fa-solid fa-pen-to-square"></i>
                                Edit</a>
                            <a data-bs-toggle="modal" data-bs-target="#delete{{ $skill->id }}"
                                class="btn btn-primary"><i class="fa-regular fa-trash-can"></i> Delete</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
