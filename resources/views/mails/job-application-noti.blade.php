{{-- @component('layouts.email-layout')
    @slot('title')
        New Job Application
    @endslot

    <h1>New Job Application</h1>

    <p>A new job application has been submitted.</p>

    <strong>Details:</strong>
    <ul>
        <li>Job Title: {{ $application->job->title }}</li>
        <li>Applicant Name: {{ $application->user->name }}</li>
        <li>Email: {{ $application->email }}</li>
        <li>Phone: {{ $application->phone }}</li>
    </ul>

    <a href="{{ url('/applications/' . $application->id) }}">View Application</a>

    <p>Thank you for using our job board!</p>
@endcomponent --}}

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Job Application</title>
</head>

<style>
    body {
        font-family: system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", "Noto Sans", "Liberation Sans", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
    }

    .btn {
        border-radius: 2rem !important;
        text-transform: capitalize !important;
    }

    .ms-5 {
        margin-left: 3rem !important;
    }

    .btn-primary {
        display: inline-block;
        padding: 0.375rem 0.75rem;
        font-size: 1rem;
        font-weight: 400;
        line-height: 1.5;
        color: white;
        text-align: center;
        text-decoration: none;
        vertical-align: middle;
        cursor: pointer;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
        border: 1px solid transparent;
        background-color: #3b82f6;
        transition: color .15s ease-in-out, background-color .15s ease-in-out, border-color .15s ease-in-out, box-shadow .15s ease-in-out;
    }

    .btn-primary:hover {
        background-color: transparent !important;
        color: #3b82f6 !important;
        border-color: #3b82f6 !important;
    }
</style>

<body>
    <h1>New Job Application</h1>

    <p>Your job application has been submitted.</p>

    <strong>Application Details:</strong>
    <ul style="padding: 0; list-style: none;">
        <li><b>Job Title: </b>{{ $application->job->title ?? 'N/A' }}</li>
        <li><b>Applicant Name: </b>{{ $application->user->name ?? 'N/A' }}</li>
        <li><b>Email: </b>{{ $application->email ?? 'N/A' }}</li>
        <li><b>Phone: </b>{{ $application->phone ?? 'N/A' }}</li>
    </ul>

    <a href="{{ url('/applications/') }}" class="btn btn-primary ms-5"> View Application</a>

    <p>Thank you for using our job board!</p>
</body>

</html>
