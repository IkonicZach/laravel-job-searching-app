@section('title', 'Company Edit Details')
@extends('layout.master')
@section('content')
    <!-- Job apply form Start -->
    <section class="section bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-8">
                    <h2>Build your resume.</h2>
                    <div class="card border-0">
                        <form action="{{ route('resume.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">

                            <div class="row rounder shadow-lg p-5 mb-3 ">
                                <h5>Personal Informations</h5>
                                <div class="col-12 mb-3">
                                    <label class="form-label fw-bold" for="img">Your picture:</label>
                                    <input type="file" class="form-control @error('img') is-invalid @enderror"
                                        name="img" id="img">
                                    @error('img')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-6 mb-3">
                                    <label class="form-label fw-bold" for="name">Full Name:</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        name="name" id="name" placeholder="Enter your full name:">
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-6 mb-3">
                                    <label class="form-label fw-bold" for="age">Age:</label>
                                    <input type="number" class="form-control @error('age') is-invalid @enderror"
                                        name="age" id="age" placeholder="Enter your age:">
                                    @error('age')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>


                                <div class="col-6 mb-3">
                                    <label class="form-label fw-bold" for="email">Email Address:</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                                        name="email" id="email" placeholder="Enter your email address:">
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>


                                <div class="col-6 mb-3">
                                    <label class="form-label fw-bold" for="phone">Phone Number:</label>
                                    <input type="text" class="form-control @error('phone') is-invalid @enderror"
                                        name="phone" id="phone" placeholder="Enter your phone number:">
                                    @error('phone')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-12 mb-3">
                                    <label class="form-label fw-bold" for="linkedin">Linkedin Profile:</label>
                                    <input type="text" class="form-control @error('linkedin') is-invalid @enderror"
                                        name="linkedin" id="linkedin"
                                        placeholder="Provide the link to your Linkedin profile:">
                                    @error('linkedin')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-12">
                                    <label class="form-label fw-bold" for="address">Full Address:</label>
                                    <input type="text" class="form-control @error('address') is-invalid @enderror"
                                        name="address" id="address" placeholder="Provide your full address:">
                                    @error('address')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row rounder shadow-lg p-5 mb-3 ">
                                <h5>Education</h5>
                                <label class="form-label fw-bold" for="img">Your picture:</label>
                                <input type="file" class="form-control">
                            </div>

                            <div class="row rounder shadow-lg p-5 mb-3 ">
                                <h5>Experiences</h5>
                            </div>

                            <div class="row rounder shadow-lg p-5 mb-3 ">
                                <h5>Skills</h5>

                            </div>

                            <div class="row rounder shadow-lg p-5 mb-3 ">
                                <h5>Certificates</h5>

                            </div>

                            <div class="row rounder shadow-lg p-5 mb-3 ">
                                <h5>Objectives & Goals</h5>

                            </div>

                            <div class="row rounder shadow-lg p-5 mb-3 ">
                                <h5>Past Projects</h5>

                            </div>

                            <div class="row rounder shadow-lg p-5 mb-3 ">
                                <h5>Awards & Honors</h5>

                            </div>

                            <div class="row rounder shadow-lg p-5 mb-3 ">
                                <h5>Languages Proficiency</h5>

                            </div>

                            <div class="row rounder shadow-lg p-5 mb-3 ">
                                <h5>Hobbies & Interests</h5>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div><!--end container-->
    </section><!--end section-->
    <!-- Job apply form End -->
@endsection
