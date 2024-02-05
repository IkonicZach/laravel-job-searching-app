@section('title', 'Create Your Company Profile | Jobnova')
@extends('layout.master')
@section('content')
    <!-- Company create form Start -->
    <section class="section bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-7 col-lg-8">
                    <h4>Enter your company details.</h4>
                    <div class="card border-0">
                        <form action="{{ route('company.store') }}" method="POST" enctype="multipart/form-data"
                            class="rounded shadow p-4" autocomplete="off" novalidate>
                            @csrf
                            <input type="hidden" name="created_by" value="{{ auth()->user()->id }}">
                            <div class="row">
                                <div class="col-12">
                                    <div class="col-12 mb-3">
                                        <label class="form-label fw-semibold" for="name">Name:</label>
                                        <input class="form-control @error('name') is-invalid @enderror" type="text"
                                            name="name" id="name" placeholder="Company's name:"
                                            value="{{ old('name') }}">
                                        @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-6">
                                            <label class="form-label fw-semibold" for="email">Email:</label>
                                            <input class="form-control @error('email') is-invalid @enderror" type="email"
                                                name="email" id="email" placeholder="Company's email:"
                                                value="{{ old('email') }}">
                                            @error('email')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-6">
                                            <label class="form-label fw-semibold" for="position">Your position:</label>
                                            <input class="form-control @error('position') is-invalid @enderror"
                                                type="text" name="position" id="position"
                                                placeholder="Your position at the company:" value="{{ old('position') }}">
                                            @error('position')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-6">
                                            <label class="form-label fw-semibold" for="founded">Founded Year:</label>
                                            <input class="form-control @error('founded') is-invalid @enderror"
                                                type="number" name="founded" id="founded" placeholder="Company's email:"
                                                value="{{ old('founded') ?? '1950' }}" min="1950" max="2024">
                                            @error('founded')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-6">
                                            <label class="form-label fw-semibold" for="founder">Founder:</label>
                                            <input class="form-control @error('founder') is-invalid @enderror"
                                                type="text" name="founder" id="founder"
                                                placeholder="Name of the founder: " value="{{ old('founder') }}">
                                            @error('founder')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-12 mb-3">
                                        <label class="form-label fw-semibold" for="img">Upload Company Picture
                                            :</label>
                                        <input type="file" name="img" id="img"
                                            class="form-control @error('img') is-invalid @enderror"
                                            value="{{ old('img') }}">
                                        @error('img')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-12 mb-3">
                                        <label class="form-label fw-semibold" for="bio">Company's bio :</label>
                                        <textarea type="text" name="bio" id="bio" class="form-control @error('bio') is-invalid @enderror"
                                            rows="5" placeholder="Describe your company:">{{ old('bio') }}</textarea>
                                        @error('bio')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- Field and size starts here  --}}
                                    <div class="row mb-3">
                                        <div class="col-6">
                                            <label class="form-label fw-semibold">Field:</label>
                                            <select
                                                class="form-control form-select @error('category_id') is-invalid @enderror"
                                                id="category" name="category_id" value="{{ old('category_id') }}">
                                                <option selected disabled value="">Choose Field</option>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}"> {{ $category->name }} </option>
                                                @endforeach
                                            </select>
                                            @error('category_id')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-6">
                                            <label class="form-label fw-semibold">Company Size :</label>
                                            <input type="number" name="size" id="size"
                                                class="form-control @error('size') is-invalid @enderror"
                                                placeholder="Size :" min="1" max="100"
                                                value="{{ old('size') }}">
                                            @error('size')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    {{-- Field and size ends here  --}}

                                    {{-- Country city selection starts here  --}}
                                    <div class="row mb-3">
                                        <div class="col-6">
                                            <label class="form-label fw-semibold">Country:</label>
                                            <select class="form-control form-select @error('country') is-invalid @enderror"
                                                id="Country" name="country" value="{{ old('country') }}">
                                                <option selected disabled value="">Country</option>
                                                @foreach ($countries as $country)
                                                    <option value="{{ $country }}">{{ $country }}</option>
                                                @endforeach
                                            </select>
                                            @error('country')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-6">
                                            <label class="form-label fw-semibold">City:</label>
                                            <select class="form-control form-select @error('city') is-invalid @enderror"
                                                id="city" name="city" value="{{ old('city') }}">
                                                <option selected disabled value="">City</option>
                                                @foreach ($cities as $city)
                                                    <option value="{{ $city }}">{{ $city }}</option>
                                                @endforeach
                                            </select>
                                            @error('city')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    {{-- Country city selection ends here  --}}

                                    <div class="col-12 mb-3">
                                        <label class="form-label fw-semibold" for="address">Full Address:</label>
                                        <input class="form-control @error('address') is-invalid @enderror" type="text"
                                            name="address" id="address" placeholder="Company's full address:"
                                            value="{{ old('address') }}">
                                        @error('address')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-12 mb-3">
                                        <label class="form-label fw-semibold" for="socials">Social Links:</label>
                                        <input class="form-control @error('socials') is-invalid @enderror" type="text"
                                            name="socials" id="socials" placeholder="Company's social links:"
                                            value="{{ old('socials') }}">
                                        @error('socials')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-5">
                                <div class="col-6">
                                    <a href="{{ route('job.index') }}" class="btn btn-light w-100">Skip</a>
                                </div>
                                <div class="col-6">
                                    <input type="submit" class="submitBnt btn btn-primary w-100"
                                        value="Confirm details">
                                </div>
                            </div>
                        </form><!--end form-->
                    </div><!--end custom-form-->
                </div>
            </div>
        </div><!--end container-->
    </section><!--end section-->
    <!-- Company create form End -->
@endsection
