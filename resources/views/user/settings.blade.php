@section('title', 'Settings')
@extends('layout.master')
@section('content')
    @include('layout.nav')
    <div class="white-space"></div>
    <style>
        .section {
            padding: 30px 0 100px 0 !important;
        }
    </style>
    <!-- Start -->
    <section class="section">

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="position-relative">
                        {{-- Images Form Starts Here  --}}
                        <form action="{{ route('profile.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
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
                            <input type="submit" class="btn btn-primary col-2 ms-5" value="Update Photos">
                        </form>
                        {{-- Images Form Ends Here  --}}
                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="rounded shadow p-4">
                        {{-- Personal Details Form Starts Here  --}}
                        <form action="{{ route('profile.update', $user->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <h5>Personal Details : <span class="text-danger">*</span></h5>
                            <div class="row mt-4">
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
                                    <label class="form-label fw-semibold">Your Job TItle:<span
                                            class="text-danger">*</span></label>
                                    <input name="position" id="position" type="text"
                                        class="form-control @error('position') is-invalid @enderror"
                                        placeholder="Job Title :" value="{{ $user->position }}">
                                    @error('position')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- Category starts here  --}}
                                <div class="col-6 mb-3">
                                    <label class="form-label fw-semibold" for="category">Your Preferred Industry
                                        :</label>
                                    <select
                                        class="form-control form-select @error('preferred_category') is-invalid @enderror"
                                        name="preferred_category" id="category">
                                        <option disabled selected>Industry</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}"
                                                @if ($user->preferred_category == $category->id) selected @endif>
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

                                {{-- Country city selection starts here  --}}
                                <div class="col-6 mb-3">
                                    <label class="form-label fw-semibold">Country:</label>
                                    <select class="form-control form-select @error('country') is-invalid @enderror"
                                        id="Country" name="country">
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
                                    <select class="form-control form-select @error('city') is-invalid @enderror"
                                        id="city" name="city" value="{{ $user->city }}">
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
                                                                <input class="form-check-input" type="checkbox"
                                                                    role="switch" id="skill{{ $skill->id }}"
                                                                    name="skills[]" value="{{ $skill->id }}"
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
                                                                value="{{ old('proficiency.' . $skill->id, 50) }}"
                                                                step="1" disabled>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <input type="submit" class="btn btn-primary col-2 ms-3" value="Apply Changes">
                        </form>
                        {{-- Personal Details Form Ends Here  --}}
                    </div>

                    <div class="rounded shadow p-4 mt-4">
                        <div class="row">
                            <div class="col-md-6 mt-4 pt-2">
                                <h5>Contact Info :</h5>

                                <form action="{{ route('profile.update', $user->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="row mt-4">
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label class="form-label fw-semibold">Email :</label>
                                                <input name="email" id="email" type="email" class="form-control"
                                                    placeholder="Email :" value="{{ $user->email }}">
                                            </div>
                                        </div><!--end col-->

                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label class="form-label fw-semibold">Phone No. :</label>
                                                <input name="phone" id="phone" type="text" class="form-control"
                                                    placeholder="Phone :" value="{{ $user->phone }}">
                                            </div>
                                        </div><!--end col-->

                                        <div class="col-lg-12 mt-2 mb-0">
                                            <input type="submit" class="btn btn-primary" value="Add">
                                        </div><!--end col-->
                                    </div><!--end row-->
                                </form>
                            </div><!--end col-->

                            <div class="col-md-6 mt-4 pt-2">
                                <h5>Change password :</h5>
                                <form action="{{ route('profile.password.update', $user->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="row mt-4">
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label class="form-label fw-semibold">Old password :</label>
                                                <input type="password" name="old_password"
                                                    class="form-control @error('old_password') is-invalid @enderror"
                                                    placeholder="Old password">
                                                @error('old_password')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div><!--end col-->

                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label class="form-label fw-semibold">New password :</label>
                                                <input type="password" name="password"
                                                    class="form-control @error('password') is-invalid @enderror"
                                                    placeholder="New password">
                                                @error('password')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div><!--end col-->

                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label class="form-label fw-semibold">Re-type New password :</label>
                                                <input type="password" name="password_confirmation" class="form-control"
                                                    placeholder="Re-type New password">
                                            </div>
                                        </div><!--end col-->

                                        <div class="col-lg-12 mt-2 mb-0">
                                            <button class="btn btn-primary">Save password</button>
                                        </div><!--end col-->
                                    </div><!--end row-->
                                </form>
                            </div><!--end col-->
                        </div>
                    </div>

                    <div class="rounded shadow p-4 mt-4">
                        <form>
                            <div class="row">
                                <div class="col-lg-6">
                                    <h5>Account Notifications :</h5>

                                    <div class="d-flex justify-content-between mt-4">
                                        <h6 class="mb-0">When someone mentions me</h6>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value=""
                                                id="noti1">
                                            <label class="form-check-label" for="noti1"></label>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between mt-4">
                                        <h6 class="mb-0">When someone follows me</h6>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" checked
                                                id="noti2">
                                            <label class="form-check-label" for="noti2"></label>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between mt-4">
                                        <h6 class="mb-0">When shares my activity</h6>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value=""
                                                id="noti3">
                                            <label class="form-check-label" for="noti3"></label>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between mt-4">
                                        <h6 class="mb-0">When someone messages me</h6>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value=""
                                                id="noti4">
                                            <label class="form-check-label" for="noti4"></label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <h5>Marketing Notifications :</h5>

                                    <div class="d-flex justify-content-between mt-4">
                                        <h6 class="mb-0">There is a sale or promotion</h6>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value=""
                                                id="noti5">
                                            <label class="form-check-label" for="noti5"></label>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between mt-4">
                                        <h6 class="mb-0">Company news</h6>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value=""
                                                id="noti6">
                                            <label class="form-check-label" for="noti6"></label>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between mt-4">
                                        <h6 class="mb-0">Weekly jobs</h6>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" checked
                                                id="noti7">
                                            <label class="form-check-label" for="noti7"></label>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between mt-4">
                                        <h6 class="mb-0">Unsubscribe News</h6>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" checked
                                                id="noti8">
                                            <label class="form-check-label" for="noti8"></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog" style="max-width: 700px">
                            <div class="modal-content p-3">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Account Deactivation
                                        Confirmation</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <h5>Are you sure you want to deactivate your account?</h5>
                                    <p class="m-0">Deactivating your account will have the following consequences:</p>
                                    <ul>
                                        <li>- Your profile and personal information will be hidden from other users.</li>
                                        <li>- You won't be able to access your account until it is reactivated.</li>
                                        <li>- Any active sessions will be terminated, and you will be logged out.</li>
                                    </ul>
                                    <p class="text-muted m-0"><span class="text-danger">* </span>You can reactivate your
                                        account at any time by logging in with your credentials.</p>
                                    <p class="text-muted"><strong>Important: </strong>Deactivating your account is not a
                                        permanent deletion. If you wish to permanently
                                        delete your account, please contact our support team <a
                                            href="{{ route('contact.index') }}" class="text-primary">here</a>.
                                    </p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                    <form action="" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Deactivate My Account</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="rounded shadow p-4 mt-4">
                        <form>
                            <h5 class="text-danger">Delete Account :</h5>
                            <div class="row mt-4">
                                <h6 class="mb-0">Do you want to delete the account? Please press below "Delete" button
                                </h6>
                                <div class="mt-4">
                                    <a class="btn btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal">Delete Account</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section><!--end section-->
    <!-- End -->
    @include('layout.footer')

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
