@section('title', 'Setup Account')
@extends('layout.master')
@section('content')
    <!-- Job apply form Start -->
    <section class="section bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-7 col-lg-8">
                    <h2>Finish setting up your account</h2>
                    <h4>Since you registered as an employer, you must enter your account details.</h4>
                    <div class="card border-0">
                        <form action="{{ route('employer.profile.doSetup') }}" method="POST" enctype="multipart/form-data"
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

                                    <div class="row mb-3">
                                        <div class="col-6">
                                            <label class="form-label fw-semibold" for="phone">Your Phone :</label>
                                            <input type="number" name="phone" id="phone"
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

                                    {{-- Country city selection starts here  --}}
                                    <div class="row mb-3">
                                        <div class="col-6">
                                            <div class="mb-3">
                                                <label class="form-label fw-semibold">Country:</label>
                                                <select
                                                    class="form-control form-select @error('country') is-invalid @enderror"
                                                    id="Country" name="country" value="{{ old('country') }}">
                                                    <option selected disabled value="">Country</option>
                                                    <option value="Myanmar">Myanmar</option>
                                                    <option value="Japan">Japan</option>
                                                    <option value="Singapore">Singapore</option>
                                                </select>
                                                @error('country')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <div class="mb-3">
                                                <label class="form-label fw-semibold">State:</label>
                                                <select class="form-control form-select @error('city') is-invalid @enderror"
                                                    id="city" name="city" value="{{ old('city') }}">
                                                    <option selected disabled value="">City</option>
                                                    <option value="Yangon">Yangon</option>
                                                    <option value="Nagoya">Nagoya</option>
                                                    <option value="Kashima">Kashima</option>
                                                </select>
                                                @error('city')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    {{-- Country city selection ends here  --}}
                                </div>
                            </div>

                            <div class="row mt-5">
                                <div class="col-6">
                                    <a href="/employer/company/create" class="btn btn-light w-100">Skip</a>
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
@endsection
