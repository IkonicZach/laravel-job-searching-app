@section('title', 'Setup Account')
@extends('layout.master')
@section('content')
    <style>
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
    </style>
    <!-- Job apply form Start -->
    <section class="section bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-7 col-lg-8">
                    <h2>Finish setting up your account</h2>
                    {{-- <h4>Since you registered as an candidate, you must enter your account details.</h4> --}}
                    <div class="card border-0">
                        <form action="{{ route('candidate.profile.doSetup') }}" method="POST" enctype="multipart/form-data"
                            class="rounded shadow p-4" autocomplete="off" novalidate>
                            @csrf
                            @METHOD('PUT')
                            <div class="row">
                                <div class="col-12">
                                    <input type="hidden" value="{{ Auth::id() }}" name="id">

                                    <div class="candidate-cover">
                                        <img src="{{ asset('images/hero/bg5.jpg') }}" class="img-fluid rounded shadow"
                                            alt="">
                                        <div class="file-button">
                                            <label for="cover" class="btn btn-light"><i
                                                    class="fa-solid fa-plus"></i>Upload Cover Photo</label>
                                            <input type="file" name="cover" id="cover"
                                                class="form-control @error('cover') is-invalid @enderror">
                                            @error('cover')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="backdrop"></div>
                                    </div>
                                    <div class="candidate-profile d-flex align-items-end justify-content-between mx-2">
                                        <div class="d-flex align-items-end w-100 justify-content-between">
                                            <div class="d-flex align-items-end">
                                                <div class="rounded-pill shadow border border-3 ">
                                                    <img src="{{ asset('images/guest.jpg') }}"
                                                        class="rounded-pill avatar avatar-medium" alt="">
                                                    <div class="file-button">
                                                        <label for="img" class="btn btn-light icon-btn"><i
                                                                class="fa-solid fa-plus"></i></label>
                                                        <input type="file" name="img" id="img"
                                                            class="form-control @error('img') is-invalid @enderror">
                                                        @error('img')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="backdrop rounded-pill shadow border border-3"
                                                        style="width: 116px"></div>
                                                </div>
                                                <div class="ms-2">
                                                    <h5 class="mb-0">{{ auth()->user()->name }}</h5>
                                                    <p class="text-muted mb-0">Positiion</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label fw-semibold" for="position">Your Position :</label>
                                        <input type="text" name="position" id="position"
                                            class="form-control @error('position') is-invalid @enderror"
                                            placeholder="Your preferred position:" value="{{ old('position') }}">
                                        @error('position')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-6">
                                            <label class="form-label fw-semibold" for="phone">Your Phone :</label>
                                            <input type="text" name="phone" id="phone"
                                                class="form-control @error('phone') is-invalid @enderror"
                                                placeholder="Phone :" value="{{ old('phone') }}">
                                            @error('phone')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-6">
                                            <label class="form-label fw-semibold" for="birthday">Date of Birth :</label>
                                            <input type="date" name="birthday" id="birthday"
                                                class="form-control @error('birthday') is-invalid @enderror"
                                                placeholder="Your preferred position:" value="{{ old('birthday') }}">
                                            @error('birthday')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label fw-semibold" for="bio">Your bio :</label>
                                        <textarea class="form-control @error('bio') is-invalid @enderror" name="bio" id="bio" rows="5"
                                            placeholder="Describe yourself">{{ old('bio') }}</textarea>
                                        @error('bio')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- Category starts here  --}}
                                    <div class="mb-3">
                                        <label class="form-label fw-semibold" for="category">Your Preferred Industry
                                            :</label>
                                        <select
                                            class="form-control form-select @error('preferred_category') is-invalid @enderror"
                                            name="preferred_category" id="category">
                                            <option disabled selected>Industry</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}"
                                                    @if (old('preferred_category') == $category->id) selected @endif>
                                                    {{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('preferred_category')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    {{-- Category ends here  --}}

                                    {{-- Experience and salary section starts here  --}}
                                    <div class="row mb-3">
                                        <div class="col-6">
                                            <label for="experience" class="form-label fw-semibold">Experience in related
                                                field: </label>
                                            <input class="form-control @error('experience') is-invalid @enderror"
                                                type="text" name="experience" id="experience"
                                                placeholder="eg. 2 Years" value="{{ old('experience') }}">
                                            @error('experience')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="col-3">
                                            <label for="min_salary" class="form-label fw-semibold">
                                                Min Salary($)
                                            </label>
                                            <input class="form-control @error('min_salary') is-invalid @enderror"
                                                type="number" name="min_salary" id="min_salary" placeholder="eg. 10"
                                                value="{{ old('min_salary') }}">
                                            @error('min_salary')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="col-3">
                                            <label for="max_salary" class="form-label fw-semibold">
                                                Max Salary($)
                                            </label>
                                            <input class="form-control @error('max_salary') is-invalid @enderror"
                                                type="number" name="max_salary" id="max_salary" placeholder="eg. 1000"
                                                value="{{ old('max_salary') }}">
                                            @error('max_salary')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    {{-- Experience and salary section ends here  --}}

                                    <div class="mb-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="experienceCheck"
                                                id="enableFieldsCheckbox">
                                            <label class="form-check-label fw-semibold" for="enableFieldsCheckbox">
                                                Do you have any working experience?
                                            </label>
                                        </div>
                                    </div>

                                    {{-- Experiences fields starts here  --}}
                                    <div class="row mb-3">
                                        <div class="col-6 mb-3">
                                            <label class="form-label fw-semibold" for="job_title">Job Title</label>
                                            <input type="text" class="form-control enable-disable" name="job_title"
                                                id="job_title" placeholder="Name of the job"
                                                value="{{ old('job_title') }}" disabled>
                                        </div>

                                        <div class="col-6 mb-3">
                                            <label class="form-label fw-semibold" for="company_name">Company Name</label>
                                            <input type="text" class="form-control enable-disable" name="company_name"
                                                id="company_name" placeholder="Company you worked for"
                                                value="{{ old('company_name') }}" disabled>
                                        </div>

                                        <div class="col-12 mb-3">
                                            <label class="form-label fw-semibold" for="location">Company's
                                                Location</label>
                                            <input type="text" class="form-control enable-disable" name="location"
                                                id="location" placeholder="Location of your company"
                                                value="{{ old('location') }}" disabled>
                                        </div>

                                        <div class="col-6 mb-3">
                                            <label class="form-label fw-semibold" for="start_date">Start Date</label>
                                            <input type="date" class="form-control enable-disable" name="start_date"
                                                id="start_date" value="{{ old('start_date') }}" disabled>
                                        </div>

                                        <div class="col-6 mb-3">
                                            <label class="form-label fw-semibold" for="end_date">End Date</label>
                                            <input type="date" class="form-control enable-disable" name="end_date"
                                                id="end_date" value="{{ old('end_date') }}" disabled>
                                        </div>

                                        <div class="col-12">
                                            <label class="form-label fw-semibold" for="description">Responsibilies &
                                                Achievements</label>
                                            <textarea class="form-control enable-disable" name="description" id="description" rows="5"
                                                placeholder="Describe your job" disabled>{{ old('description') }}</textarea>
                                        </div>
                                    </div>
                                    {{-- Experiences fields starts here  --}}

                                    {{-- Country city selection starts here  --}}
                                    <div class="row mb-3">
                                        <div class="col-6">
                                            <div class="mb-3">
                                                <label class="form-label fw-semibold">Country:</label>
                                                <select
                                                    class="form-control form-select @error('country') is-invalid @enderror"
                                                    id="Country" name="country" value="{{ old('country') }}">
                                                    <option selected disabled value="">Country</option>
                                                    <option value="Myanmar"
                                                        @if (old('country') == 'Myanmar') selected @endif>Myanmar</option>
                                                    <option value="Japan"
                                                        @if (old('country') == 'Japan') selected @endif>Japan</option>
                                                    <option value="Singapore"
                                                        @if (old('country') == 'Singapore') selected @endif>Singapore
                                                    </option>
                                                </select>
                                                @error('country')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <div class="mb-3">
                                                <label class="form-label fw-semibold">State:</label>
                                                <select
                                                    class="form-control form-select @error('city') is-invalid @enderror"
                                                    id="city" name="city">
                                                    <option selected disabled value="">City</option>
                                                    <option value="Yangon"
                                                        @if (old('city') == 'Yangon') selected @endif>Yangon</option>
                                                    <option value="Nagoya"
                                                        @if (old('city') == 'Nagoya') selected @endif>Nagoya</option>
                                                    <option value="Kashima"
                                                        @if (old('city') == 'Kashima') selected @endif>Kashima</option>
                                                </select>
                                                @error('city')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    {{-- Country city selection ends here  --}}

                                    <div class="accordion">
                                        <div class="accordion-item">
                                            <div class="accordion-header" onclick="toggleAccordion(this)">
                                                Choose your skills <i class="fa-solid fa-circle-plus ps-1"></i>
                                            </div>
                                            <div class="accordion-content">
                                                <div class="accordion-nav row">
                                                    <p class="m-0 col-6">What are you good at?</p>
                                                </div>
                                                <div class="row">
                                                    @foreach ($skills as $skill)
                                                        <div class="row align-items-center">
                                                            <div class="col-6">
                                                                <div class="form-check form-switch col-3">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        role="switch" id="skill{{ $skill->id }}"
                                                                        name="skills[]" value="{{ $skill->id }}">
                                                                    <label class="form-check-label"
                                                                        for="skill{{ $skill->id }}">{{ $skill->name }}</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <label class="form-label m-0">Proficiency: <span
                                                                        id="proficiencyValue{{ $skill->id }}">50</span>%</label>
                                                                <input type="range"
                                                                    name="proficiency[{{ $skill->id }}]"
                                                                    class="form-range" min="0" max="100"
                                                                    value="{{ old('proficiency.' . $skill->id, 50) }}"
                                                                    step="1" disabled>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
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
    <!-- Job apply form End -->
    <script>
        const checkboxes = document.querySelectorAll('[name^="skills"]');

        checkboxes.forEach(checkbox => {
            checkbox.addEventListener('change', function() {
                const skillId = this.value;
                const rangeInput = document.querySelector(`[name="proficiency[${skillId}]"]`);
                const spanValue = document.querySelector(`#proficiencyValue${skillId}`);

                rangeInput.disabled = !this.checked;

                rangeInput.addEventListener('input', function() {
                    const proficiencyValue = this.value;
                    spanValue.textContent = proficiencyValue;
                    console.log(`Skill ${skillId} Proficiency: ${this.value}`);
                });
            });
        });

        $(document).ready(function() {
            // Disable all input fields with the 'enable-disable' class initially
            $('.enable-disable').prop('disabled', true);

            // Listen for checkbox change event
            $('#enableFieldsCheckbox').change(function() {
                // Enable or disable input fields with the 'enable-disable' class based on checkbox state
                $('.enable-disable').prop('disabled', !$(this).prop('checked'));
            });
        });
    </script>

@endsection
