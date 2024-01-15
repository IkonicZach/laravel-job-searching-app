@section('title', 'Resume Details')
@extends('layout.master')
@section('content')
    <!-- Job apply form Start -->
    <section class="section bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-8">
                    <div class="d-flex justify-content-between align-items-center">
                        <h3>{{ $resume->title }}.pdf</h3>
                        <div class="d-flex">
                            <a href="{{ route('resume.download', $resume->id) }}"
                                class="btn btn-primary icon-link me-1">Download
                                as
                                pdf <i class="fa-solid fa-download"></i></a>
                            <a href="{{ route('resume.edit', $resume->id) }}" class="icon-btn btn-light">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                        </div>
                    </div>
                    <div class="card border-0">
                        {{-- Personal Informations Starts  --}}
                        <div class="row rounder shadow-lg p-5 mb-3 ">
                            <h5>Personal Informations</h5>
                            <div class="col-12 mb-3">
                                <label class="form-label fw-bold">Your picture</label>
                                <img src="{{ asset('uploads/resume/' . $resume->img) }}" class="img-thumbnail">
                            </div>

                            <div class="col-6 mb-3">
                                <label class="form-label fw-bold" for="name">Full Name</label>
                                <p class="form-control">{{ $resume->name }}</p>
                            </div>

                            <div class="col-6 mb-3">
                                <label class="form-label fw-bold" for="age">Age</label>
                                <p class="form-control">{{ $resume->age }}</p>
                            </div>


                            <div class="col-6 mb-3">
                                <label class="form-label fw-bold" for="email">Email Address</label>
                                <p class="form-control">{{ $resume->email }}</p>
                            </div>


                            <div class="col-6 mb-3">
                                <label class="form-label fw-bold" for="phone">Phone Number</label>
                                <p class="form-control">{{ $resume->phone }}</p>
                            </div>

                            <div class="col-12 mb-3">
                                <label class="form-label fw-bold" for="linkedin">Linkedin Profile </label>
                                <p class="form-control">{{ $resume->linkedin ?? '-' }}</p>
                            </div>

                            <div class="col-12">
                                <label class="form-label fw-bold" for="address">Full Address</label>
                                <p class="form-control">{{ $resume->address }}</p>
                            </div>
                        </div>
                        {{-- Personal Informations Ends  --}}

                        {{-- Education Starts  --}}
                        <div class="row rounder shadow-lg p-5 mb-3 ">
                            <h5>Education</h5>
                            <div class="col-12 mb-3">
                                <label class="form-label fw-bold" for="education_status">Education Status</label>
                                <p class="form-control">{{ $resume->education_status }}</p>
                            </div>

                            <div class="col-6 mb-3">
                                <label class="form-label fw-bold" for="degree">Degree(s) Earned</label>
                                <p class="form-control">{{ $resume->degree ?? '-' }}</p>
                            </div>

                            <div class="col-6 mb-3">
                                <label class="form-label fw-bold" for="institution_name">Institution Name</label>
                                <p class="form-control">{{ $resume->institution_name ?? '-' }}</p>
                            </div>

                            <div class="col-6 mb-3">
                                <label class="form-label fw-bold" for="major">Major/ Field of Study:</label>
                                <p class="form-control">{{ $resume->major ?? '-' }}</p>
                            </div>

                            <div class="col-6 mb-3">
                                <label class="form-label fw-semibold" for="graduation_date">Graduation Date:</label>
                                <p class="form-control">{{ $resume->graduation_date }}</p>
                            </div>
                        </div>
                        {{-- Education Ends  --}}

                        {{-- Experiences Starts  --}}
                        <div class="row rounder shadow-lg p-5 mb-3 ">
                            <h5>Experiences</h5>

                            <div class="col-6 mb-3">
                                <label class="form-label fw-bold" for="job_title">Job Title</label>
                                <p class="form-control">{{ $resume->job_title }}</p>
                            </div>

                            <div class="col-6 mb-3">
                                <label class="form-label fw-bold" for="company_name">Company Name</label>
                                <p class="form-control">{{ $resume->company_name ?? '-' }}</p>
                            </div>

                            <div class="col-12 mb-3">
                                <label class="form-label fw-bold" for="location">Company's Location</label>
                                <p class="form-control">{{ $resume->location ?? '-' }}</p>
                            </div>

                            <div class="col-6 mb-3">
                                <label class="form-label fw-semibold" for="start_date">Start Date</label>
                                <p class="form-control">{{ $resume->start_date ?? '-' }}</p>
                            </div>

                            <div class="col-6 mb-3">
                                <label class="form-label fw-semibold" for="end_date">End Date</label>
                                <p class="form-control">{{ $resume->end_date ?? '-' }}</p>
                            </div>

                            <div class="col-12">
                                <label class="form-label fw-semibold" for="job_description">Responsibilies &
                                    Achievements</label>
                                <p class="form-control">{{ $resume->job_description ?? '-' }}</p>
                            </div>
                        </div>
                        {{-- Experiences Ends  --}}

                        {{-- Skills Starts  --}}
                        <div class="row rounder shadow-lg p-5 mb-3 ">
                            <h5>Skills</h5>
                            <div class="row">
                                @if (count($resume->resume_skills) > 0)
                                    @foreach ($resume->resume_skills as $resume_skill)
                                        <div class="col-3">
                                            <p class="form-control">{{ $resume_skill->name }}</p>
                                        </div>
                                    @endforeach
                                @else
                                    <p class="form-control">-</p>
                                @endif
                            </div>
                        </div>
                        {{-- Skills Ends  --}}

                        {{-- Certificate Starts  --}}
                        <div class="row rounder shadow-lg p-5 mb-3 ">
                            <h5>Certificates</h5>
                            <div class="col-12 mb-3">
                                <label class="form-label fw-bold" for="certificate">Certificate Name</label>
                                <p class="form-control">{{ $resume->certificate ?? '-' }}</p>
                            </div>

                            <div class="col-6">
                                <label class="form-label fw-bold" for="certificate_issuing_org">Issuing
                                    Organization</label>
                                <p class="form-control">{{ $resume->certificate_issuing_org ?? '-' }}</p>
                            </div>


                            <div class="col-6">
                                <label class="form-label fw-semibold" for="obtained_date">Otained Date</label>
                                <p class="form-control">{{ $resume->obtained_date ?? '-' }}</p>
                            </div>
                        </div>
                        {{-- Certificate Ends  --}}

                        {{-- Objiecive & Goals Starts  --}}
                        <div class="row rounder shadow-lg p-5 mb-3 ">
                            <h5>Objectives & Goals <span class="text-danger">*</span></h5>
                            <div class="col-12">
                                <p class="form-control">{{ $resume->goals }}</p>
                            </div>
                        </div>
                        {{-- Objiecive & Goals Ends  --}}

                        {{-- Projects Starts  --}}
                        <div class="row rounder shadow-lg p-5 mb-3 ">
                            <h5>Past Projects</h5>
                            <div class="col-12 mb-3">
                                <label class="form-label fw-bold" for="project_name">Project Name</label>
                                <p class="form-control">{{ $resume->project_name ?? '-' }}</p>
                            </div>

                            <div class="col-12 mb-3">
                                <label class="form-label fw-semibold" for="project_description">Decription</label>
                                <p class="form-control">{{ $resume->project_description ?? '-' }}</p>
                            </div>

                            <div class="col-6">
                                <label class="form-label fw-bold" for="technologies_used">Technologies Used</label>
                                <p class="form-control">{{ $resume->technologies_used ?? '-' }}</p>
                            </div>

                            <div class="col-6">
                                <label class="form-label fw-bold" for="project_role">Your Role</label>
                                <p class="form-control">{{ $resume->project_role ?? '-' }}</p>
                            </div>
                        </div>
                        {{-- Projects Ends  --}}

                        {{-- Awards & Honors Starts  --}}
                        <div class="row rounder shadow-lg p-5 mb-3 ">
                            <h5>Awards & Honors</h5>
                            <div class="col-12 mb-3">
                                <label class="form-label fw-bold" for="award">Award Name</label>
                                <p class="form-control">{{ $resume->award ?? '-' }}</p>
                            </div>

                            <div class="col-6">
                                <label class="form-label fw-bold" for="award_issuing_org">Issuing Organization</label>
                                <p class="form-control">{{ $resume->award_issuing_org ?? '-' }}</p>
                            </div>

                            <div class="col-6">
                                <label class="form-label fw-semibold" for="received_date">Received Date</label>
                                <p class="form-control">{{ $resume->received_date ?? '-' }}</p>
                            </div>
                        </div>
                        {{-- Awards & Honors Ends  --}}

                        {{-- Languages Starts  --}}
                        <div class="row rounder shadow-lg p-5 mb-3 ">
                            <h5>Languages Proficiency <span class="text-danger">*</span></h5>
                            <div class="col-12">
                                <p class="form-control">{{ $resume->languages }}</p>
                            </div>
                        </div>
                        {{-- Languages Ends  --}}

                        {{-- Hobbies Starts  --}}
                        <div class="row rounder shadow-lg p-5 mb-3 ">
                            <h5>Hobbies & Interests <span class="text-danger">*</span></h5>
                            <div class="col-12">
                                <p class="form-control">{{ $resume->hobbies ?? '-' }}</p>
                            </div>
                        </div>
                        {{-- Hobbies Ends  --}}
                        {{-- 
                        <div class="row">
                            <a href="{{ route('resume.create') }}" class="btn btn-light col-6">Reset</a>
                            <input type="submit" class="btn btn-primary col-6" value="Confirm">
                        </div> --}}
                    </div>
                </div>
            </div>
        </div><!--end container-->
    </section><!--end section-->
    <!-- Job apply form End -->
@endsection
