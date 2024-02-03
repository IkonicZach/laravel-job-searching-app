@section('title', 'Users Management')
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
                    <h3>Users list</h3>
                    <div class="table-head w-100 g-0">
                        <div class="th col-1"><b>#</b></div>
                        <div class="th col-2"><b>Name</b></div>
                        <div class="th col-4"><b>Email</b></div>
                        <div class="th col-2"><b>Role</b></div>
                        <div class="th col-3"><b>Actions</b></div>
                    </div>
                    <div class="table-body" style="height: auto !important;">
                        @if (!empty($users))
                            @if (count($users) > 0)
                                @foreach ($users as $user)
                                    <!-- User Delete Confirm Modal starts here -->
                                    <div class="modal fade" id="delete{{ $user->id }}" tabindex="-1"
                                        aria-labelledby="delete{{ $user->id }}Label" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="delete{{ $user->id }}Label">
                                                        Confirmation
                                                    </h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Are you sure you want to delete this user?
                                                </div>
                                                <div class="modal-footer">
                                                    <form action="{{ route('user-management.destroy', $user->id) }}"
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
                                    <!-- User Delete Confirm Modal ends here -->

                                    <!-- User Role Assign Modal starts here -->
                                    <x-admin-user-role-assign :user="$user" :roles="$roles" />
                                    <!-- User Role Assign Modal ends here -->

                                    {{-- User edit Modal starts here  --}}
                                    <x-admin-user-edit :user="$user" :categories="$categories" :skills="$skills" />
                                    {{-- User edit Modal ends here  --}}

                                    {{-- User Deactivate Modal Starts Here  --}}
                                    <x-admin-user-deactivate :user="$user" />
                                    {{-- User Deactivate Modal Ends Here  --}}

                                    <div class="table-data w-100 align-items-center g-0">
                                        <div class="td col-1">
                                            <p>{{ $user->id }}.</p>
                                        </div>
                                        <div class="td col-2">
                                            <p>{{ $user->name }}</p>
                                        </div>
                                        <div class="td col-4">
                                            <p>{{ $user->email }}</p>
                                        </div>
                                        <div class="td col-2">
                                            @foreach ($user->roles as $user_role)
                                                <p>{{ $user_role->name ?? '-' }}</p>
                                            @endforeach
                                        </div>
                                        <div class="td col-3">
                                            <div class="d-flex">
                                                <a href="{{ route('user.profile', $user->id) }}" class="btn btn-info me-1"
                                                    data-bs-toggle="tooltip" data-bs-title="View profile">
                                                    <i class="fa-regular fa-eye"></i>
                                                </a>
                                                <a data-bs-toggle="tooltip" data-bs-title="Assign role">
                                                    <button class="btn btn-icon btn-primary me-1" data-bs-toggle="modal"
                                                        data-bs-target="#assign{{ $user->id }}">
                                                        <i class="fa-solid fa-user-plus"></i>
                                                    </button>
                                                </a>
                                                <a data-bs-toggle="tooltip" data-bs-title="Edit">
                                                    <button class="btn btn-icon btn-warning me-1" data-bs-toggle="modal"
                                                        data-bs-target="#edit{{ $user->id }}">
                                                        <i class="fa-solid fa-pen-to-square"></i>
                                                    </button>
                                                </a>
                                                <a data-bs-toggle="tooltip" data-bs-title="Ban">
                                                    <button class="btn btn-danger btn-icon" data-bs-toggle="modal"
                                                        data-bs-target="#deactivate{{ $user->id }}">
                                                        <i class="fa-solid fa-user-slash"></i>
                                                    </button>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <h4 class="text-muted">No category available</h4>
                            @endif
                        @endif
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
