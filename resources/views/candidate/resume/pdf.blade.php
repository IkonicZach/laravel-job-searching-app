<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet" type="text/css">
    <!-- JAVASCRIPTS -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://kit.fontawesome.com/da36adc817.js"></script>
</head>
<style>
    /* PDF Design */
    :root,
    [data-bs-theme=light] {
        --bs-blue: #0d6efd;
        --bs-indigo: #6610f2;
        --bs-purple: #6f42c1;
        --bs-pink: #d63384;
        --bs-red: #dc3545;
        --bs-orange: #fd7e14;
        --bs-yellow: #ffc107;
        --bs-green: #198754;
        --bs-teal: #20c997;
        --bs-cyan: #0dcaf0;
        --bs-black: #000;
        --bs-white: #fff;
        --bs-gray: #6c757d;
        --bs-gray-dark: #343a40;
        --bs-gray-100: #f8f9fa;
        --bs-gray-200: #e9ecef;
        --bs-gray-300: #dee2e6;
        --bs-gray-400: #ced4da;
        --bs-gray-500: #adb5bd;
        --bs-gray-600: #6c757d;
        --bs-gray-700: #495057;
        --bs-gray-800: #343a40;
        --bs-gray-900: #212529;
        --bs-primary: #0d6efd;
        --bs-secondary: #6c757d;
        --bs-success: #198754;
        --bs-info: #0dcaf0;
        --bs-warning: #ffc107;
        --bs-danger: #dc3545;
        --bs-light: #f8f9fa;
        --bs-dark: #212529;
        --bs-primary-rgb: 13, 110, 253;
        --bs-secondary-rgb: 108, 117, 125;
        --bs-success-rgb: 25, 135, 84;
        --bs-info-rgb: 13, 202, 240;
        --bs-warning-rgb: 255, 193, 7;
        --bs-danger-rgb: 220, 53, 69;
        --bs-light-rgb: 248, 249, 250;
        --bs-dark-rgb: 33, 37, 41;
        --bs-primary-text-emphasis: #052c65;
        --bs-secondary-text-emphasis: #2b2f32;
        --bs-success-text-emphasis: #0a3622;
        --bs-info-text-emphasis: #055160;
        --bs-warning-text-emphasis: #664d03;
        --bs-danger-text-emphasis: #58151c;
        --bs-light-text-emphasis: #495057;
        --bs-dark-text-emphasis: #495057;
        --bs-primary-bg-subtle: #cfe2ff;
        --bs-secondary-bg-subtle: #e2e3e5;
        --bs-success-bg-subtle: #d1e7dd;
        --bs-info-bg-subtle: #cff4fc;
        --bs-warning-bg-subtle: #fff3cd;
        --bs-danger-bg-subtle: #f8d7da;
        --bs-light-bg-subtle: #fcfcfd;
        --bs-dark-bg-subtle: #ced4da;
        --bs-primary-border-subtle: #9ec5fe;
        --bs-secondary-border-subtle: #c4c8cb;
        --bs-success-border-subtle: #a3cfbb;
        --bs-info-border-subtle: #9eeaf9;
        --bs-warning-border-subtle: #ffe69c;
        --bs-danger-border-subtle: #f1aeb5;
        --bs-light-border-subtle: #e9ecef;
        --bs-dark-border-subtle: #adb5bd;
        --bs-white-rgb: 255, 255, 255;
        --bs-black-rgb: 0, 0, 0;
        --bs-font-sans-serif: system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", "Noto Sans", "Liberation Sans", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
        --bs-font-monospace: SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;
        --bs-gradient: linear-gradient(180deg, rgba(255, 255, 255, 0.15), rgba(255, 255, 255, 0));
        --bs-body-font-family: var(--bs-font-sans-serif);
        --bs-body-font-size: 1rem;
        --bs-body-font-weight: 400;
        --bs-body-line-height: 1.5;
        --bs-body-color: #212529;
        --bs-body-color-rgb: 33, 37, 41;
        --bs-body-bg: #fff;
        --bs-body-bg-rgb: 255, 255, 255;
        --bs-emphasis-color: #000;
        --bs-emphasis-color-rgb: 0, 0, 0;
        --bs-secondary-color: rgba(33, 37, 41, 0.75);
        --bs-secondary-color-rgb: 33, 37, 41;
        --bs-secondary-bg: #e9ecef;
        --bs-secondary-bg-rgb: 233, 236, 239;
        --bs-tertiary-color: rgba(33, 37, 41, 0.5);
        --bs-tertiary-color-rgb: 33, 37, 41;
        --bs-tertiary-bg: #f8f9fa;
        --bs-tertiary-bg-rgb: 248, 249, 250;
        --bs-heading-color: inherit;
        --bs-link-color: #0d6efd;
        --bs-link-color-rgb: 13, 110, 253;
        --bs-link-decoration: underline;
        --bs-link-hover-color: #0a58ca;
        --bs-link-hover-color-rgb: 10, 88, 202;
        --bs-code-color: #d63384;
        --bs-highlight-color: #212529;
        --bs-highlight-bg: #fff3cd;
        --bs-border-width: 1px;
        --bs-border-style: solid;
        --bs-border-color: #dee2e6;
        --bs-border-color-translucent: rgba(0, 0, 0, 0.175);
        --bs-border-radius: 0.375rem;
        --bs-border-radius-sm: 0.25rem;
        --bs-border-radius-lg: 0.5rem;
        --bs-border-radius-xl: 1rem;
        --bs-border-radius-xxl: 2rem;
        --bs-border-radius-2xl: var(--bs-border-radius-xxl);
        --bs-border-radius-pill: 50rem;
        --bs-box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
        --bs-box-shadow-sm: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
        --bs-box-shadow-lg: 0 1rem 3rem rgba(0, 0, 0, 0.175);
        --bs-box-shadow-inset: inset 0 1px 2px rgba(0, 0, 0, 0.075);
        --bs-focus-ring-width: 0.25rem;
        --bs-focus-ring-opacity: 0.25;
        --bs-focus-ring-color: rgba(13, 110, 253, 0.25);
        --bs-form-valid-color: #198754;
        --bs-form-valid-border-color: #198754;
        --bs-form-invalid-color: #dc3545;
        --bs-form-invalid-border-color: #dc3545;
    }

    * {
        box-sizing: border-box;
        font-family: "Plus Jakarta Sans", sans-serif;
    }

    .h1,
    .h2,
    .h3,
    .h4,
    .h5,
    .h6,
    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
        margin-top: 0;
        margin-bottom: 0.5rem;
        font-weight: 500;
        line-height: 1.2;
        color: var(--bs-heading-color);
    }

    h1 {
        display: block;
        font-size: 2em;
        margin-block-start: 0.67em;
        margin-block-end: 0.67em;
        margin-inline-start: 0px;
        margin-inline-end: 0px;
        font-weight: bold;
    }

    h2 {
        display: block;
        font-size: 1.5em;
        margin-block-start: 0.83em;
        margin-block-end: 0.83em;
        margin-inline-start: 0px;
        margin-inline-end: 0px;
        font-weight: bold;
    }

    h3 {
        display: block;
        font-size: 1.17em;
        margin-block-start: 1em;
        margin-block-end: 1em;
        margin-inline-start: 0px;
        margin-inline-end: 0px;
        font-weight: bold;
    }

    h5 {
        display: block;
        font-size: 0.83em;
        margin-block-start: 1.67em;
        margin-block-end: 1.67em;
        margin-inline-start: 0px;
        margin-inline-end: 0px;
        font-weight: bold;
    }

    .pdf-nav {
        width: 30% !important;
        /* height: 100%; */
        background-color: rgb(33, 37, 41) !important;
        display: flex !important;
        flex-direction: column !important;
        color: #ddd !important;
    }

    .pdf-img {
        max-width: 100% !important;
        max-height: 397.5px !important;
        object-fit: cover !important;
        border-radius: 100% !important;
        padding: 2rem !important;
    }

    .pdf-nav-item h3 {
        padding-bottom: 0.5rem;
        border-bottom: 0.3rem solid #3b82f6;
    }

    .pdf-nav-item li {
        padding-left: 1rem;
    }

    .pdf-nav-item li p {
        font-size: 18px;
        margin-bottom: 3px !important;
    }

    .pdf-content {
        width: 70%;
    }

    .banner {
        width: 100%;
    }

    .banner h1 {
        font-size: 5rem;
    }

    .banner-text {
        width: fit-content;
        padding: 3rem;
    }

    .content {
        max-width: 100%;
        padding: 0 3rem;
        margin-bottom: 3rem;
    }

    .content-section {
        margin-bottom: 1rem;
    }

    .content-section h3 {
        padding-bottom: 0.5rem;
        border-bottom: 1px solid #1e293b;
    }

    .d-flex {
        display: flex !important;
    }

    body {
        margin: 0;
        font-family: var(--bs-body-font-family);
        font-size: var(--bs-body-font-size);
        font-weight: var(--bs-body-font-weight);
        line-height: var(--bs-body-line-height);
        color: var(--bs-body-color);
        text-align: var(--bs-body-text-align);
        background-color: var(--bs-body-bg);
        -webkit-text-size-adjust: 100%;
        -webkit-tap-highlight-color: transparent;
    }

    .row {
        --bs-gutter-x: 1.5rem;
        --bs-gutter-y: 0;
        display: flex;
        flex-wrap: wrap;
        margin-top: calc(-1 * var(--bs-gutter-y));
        margin-right: calc(-.5 * var(--bs-gutter-x));
        margin-left: calc(-.5 * var(--bs-gutter-x));
    }

    /* .row>* {
        flex-shrink: 0;
        width: 100%;
        max-width: 100%;
        padding-right: calc(var(--bs-gutter-x) * .5);
        padding-left: calc(var(--bs-gutter-x) * .5);
        margin-top: var(--bs-gutter-y);
    } */

    .col-6 {
        flex: 0 0 auto;
        width: 50%;
    }

    .m-0 {
        margin: 0 !important
    }
</style>

<body>
    <div class="d-flex">
        <div class="pdf-nav">
            <img src="{{ public_path('uploads/resume/' . $resume->img) }}" class="pdf-img" alt="profile_image">

            <ul class="pdf-nav-item">
                <h3>Education</h3>
                <li>
                    <h5><i class="fa-solid fa-user-graduate pe-1"></i> {{ $resume->degree ?? 'Degree' }}</h5>
                </li>
                <li>
                    <p>{{ $resume->major ?? 'Major' }}</p>
                </li>
                <li>
                    <p>{{ $resume->institution_name ?? 'Institution Name' }}</p>
                </li>
                <li>
                    <p>{{ $resume->graduation_date ?? 'Graduation Date' }}</p>
                </li>
            </ul>

            <ul class="pdf-nav-item">
                <h3>Skills</h3>
                @foreach ($resume->resume_skills as $skill)
                    <li>{{ $skill->name }}</li>
                @endforeach
            </ul>

            <ul class="pdf-nav-item">
                <h3>Contact</h3>
                <li>
                    <p><i class="fa-solid fa-phone"></i> {{ $resume->phone }}</p>
                </li>
                <li>
                    <p><i class="fa-solid fa-envelope"></i> {{ $resume->email }}</p>
                </li>
                <li>
                    <p><i class="fa-solid fa-house"></i> {{ $resume->address }}</p>
                </li>
                <li>
                    <p><i class="fa-brands fa-linkedin"></i> <a
                            href="{{ $resume->linkedin }}">{{ $resume->linkedin }}</a></p>
                </li>
            </ul>
        </div>
        <div class="pdf-content">
            <div class="banner">
                <div class="banner-text">
                    <h1 style="color: blue">{{ $resume->name }}</h1>
                    <h2>Your Professional</h2>
                </div>
            </div>

            <div class="content">
                <div class="content-section">
                    <h3>About Me</h3>
                    <p>{{ $resume->user->bio }}</p>
                </div>

                <div class="row">
                    <div class="content-section col-6">
                        <h3>My Goals</h3>
                        <p>{{ $resume->goals }}</p>
                    </div>
                    <div class="content-section col-6">
                        <h3>My Hobbies</h3>
                        <p>{{ $resume->hobbies }}</p>
                    </div>
                </div>

                <div class="row">
                    <div class="content-section col-6">
                        <h3>Experiences</h3>
                        <p class="m-0"><b>Position:</b> {{ $resume->job_title }}</p>
                        <p class="m-0"><b>Company:</b> {{ $resume->company_name }}</p>
                        <p class="m-0"><b>From </b> {{ $resume->start_date }} <b>To</b> {{ $resume->end_date }}</p>
                        <p class="m-0"><b>Responsibilities: </b>{{ $resume->job_description }}</p>
                        <p class="m-0"><b>Technologies used: </b>{{ $resume->technologies_used }}</p>
                    </div>
                    <div class="content-section col-6">
                        <h3>Certificates</h3>
                        <p class="m-0"><b>Name:</b> {{ $resume->certificate }}</p>
                        <p class="m-0"><b>Organization:</b> {{ $resume->certificate_issuing_org }}</p>
                        <p class="m-0"><b>Obtained At:</b> {{ $resume->obtained_date }}</p>
                    </div>
                </div>

                <div class="row">
                    <div class="content-section col-6">
                        <h3>Awards</h3>
                        <p class="m-0"><b>Name:</b> {{ $resume->award }}</p>
                        <p class="m-0"><b>Organization:</b> {{ $resume->award_issuing_org }}</p>
                        <p class="m-0"><b>Received At:</b> {{ $resume->received_at }}</p>
                    </div>
                    <div class="content-section col-6">
                        <h3>Languages</h3>
                        <p class="m-0">- {{ $resume->languages }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</body>

</html>
