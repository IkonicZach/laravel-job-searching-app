@section('title', 'Setup Account')
@extends('layout.master')
@section('content')
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
                                    <div class="mb-3">
                                        <label class="form-label fw-semibold" for="phone">Upload Profile Picture
                                            :</label>
                                        <input type="file" name="img" id="img"
                                            class="form-control @error('img') is-invalid @enderror"
                                            value="{{ old('img') }}">
                                        @error('img')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label fw-semibold" for="phone">Your Phone :</label>
                                        <input type="tel" name="phone" id="phone"
                                            class="form-control @error('phone') is-invalid @enderror" placeholder="Phone :"
                                            value="{{ old('phone') }}">
                                        @error('phone')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label fw-semibold" for="bio">Your bio :</label>
                                        <textarea class="form-control @error('bio') is-invalid @enderror" name="bio" id="bio" rows="5"
                                            placeholder="Describe yourself">{{ old('bio') }}</textarea>
                                        @error('bio')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- Category and age starts here  --}}
                                    <div class="row mb-3">
                                        <div class="col-6">
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
                                        <div class="col-6">
                                            <label class="form-label fw-semibold">Your Age :</label>
                                            <input type="number" name="age" id="age"
                                                class="form-control @error('age') is-invalid @enderror" placeholder="Age :"
                                                min="1" max="100" value="{{ old('age') }}">
                                            @error('age')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    {{-- Positiion and age ends here  --}}

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
                                                        @if (old('country') == 'Singapore') selected @endif>Singapore</option>
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
                                                    id="city" name="city" value="{{ old('city') }}">
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
                                    <a href="" class="btn btn-light w-100">Skip</a>
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
    </script>

@endsection