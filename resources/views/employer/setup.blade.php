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
                                            class="form-control @error('phone') is-invalid @enderror" placeholder="Phone :" value="{{ old('phone') }}">
                                        @error('phone')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- Positiion and age starts here  --}}
                                    <div class="col-12 mb-3">
                                        <label class="form-label fw-semibold">Your Age :</label>
                                        <input type="number" name="age" id="age"
                                            class="form-control @error('age') is-invalid @enderror" placeholder="Age :"
                                            min="1" max="100" value="{{ old('age') }}">
                                        @error('age')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
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
                                    <input type="submit" class="submitBnt btn btn-primary w-100" value="Confirm details">
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
