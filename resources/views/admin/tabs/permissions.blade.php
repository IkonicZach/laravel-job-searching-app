@section('title', 'Permissions management')
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
                    <h3>Permission list</h3>
                    <div class="d-flex justify-content-between align-items-center">
                        <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#permissionCreate"><i
                                class="fa-solid fa-plus"></i> New permission</a>
                        <a href="{{ route('trash.permission') }}" class="btn btn-light">Trash Can <i
                                class="fa-solid fa-trash-can"></i></a>
                    </div>
                </div>


                <!-- Permission Create Modal Starts -->
                <div class="modal fade" id="permissionCreate" tabindex="-1" data-bs-backdrop="static"
                    aria-labelledby="permissionCreateLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content p-5">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="permissionCreateLabel">Create new permission</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form action="{{ route('permission.store') }}" class="needs-validation" method="POST">
                                @csrf
                                <div class="modal-body">
                                    <label for="name" class="form-label fw-bold">Permission Name</label>
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

                <div class="col-12 my-table">
                    <div class="table-head w-100 g-0">
                        <div class="th col-1"><b>#</b></div>
                        <div class="th col-5"><b>Name</b></div>
                        <div class="th col-6"><b>Actions</b></div>
                    </div>
                    <div class="table-body">
                        <?php $i = 1; ?>
                        @if (!empty($permissions))
                            @if (count($permissions) > 0)
                                @foreach ($permissions as $permission)
                                    <!-- Permission Assign Modal Starts -->
                                    <div class="modal fade" id="permissionAssign{{ $permission->id }}" tabindex="-1"
                                        data-bs-backdrop="static" aria-labelledby="permissionAssignLabel"
                                        aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content p-5">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="permissionAssignLabel">Assign To Role
                                                    </h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <form action="{{ route('permission.assign', $permission->id) }}"
                                                    class="needs-validation" method="POST">
                                                    @csrf
                                                    <div class="modal-body">
                                                        <h4 class="fs-5">Roles</h4>
                                                        @foreach ($roles as $role)
                                                            <div class="form-check form-switch">
                                                                <input class="form-check-input" type="checkbox"
                                                                    role="switch"
                                                                    id="role{{ $role->id }}"
                                                                    name="roles[]" value="{{ $role->name }}"
                                                                    @foreach ($role->permissions as $role_permission)
                                                                        @if ($permission->name == $role_permission->name)
                                                                            checked
                                                                        @endif @endforeach>
                                                                <label class="form-check-label"
                                                                    for="role{{ $role->id }}">{{ $role->name }}</label>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Assign</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Permission Assign Modal Starts -->

                                    <!-- Permission Delete Confirm Modal starts here -->
                                    <div class="modal fade" id="delete{{ $permission->id }}" tabindex="-1"
                                        aria-labelledby="delete{{ $permission->id }}Label" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="delete{{ $permission->id }}Label">
                                                        Confirmation
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"><i class="fa-solid fa-xmark"></i></button>
                                                </div>
                                                <div class="modal-body">
                                                    Are you sure you want to delete this permission?
                                                </div>
                                                <div class="modal-footer">
                                                    <form action="{{ route('permission.destroy', $permission->id) }}"
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
                                    <!-- Permission Delete Confirm Modal ends here -->

                                    <!-- Permission Edit Modal Starts -->
                                    <div class="modal fade" id="permissionEdit{{ $permission->id }}" tabindex="-1"
                                        data-bs-backdrop="static" aria-labelledby="permissionEditLabel"
                                        aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content p-5">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="permissionEditLabel">Edit permission
                                                    </h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <form action="{{ route('permission.update', $permission->id) }}"
                                                    class="needs-validation" method="POST">
                                                    @csrf
                                                    @METHOD('PUT')
                                                    <div class="modal-body">
                                                        <label for="name" class="form-label fw-bold">New Permission
                                                            Name</label>
                                                        <input type="text" name="name" id="name"
                                                            class="form-control @error('name') is-invalid @enderror"
                                                            value="{{ $permission->name }}">
                                                        @error('name')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Confirm
                                                            Changes</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Permission Edit Modal Starts -->

                                    <div class="table-data w-100 align-items-center g-0">
                                        <div class="td col-1">
                                            <p>{{ $permission->id }}.</p>
                                        </div>
                                        <div class="td col-5">
                                            <p>{{ $permission->name }}</p>
                                        </div>
                                        <div class="td col-6">
                                            <div class="d-flex">
                                                <a class="btn btn-primary me-1" data-bs-toggle="modal"
                                                    data-bs-target="#permissionAssign{{ $permission->id }}">
                                                    <i class="fa-solid fa-user-plus"></i></a>
                                                <a class="btn btn-primary me-1" data-bs-toggle="modal"
                                                    data-bs-target="#permissionEdit{{ $permission->id }}">
                                                    <i class="fa-solid fa-pen-to-square"></i></a>
                                                <a data-bs-toggle="modal" data-bs-target="#delete{{ $permission->id }}"
                                                    class="btn btn-primary"><i class="fa-solid fa-circle-minus"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <?php $i++; ?>
                                @endforeach
                            @else
                                <h4 class="text-muted">No permissions registered</h4>
                            @endif
                        @endif
                    </div>
                </div>
                <div class="d-flex justify-content-center">
                    {{ $permissions->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
