@section('title', 'Edit Job | Skilltrack')
@extends('layout.master')
@section('content')
    @include('layout.nav')
    <section class="bg-half-170 d-table w-100" style="background: url('{{ asset('images/hero/bg.jpg') }}');">
        <div class="bg-overlay bg-gradient-overlay"></div>
        <div class="container">
            <div class="row mt-5 justify-content-center">
                <div class="col-12">
                    <div class="title-heading text-center">
                        <h5 class="heading fw-semibold mb-0 sub-heading text-white title-dark">Edit your job</h5>
                    </div>
                </div><!--end col-->
            </div><!--end row-->

            <div class="position-middle-bottom">
                <nav aria-label="breadcrumb" class="d-block">
                    <ul class="breadcrumb breadcrumb-muted mb-0 p-0">
                        <li class="breadcrumb-item"><a href="/">Skilltrack</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('job.show', $job->id) }}">Job Details</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Job Edit</li>
                    </ul>
                </nav>
            </div>
        </div><!--end container-->
    </section><!--end section-->
    <div class="position-relative">
        <div class="shape overflow-hidden text-white">
            <svg viewBox="0 0 2880 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0 48H1437.5H2880V0H2160C1442.5 52 720 0 720 0H0V48Z" fill="currentColor"></path>
            </svg>
        </div>
    </div>
    <!-- Hero End -->

    <!-- Job apply form Start -->
    <section class="section bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-8">
                    <div class="card border-0">
                        <form class="rounded shadow p-4" action="{{ route('job.update', $job->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="updated_by" value="{{ auth()->user()->id }}">
                            <input type="hidden" name="company_id" value="{{ auth()->user()->company->id }}">

                            <div class="row">
                                <h5 class="mb-3">Job Details:</h5>
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label class="form-label fw-semibold" for="title">Job Title :</label>
                                        <input name="title" id="title"
                                            class="form-control @error('title') is-invalid @enderror" placeholder="Title :"
                                            value="{{ $job->title }}">
                                        @error('title')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-12 mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="limit_bol"
                                            @if ($job->limit != null) checked @endif>
                                        <label class="form-check-label fw-semibold" for="limit_bol">
                                            Limit applicants <small class="text-muted fw-normal">(Limit how many applicants
                                                and apply your job)</small>
                                        </label>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="limit" class="col-sm-3 col-form-label fw-semibold">Applicants limit:
                                    </label>
                                    <div class="col-sm-9">
                                        <input type="number" name="limit" class="form-control" id="limit"
                                            @if ($job->limit == null) disabled @else value="{{ $job->limit }}" @endif>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="mb-3">
                                        <label for="description" class="form-label fw-semibold">Desciption: </label>
                                        <textarea name="description" id="description" rows="5"
                                            class="form-control @error('description') is-invalid @enderror" placeholder="Describe the job: ">{{ $job->description }}</textarea>
                                        @error('description')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="mb-3">
                                        <label for="responsibilities" class="form-label fw-semibold">Responsibilities:
                                        </label>
                                        <textarea name="responsibilities" id="responsibilities" rows="5"
                                            class="form-control @error('responsibilities') is-invalid @enderror"
                                            placeholder="Describe the responsibilities as a list: ">{{ $job->responsibilities }}</textarea>
                                        @error('responsibilities')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label for="benefits" class="form-label fw-semibold">Benefits: </label>
                                        <textarea name="benefits" id="benefits" rows="5" class="form-control @error('benefits') is-invalid @enderror"
                                            placeholder="Describe the benefits as a list: ">{{ $job->benefits }}</textarea>
                                        @error('benefits')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label for="requirements" class="form-label fw-semibold">Requirements: </label>
                                        <textarea name="requirements" id="requirements" rows="5"
                                            class="form-control @error('requirements') is-invalid @enderror" placeholder="Describe the requirements: ">{{ $job->requirements }}</textarea>
                                        @error('requirements')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label fw-semibold">Job Field:</label>
                                        <select class="form-control form-select @error('category_id') is-invalid @enderror"
                                            id="category" name="category_id">
                                            <option selected disabled value="">Choose Field</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}"
                                                    {{ $job->category_id == $category->id ? 'selected' : '' }}>
                                                    {{ $category->name }} </option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label fw-semibold">Job Categories:</label>
                                        <select
                                            class="form-control form-select @error('subcategory_id') is-invalid @enderror"
                                            id="subcategory_id" name="subcategory_id">
                                            <option value="{{ $job->subcategory_id }}" selected>
                                                {{ $job->subcategory->name }}
                                            </option>
                                            {{-- <option selected disabled value="">Choose Subcategory</option> --}}
                                        </select>
                                        @error('subcategory_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                {{-- Categories selection ends here  --}}


                                {{-- Salary range starts here  --}}
                                <div class="col-md-6">
                                    <label for="salary" class="form-label fw-semibold">Salary range:</label>
                                    <div class="row" id="salary">
                                        <div class="col-md-6">
                                            <div class=" pt-md-1">
                                                <label class="form-label small fw-bold d-none"></label>
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text border" id="basic-addon1">$</span>
                                                    <input type="number"
                                                        class="form-control @error('min_salary') is-invalid @enderror"
                                                        min="1" max="10000" placeholder="Min" id="min"
                                                        name="min_salary" aria-describedby="inputGroupPrepend"
                                                        value="{{ $job->min_salary }}">
                                                    @error('min_salary')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="pt-md-1">
                                                <label class="form-label small fw-bold d-none"></label>
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text border" id="basic-addon1">$</span>
                                                    <input type="number"
                                                        class="form-control @error('max_salary') is-invalid @enderror"
                                                        min="1" max="10000" placeholder="Max" id="max"
                                                        name="max_salary" aria-describedby="inputGroupPrepend"
                                                        value="{{ $job->max_salary }}">
                                                    @error('max_salary')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- Salary range ends here  --}}

                                {{-- Employment type selection starts here  --}}
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold" for="employment_type">Employment:</label>
                                    <select
                                        class="form-control form-select @error('employment_type') is-invalid @enderror"
                                        id="employment_type" name="employment_type">
                                        <option selected disabled value="">Choose Employment</option>

                                        @foreach ($employment_types as $type)
                                            <option value="{{ $type }}"
                                                {{ $job->employment_type == $type ? 'selected' : '' }}>
                                                {{ $type }} </option>
                                        @endforeach
                                    </select>
                                    @error('employment_type')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                {{-- Employment type selection ends here  --}}

                                {{-- Job type selection starts here  --}}
                                <div class="col-md-4">
                                    <label class="form-label fw-semibold" for="type">Type:</label>
                                    <select class="form-control form-select mb-3 @error('type') is-invalid @enderror"
                                        id="type" name="type">
                                        <option selected disabled value="">Choose Type</option>
                                        <option value="Remote" {{ $job->type == 'Remote' ? 'selected' : '' }}>Remote
                                        </option>
                                        <option value="On-site" {{ $job->type == 'On-site' ? 'selected' : '' }}>On-site
                                        </option>
                                        <option value="Hybrid" {{ $job->type == 'Hybrid' ? 'selected' : '' }}>Hybrid
                                        </option>
                                    </select>
                                    @error('type')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                {{-- Job type selection ends here  --}}

                                <div class="col-md-4">
                                    <label class="form-label fw-semibold" for="deadline">Choose deadline:</label>
                                    <input type="date" class="form-control @error('deadline') is-invalid @enderror"
                                        name="deadline" id="deadline" value="{{ $job->deadline }}">
                                    @error('deadline')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- Status selection starts here  --}}
                                <div class="col-md-4">
                                    <label class="form-label fw-semibold" for="status">Status:</label>
                                    <select class="form-control form-select mb-3 @error('status') is-invalid @enderror"
                                        id="status" name="status">
                                        <option selected disabled value="">Choose Status</option>
                                        <option value="Available" {{ $job->status == 'Available' ? 'selected' : '' }}>
                                            Available</option>
                                        <option value="Unavailabe" {{ $job->status == 'Unavailabe' ? 'selected' : '' }}>
                                            Unavailabe</option>
                                        <option value="Pending" {{ $job->status == 'Pending' ? 'selected' : '' }}>Pending
                                        </option>
                                    </select>
                                    @error('status')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                {{-- Status selection ends here  --}}
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label class="form-label fw-semibold" for="address">Address:</label>
                                        <input name="address" id="address" type="text"
                                            class="form-control @error('address') is-invalid @enderror"
                                            placeholder="Address" value="{{ $job->address }}">
                                        @error('address')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div><!--end col-->

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label fw-semibold">Country:</label>
                                        <select class="form-control form-select @error('country') is-invalid @enderror"
                                            id="Country" name="country">
                                            <option selected disabled value="">Choose Country</option>
                                            @foreach ($countries as $country)
                                                <option value="{{ $country }}"
                                                    {{ $job->country == $country ? 'selected' : '' }}>{{ $country }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('country')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div><!--end col-->

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label fw-semibold">State:</label>
                                        <select class="form-control form-select @error('city') is-invalid @enderror"
                                            id="city" name="city">
                                            <option selected disabled value="">Choose City</option>
                                            @foreach ($cities as $city)
                                                <option value="{{ $city }}"
                                                    {{ $job->city == $city ? 'selected' : '' }}>{{ $city }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('city')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div><!--end col-->

                                <div class="row">
                                    <div class="col-12">
                                        <input type="submit" id="submit2" class="submitBnt btn btn-primary w-100"
                                            value="Post Now">
                                    </div><!--end col-->
                                </div><!--end row-->
                            </div>
                        </form><!--end form-->
                    </div><!--end custom-form-->
                </div>
            </div>
        </div><!--end container-->
    </section><!--end section-->
    <!-- Job apply form End -->

    <script>
        // Use jQuery or vanilla JavaScript to handle the change event
        $('#category').on('change', function() {
            var categoryId = $(this).val();

            // Make an AJAX request to get subcategories based on the selected category
            $.ajax({
                url: '/get-subcategories',
                type: 'GET',
                data: {
                    category_id: categoryId
                },
                success: function(data) {
                    // Clear existing options
                    $('#subcategory_id').empty();

                    // Populate subcategories dropdown with new options
                    $.each(data, function(key, value) {
                        $('#subcategory_id').append('<option value="' + value.id + '">' + value
                            .name + '</option>');
                    });
                }
            });
        });

        // Get the checkbox and number input elements
        const checkbox = document.getElementById('limit_bol');
        const numberInput = document.getElementById('limit');

        // Add an event listener to the checkbox
        checkbox.addEventListener('change', function() {
            // Enable or disable the number input based on the checkbox state
            numberInput.disabled = !checkbox.checked;
        });
    </script>
@endsection
