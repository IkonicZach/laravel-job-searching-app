@section('title', 'Edit Resume')
@extends('layout.master')
@section('content')
    <!-- Job apply form Start -->
    <section class="section bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-8">
                    <div class="d-flex justify-content-between align-items-center">
                        <h2>Edit your resume.</h2>
                        <small class="text-muted text-end m-0">Last updated:
                            {{ $resume->updated_at->format('d-M-Y / H:i:s') }}</small>
                    </div>
                    <div class="card border-0">
                        <form action="{{ route('resume.update', $resume->id) }}" method="POST" enctype="multipart/form-data"
                            class="bg-light">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">

                            <div class="row rounder shadow-lg p-5 mb-3 col-6">
                                <label for="title" class="fw-bold h5">Resume Name</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror"
                                    name="title" id="title" placeholder="Name your resume:"
                                    value="{{ $resume->title }}">
                                @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            {{-- Personal Informations Starts  --}}
                            <div class="row rounder shadow-lg p-5 mb-3 ">
                                <div class="d-flex align-items-center">
                                    <h5>Personal Informations</h5>
                                    <small class="ms-1">(<span class="text-danger">*</span> fields are required!)</small>
                                </div>
                                <div class="col-12 mb-3">
                                    <label class="form-label fw-bold" for="img">Your picture <span
                                            class="text-danger">*</span></label>
                                    <b class="d-block">Uploaded Image:
                                        <a href="{{ asset('uploads/resume/' . $resume->img) }}">{{ $resume->img }}</a>
                                    </b>

                                    <input type="file" class="form-control @error('img') is-invalid @enderror"
                                        name="img" id="img">
                                    @error('img')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-6 mb-3">
                                    <label class="form-label fw-bold" for="name">Full Name <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        name="name" id="name" placeholder="Enter your full name:"
                                        value="{{ $resume->name }}">
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-6 mb-3">
                                    <label class="form-label fw-bold" for="age">Age <span
                                            class="text-danger">*</span></label>
                                    <input type="number" class="form-control @error('age') is-invalid @enderror"
                                        name="age" id="age" placeholder="Enter your age:"
                                        value="{{ $resume->age }}">
                                    @error('age')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>


                                <div class="col-6 mb-3">
                                    <label class="form-label fw-bold" for="email">Email Address <span
                                            class="text-danger">*</span></label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                                        name="email" id="email" placeholder="Enter your email address:"
                                        value="{{ $resume->email }}">
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>


                                <div class="col-6 mb-3">
                                    <label class="form-label fw-bold" for="phone">Phone Number <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('phone') is-invalid @enderror"
                                        name="phone" id="phone" placeholder="Enter your phone number:"
                                        value="{{ $resume->phone }}">
                                    @error('phone')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-12 mb-3">
                                    <label class="form-label fw-bold" for="linkedin">Linkedin Profile </label>
                                    <input type="text" class="form-control @error('linkedin') is-invalid @enderror"
                                        name="linkedin" id="linkedin"
                                        placeholder="Provide the link to your Linkedin profile:"
                                        value="{{ $resume->linkedin ?? '' }}">
                                    @error('linkedin')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-12">
                                    <label class="form-label fw-bold" for="address">Full Address <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('address') is-invalid @enderror"
                                        name="address" id="address" placeholder="Provide your full address:"
                                        value="{{ $resume->address }}">
                                    @error('address')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            {{-- Personal Informations Ends  --}}

                            {{-- Education Starts  --}}
                            <div class="row rounder shadow-lg p-5 mb-3 ">
                                <div class="d-flex align-items-center">
                                    <h5>Education</h5>
                                    <small class="ms-1">(<span class="text-danger">*</span> fields are
                                        required!)</small>
                                </div>
                                <div class="col-12 mb-3">
                                    <label class="form-label fw-bold" for="education_status">Education Status <span
                                            class="text-danger">*</span></label>
                                    <select
                                        class="form-control form-select @error('education_status') is-invalid @enderror"
                                        name="education_status" id="education_status">
                                        <option value="" disabled selected>Status</option>
                                        <option value="Undergraduated" @if ($resume->education_status == 'Undergraduated') selected @endif>
                                            Undergraduated</option>
                                        <option value="Graduated" @if ($resume->education_status == 'Graduated') selected @endif>
                                            Graduated</option>
                                        <option value="University" @if ($resume->education_status == 'University') selected @endif>
                                            University</option>
                                        <option value="College" @if ($resume->education_status == 'College') selected @endif>College
                                        </option>
                                        <option value="High School" @if ($resume->education_status == 'High School') selected @endif>High
                                            School</option>
                                        <option value="Middle School" @if ($resume->education_status == 'Middle School') selected @endif>
                                            Middle School</option>
                                    </select>
                                    @error('education_status')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-6 mb-3">
                                    <label class="form-label fw-bold" for="degree">Degree(s) Earned</label>
                                    <input type="text" class="form-control @error('degree') is-invalid @enderror"
                                        name="degree" id="degree" placeholder="Degree or degrees you earned"
                                        value="{{ $resume->degree ?? '' }}">
                                    @error('degree')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-6 mb-3">
                                    <label class="form-label fw-bold" for="institution_name">Institution Name</label>
                                    <input type="text"
                                        class="form-control @error('institution_name') is-invalid @enderror"
                                        name="institution_name" id="institution_name"
                                        placeholder="Name of the institution"
                                        value="{{ $resume->institution_name ?? '' }}">
                                    @error('institution_name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-6 mb-3">
                                    <label class="form-label fw-bold" for="major">Major/ Field of Study:</label>
                                    <select class="form-control form-select @error('major') is-invalid @enderror"
                                        name="major" id="major">
                                        <option value="" disabled selected>Choose your major</option>
                                        @foreach ($fields as $field)
                                            <option value="{{ $field }}"
                                                @if ($resume->major == $field) selected @endif>{{ $field }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('major')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-6 mb-3">
                                    <label class="form-label fw-semibold" for="graduation_date">Graduation Date:</label>
                                    <input type="date"
                                        class="form-control @error('graduation_date') is-invalid @enderror"
                                        name="graduation_date" id="graduation_date"
                                        value="{{ $resume->graduation_date ?? '' }}">
                                    @error('graduation_date')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            {{-- Education Ends  --}}

                            {{-- Experiences Starts  --}}
                            <div class="row rounder shadow-lg p-5 mb-3 ">
                                <h5>Experiences</h5>

                                <div class="col-6 mb-3">
                                    <label class="form-label fw-bold" for="job_title">Job Title</label>
                                    <input type="text" class="form-control @error('job_title') is-invalid @enderror"
                                        name="job_title" id="job_title" placeholder="Name of the job"
                                        value="{{ $resume->job_title ?? '' }}">
                                    @error('job_title')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-6 mb-3">
                                    <label class="form-label fw-bold" for="company_name">Company Name</label>
                                    <input type="text"
                                        class="form-control @error('company_name') is-invalid @enderror"
                                        name="company_name" id="company_name"
                                        placeholder="Name of the company you worked for"
                                        value="{{ $resume->company_name ?? '' }}">
                                    @error('company_name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-12 mb-3">
                                    <label class="form-label fw-bold" for="location">Company's Location</label>
                                    <input type="text" class="form-control @error('location') is-invalid @enderror"
                                        name="location" id="location" placeholder="Location of your company"
                                        value="{{ $resume->location ?? '' }}">
                                    @error('location')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-6 mb-3">
                                    <label class="form-label fw-semibold" for="start_date">Start Date</label>
                                    <input type="date" class="form-control @error('start_date') is-invalid @enderror"
                                        name="start_date" id="start_date" value="{{ $resume->start_date ?? '' }}">
                                    @error('start_date')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-6 mb-3">
                                    <label class="form-label fw-semibold" for="end_date">End Date</label>
                                    <input type="date" class="form-control @error('end_date') is-invalid @enderror"
                                        name="end_date" id="end_date" value="{{ $resume->end_date ?? '' }}">
                                    @error('end_date')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-12">
                                    <label class="form-label fw-semibold" for="job_description">Responsibilies &
                                        Achievements</label>
                                    <textarea class="form-control @error('job_description') is-invalid @enderror" name="job_description"
                                        id="job_description" rows="5" placeholder="Describe your job">{{ $resume->job_description ?? '' }}</textarea>
                                    @error('job_description')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            {{-- Experiences Ends  --}}

                            {{-- Skills Starts  --}}
                            <div class="row rounder shadow-lg p-5 mb-3 ">
                                <h5>Skills</h5>
                                <div class="accordion">
                                    <div class="accordion-item">
                                        <div class="accordion-header" onclick="toggleAccordion(this)">
                                            Choose your skills <i class="fa-solid fa-circle-plus ps-1"></i>
                                        </div>
                                        <div class="accordion-content">
                                            <div class="accordion-nav">
                                                <p>What are you good at? <span class="text-danger">*</span></p>
                                            </div>
                                            <div class="row">
                                                @foreach ($skills as $skill)
                                                    <div class="col-3">
                                                        <div class="form-check form-switch">
                                                            <input class="form-check-input" type="checkbox"
                                                                role="switch" id="skill{{ $skill->id }}"
                                                                name="skills[]" value="{{ $skill->id }}"
                                                                @foreach ($resume->resume_skills as $resume_skill)
                                                                @if ($resume_skill->id == $skill->id)
                                                                    checked
                                                                @endif @endforeach>
                                                            <label class="form-check-label"
                                                                for="skill{{ $skill->id }}">{{ $skill->name }}</label>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- Skills Ends  --}}

                            {{-- Certificate Starts  --}}
                            <div class="row rounder shadow-lg p-5 mb-3 ">
                                <h5>Certificates</h5>
                                <div class="col-12 mb-3">
                                    <label class="form-label fw-bold" for="certificate">Certificate Name</label>
                                    <input type="text" class="form-control @error('certificate') is-invalid @enderror"
                                        name="certificate" id="certificate" placeholder="Name of the certificate"
                                        value="{{ $resume->certificate ?? '' }}">
                                    @error('certificate')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-6">
                                    <label class="form-label fw-bold" for="certificate_issuing_org">Issuing
                                        Organization</label>
                                    <input type="text"
                                        class="form-control @error('certificate_issuing_org') is-invalid @enderror"
                                        name="certificate_issuing_org" id="certificate_issuing_org"
                                        placeholder="Name of the organization"
                                        value="{{ $resume->certificate_issuing_org ?? '-' }}">
                                    @error('certificate_issuing_org')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>


                                <div class="col-6">
                                    <label class="form-label fw-semibold" for="obtained_date">Otained Date</label>
                                    <input type="date"
                                        class="form-control @error('obtained_date') is-invalid @enderror"
                                        name="obtained_date" id="obtained_date"
                                        value="{{ $resume->obtained_date ?? '-' }}">
                                    @error('obtained_date')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            {{-- Certificate Ends  --}}

                            {{-- Objiecive & Goals Starts  --}}
                            <div class="row rounder shadow-lg p-5 mb-3 ">
                                <h5>Objectives & Goals <span class="text-danger">*</span></h5>
                                <div class="col-12">
                                    <textarea class="form-control @error('goals') is-invalid @enderror" name="goals" id="goals" rows="5"
                                        placeholder="A brief statement highlighting your career goals and objectives">{{ $resume->goals }}</textarea>
                                    @error('goals')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            {{-- Objiecive & Goals Ends  --}}

                            {{-- Projects Starts  --}}
                            <div class="row rounder shadow-lg p-5 mb-3 ">
                                <h5>Past Projects</h5>
                                <div class="col-12 mb-3">
                                    <label class="form-label fw-bold" for="project_name">Project Name</label>
                                    <input type="text"
                                        class="form-control @error('project_name') is-invalid @enderror"
                                        name="project_name" id="project_name" placeholder="Name of the project"
                                        value="{{ $resume->project_name ?? '' }}">
                                    @error('project_name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-12 mb-3">
                                    <label class="form-label fw-semibold" for="project_description">Decription</label>
                                    <textarea class="form-control @error('project_description') is-invalid @enderror" name="project_description"
                                        id="project_description" rows="5" placeholder="Describe what the project is about">{{ $resume->project_description ?? '-' }}</textarea>
                                    @error('project_description')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-6">
                                    <label class="form-label fw-bold" for="technologies_used">Technologies Used</label>
                                    <input type="text"
                                        class="form-control @error('technologies_used') is-invalid @enderror"
                                        name="technologies_used" id="technologies_used"
                                        placeholder="Name of techs used in the project"
                                        value="{{ $resume->technologies_used ?? '-' }}">
                                    @error('technologies_used')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-6">
                                    <label class="form-label fw-bold" for="project_role">Your Role</label>
                                    <input type="text"
                                        class="form-control @error('project_role') is-invalid @enderror"
                                        name="project_role" id="project_role" placeholder="Your role in the project"
                                        value="{{ $resume->project_role ?? '-' }}">
                                    @error('project_role')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            {{-- Projects Ends  --}}

                            {{-- Awards & Honors Starts  --}}
                            <div class="row rounder shadow-lg p-5 mb-3 ">
                                <h5>Awards & Honors</h5>
                                <div class="col-12 mb-3">
                                    <label class="form-label fw-bold" for="award">Award Name</label>
                                    <input type="text" class="form-control @error('award') is-invalid @enderror"
                                        name="award" id="award" placeholder="Name of the award"
                                        value="{{ $resume->award ?? '' }}">
                                    @error('award')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-6">
                                    <label class="form-label fw-bold" for="award_issuing_org">Issuing Organization</label>
                                    <input type="text"
                                        class="form-control @error('award_issuing_org') is-invalid @enderror"
                                        name="award_issuing_org" id="award_issuing_org"
                                        placeholder="Name of the organization"
                                        value="{{ $resume->award_issuing_org ?? '-' }}">
                                    @error('award_issuing_org')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-6">
                                    <label class="form-label fw-semibold" for="received_date">Received Date</label>
                                    <input type="date"
                                        class="form-control @error('received_date') is-invalid @enderror"
                                        name="received_date" id="received_date"
                                        value="{{ $resume->received_date ?? '-' }}">
                                    @error('received_date')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            {{-- Awards & Honors Ends  --}}

                            {{-- Languages Starts  --}}
                            <div class="row rounder shadow-lg p-5 mb-3 ">
                                <h5>Languages Proficiency <span class="text-danger">*</span></h5>
                                <div class="col-12">
                                    <select class="form-control form-select @error('languages') is-invalid @enderror"
                                        name="languages" id="languages">
                                        <option value="" disabled selected>Choose languages you preferred</option>
                                        @foreach ($languages as $language)
                                            <option value="{{ $language }}"
                                                @if ($resume->languages == $language) selected @endif>{{ $language }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            {{-- Languages Ends  --}}

                            {{-- Hobbies Starts  --}}
                            <div class="row rounder shadow-lg p-5 mb-3 ">
                                <h5>Hobbies & Interests <span class="text-danger">*</span></h5>
                                <div class="col-12">
                                    <textarea class="form-control @error('hobbies') is-invalid @enderror" name="hobbies" id="hobbies" rows="5"
                                        placeholder="Personal interests or activities that provide a holistic view of yourself">{{ $resume->hobbies }}</textarea>
                                    @error('hobbies')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            {{-- Hobbies Ends  --}}

                            <div class="row">
                                <a href="{{ route('resume.create') }}" class="btn btn-light col-6">Reset</a>
                                <input type="submit" class="btn btn-primary col-6" value="Confirm">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div><!--end container-->
    </section><!--end section-->
    <!-- Job apply form End -->
@endsection
