<div class="modal fade" id="edit{{ $user->id }}" tabindex="-1" aria-labelledby="edit{{ $user->id }}Label"
    aria-hidden="true">
    <div class="modal-dialog" style="max-width: 750px !important">
        <div class="modal-content p-5">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="edit{{ $user->id }}Label">
                    Edit Role
                </h1>
            </div>
            <div class="modal-body">
                Edit {{ $user->name }}'s details.
            </div>
            <form action="{{ route('user-management.update', $user->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-12">
                        <div class="candidate-cover">
                            <div class="profile-banner relative text-transparent">
                                <input id="cover" name="cover" type="file" class="hidden">
                                <div class="relative shrink-0">
                                    @if ($user->cover == null)
                                        <img src="{{ asset('images/banner.jpg') }}" class="img-fluid rounded shadow"
                                            alt="">
                                    @else
                                        <img src="{{ asset('uploads/' . $user->cover) }}"
                                            class="img-fluid rounded shadow" style="object-position: top">
                                    @endif
                                    <label class="profile-image-label" for="cover"></label>
                                </div>
                            </div>
                        </div>
                        <div class="candidate-profile d-flex align-items-end mx-2">
                            <div class="profile-pic">
                                <input id="img" name="img" type="file" class="d-none">
                                <div class="position-relative d-inline-block">
                                    <img src="{{ asset('uploads/' . $user->img) }}"
                                        class="avatar avatar-medium img-thumbnail rounded-pill shadow-sm"
                                        id="profile-image" alt="">
                                    <label class="icons position-absolute bottom-0 end-0" for="img"><span
                                            class="btn btn-icon btn-sm btn-pills btn-primary"><i
                                                class="fa-solid fa-camera icons"></i></span></label>
                                </div>
                            </div>
                            <div class="ms-2">
                                <h5 class="mb-0">{{ $user->name }}</h5>
                                <p class="text-muted mb-0">{{ $user->position }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-6 mb-3">
                        <label class="form-label fw-semibold">Name:</label>
                        <input name="name" id="name" type="text"
                            class="form-control @error('name') is-invalid @enderror" placeholder="Full Name :"
                            value="{{ $user->name }}">
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-6 mb-3">
                        <label class="form-label fw-semibold">Your Job TItle:<span class="text-danger">*</span></label>
                        <input name="position" id="position" type="text"
                            class="form-control @error('position') is-invalid @enderror" placeholder="Job Title :"
                            value="{{ $user->position }}">
                        @error('position')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Category starts here  --}}
                    <div class="col-6 mb-3">
                        <label class="form-label fw-semibold" for="category">Your Preferred Industry
                            :</label>
                        <select class="form-control form-select @error('preferred_category') is-invalid @enderror"
                            name="preferred_category" id="category">
                            <option disabled selected>Industry</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" @if ($user->preferred_category == $category->id) selected @endif>
                                    {{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('preferred_category')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    {{-- Category ends here  --}}

                    <div class="col-6 mb-3">
                        <label class="form-label fw-semibold" for="birthday">Date of Birth :</label>
                        @if ($user->birthday != null)
                            {{ $user->birthday->format('d-m-Y') }}
                        @endif
                        <input type="date" name="birthday" id="birthday"
                            class="form-control @error('birthday') is-invalid @enderror"
                            placeholder="Your preferred position:" value="{{ $user->birthday }}">
                        @error('birthday')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-6">
                        <label for="experience" class="form-label fw-semibold">Experience in related field:
                        </label>
                        <input class="form-control @error('experience') is-invalid @enderror" type="text"
                            name="experience" id="experience" placeholder="eg. 2 Years"
                            value="{{ $user->experience }}">
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
                        <input class="form-control @error('min_salary') is-invalid @enderror" type="number"
                            name="min_salary" id="min_salary" placeholder="eg. 10" value="{{ $user->min_salary }}">
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
                        <input class="form-control @error('max_salary') is-invalid @enderror" type="number"
                            name="max_salary" id="max_salary" placeholder="eg. 1000"
                            value="{{ $user->max_salary }}">
                        @error('max_salary')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- Country city selection starts here  --}}
                    <div class="col-6 mb-3">
                        <label class="form-label fw-semibold">Country:</label>
                        <select class="form-control form-select @error('country') is-invalid @enderror" id="Country"
                            name="country">
                            <option selected disabled value="">Country</option>
                            <option value="Myanmar" @if ($user->country == 'Myanmar') selected @endif>
                                Myanmar</option>
                            <option value="Japan" @if ($user->country == 'Japan') selected @endif>Japan
                            </option>
                            <option value="Singapore" @if ($user->country == 'Singapore') selected @endif>
                                Singapore
                            </option>
                        </select>
                        @error('country')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-6 mb-3">
                        <label class="form-label fw-semibold">City:</label>
                        <select class="form-control form-select @error('city') is-invalid @enderror" id="city"
                            name="city" value="{{ $user->city }}">
                            <option selected disabled value="">City</option>
                            <option value="Yangon" @if ($user->city == 'Yangon') selected @endif>Yangon
                            </option>
                            <option value="Nagoya" @if ($user->city == 'Nagoya') selected @endif>Nagoya
                            </option>
                            <option value="Kashima" @if ($user->city == 'Kashima') selected @endif>
                                Kashima</option>
                        </select>
                        @error('city')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    {{-- Country city selection ends here  --}}

                    <div class="mb-3">
                        <label class="form-label fw-semibold" for="bio">Your bio :</label>
                        <textarea class="form-control @error('bio') is-invalid @enderror" name="bio" id="bio" rows="5"
                            placeholder="Describe yourself">{{ $user->bio }}</textarea>
                        @error('bio')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <label class="form-label fw-bold">Your Skills: </label>
                    <div class="accordion mb-3">
                        <div class="accordion-item">
                            <div class="accordion-header" onclick="toggleAccordion(this)">
                                Choose your skills <i class="fa-solid fa-circle-plus ps-1"></i>
                            </div>
                            <div class="accordion-content">
                                <div class="row">
                                    @foreach ($skills as $skill)
                                        <div class="row align-items-center col-6">
                                            <div class="col-6">
                                                <div class="form-check form-switch col-3">
                                                    <input class="form-check-input" type="checkbox" role="switch"
                                                        id="skill{{ $skill->id }}" name="skills[]"
                                                        value="{{ $skill->id }}"
                                                        @foreach ($user->user_skill as $uskill)
                                                                        @if ($uskill->id == $skill->id)
                                                                            checked
                                                                        @endif @endforeach>
                                                    <label class="form-check-label"
                                                        for="skill{{ $skill->id }}">{{ $skill->name }}</label>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <label class="form-label m-0">Proficiency: <span
                                                        id="proficiencyValue{{ $skill->id }}">50</span>%</label>
                                                <input type="range" name="proficiency[{{ $skill->id }}]"
                                                    class="form-range" min="0" max="100"
                                                    value="{{ old('proficiency.' . $skill->id, 50) }}" step="1"
                                                    disabled>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row col-md-12 mt-4 pt-2">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Email :</label>
                                <input name="email" id="email" type="email" class="form-control"
                                    placeholder="Email :" value="{{ $user->email }}">
                            </div>
                        </div><!--end col-->

                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Phone No. :</label>
                                <input name="phone" id="phone" type="text" class="form-control"
                                    placeholder="Phone :" value="{{ $user->phone }}">
                            </div>
                        </div><!--end col-->
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Confirm Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
