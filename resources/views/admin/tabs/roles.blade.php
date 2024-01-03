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
            <!-- Permission Create Modal Starts -->
            <div class="modal fade" id="roleCreate" tabindex="-1" data-bs-backdrop="static" aria-labelledby="roleCreateLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content p-5">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="roleCreateLabel">Create new role</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
            <a class="btn btn-primary m-3 mb-0" data-bs-toggle="modal" data-bs-target="#roleCreate"><i
                    class="fa-solid fa-user-plus"></i> Add a new role</a>
            @foreach ($roles as $role)
                <!-- Assign Permission Modal Starts -->
                <div class="modal fade" id="roleAssign{{ $role->id }}" tabindex="-1" data-bs-backdrop="static"
                    aria-labelledby="roleAssign{{ $role->id }}Label" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content p-5">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="roleAssign{{ $role->id }}Label">Assign permissions to
                                    <span class="text-primary">{{ $role->name }}</span>
                                </h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form action="{{ route('role.assign', $role->id) }}" class="needs-validation" method="POST">
                                @csrf
                                <div class="modal-body">
                                    <h4 class="fs-5">Permissions</h4>
                                    @foreach ($permissions as $permission)
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" role="switch"
                                                id="{{ $role->id }}-{{ $permission->id }}" name="permissions[]"
                                                value="{{ $permission->name }}"
                                                @foreach ($role->permissions as $role_permission)
                                                    @if ($permission->name == $role_permission->name)
                                                        checked
                                                    @endif @endforeach>
                                            <label class="form-check-label"
                                                for="{{ $role->id }}-{{ $permission->id }}">{{ $permission->name }}</label>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Assign</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Assign Permission Starts Ends -->

                <div class="shadow-lg p-5 m-3 me-5 w-100 rounder">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="text-primary">{{ $role->name }}</h4>
                        <a class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#roleAssign{{ $role->id }}"><i class="fa-solid fa-plus"></i>
                            Permissions</a>
                    </div>

                    @if ($role->permissions)
                        <ul class="list-group pt-1">
                            @foreach ($role->permissions as $role_permission)
                                <!-- Permission Revoke Confirm Modal starts here -->
                                <div class="modal fade" id="roleRevoke{{ $role_permission->id }}" tabindex="-1"
                                    aria-labelledby="roleRevoke{{ $role_permission->id }}Label" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5"
                                                    id="roleRevoke{{ $role_permission->id }}Label">
                                                    Confirmation
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"><i class="fa-solid fa-xmark"></i></button>
                                            </div>
                                            <div class="modal-body">
                                                Are you sure you want to revoke this permission
                                                from {{ $role->name }}?
                                            </div>
                                            <div class="modal-footer">
                                                <form
                                                    action="{{ route('role.revoke', [$role->id, $role_permission->id]) }}"
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
                                <!-- Permission Revoke Confirm Modal ends here -->

                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <p class="m-0">{{ $role_permission->name }}</p>
                                    @csrf
                                    <a class="btn btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#roleRevoke{{ $role_permission->id }}">Revoke</a>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        No Permissions Available
                    @endif
                </div>
            @endforeach
        </div>
    </div>
@endsection
