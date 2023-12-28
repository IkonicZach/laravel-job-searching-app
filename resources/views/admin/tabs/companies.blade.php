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
                        <a class="btn btn-light">Trash Can <i class="fa-solid fa-trash-can"></i> </a>
                    </div>
                    <div class="table-head w-100 g-0">
                        <div class="th col-05"><b>#</b></div>
                        <div class="th col-3"><b>Name</b></div>
                        <div class="th col-2"><b>Email</b></div>
                        <div class="th col-2"><b>Field</b></div>
                        <div class="th col-2"><b>Location</b></div>
                        <div class="th col-3"><b>Actions</b></div>
                    </div>
                    <div class="table-body">
                        <?php $i = 1; ?>
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
                                                    <form action="{{ route('company.destroy', $company->id) }}"
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
                                    <div class="modal fade" id="company{{ $company->id }}" data-bs-backdrop="static"
                                        data-bs-keyboard="false" tabindex="-1"
                                        aria-labelledby="company{{ $company->id }}Label" aria-hidden="true">
                                        <div class="modal-dialog" style="max-width: 600px !important">
                                            <div class="modal-content p-5">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="company{{ $company->id }}Label">Edit
                                                        {{ $company->name }}'s Details</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"><i class="fa-solid fa-xmark fs-4"></i></button>
                                                </div>
                                                <p class="text-muted text-end m-0"
                                                    style="font-size: 0.8rem; padding-top: 1rem">Last updated:
                                                    {{ $company->updated_at->format('d-M-Y / H:i:s') }}</p>
                                                <div class="modal-body">
                                                    <form action="{{ route('company.update', $company->id) }}"
                                                        method="POST" enctype="multipart/form-data"
                                                        class="rounded shadow p-4" autocomplete="off" novalidate>
                                                        @csrf
                                                        @METHOD('PUT')
                                                        <input type="hidden" name="updated_by"
                                                            value="{{ auth()->user()->id }}">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="col-12 mb-3">
                                                                    <label class="form-label fw-semibold"
                                                                        for="name">Name:</label>
                                                                    <input
                                                                        class="form-control @error('name') is-invalid @enderror"
                                                                        type="text" name="name" id="name"
                                                                        placeholder="Company's name:"
                                                                        value="{{ $company->name }}">
                                                                    @error('name')
                                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <div class="col-6">
                                                                        <label class="form-label fw-semibold"
                                                                            for="email">Email:</label>
                                                                        <input
                                                                            class="form-control @error('email') is-invalid @enderror"
                                                                            type="email" name="email" id="email"
                                                                            placeholder="Company's email:"
                                                                            value="{{ $company->email }}">
                                                                        @error('email')
                                                                            <div class="invalid-feedback">{{ $message }}
                                                                            </div>
                                                                        @enderror
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <label class="form-label fw-semibold"
                                                                            for="position">Your position:</label>
                                                                        <input
                                                                            class="form-control @error('position') is-invalid @enderror"
                                                                            type="text" name="position" id="position"
                                                                            placeholder="Your position at the company:"
                                                                            value="{{ $company->createdBy->position }}">
                                                                        @error('position')
                                                                            <div class="invalid-feedback">{{ $message }}
                                                                            </div>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 mb-3">
                                                                    <label class="form-label fw-semibold"
                                                                        for="img">Company Picture
                                                                        :</label>
                                                                    @if ($company->img)
                                                                        <b>Uploaded File: <a
                                                                                href="{{ asset('uploads/' . $company->img) }}">{{ $company->img }}</a></b>
                                                                    @endif
                                                                    <input type="file" name="img" id="img"
                                                                        class="form-control @error('img') is-invalid @enderror">
                                                                    @error('img')
                                                                        <div class="invalid-feedback">{{ $message }}
                                                                        </div>
                                                                    @enderror
                                                                </div>
                                                                <div class="col-12 mb-3">
                                                                    <label class="form-label fw-semibold"
                                                                        for="bio">Company's bio :</label>
                                                                    <textarea type="text" name="bio" id="bio" class="form-control @error('bio') is-invalid @enderror"
                                                                        rows="5" placeholder="Describe your company:">{{ $company->bio }}</textarea>
                                                                    @error('bio')
                                                                        <div class="invalid-feedback">{{ $message }}
                                                                        </div>
                                                                    @enderror
                                                                </div>

                                                                {{-- Field and size starts here  --}}
                                                                <div class="row mb-3">
                                                                    <div class="col-6">
                                                                        <label
                                                                            class="form-label fw-semibold">Field:</label>
                                                                        <select
                                                                            class="form-control form-select @error('category_id') is-invalid @enderror"
                                                                            id="category" name="category_id">
                                                                            <option selected disabled value="">Choose
                                                                                Field</option>
                                                                            @foreach ($categories as $category)
                                                                                <option value="{{ $category->id }}"
                                                                                    @if ($category->id == $company->category_id) selected @endif>
                                                                                    {{ $category->name }} </option>
                                                                            @endforeach
                                                                        </select>
                                                                        @error('category_id')
                                                                            <div class="invalid-feedback">{{ $message }}
                                                                            </div>
                                                                        @enderror
                                                                    </div>

                                                                    <div class="col-6">
                                                                        <label class="form-label fw-semibold">Company Size
                                                                            :</label>
                                                                        <input type="number" name="size"
                                                                            id="size"
                                                                            class="form-control @error('size') is-invalid @enderror"
                                                                            placeholder="Size :" min="1"
                                                                            max="100" value="{{ $company->size }}">
                                                                        @error('size')
                                                                            <div class="invalid-feedback">{{ $message }}
                                                                            </div>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                                {{-- Field and size ends here  --}}

                                                                {{-- Country city selection starts here  --}}
                                                                <div class="row mb-3">
                                                                    <div class="col-6">
                                                                        <label
                                                                            class="form-label fw-semibold">Country:</label>
                                                                        <select
                                                                            class="form-control form-select @error('country') is-invalid @enderror"
                                                                            id="Country" name="country">
                                                                            <option selected disabled value="">
                                                                                Country</option>
                                                                            @foreach ($countries as $country)
                                                                                <option value="{{ $country }}"
                                                                                    @if ($country == $company->country) selected @endif>
                                                                                    {{ $country }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                        @error('country')
                                                                            <div class="invalid-feedback">{{ $message }}
                                                                            </div>
                                                                        @enderror
                                                                    </div>

                                                                    <div class="col-6">
                                                                        <label class="form-label fw-semibold">City:</label>
                                                                        <select
                                                                            class="form-control form-select @error('city') is-invalid @enderror"
                                                                            id="city" name="city">
                                                                            <option selected disabled value="">City
                                                                            </option>
                                                                            @foreach ($cities as $city)
                                                                                <option value="{{ $city }}"
                                                                                    @if ($city == $company->city) selected @endif>
                                                                                    {{ $city }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                        @error('city')
                                                                            <div class="invalid-feedback">{{ $message }}
                                                                            </div>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                                {{-- Country city selection ends here  --}}

                                                                <div class="col-12 mb-3">
                                                                    <label class="form-label fw-semibold"
                                                                        for="address">Full Address:</label>
                                                                    <input
                                                                        class="form-control @error('address') is-invalid @enderror"
                                                                        type="text" name="address" id="address"
                                                                        placeholder="Company's full address:"
                                                                        value="{{ $company->address }}">
                                                                    @error('address')
                                                                        <div class="invalid-feedback">{{ $message }}
                                                                        </div>
                                                                    @enderror
                                                                </div>

                                                                <div class="col-12 mb-3">
                                                                    <label class="form-label fw-semibold"
                                                                        for="socials">Social Links:</label>
                                                                    <input
                                                                        class="form-control @error('socials') is-invalid @enderror"
                                                                        type="text" name="socials" id="socials"
                                                                        placeholder="Company's social links:"
                                                                        value="{{ $company->socials }}">
                                                                    @error('socials')
                                                                        <div class="invalid-feedback">{{ $message }}
                                                                        </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row mt-5">
                                                            <button type="button" class="btn btn-secondary col-2"
                                                                data-bs-dismiss="modal">Close</button>
                                                            <a href="{{ route('company.edit', $company->id) }}"
                                                                class="btn btn-light col-5">Reset</a>
                                                            <input type="submit" class="btn btn-primary col-5"
                                                                value="Confirm Changes">
                                                        </div>
                                                    </form><!--end form-->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- Edit modal ends here  --}}

                                    <div class="table-data w-100 align-items-center g-0">
                                        <div class="td col-05">
                                            <p>{{ $company->id }}.</p>
                                        </div>
                                        <div class="td col-3">
                                            <p>{{ $company->name }}</p>
                                        </div>
                                        <div class="td col-2">
                                            <p>{{ $company->email ?? '...' }}</p>
                                        </div>
                                        <div class="td col-2">
                                            <p>{{ $company->category->name ?? '-' }}</p>
                                        </div>
                                        <div class="td col-2">
                                            <p>{{ $company->city ?? '...' }}, {{ $company->country ?? '...' }}</p>
                                        </div>
                                        <div class="td col-3">
                                            <div class="d-flex">
                                                <a href="{{ route('company.profile', $company->createdBy->id) }}"
                                                    class="btn btn-primary me-1"><i class="fa-solid fa-eye"></i></a>
                                                <a class="btn btn-primary me-1" data-bs-toggle="modal"
                                                    data-bs-target="#company{{ $company->id }}">
                                                    <i class="fa-solid fa-pen-to-square"></i></a>
                                                <a data-bs-toggle="modal" data-bs-target="#delete{{ $company->id }}"
                                                    class="btn btn-primary"><i class="fa-solid fa-circle-minus"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <?php $i++; ?>
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
